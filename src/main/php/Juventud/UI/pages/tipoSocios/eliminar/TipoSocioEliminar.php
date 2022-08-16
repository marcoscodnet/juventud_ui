<?php
namespace Juventud\UI\pages\tipoSocios\eliminar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\TipoSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**
 * Page para eliminar un tipoSocio
 * 
 * @author Marcos
 * @since 19-02-2017
 *
 *@Rasty\security\annotations\Secured( permission='Modificar Tipo de Socio' )
 */
class TipoSocioEliminar extends JuventudPage{

	/**
	 * tipoSocio a eliminar.
	 * @var TipoSocio
	 */
	private $tipoSocio;

	private $error;
	
	public function __construct(){
		
		//inicializamos el tipoSocio.
		$tipoSocio = new TipoSocio();
		$this->setTipoSocio($tipoSocio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del tipoSocio 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setTipoSocioOid($oid){
		
		//a partir del id buscamos el tipoSocio a modificar.
		$tipoSocio = UIServiceFactory::getUITipoSocioService()->get($oid);
		
		$this->setTipoSocio($tipoSocio);
		
	}
	
	public function getTitle(){
		return $this->localize( "tipoSocio.eliminar.title" );
	}

	public function getType(){
		
		return "TipoSocioEliminar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign("legend", $this->localize( "tipoSocio.eliminar.legend" ) );
		
		$xtpl->assign("cancel", $this->getLinkTipoSocios() );
		$xtpl->assign("lbl_cancel", $this->localize( "form.cancelar" ) );
		
		$xtpl->assign("action", $this->getLinkActionEliminarTipoSocio() );
		$xtpl->assign("lbl_submit", $this->localize( "form.aceptar" ) );
		
		
		$xtpl->assign("lbl_tipo", $this->localize("tipoSocio.tipo") );
		

		$xtpl->assign("tipo", $this->getTipoSocio()->getTipo() );
		
		
		$error = $this->getError();
		if(!empty($error)){
			$xtpl->assign("msg", $error );	
			$xtpl->parse("main.msg_error" );
		}
		
	}

	public function getTipoSocio(){
		
	    return $this->tipoSocio;
	}

	public function setTipoSocio($tipoSocio)
	{
	    $this->tipoSocio = $tipoSocio;
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