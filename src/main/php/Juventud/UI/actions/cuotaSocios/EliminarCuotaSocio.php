<?php
namespace Juventud\UI\actions\cuotaSocios;

use Juventud\UI\components\form\cuotaSocio\CuotaSocioForm;

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
 * se elimina un CuotaSocio.
 * 
 * @author Marcos
 * @since 23/02/2017
 */
class EliminarCuotaSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$oid = RastyUtils::getParamPOST("oid");			
						
		try {

			//eliminamos el cuotaSocio
			UIServiceFactory::getUICuotaSocioService()->delete( $oid );
			
			$forward->setPageName( "CuotaSocios" );
			
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "CuotaSocioEliminar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
		}
		
		return $forward;
		
	}

}
?>