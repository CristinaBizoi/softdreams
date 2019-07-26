<?php
session_start();

require_once('./config/db_config.php');

// autoloading PSR-0 Standard
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
spl_autoload_register('autoload');

// var_dump($_GET["page"]);
use \Vendor\Libraries\DB;
$db = new DB($servername, $db, $username, $password);
use \Vendor\Libraries\Request;
$request = new Request();

// verific daca e in get parametrul "page", iar daca nu este pun pagina de listare
if($request->getQuery("page")){
    $page = $request->getQuery("page");
    
}else{
    $page = "listare";
}

// verific daca exista pagina, iar daca exista o includ
if(is_file("./".$page.".php")){
    include("./".$page.".php");
}

?>

