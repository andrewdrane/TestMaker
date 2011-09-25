<?php
class QuestionsController extends AppController {

	var $name = 'Questions';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Question.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Question->create();
            $this->data['Question']['user_id'] = $this->Auth->user('id');
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('tests', 'users'));
	}
    
    /** @TODO - create a question and apply it to a test. 
     * AUTH Z on test
     *
     * @param type $test_id 
     */
    function create_in_test( ) {
        $this->data['Question']['user_id'] = $this->Auth->user('id');
        //$this->data['Question']['test_id'] = $test_id;
        //
        $saved = $this->Question->save($this->data);
        die(debug($saved));
        if ($this->isAjax() ) {
            echo  $saved ? json_encode($saved) : '0';
            exit();
        } else {
            if ( $saved ) {
                $this->Session->setFlash(__('The Question has been saved', true));
                $this->redirect(array( 'controller' => 'tests',  'action'=>'view', $test_id ));
            } else {
                $this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
            }
        }
    }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Question', true));
			$this->redirect(array('action'=>'index'));
		}
        unset( $this->data['Question']['user_id'] );
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
		$this->set(compact('tests','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->del($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>