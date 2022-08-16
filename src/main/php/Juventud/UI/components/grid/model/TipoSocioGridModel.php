<?php
namespace Juventud\UI\components\grid\model;

use Juventud\UI\components\grid\formats\GridBooleanFormat;
use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;

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
 * Model para la grilla de TipoSocios.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class TipoSocioGridModel extends EntityGridModel{

	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUITipoSocioService();
    }
    
    public function getFilter(){
	    
    	$filter = new UITipoSocioCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "tipoSocio.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		
		
		$column = GridModelBuilder::buildColumn( "tipo", "tipoSocio.tipo", 10, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );

		$column = GridModelBuilder::buildColumn( "pagaCuota", "tipoSocio.pagaCuota", 10, EntityGrid::TEXT_ALIGN_CENTER, new GridBooleanFormat() ) ;
		$this->addColumn( $column );
		
		

		
	}

	public function getDefaultFilterField() {
        return "tipo";
    }

	public function getDefaultOrderField(){
		return "tipo";
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
		$menuOption->setLabel( $this->localize( "menu.tipoSocios.modificar") );
		$menuOption->setPageName( "TipoSocioModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setIconClass( "icon-editar" );
		$options[] = $menuOption ;
		
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $group);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.tipoSocios.eliminar") );
		$menuOption->setPageName( "TipoSocioEliminar" );
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