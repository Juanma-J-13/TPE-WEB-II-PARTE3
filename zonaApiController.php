<?php

require_once 'app/models/zonaApiModel.php';

class zonaApiController {

    private $model;

    public function __construct() {
        $this->model = new ZonaApiModel();
    }

    public function getAll($req, $res) {

        $orderBy = false;
        $order = 'ASC';

        if(isset($req->query->sort)) {
            $orderBy = $req->query->sort;
        }

        if(isset($req->query->order)) {
            $order = $req->query->order;
        }

        $zonas = $this->model->getAll($orderBy, $order);
        return $res->json($zonas, 200);
    }

    public function getById($req, $res) {

        $id = $req->params->id;
        $zona = $this->model->getById($id);

        if(!$zona) {
            return $res->json(
                "No existe la zona con id={$id}",
                404
            );
        }

        return $res->json($zona, 200);
    }

    public function create($req, $res) {

        if(empty($req->body->nombre) ||empty($req->body->descripcion)) {
            return $res->json('Faltan datos obligatorios', 400);
        }

        $id = $this->model->insert($req->body->nombre, $req->body->descripcion);
        $zona = $this->model->getById($id);

        return $res->json($zona, 201);
    }

    public function update($req, $res) {

        $id = $req->params->id;
        $zona = $this->model->getById($id);

        if(!$zona) {
            return $res->json("No existe la zona con id={$id}", 404);
        }

        if(empty($req->body->nombre) || empty($req->body->descripcion)) {
            return $res->json('Faltan datos obligatorios', 400);
        }

        $this->model->update($id, $req->body->nombre, $req->body->descripcion);
        $zonaActualizada = $this->model->getById($id);

        return $res->json($zonaActualizada, 200);
    }

    public function delete($req, $res) {

        $id = $req->params->id;
        $zona = $this->model->getById($id);

        if(!$zona) {
            return $res->json("No existe la zona con id={$id}", 404);
        }

        $this->model->delete($id);

        return $res->json("Zona eliminada correctamente", 200);
    }
}