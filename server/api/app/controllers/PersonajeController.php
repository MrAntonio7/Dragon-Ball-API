<?php

class PersonajeController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    
    public function checkApikeyAction(){
        
    }
    
        public function proxy_apikeyAction($mykey){
        $this->view->disable();
        $phql = 'SELECT
            apikey
          FROM Usuario';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $apikeys = Array();
            array_push($apikeys, $row->apikey);
            $data[] = [
                'apikey' => $row->apikey
            ];
        }
        $response = [];
        foreach ($data as $a){
            foreach ($a as $key){
                array_push($response, $key);
            }
        }
        foreach ($response as $key){
            if($mykey == $key){
                $var_final = true;
                break;
            }else{
                $var_final = false;
            }
        }
        return $var_final;
    }
    
        public function getAction()
    {
        $this->view->disable();
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikeyAction($apikey);
        $phql = 'SELECT 
            Personaje.id_personaje,
            Personaje.nombre,
            Personaje.genero, 
            Personaje.imagen, 
            Personaje.peso, 
            Personaje.altura, 
            Personaje.nacimiento, 
            Personaje.muerte, 
            Personaje.resurreccion, 
            Personaje.ocupacion, 
            Personaje.alianzas, 
            Personaje.descripcion, 
            Raza.nombre AS raza,
            Fusion.nombre AS fusiones,
            Transformacion.nombre AS transformaciones,
            Saga.nombre AS aparicion,
            Planeta.nombre AS planetaorigen 
          FROM Personaje 
          INNER JOIN Raza ON Raza.id_raza = Personaje.id_raza
          INNER JOIN Fusion ON Fusion.id_personaje1 = Personaje.id_personaje 
          OR Fusion.id_personaje2 = Personaje.id_personaje
          INNER JOIN TransformacionPersonaje ON TransformacionPersonaje.id_personaje = Personaje.id_personaje
          INNER JOIN Transformacion ON TransformacionPersonaje.id_transformacion = Transformacion.id_transformacion
          INNER JOIN AparicionPersonaje ON AparicionPersonaje.id_personaje = Personaje.id_personaje
          INNER JOIN Saga ON Saga.id_saga = AparicionPersonaje.id_saga
          INNER JOIN Planeta ON Planeta.id_planeta = Raza.id_planeta';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_character'    => $row->id_personaje,
                'name'            => $row->nombre,
                'race'            => $row->raza,
                'gener'           => $row->genero,
                'img'             => $row->imagen,
                'weight'          => $row->peso,
                'height'          => $row->altura,
                'bith'            => $row->nacimiento,
                'dead'            => $row->muerte,
                'resurrection'    => $row->resurreccion,
                'job'             => $row->ocupacion,
                'alliances'       => $row->alianzas,
                'description'     => $row->descripcion,
                'fusion'          => $row->fusiones,
                'transformations' => $row->transformaciones,
                ''      => $row->aparicion,
                'planet'          => $row->planetaorigen
                
            ];
        }
        $response = new Phalcon\Http\Response();

        if ($proxy){
        $response->setJsonContent(array(
            'status' => 'FOUND',
            'statusCode' => '302',
            'data' => $data
        ));
        } else{
            $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'error' => 'Unauthorized',
            'description' => 'No API key provided.',
            'aa' => $proxy
        ));
        }
        
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        return $response;
        //return json_encode($data, JSON_UNESCAPED_UNICODE);
        
    }

       public function getbyidAction()
    {
        $this->view->disable();
        $parameter = $this->dispatcher->getParam("id");
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikeyAction($apikey);
        $phql = 'SELECT 
            Personaje.id_personaje,
            Personaje.nombre,
            Personaje.genero, 
            Personaje.imagen, 
            Personaje.peso, 
            Personaje.altura, 
            Personaje.nacimiento, 
            Personaje.muerte, 
            Personaje.resurreccion, 
            Personaje.ocupacion, 
            Personaje.alianzas, 
            Personaje.descripcion, 
            Raza.nombre AS raza,
            Fusion.nombre AS fusiones,
            Transformacion.nombre AS transformaciones,
            Saga.nombre AS aparicion,
            Planeta.nombre AS planetaorigen 
          FROM Personaje 
          INNER JOIN Raza ON Raza.id_raza = Personaje.id_raza
          INNER JOIN Fusion ON Fusion.id_personaje1 = Personaje.id_personaje 
          OR Fusion.id_personaje2 = Personaje.id_personaje
          INNER JOIN TransformacionPersonaje ON TransformacionPersonaje.id_personaje = Personaje.id_personaje
          INNER JOIN Transformacion ON TransformacionPersonaje.id_transformacion = Transformacion.id_transformacion
          INNER JOIN AparicionPersonaje ON AparicionPersonaje.id_personaje = Personaje.id_personaje
          INNER JOIN Saga ON Saga.id_saga = AparicionPersonaje.id_saga
          INNER JOIN Planeta ON Planeta.id_planeta = Raza.id_planeta
          WHERE Personaje.id_personaje = :parameter:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_character'    => $row->id_personaje,
                'name'            => $row->nombre,
                'race'            => $row->raza,
                'gener'           => $row->genero,
                'img'             => $row->imagen,
                'weight'          => $row->peso,
                'height'          => $row->altura,
                'bith'            => $row->nacimiento,
                'dead'            => $row->muerte,
                'resurrection'    => $row->resurreccion,
                'job'             => $row->ocupacion,
                'alliances'       => $row->alianzas,
                'description'     => $row->descripcion,
                'fusion'          => $row->fusiones,
                'transformations' => $row->transformaciones,
                'apparition'      => $row->aparicion,
                'planet'          => $row->planetaorigen
            ];
        }
        $response = new Phalcon\Http\Response();

        if ($proxy){
        $response->setJsonContent(array(
            'status' => 'FOUND',
            'statusCode' => '302',
            'data' => $data
        ));
        } else{
            $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'error' => 'Unauthorized',
            'description' => 'No API key provided.'
        ));
        }
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        return $response;
        //return json_encode($data, JSON_UNESCAPED_UNICODE);
        
    }

    //POST personajes

    public function postAction()
    {
        $this->view->disable();
        //$request = new Request;
        $data = $this->request->getRawBody();
        $row = json_decode($data);

        $phql = 'INSERT INTO Personaje (id_personaje, nombre, id_raza, genero, imagen, peso, altura, nacimiento, muerte, resurreccion, ocupacion, alianzas, descripcion) VALUES (:id_personaje:, :nombre:, :id_raza:, :genero:, :imagen:, :peso:, :altura:, :nacimiento:, :muerte:, :resurreccion:, :ocupacion:, :alianzas:, :descripcion:)';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [

                'id_personaje' => $row->id_personaje,
                'nombre'       => $row->nombre,
                'id_raza'      => $row->id_raza,
                'genero'       => $row->genero,
                'imagen'       => $row->imagen,
                'peso'         => $row->peso,
                'altura'       => $row->altura,
                'nacimiento'   => $row->nacimiento,
                'muerte'       => $row->muerte,
                'resurreccion' => $row->resurreccion,
                'ocupacion'    => $row->ocupacion,
                'alianzas'     => $row->alianzas,
                'descripcion'  => $row->descripcion

            ]
        );

        $response = new \Phalcon\Http\Response();

        if ($status->success() === true) {

            $response->setStatusCode(201, 'Creado');

            $row->id_personaje = $status->getModel()->id;

            $response->setJsonContent(
                [
                    'status' => 'OK',
                    'data'   => $row,
                ]
            );
        } else {

            $response->setStatusCode(409, 'Conflicto');

            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;

    }

    //PUT personajes

    public function putAction()
    {
        $this->view->disable();
        //$request = new Request;
        $data = $this->request->getRawBody();
        $row = json_decode($data);
        global $id_personaje;
        $id_personaje = $this->dispatcher->getParam('param');


        $phql = 'UPDATE Personaje SET 
        nombre = :nombre:,
        id_raza = :id_raza:,
        genero  = :genero:,
        imagen  = :imagen:,
        peso    = :peso:,
        altura  = :altura:,
        nacimiento = :nacimiento:,
        muerte = :muerte:,
        resurreccion = :resurreccion:,
        ocupacion = :ocupacion:,
        alianzas = :alianzas:,
        descripcion = :descripcion:
        WHERE id_personaje = :id_personaje:';

        $status = $this->modelsManager->executeQuery(
            $phql,
            [

                'nombre'       => $row->nombre,
                'id_raza'      => $row->id_raza,
                'genero'       => $row->genero,
                'imagen'       => $row->imagen,
                'peso'         => $row->peso,
                'altura'       => $row->altura,
                'nacimiento'   => $row->nacimiento,
                'muerte'       => $row->muerte,
                'resurreccion' => $row->resurreccion,
                'ocupacion'    => $row->ocupacion,
                'alianzas'     => $row->alianzas,
                'descripcion'  => $row->descripcion,
                'id_personaje' => $id_personaje

            ]
        );

        $response = new Response();

        if ($status->success() === true) {

            $response->setStatusCode(201, 'Creado');

            $row->id_personaje = $status->getModel()->id_personaje;

            $response->setJsonContent(
                [
                    'status' => 'OK',
                ]
            );
        } else {

            $response->setStatusCode(409, 'Conflicto');

            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;

    }

    //DELETE personaje

    public function deleteAction()
    {
        $this->view->disable();
        //$request = new Request;
        $data = $this->request->getRawBody();
        $row = json_decode($data);
        global $id_personaje;
        $id_personaje = $this->dispatcher->getParam('param');

        $phql = 'DELETE FROM Personaje WHERE id_personaje = :id_personaje:';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [
                'id_personaje'    => $id_personaje
            ]
        );

        $response = new Response();

        if ($status->success() === true) {

            $response->setStatusCode(201, 'Creado');

            $row->id_personaje = $status->getModel()->id_personaje;

            $response->setJsonContent(
                [
                    'status' => 'OK',
                ]
            );
        } else {

            $response->setStatusCode(409, 'Conflicto');

            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;

    }


}

