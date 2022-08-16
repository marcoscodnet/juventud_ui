<?php
namespace Juventud\UI\actions\montoCuotas;

use Juventud\UI\components\form\montoCuota\MontoCuotaForm;

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
 * se elimina un MontoCuota.
 * 
 * @author Marcos
 * @since 22/02/2017
 */
class EliminarMontoCuota extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$oid = RastyUtils::getParamPOST("oid");			
						
		try {

			//eliminamos el montoCuota
			UIServiceFactory::getUIMontoCuotaService()->delete( $oid );
			
			$forward->setPageName( "MontoCuotas" );
			
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "MontoCuotaEliminar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
		}
		
		return $forward;
		
	}

}
?>