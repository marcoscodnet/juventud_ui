<?php
namespace Juventud\UI\actions\tipoSocios;


use Juventud\UI\components\form\tipoSocio\TipoSocioForm;

use Juventud\UI\service\UIServiceFactory;
use Juventud\Core\model\TipoSocio;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se realiza el alta de una TipoSocio.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class AgregarTipoSocio extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("TipoSocioAgregar");
		
		$tipoSocioForm = $page->getComponentById("tipoSocioForm");
		
		try {

			//creamos una nueva tipoSocio.
			$tipoSocio = new TipoSocio();
			
			//completados con los datos del formulario.
			$tipoSocioForm->fillEntity($tipoSocio);
			
			//agregamos el tipoSocio.
			UIServiceFactory::getUITipoSocioService()->add( $tipoSocio );
			
			$forward->setPageName( $tipoSocioForm->getBackToOnSuccess() );
			$forward->addParam( "tipoSocioOid", $tipoSocio->getOid() );			
		
			$tipoSocioForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "TipoSocioAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$tipoSocioForm->save();
		}
		
		return $forward;
		
	}

}
?>