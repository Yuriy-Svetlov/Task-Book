<?php
declare(strict_types=1);

namespace app\modules\api\v1\controllers;

use approot\App;
use approot\classes\authentication\user\login_middleware\LoginBySessionFile;
use app\modules\api\v1\models\login\Login__POST;


class LoginController extends \approot\AppControllerAPI
{


    function afterInit($data){
        LoginBySessionFile::init();
    }


    public function login()
    {   
        if(App::$user::isGuest() === false){
            return $this->responseJSON([
                "error" => "Moved Temporarily", 
                "status" => 302
            ]);             
        }

        // POST
        //------------------------        
        if(App::$request->isPOST()){
            $req = App::$request;
            
            $model = new Login__POST();
            $model->login__INPUT = $req::getParamPOST('login__INPUT');
            $model->password__INPUT = $req::getParamPOST('password__INPUT');

            if($model->validation()){
                if($model->login() === true){
                    return $this->responseJSON($model->successful());
                }

                return $this->responseJSON($model->unsuccessfully()); 
            }

            return $this->responseJSON($model->getErrorModel()); 
        }
        //------------------------        

        \approot\classes\ResponseCode::code(404);
    }

}



