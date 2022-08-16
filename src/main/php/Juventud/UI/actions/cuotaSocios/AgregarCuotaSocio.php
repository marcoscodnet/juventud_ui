<?php
namespace Juventud\UI\actions\cuotaSocios;


use Juventud\UI\components\form\cuotaSocio\CuotaSocioForm;

use Juventud\UI\service\UIServiceFactory;
use Juventud\Core\model\CuotaSocio;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se realiza el alta de una CuotaSocio.
 * 
 * @author Marcos
 * @since 23/02/2017
 */
class AgregarCuotaSocio extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("CuotaSocioAgregar");
		
		$cuotaSocioForm = $page->getComponentById("cuotaSocioForm");
		
		try {

			//creamos una nueva cuotaSocio.
			$cuotaSocio = new CuotaSocio();
			
			//completados con los datos del formulario.
			$cuotaSocioForm->fillEntity($cuotaSocio);
			
			//agregamos el cuotaSocio.
			UIServiceFactory::getUICuotaSocioService()->add( $cuotaSocio );
			
			$forward->setPageName( $cuotaSocioForm->getBackToOnSuccess() );
			//$forward->addParam( "cuotaSocioOid", $cuotaSocio->getOid() );			
		
			$cuotaSocioForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "CuotaSocioAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$cuotaSocioForm->save();
		}
		
		return $forward;
		
	}

}
?>