<?php
class Conexion {
    private $host = "localhost";
    private $dbname = "tienda";
    private $user = "root";
    private $password = "";
    private $conn;

    public function conectar() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}
?>

