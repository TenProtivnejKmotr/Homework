<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;

final class ResultPresenter extends Nette\Application\UI\Presenter {
	public function __construct() {	
	}

	public function renderDefault($id): void {

		// Definování použitých proměných

		$ares_ico = "";
		$ares_dic = "";
		$ares_firma = "";
		$ares_ulice = "";
		$ares_cp1 = "";
		$ares_cp2 = "";
		$ares_mesto = "";
		$ares_psc = "";
		$ares_stav = "";
		
		// Extrahování a načtení souboru z ARES

		$file = @file_get_contents("http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=".$id);
		if($file) {
			$xml = @simplexml_load_string($file);
		}
		if($xml) {
		
			// Dekonstruce XML souboru na druhou úroveň po získání informací

			$ns = $xml->getDocNamespaces();
			$data = $xml->children($ns['are']);
			$el = $data->children($ns['D'])->VBAS;
			
			if (strval($el->ICO) == $id) {

				// Přiřazení do proměnných

				$ares_ico = strval($el->ICO);
				$ares_dic = strval($el->DIC);
				$ares_firma = strval($el->OF);
				$ares_ulice = strval($el->AA->NU);
				$ares_cp1 = strval($el->AA->CD);
				$ares_cp2 = strval($el->AA->CO);
				if ($ares_cp2 != "") {
					$ares_cp = $ares_cp1."/".$ares_cp2;
				} else {
					$ares_cp = $ares_cp1;
				}
				$ares_mesto = strval($el->AA->N);
				$ares_psc = strval($el->AA->PSC);
				$ares_stav = "Subjekt nalezen";
			} else {
				$ares_stav  = "IČO subjektu nebylo nalezeno";
			} 
		} else {
			$ares_stav  = "Databáze ARES není dostupná";
		}

		// Předání proměnných z Presenteru do Šablony

		$this->template->info = ["ico" => $ares_ico, "dic" => $ares_dic, "name" => $ares_firma, "address" => $ares_ulice, "address_number" => $ares_cp, "address_city" => $ares_mesto, "address_city_number" => $ares_psc, "state" => $ares_stav];
	}
}
