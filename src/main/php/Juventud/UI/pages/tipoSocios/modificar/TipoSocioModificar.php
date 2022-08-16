<?php
namespace Juventud\UI\pages\tipoSocios\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\TipoSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Modificar Tipo de Socio' )
 */
class TipoSocioModificar extends JuventudPage{

	/**
	 * tipoSocio a modificar.
	 * @var TipoSocio
	 */
	private $tipoSocio;

	
	public function __construct(){
		
		//inicializamos el tipoSocio.
		$tipoSocio = new TipoSocio();
		$this->setTipoSocio($tipoSocio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setTipoSocioOid($oid){
		
		//a partir del id buscamos el tipoSocio a modificar.
		$tipoSocio = UIServiceFactory::getUITipoSocioService()->get($oid);
		
		$this->setTipoSocio($tipoSocio);
		
	}
	
	public function getTitle(){
		return $this->localize( "tipoSocio.modificar.title" );
	}

	public function getType(){
		
		return "TipoSocioModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$tipoSocioForm = $this->getComponentById("tipoSocioForm");
		$tipoSocioForm->fillFromSaved( $this->getTipoSocio() );
	}

	public function getTipoSocio(){
		
	    return $this->tipoSocio;
	}

	public function setTipoSocio($tipoSocio)
	{
	    $this->tipoSocio = $tipoSocio;
	}
}
?>