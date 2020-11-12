<?php
namespace app\config\routing;

use approot\AppRouting;


class Routing extends AppRouting
{

    public function init(){

    	// [TaskController]
    	$this->req('/', '\app\controllers\TaskController', 'index', ['GET']);

        // [LoginController]
        $this->req('/login', '\app\controllers\LoginController', 'login', ['GET']);
        $this->req('/logout', '\app\controllers\LoginController', 'logout', ['GET']);
        
        // [API]
        //-----------------------------
        if($this->group('/api', ['POST', 'GET'])){
            // TaskController
            $this->req('/api/task', '\app\modules\api\v1\controllers\TaskController', 'index');
            $this->req('/api/task/status', '\app\modules\api\v1\controllers\TaskController', 'status');

            // LoginController
            $this->req('/api/login', '\app\modules\api\v1\controllers\LoginController', 'login');
        }
        //-----------------------------

        // [AdminController]
        $this->req('/admin_panel', '\app\controllers\admin_panel\AdminPanelController', 'index', ['GET']);
        
        \approot\classes\ResponseCode::code(404);
    }
    
}



