<?php
	namespace App\Controller\Pages;

	use \App\Utils\View;
	use \App\Model\Entity\Organization;

	class Home extends Page {

		/**
		 * Método responsável por retornar o conteúdo (View) da nossa home page
		 * @return string
		 */
		public static function getHome(){
			$obOrganization = new Organization;

			// View da Home
			$content = View::render('pages/home', [
				'name' => $obOrganization->name,
				'description' => $obOrganization->description,
				'site' => $obOrganization->site,
			]);
			// Retorna a view da página
			return parent::getPage('Home', $content);
		}

	}
