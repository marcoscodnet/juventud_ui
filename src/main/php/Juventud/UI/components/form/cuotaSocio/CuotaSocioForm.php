<?php

namespace Juventud\UI\components\form\cuotaSocio;



use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;

use Juventud\Core\model\CuotaSocio;

use Rasty\utils\LinkBuilder;

use Juventud\UI\service\finder\MontoCuotaFinder;
use Juventud\UI\service\finder\SocioFinder;

/**
 * Formulario para cuotaSocio

 * @author Marcos
 * @since 24/02/2017
 */
class CuotaSocioForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var CuotaSocio
	 */
	private $cuotaSocio;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		$this->addProperty("montoCuota");
		$this->addProperty("socio");
		$this->addProperty("monto");
		$this->addProperty("vencimiento");
		$this->addProperty("fechaPago");
		$this->addProperty("pagada");
		
		$this->setBackToOnSuccess("CuotaSocios");
		$this->setBackToOnCancel("CuotaSocios");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "CuotaSocioForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
	
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		
		
		$xtpl->assign("lbl_montoCuota", $this->localize("cuotaSocio.montoCuota") );
		$xtpl->assign("lbl_vencimiento", $this->localize("cuotaSocio.vencimiento") );
		$xtpl->assign("lbl_monto", $this->localize("cuotaSocio.monto") );
		$xtpl->assign("lbl_socio", $this->localize("cuotaSocio.socio") );
		$xtpl->assign("lbl_fechaPago", $this->localize("cuotaSocio.fechaPago") );
		$xtpl->assign("lbl_pagada", $this->localize("cuotaSocio.pagada") );
		
		
		
		
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
	
	public function getMontoCuotaFinderClazz(){
		
		return get_class( new MontoCuotaFinder() );
		
	}
	
	public function setMontoCuotaOid($montoCuotaOid){
		
		if(!empty($montoCuotaOid)){
			
			$montoCuota = UIServiceFactory::getUIMontoCuotaService()->get($montoCuotaOid);
			$this->getCriteria()->setMontoCuota($montoCuota);
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
	

	
	
	
	
	

	public function getCuotaSocio()
	{
	    return $this->cuotaSocio;
	}

	public function setCuotaSocio($cuotaSocio)
	{
	    $this->cuotaSocio = $cuotaSocio;
	}
}
?>