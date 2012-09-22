<?php
App::uses('AppController', 'Controller');
/**
 * Documents Controller
 *
 * @property Document $Document
 */
class DocumentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('authUser', $this->Auth->user());
		$this->Document->recursive = 0;
		$this->set('documents', $this->paginate());
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
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('document', $this->Document->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('authUser', $this->Auth->user());
		if ($this->Auth->user('role') == 'administrador' || $this->Auth->user('role') == 'profesor'){		    
			if ($this->request->is('post')) {
				$this->Document->create();
				//se verifica si los datos tomados del input data, tipo file están bien
				//if (is_uploaded_file($this->request->data['Document']['data']['tmp_name'])) {
					$fileData = fread(fopen($this->request->data['Document']['data']['tmp_name'], "r"),							$this->data['Document']['data']['size']);
					//Info del campo data en la vista
		   			$this->request->data['Document']['title'] = $this->request->data['Document']['data']['name'];
				    	$this->request->data['Document']['data'] = $fileData;			    
					if ($this->Document->save($this->request->data)) {
						$this->Session->setFlash(__('The document has been saved'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
					}
				/**} else {
					$this->Session->setFlash(__('The document could not be saved. Please, browse a document.'));
				}*/
			}
		} else {
			//$this->Session->setFlash(__("You don't have access to this action."));
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		$courses = $this->Document->Course->find('list');
		$this->set(compact('courses'));
	}

	//http://cakebaker.wordpress.com/2006/04/15/file-upload-with-cakephp/

	public function download($id) {
    		Configure::write('debug', 0);
		$file = $this->Document->findById($id);
		//header('Content-Disposition: attachment; filename= $file['Document']['title']'); 
		//header('Content-Disposition: attachment; filename='.$file['Document']['title'].'');
		header('Content-Disposition: attachment; filename='.$file['Document']['title']);

    		echo $file['Document']['data'];
	
    		exit();
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if ($this->Auth->user('role') == 'administrador' || $this->Auth->user('role') == 'profesor'){		    
			$this->Document->id = $id;
			if (!$this->Document->exists()) {
				throw new NotFoundException(__('Invalid document'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Document->save($this->request->data)) {
					$this->Session->setFlash(__('The document has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
				}
			} else {
				$this->request->data = $this->Document->read(null, $id);
			}
		} else {
			$this->Session->setFlash(__("You don't have access to this action."));
		}
		$courses = $this->Document->Course->find('list');
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
		if ($this->Auth->user('role') == 'administrador' or $this->Auth->user('role') == 'profesor'){		    
			if (!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->Document->id = $id;
			if (!$this->Document->exists()) {
				throw new NotFoundException(__('Invalid document'));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Document->delete()) {
				$this->Session->setFlash(__('Document deleted'));
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Document was not deleted'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__("You don't have access to this action."));
		}
	}
}
