<?php

namespace Juventud\UI\components\filter\cuotaSocio;

use Juventud\UI\components\filter\model\UICuotaSocioCriteria;
use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Juventud\UI\components\grid\model\CuotaSocioGridModel;


use Juventud\UI\service\UIServiceFactory;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;
use Rasty\utils\RastyUtils;

use Juventud\UI\service\finder\YearFinder;
use Juventud\UI\service\finder\SocioFinder;

/**
 * Filtro para buscar cuotaSocios
 * 
 * @author Marcos
 * @since 24/02/2017
 */
class CuotaSocioFilter extends Filter{
		
	public function getType(){
		
		return "CuotaSocioFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new CuotaSocioGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UICuotaSocioCriteria()) );
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nro");
		$this->addProperty("year");
		$this->addProperty("socio");
		$this->addProperty("pagada");
		$this->addProperty("fechaPagoDesde");
		$this->addProperty("fechaPagoHasta");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nro con el texto inicial
		//$this->fillInput("nro", $this->getInitialText() );
		
		
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nro",  $this->localize("criteria.nro") );
		$xtpl->assign("lbl_year",  $this->localize("criteria.year") );
		$xtpl->assign("lbl_socio",  $this->localize("criteria.socio") );
		$xtpl->assign("lbl_pagada",  $this->localize("criteria.pagada") );
		$xtpl->assign("lbl_fechaPagoDesde",  $this->localize("criteria.fechaPagoDesde") );
		$xtpl->assign("lbl_fechaPagoHasta",  $this->localize("criteria.fechaPagoHasta") );
		
		
	}
	
	public function getYearFinderClazz(){
		
		return get_class( new YearFinder() );
		
	}
	
	public function setYearOid($yearOid){
		
		if(!empty($yearOid)){
			
			$year = UIServiceFactory::getUIYearService()->get($yearOid);
			$this->getCriteria()->setYear($year);
		}
		
	}
	
	public function getSocioFinderClazz(){
		
		return get_class( new SocioFinder() );
		
	}
	
	public function setSocioOid($socioOid){
		
		if(!empty($socioOid)){
			
			$socio = UIServiceFactory::getUISocioService()->get($socioOid);
			$this->getCriteria()->setSocio($socio);
		}
		
	}
	
	public function getFiltrosSINO(){
		
		$items = array();
		$items[ 0 ] = $this->localize("criteria.sin_especificar");
		$items[ UIJuventudCriteria::no ] = $this->localize("filter.no");
		$items[ UIJuventudCriteria::yes ] = $this->localize("filter.yes");
		
		
		return $items;
		
	}
	
	public function getYear(){
		
		
		
	}
	
	public function getSocio(){
		
		
		
	}
	
}
?>