<?php
namespace Juventud\UI\pages\montoCuotas;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\components\filter\model\UIMontoCuotaCriteria;

use Juventud\UI\components\grid\model\MontoCuotaGridModel;

use Juventud\UI\service\UIMontoCuotaService;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Juventud\Core\model\MontoCuota;
use Juventud\Core\criteria\MontoCuotaCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar las montoCuotas.
 * 
 * @author Marcos
 * @since 19/02/2017
 * 
 * @Rasty\security\annotations\Secured( permission='Consultar Cuotas' )
 */
class MontoCuotas extends JuventudPage{

	
	public function __construct(){
		
	}
	
	public function getTitle(){
		return $this->localize( "montoCuotas.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "form.volver") );
		$menuOption->setPageName("Years");
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "MontoCuotas";
		
	}	

	public function getModelClazz(){
		return get_class( new MontoCuotaGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIMontoCuotaCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("montoCuota.agregar") );
	}

}
?>