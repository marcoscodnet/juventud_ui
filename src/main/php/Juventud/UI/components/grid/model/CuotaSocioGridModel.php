<?php
namespace Juventud\UI\components\grid\model;

use Juventud\UI\utils\JuventudUIUtils;
use Juventud\UI\components\grid\formats\GridBooleanFormat;
use Juventud\UI\components\grid\formats\GridImporteFormat;
use Juventud\UI\components\filter\model\UICuotaSocioCriteria;

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
 * Model para la grilla de CuotaSocios.
 * 
 * @author Marcos
 * @since 24/02/2017
 */
class CuotaSocioGridModel extends EntityGridModel{

	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUICuotaSocioService();
    }
    
    public function getFilter(){
	    
    	$filter = new UICuotaSocioCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "cuotaSocio.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		
		
		

		$column = GridModelBuilder::buildColumn( "montoCuota", "cuotaSocio.montoCuota", 10, EntityGrid::TEXT_ALIGN_LEFT );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "socio", "cuotaSocio.socio", 10, EntityGrid::TEXT_ALIGN_LEFT );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "monto", "cuotaSocio.monto", 5, EntityGrid::TEXT_ALIGN_RIGHT, new GridImporteFormat() );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "vencimiento", "cuotaSocio.vencimiento", 5, EntityGrid::TEXT_ALIGN_CENTER, new GridDatetimeFormat("d/m/Y") );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaPago", "cuotaSocio.fechaPago", 5, EntityGrid::TEXT_ALIGN_CENTER, new GridDatetimeFormat("d/m/Y") );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "pagada", "cuotaSocio.pagada", 5, EntityGrid::TEXT_ALIGN_CENTER, new GridBooleanFormat() ) ;
		$this->addColumn( $column );

		
	}

	public function getDefaultFilterField() {
        return "oid";
    }

	public function getDefaultOrderField(){
		return "oid";
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
		$menuOption->setLabel( $this->localize( "menu.cuotaSocios.modificar") );
		$menuOption->setPageName( "CuotaSocioModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-editar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.cuotaSocios.eliminar") );
		$menuOption->setPageName( "CuotaSocioEliminar" );
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