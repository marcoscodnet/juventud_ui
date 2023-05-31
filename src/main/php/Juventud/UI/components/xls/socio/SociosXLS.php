<?php

namespace Juventud\UI\components\xls\socio;

use Datetime;
use Juventud\UI\utils\JuventudUIUtils;

use Juventud\UI\service\UIServiceFactory;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;

use Rasty\utils\XTemplate;

use Juventud\UI\components\filter\model\UISocioCriteria;

use Juventud\UI\components\filter\model\UITipoSocioCriteria;


use Rasty\utils\LinkBuilder;
use Rasty\render\DOMPDFRenderer;
use Rasty\conf\RastyConfig;
use Rasty\factory\PageFactory;

use Rasty\utils\Logger;


/**
 * para renderizar en pdf listado de precios.
 *
 * @author Marcos
 * @since 31-05-2023
 *
 */
class SociosXLS extends RastyComponent
{


	public function getType()
	{

		return "SociosXLS";

	}

	public function __construct()
	{


	}

	public function getFileName()
	{
		"precios";

	}


	protected function parseXTemplate(XTemplate $xtpl)
	{

		$page = PageFactory::build("Socios");

		$socioCriteria = new UISocioCriteria();

		$socioFilter = $page->getComponentById("sociosFilter");

		$socioFilter->fillFromSaved($socioCriteria);
		$xtpl->assign("APP_PATH", RastyConfig::getInstance()->getAppPath());
		$xtpl->assign("fecha", JuventudUIUtils::formatDateTimeToView(new Datetime()));


		$xtpl->assign("lbl_detalle_nombre", $this->localize("socio.nombre"));
		$xtpl->assign("lbl_detalle_apellido", $this->localize("socio.apellido"));
		$xtpl->assign("lbl_detalle_dni", $this->localize("socio.dni"));
		$xtpl->assign("lbl_detalle_tipo", $this->localize("socio.tipoSocio"));
		$xtpl->assign("lbl_detalle_mail", $this->localize("socio.email"));
		$xtpl->assign("lbl_detalle_direccion", $this->localize("socio.direccion"));
		$xtpl->assign("lbl_detalle_telefono", $this->localize("socio.telefono"));
		$xtpl->assign("lbl_detalle_abona", $this->localize("socio.pagaDesde"));


		
		$socioCriteria->addOrder('apellido', 'ASC');

		$socios = UIServiceFactory::getUISocioService()->getList($socioCriteria);

		foreach ($socios as $socio) {


			$xtpl->assign("nombre", $socio->getNombre());
			$xtpl->assign("apellido", $socio->getApellido());
			$xtpl->assign("dni", $socio->getDni());
			$xtpl->assign("tipo", $socio->getTipoSocio()->getTipo());
			$xtpl->assign("mail", $socio->getEmail());
			$xtpl->assign("telefono", $socio->getTelefono());
			$xtpl->assign("direccion", $socio->getDireccion());
			$xtpl->assign("abona", JuventudUIUtils::formatDateToView($socio->getPagaDesde()));



				$xtpl->parse("main.detalle");




		}

	}
}



?>
