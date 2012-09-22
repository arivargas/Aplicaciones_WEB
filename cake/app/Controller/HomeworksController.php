<?php
App::uses('AppController', 'Controller');
/**
 * Homeworks Controller
 *
 * @property Homework $Homework
 */
class HomeworksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('authUser', $this->Auth->user());
		$this->Homework->recursive = 0;
		$this->set('homeworks', $this->paginate());
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
		$this->Homework->id = $id;
		if (!$this->Homework->exists()) {
			throw new NotFoundException(__('Invalid homework'));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('homework', $this->Homework->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('authUser', $this->Auth->user());
		if ($this->request->is('post')) {
			$this->Homework->create();
			if ($this->Homework->save($this->request->data)) {
				$this->Session->setFlash(__('The homework has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homework could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Homework->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Homework->id = $id;
		if (!$this->Homework->exists()) {
			throw new NotFoundException(__('Invalid homework'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Homework->save($this->request->data)) {
				$this->Session->setFlash(__('The homework has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homework could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Homework->read(null, $id);
		}
		$courses = $this->Homework->Course->find('list');
		$this->set(compact('courses'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Homework->id = $id;
		if (!$this->Homework->exists()) {
			throw new NotFoundException(__('Invalid homework'));
		}
		if ($this->Homework->delete()) {
			$this->Session->setFlash(__('Homework deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Homework was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
