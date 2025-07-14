<?php

class Database
{
    private $db;
    private $hostname;
    private $username;
    private $password;
    private $database;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->hostname};dbname={$this->database};";
            $this->db = new PDO($dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        } catch (PDOException $e) {
            echo "server-down" . $e->getMessage();
        }
    }

    public function storeCarRentalData($name, $email, $offer, $contact, $pickup, $return_date, $car_comment)
    {
        try {
            $query = $this->db->prepare("INSERT INTO booking (name, email, offer, contact, pickup, return_date, car_comment ) VALUES (?,?,?,?,?,?,?)");
            $query->bindParam(1, $name);
            $query->bindParam(2, $email);
            $query->bindParam(3, $offer);
            $query->bindParam(4, $contact);
            $query->bindParam(5, $pickup);
            $query->bindParam(6, $return_date);
            $query->bindParam(7, $car_comment);


            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo "Failed to insert into table" . $e->getMessage();
        }
    }

    public function  getAllRentals()
    {
        try {
            $query = $this->db->query("SELECT * FROM booking WHERE 1");
            $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Failed to fetch rentals" . $e->getMessage();
        }
    }
}
