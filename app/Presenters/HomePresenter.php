<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class HomePresenter extends Nette\Application\UI\Presenter {

	protected function createComponentSearchForm(): Form {

		// Formulář pro vyhledání subjektu

		$form = new Form;
		$form->addText("id", "Identifikátor ekonomického subjektu (IČO):")
			->setRequired("Zadej prosím IČO subjektu!")
			->setHtmlAttribute("placeholder","Identifikační číslo (IČO)")
			->addRule($form::LENGTH, "IČO je vždy osmimístné číslo", 8)
			->addRule($form::INTEGER, "IČO obsahuje pouze čisla");
		$form->addSubmit("submit", "Vyhledat");
		$form->onSuccess[] = [$this, "formSucceeded"];
		return $form;
	}

	public function formSucceeded(): void {
		$this->redirect("Result:", $_POST["id"]);
	}
}
