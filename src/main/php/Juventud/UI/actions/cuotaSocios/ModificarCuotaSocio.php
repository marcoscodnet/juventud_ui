<?php
namespace Juventud\UI\actions\cuotaSocios;

use Juventud\UI\components\form\cuotaSocio\CuotaSocioForm;

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
 * se realiza la actualización de una cuotaSocio.
 * 
 * @author Marcos
 * @since 23/02/2017
 */
class ModificarCuotaSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("CuotaSocioModificar");
		
		$cuotaSocioForm = $page->getComponentById("cuotaSocioForm");
			
		$oid = $cuotaSocioForm->getOid();
						
		try {

			//obtenemos la cuotaSocio.
			$cuotaSocio = UIServiceFactory::getUICuotaSocioService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$cuotaSocioForm->fillEntity($cuotaSocio);
			
			//guardamos los cambios.
			UIServiceFactory::getUICuotaSocioService()->update( $cuotaSocio );
			
			$forward->setPageName( $cuotaSocioForm->getBackToOnSuccess() );
			//$forward->addParam( "cuotaSocioOid", $cuotaSocio->getOid() );
			
			$cuotaSocioForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "CuotaSocioModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$cuotaSocioForm->save();
			
		}
		return $forward;
		
	}

}
?>