<?php
namespace Juventud\UI\pages\cuotaSocios\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\CuotaSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Modificar Cuota' )
 */
class CuotaSocioModificar extends JuventudPage{

	/**
	 * cuotaSocio a modificar.
	 * @var CuotaSocio
	 */
	private $cuotaSocio;

	
	public function __construct(){
		
		//inicializamos el cuotaSocio.
		$cuotaSocio = new CuotaSocio();
		$this->setCuotaSocio($cuotaSocio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setCuotaSocioOid($oid){
		
		//a partir del id buscamos el cuotaSocio a modificar.
		$cuotaSocio = UIServiceFactory::getUICuotaSocioService()->get($oid);
		
		$this->setCuotaSocio($cuotaSocio);
		
	}
	
	public function getTitle(){
		return $this->localize( "cuotaSocio.modificar.title" );
	}

	public function getType(){
		
		return "CuotaSocioModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$cuotaSocioForm = $this->getComponentById("cuotaSocioForm");
		$cuotaSocioForm->fillFromSaved( $this->getCuotaSocio() );
	}

	public function getCuotaSocio(){
		
	    return $this->cuotaSocio;
	}

	public function setCuotaSocio($cuotaSocio)
	{
	    $this->cuotaSocio = $cuotaSocio;
	}
}
?>