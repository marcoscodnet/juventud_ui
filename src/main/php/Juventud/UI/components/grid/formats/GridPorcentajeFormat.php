<?php
namespace Juventud\UI\components\grid\formats;

use Juventud\UI\utils\JuventudUIUtils;

use Rasty\i18n\Locale;
use Rasty\Grid\entitygrid\model\GridValueFormat;

/**
 * Formato para porcentaje
 *
 * @author Bernardo
 * @since 05-11-2014
 *
 */

class GridPorcentajeFormat extends  GridValueFormat{

	public function __construct(){
	
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null )
			return  JuventudUIUtils::formatPorcentajeToView($value);
		else $value;	
	}		
	

}