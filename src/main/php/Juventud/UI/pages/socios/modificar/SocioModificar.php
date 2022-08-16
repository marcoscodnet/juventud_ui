<?php
namespace Juventud\UI\pages\socios\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Socio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Modificar Socio' )
 */
class SocioModificar extends JuventudPage{

	/**
	 * socio a modificar.
	 * @var Socio
	 */
	private $socio;

	
	public function __construct(){
		
		//inicializamos el socio.
		$socio = new Socio();
		$this->setSocio($socio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setSocioOid($oid){
		
		//a partir del id buscamos el socio a modificar.
		$socio = UIServiceFactory::getUISocioService()->get($oid);
		
		$this->setSocio($socio);
		
	}
	
	public function getTitle(){
		return $this->localize( "socio.modificar.title" );
	}

	public function getType(){
		
		return "SocioModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$socioForm = $this->getComponentById("socioForm");
		$socioForm->fillFromSaved( $this->getSocio() );
	}

	public function getSocio(){
		
	    return $this->socio;
	}

	public function setSocio($socio)
	{
	    $this->socio = $socio;
	}
}
?>