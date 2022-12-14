<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD']; //metodo de la solicitud
if ($method == "OPTIONS") { //allow con metodos permitidos  
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header("HTTP/1.1 200 OK");
die();
}

// files needed to connect to database
include_once 'config/database.php'; //funcion que conecta a la bd
include_once 'objects/user.php'; //función que crea nuevo usuario
 
// get database connection
$database = new Database(); //variable de la clase Database
$db = $database->getConnection(); //variable con acceso a su función conexion
 
// instantiate product object
$user = new User($db);  //variable con la calse usuario y el acceso a la conexion como parametro
 
// get posted data
$data = json_decode(file_get_contents("php://input"));  ///??
 
// set product property values
$user->id = $data->id;
$user->name = $data->name;
$user->details = $data->details;
$user->email = $data->email;
$user->password = $data->password;
 
// create the user
if(
    !empty($user->id) &&
    !empty($user->name) &&
    !empty($user->email) &&
    !empty($user->password) &&
    $user->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
}
?>