Final Web2 2021-02-25

3)a)

Cambios en la base de datos

	Agregar una nueva tabla Usuario
	Agregar campo a la tabla de pasaje user_id
	Agregar nueva tabla Califiicacion que contenga id_viaje(int), descripcion(varchar), puntaje(int)

Cambios en MVC


	Para las calificaciones y el usuario se deberia realizar una especie de abm lo cual requeriria
	generar controller, model y vista para ambos
	Se deberia agregar dentro de la query de insercion de pasaje, el nuevo campo de user_id
	Darle la opcion al usuario desde la vista de cancelar un pasaje, se deberia eliminar el pasaje de la db



Con esto podriamos llamar desde el modelo a la base de datos con una query tipo
SELECT * from pasajes where user_id=(al id deseado)

Esto nos traeria un listado con todos los datos de los pasajes el cual le pasariamos
al controlador, que llamaria a la vista para mostrar estos datos en una tabla o elemento deseado

![alt text](https://github.com/Ezefalcon/web2-final/blob/master/diagram.png?raw=true)

Los nuevos componentes tendrian la funcionalidad de poder crear, modificar, eliminar y consultar los datos
de los usuarios y las calificaciones

b)

Se deberia exponer estos endpoints agregando estas rutas en
la configuracion, para que llame a los metodos dados

Los endpoints expuestos serian los siguientes

POST api/calificacion
    
    Guarda una calificacion

DELETE api/calificacion

    Elmimina una calificacion

GET api/calificacion

    Trae todas las calificaciones

GET api/calificacion/{id}

    Trae una calificacion con determinado id

c) 
Otros servicios web que podria ofrecer:

Buscador de viajes en oferta

    Podría ser muy util para gente de bajos recursos que este
    buscando viajar
    Un ejemplo de uso podría ser cuando un usuario quiere irse de vacaciones
    y esta buscando precios bajos para ello
    O para viajes de trabajo baratos

Endpoints:

    api/viaje/ofertas (POST, GET, UPDATE)

Un ejemplo de un GET traeria una lista de viajes en oferta

Buscador de ciudades en cuarentena y tiempo estimado de cuarentena

    Podria ser util para gente que este buscando irse a vacacionar
    a determinada ciudad y necesite saber por cuanto tiempo duraria la cuarentena
    Un ejemplo de uso, determinado usuario necesita ir por viaje de trabajo
    a una ciudad en cuarentena, y este servicio deberia responder con un estimativo
    O un usuario que busque todas las ciudades que no estan en cuarentena actualmente.

Endpoints:

    api/ciudad?aspo=true -> traeria todas las ciudades que esten en cuarentena
                            o se podria realizar a traves de un body tambien
                            para realizar consultas mas complejas

