<?php
namespace Juventud\UI\actions\years;

use Juventud\UI\components\form\year\YearForm;

use Juventud\UI\service\UIServiceFactory;

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
 * se realiza la actualización de una year.
 * 
 * @author Marcos
 * @since 17/02/2017
 */
class ModificarYear extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("YearModificar");
		
		$yearForm = $page->getComponentById("yearForm");
			
		$oid = $yearForm->getOid();
						
		try {

			//obtenemos la year.
			$year = UIServiceFactory::getUIYearService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$yearForm->fillEntity($year);
			
			//guardamos los cambios.
			UIServiceFactory::getUIYearService()->update( $year );
			
			$forward->setPageName( $yearForm->getBackToOnSuccess() );
			$forward->addParam( "yearOid", $year->getOid() );
			
			$yearForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "YearModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$yearForm->save();
			
		}
		return $forward;
		
	}

}
?>