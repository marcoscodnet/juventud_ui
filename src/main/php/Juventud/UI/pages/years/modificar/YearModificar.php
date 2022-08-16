<?php
namespace Juventud\UI\pages\years\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Year;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Modificar Anio' )
 */
class YearModificar extends JuventudPage{

	/**
	 * year a modificar.
	 * @var Year
	 */
	private $year;

	
	public function __construct(){
		
		//inicializamos el year.
		$year = new Year();
		$this->setYear($year);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setYearOid($oid){
		
		//a partir del id buscamos el year a modificar.
		$year = UIServiceFactory::getUIYearService()->get($oid);
		
		$this->setYear($year);
		
	}
	
	public function getTitle(){
		return $this->localize( "year.modificar.title" );
	}

	public function getType(){
		
		return "YearModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$yearForm = $this->getComponentById("yearForm");
		$yearForm->fillFromSaved( $this->getYear() );
	}

	public function getYear(){
		
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}
}
?>