<?php

class TablesController extends \Phalcon\Mvc\Controller
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
        $data = [
            ['characters', 'personaje'],
            ['races', 'raza'],
            ['saga', 'saga'],
            ['planets', 'planeta'],
            ['fusions', 'fusion'],
            ['transformations', 'transformacion'],
            ['universes', 'universo'],
            ['apparition_character', 'aparicionpersonaje'],
            ['apparition_fusion', 'aparicionfusion'],
            ['apparition_transformation', 'apariciontransformacion'],
            ['apparition_race', 'aparicionraza'],
            ['transformation_character', 'aparicionpersonaje'],
            ['transformation_fusion', 'aparicionfusion'],
            ];
        
        $phql = 'SELECT * FROM Personaje';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_personaje = [];
        foreach ($rows as $row){
            $data_personaje[] = [
                'id_character'       => $row->id_personaje,
                'name'                => $row->nombre,
                'img'                 => $row->imagen,
                'id_race'             => $row->id_raza,
                'gener'               => $row->genero,
                'weight'              => $row->peso,
                'height'              => $row->altura,
                'birth'               => $row->nacimiento,
                'dead'                => $row->muerte,
                'resurrection'        => $row->resurreccion,
                'job'                 => $row->ocupacion,
                'alliances'           => $row->alianzas,
                'description'         => $row->descripcion
            ];
        }
        
        $phql = 'SELECT * FROM Planeta';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_planeta = [];
        foreach ($rows as $row){
            $data_planeta[] = [
                'id_planet'        => $row->id_planeta,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'description'          => $row->descripcion,
                'id_universe'            => $row->id_universo
                
            ];
        }
        
        $phql = 'SELECT * FROM Raza';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_raza = [];
        foreach ($rows as $row){
            $data_raza[] = [
                'id_race'        => $row->id_raza,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'description'    => $row->descripcion,
                'id_planet'      => $row->id_planeta
                
            ];
        }
        
        $phql = 'SELECT * FROM Saga';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_saga = [];
        foreach ($rows as $row){
            $data_saga[] = [
                'id_saga'        => $row->id_saga,
                'name'           => $row->nombre,
                'img'            => $row->imagen,
                'start'          => $row->inicio,
                'end'            => $row->fin,
                'description'    => $row->descripcion,
                'episodes'       => $row->episodios
                
            ];
        }
        
        $phql = 'SELECT * FROM Universo';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_universo = [];
        foreach ($rows as $row){
            $data_universo[] = [
                'id_universe'        => $row->id_universo,
                'name'               => $row->nombre,
                'img'                => $row->imagen,
                'description'        => $row->descripcion,
                'god'                => $row->dios,
                'angel'              => $row->angel,
                'kaioshin'           => $row->kaioshin,
                
            ];
        }
        
        $phql = 'SELECT * FROM Fusion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_fusion = [];
        foreach ($rows as $row){
            $data_fusion[] = [
                'id_fusion'       => $row->id_fusion,
                'name'            => $row->nombre,
                'img'             => $row->imagen,
                'id_character1'   => $row->id_personaje1,
                'id_character2'   => $row->id_personaje2,
                'description'     => $row->descripcion,
                'method'          => $row->metodo
                
            ];
        }
        
        $phql = 'SELECT * FROM Transformacion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_transformacion = [];
        foreach ($rows as $row){
            $data_transformacion[] = [
                'id_transformation'       => $row->id_transformacion,
                'name'                    => $row->nombre,
                'img'                     => $row->imagen,
                'description'             => $row->descripcion,
                'color'                   => $row->color
                
            ];
        }
        
        $phql = 'SELECT * FROM TransformacionFusion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_tf = [];
        foreach ($rows as $row){
            $data_tf[] = [
                'id_transformation'     => $row->id_transformacion,
                'id_fusion'             => $row->id_fusion,
                
            ];
        }
        
        $phql = 'SELECT * FROM TransformacionPersonaje';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_tp = [];
        foreach ($rows as $row){
            $data_tp[] = [
                'id_transformation'     => $row->id_transformacion,
                'id_character'             => $row->id_personaje,
                
            ];
        }
        
        $phql = 'SELECT * FROM AparicionPersonaje';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_ap = [];
        foreach ($rows as $row){
            $data_ap[] = [
                'id_saga'       => $row->id_saga,
                'id_character'  => $row->id_personaje,
                
            ];
        }
        
        $phql = 'SELECT * FROM AparicionFusion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_af = [];
        foreach ($rows as $row){
            $data_af[] = [
                'id_saga'       => $row->id_saga,
                'id_fusion'     => $row->id_fusion,
                
            ];
        }
        
        $phql = 'SELECT * FROM AparicionRaza';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_ar = [];
        foreach ($rows as $row){
            $data_ar[] = [
                'id_saga'       => $row->id_saga,
                'id_race'       => $row->id_raza,
                
            ];
        }
        
        $phql = 'SELECT * FROM AparicionTransformacion';
        $rows = $this->modelsManager->executeQuery($phql);
        $data_at = [];
        foreach ($rows as $row){
            $data_at[] = [
                'id_saga'              => $row->id_saga,
                'id_transformation'    => $row->id_transformacion,
                
            ];
        }
        
        $response = new Phalcon\Http\Response();

        if ($proxy){
        $response->setJsonContent(array(
            'status' => 'FOUND',
            'statusCode' => '302',
            'tables' => $data,
            'saga' => $data_saga,
            'character' =>$data_personaje,
            'planet' =>$data_planeta,
            'race' => $data_raza,
            'universe' => $data_universo,
            'fusion' => $data_fusion,
            'transformation' => $data_transformacion,
            'transformation_fusion' =>$data_tf,
            'transformation_character' =>$data_tp,
            'apparition_character' =>$data_ap,
            'apparition_fusion' =>$data_af,
            'apparition_race' =>$data_ar,
            'apparition_transformation' =>$data_at
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

