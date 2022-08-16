<?php
namespace Juventud\UI\pages\cuotaSocios;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UICuotaSocioCriteria;

use Juventud\UI\components\grid\model\CuotaSocioGridModel;

use Juventud\UI\service\UICuotaSocioService;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Juventud\Core\model\CuotaSocio;
use Juventud\Core\criteria\CuotaSocioCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar las cuotaSocios.
 * 
 * @author Marcos
 * @since 24/02/2017
 * 
 * @Rasty\security\annotations\Secured( permission='Consultar Cuotas' )
 */
class CuotaSocios extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "cuotaSocios.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.cuotaSocios.agregar") );
		$menuOption->setPageName("CuotaSocioAgregar");
		$menuOption->setIconClass( "icon-agregar fg-green" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "CuotaSocios";
		
	}	

	public function getModelClazz(){
		return get_class( new CuotaSocioGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UICuotaSocioCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("cuotaSocio.agregar") );
	}

}
?>