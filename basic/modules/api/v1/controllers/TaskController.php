<?php
declare(strict_types=1);

namespace app\modules\api\v1\controllers;

use approot\App;
use approot\classes\authentication\user\login_middleware\LoginBySessionFile;
use app\modules\api\v1\models\task\index\Index__GET;
use app\modules\api\v1\models\task\index\Index__POST;
use app\modules\api\v1\models\task\index\Index__PUT;
use app\modules\api\v1\models\task\status\Status__PUT;



class TaskController extends \approot\AppControllerAPI
{

    function afterInit($data){
        $action = $data["action"];  
        LoginBySessionFile::init();   

        if($action === "status"){
            // Access only for admin 
            if(App::$user::isGuest() === true){
                return $this->responseJSON([
                    "error" => "Unauthorized", 
                    "status" => 401
                ]);           
            } 
        }           
    }



    public function index()
    {   
        $req = App::$request;

        // GET
        //------------------------
        if(App::$request->isGET()){
            $model = new Index__GET();
            $model->number_page =   $req::getParamGET('number_page');
            $model->sort_property = $req::getParamGET('sort_property');
            $model->sort_type =     $req::getParamGET('sort_type');
            
            if($model->validation()){
                return $this->responseJSON($model->getData()); 
            }

            return $this->responseJSON($model->getErrorModel()); 
        }else 
        //------------------------

        // POST
        //------------------------        
        if(App::$request->isPOST()){
            $model = new Index__POST();
            $model->email__INPUT =        $req::getParamPOST('email__INPUT');
            $model->user_name__INPUT =    $req::getParamPOST('user_name__INPUT');
            $model->description__TEXTAR = $req::getParamPOST('description__TEXTAR');

            if($model->validation()){
                return $this->responseJSON($model->result()); 
            }

            return $this->responseJSON($model->getErrorModel()); 
        }else 
        //------------------------

        // PUT
        //------------------------        
        if(App::$request->isPUT()){
            // Access only for admin 
            if(App::$user::isGuest() === true){
                return $this->responseJSON([
                    "error" => "Unauthorized", 
                    "status" => 401
                ]);           
            }
                        
            $model = new Index__PUT();
            $model->id =                  $req::getParamPUT('id');
            $model->email__INPUT =        $req::getParamPUT('email__INPUT');
            $model->user_name__INPUT =    $req::getParamPUT('user_name__INPUT');
            $model->description__TEXTAR = $req::getParamPUT('description__TEXTAR');

            if($model->validation()){
                return $this->responseJSON($model->result()); 
            }

            return $this->responseJSON($model->getErrorModel()); 
        }
        //------------------------        

        \approot\classes\ResponseCode::code(404);
    }



    public function status()
    {   
        $req = App::$request;

        // PUT
        //------------------------        
        if(App::$request->isPUT()){
            $json = $req::getJSON();

            $model = new Status__PUT();
            $model->id = $req::getParamJSON($json, 'id');

            if($model->validation()){
                return $this->responseJSON($model->result()); 
            }

            return $this->responseJSON($model->getErrorModel()); 
        }
        //------------------------        

        \approot\classes\ResponseCode::code(404);
    }

}



