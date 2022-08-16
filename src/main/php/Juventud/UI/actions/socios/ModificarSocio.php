<?php
namespace Juventud\UI\actions\socios;

use Juventud\UI\components\form\socio\SocioForm;

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
 * se realiza la actualización de una socio.
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class ModificarSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("SocioModificar");
		
		$socioForm = $page->getComponentById("socioForm");
			
		$oid = $socioForm->getOid();
						
		try {

			//obtenemos la socio.
			$socio = UIServiceFactory::getUISocioService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$socioForm->fillEntity($socio);
			
			//guardamos los cambios.
			UIServiceFactory::getUISocioService()->update( $socio );
			
			$forward->setPageName( $socioForm->getBackToOnSuccess() );
			//$forward->addParam( "socioOid", $socio->getOid() );
			
			$socioForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "SocioModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$socioForm->save();
			
		}
		return $forward;
		
	}

}
?>