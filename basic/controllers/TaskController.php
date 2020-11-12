<?php
declare(strict_types=1);

namespace app\controllers;

use approot\App;
use approot\classes\authentication\user\login_middleware\LoginBySessionFile;


class TaskController extends \approot\AppControllers
{

    private $base_layout = __DIR__ . '/../views/layouts/index.php';


    function afterInit($data){
        LoginBySessionFile::init();
    }


    public function index()
    {   
        // GET
        if(App::$request->isGET()){
            return $this->render($this->base_layout, 
            [
                "view" => __DIR__ . '/../views/index/index.php',
            ]);
        }

        \approot\classes\ResponseCode::code(404);
    }

}



