<?php

namespace Juventud\UI\components\form\tipoSocio;



use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;

use Juventud\Core\model\TipoSocio;

use Rasty\utils\LinkBuilder;

/**
 * Formulario para tipoSocio

 * @author Marcos
 * @since 19/02/2017
 */
class TipoSocioForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var TipoSocio
	 */
	private $tipoSocio;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		
		$this->addProperty("tipo");
		$this->addProperty("pagaCuota");
		
		
		$this->setBackToOnSuccess("TipoSocios");
		$this->setBackToOnCancel("TipoSocios");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "TipoSocioForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
	
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		$xtpl->assign("lbl_tipo", $this->localize("tipoSocio.tipo") );
		$xtpl->assign("lbl_pagaCuota", $this->localize("tipoSocio.pagaCuota") );
		
		
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
	
	

	

	
	
	
	
	
	
	

	public function getTipoSocio()
	{
	    return $this->tipoSocio;
	}

	public function setTipoSocio($tipoSocio)
	{
	    $this->tipoSocio = $tipoSocio;
	}
}
?>