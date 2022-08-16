<?php

namespace Juventud\UI\components\header;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;
use Rasty\utils\XTemplate;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\SubmenuOption;

class HeaderNav extends RastyComponent{

	private $title;
	
	private $pageMenuGroups;

	public function __construct(){
		$this->pageMenuGroups = array();
		//$this->setTitle($this->localize("app.title"));
	}
	
	public function getType(){
		
		return "HeaderNav";
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		
		//$xtpl->assign("cuentas_titulo", $this->localize("app.title"));
		$titles = array();
		$titles[] = $this->localize("app.title");
		$titles[] = $this->getTitle();
		
		$xtpl->assign("Juventud_titulo", implode(" / ", $titles));
		
		$xtpl->assign("menu_page", $this->localize("menu.page"));
		$xtpl->assign("menu_main", $this->localize("menu.main"));
		
	}
	
	public function getMainMenuGroups(){
		
		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroups = array();
		
		//if( JuventudUIUtils::isAdminLogged() ){

			$menu = $this->getMenuSeguridad() ;
			if($menu)
				$menuGroups[] =  $menu;
				
			$menu = $this->getMenuJuventud() ;
			if($menu)
				$menuGroups[] =  $menu;
									
			
				
		//}
		

		return $menuGroups;
	}
	
	public function getPageMenuGroups(){
		
		return $this->pageMenuGroups;
	}

	public function setPageMenuGroups($pageMenuGroups)
	{
	    $this->pageMenuGroups = $pageMenuGroups;
	}

	public function getTitle()
	{
	    return $this->title;
	}

	public function setTitle($title)
	{
		if(!empty($title))
	    	$this->title = $title;
	}
	
	public function getMenuSeguridad(){
		
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.seguridad") );
	
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.usuarios") );
		$menuOption->setPageName( "Usuarios" );
		$menuOption->setIconClass("icon-user");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
		
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.roles") );
		$menuOption->setIconClass("icon-roles");
		$menuOption->setPageName( "Roles");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
	
		
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.permisos") );
		$menuOption->setPageName( "Permisos" );
		$menuOption->setIconClass("icon-permisos");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
	
		
		if( count($menuGroup->getMenuOptions())> 0){

			$submenu = new SubmenuOption($menuGroup);
			//$submenu->setIconClass("icon-seguridad");
			return $submenu;
			
		}else{
			return false;
		}
		
		
	}
	
	public function getMenuJuventud(){
	
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.juventud") );
	
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.years") );
		$menuOption->setPageName( "Years" );
		//$menuOption->setIconClass("icon-productos");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
	
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.cuotaSocios") );
		$menuOption->setPageName( "CuotaSocios" );
		//$menuOption->setIconClass("icon-productos");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
		
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.socios") );
		$menuOption->setPageName( "Socios" );
		//$menuOption->setIconClass("icon-productos");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
	
		
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.tipoSocios") );
		$menuOption->setPageName( "TipoSocios" );
		//$menuOption->setIconClass("icon-productos");
		JuventudUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
	
		
		if( count($menuGroup->getMenuOptions())> 0){

			$submenu = new SubmenuOption($menuGroup);
			//$submenu->setIconClass("icon-seguridad");
			return $submenu;
			
		}else{
			return false;
		}
		
	
	}
	
}
?>