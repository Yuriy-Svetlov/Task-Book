<?php
declare(strict_types=1);
namespace app\models;

use approot\classes\authentication\user\login_middleware\LoginByAPI_KEY;




/**
*
*
*/
class UserAuthentication implements \approot\classes\authentication\interfaces\UserIdentity
{

    static $db_user_data = [
        'id' => 123,
        'login' => 'admin',
        'user_ip' => '127.0.0.1',
        'password' => 123,
        'auth_key' => "gen_new_key-ip",   
        'ban' => 0,     
    ];

    /**
    *
    *
    */
    public static function verifyBySessionCookie(string $id)
    {
        // [1] Find in database by user ID
        // [2] Check user access 
        /*
        if($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR']){
            // Remove session
            setcookie("PHPSESSID", "", time());
            $_SESSION = [];
            session_destroy();
            return false; 
        }
        */

        if(self::$db_user_data['id'] !== 123){
            return false;
        }

        if(self::$db_user_data['user_ip'] != '127.0.0.1'){
            return false;
        }

        if(self::$db_user_data['ban'] !== 0){
            return false;
        }

        return self::$db_user_data;
    }



    /**
    *
    *
    */
    public static function verifyByCookie(string $data_cookie)
    {
        // [1] Get from cookie user unique hash and find in database user ID
        // [2] Check user access (Check fingerprint + other)
        /*
        if($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR']){
            // Remove session
            setcookie("PHPSESSID", "", time());
            $_SESSION = [];
            session_destroy();
            return false; 
        }
        */
        \approot\classes\Logger::sendToLog($id);
        
        if(self::$db_user_data['auth_key'] != 'gen_new_key-ip'){
            return false;
        }

        if(self::$db_user_data['id'] !== 123){
            return false;
        }

        if(self::$db_user_data['user_ip'] != '127.0.0.1'){
            return false;
        }

        if(self::$db_user_data['ban'] !== 0){
            return false;
        }

        return self::$db_user_data;
    }


}
