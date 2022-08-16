<?php

namespace Juventud\UI\components\form\year;



use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;

use Juventud\Core\model\Year;

use Rasty\utils\LinkBuilder;

/**
 * Formulario para year

 * @author Marcos
 * @since 16/02/2017
 */
class YearForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var Year
	 */
	private $year;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		//$this->addProperty("fechaHora");
		$this->addProperty("nombre");
		$this->addProperty("cuotas");
		$this->addProperty("monto");
		
		$this->setBackToOnSuccess("Years");
		$this->setBackToOnCancel("Years");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "YearForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
	
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		$xtpl->assign("lbl_nombre", $this->localize("year.nombre") );
		$xtpl->assign("lbl_cuotas", $this->localize("year.cuotas") );
		$xtpl->assign("lbl_monto", $this->localize("year.monto") );
		
	}


	public function getLabelCancel()
	{
	    return $this->labelCancel;
	}

	public function setLabelCancel($labelCancel)
	{
	    $this->labelCancel = $labelCancel;
	}

	
	public function getLinkCancel(){
		$params = array();
		
		return LinkBuilder::getPageUrl( $this->getBackToOnCancel() , $params) ;
	}
	
	

	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	    
		
		
	}

	
	
	
	
	
	
	
}
?>