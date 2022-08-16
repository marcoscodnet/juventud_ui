<?php
namespace Juventud\UI\actions\socios;

use Juventud\UI\components\form\socio\SocioForm;

use Juventud\UI\service\UIServiceFactory;
use Juventud\UI\utils\JuventudUtils;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\factory\ComponentConfig;
use Rasty\factory\ComponentFactory;

use Rasty\i18n\Locale;

use Rasty\factory\PageFactory;

/**
 * se elimina un Socio.
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class EliminarSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$oid = RastyUtils::getParamPOST("oid");			
						
		try {

			//eliminamos el socio
			UIServiceFactory::getUISocioService()->delete( $oid );
			
			$forward->setPageName( "Socios" );
			
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "SocioEliminar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
		}
		
		return $forward;
		
	}

}
?>