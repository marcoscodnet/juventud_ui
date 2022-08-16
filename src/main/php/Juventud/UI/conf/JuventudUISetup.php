<?php
namespace Juventud\UI\conf;


use Juventud\UI\utils\JuventudRastyListener;

use Rasty\conf\RastyConfig;
use Rasty\app\LoadRasty;
use Rasty\app\SecurityRastyListener;
use Rasty\app\RequirementsRastyListener;
use Rasty\utils\Logger;
use Rasty\cache\RastyApcCache;

use Rasty\Menu\conf\RastyMenuConfig;
use Rasty\Layout\conf\RastyLayoutConfig;
use Rasty\Forms\conf\RastyFormsConfig;
use Rasty\Grid\conf\RastyGridConfig;
use Rasty\Security\conf\RastySecurityConfig;
use Rasty\Crud\conf\RastyCrudConfig;
use Rasty\Catalogo\conf\RastyCatalogoConfig;

use Juventud\Core\conf\JuventudConfig;
 

use Rasty\security\RastySecurityContext;


use Rasty\cache\RastyMockCache;

/**
 * configuración Juventud ui
 * 
 * @author Marcos
 * @since 16/02/2017
 */
class JuventudUISetup {

	/**
	 * inicializamos la aplicación de Juventud ui
	 */
	public static function initialize( $appName = "Juventud_ui"){
		
			
		//inicializamos la sesión.
        if(!isset($_SESSION)){
            session_set_cookie_params(0, $appName);
            @session_regenerate_id(true);
            session_start();
        }
		
		
		//configuramos php
		self::configurePhp();
		
		// core
		self::initializeCore( $appName );
		
		//ui
		self::initializeUI( $appName );
		
		
		//JuventudConfig::getInstance()->setWebPath( RastyConfig::getInstance()->getWebPath() );
		
		
	}
	
	/**
	 * Configuraciones para php
	 */
	private static function configurePhp(){
		
		//algunos configuraciones para php.
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', '0');
		ini_set('display_errors', '1');
		
		include_once dirname(__DIR__) . "/conf/errorHandler.php";
	}
	
	/**
	 * Inicializamos Juventud	 */
	private static function initializeCore($appName){

		//JuventudConfig::getInstance()->setDbHost();
		JuventudConfig::getInstance()->setDbName("cose_juventud");
		//JuventudConfig::getInstance()->setDbUser();
		//JuventudConfig::getInstance()->setDbPassword();
		
		JuventudConfig::getInstance()->initialize();
		JuventudConfig::getInstance()->initLogger(dirname(__DIR__) . "/conf/log4php.xml");
		
		$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'CLI';
		
		//JuventudConfig::getInstance()->setValidarRegistracionLink( 'http://' . $host  . "/$appName/registracion/validar.html");
		//JuventudConfig::getInstance()->setLoginLink( $host  . "/$appName/login.html");
		
	}
	
	
	/**
	 * Inicializamos ui + Rasty
	 */
	private static function initializeUI( $appName ){
		
		$appHome = $_SERVER["DOCUMENT_ROOT"];
		
		//inicializamos rasty indicando el home de la app y el nombre
		RastyConfig::getInstance()->initialize($appHome, $appName);
		//RastyConfig::getInstance()->setWebsocketUrl("192.168.1.34");
		RastyConfig::getInstance()->setCacheId($appName);
        RastyConfig::getInstance()->setCacheType(get_class( new RastyMockCache()));
		
		//configuramos el logger,
		Logger::configure( dirname(__DIR__) . "/conf/log4php.xml" );
		Logger::log("Logger Juventud ui configurado!");
		
		
		//cargamos los componentes de Juventud ui.
		$rastyLoader = LoadRasty::getInstance();
		$rastyLoader->loadXml(
		
				dirname(__DIR__) . '/conf/rasty.xml',
				RastyConfig::getInstance()->getAppPath() . "src/main/php/Juventud/UI/",
				RastyConfig::getInstance()->getWebPath()
		
		);
		
		//inicializamos los módulos rasty que utilizaremos
		RastyGridConfig::initialize();
		RastyLayoutConfig::initialize();
		RastyFormsConfig::initialize();;
		RastyMenuConfig::initialize();
		
		RastySecurityConfig::getInstance()->initialize();
		RastyCrudConfig::getInstance()->initialize();
		RastyCatalogoConfig::getInstance()->initialize("RastyCatalogoLayout");
		RastyCatalogoConfig::getInstance()->initialize("RastySecuriryPublicLayout");
		
		RastyConfig::getInstance()->setCacheType(get_class( new RastyApcCache()));
		
		//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(E_ERROR | E_PARSE );
		
		//inicializamos los listeners de la aplicación
		RastyConfig::getInstance()->addAppListener( new SecurityRastyListener() );
		RastyConfig::getInstance()->addAppListener( new RequirementsRastyListener() );
		RastyConfig::getInstance()->addAppListener( new JuventudRastyListener() );
		
		
	}
			
}