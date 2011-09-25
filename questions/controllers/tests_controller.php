<?php
class TestsController extends AppController {

	var $name = 'Tests';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Test->recursive = 0;
		$this->set('tests', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Test.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('test', $this->Test->read(null, $id));
	}

	function add() {
        $this->Test->create();
        $this->Test->save(
                array('Test' => array(
                    'user_id' => $this->Auth->user('id')
        ) ) );
        
        $this->set('test_id', $this->Test->id);
        
		if (!empty($this->data)) {
            $this->data['Test']['user_id'] = $this->Auth->user('id');
			if ($this->Test->save($this->data)) {
				$this->Session->setFlash(__('The Test has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Test could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Test', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
            unset( $this->data['Test']['user_id'] );
			if ($this->Test->save($this->data)) {
				$this->Session->setFlash(__('The Test has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Test could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Test->find('first', array(
                'conditions' => array('Test.id' => $id ),
                'contain' => array( 'Question', 'User' )
            ) );
		}
        $this->set('test_id', $id);
        $this->set('questions', $this->data['Question']);
        $this->render('add');
        
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Test', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Test->del($id)) {
			$this->Session->setFlash(__('Test deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>