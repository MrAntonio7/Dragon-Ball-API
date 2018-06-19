<?php

class UsuarioController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    
    function encryptIt( $q ) {
    $cryptKey  = 'Usuario registrado by admin';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

    function decryptIt( $q ) {
        $cryptKey  = 'Usuario registrado by admin';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
    
    public function keygenAction($n = 30)
    {
        $key = '';
        $inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));
        list($usec, $sec) = explode(' ', microtime());
        mt_srand((float) $sec + ((float) $usec * 100000));

        for($i=0; $i<$n; $i++)
        {
            $key .= $inputs{mt_rand(0,61)};
        }
        return $key;
    }

    public function list_emailsAction(){
        $this->view->disable();
        $phql = 'SELECT
            nombre,
            email
          FROM Usuario';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $emails = Array();
            array_push($emails, $row->email);
            $data[] = [
                'username' => $row->nombre,
                'email' => $row->email
            ];
        }
        return $data;
    }

    public function list_usernamesAction(){
        $this->view->disable();
        $phql = 'SELECT
            nombre,
            email
          FROM Usuario';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $usernames = Array();
            array_push($usernames, $row->nombre);
            $data[] = [
                'username' => $row->nombre,
                'email' => $row->email
            ];
        }
        return $data;
    }
    public function check_usernameAction(){
        $this->view->disable();
        //$request = $this->getDI()->get('request');
        //$consulta = 'SELECT * FROM Personaje ORDER BY id_personaje';

        $myheaders = $_SERVER;
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $usernames = $this->list_usernamesAction();
        
        $statusUsername;

        foreach ($usernames as $e){
            if ($e->username == $request->username){
                $statusUsername = false;
                break;
            }else{
                $statusUsername = true;
            }
        }

        $response = new Phalcon\Http\Response();

        $response->setJsonContent(array(
            'status' => 'FOUND',
            'statusCode' => '302',
            'statusUsername' => $statusUsername,
            'usernames'  => $usernames
        ));

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;
        //return json_encode($data, JSON_UNESCAPED_UNICODE);
        
    }

    public function check_emailAction(){
        $this->view->disable();
        //$request = $this->getDI()->get('request');
        //$consulta = 'SELECT * FROM Personaje ORDER BY id_personaje';


        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $emails = $this->list_emailsAction();
        
        $statusEmail;

        foreach ($emails as $e){
            if ($e->email == $request->email){
                $statusEmail = false;
                break;
            }else{
                $statusEmail = true;
            }
        }

        $response = new Phalcon\Http\Response();

        $response->setJsonContent(array(
            'status' => 'FOUND',
            'statusCode' => '302',
            'statusEmail' => $statusEmail,
            'emails'     => $emails
        ));

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;
        //return json_encode($data, JSON_UNESCAPED_UNICODE);
        
    }

    public function check_singinAction(){

        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $response = new Phalcon\Http\Response();
        $response->setJsonContent($this->check_userAction($request));

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;

    }

    public function check_userAction($request){
        $this->view->disable();
        $phql = 'SELECT 
            *
          FROM Usuario';
        $rows = $this->modelsManager->executeQuery($phql);
        $data = [];
        foreach ($rows as $row){
            $data[] = [
                'username'     => $row->nombre,
                'password'     => $row->contrasena,
                'apikey'       => $row->apikey,
                'email'        => $row->email,
                'rol'          => $row->rol
            ];
            if ($row->nombre == $request->username && $this->decryptIt($row->contrasena) == $request->password){
                $username = $row->nombre;
                $password = $this->decryptIt($row->contrasena);
                $apikey = $row->apikey;
                $email = $row->email;
                $rol = $row->rol;
                $response = array(
                    'status' => 'OK',
                    'statusCode' => '302',
                    'data' => (array(
                        'username' => $username,
                        'email'    => $email,
                        'password' => $password,
                        'apikey' => $apikey,
                        'rol' => $rol,
                    )),
                );
                return $response;
            } else {
                $response = array(
                    'status' => 'ERROR',
                    'aa' =>$row->nombre,
                    'nn' =>$request->username,
                    'a'=>$password,
                    'b'=>$request->password

                );
            }
        }   

            return $response;
    }

    public function register_userAction(){

        $this->view->disable();
        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $response = new \Phalcon\Http\Response();

        if ($row->token == 'Usuario valido para registrar') {

            $username = $row->user->username;
            $email = $row->user->email;
            $password = $row->user->password;
            $apikey = $this->keygenAction();

            $phql = 'INSERT INTO Usuario (nombre, email, contrasena, apikey, rol) VALUES (:username:, :email:, :password:, :apikey:, :rol:)';
            $status = $this->modelsManager->executeQuery(
                $phql,
                [

                    'username'      => $username,
                    'email'       => $email,
                    'password'  => $this->encryptIt($password),
                    'apikey'      => $apikey,
                    'rol'         => 'client'

                ]
            );


            $response->setJsonContent(array(
                'status' => 'OK',
                'statusCode' => '201',
                'data' => (array(
                    'username' => $username,
                    'email'    => $email,
                    'password' => $password,
                    'apikey' => $apikey,
                    'rol' => 'client',
                )),
                'masterkey' => 'Usuario registrado by admin'
            ));

    } else {

        $response->setJsonContent(array(
            'status' => 'ERROR',
            'statusCode' => '401',
            'status code' => $row
        ));

    }

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        return $response;
    }

    public function change_passwordAction () {
        $this->view->disable();

        $postdata = file_get_contents("php://input");
        $row = json_decode($postdata);
        $new_password = $this->keygenAction(10);

        $response = new \Phalcon\Http\Response();

        $phql = 'UPDATE Usuario SET contrasena = :pass: WHERE email = :email:';
        $status = $this->modelsManager->executeQuery(
            $phql,
            [

                'pass'   => $this->encryptIt($new_password),
                'email'      => $row->email

            ]
        );
        
        $to      = $row->email;
        $subject = 'Your password has been changed';
        $message = 'Hello! Your password of Unofficial Dragon Ball API'. "\r\n"."New password: ".$new_password;

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

