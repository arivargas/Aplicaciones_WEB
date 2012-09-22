<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
//Para hacer uso del email
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	//Autenticación
	public $components = array(
		'Session',
	        'Auth' => array(
			'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			//¿hay autorización en los controladores?
			'authorize' => array('Controller') 
	        	)
	    	);

	//Usuario no autenticado: permitir vista del index y el view.
	public function beforeFilter() {
		//$this->Auth->userModel = 'email';
		//$this->Auth->fields = array('username' => 'email', 'password' => 'password');
	       $this->Auth->allow('login', 'view', 'index', 'add');
	}
	

	public function isAuthorized($user) {
	    // Administrador: todos los permisos
		if (isset($user['role']) && $user['role'] === 'administrador') {
        		return true;
    		}

	    // Default deny
		return false;
	}

//	public var $user_now = $this->Auth->user();
}
