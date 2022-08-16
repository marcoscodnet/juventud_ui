<?php
namespace Juventud\UI\pages\years\agregar;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\pages\JuventudPage;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Year;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**

 * 
 * @Rasty\security\annotations\Secured( permission='Agregar Anio' )
 */
class YearAgregar extends JuventudPage{

	/**
	 * year a agregar.
	 * @var Year
	 */
	private $year;

	
	public function __construct(){
		
		//inicializamos el year.
		$year = new Year();
		
		

		
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
		return $this->localize( "year.agregar.title" );
	}

	public function getType(){
		
		return "YearAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$yearForm = $this->getComponentById("yearForm");
		$yearForm->fillFromSaved( $this->getYear() );
		
	}


	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>