<?php
App::uses('AppController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property 'Security'Component $'Security'
 */
class AreasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
	    $this->set('authUser', $this->Auth->user());
	    if ($this->Auth->user('role') == 'administrador'){		
		$this->Area->recursive = 0;
		$this->set('areas', $this->paginate());
	     } else {
		$this->Session->setFlash(__("You don't have access to this action."));
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

	/**
		if (!$id) {
			$this->Session->setFlash(__('Invalid area', true));
			$this->redirect(array('action' => 'index'));
		}
	*/
	    $this->set('authUser', $this->Auth->user());
	    if ($this->Auth->user('role') == 'administrador'){		
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		$this->set('area', $this->Area->read(null, $id));
	    } else {
		$this->Session->setFlash(__("You don't have access to this action."));
	    }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	    $this->set('authUser', $this->Auth->user());
	    if ($this->Auth->user('role') == 'administrador'){
		//ojo ver si empty funciona		
		if ($this->request->is('post')) {
			$this->Area->create();
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash(__('The area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The area could not be saved. Please, try again.'));
			}
		}
	    } else {
		$this->Session->setFlash(__("You don't have access to this action."));
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

	    if ($this->Auth->user('role') == 'administrador'){		
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash(__('The area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The area could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Area->read(null, $id);
		}
	    } else {
		$this->Session->setFlash(__("You don't have access to this action."));
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
	    if ($this->Auth->user('role') == 'administrador'){		
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->Area->delete()) {
			$this->Session->setFlash(__('Area deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Area was not deleted'));
		$this->redirect(array('action' => 'index'));
	    } else {
		$this->Session->setFlash(__("You don't have access to this action."));
	    }
	}
}
