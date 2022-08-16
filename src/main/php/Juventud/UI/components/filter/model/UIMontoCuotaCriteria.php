<?php
namespace Juventud\UI\components\filter\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Rasty\utils\RastyUtils;
use Juventud\Core\criteria\MontoCuotaCriteria;

/**
 * Representa un criterio de búsqueda
 * para montoCuotas.
 * 
 * @author Marcos
 * @since 19/02/2017
 *
 */
class UIMontoCuotaCriteria extends UIJuventudCriteria{

	/* constantes para los filtros predefinidos */
	
	private $year;
	private $nro;
	
	
		
	public function __construct(){

		parent::__construct();
		
		

	}
		
	protected function newCoreCriteria(){
		return new MontoCuotaCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
		$criteria->setYear( $this->getYear() );		
		$criteria->setNro( $this->getNro() );
		
		
		return $criteria;
	}


	
	
	

	

	public function getNro()
	{
	    return $this->nro;
	}

	public function setNro($nro)
	{
	    $this->nro = $nro;
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