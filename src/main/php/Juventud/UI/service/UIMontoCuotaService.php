<?php
namespace Juventud\UI\service;

use Juventud\UI\components\filter\model\UIMontoCuotaCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Juventud\Core\model\MontoCuota;

use Juventud\Core\service\ServiceFactory;
use Cose\Security\model\User;

use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

use Cose\persistence\PersistenceContext;

/**
 * 
 * UI service para MontoCuota.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class UIMontoCuotaService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UIMontoCuotaService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UIMontoCuotaCriteria $uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			//$criteria->addOrder("fechaHora", "ASC");
			
			$service = ServiceFactory::getMontoCuotaService();
			
			$montoCuotas = $service->getList( $criteria );
	
			return $montoCuotas;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	public function get( $oid ){

		try{
			
			$service = ServiceFactory::getMontoCuotaService();
		
			return $service->get( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	public function add( MontoCuota $montoCuota ){

		try {
			
			$service = ServiceFactory::getMontoCuotaService();
			
			return $service->add( $montoCuota );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
			

	public function update( MontoCuota $montoCuota ){
		$persistenceContext =  PersistenceContext::getInstance();
		try {
			//generamos una transacción.
			$persistenceContext->beginTransaction();
			
			$service = ServiceFactory::getMontoCuotaService();
			
			$oMontoCuota = $service->update( $montoCuota );
			
			
			
			$persistenceContext->commit();
		} catch (\Exception $e) {
			$persistenceContext->rollback();
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getMontoCuotaService();
			$montoCuotas = $service->getCount( $criteria );
			
			return $montoCuotas;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
		
	public function delete( $oid ){

		try{
			
			$service = ServiceFactory::getMontoCuotaService();
		
			//TODO podríamos hacer algunas validaciones (p.ej que no sean un cliente).
			
			
				
			return $service->delete( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	
}
?>