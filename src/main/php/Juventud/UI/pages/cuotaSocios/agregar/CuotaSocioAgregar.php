<?php
namespace Juventud\UI\pages\cuotaSocios\agregar;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\CuotaSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

use Juventud\Core\conf\JuventudConfig;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Agregar Cuota' )
 */
class CuotaSocioAgregar extends JuventudPage{

	/**
	 * cuotaSocio a agregar.
	 * @var CuotaSocio
	 */
	private $cuotaSocio;

	
	public function __construct(){
		
		//inicializamos el cuotaSocio.
		$cuotaSocio = new CuotaSocio();
		
		$cuotaSocio->setFechaPago( new \Datetime() );
		
		
		
		$this->setCuotaSocio($cuotaSocio);
		
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
		return $this->localize( "cuotaSocio.agregar.title" );
	}

	public function getType(){
		
		return "CuotaSocioAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$cuotaSocioForm = $this->getComponentById("cuotaSocioForm");
		$cuotaSocioForm->fillFromSaved( $this->getCuotaSocio() );
		
	}


	public function getCuotaSocio()
	{
	    return $this->cuotaSocio;
	}

	public function setCuotaSocio($cuotaSocio)
	{
	    $this->cuotaSocio = $cuotaSocio;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>