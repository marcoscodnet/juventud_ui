<?php
namespace Juventud\UI\service;

use Juventud\UI\components\filter\model\UICuotaSocioCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Juventud\Core\model\CuotaSocio;

use Juventud\Core\service\ServiceFactory;
use Cose\Security\model\User;

use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

use Cose\persistence\PersistenceContext;

/**
 * 
 * UI service para CuotaSocio.
 * 
 * @author Marcos
 * @since 01/03/2017
 */
class UICuotaSocioService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UICuotaSocioService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UICuotaSocioCriteria $uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			//$criteria->addOrder("fechaHora", "ASC");
			
			$service = ServiceFactory::getCuotaSocioService();
			
			$cuotaSocios = $service->getList( $criteria );
	
			return $cuotaSocios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	public function get( $oid ){

		try{
			
			$service = ServiceFactory::getCuotaSocioService();
		
			return $service->get( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	public function add( CuotaSocio $cuotaSocio ){

		try {
			
			$service = ServiceFactory::getCuotaSocioService();
			
			return $service->add( $cuotaSocio );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
			

	public function update( CuotaSocio $cuotaSocio ){
		$persistenceContext =  PersistenceContext::getInstance();
		try {
			//generamos una transacción.
			$persistenceContext->beginTransaction();
			
			$service = ServiceFactory::getCuotaSocioService();
			
			$oCuotaSocio = $service->update( $cuotaSocio );
			
			
			
			$persistenceContext->commit();
		} catch (\Exception $e) {
			$persistenceContext->rollback();
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getCuotaSocioService();
			$cuotaSocios = $service->getCount( $criteria );
			
			return $cuotaSocios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
		
	public function delete( $oid ){

		try{
			
			$service = ServiceFactory::getCuotaSocioService();
		
			//TODO podríamos hacer algunas validaciones (p.ej que no sean un cliente).
			
			
				
			return $service->delete( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	
}
?>