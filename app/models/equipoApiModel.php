<?php
require_once 'config/config.php';

class EquipoApiModel{
    private PDO $db;

    public function __construct()
    {
       $this->db = new PDO("mysql:host".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    public function getAll($orderBy = false, $order = 'ASC') {

        $sql = 'SELECT equipos.*, zona.nombre AS zona_nombre FROM equipos JOIN zona ON equipos.id_zona = zona.id';

        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre ' . $order;
                    break;
                case 'estadio':
                    $sql .= ' ORDER BY estadio ' . $order;
                    break;
                case 'capitan':
                    $sql .= ' ORDER BY capitan ' . $order;
                    break;
                case 'id':
                    $sql .= ' ORDER BY id ' . $order;
                    break;
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {

        $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $estadio, $clasico, $capitan, $id_zona) {

        $query = $this->db->prepare('INSERT INTO equipos(nombre, estadio, clasico, capitan, id_zona) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$nombre, $estadio, $clasico, $capitan, $id_zona]);

        return $this->db->lastInsertId();
    }

    public function update($id, $nombre, $estadio, $clasico, $capitan, $id_zona) {

        $query = $this->db->prepare('UPDATE equipos SET nombre = ?, estadio = ?, clasico = ?, capitan = ?, id_zona = ? WHERE id = ?');
        $query->execute([$nombre, $estadio, $clasico, $capitan, $id_zona, $id]);
    }

    public function delete($id) {

        $query = $this->db->prepare('DELETE FROM equipos WHERE id = ?');
        $query->execute([$id]);
    }
}
