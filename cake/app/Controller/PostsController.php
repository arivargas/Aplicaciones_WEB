<?php
class PostsController extends AppController {

	var $name = 'Posts';

	function index() {
		$this->set('authUser', $this->Auth->user());
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}


	function view($id = null) {
		$this->set('authUser', $this->Auth->user());
		//App::import('Xml');
		$this->Post->id = $id;
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$parsed_xml = Xml::build($this->Post->field('website'));
		// rss_item: convierte xml a array
		$rss_item = array();
		$this->rss_item = Xml::toArray($parsed_xml);
		$this->set('post', $this->rss_item['rss']['channel']['item']);

		//$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		$courses = $this->Post->Course->find('list');
		$this->set(compact('courses'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$courses = $this->Post->Course->find('list');
		$this->set(compact('courses'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
