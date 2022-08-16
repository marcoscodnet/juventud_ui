<?php

namespace Juventud\UI\components\filter\tipoSocio;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;
use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Juventud\UI\components\grid\model\TipoSocioGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar tipoSocios
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class TipoSocioFilter extends Filter{
		
	public function getType(){
		
		return "TipoSocioFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new TipoSocioGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UITipoSocioCriteria()) );
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("tipo");
		$this->addProperty("pagaCuota");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("nombre", $this->getInitialText() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_tipo",  $this->localize("criteria.tipo") );
		$xtpl->assign("lbl_pagaCuota",  $this->localize("criteria.pagaCuota") );
		
		
	}
	
	public function getFiltrosSINO(){
		
		$items = array();
		$items[ 0 ] = $this->localize("criteria.sin_especificar");
		$items[ UIJuventudCriteria::no ] = $this->localize("filter.no");
		$items[ UIJuventudCriteria::yes ] = $this->localize("filter.yes");
		
		
		return $items;
		
	}
}
?>