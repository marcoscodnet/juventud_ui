<?php
namespace Juventud\UI\pages\montoCuotas\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\MontoCuota;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Modificar Cuota' )
 */
class MontoCuotaModificar extends JuventudPage{

	/**
	 * montoCuota a modificar.
	 * @var MontoCuota
	 */
	private $montoCuota;

	
	public function __construct(){
		
		//inicializamos el montoCuota.
		$montoCuota = new MontoCuota();
		$this->setMontoCuota($montoCuota);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setMontoCuotaOid($oid){
		
		//a partir del id buscamos el montoCuota a modificar.
		$montoCuota = UIServiceFactory::getUIMontoCuotaService()->get($oid);
		
		$this->setMontoCuota($montoCuota);
		
	}
	
	public function getTitle(){
		return $this->localize( "montoCuota.modificar.title" );
	}

	public function getType(){
		
		return "MontoCuotaModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$montoCuotaForm = $this->getComponentById("montoCuotaForm");
		$montoCuotaForm->fillFromSaved( $this->getMontoCuota() );
	}

	public function getMontoCuota(){
		
	    return $this->montoCuota;
	}

	public function setMontoCuota($montoCuota)
	{
	    $this->montoCuota = $montoCuota;
	}
}
?>