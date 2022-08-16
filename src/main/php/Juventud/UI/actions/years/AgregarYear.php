<?php
namespace Juventud\UI\actions\years;


use Juventud\UI\components\form\year\YearForm;

use Juventud\UI\service\UIServiceFactory;
use Juventud\Core\model\Year;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se realiza el alta de una Year.
 * 
 * @author Marcos
 * @since 16/02/2017
 */
class AgregarYear extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("YearAgregar");
		
		$yearForm = $page->getComponentById("yearForm");
		
		try {

			//creamos una nueva year.
			$year = new Year();
			
			//completados con los datos del formulario.
			$yearForm->fillEntity($year);
			
			//agregamos el year.
			UIServiceFactory::getUIYearService()->add( $year );
			
			$forward->setPageName( $yearForm->getBackToOnSuccess() );
			$forward->addParam( "yearOid", $year->getOid() );			
		
			$yearForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "YearAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$yearForm->save();
		}
		
		return $forward;
		
	}

}
?>