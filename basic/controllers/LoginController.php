<?php
declare(strict_types=1);

namespace app\controllers;

use approot\AppControllers;
use approot\App;
use approot\classes\authentication\user\login_middleware\LoginBySessionFile;
use approot\classes\ResponseCode;



class LoginController extends AppControllers
{
    
    private $base_layout = __DIR__ . '/../views/layouts/login.php';


    function afterInit($data){
        LoginBySessionFile::init();
    }


    public function login()
    {  
        if(App::$user::isGuest() === false){
            App::$request->redirect("http://" . $_SERVER['SERVER_NAME'] . '/admin_panel');
        }

        // GET
        //------------------------
        if(App::$request->isGET()){
            return $this->render($this->base_layout, [ 
                "view" => __DIR__ . '/../views/login/login/login.php'
            ]);
        }
        //------------------------

        ResponseCode::code(404);
    }


    public function logout()
    {  
        if(App::$user::isGuest() === true){
            App::$request->redirect("http://".$_SERVER['SERVER_NAME']);
        }

        // GET
        //------------------------
        if(App::$request->isGET()){
            \approot\classes\authentication\user\login_middleware\Login::logout();
            App::$request->redirect("http://".$_SERVER['SERVER_NAME']);            
        }
        //------------------------

        ResponseCode::code(404);
    }    


}



