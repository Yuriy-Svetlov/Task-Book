<?php
declare(strict_types=1);

namespace app\modules\api\v1\models\task\status;

use approot\AppModel;
use approot\AppDB;
use app\classes\db\Task_db;


class Status__PUT extends AppModel
{

    public $id;  


    function beforeValidation(): void{
        // Sanitize variable
        //----------------
        //----------------            
    }


    public function rules(): array {

    	return [

            ["notEmpty", 
                ['id']
            ],


            ['isArray', 
                ['id']
            ],

            ['minCount', 
                ['id'],
                [1]
            ],

            ['maxCount', 
                ['id'],
                [3]
            ],

            ['isList', 
                ['id']
            ],

            ['custom_methods', 
                ['is_numeric_arr'],
            ],

    	];
    }



    protected function is_numeric_arr(){
        foreach ($this->id as $key => $value) {
            if(is_numeric($value) == false){
                throw new \InvalidArgumentException("The value in the array is not numeric.");
            }     
        }
    }



    public function result(){
        new AppDB('db');
        $db = AppDB::use('db');

        $result = Task_db::updateStatus(
            $db,
            $this->id
        );

        return $this->dataRes($result);
    }



    private function dataRes($result) : array{
        if($result !== true){
            return [
                "error" => NULL,
                "status" => 400,
                "data" => [],
            ];
        }

        return [
            "error" => NULL,
            "status" => 200,
            "data" => [],
        ];        
    }



    public function getErrorModel() : array 
    {
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



