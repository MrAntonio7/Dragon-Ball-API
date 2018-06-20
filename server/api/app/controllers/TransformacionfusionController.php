<?php

class TransformacionfusionController extends \Phalcon\Mvc\Controller
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
        $phql = 'SELECT * FROM TransformacionFusion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_transformation'        => $row->id_transformacion,
                'id_fusion'           => $row->id_fusion,
                
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
        $parameter2 = $this->dispatcher->getParam("id2");
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikeyAction($apikey);
        $phql = 'SELECT * FROM TransformacionFusion
          WHERE TransformacionFusion.id_transformacion = :parameter: AND 
          TransformacionFusion.id_fusion = :parameter2:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter,
            'parameter2' => $parameter2
            
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_transformation'      => $row->id_transformacion,
                'id_fusion'           => $row->id_fusion,
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
    
    //POST transformacion_fusion
         public function postAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $response = new \Phalcon\Http\Response();


            $phql = 'INSERT INTO TransformacionFusion (id_transformacion, id_fusion) VALUES (:id_transformacion:, :id_fusion:)';
            $status = $this->modelsManager->executeQuery(
                $phql,
                [
                'id_transformacion'      => $row->id_transformacion,
                'id_fusion'           => $row->id_fusion,
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

    //PUT transformacion_fusion

    public function putAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_transformacion = $this->dispatcher->getParam('id1');
        $id_fusion = $this->dispatcher->getParam('id2');
        
        $phql1 = 'DELETE FROM TransformacionFusion WHERE id_transformacion = :id_transformacion: AND id_fusion = :id_fusion:';
        $status1 = $this->modelsManager->executeQuery(
            $phql1,
            [
                'id_transformacion'    => $id_transformacion,
                'id_fusion'    => $id_fusion
            ]
        );

            $phql2 = 'INSERT INTO TransformacionFusion (id_transformacion, id_fusion) VALUES (:id_transformacion:, :id_fusion:)';
            $status2 = $this->modelsManager->executeQuery(
                $phql2,
                [
                'id_transformacion'      => $row->id_transformacion,
                'id_fusion'           => $row->id_fusion,
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

    //DELETE transformacion_fusion

    public function deleteAction()
    {
        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $apikey = $_REQUEST['apikey'];
        $proxy = $this->proxy_apikey_adminAction($apikey);
        $id_transformacion = $this->dispatcher->getParam('id1');
        $id_fusion = $this->dispatcher->getParam('id2');
        $phql = 'DELETE FROM TransformacionFusion WHERE id_transformacion = :id_transformacion: AND id_fusion = :id_fusion:';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [
                'id_transformacion'    => $id_transformacion,
                'id_fusion'    => $id_fusion
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

