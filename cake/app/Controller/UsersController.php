<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    //beforeFilter: permite realizar las acciones acciones del controladores sin haberse registrado.
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    //isAuthorized: indica sí el usuario esta autorizado o no para (a nivel controlador) realizar ciertas acciones.
    public function isAuthorized($user) {
        if ($this->action === 'edit') {
	//params: toma en el request el primer parámetro después de la acción en el URL.
               $userId = $this->request->params['pass'][0]; 
		//isUSerHisOwn: comprueba si el usuario se puede modificar por ser el mismo que esta logueado
            if ($this->User->isUserHisOwn($userId, $user['id'])) {
               return true;
            }
        }
	
        return parent::isAuthorized($user);
    }


/**
 * index method
 *
 * @return void
 */
	public function index() {
	    //se asigna a authUser el usuario actual. Esto funciona para validar en la vista el acceso
 	    $this->set('authUser', $this->Auth->user());
	    if ($this->Auth->user('role') != 'estudiante'){
		$this->User->recursive = 1;
		$this->set('users', $this->paginate());
	    }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	$this->set('authUser', $this->Auth->user());
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
	$this->set('courses', $this->User->CourseUser->find('all', array('conditions' => array('CourseUser.user_id' => $id))));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
	    //se asigna a authUser el usuario actual. Esto funciona para validar en la vista el acceso
	    $this->set('authUser', $this->Auth->user());
    	    if ($this->request->is('post')) {	    
		//Evaluar si el role no es administrador, dejar modificar el usuario pero sin poder modificar su rol.
		if ($this->Auth->user('role') != 'administrador'){
		    $this->request->data['User']['role'] = 'estudiante';		
		}
  		$this->User->create();
		    if ($this->User->save($this->request->data)) {
			$this->Session->setFlash(__('The user has been saved'));
			//función del email http://book.cakephp.org/2.0/en/core-utility-libraries/email.html
			$email = new CakeEmail('email');
			$email->from(array('AtiWebApps@yahoo.com' => 'TEC VIRTUAL'));
			$email->to('arivargas17@gmail.com');
			$email->subject('Welcome to TEC VIRTUAL');
			$email->send('Welcome, ' . $this->request->data['User']['username'] .' You are now part of TEC VIRTUAL. Please login with email and password in this link:  http://localhost/cake/users/login');
			$this->redirect(array('action' => 'index'));
		    } else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
		    }
	    }
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		//se asigna a authUser el usuario actual. Esto funciona para validar en la vista el acceso
		$this->set('authUser', $this->Auth->user());
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	//se asigna a authUser el usuario actual. Esto funciona para validar en la vista el acceso
		$this->set('authUser', $this->Auth->user());
		/**if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}*/
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * login method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function login() {
		if ($this->request->is('post')) {
		    	if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
		    	} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
		    	}
    		}
    	}


    	public function logout() {
		$this->redirect($this->Auth->logout());
    	}

}
