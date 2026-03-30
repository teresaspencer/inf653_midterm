<?php
    class Database {
        // DB Params
        private $host = '';
        private $db_name = '';
        private $username = '';
        private $password = '';
        private $conn;

    public function __construct() {
        $this->host     = getenv('DB_HOST');
        $this->db_name  = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
    }

        // DB Connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('pgsql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username,
                $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                error_log('DB connection error: ' . $e->getMessage());
                http_response_code(500);
                echo json_encode(['message' => 'Database connection failed']);
                exit();
            }
            return $this->conn;
        }
    }
