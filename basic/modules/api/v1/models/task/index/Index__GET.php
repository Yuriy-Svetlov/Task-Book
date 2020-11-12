<?php
declare(strict_types=1);

namespace app\modules\api\v1\models\task\index;

use approot\AppModel;
use approot\AppDB;
use app\classes\db\Task_db;


class Index__GET extends AppModel
{
    public $number_page;
    public $sort_property;
    public $sort_type;


    function beforeValidation(): void{
        $this->number_page = (int) $this->number_page;
        // Sanitize variable
        //----------------
        //----------------        
    }


    public function rules(): array {
    	return [

            ["notEmpty", 
                ["number_page", "sort_property", "sort_type"]
            ],

            ['stringNotEmpty', 
                ["sort_property", "sort_type"]
            ],

            ["oneOf", 
                ["sort_property"],
                [['email', 'user_name', 'status']]
            ],

            ["oneOf", 
                ["sort_type"],
                [['ASC', 'DESC']]
            ],

            ["numeric", 
                ["number_page"]
            ],

        ];
    }


    public function getData(){
        new AppDB('db');
        $db = AppDB::use('db');
        
        $this->number_page = ($this->number_page - 1) * 3;
        
        $elements = Task_db::select(
            $db, 
            $this->number_page, 
            $this->sort_property, 
            $this->sort_type
        );

        $coutRows = Task_db::selectCountRows($db);

        return [
            "error" => NULL,
            "status" => 200,
            "data" => [
                'elements' => $elements,
                'coutRows' => $coutRows,
            ],
        ];
    }


    public function getErrorModel() : array {
        return [
            "error" => [
                "property" => $this->getError()["property"],
                "message" => $this->getError()["message"],
            ],
            "status" => 304,
            "data" => NULL,
        ];
    }

}



