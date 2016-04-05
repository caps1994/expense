<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

// Default Routing
Router::get('', 'App\Controllers\Pages@index');
Router::get('subpage', 'App\Controllers\Welcome@subPage');
Router::any('admin/(:any)(/(:any)(/(:any)(/(:any))))', 'App\Controllers\Demo@test');
Router::group('console', function() {
    Router::any('console', 'App\Controllers\Console@index');
    Router::any('login', 'App\Controllers\Console@login');
    Router::any('logout', 'App\Controllers\Console@logout');
});

Router::any('auth', 'App\Controllers\Auth@index');
Router::any('auth/login', 'App\Controllers\Auth@login');
Router::any('auth/logout', 'App\Controllers\Auth@logout');
/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
