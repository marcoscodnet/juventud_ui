<?php
namespace Juventud\UI\pages\socios\agregar;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\pages\JuventudPage;

use Juventud\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Juventud\Core\model\Socio;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

use Juventud\Core\conf\JuventudConfig;

/**

 * 
 * @Rasty\security\annotations\Secured( permission='Agregar Socio' )
 */
class SocioAgregar extends JuventudPage{

	/**
	 * socio a agregar.
	 * @var Socio
	 */
	private $socio;

	
	public function __construct(){
		
		//inicializamos el socio.
		$socio = new Socio();
		
		$socio->setPagaDesde( new \Datetime() );
		
		$tipoSocio = UIServiceFactory::getUITipoSocioService()->get(JuventudConfig::CD_TIPO_SOCIO_ACTIVO);
		$socio->setTipoSocio($tipoSocio);

        $ultimoSocio = UIServiceFactory::getUISocioService()->getUltimo();


        $socio->setNroSocio($ultimoSocio->getNroSocio()+1);
		
		$this->setSocio($socio);
		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("Years");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "socio.agregar.title" );
	}

	public function getType(){
		
		return "SocioAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$socioForm = $this->getComponentById("socioForm");
		$socioForm->fillFromSaved( $this->getSocio() );
		
	}


	public function getSocio()
	{
	    return $this->socio;
	}

	public function setSocio($socio)
	{
	    $this->socio = $socio;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>