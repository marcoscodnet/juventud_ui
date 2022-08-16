<?php
namespace Juventud\UI\service;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Juventud\Core\model\TipoSocio;

use Juventud\Core\service\ServiceFactory;
use Cose\Security\model\User;

use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

/**
 * 
 * UI service para TipoSocio.
 * 
 * @author Marcos
 * @since 19/02/2017
 */
class UITipoSocioService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UITipoSocioService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UITipoSocioCriteria $uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			//$criteria->addOrder("fechaHora", "ASC");
			
			$service = ServiceFactory::getTipoSocioService();
			
			$tipoSocios = $service->getList( $criteria );
	
			return $tipoSocios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	public function get( $oid ){

		try{
			
			$service = ServiceFactory::getTipoSocioService();
		
			return $service->get( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	

	public function add( TipoSocio $tipoSocio ){

		try {
			
			$service = ServiceFactory::getTipoSocioService();
			
			return $service->add( $tipoSocio );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
			
					
	

	public function update( TipoSocio $tipoSocio ){

		try {
			
			$service = ServiceFactory::getTipoSocioService();
			
			return $service->update( $tipoSocio );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getTipoSocioService();
			$tipoSocios = $service->getCount( $criteria );
			
			return $tipoSocios;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
		
	public function delete( $oid ){

		try{
			
			$service = ServiceFactory::getTipoSocioService();
		
			//TODO podríamos hacer algunas validaciones (p.ej que no sean un cliente).
			
			
				
			return $service->delete( $oid );
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	
	
}
?>