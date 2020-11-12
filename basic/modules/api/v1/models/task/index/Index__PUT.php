<?php
declare(strict_types=1);

namespace app\modules\api\v1\models\task\index;

use approot\AppModel;
use approot\AppDB;
use app\classes\db\Task_db;


class Index__PUT extends AppModel
{

    const LENGTH_BETWEEN_MIN__1 = 4;
    const LENGTH_BETWEEN_MAX__1 = 15;
    const LENGTH_BETWEEN_MIN__2 = 4;
    const LENGTH_BETWEEN_MAX__2 = 40;

    public $id;  
	public $email__INPUT;
    public $user_name__INPUT;
    public $description__TEXTAR;
    private $db;
    private $data_selectID;


    function beforeValidation(): void{
        $this->id = (int) $this->id; 
        // Sanitize variable
        //----------------
        //----------------            
    }


    public function rules(): array {

    	return [

            ["notEmpty", 
                ['id']
            ],


            ['string', 
                [
                    'email__INPUT', 
                    'user_name__INPUT', 
                    'description__TEXTAR'
                ]
            ],


            ['stringNotEmpty', 
                [
                    'email__INPUT', 
                    'user_name__INPUT', 
                    'description__TEXTAR'
                ],
                ['message' => 'Заполните это поле.']
            ],


            ['numeric', 
                ['id']
            ],


            ['email', 
                [
                    'email__INPUT'
                ],
                ['message' => 'Неверный адрес электронной почты.']
            ],


            ['lengthBetween', 
                [
                    'email__INPUT', 
                    'user_name__INPUT'
                ],
                [
                    self::LENGTH_BETWEEN_MIN__1, 
                    self::LENGTH_BETWEEN_MAX__1, 
                    'message' => 
                        'Длина строки должна быть от ' 
                        . self::LENGTH_BETWEEN_MIN__1 . ' до ' 
                        . self::LENGTH_BETWEEN_MAX__1 . ' символов.'
                ]
            ],


            ['lengthBetween', 
                [
                    'description__TEXTAR'
                ],
                [
                    self::LENGTH_BETWEEN_MIN__2, 
                    self::LENGTH_BETWEEN_MAX__2, 
                    'message' => 
                        'Длина строки должна быть от ' 
                        . self::LENGTH_BETWEEN_MIN__2 . ' до ' 
                        . self::LENGTH_BETWEEN_MAX__2 . ' символов.'
                ]
            ],

            // Using custom method
            ["custom_methods", 
                ["is_exists_task"],
            ],

    	];
    }



    protected function is_exists_task(){
        new AppDB('db');
        $this->db = AppDB::use('db');

        $data_selectID = Task_db::selectID($this->db, $this->id);
        if($data_selectID === false){
            throw new \InvalidArgumentException("This task does not exists");
        }

        $this->data_selectID = $data_selectID;
    }



    public function result(){
        $description = $this->data_selectID['description'];
        $status_last_edit = '0';

        if($this->data_selectID['description'] !== $this->description__TEXTAR){
            $description = $this->description__TEXTAR;
            $status_last_edit = '1';
        }

        // SQL UPDATE
        $result = Task_db::updateOne(
            $this->db,
            $this->id,
            $this->email__INPUT,
            $this->user_name__INPUT,
            $description,
            $this->data_selectID['status'],
            $status_last_edit
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



