<?php
namespace Juventud\UI\service;

use Juventud\UI\components\filter\model\UIYearCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Juventud\Core\model\Year;
use Juventud\Core\model\MontoCuota;

use Juventud\Core\service\ServiceFactory;
use Cose\Security\model\User;

use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

use Cose\persistence\PersistenceContext;

/**
 * 
 * UI service para Year.
 * 
 * @author Marcos
 * @since 16/02/2017
 */
class UIYearService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UIYearService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UIYearCriteria $uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			//$criteria->addOrder("fechaHora", "ASC");
			
			$service = ServiceFactory::getYearService();
			
			$years = $service->getList( $criteria );
	
			return $years;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	public function get( $oid ){

		try{
			
			$service = ServiceFactory::getYearService();
		
			return $service->get( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	public function add( Year $year ){
		$persistenceContext =  PersistenceContext::getInstance();
		try {
			//generamos una transacción.
			$persistenceContext->beginTransaction();
			
			$service = ServiceFactory::getYearService();
			
			$oYear = $service->add( $year );
			
			
			
			$persistenceContext->commit();
		} catch (\Exception $e) {
			$persistenceContext->rollback();
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
			
					
	

	public function update( Year $year ){

		try {
			
			$service = ServiceFactory::getYearService();
			
			return $service->update( $year );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getYearService();
			$years = $service->getCount( $criteria );
			
			return $years;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
		
	public function delete( $oid ){

		try{
			
			$service = ServiceFactory::getYearService();
		
			//TODO podríamos hacer algunas validaciones (p.ej que no sean un cliente).
			
			
				
			return $service->delete( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	
}
?>