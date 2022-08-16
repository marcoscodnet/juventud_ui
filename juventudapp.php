<?php


session_start ();

use Juventud\UI\utils\JuventudUIUtils;
use Juventud\UI\conf\JuventudUISetup;

use Rasty\utils\RastyUtils;
use Rasty\factory\ApplicationFactory;
use Rasty\utils\Logger;
use Rasty\security\RastySecurityContext;

include_once   'vendor/autoload.php';

//set_error_handler('myErrorHandler');
//register_shutdown_function('fatalErrorShutdownHandler');

function myErrorHandler($errno, $errstr, $errfile, $errline){
	
   if (!(error_reporting() & $errno)) {
        // Este código de error no está incluido en error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>Mi ERROR</b> [$errno] $errstr<br />\n";
        echo "  Error fatal en la línea $errline en el archivo $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Abortando...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>Mi WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>Mi NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Tipo de error desconocido: [$errno] $errstr<br />\n";
        break;
    }

   	//header("Location: http://localhost/turnos_ui");
    
    /* No ejecutar el gestor de errores interno de PHP */
    return true;
}

function fatalErrorShutdownHandler()
{
  $last_error = error_get_last();
  if ($last_error['type'] === E_ERROR) {
    // fatal error
    myErrorHandler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
  }
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
	RastySecurityContext::logout();
}

$_SESSION['LAST_ACTIVITY'] = time();

JuventudUISetup::initialize("juventud_ui");

$type = RastyUtils::getParamGET('type') ;

ApplicationFactory::build( $type )->execute();


$request = $_SERVER["REQUEST_URI"];
$msg= "Request $request  Memoria usada: " . round(memory_get_usage() / 1024,1) . ' KB';
JuventudUIUtils::log($msg)



/*
$oApp = ApplicationFactory::build( $type );

$oApp->execute();
*/
?>