<?php
declare(strict_types=1);

namespace app\controllers\admin_panel;

use approot\App;
use approot\classes\authentication\user\login_middleware\LoginBySessionFile;


class AdminPanelController extends \approot\AppControllers
{

    private $base_layout = __DIR__ . '/../../views/layouts/admin_panel/admin_panel.php';


    function afterInit($data){
        LoginBySessionFile::init();
    }


    public function index()
    {   
        if(App::$user::isGuest() === true){
            App::$request->redirect("http://".$_SERVER['SERVER_NAME']);
        }

        // GET
        if(App::$request->isGET()){
            return $this->render($this->base_layout, 
            [
                "view" => __DIR__ . '/../../views/admin_panel/admin_panel/index/index.php',
            ]);
        }

        \approot\classes\ResponseCode::code(404);
    }

}



