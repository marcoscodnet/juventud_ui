<?php

namespace Juventud\UI\service;


/**
 * Factory de servicios de UI
 *  
 * @author Bernardo
 * @since 05/11/2014
 *
 */

class UIServiceFactory {

		
	/**
	 * @return UIPermisoService
	 */
	public static function getUIPermisoService(){
	
		return UIPermisoService::getInstance();	
	}

	/**
	 * @return UIRolService
	 */
	public static function getUIRolService(){
	
		return UIRolService::getInstance();	
	}
	
	/**
	 * @return UIUsuarioService
	 */
	public static function getUIUserService(){
	
		return UIUsuarioService::getInstance();	
	}
	

	/**
	 * @return UIYearService
	 */
	public static function getUIYearService(){
	
		return UIYearService::getInstance();	
	}
	
	/**
	 * @return UIMontoCuotaService
	 */
	public static function getUIMontoCuotaService(){
	
		return UIMontoCuotaService::getInstance();	
	}
	
	/**
	 * @return UITipoCuotaSocioService
	 */
	public static function getUITipoSocioService(){
	
		return UITipoSocioService::getInstance();	
	}
	
	/**
	 * @return UISocioService
	 */
	public static function getUISocioService(){
	
		return UISocioService::getInstance();	
	}
	
	/**
	 * @return UICuotaSocioService
	 */
	public static function getUICuotaSocioService(){
	
		return UICuotaSocioService::getInstance();	
	}
}