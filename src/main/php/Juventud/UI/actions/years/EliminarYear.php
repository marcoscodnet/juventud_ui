<?php
namespace Juventud\UI\actions\years;

use Juventud\UI\components\form\year\YearForm;

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
 * se elimina un Year.
 * 
 * @author Marcos
 * @since 18/02/2017
 */
class EliminarYear extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$oid = RastyUtils::getParamPOST("oid");			
						
		try {

			//eliminamos el year
			UIServiceFactory::getUIYearService()->delete( $oid );
			
			$forward->setPageName( "Years" );
			
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "YearEliminar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
		}
		
		return $forward;
		
	}

}
?>