<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Cake\View\View;
use BootstrapUI\View\UIView;

use BootstrapUI\View\UIViewTrait;



/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
//class AppView extends UIViewTrait{
//
//utiliser autre vue
//class AppView extends UIView{
//
//vue courrante...
class AppView extends View {
    //non actif//use UIViewTrait;

    /**
     * Initialization hook method.
     */
    public function initialize() {
        parent::initialize();
        //render the initializeUI method from the UIViewTrait
        // $this->initializeUI();
    }

}
