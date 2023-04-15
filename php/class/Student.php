<?php
require_once 'Database.php';

class Student {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function insertStudent(array $data): bool
    {
        try {
            $query = "INSERT INTO students (first_name, last_name, date_of_birth, course, gender, location) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $exception) {
            throw new Exception("Error in entering the student: " . $exception->getMessage());
        }
    }

    public function displayStudents() {
        try {
            $query = "SELECT * FROM students";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            throw new Exception("Error in the recovery of students: " . $exception->getMessage());
        }
    }
}
