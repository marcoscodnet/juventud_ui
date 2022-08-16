<?php
namespace Juventud\UI\pages\tipoSocios\agregar;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\pages\JuventudPage;

use Rasty\utils\XTemplate;
use Juventud\Core\model\TipoSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Agregar Tipo de Socio' )
 */
class TipoSocioAgregar extends JuventudPage{

	/**
	 * tipoSocio a agregar.
	 * @var TipoSocio
	 */
	private $tipoSocio;

	
	public function __construct(){
		
		//inicializamos el tipoSocio.
		$tipoSocio = new TipoSocio();
		
		

		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("Years");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "tipoSocio.agregar.title" );
	}

	public function getType(){
		
		return "TipoSocioAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$tipoSocioForm = $this->getComponentById("tipoSocioForm");
		$tipoSocioForm->fillFromSaved( $this->getTipoSocio() );
		
	}


	public function getTipoSocio()
	{
	    return $this->tipoSocio;
	}

	public function setTipoSocio($tipoSocio)
	{
	    $this->tipoSocio = $tipoSocio;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>