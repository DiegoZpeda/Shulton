<?php
include_once('config.php');

class Mapa {
    private $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno) {
            exit("Fallo la conexión a la base de datos: " . $this->db->connect_error);
        }
        $this->db->set_charset(DB_CHARSET);
    }

    public function getAllMapas() {
        $sql = "SELECT * FROM tbl_mapa";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addMapa($nombre, $latitud, $longitud, $precio, $imagen, $horario, $capacidad, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO tbl_mapa (nombre, latitud, longitud, precio, imagen, horario, capacidad, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sddsssss", $nombre, $latitud, $longitud, $precio, $imagen, $horario, $capacidad, $descripcion);
        return $stmt->execute();
    }    

    public function updateMapa($id, $nombre, $latitud, $longitud, $precio, $imagen, $horario, $capacidad, $descripcion) {
        $stmt = $this->db->prepare("UPDATE tbl_mapa SET nombre = ?, latitud = ?, longitud = ?, precio = ?, imagen = ?, horario = ?, capacidad = ?, descripcion = ? WHERE mapa_id= ?");
        $stmt->bind_param("sdddssssi", $nombre, $latitud, $longitud, $precio, $imagen, $horario, $capacidad, $descripcion, $id);
        return $stmt->execute();
    }

    public function deleteMapa($id) {
        $stmt = $this->db->prepare("DELETE FROM tbl_mapa WHERE mapa_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>

