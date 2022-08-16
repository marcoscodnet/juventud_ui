<?php
namespace Juventud\UI\components\grid\model;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIMontoCuotaCriteria;

use Rasty\Grid\entitygrid\EntityGrid;
use Rasty\Grid\entitygrid\model\EntityGridModel;
use Rasty\Grid\entitygrid\model\GridModelBuilder;
use Rasty\Grid\filter\model\UICriteria;
use Rasty\Grid\entitygrid\model\GridDatetimeFormat;
use Juventud\UI\components\grid\formats\GridImporteFormat;
use Juventud\UI\service\UIServiceFactory;
use Rasty\utils\RastyUtils;
use Rasty\utils\Logger;


use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\MenuActionAjaxOption;

/**
 * Model para la grilla de MontoCuotas.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class MontoCuotaGridModel extends EntityGridModel{

	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUIMontoCuotaService();
    }
    
    public function getFilter(){
	    
    	$filter = new UIMontoCuotaCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "montoCuota.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		
		
		$column = GridModelBuilder::buildColumn( "year", "montoCuota.year", 10, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );

		$column = GridModelBuilder::buildColumn( "nro", "montoCuota.nro", 5, EntityGrid::TEXT_ALIGN_CENTER );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "vencimiento", "montoCuota.vencimiento", 5, EntityGrid::TEXT_ALIGN_CENTER, new GridDatetimeFormat("d/m/Y") );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "monto", "montoCuota.monto", 5, EntityGrid::TEXT_ALIGN_RIGHT, new GridImporteFormat() );
		$this->addColumn( $column );

		
	}

	public function getDefaultFilterField() {
        return "nro";
    }

	public function getDefaultOrderField(){
		return "nro";
	}    

	public function getDefaultOrderType(){
		return "ASC";
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
		$menuOption->setLabel( $this->localize( "menu.montoCuotas.modificar") );
		$menuOption->setPageName( "MontoCuotaModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-editar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.montoCuotas.eliminar") );
		$menuOption->setPageName( "MontoCuotaEliminar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-remove" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		
		return array( $group );
		
	} 
	
	public function getRowStyleClass($item){
		
		//return JuventudUIUtils::getEstadoYearCss($item->getEstado());
		
	}
	
}
?>