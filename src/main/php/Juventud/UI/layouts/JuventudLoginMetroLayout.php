<?php

namespace Juventud\UI\layouts;

use Rasty\Layout\layout\Rasty\Layout;

use Rasty\utils\XTemplate;


class JuventudLoginMetroLayout extends JuventudMetroLayout{

	public function getXTemplate($file_template=null){
		return parent::getXTemplate( dirname(__DIR__) . "/layouts/JuventudLoginMetroLayout.htm" );
	}

	public function getType(){
		
		return "JuventudLoginMetroLayout";
		
	}	

}
?>