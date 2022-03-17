<?php

	require __DIR__.'/../vendor/autoload.php';

	use \App\DotEnv\Environment;
	use \App\Utils\View;
	use \App\DatabaseManager\Database;
	use \App\Http\Middleware\Queue as MiddlewareQueue;

	// Carrega variáveis do ambiente
	Environment::load(__DIR__.'/../');

	// Define as configurações do Banco de Dados
	Database::config(
		getenv('DB_HOST'),
		getenv('DB_NAME'),
		getenv('DB_USER'),
		getenv('DB_PASS'),
		getenv('DB_PORT')
	);

	// Define a constante de URL
	define('URL', getenv('URL'));

	// Defini o valor padrão das variáveis
	View::init([
		'URL' => URL,
	]);

	// Define o mapeamento de middlewares
	MiddlewareQueue::setMap([
		'maintenance' => \App\Http\Middleware\Maintenance::class,
		'required-admin-logout' => \App\Http\Middleware\RequireAdminLogout::class,
		'required-admin-login' => \App\Http\Middleware\RequireAdminLogin::class
	]);

	// Define o mapeamento de middlewares padrões (executado em todas as rotas)
	MiddlewareQueue::setDefault([
		'maintenance',
	]);