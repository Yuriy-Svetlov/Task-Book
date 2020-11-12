<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Symfony\\Polyfill\\Ctype\\Ctype' => $vendorDir . '/symfony/polyfill-ctype/Ctype.php',
    'Webmozart\\Assert\\Assert' => $vendorDir . '/webmozart/assert/src/Assert.php',
    'app\\classes\\db\\Task_db' => $baseDir . '/../classes/db/Task_db.php',
    'app\\config\\routing\\Routing' => $baseDir . '/../config/routing/Routing.php',
    'app\\controllers\\IndexController' => $baseDir . '/../controllers/IndexController.php',
    'app\\controllers\\PrivateController' => $baseDir . '/../controllers/PrivateController.php',
    'app\\models\\UserAuthentication' => $baseDir . '/../models/UserAuthentication.php',
    'app\\models\\api\\IndexModel__GET' => $baseDir . '/../models/api/IndexModel__GET.php',
    'app\\models\\api\\PostModel__GET' => $baseDir . '/../models/api/PostModel__GET.php',
    'app\\models\\index\\Login__POST' => $baseDir . '/../models/index/Login__POST.php',
    'app\\modules\\api\\v1\\controllers\\IndexController' => $baseDir . '/../modules/api/v1/controllers/IndexController.php',
    'app\\modules\\api\\v1\\controllers\\UserController' => $baseDir . '/../modules/api/v1/controllers/UserController.php',
    'app\\modules\\api\\v1\\models\\user\\FriendModel__GET' => $baseDir . '/../modules/api/v1/models/user/FriendModel__GET.php',
    'app\\modules\\api\\v1\\models\\user\\UserModel__GET' => $baseDir . '/../modules/api/v1/models/user/UserModel__GET.php',
    'approot\\App' => $baseDir . '/App.php',
    'approot\\AppControllerAPI' => $baseDir . '/AppControllerAPI.php',
    'approot\\AppControllers' => $baseDir . '/AppControllers.php',
    'approot\\AppDB' => $baseDir . '/AppDB.php',
    'approot\\AppModel' => $baseDir . '/AppModel.php',
    'approot\\AppRouting' => $baseDir . '/AppRouting.php',
    'approot\\classes\\Files' => $baseDir . '/classes/Files.php',
    'approot\\classes\\Logger' => $baseDir . '/classes/Logger.php',
    'approot\\classes\\Request' => $baseDir . '/classes/Request.php',
    'approot\\classes\\ResponseCode' => $baseDir . '/classes/ResponseCode.php',
    'approot\\classes\\Sanitize' => $baseDir . '/classes/Sanitize.php',
    'approot\\classes\\authentication\\User' => $baseDir . '/classes/authentication/User.php',
    'approot\\classes\\authentication\\interfaces\\UserIdentity' => $baseDir . '/classes/authentication/interfaces/UserIdentity.php',
    'approot\\classes\\authentication\\user\\LoginMiddleware' => $baseDir . '/classes/authentication/user/LoginMiddleware.php',
    'approot\\classes\\authentication\\user\\login_middleware\\Login' => $baseDir . '/classes/authentication/user/login_middleware/Login.php',
    'approot\\classes\\authentication\\user\\login_middleware\\LoginByAPI_KEY' => $baseDir . '/classes/authentication/user/login_middleware/LoginByAPI_KEY.php',
    'approot\\classes\\authentication\\user\\login_middleware\\LoginBySessionDB' => $baseDir . '/classes/authentication/user/login_middleware/LoginBySessionDB.php',
    'approot\\classes\\authentication\\user\\login_middleware\\LoginBySessionFile' => $baseDir . '/classes/authentication/user/login_middleware/LoginBySessionFile.php',
    'approot\\debug\\AppDebug' => $baseDir . '/debug/AppDebug.php',
    'approot\\debug\\controllers\\DebugController' => $baseDir . '/debug/controllers/DebugController.php',
    'approot\\debug\\models\\debug\\ErrorLog__GET' => $baseDir . '/debug/models/debug/ErrorLog__GET.php',
    'approot\\debug\\models\\debug\\Index__GET' => $baseDir . '/debug/models/debug/Index__GET.php',
    'approot\\debug\\models\\debug\\ValidationLog__GET' => $baseDir . '/debug/models/debug/ValidationLog__GET.php',
    'approot\\debug\\modules\\api\\v1\\controllers\\DebugController' => $baseDir . '/debug/modules/api/v1/controllers/DebugController.php',
    'approot\\debug\\modules\\api\\v1\\models\\debug\\ErrorLog__DELETE' => $baseDir . '/debug/modules/api/v1/models/debug/ErrorLog__DELETE.php',
    'approot\\debug\\modules\\api\\v1\\models\\debug\\ValidationLog__DELETE' => $baseDir . '/debug/modules/api/v1/models/debug/ValidationLog__DELETE.php',
);