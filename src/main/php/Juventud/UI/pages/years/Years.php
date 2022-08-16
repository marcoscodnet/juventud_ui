<?php
namespace Juventud\UI\pages\years;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UIYearCriteria;

use Juventud\UI\components\grid\model\YearGridModel;

use Juventud\UI\service\UIYearService;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Juventud\Core\model\Year;
use Juventud\Core\criteria\YearCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar las years.
 * 
 * @author Marcos
 * @since 16/02/2017
 * 
 * @Rasty\security\annotations\Secured( permission='CONSULTAR ANIOS' )
 */
class Years extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "years.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.years.agregar") );
		$menuOption->setPageName("YearAgregar");
		$menuOption->setIconClass( "icon-agregar fg-green" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Years";
		
	}	

	public function getModelClazz(){
		return get_class( new YearGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIYearCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("year.agregar") );
	}

}
?>