<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "student_record";
    private $db;

    public function __construct($host, $user, $pass, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->connect();
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        } catch (PDOException $e) {
            echo "Error connecting to server: " . $e->getMessage();
        }
    }

    public function savedata($name, $age, $gender, $email, $program) {
        try {
            $query = $this->db->prepare("INSERT INTO student (name, age, gender, email, program) VALUES (?, ?, ?, ?, ?)");
            $query->bindParam(1, $name);
            $query->bindParam(2, $age);
            $query->bindParam(3, $gender);
            $query->bindParam(4, $email);
            $query->bindParam(5, $program);

            $query->execute();
        } catch (PDOException $e) {
            echo "Error saving data: " . $e->getMessage();
        }
    }

    public function updateData($id, $name, $age, $gender, $email, $program) {
        try {
            $query = $this->db->prepare("UPDATE student SET name = ?, age = ?, gender = ?, email = ?, program = ? WHERE id = ?");
            $query->bindParam(1, $name);
            $query->bindParam(2, $age);
            $query->bindParam(3, $gender);
            $query->bindParam(4, $email);
            $query->bindParam(5, $program);
            $query->bindParam(6, $id);

            $query->execute();
            echo "Record updated successfully!";
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }

    public function getStudentData() {
        try {
            $query = $this->db->query("SELECT * FROM student");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {    
                echo "Fetching data failed". $e->getMessage();
        }
    }
}
?>
