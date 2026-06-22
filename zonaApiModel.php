<?php
require_once 'config/config.php';

class ZonaApiModel {
    private PDO $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    public function getAll($orderBy = false, $order = 'ASC') {

        $sql = 'SELECT * FROM zona';

        if($orderBy) {
            switch($orderBy) {
                case 'id':
                    $sql .= ' ORDER BY id ' . $order;
                    break;
                case 'nombre':
                    $sql .= ' ORDER BY nombre ' . $order;
                    break;
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {

        $query = $this->db->prepare('SELECT * FROM zona WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $descripcion) {

        $query = $this->db->prepare('INSERT INTO zona(nombre, descripcion) VALUES (?, ?)');
        $query->execute([$nombre, $descripcion]);

        return $this->db->lastInsertId();
    }

    public function update($id, $nombre, $descripcion) {

        $query = $this->db->prepare('UPDATE zona SET nombre = ?, descripcion = ? WHERE id = ?');
        $query->execute([$nombre, $descripcion, $id]);
    }

    public function delete($id) {

        $query = $this->db->prepare('DELETE FROM zona WHERE id = ?');
        $query->execute([$id]);
    }
}