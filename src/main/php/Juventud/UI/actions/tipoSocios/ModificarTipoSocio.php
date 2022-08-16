<?php
namespace Juventud\UI\actions\tipoSocios;

use Juventud\UI\components\form\tipoSocio\TipoSocioForm;

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
 * se realiza la actualización de una tipoSocio.
 * 
 * @author Marcos
 * @since 17/02/2017
 */
class ModificarTipoSocio extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("TipoSocioModificar");
		
		$tipoSocioForm = $page->getComponentById("tipoSocioForm");
			
		$oid = $tipoSocioForm->getOid();
						
		try {

			//obtenemos la tipoSocio.
			$tipoSocio = UIServiceFactory::getUITipoSocioService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$tipoSocioForm->fillEntity($tipoSocio);
			
			//guardamos los cambios.
			UIServiceFactory::getUITipoSocioService()->update( $tipoSocio );
			
			$forward->setPageName( $tipoSocioForm->getBackToOnSuccess() );
			$forward->addParam( "tipoSocioOid", $tipoSocio->getOid() );
			
			$tipoSocioForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "TipoSocioModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$tipoSocioForm->save();
			
		}
		return $forward;
		
	}

}
?>