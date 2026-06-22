<?php
require_once 'app/models/equipoApiModel.php';

class equipoApiController{
    private $model;

    public function __construct()
    {
        $this->model = new EquipoApiModel();
    }

    public function getAll($req, $res){
        if(!$this->model){
            $this->model = new EquipoApiModel();
        }

        $orderBy = false;
        $order = 'ASC';

        if(isset($req->query->sort)){
            $orderBy = $req->query->sort;
        }
        if(isset($req->query->order)){
            $order =$req->query->order;
        }

        $equipos = $this->model->getAll($orderBy, $order);
        return $res->json($equipos, 200);
    }

    public function getById($req, $res) {
        if (!$this->model) {
            $this->model = new EquipoApiModel();
        }

        $id = $req->params->id;
        $equipo = $this->model->getById($id);

        if(!$equipo) {
            return $res->json("No existe el equipo con el id={$id}", 404);
        }

        return $res->json($equipo, 200);
    }

    public function create($req, $res) {
        if (!$this->model) { $this->model = new EquipoApiModel(); }

        if (empty($req->body->nombre) || empty($req->body->estadio) || empty($req->body->clasico) || empty($req->body->capitan) || empty($req->body->id_zona)) {
            return $res->json('Faltan datos obligatorios', 400);
        }

        $nombre = $req->body->nombre;
        $estadio = $req->body->estadio;
        $clasico = $req->body->clasico;
        $capitan = $req->body->capitan;
        $zona = $req->body->id_zona;

        $id = $this->model->insert($nombre, $estadio, $clasico, $capitan, $zona);

        if ($id) {
            $nuevoEquipo = $this->model->getById($id);
            return $res->json($nuevoEquipo, 201);
        } else {
            return $res->json("Error al insertar equipo", 500);
        }
    }

    public function update($req, $res) {
        $id = $req->params->id;
        $equipo = $this->model->getById($id);

        if (!$equipo) {
            return $res->json("No existe el equipo con el id={$id}", 404);
        }

        if (empty($req->body->nombre) || empty($req->body->estadio) || empty($req->body->clasico) || empty($req->body->capitan) || empty($req->body->id_zona)) {
            return $res->json('Faltan datos obligatorios', 400);
        }

        $nombre = $req->body->nombre;
        $estadio = $req->body->estadio;
        $clasico = $req->body->clasico;
        $capitan = $req->body->capitan;
        $zona = $req->body->id_zona;

        $this->model->update($id, $nombre, $estadio, $clasico, $capitan, $zona);

        $equipoActualizado = $this->model->getById($id);
        return $res->json($equipoActualizado, 200);
    }

    public function delete($req, $res){
        $id = $req->params->id;

        $equipo = $this->model->getById($id);

        if(!$equipo){
            return $res->json("No existe el equipo con id={$id}", 404);
        }

        $this->model->delete($id);
        return $res->json("Equipo eliminado correctamente", 200);
    }

}