<?php

namespace Juventud\UI\components\filter\socio;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;

use Juventud\UI\components\filter\model\UISocioCriteria;
use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Juventud\UI\components\grid\model\SocioGridModel;

use Juventud\UI\service\finder\TipoSocioFinder;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar socios
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class SocioFilter extends Filter{
		
	public function getType(){
		
		return "SocioFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new SocioGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UISocioCriteria()) );
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nombre");
		$this->addProperty("apellido");
		$this->addProperty("dni");
		$this->addProperty("email");
		$this->addProperty("tipoSocio");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("nombre", $this->getInitialText() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nombre",  $this->localize("criteria.nombre") );
		$xtpl->assign("lbl_apellido",  $this->localize("criteria.apellido") );
		$xtpl->assign("lbl_dni",  $this->localize("criteria.dni") );
		$xtpl->assign("lbl_email",  $this->localize("criteria.email") );
		$xtpl->assign("lbl_tipoSocio",  $this->localize("criteria.tipoSocio") );
		
		
	}
	
	public function getTipoSocioFinderClazz(){
		
		return get_class( new TipoSocioFinder() );
		
	}	

	public function getTipoSocios(){
		
		$tipos = UIServiceFactory::getUITipoSocioService()->getList( new UITipoSocioCriteria() );
		
		return $tipos;		
	}
}
?>