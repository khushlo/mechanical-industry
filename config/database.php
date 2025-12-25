<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;
    private $conn;

    public function __construct() {
        // Use Railway environment variables or fallback to local
        $this->host = $_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST') ?? 'localhost';
        $this->port = $_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT') ?? '3306';
        $this->username = $_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER') ?? 'root';
        $this->password = $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD') ?? '';
        $this->database = $_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE') ?? 'mechanical_industry';

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";
            
            // PDO options
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            
            // Add SSL options only if constants are available (for compatibility)
            if (defined('PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT')) {
                $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
            }
            
            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                $options
            );
        } catch(PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            die("Connection failed. Please check configuration.");
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            return false;
        }
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }
}
?>