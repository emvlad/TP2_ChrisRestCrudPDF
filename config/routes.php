<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::extensions(['json', 'xml']);

Router::prefix('api', function ($routes) {
    $routes->extensions(['json', 'xml']);
    $routes->resources('Genres');
    $routes->resources('Entrefilets');
    Router::connect('/api/users/register', ['controller' => 'Users', 'action' => 'add', 'prefix' => 'api']);
    Router::connect('/api/entrefilets/register', ['controller' => 'Entrefilets', 'action' => 'add', 'prefix' => 'api']);
    $routes->fallbacks('InflectedRoute');
});
Router::prefix('Admin', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});


Router::defaultRouteClass(DashedRoute::class);

//2- New route we're adding for our tagged action.
// The trailing `*` tells CakePHP that this action has
// passed parameters.
Router::scope(
        '/entrefilets', ['controller' => 'Entrefilets'], function ($routes) {
    $routes->connect('/tagged/*', ['action' => 'tags']);
}
);
Router::scope('/', function (RouteBuilder $routes) {
    
    //=================== Open directly to Welcome - Entrefilet ====================
    //1-access direct to index entrefilet
      // $routes->connect('/', ['controller' => 'Entrefilets', 'action' => 'index']);
     //...and connect the rest of 'Pages' controller's URLs.
       $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
     //connect email transport
       $routes->connect('/email',['controller'=>'Users','action'=>'maildex']);
       
       $routes->connect('/', ['controller' => 'Genres', 'action' => 'index']);
      $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();