<?php
namespace Juventud\UI\actions\tipoSocios;

use Juventud\UI\components\form\tipoSocio\TipoSocioForm;

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
 * se elimina un TipoSocio.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class EliminarTipoSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$oid = RastyUtils::getParamPOST("oid");			
						
		try {

			//eliminamos el tipoSocio
			UIServiceFactory::getUITipoSocioService()->delete( $oid );
			
			$forward->setPageName( "TipoSocios" );
			
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "TipoSocioEliminar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
		}
		
		return $forward;
		
	}

}
?>