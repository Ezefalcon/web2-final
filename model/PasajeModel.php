<?php

//Pasaje(	id: int,
//    dni: varchar,
//    cantidad: int,
//    cancelado: boolean,
//    id_viaje: int)
class PasajeModel extends DbConnect {

    /**
     * PasajeModel constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function updateCanceladoToTrueByViajeId($viajeId) {
        $sentence = $this->db->prepare("UPDATE pasaje SET cancelado=TRUE where id_viaje=?");
        $sentence->execute(array($viajeId));
    }
}
