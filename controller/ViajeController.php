<?php

class ViajeController
{
    private $viajeView;
    private $viajeModel;
    private $pasajeModel;

    function __construct()
    {
        $this->viajeView = new ViajeView();
        $this->viajeModel = new ViajeModel();
        $this->pasajeModel = new PasajeModel();
    }

    function deleteById()
    {
        $viajeId = $_POST['viajeId'];

        $viaje = $this->viajeModel->getById($viajeId);
        // Checkea que el usuario este logueado y sea administrador aunque si no es admin no deberia haber podido llegar a la pantalla
        if (isset($_SESSION['User']) && isset($_SESSION['admin'])) {
            // Checkea si el viaje existe
            if (isset($viaje)) {
                // Se elimina el viaje
                $this->viajeModel->deleteById($viajeId);
                // Se pone en cancelado los pasajes
                $this->pasajeModel->updateCanceladoToTrueByViajeId($viajeId);
            } else {
                $this->viajeView->showError("El viaje no existe");
            }
        } else {
            $this->viajeView->showError("El usuario no esta autenticado o no es administrador");
        }
    }

    function showCiudadTable() {
        $viajes = $this->viajeModel->findAllWithCitiesNames();
        $map = array();
        // Se hace un mapa teniendo como key el nombre de la ciudad y
        // como valor un arreglo que contiene la lista de viajes que le pertenecen
        foreach ($viajes as $viaje) {
            if(isset($map[$viaje.origen])) {
                array_push($map[$viaje.origen], $viaje);
            } else {
                array_push($map, [$viaje.origen => $viaje]);
            }
            if(isset($map[$viaje.destino])) {
                array_push($map[$viaje.destino], $viaje);
            } else {
                array_push($map, [$viaje.destino => $viaje]);
            }
        }
        // Para sacar la cantidad de viajes basta con ver que tamaño tiene el arreglo
        // de determinada ciudad desde la vista
        $this->viajeView->showCiudadTable($map);
    }

}