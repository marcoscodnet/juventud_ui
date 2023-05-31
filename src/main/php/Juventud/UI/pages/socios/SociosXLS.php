<?php
namespace Juventud\UI\pages\socios;

use Juventud\UI\pages\JuventudPage;




use Juventud\UI\utils\JuventudUIUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;
use Rasty\utils\LinkBuilder;



use Rasty\security\RastySecurityContext;

class SociosXLS extends JuventudPage{


	
	public function __construct(){

		
		
	}

	public function getTitle(){
		return date('YmdHis').'_'.socios;
	}

	
	
	protected function parseXTemplate(XTemplate $xtpl){
		
		$title = $this->localize("admin_home.title");
		$subtitle = $this->localize("admin_home.subtitle");
		$xtpl->assign("app_title", $title );
		
	}
	
	
	
	
	public function getType(){

		return "SociosXLS";

	}


	
}
?>