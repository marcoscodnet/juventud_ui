<?php

namespace Juventud\UI\components\form\socio;

use Juventud\UI\service\finder\TipoSocioFinder;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;

use Juventud\UI\service\UITipoSocioService;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;

use Juventud\Core\model\Socio;
use Juventud\Core\model\TipoSocio;

use Rasty\utils\LinkBuilder;

/**
 * Formulario para socio

 * @author Marcos
 * @since 21/02/2017
 */
class SocioForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var Socio
	 */
	private $socio;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		
		$this->addProperty("nombre");
		$this->addProperty("apellido");
		$this->addProperty("dni");
		$this->addProperty("tipoSocio");
		$this->addProperty("email");
		$this->addProperty("telefono");
		$this->addProperty("direccion");
		$this->addProperty("pagaDesde");
        $this->addProperty("nroSocio");
		
		$this->setBackToOnSuccess("Socios");
		$this->setBackToOnCancel("Socios");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "SocioForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
	
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );

        $xtpl->assign("lbl_nroSocio", $this->localize("socio.nroSocio") );
		$xtpl->assign("lbl_nombre", $this->localize("socio.nombre") );
		$xtpl->assign("lbl_apellido", $this->localize("socio.apellido") );
		$xtpl->assign("lbl_dni", $this->localize("socio.dni") );
		$xtpl->assign("lbl_tipoSocio", $this->localize("socio.tipoSocio") );
		$xtpl->assign("lbl_email", $this->localize("socio.email") );
		$xtpl->assign("lbl_direccion", $this->localize("socio.direccion") );
		$xtpl->assign("lbl_telefono", $this->localize("socio.telefono") );
		$xtpl->assign("lbl_pagaDesde", $this->localize("socio.pagaDesde") );
		
		
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
	
	public function getTipoSocioFinderClazz(){
		
		return get_class( new TipoSocioFinder() );
		
	}
	
	public function getTipoSocios(){
		
		$tipoSocios = UIServiceFactory::getUITipoSocioService()->getList(new UITipoSocioCriteria());
		
		return $tipoSocios;
		
	}

	

	
	
	
	
	
	
	

	

	public function getSocio()
	{
	    return $this->socio;
	}

	public function setSocio($socio)
	{
	    $this->socio = $socio;
	}
}
?>