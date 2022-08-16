<?php

namespace Juventud\UI\components\filter\year;

use Juventud\UI\components\filter\model\UIYearCriteria;

use Juventud\UI\components\grid\model\YearGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar years
 * 
 * @author Marcos
 * @since 16/02/2017
 */
class YearFilter extends Filter{
		
	public function getType(){
		
		return "YearFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new YearGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UIYearCriteria()) );
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nombre");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("nombre", $this->getInitialText() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nombre",  $this->localize("criteria.nombre") );
		
		
	}
	
	
}
?>