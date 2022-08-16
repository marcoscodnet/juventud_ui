<?php
namespace Juventud\UI\pages\tipoSocios;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;

use Juventud\UI\components\grid\model\TipoSocioGridModel;

use Juventud\UI\service\UITipoSocioService;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Juventud\Core\model\TipoSocio;
use Juventud\Core\criteria\TipoSocioCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar las tipoSocios.
 * 
 * @author Marcos
 * @since 16/02/2017
 * 
 * @Rasty\security\annotations\Secured( permission='CONSULTAR TIPOS DE SOCIOS' )
 */
class TipoSocios extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "tipoSocios.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.tipoSocios.agregar") );
		$menuOption->setPageName("TipoSocioAgregar");
		$menuOption->setIconClass( "icon-agregar fg-green" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "TipoSocios";
		
	}	

	public function getModelClazz(){
		return get_class( new TipoSocioGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UITipoSocioCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("tipoSocio.agregar") );
	}

}
?>