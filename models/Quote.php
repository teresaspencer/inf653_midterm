<?php
    class Quote {
        // DB
        private $conn;
        private $table = 'quotes';

        // Quote Properties
        public $id;
        public $quote;
        public $author_id;
        public $category_id;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Read Quote
        public function read() {
            // Create query
            $query = 'SELECT
                q.id,
                q.quote,
                a.author,
                c.category
            FROM
                ' . $this->table . ' q
            LEFT JOIN 
                authors a ON q.author_id = a.id 
            LEFT JOIN
                 categories c ON q.category_id = c.id';

            if(isset($_GET['author_id']) && isset($_GET['category_id'])) {
                $query .= ' WHERE 
                    q.author_id = :author_id 
                AND 
                    q.category_id = :category_id';
            } else if(isset($_GET['author_id'])) {
                $query .= ' WHERE
                    q.author_id = :author_id';
            } else if(isset($_GET['category_id'])) {
                $query .= ' WHERE
                    q.category_id = :category_id';
            }

            // Prepared statement
            $stmt = $this->conn->prepare($query);

            // Bind params if used
            if(isset($_GET['author_id'])) {
                $stmt->bindParam(':author_id', $_GET['author_id']);
            }
            if(isset($_GET['category_id'])) {
                $stmt->bindParam(':category_id', $_GET['category_id']);
            }

            // Order results
            $query .= ' ORDER BY
                q.id DESC';

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Read Single Quote
        public function read_single() {

        }

        // Create Quote
        public function create() {
            // Create query
            $query = 'SELECT
            '
        }

        // Update Quote
        public function update() {

        }

        // Delete Quote
        public function delete() {
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
    }