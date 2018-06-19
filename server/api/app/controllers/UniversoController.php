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
    
        public function getAction()
    {
        $this->view->disable();
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikeyAction($apikey);
        $phql = 'SELECT Universo.id_universo, Universo.nombre, Universo.imagen, Universo.descripcion, P1.nombre AS dios, P2.nombre AS angel, P3.nombre AS kaioshin FROM Universo INNER JOIN Personaje P1 ON Universo.dios = P1.id_personaje INNER JOIN Personaje P2 ON P2.id_personaje = Universo.angel INNER JOIN Personaje P3 ON P3.id_personaje = Universo.kaioshin';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_universo'   => $row->id_universo,
                'name'          => $row->nombre,
                'img'           => $row->imagen,
                'descripcion'   => $row->descripcion,
                'god'           => $row->dios,
                'angel'         => $row->angel,
                'kaioshin'      => $row->kaioshin
                
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
        $phql = 'SELECT Universo.id_universo, Universo.nombre, Universo.imagen, Universo.descripcion, P1.nombre AS dios, P2.nombre AS angel, P3.nombre AS kaioshin FROM Universo INNER JOIN Personaje P1 ON Universo.dios = P1.id_personaje INNER JOIN Personaje P2 ON P2.id_personaje = Universo.angel INNER JOIN Personaje P3 ON P3.id_personaje = Universo.kaioshin
          WHERE Universo.id_universo = :parameter:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_universo'   => $row->id_universo,
                'name'          => $row->nombre,
                'img'           => $row->imagen,
                'descripcion'   => $row->descripcion,
                'god'           => $row->dios,
                'angel'         => $row->angel,
                'kaioshin'      => $row->kaioshin
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

}

