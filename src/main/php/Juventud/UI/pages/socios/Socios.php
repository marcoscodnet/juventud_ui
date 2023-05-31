<?php
namespace Juventud\UI\pages\socios;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UISocioCriteria;

use Juventud\UI\components\grid\model\SocioGridModel;

use Juventud\UI\service\UISocioService;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Juventud\Core\model\Socio;
use Juventud\Core\criteria\SocioCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar las socios.
 * 
 * @author Marcos
 * @since 19/02/2017
 * 
 * @Rasty\security\annotations\Secured( permission='Consultar Socios' )
 */
class Socios extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "socios.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.socios.agregar") );
		$menuOption->setPageName("SocioAgregar");
		$menuOption->setIconClass( "icon-agregar fg-green" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Socios";
		
	}	

	public function getModelClazz(){
		return get_class( new SocioGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UISocioCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){



        $xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );


		$xtpl->assign("agregar_label", $this->localize("socio.agregar") );

        $xtpl->assign("lbl_pdf", $this->localize("socios.title") );
        $xtpl->assign("linkXls", $this->getLinkSociosXls() );
        $xtpl->parse("main.opciones.add");
        $xtpl->parse("main.opciones");
	}

}
?>