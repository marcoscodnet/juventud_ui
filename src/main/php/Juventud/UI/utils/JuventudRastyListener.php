<?php
namespace Juventud\UI\utils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\components\RastyPage;
use Rasty\components\RastyComponent;
use Rasty\actions\Action;
use Rasty\actions\JsonAction;

use Rasty\app\IApplicationListener;


/**
 * Utilidades para el sistema Juventud ui.
 *
 * @author Bernardo
 * @since 05-11-2014
 */
class JuventudRastyListener implements IApplicationListener {


	/**
	 * se ejecuta una página
	 * @param $page
	 */
	function pageExecuted( RastyPage $page) {
	
		JuventudUIUtils::log("executando page " . get_class($page) );
	
	}
	
	/**
	 * se ejecuta un componente
	 * @param $component
	 */
	function componentExecuted( RastyComponent $component) {
		JuventudUIUtils::log("executando componente " . get_class($component) );
	}
	
	/**
	 * se ejecuta un action
	 * @param $action
	 */
	function actionExecuted( Action $action) {
	
		JuventudUIUtils::log("executando action " . get_class($action) );
	}
	
	/**
	 * se ejecuta un action json
	 * @param $action
	 */	
	function actionJsonExecuted( JsonAction $action) {
	
		JuventudUIUtils::log("executando json action " . get_class($action) );
		
	}    
}