<?php
class TestsController extends AppController {
	var $name = 'Tests';
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

	function index() {
		$this->Test->recursive = 0;
		$this->set('tests', $this->paginate());
	}
    
    function my_tests(){
        $this->set( 'headline', 'My Tests' );
        $this->Test->recursive = 0;
		$this->set('tests', $this->paginate(array('Test.user_id' => $this->Auth->user('id'))));
        $this->render('index');
    }
    

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Test.', true));
			$this->redirect(array('action'=>'index'));
		}
        $test = $this->Test->find('first', array(
                'conditions' => array('Test.id' => $id ),
                'contain' => array( 'Question', 'User' )
            ) );
		$this->set('test', $test );
	}

    /** Add will create and save an empty test...
     * 
     */
	function add() {
        $this->Test->create();
        $this->Test->save(
                array('Test' => array(
                    'user_id' => $this->Auth->user('id')
        ) ) );
        
        $this->edit( $this->Test->id );
        $this->render('edit');
	}

    /** @TODO - why isn't auth redirect working here? is the 'tests' name confusing things?????
     *
     * @param type $id 
     */
	function edit($id = null) {
        if( !$this->Auth->user('id')) {
            return $this->redirect( array( 'controller' => 'users', 'action' => 'login'));
        }
        
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
        
        $this->set( 'question_options', $this->Test->Question->getQuetsions() );
        $this->set( 'question_types', $this->Test->Question->getTypes() );
        
        $this->set('test_id', $id);
        $this->set('questions', $this->data['Question']);
        
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Test', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Test->delete($id)) {
			$this->Session->setFlash(__('Test deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
    
    /** Gests a user's bookmarked content
     *
     * @param type $user_id 
     */
    function bookmarked_questions( $test_id = null, $user_id = null ){
        if( !$user_id ) {
            $user_id = $this->Auth->user('id');
        }
        $user = $this->Test->User->find('first', array(
            'conditions' => array('User.id' => $user_id ),
            'contain' => array('BookmarkedQuestions'),
        ));
        $this->layout = false;
        $question_options = array();
        foreach ($user['BookmarkedQuestions'] as $question) {
            $question_options[] = array(
                'Question' => $question,
            );
        }
        $this->set('test_id', $test_id );
        $this->set( compact( 'question_options' ) );
        return $this->render('/elements/tests/question_list');
    }
    
    function all_questions( $test_id = null ){
        $this->layout = false;
        $this->Test->Question->recursive = -1;
        $questions = $this->Test->Question->find('all');
        $this->set('test_id', $test_id );
        $this->set( 'question_options', $questions );
        return $this->render('/elements/tests/question_list');
    }

}
