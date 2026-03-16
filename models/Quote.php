<?php
    class Quote {
        // DB
        private $conn;
        private $table = 'quotes';

        // Quote Properties
        public $id;
        public $quote
        public $author_id;
        public $category_id;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Read Quote
        public function read() {

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