<?php

namespace Juventud\UI\components\form\montoCuota;



use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;

use Juventud\Core\model\MontoCuota;

use Rasty\utils\LinkBuilder;

/**
 * Formulario para montoCuota

 * @author Marcos
 * @since 19/02/2017
 */
class MontoCuotaForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var MontoCuota
	 */
	private $montoCuota;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		$this->addProperty("nro");
		$this->addProperty("monto");
		$this->addProperty("vencimiento");
		
		$this->setBackToOnSuccess("MontoCuotas");
		$this->setBackToOnCancel("MontoCuotas");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "MontoCuotaForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
	
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		
		$xtpl->assign("lbl_year", $this->localize("year.nombre") );
		$xtpl->assign("lbl_nro", $this->localize("montoCuota.nro") );
		$xtpl->assign("lbl_vencimiento", $this->localize("montoCuota.vencimiento") );
		$xtpl->assign("lbl_monto", $this->localize("year.monto") );
		
		$xtpl->assign("year", $this->getMontoCuota()->getYear()->getNombre() );
		
		
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
		$params = array('yearOid'=>$this->getMontoCuota()->getYear()->getOid());
		
		return LinkBuilder::getPageUrl( $this->getBackToOnCancel() , $params) ;
	}
	

	

	

	
	
	
	
	
	
	

	public function getMontoCuota()
	{
	    return $this->montoCuota;
	}

	public function setMontoCuota($montoCuota)
	{
	    $this->montoCuota = $montoCuota;
	}
}
?>