<?php
    class Quote {
        // DB
        private $conn;
        private $table = 'quotes';

        // Authors Properties
        public $id;
        public $author;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Quote
        public function create() {
            // Create query
            $query = 'SELECT
            '
        }

        // Delete Quote
        public function delete() {

        }

        // Read Quote
        public function read() {

        }

        // Read Single Quote
        public function read_single() {

        }

        // Update Quote
        public function update() {

        }
    }