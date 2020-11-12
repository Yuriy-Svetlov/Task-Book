<?php
declare(strict_types=1);

namespace app\modules\api\v1\models\login;

use approot\classes\authentication\user\login_middleware\Login;
use approot\AppModel;
use approot\AppDB;



class Login__POST extends AppModel
{

    public $login__INPUT;
    public $password__INPUT;
    private $db_user_data = [
        'id' => "123",
        'login' => 'admin',
        'password' => '123',
        'auth_key' => "gen_new_key-ip",        
    ];


    function beforeValidation(): void{  
        // Sanitize variable
        //----------------
        //----------------            
    }


    public function rules(): array {

    	return [

            ["notEmpty", 
                [
                    "login__INPUT", 
                    "password__INPUT"
                ],
                ['message' => 'Заполните это поле.']
            ],

            ['string', 
                ["login__INPUT", "password__INPUT"]
            ],

            ['stringNotEmpty', 
                [
                    'login__INPUT', 
                    'password__INPUT'
                ],
                ['message' => 'Заполните это поле.']
            ],

            // Using custom method
            ["custom_methods", 
                ["checkLogin"],
            ],

            ["custom_methods", 
                ["checkPassword"],
            ],

    	];
    }


    protected function getLabels(): array
    {
        return [
            "checkLogin" => "login__INPUT",
            "checkPassword" => "password__INPUT",
        ];
    } 


    public function checkLogin(){
        //-------------------------
        //  Make query to db
        //  Get user data from db
        //  if(!password_verify($this->password, $db_user_data['password'])){
        //     return false;
        //  } 
        //-------------------------

        if($this->login__INPUT !== $this->db_user_data['login']){
            throw new \InvalidArgumentException("Неверный логин.");
        }
    }


    public function checkPassword(){
        if($this->password__INPUT !== $this->db_user_data['password']){
            throw new \InvalidArgumentException("Неверный пароль.");
        }
    }


    public function login(){

        if(Login::login($this->db_user_data) !== true){
            return false;
        }

        return true;
    }


    public function successful() : array 
    {
        return [
            "error" => NULL,
            "status" => 200,
            "login" => 'successful',
        ];
    }


    public function unsuccessfully() : array 
    {
        return [
            "error" => NULL,
            "status" => 200,
            "login" => 'unsuccessfully',
        ];
    }


    public function getErrorModel() : array 
    {
        return [
            "error" => [
                "property" => $this->getError()["property"],
                "message" => $this->getError()["message"],
            ],
            "status" => 400,
            "login" => NULL,
        ];
    }

}



