<?php

class ContactoController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    
    public function getmensajesAction(){
        $this->view->disable();
        
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $response = new \Phalcon\Http\Response();
        
         $phql = 'INSERT INTO Contacto (correo, asunto, mensaje) VALUES (:correo:, :asunto:, :mensaje:)';
        $status = $this->modelsManager->executeQuery(
        $phql,
                [

                    'correo'    => $row->email,
                    'asunto'    => $row->subject,
                    'mensaje'   => $row->text

                ]
            );

        
        $to      = "antonioalvarezmalagon@gmail.com";
        $subject = $row->subject;
        $message = "By: ".$row->email."\r\n".$row->text;

        mail($to, $subject, $message);
        
        $response->setJsonContent(
            [
                'status'   => 'OK',
                'new' => $new_password,
                'email' => $row->email
            ]
        );
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;
    }
    
}

