<?php
namespace Juventud\UI\pages\roles;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UIRolCriteria;

use Juventud\UI\components\grid\model\RolGridModel;

use Juventud\UI\service\UIRolService;

use Juventud\UI\utils\JuventudUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar los roles
 * 
 * @author Bernardo
 * @since 27/12/2014
 * 
 * @Rasty\Security\annotation\Secured( permission='Consultar Roles' )
 */
class Roles extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "roles.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del rol 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "rol.agregar") );
		$menuOption->setPageName("RolAgregar");
		$menuOption->setIconClass( "icon-agregar" );
		$menuGroup->addMenuOption( $menuOption );
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Roles";
		
	}	

	public function getModelClazz(){
		return get_class( new RolGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIRolCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("lbl_add", $this->localize("menu.roles.agregar") );
		$xtpl->assign("linkAdd", $this->getLinkRolAgregar() );
		
		$xtpl->parse("main.opciones.add");
		$xtpl->parse("main.opciones");
	}

}
?>