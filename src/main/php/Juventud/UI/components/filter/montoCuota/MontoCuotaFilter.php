<?php

namespace Juventud\UI\components\filter\montoCuota;

use Juventud\UI\components\filter\model\UIMontoCuotaCriteria;
use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Juventud\UI\components\grid\model\MontoCuotaGridModel;


use Juventud\UI\service\UIServiceFactory;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;
use Rasty\utils\RastyUtils;

use Juventud\UI\service\finder\YearFinder;

/**
 * Filtro para buscar montoCuotas
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class MontoCuotaFilter extends Filter{
		
	public function getType(){
		
		return "MontoCuotaFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new MontoCuotaGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UIMontoCuotaCriteria()) );
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nro");
		$this->addProperty("year");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nro con el texto inicial
		//$this->fillInput("nro", $this->getInitialText() );
		
		$yearOid = RastyUtils::getParamGET("yearOid");
		$year = UIServiceFactory::getUIYearService()->get($yearOid);
		$this->fillInput("year", $year );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nro",  $this->localize("criteria.nro") );
		$xtpl->assign("lbl_year",  $this->localize("criteria.year") );
		
		
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
	
	public function getYear(){
		
		
		
	}
	
}
?>