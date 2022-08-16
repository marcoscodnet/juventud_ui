<?php
namespace Juventud\UI\components\grid\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UISocioCriteria;

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
 * Model para la grilla de Socios.
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class SocioGridModel extends EntityGridModel{

	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUISocioService();
    }
    
    public function getFilter(){
	    
    	$filter = new UISocioCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "socio.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "nombre", "socio.nombre", 40, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "apellido", "socio.apellido", 40, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );

		$column = GridModelBuilder::buildColumn( "dni", "socio.dni", 10, EntityGrid::TEXT_ALIGN_CENTER ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "email", "socio.email", 40, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );

		$column = GridModelBuilder::buildColumn( "tipoSocio", "socio.tipoSocio", 10, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );
		
	}

	public function getDefaultFilterField() {
        return "apellido";
    }

	public function getDefaultOrderField(){
		return "apellido";
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
		$menuOption->setLabel( $this->localize( "menu.socios.modificar") );
		$menuOption->setPageName( "SocioModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-editar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.socios.eliminar") );
		$menuOption->setPageName( "SocioEliminar" );
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