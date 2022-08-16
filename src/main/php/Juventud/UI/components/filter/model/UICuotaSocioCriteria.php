<?php
namespace Juventud\UI\components\filter\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Rasty\utils\RastyUtils;
use Juventud\Core\criteria\CuotaSocioCriteria;

/**
 * Representa un criterio de búsqueda
 * para socios.
 * 
 * @author Marcos
 * @since 23/02/2017
 *
 */
class UICuotaSocioCriteria extends UIJuventudCriteria{

	/* constantes para los filtros predefinidos */
	
	private $year;
	
	private $nro;
	
	private $montoCuota;
	
	private $socio;

	private $pagada;
	
	private $vencimiento;
	
	private $vencimientoDesde;
	
	private $vencimientoHasta;
	
	private $fechaPago;
	
	private $fechaPagoDesde;
	
	private $fechaPagoHasta;
	
	
		
	public function __construct(){

		parent::__construct();
		
		

	}
		
	protected function newCoreCriteria(){
		return new CuotaSocioCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setYear( $this->getYear() );
		$criteria->setNro( $this->getNro() );
		$criteria->setFechaPago( $this->getFechaPago() );
		$criteria->setFechaPagoDesde( $this->getFechaPagoDesde() );
		$criteria->setFechaPagoHasta( $this->getFechaPagoHasta() );
		$criteria->setMontoCuota( $this->getMontoCuota() );
		$criteria->setPagada( $this->getPagada() );
		$criteria->setSocio( $this->getSocio() );
		$criteria->setVencimiento( $this->getVencimiento() );
		$criteria->setVencimientoDesde( $this->getVencimientoDesde() );
		$criteria->setVencimientoHasta( $this->getVencimientoHasta() );
		
		
		return $criteria;
	}


	
	
	

	

	

	public function getMontoCuota()
	{
	    return $this->montoCuota;
	}

	public function setMontoCuota($montoCuota)
	{
	    $this->montoCuota = $montoCuota;
	}

	public function getSocio()
	{
	    return $this->socio;
	}

	public function setSocio($socio)
	{
	    $this->socio = $socio;
	}

	public function getPagada()
	{
	    return $this->pagada;
	}

	public function setPagada($pagada)
	{
	    $this->pagada = $pagada;
	}

	public function getVencimiento()
	{
	    return $this->vencimiento;
	}

	public function setVencimiento($vencimiento)
	{
	    $this->vencimiento = $vencimiento;
	}

	public function getVencimientoDesde()
	{
	    return $this->vencimientoDesde;
	}

	public function setVencimientoDesde($vencimientoDesde)
	{
	    $this->vencimientoDesde = $vencimientoDesde;
	}

	public function getVencimientoHasta()
	{
	    return $this->vencimientoHasta;
	}

	public function setVencimientoHasta($vencimientoHasta)
	{
	    $this->vencimientoHasta = $vencimientoHasta;
	}

	public function getFechaPago()
	{
	    return $this->fechaPago;
	}

	public function setFechaPago($fechaPago)
	{
	    $this->fechaPago = $fechaPago;
	}

	public function getFechaPagoDesde()
	{
	    return $this->fechaPagoDesde;
	}

	public function setFechaPagoDesde($fechaPagoDesde)
	{
	    $this->fechaPagoDesde = $fechaPagoDesde;
	}

	public function getFechaPagoHasta()
	{
	    return $this->fechaPagoHasta;
	}

	public function setFechaPagoHasta($fechaPagoHasta)
	{
	    $this->fechaPagoHasta = $fechaPagoHasta;
	}

	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}

	public function getNro()
	{
	    return $this->nro;
	}

	public function setNro($nro)
	{
	    $this->nro = $nro;
	}
}