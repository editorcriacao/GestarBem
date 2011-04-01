<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
        Router::connect('/central-do-assinante', array('controller' => 'pages', 'action' => 'display', 'central-do-assinante'));
        Router::connect('/revista-digital', array('controller' => 'pages', 'action' => 'display', 'revista-digital'));
        Router::connect('/perguntas', array('controller' => 'pages', 'action' => 'display', 'perguntas'));
        Router::connect('/conte-sua-historia', array('controller' => 'pages', 'action' => 'display', 'conte-sua-historia'));
        Router::connect('/fale-conosco', array('controller' => 'pages', 'action' => 'display', 'fale-conosco'));
        Router::connect('/cadastro', array('controller' => 'pages', 'action' => 'display', 'cadastro'));
        Router::connect('/gestarbem', array('controller' => 'pages', 'action' => 'display', '/gestarbem'));
        Router::connect('/esqueci-senha', array('controller' => 'pages', 'action' => 'display', 'recuperar-senha'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

