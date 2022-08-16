<?php
namespace Juventud\UI\components\filter\model;

use Rasty\Grid\filter\model\UICriteria;
use Rasty\utils\RastyUtils;
use Rasty\utils\ReflectionUtils;

/**
 * Representa un criterio de búsqueda.
 * 
 * @author Marcos
 *
 */
abstract class UIJuventudCriteria extends UICriteria{

	const yes = 2;
	const no = 1;
	private $filtroPredefinido;
	
	/**
	 * @var Criteria
	 */
	protected abstract function newCoreCriteria();
	
	public function buildCoreCriteria(){
		
		$criteria = $this->newCoreCriteria();
				
		$criteria->setOrders( $this->getOrders() );
		
		//paginación.
		$criteria->setMaxResult( $this->getRowPerPage() );
		
		$offset = (($this->getPage()-1) * $this->getRowPerPage() ) ;
		$criteria->setOffset( $offset );
		
					
		$this->initPredefinido();
		
		return $criteria;
	}

	public function initPredefinido(){
		
					
		if( !empty($this->filtroPredefinido) ){
			
			//$this->initPredefinido( $this->filtroPredefinido );
			ReflectionUtils::invoke( $this, $this->filtroPredefinido );
		}
	}
	

	public function getFiltroPredefinido()
	{
	    return $this->filtroPredefinido;
	}

	public function setFiltroPredefinido($filtroPredefinido)
	{
	    $this->filtroPredefinido = $filtroPredefinido;
	}
}