<?php
namespace Juventud\UI\pages;

use Rasty\components\RastyPage;
use Rasty\actions\Forward;
use Rasty\utils\LinkBuilder;


/**
 * página genérica para la app de Juventud
 * 
 * @author Marcos
 * @since 16/02/2017
 */
abstract class JuventudPage extends RastyPage{


	public function errorNoEsperado( $mensaje ){
		
		$forward = new Forward();
		$forward->setPageName( "ErrorNoEsperado" );
		$forward->addError( $mensaje );
		$forward->addParam("layout", $this->getLayoutType() );
				
		header ( 'Location: '.  $forward->buildForwardUrl() );
	}
	
	public function getTitle(){
		return $this->localize( "Juventud_app.title" );
	}

	public function getMenuGroups(){

		return array();
	}


	public function getLinkLogin(){
		
		return LinkBuilder::getPageUrl( "Login") ;
		
	}

	
	public function getLinkYears(){
		
		return LinkBuilder::getPageUrl( "Years") ;
		
	}

	public function getLinkYearAgregar(){
		
		return LinkBuilder::getPageUrl( "YearAgregar") ;
		
	}
	
	public function getLinkActionAgregarYear(){
		
		return LinkBuilder::getActionUrl( "AgregarYear") ;
		
	}

	public function getLinkActionModificarYear(){
		
		return LinkBuilder::getActionUrl( "ModificarYear") ;
		
	}
	
	public function getLinkActionEliminarYear(){
		
		return LinkBuilder::getActionUrl( "EliminarYear") ;
		
	}
	
	public function getLinkMontoCuotas(){
		
		return LinkBuilder::getPageUrl( "MontoCuotas") ;
		
	}
	
	public function getLinkActionModificarMontoCuota(){
		
		return LinkBuilder::getActionUrl( "ModificarMontoCuota") ;
		
	}
	
	public function getLinkActionEliminarMontoCuota(){
		
		return LinkBuilder::getActionUrl( "EliminarMontoCuota") ;
		
	}
	
	public function getLinkTipoSocios(){
		
		return LinkBuilder::getPageUrl( "TipoSocios") ;
		
	}

	public function getLinkTipoSocioAgregar(){
		
		return LinkBuilder::getPageUrl( "TipoSocioAgregar") ;
		
	}
	
	public function getLinkActionAgregarTipoSocio(){
		
		return LinkBuilder::getActionUrl( "AgregarTipoSocio") ;
		
	}

	public function getLinkActionModificarTipoSocio(){
		
		return LinkBuilder::getActionUrl( "ModificarTipoSocio") ;
		
	}
	
	public function getLinkActionEliminarTipoSocio(){
		
		return LinkBuilder::getActionUrl( "EliminarTipoSocio") ;
		
	}
	
	public function getLinkSocios(){
		
		return LinkBuilder::getPageUrl( "Socios") ;
		
	}

	public function getLinkSocioAgregar(){
		
		return LinkBuilder::getPageUrl( "SocioAgregar") ;
		
	}
	
	public function getLinkActionAgregarSocio(){
		
		return LinkBuilder::getActionUrl( "AgregarSocio") ;
		
	}

	public function getLinkActionModificarSocio(){
		
		return LinkBuilder::getActionUrl( "ModificarSocio") ;
		
	}
	
	public function getLinkActionEliminarSocio(){
		
		return LinkBuilder::getActionUrl( "EliminarSocio") ;
		
	}
	
	public function getLinkCuotaSocios(){
		
		return LinkBuilder::getPageUrl( "CuotaSocios") ;
		
	}

	public function getLinkCuotaSocioAgregar(){
		
		return LinkBuilder::getPageUrl( "CuotaSocioAgregar") ;
		
	}
	
	public function getLinkActionAgregarCuotaSocio(){
		
		return LinkBuilder::getActionUrl( "AgregarCuotaSocio") ;
		
	}

	public function getLinkActionModificarCuotaSocio(){
		
		return LinkBuilder::getActionUrl( "ModificarCuotaSocio") ;
		
	}
	
	public function getLinkActionEliminarCuotaSocio(){
		
		return LinkBuilder::getActionUrl( "EliminarCuotaSocio") ;
		
	}

    public function getLinkSociosXls(){

        return LinkBuilder::getPageUrl( "SociosXLS") ;

    }


}
?>