<?php
namespace Juventud\UI\pages\cuotaSocios\eliminar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\CuotaSocio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**
 * Page para eliminar un cuotaSocio
 * 
 * @author Marcos
 * @since 24-02-2017
 *
 * @Rasty\security\annotations\Secured( permission='Eliminar Cuota' )
 */
class CuotaSocioEliminar extends JuventudPage{

	/**
	 * cuotaSocio a eliminar.
	 * @var CuotaSocio
	 */
	private $cuotaSocio;

	private $error;
	
	public function __construct(){
		
		//inicializamos el cuotaSocio.
		$cuotaSocio = new CuotaSocio();
		$this->setCuotaSocio($cuotaSocio);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del cuotaSocio 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setCuotaSocioOid($oid){
		
		//a partir del id buscamos el cuotaSocio a modificar.
		$cuotaSocio = UIServiceFactory::getUICuotaSocioService()->get($oid);
		
		$this->setCuotaSocio($cuotaSocio);
		
	}
	
	public function getTitle(){
		return $this->localize( "cuotaSocio.eliminar.title" );
	}

	public function getType(){
		
		return "CuotaSocioEliminar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign("legend", $this->localize( "cuotaSocio.eliminar.legend" ) );
		
		$xtpl->assign("cancel", $this->getLinkCuotaSocios() );
		$xtpl->assign("lbl_cancel", $this->localize( "form.cancelar" ) );
		
		$xtpl->assign("action", $this->getLinkActionEliminarCuotaSocio() );
		$xtpl->assign("lbl_submit", $this->localize( "form.aceptar" ) );
		
		
		$xtpl->assign("lbl_year", $this->localize("cuotaSocio.year") );
		$xtpl->assign("lbl_socio", $this->localize("cuotaSocio.socio") );
		$xtpl->assign("lbl_nro", $this->localize("cuotaSocio.nro") );
		

		$xtpl->assign("year", $this->getCuotaSocio()->getMontoCuota()->getYear()->getNombre() );
		$xtpl->assign("socio", $this->getCuotaSocio()->getSocio()->getApellido().', '.$this->getCuotaSocio()->getSocio()->getNombre() );
		$xtpl->assign("nro", $this->getCuotaSocio()->getMontoCuota()->getNro() );
		
		
		$error = $this->getError();
		if(!empty($error)){
			$xtpl->assign("msg", $error );	
			$xtpl->parse("main.msg_error" );
		}
		
	}

	public function getCuotaSocio(){
		
	    return $this->cuotaSocio;
	}

	public function setCuotaSocio($cuotaSocio)
	{
	    $this->cuotaSocio = $cuotaSocio;
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