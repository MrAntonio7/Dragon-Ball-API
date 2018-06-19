<?php

class FusionController extends \Phalcon\Mvc\Controller
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
        $phql = 'SELECT Fusion.id_fusion, Fusion.nombre, Fusion.imagen, Fusion.metodo, Fusion.descripcion, P1.nombre nombre_personaje1, P2.nombre nombre_personaje2, Saga.nombre aparicion, Transformacion.nombre transformacion FROM Fusion INNER JOIN Personaje P1 on Fusion.id_personaje1 = P1.id_personaje INNER JOIN Personaje P2 on Fusion.id_personaje2 = P2.id_personaje INNER JOIN AparicionFusion ON Fusion.id_fusion = AparicionFusion.id_fusion INNER JOIN Saga ON Saga.id_saga = AparicionFusion.id_saga INNER JOIN TransformacionFusion ON TransformacionFusion.id_fusion = Fusion.id_fusion INNER JOIN Transformacion ON Transformacion.id_transformacion = TransformacionFusion.id_transformacion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_fusion'      => $row->id_fusion,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'method'         => $row->metodo,
                'description'    => $row->descripcion,
                'character_1'    => $row->nombre_personaje1,
                'character_2'    => $row->nombre_personaje2,
                'apparition'      => $row->aparicion,
                'transformation' => $row->transformacion
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
        $phql = 'SELECT Fusion.id_fusion, Fusion.nombre, Fusion.imagen, Fusion.metodo, Fusion.descripcion, P1.nombre nombre_personaje1, P2.nombre nombre_personaje2, Saga.nombre aparicion, Transformacion.nombre transformacion FROM Fusion INNER JOIN Personaje P1 on Fusion.id_personaje1 = P1.id_personaje INNER JOIN Personaje P2 on Fusion.id_personaje2 = P2.id_personaje INNER JOIN AparicionFusion ON Fusion.id_fusion = AparicionFusion.id_fusion INNER JOIN Saga ON Saga.id_saga = AparicionFusion.id_saga INNER JOIN TransformacionFusion ON TransformacionFusion.id_fusion = Fusion.id_fusion INNER JOIN Transformacion ON Transformacion.id_transformacion = TransformacionFusion.id_transformacion
          WHERE Fusion.id_fusion = :parameter:';
        $rows = $this->modelsManager->executeQuery($phql, [
            'parameter' => $parameter
            ]);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'id_fusion'      => $row->id_fusion,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'method'         => $row->metodo,
                'description'    => $row->descripcion,
                'character_1'    => $row->nombre_personaje1,
                'character_2'    => $row->nombre_personaje2,
                'apparition'      => $row->aparicion,
                'transformation' => $row->transformacion
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

