<?php
namespace Juventud\UI\service;

use Juventud\UI\components\filter\model\UISocioCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Juventud\Core\model\Socio;

use Juventud\Core\service\ServiceFactory;
use Cose\Security\model\User;

use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

use Cose\persistence\PersistenceContext;



/**
 * 
 * UI service para Socio.
 * 
 * @author Marcos
 * @since 21/02/2017
 */
class UISocioService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UISocioService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UISocioCriteria $uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			//$criteria->addOrder("fechaHora", "ASC");
			
			$service = ServiceFactory::getSocioService();
			
			$socios = $service->getList( $criteria );
	
			return $socios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	public function get( $oid ){

		try{
			
			$service = ServiceFactory::getSocioService();
		
			return $service->get( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	
	
	public function add( Socio $socio ){
		$persistenceContext =  PersistenceContext::getInstance();
		try {
			//generamos una transacción.
			$persistenceContext->beginTransaction();
			
			$service = ServiceFactory::getSocioService();
			
			$oSocio = $service->add( $socio );
			
			
			
			$persistenceContext->commit();
			
			
		} catch (\Exception $e) {
			$persistenceContext->rollback();
			
			throw new RastyException($e->getMessage());
			
		}
	}
			
					
	

	public function update( Socio $socio ){

		try {
			
			$service = ServiceFactory::getSocioService();
			
			return $service->update( $socio );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getSocioService();
			$socios = $service->getCount( $criteria );
			
			return $socios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
		
	public function delete( $oid ){

		try{
			
			$service = ServiceFactory::getSocioService();
		
			//TODO podríamos hacer algunas validaciones (p.ej que no sean un cliente).
			
			
				
			return $service->delete( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	
}
?>