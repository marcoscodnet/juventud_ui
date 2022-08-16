<?php
namespace Juventud\UI\actions\montoCuotas;

use Juventud\UI\components\form\montoCuota\MontoCuotaForm;

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
 * se realiza la actualización de una montoCuota.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class ModificarMontoCuota extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("MontoCuotaModificar");
		
		$montoCuotaForm = $page->getComponentById("montoCuotaForm");
			
		$oid = $montoCuotaForm->getOid();
						
		try {

			//obtenemos la montoCuota.
			$montoCuota = UIServiceFactory::getUIMontoCuotaService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$montoCuotaForm->fillEntity($montoCuota);
			
			//guardamos los cambios.
			UIServiceFactory::getUIMontoCuotaService()->update( $montoCuota );
			
			$forward->setPageName( $montoCuotaForm->getBackToOnSuccess() );
			
			$forward->addParam( "yearOid", $montoCuota->getYear()->getOid() );
			
			$montoCuotaForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "MontoCuotaModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			
			//guardamos lo ingresado en el form.
			$montoCuotaForm->save();
			
		}
		return $forward;
		
	}

}
?>