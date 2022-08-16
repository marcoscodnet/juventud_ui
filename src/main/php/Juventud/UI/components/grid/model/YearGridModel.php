<?php
namespace Juventud\UI\components\grid\model;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIYearCriteria;

use Rasty\Grid\entitygrid\EntityGrid;
use Rasty\Grid\entitygrid\model\EntityGridModel;
use Rasty\Grid\entitygrid\model\GridModelBuilder;
use Rasty\Grid\filter\model\UICriteria;
use Rasty\Grid\entitygrid\model\GridDatetimeFormat;
use Juventud\UI\service\UIServiceFactory;
use Rasty\utils\RastyUtils;
use Rasty\utils\Logger;

use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\MenuActionAjaxOption;

/**
 * Model para la grilla de Years.
 * 
 * @author Marcos
 * @since 16/02/2017
 */
class YearGridModel extends EntityGridModel{

	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUIYearService();
    }
    
    public function getFilter(){
	    
    	$filter = new UIYearCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "year.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		
		
		$column = GridModelBuilder::buildColumn( "nombre", "year.nombre", 10, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );

		$column = GridModelBuilder::buildColumn( "cuotas", "year.cuotas", 5, EntityGrid::TEXT_ALIGN_CENTER );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "monto", "year.monto", 5, EntityGrid::TEXT_ALIGN_CENTER );
		$this->addColumn( $column );

		
	}

	public function getDefaultFilterField() {
        return "nombre";
    }

	public function getDefaultOrderField(){
		return "nombre";
	}    

	public function getDefaultOrderType(){
		return "DESC";
	}
	
    /**
	 * opciones de menú dado el item
	 * @param unknown_type $item
	 */
	public function getMenuGroups( $item ){
	
		$group = new MenuGroup();
		$group->setLabel("grupo");
		$options = array();

		
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.years.modificar") );
		$menuOption->setPageName( "YearModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-editar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.years.eliminar") );
		$menuOption->setPageName( "YearEliminar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-remove" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.years.montoCuotas") );
		$menuOption->setPageName( "MontoCuotas" );
		$menuOption->addParam("yearOid",$item->getOid());
		$menuOption->setIconClass( "icon-consultar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		return array( $group );
		
	} 
	
	public function getRowStyleClass($item){
		
		//return JuventudUIUtils::getEstadoYearCss($item->getEstado());
		
	}
	
}
?>