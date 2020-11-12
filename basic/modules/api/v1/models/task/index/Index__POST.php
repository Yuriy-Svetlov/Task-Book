<?php
declare(strict_types=1);

namespace app\modules\api\v1\models\task\index;

use approot\AppModel;
use approot\AppDB;
use app\classes\db\Task_db;


class Index__POST extends AppModel
{

    const LENGTH_BETWEEN_MIN__1 = 4;
    const LENGTH_BETWEEN_MAX__1 = 15;
    const LENGTH_BETWEEN_MIN__2 = 4;
    const LENGTH_BETWEEN_MAX__2 = 40;
  
	public $email__INPUT;
    public $user_name__INPUT;
    public $description__TEXTAR;



    function beforeValidation(): void{ 
        // Sanitize variable
        //----------------
        //----------------            
    }


    public function rules(): array {

    	return [

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

    	];
    }



    public function result() : array{
        new AppDB('db');
        $db = AppDB::use('db');
        
        $result = Task_db::insert(
            $db, 
            $this->email__INPUT, 
            $this->user_name__INPUT, 
            $this->description__TEXTAR
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



