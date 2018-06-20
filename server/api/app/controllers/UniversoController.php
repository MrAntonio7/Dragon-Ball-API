<?php

class UniversoController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

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
    
            public function proxy_apikey_adminAction($mykey){
        $this->view->disable();
        $phql = 'SELECT
            apikey
          FROM Usuario WHERE rol=:rol:';
        $rows = $this->modelsManager->executeQuery($phql,['rol'=>'admin']);
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
        $phql = 'SELECT Universo.id_universo, Universo.nombre, Universo.imagen, Universo.descripcion, Universo.dios, Universo.angel, Universo.kaioshin, P1.nombre AS dios_character, P2.nombre AS angel_character, P3.nombre AS kaioshin_character FROM Universo INNER JOIN Personaje P1 ON Universo.dios = P1.id_personaje INNER JOIN Personaje P2 ON P2.id_personaje = Universo.angel INNER JOIN Personaje P3 ON P3.id_personaje = Universo.kaioshin';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_universe'   => $row->id_universo,
                'name'          => $row->nombre,
                'img'           => $row->imagen,
                'description'   => $row->descripcion,
                'god'           => $row->dios,
                'angel'         => $row->angel,
                'kaioshin'      => $row->kaioshin,
                'god_name'           => $row->dios_character,
                'angel_name'         => $row->angel_character,
                'kaioshin_name'      => $row->kaioshin_character
                
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
        $phql = 'SELECT Universo.id_universo, Universo.nombre, Universo.imagen, Universo.descripcion, Universo.dios, Universo.angel, Universo.kaioshin, P1.nombre AS dios_character, P2.nombre AS angel_character, P3.nombre AS kaioshin_character FROM Universo INNER JOIN Personaje P1 ON Universo.dios = P1.id_personaje INNER JOIN Personaje P2 ON P2.id_personaje = Universo.angel INNER JOIN Personaje P3 ON P3.id_personaje = Universo.kaioshin
          WHERE Universo.id_universo = :parameter:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_universe'   => $row->id_universo,
                'name'          => $row->nombre,
                'img'           => $row->imagen,
                'description'   => $row->descripcion,
                'god'           => $row->dios,
                'angel'         => $row->angel,
                'kaioshin'      => $row->kaioshin,
                'god_name'           => $row->dios_character,
                'angel_name'         => $row->angel_character,
                'kaioshin_name'      => $row->kaioshin_character
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
    
    //POST universo
    
    public function postAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $response = new \Phalcon\Http\Response();


            $phql = 'INSERT INTO Universo (id_universo, nombre, imagen, descripcion, dios, angel, kaioshin) VALUES (:id_universo:, :nombre:, :descripcion:, :imagen:, :dios:, :angel:, :kaioshin:)';
            $status = $this->modelsManager->executeQuery(
                $phql,
                [
                'id_universo'     => $row->id_universo,
                'nombre'          => $row->nombre,
                'imagen'          => $row->imagen,
                'descripcion'     => $row->descripcion,
                'dios'            => $row->dios,
                'angel'           => $row->angel,
                'kaioshin'        => $row->kaioshin
                ]
            );

        if($proxy){
        $response->setJsonContent(array(
                'status' => 'OK',
                'statusCode' => '201'
        ));
        }else{
 

        $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'error' => 'Unauthorized',
            'description' => 'No API key provided.'
        ));
        }
    

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;

    }

    //PUT universo

    public function putAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_universo = $this->dispatcher->getParam('id');


        $phql = 'UPDATE Universo SET
        nombre = :nombre:,
        imagen  = :imagen:,
        descripcion = :descripcion:,
        dios = :dios:,
        angel = :angel:,
        kaioshin = :kaioshin:
        WHERE id_universo = :id_universo:';

        $status = $this->modelsManager->executeQuery(
            $phql,
            [

                'nombre'          => $row->nombre,
                'imagen'          => $row->imagen,
                'descripcion'     => $row->descripcion,
                'dios'            => $row->dios,
                'angel'           => $row->angel,
                'kaioshin'        => $row->kaioshin,
                'id_universo'     => $id_universo

            ]
        );

        $response = new \Phalcon\Http\Response();
        if($proxy){
        $response->setJsonContent(array(
                'status' => 'OK',
                'statusCode' => '201',
                'row' => $row
        ));
        }else{
 

        $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'error' => 'Unauthorized',
            'description' => 'No API key provided.'
        ));
        }
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

        return $response;

    }

    //DELETE universo

    public function deleteAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_universo = $this->dispatcher->getParam('id');
        $phql = 'DELETE FROM Universo WHERE id_universo = :id_universo:';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [
                'id_universo'    => $id_universo
            ]
        );

       $response = new \Phalcon\Http\Response();
        if($proxy){
        $response->setJsonContent(array(
                'status' => 'OK',
                'statusCode' => '201'
        ));
        }else{
 

        $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'error' => 'Unauthorized',
            'description' => 'No API key provided.'
        ));
        }
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

        return $response;

    }


}

