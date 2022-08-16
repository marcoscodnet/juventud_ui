<?php
namespace Juventud\UI\pages\years\eliminar;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Year;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

/**
 * Page para eliminar un year
 * 
 * @author Marcos
 * @since 18-02-2017
 *
 * @Rasty\security\annotations\Secured( permission='Eliminar Anio' )
 */
class YearEliminar extends JuventudPage{

	/**
	 * year a eliminar.
	 * @var Year
	 */
	private $year;

	private $error;
	
	public function __construct(){
		
		//inicializamos el year.
		$year = new Year();
		$this->setYear($year);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del year 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setYearOid($oid){
		
		//a partir del id buscamos el year a modificar.
		$year = UIServiceFactory::getUIYearService()->get($oid);
		
		$this->setYear($year);
		
	}
	
	public function getTitle(){
		return $this->localize( "year.eliminar.title" );
	}

	public function getType(){
		
		return "YearEliminar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		$xtpl->assign("legend", $this->localize( "year.eliminar.legend" ) );
		
		$xtpl->assign("cancel", $this->getLinkYears() );
		$xtpl->assign("lbl_cancel", $this->localize( "form.cancelar" ) );
		
		$xtpl->assign("action", $this->getLinkActionEliminarYear() );
		$xtpl->assign("lbl_submit", $this->localize( "form.aceptar" ) );
		
		
		$xtpl->assign("lbl_nombre", $this->localize("year.nombre") );
		

		$xtpl->assign("nombre", $this->getYear()->getNombre() );
		
		
		$error = $this->getError();
		if(!empty($error)){
			$xtpl->assign("msg", $error );	
			$xtpl->parse("main.msg_error" );
		}
		
	}

	public function getYear(){
		
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
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