<?php
namespace Juventud\UI\actions\login;

use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Juventud\Core\utils\JuventudUtils;


use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;



/**
 * se realiza el login contra el core.
 * 
 * @author Bernardo
 * @since 06/11/2014
 */
class Login extends Action{

	
	public function execute(){

		$forward = new Forward();			
		try {

			$username = RastyUtils::getParamPOST("username");
			$password = RastyUtils::getParamPOST("password");
			
			if(empty($username))
				throw new RastyException("username.required");
			
			if(empty($password))
				throw new RastyException("password.required");
							
			RastySecurityContext::login( RastyUtils::getParamPOST("username"), RastyUtils::getParamPOST("password") );
			$user = RastySecurityContext::getUser();
			$user = JuventudUtils::getUserByUsername($user->getUsername());
			
			
			if( JuventudUtils::isAdmin($user)){
				
				JuventudUIUtils::loginAdmin($user);
				
			}
			
			//TODO oficial de cuentas
			
			if(  JuventudUIUtils::isAdminLogged()  )
				$forward->setPageName( $this->getForwardAdmin() );
			else  	
				$forward->setPageName( $this->getErrorForward() );
			
			
				
		} catch (RastyException $e) {
		
			$forward->setPageName( $this->getErrorForward() );
			$forward->addError( $e->getMessage() );
			
		}
		
		return $forward;
		
	}
	

	protected function getErrorForward(){
		return "Login";
	}
	
	protected function getForwardAdmin(){
		return "Socios";
	}
	
	public function isSecure(){
		return false;
	}
}
?>