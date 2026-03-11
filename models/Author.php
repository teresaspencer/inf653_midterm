<?php
    class Author {
        // DB
        private $conn;
        private $table = 'authors';

        // Authors Properties
        public $id;
        public $author;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Authors
        public function read() {
            // Create query
            $query = 'SELECT
                author
                id
            FROM
                ' . $this->table . ' authors
            ORDER BY
                id DESC';

            // Prepared statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Get Single Author
        public function read_single() {
            // Create query
            $query = 'SELECT
                author
                id
            FROM
                ' . $this->table . ' authors
            WHERE
                id = ?';

            // Prepared statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Create Author
        public function create() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    author = :author,
                    id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }
            // Print error if something goes wrong
            printf('Error: %s.\n', $stmt->error);

            return false;
        }

        // Update Author
        public function update() {
            // Create query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    author = :author,
                    id = :id
                WHERE
                    id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }
            // Print error if something goes wrong
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
        
        // Delete Author
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
            // Print error if something goes wrong
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }