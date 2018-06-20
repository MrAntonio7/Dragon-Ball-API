<?php

class PlanetaController extends \Phalcon\Mvc\Controller
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
        $phql = 'SELECT Planeta.id_planeta, Planeta.nombre, Planeta.imagen, Planeta.descripcion, Planeta.id_universo, Universo.nombre AS universo FROM Planeta INNER JOIN Universo ON Universo.id_universo = Planeta.id_planeta';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_planet'      => $row->id_planeta,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'description'    => $row->descripcion,
                'id_universe'    => $row->id_universo,
                'universe'       => $row->universo
                
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
        $phql = 'SELECT Planeta.id_planeta, Planeta.nombre, Planeta.imagen, Planeta.descripcion, Planeta.id_universo, Universo.nombre AS universo FROM Planeta INNER JOIN Universo ON Universo.id_universo = Planeta.id_planeta
          WHERE Planeta.id_planeta = :parameter:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_planet'      => $row->id_planeta,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'description'    => $row->descripcion,
                'id_universe'    => $row->id_universo,
                'universe'       => $row->universo
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
    
    //POST planeta
    
         public function postAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $response = new \Phalcon\Http\Response();


            $phql = 'INSERT INTO Planeta (id_planeta, nombre, imagen, descripcion, id_universo) VALUES (:id_planeta:, :nombre:, :imagen:, :descripcion:, :id_universo:)';
            $status = $this->modelsManager->executeQuery(
                $phql,
                [
                'id_planeta'      => $row->id_planeta,
                'nombre'          => $row->nombre,
                'imagen'          => $row->imagen,
                'descripcion'     => $row->descripcion,
                'id_universo'     => $row->id_universo
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

    //PUT planeta

    public function putAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_planeta = $this->dispatcher->getParam('id');


        $phql = 'UPDATE Planeta SET
        nombre = :nombre:,
        imagen  = :imagen:,
        descripcion = :descripcion:,
        id_universo = :id_universo:
        WHERE id_planeta = :id_planeta:';

        $status = $this->modelsManager->executeQuery(
            $phql,
            [

                'nombre'          => $row->nombre,
                'imagen'          => $row->imagen,
                'descripcion'     => $row->descripcion,
                'id_universo'     => $row->id_universo,
                'id_planeta'       => $id_planeta

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

    //DELETE planeta
    public function deleteAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_planeta = $this->dispatcher->getParam('id');
        $phql = 'DELETE FROM Planeta WHERE id_planeta = :id_planeta:';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [
                'id_planeta'    => $id_planeta
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

