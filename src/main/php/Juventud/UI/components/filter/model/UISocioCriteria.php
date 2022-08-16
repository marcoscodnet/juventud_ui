<?php
namespace Juventud\UI\components\filter\model;


use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\components\filter\model\UIJuventudCriteria;

use Rasty\utils\RastyUtils;
use Juventud\Core\criteria\SocioCriteria;

/**
 * Representa un criterio de búsqueda
 * para socios.
 * 
 * @author Marcos
 * @since 21/02/2017
 *
 */
class UISocioCriteria extends UIJuventudCriteria{

	/* constantes para los filtros predefinidos */
	
	
	private $nombre;
	
	private $apellido;
	
	private $dni;
	
	private $email;
	
    private $tipoSocio;
	
	
		
	public function __construct(){

		parent::__construct();
		
		

	}
		
	protected function newCoreCriteria(){
		return new SocioCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setNombre( $this->getNombre() );
		$criteria->setApellido( $this->getApellido() );
		$criteria->setDni( $this->getDni() );
		$criteria->setEmail( $this->getEmail() );
		$criteria->setTipoSocio( $this->getTipoSocio() );
		
		
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

	public function getApellido()
	{
	    return $this->apellido;
	}

	public function setApellido($apellido)
	{
	    $this->apellido = $apellido;
	}

	public function getDni()
	{
	    return $this->dni;
	}

	public function setDni($dni)
	{
	    $this->dni = $dni;
	}

	public function getEmail()
	{
	    return $this->email;
	}

	public function setEmail($email)
	{
	    $this->email = $email;
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