<?php

class Database
{
    private $host;
    private $user;
    private $pass;
    private $database;
    public $db;
    public function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->connect();
    }
    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            $this->db = new  PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo '<p>Database connection successful.</p>';
            return $this->db;
        } catch (PDOException $e) {
            echo "Error connecting to server: " . $e->getMessage();
            // In production, log the error and show a generic message
            exit;
        }
    }

    public function savedata($username, $age, $gender, $email, $program)
    {
        echo '<p>savedata() called with: ' . htmlspecialchars($username) . ', ' . htmlspecialchars($age) . ', ' . htmlspecialchars($gender) . ', ' . htmlspecialchars($email) . ', ' . htmlspecialchars($program) . '</p>';
        try {
            $query = $this->db->prepare("INSERT INTO `student`(`username`, `age`, `gender`, `email`, `program`)
            VALUES (?,?,?,?,?)");
            $query->bindParam(1, $username);
            $query->bindParam(2, $age);
            $query->bindParam(3, $gender);
            $query->bindParam(4, $email);
            $query->bindParam(5, $program);
            // Executing the query 
            $query->execute();
            echo '<p>Insert executed successfully.</p>';
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            // In production, log the error and show a generic message
            return false;
        }
    }

    public function getStudentData()
    {
        try {
            $query = $this->db->query("SELECT * FROM `student`");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Fetch failed: " . $e->getMessage();
            // In production, log the error and show a generic message
            return [];
        }
    }
}
