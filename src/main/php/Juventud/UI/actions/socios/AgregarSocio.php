<?php
namespace Juventud\UI\actions\socios;


use Juventud\UI\components\form\socio\SocioForm;

use Juventud\UI\service\UIServiceFactory;
use Juventud\Core\model\Socio;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se realiza el alta de una Socio.
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class AgregarSocio extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("SocioAgregar");
		
		$socioForm = $page->getComponentById("socioForm");
		
		try {

			//creamos una nueva socio.
			$socio = new Socio();
			
			//completados con los datos del formulario.
			$socioForm->fillEntity($socio);
			
			//agregamos el socio.
			UIServiceFactory::getUISocioService()->add( $socio );
			
			$forward->setPageName( $socioForm->getBackToOnSuccess() );
			//$forward->addParam( "socioOid", $socio->getOid() );			
		
			$socioForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "SocioAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$socioForm->save();
		}
		
		return $forward;
		
	}

}
?>