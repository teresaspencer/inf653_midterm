# PHP API Reference Sheet

## Every Endpoint File Follows This Pattern

```
1. Set headers
2. Include Database.php and the Model
3. Instantiate DB, connect, instantiate model
4. Get input data
5. Set it on the model object
6. Call the model method
7. Return JSON response
```

---

## Headers (Same in Every File)

```php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
```

---

## Where Input Data Comes From

| Method | Source         | How to Access                                      | Used For                  |
|--------|----------------|----------------------------------------------------|---------------------------|
| GET    | URL params     | `$_GET['id']`                                      | read_single, delete       |
| POST   | Request body   | `json_decode(file_get_contents('php://input'))`    | create                    |
| PUT    | Request body   | `json_decode(file_get_contents('php://input'))`    | update                    |
| DELETE | URL params     | `$_GET['id']`                                      | delete                    |

---

## File-by-File Breakdown

### read.php — GET all records
- **Input:** none (or optional query params like `?author_id=`)
- **Model method:** `read()`
- **Response:** array of all records, or `{ "message": "No X Found" }`

```php
$result = $model->read();
$num = $result->rowCount();

if ($num > 0) {
    $arr = array();
    $arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        array_push($arr['data'], array(
            'id' => $id,
            'field' => $field
        ));
    }
    echo json_encode($arr);
} else {
    echo json_encode(array('message' => 'No X Found'));
}
```

---

### read_single.php — GET one record by ID
- **Input:** `$_GET['id']`
- **Model method:** `read_single()`
- **Response:** single record object, or `{ "message": "No X Found" }`

```php
$model->id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $model->read_single();
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo json_encode(array('id' => $row['id'], 'field' => $row['field']));
} else {
    echo json_encode(array('message' => 'No X Found'));
}
```

---

### create.php — POST a new record
- **Input:** JSON request body
- **Model method:** `create()`
- **Response:** success or error message

```php
$data = json_decode(file_get_contents('php://input'));

$model->field = $data->field;

if ($model->create()) {
    echo json_encode(array('message' => 'X Created'));
} else {
    echo json_encode(array('message' => 'X Not Created'));
}
```

---

### update.php — PUT (update) a record
- **Input:** JSON request body (including id)
- **Model method:** `update()`
- **Response:** success or error message

```php
$data = json_decode(file_get_contents('php://input'));

$model->id    = $data->id;
$model->field = $data->field;

if ($model->update()) {
    echo json_encode(array('message' => 'X Updated'));
} else {
    echo json_encode(array('message' => 'X Not Updated'));
}
```

---

### delete.php — DELETE a record
- **Input:** `$_GET['id']` or JSON body
- **Model method:** `delete()`
- **Response:** success or error message

```php
$model->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($model->delete()) {
    echo json_encode(array('message' => 'X Deleted'));
} else {
    echo json_encode(array('message' => 'X Not Deleted'));
}
```

---

## Model Method Pattern (Quote.php / Author.php / Category.php)

Every method follows this structure:

```
1. Write the SQL query string
2. Prepare it
3. Clean and bind any parameters
4. Execute
5. Return the result
```

```php
public function someMethod() {
    $query = 'SELECT ...';                      // 1. Query
    $stmt = $this->conn->prepare($query);       // 2. Prepare
    $this->field = htmlspecialchars(            // 3. Clean
        strip_tags($this->field));
    $stmt->bindParam(':field', $this->field);   // 3. Bind
    $stmt->execute();                           // 4. Execute
    return $stmt;                               // 5. Return
}
```

---

## SQL Quick Reference (PostgreSQL)

| Action       | Syntax                                                  |
|--------------|---------------------------------------------------------|
| Read all     | `SELECT col1, col2 FROM table ORDER BY id`              |
| Read one     | `SELECT col1, col2 FROM table WHERE id = ?`             |
| Create       | `INSERT INTO table (col1) VALUES (:col1)`               |
| Update       | `UPDATE table SET col1 = :col1 WHERE id = :id`          |
| Delete       | `DELETE FROM table WHERE id = :id`                      |
| Join         | `SELECT q.id, a.author FROM quotes q LEFT JOIN authors a ON q.author_id = a.id` |

**Notes:**
- `id` is `SERIAL` — never insert it manually, PostgreSQL auto-increments it
- Always use `:param` named placeholders with PDO, not `?` (except `bindParam(1, ...)` positional style)
- `LEFT JOIN` is used in quotes to pull in author name and category name

---

## index.php Routing Pattern

```php
if ($method === 'GET') {
    if (isset($_GET['id'])) {
        include 'read_single.php';
    } else {
        include 'read.php';
    }
} elseif ($method === 'POST') {
    include 'create.php';
} elseif ($method === 'PUT') {
    include 'update.php';
} elseif ($method === 'DELETE') {
    include 'delete.php';
}
```

---

## Common Bugs to Watch For

| Bug | Example | Fix |
|-----|---------|-----|
| Missing comma in SELECT | `SELECT author id` | `SELECT author, id` |
| Missing semicolon | `setAttribute(...)` | `setAttribute(...);` |
| Missing space after UPDATE | `'UPDATE' . $table` | `'UPDATE ' . $table` |
| Wrong class name | `class Author` in Category.php | `class Category` |
| Array name case mismatch | define `$Author_arr`, use `$author_arr` | pick one and be consistent |
| Stray comma in array | `array('message', => ...)` | `array('message' => ...)` |
| MySQL syntax in PostgreSQL | `INSERT INTO table SET col = val` | `INSERT INTO table (col) VALUES (:val)` |
