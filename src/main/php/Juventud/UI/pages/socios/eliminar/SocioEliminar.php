<?php
namespace Juventud\UI\pages\socios\eliminar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Socio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**
 * Page para eliminar un socio
 * 
 * @author Marcos
 * @since 21-02-2017
 *
 * @Rasty\security\annotations\Secured( permission='Eliminar Socio' )
 */
class SocioEliminar extends JuventudPage{

	/**
	 * socio a eliminar.
	 * @var Socio
	 */
	private $socio;

	private $error;
	
	public function __construct(){
		
		//inicializamos el socio.
		$socio = new Socio();
		$this->setSocio($socio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del socio 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setSocioOid($oid){
		
		//a partir del id buscamos el socio a modificar.
		$socio = UIServiceFactory::getUISocioService()->get($oid);
		
		$this->setSocio($socio);
		
	}
	
	public function getTitle(){
		return $this->localize( "socio.eliminar.title" );
	}

	public function getType(){
		
		return "SocioEliminar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign("legend", $this->localize( "socio.eliminar.legend" ) );
		
		$xtpl->assign("cancel", $this->getLinkSocios() );
		$xtpl->assign("lbl_cancel", $this->localize( "form.cancelar" ) );
		
		$xtpl->assign("action", $this->getLinkActionEliminarSocio() );
		$xtpl->assign("lbl_submit", $this->localize( "form.aceptar" ) );
		
		
		$xtpl->assign("lbl_nombre", $this->localize("socio.nombre") );
		$xtpl->assign("lbl_apellido", $this->localize("socio.apellido") );
		$xtpl->assign("lbl_dni", $this->localize("socio.dni") );
		

		$xtpl->assign("nombre", $this->getSocio()->getNombre() );
		$xtpl->assign("apellido", $this->getSocio()->getApellido() );
		$xtpl->assign("dni", $this->getSocio()->getDni() );
		
		
		$error = $this->getError();
		if(!empty($error)){
			$xtpl->assign("msg", $error );	
			$xtpl->parse("main.msg_error" );
		}
		
	}

	public function getSocio(){
		
	    return $this->socio;
	}

	public function setSocio($socio)
	{
	    $this->socio = $socio;
	}
	

	public function getError()
	{
	    return $this->error;
	}

	public function setError($error)
	{
	    $this->error = $error;
	}
}
?>