<?php
require_once '../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

   

    public function register($nombre, $documento, $email, $fecha, $telefono, $contrasena) {
        $query = "INSERT INTO usuarios (nombre_completo, documento, email, fecha_nacimiento, telefono, contrasena)
                  VALUES (:nombre, :documento, :email, :fecha, :telefono, :contrasena)";
    
        $stmt = $this->conn->prepare($query);
    
        try {
            // Intentar ejecutar la consulta
            $result = $stmt->execute([
                ':nombre' => $nombre,
                ':documento' => $documento,
                ':email' => $email,
                ':fecha' => $fecha,
                ':telefono' => $telefono,
                ':contrasena' => $contrasena
            ]);
    
            if ($result) {
                return true;  // Registro exitoso
            } else {
                throw new Exception('La consulta no fue ejecutada correctamente.');
            }
        } catch (PDOException $e) {
            // Mostrar mensaje específico en caso de error con la base de datos
            echo "Error en la base de datos: " . $e->getMessage();
            return false;  // Error en la consulta SQL
        } catch (Exception $e) {
            // Mostrar otros posibles errores
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function login($apellido, $documento) {
        $query = "SELECT * FROM usuarios WHERE nombre_completo LIKE :apellido AND numero_documento = :documento LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([
            ':apellido' => "%$apellido%",
            ':documento' => $documento
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
