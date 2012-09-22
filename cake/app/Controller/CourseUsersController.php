<?php
class CourseUsersController extends AppController {

	var $name = 'CourseUsers';

	function edit($id=null){ $this->redirect(array('action' => 'index'));}
	function delete($id=null){ $this->redirect(array('action' => 'index'));}
	function view($id=null){ $this->redirect(array('action' => 'index'));}

	function index($id = null, $quien = null) {
		//Si se pasó un parámetro por la $id
		if ($id) {
			$Id = $this->request->params['pass'][0]; 
			if ($quien == 'usuario'){
				//Para ver los curso de un usuario
				$courseUsers = $this->paginate(array('CourseUser.user_id' => $id));
			} else if ($quien == 'curso'){
				//Para ver los miembros de un curso
				$courseUsers = $this->paginate(array('CourseUser.course_id' => $id));
			} else {
				$this->Session->setFlash(__('The course user could not be saved. Please, try again.', true));
			}

			$this->set(compact('courseUsers'));
		}else{
			//index normal
			$this->CourseUser->recursive = 0;
			$this->set('courseUsers', $this->paginate());
		}

	}
		

	

	function add() {
		if (!empty($this->data)) {
			$this->CourseUser->create();
			if ($this->Auth->user('role') != 'administrador'){
				if ($this->CourseUser->save($this->data)) {
					$this->Session->setFlash(__('The course user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The course user could not be saved. Please, try again.', true));
					
				}
			} else {
				$this->Session->setFlash(__('Administrators are not members of a group', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		$courses = $this->CourseUser->Course->find('list');
		$users = $this->CourseUser->User->find('list');
		$this->set(compact('courses', 'users'));
	}

	/*function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid course user', true));
			$this->redirect(array('action' => 'index'));
	
			if ($quien == 'usuario'){
				//Viene de la vista usuario
				$this->set('users', $this->request->data['CourseUser']['User']['id_user']=$id);
				$courses = $this->CourseUser->Course->find('list');
			} else if ($quien == 'curso'){
				///Viene de la vista usuario
				$this->set('courses', $this->request->data['CourseUser']['Course']['id_course']=$id);
				$users = $this->CourseUser->User->find('list');
			} else {
				$this->Session->setFlash(__('The course user could not displayed. Please, try again.', true));
			}
		
			$this->set(compact('courses', 'users'));
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid course user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CourseUser->save($this->data)) {
				$this->Session->setFlash(__('The course user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CourseUser->read(null, $id);
		}
		$courses = $this->CourseUser->Course->find('list');
		$users = $this->CourseUser->User->find('list');
		$this->set(compact('courses', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for course user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CourseUser->delete($id)) {
			$this->Session->setFlash(__('Course user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Course user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
?>
