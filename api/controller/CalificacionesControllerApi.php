<?php

class CalificacionesControllerApi extends Api {
    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new CalificacionesModel();
    }

    function getCalificaciones($param = null) {
        if(isset($param)) {
            $id = $param[0];
            $data = $this->model->findById($id);
        } else {
            $data = $this->model->findAll();
        }
        if(isset($data)) {
            return $this->json_response($data, 200);
        } else {
            return $this->json_response(null, 404);
        }
    }

    function deleteCalificationById($param = null) {
        if(isset($param)) {
            $id = $param[0];
            $data = $this->model->findById($id);
            if(isset($data)) {
                $this->model->deleteById($id);
                return $this->json_response($data, 200);
            }
        }
        return $this->json_response(null, 404);
    }

    function saveCalification() {
        $json = $this->getJSONData();
        $r = $this->model->save($json);
        return $this->json_response($r, 200);
    }

}