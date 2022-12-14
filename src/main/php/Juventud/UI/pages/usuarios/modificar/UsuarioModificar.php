<?php
namespace Juventud\UI\pages\usuarios\modificar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Cose\Security\model\User;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class UsuarioModificar extends JuventudPage{

	/**
	 * usuario a modificar.
	 * @var Usuario
	 */
	private $usuario;

	
	public function __construct(){
		
		//inicializamos el usuario.
		$usuario = new User();
		$this->setUsuario($usuario);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setUsuarioOid($oid){
		
		//a partir del id buscamos el usuario a modificar.
		$usuario = UIServiceFactory::getUIUsuarioService()->get($oid);
		
		$this->setUsuario($usuario);
		
	}
	
	public function getTitle(){
		return $this->localize( "usuario.modificar.title" );
	}

	public function getType(){
		
		return "UsuarioModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$usuarioForm = $this->getComponentById("usuarioForm");
		$usuarioForm->fillFromSaved( $this->getUsuario() );
	}

	public function getUsuario(){
		
	    return $this->usuario;
	}

	public function setUsuario($usuario)
	{
	    $this->usuario = $usuario;
	}
}
?>