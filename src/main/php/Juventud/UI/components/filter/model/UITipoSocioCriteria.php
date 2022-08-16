<?php
namespace Juventud\UI\components\filter\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Rasty\utils\RastyUtils;
use Juventud\Core\criteria\TipoSocioCriteria;

/**
 * Representa un criterio de búsqueda
 * para years.
 * 
 * @author Marcos
 * @since 19/02/2017
 *
 */
class UITipoSocioCriteria extends UIJuventudCriteria{

	/* constantes para los filtros predefinidos */
	
	
	private $tipo;
	
	private $pagaCuota;
	
	
		
	public function __construct(){

		parent::__construct();
		
		

	}
		
	protected function newCoreCriteria(){
		return new TipoSocioCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setTipo( $this->getTipo() );
		$criteria->setPagaCuota( $this->getPagaCuota() );
		
		
		return $criteria;
	}


	
	
	

	

	public function getTipo()
	{
	    return $this->tipo;
	}

	public function setTipo($tipo)
	{
	    $this->tipo = $tipo;
	}

	public function getPagaCuota()
	{
	    return $this->pagaCuota;
	}

	public function setPagaCuota($pagaCuota)
	{
	    $this->pagaCuota = $pagaCuota;
	}
}