<?php
namespace Juventud\UI\pages\montoCuotas\eliminar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\MontoCuota;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**
 * Page para eliminar un montoCuota
 * 
 * @author Marcos
 * @since 22-02-2017
 *
 * @Rasty\security\annotations\Secured( permission='Eliminar Cuota' )
 */
class MontoCuotaEliminar extends JuventudPage{

	/**
	 * montoCuota a eliminar.
	 * @var MontoCuota
	 */
	private $montoCuota;

	private $error;
	
	public function __construct(){
		
		//inicializamos el montoCuota.
		$montoCuota = new MontoCuota();
		$this->setMontoCuota($montoCuota);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del montoCuota 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setMontoCuotaOid($oid){
		
		//a partir del id buscamos el montoCuota a modificar.
		$montoCuota = UIServiceFactory::getUIMontoCuotaService()->get($oid);
		
		$this->setMontoCuota($montoCuota);
		
	}
	
	public function getTitle(){
		return $this->localize( "montoCuota.eliminar.title" );
	}

	public function getType(){
		
		return "MontoCuotaEliminar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign("legend", $this->localize( "montoCuota.eliminar.legend" ) );
		
		$xtpl->assign("cancel", $this->getLinkMontoCuotas() );
		$xtpl->assign("lbl_cancel", $this->localize( "form.cancelar" ) );
		
		$xtpl->assign("action", $this->getLinkActionEliminarMontoCuota() );
		$xtpl->assign("lbl_submit", $this->localize( "form.aceptar" ) );
		
		
		$xtpl->assign("lbl_year", $this->localize("montoCuota.year") );
		$xtpl->assign("lbl_nro", $this->localize("montoCuota.nro") );
		

		$xtpl->assign("year", $this->getMontoCuota()->getYear() );
		$xtpl->assign("nro", $this->getMontoCuota()->getNro() );
		
		
		$error = $this->getError();
		if(!empty($error)){
			$xtpl->assign("msg", $error );	
			$xtpl->parse("main.msg_error" );
		}
		
	}

	public function getMontoCuota(){
		
	    return $this->montoCuota;
	}

	public function setMontoCuota($montoCuota)
	{
	    $this->montoCuota = $montoCuota;
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