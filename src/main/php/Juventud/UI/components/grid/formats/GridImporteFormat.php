<?php
namespace Juventud\UI\components\grid\formats;

use Juventud\UI\utils\JuventudUIUtils;
use Rasty\Grid\entitygrid\model\GridValueFormat;

use Rasty\i18n\Locale;

/**
 * Formato para imprte
 *
 * @author Bernardo
 * @since 05-11-2014
 *
 */

class GridImporteFormat extends  GridValueFormat{

	public function __construct(){
	
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null )
			return  JuventudUIUtils::formatMontoToView($value);
		else $value;	
	}		
	

}