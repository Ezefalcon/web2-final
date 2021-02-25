<?php

//Viaje(id: int,
//    nro_viaje: varchar,
//    día: date, hora: time,
//    empresa: varchar: int;
//		id_ciudad_origen: int,
//		id_ciudad_destino: int)
class ViajeModel extends DbConnect {

    /**
     * ViajeModel constructor.
     */
    function __construct(){
        parent::__construct();
    }

    function getById($viajeId) {
        $sentence = $this->db->prepare("SELECT * FROM ciudad where id=?");
        $sentence->execute(array($viajeId));
        return $sentence->fetch(PDO::FETCH_ASSOC);
    }

    function deleteById($viajeId) {
        $sentence = $this->db->prepare("DELETE FROM ciudad where id=?");
        $sentence->execute(array($viajeId));
    }

    public function findAllWithCitiesNames(){
        $sentence = $this->db->prepare("SELECT c.nombre as origen, c2.nombre as destino, v.nro_viaje, v.día, v.hora
                                                from viaje v
                                                join Ciudad c on v.id_ciudad_origen=c.id
                                                join Ciudad c2 on v.id_ciudad_destino=c2.id");
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_ASSOC);
    }
}