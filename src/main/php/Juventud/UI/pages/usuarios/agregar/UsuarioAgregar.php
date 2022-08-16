<?php
namespace Juventud\UI\pages\usuarios\agregar;

use Juventud\UI\pages\JuventudPage;

use Rasty\utils\XTemplate;
use Cose\Security\model\User;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class UsuarioAgregar extends JuventudPage{

	/**
	 * Usuario a agregar.
	 * @var User
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
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "form.volver") );
		$menuOption->setPageName("Usuarios");
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "usuario.agregar.title" );
	}

	public function getType(){
		
		return "UsuarioAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$usuarioForm = $this->getComponentById("usuarioForm");
		$usuarioForm->fillFromSaved( $this->getUsuario() );
		
	}


	public function getUsuario()
	{
	    return $this->usuario;
	}

	public function setUsuario($usuario)
	{
	    $this->usuario = $usuario;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>