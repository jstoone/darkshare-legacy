<?php namespace DarkShare\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'DarkShare\Http\Middleware\VerifyCsrfToken',
        'DarkShare\Http\Middleware\ViewVariableShare',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'DarkShare\Http\Middleware\Authenticate',
        'auth.basic' => 'DarkShare\Http\Middleware\AuthenticateBasic',
		'admin.protect' => 'DarkShare\Http\Middleware\AdminProtect',
		'guest' => 'DarkShare\Http\Middleware\RedirectIfAuthenticated',
		'app.space' => 'DarkShare\Http\Middleware\BlockIfOutOfSpace',
	];

}
