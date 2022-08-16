<?php
namespace Juventud\UI\components\filter\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Rasty\utils\RastyUtils;
use Juventud\Core\criteria\YearCriteria;

/**
 * Representa un criterio de búsqueda
 * para years.
 * 
 * @author Marcos
 * @since 16/02/2017
 *
 */
class UIYearCriteria extends UIJuventudCriteria{

	/* constantes para los filtros predefinidos */
	
	
	private $nombre;
	
	private $cuotas;
	
	private $monto;
		
	public function __construct(){

		parent::__construct();
		
		

	}
		
	protected function newCoreCriteria(){
		return new YearCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setNombre( $this->getNombre() );
		$criteria->setCuotas( $this->getCuotas() );
		$criteria->setMonto( $this->getMonto() );
		
		return $criteria;
	}


	
	
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getCuotas()
	{
	    return $this->cuotas;
	}

	public function setCuotas($cuotas)
	{
	    $this->cuotas = $cuotas;
	}

	public function getMonto()
	{
	    return $this->monto;
	}

	public function setMonto($monto)
	{
	    $this->monto = $monto;
	}
}