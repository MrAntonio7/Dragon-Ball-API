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
    
        public function getAction()
    {
        $this->view->disable();
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikeyAction($apikey);
        $phql = 'SELECT Planeta.id_planeta, Planeta.nombre, Planeta.imagen, Planeta.descripcion, Universo.nombre AS universo FROM Planeta INNER JOIN Universo ON Universo.id_universo = Planeta.id_planeta';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_planet'      => $row->id_planeta,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'description'    => $row->descripcion,
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
        $phql = 'SELECT Planeta.id_planeta, Planeta.nombre, Planeta.imagen, Planeta.descripcion, Universo.nombre AS universo FROM Planeta INNER JOIN Universo ON Universo.id_universo = Planeta.id_planeta
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


}

