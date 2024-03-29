<?php
class QuestionsController extends AppController {
	var $name = 'Questions';
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

	function index() {
		$this->Question->recursive = 0;
        $condtions = $this->_searchConditions();
		$this->set('questions', $this->paginate($condtions));
	}
    
    function my_questions(){
        $this->set( 'headline', 'My Questions' );
        $this->Question->recursive = 0;
        $condtions = $this->_searchConditions();
        
		$condtions['Question.user_id'] = $this->Auth->user('id');
        
		$this->set('questions', $this->paginate($condtions));
        $this->render('index');
    }
    
    
    private function _searchConditions(){
        if($this->Auth->user('id')){
            $this->Question->bindModel(array('hasOne'=> array('Bookmark' => array(
                'foreignKey' => 'content_id',
                'conditions' => array(
                    'Bookmark.content_type' => CONTENT_QUESTION,
                    'Bookmark.user_id' => $this->Auth->user('id')
            ) ) ) ) );
            $this->paginate['Question']['contain'] = array('Bookmark', 'User');
        }
        
        $conditions = array();
        if(!empty($this->data['Question']['keyword'])) {
           $condtions['Question.question like ?'] = "%{$this->data['Question']['keyword']}%";
        }
        return $conditions;
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
        $test_id = $this->data['Question']['test_id'];
        //
        $saved = $this->Question->save($this->data);
        $this->Question->TestContent->save( array( 'TestContent' => array(
            'test_id' => $test_id,
            'content_id' => $this->Question->id,
            'content_type' => CONTENT_QUESTION,
            'order' => 0,
            'data' => $this->data['Question']['data']
        ) ) );

        if ($this->isAjax() ) {
            if( $saved ) {
                $this->Question->recursive = -1;
                $question = $this->Question->read();
                echo json_encode( $question );
            } else {
                echo 0;
            }
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
    
    function add_to_test( $test_id, $question_id ) {
        $this->Question->TestContent->create();
        $saved = $this->Question->TestContent->save( array( 'TestContent' => array(
            'test_id' => $test_id,
            'content_id' => $question_id,
            'content_type' => CONTENT_QUESTION,
            'order' => 0
        ) ) );
        
        if ($this->isAjax() ) {
            if( $saved ) {
                $this->Question->id = $question_id;
                $this->Question->recursive = -1;
                $question = $this->Question->read();
                echo json_encode( $question );
            } else {
                echo 0;
            }
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
    
    function remove_from_test( $test_id, $content_id ) {
        $this->Question->TestContent->recursive = -1;
        $tc = $this->Question->TestContent->find( 'first', array(
            'conditions' => array(
                'content_type' => CONTENT_QUESTION,
                'content_id' => $content_id,
                'test_id' => $test_id,
            )
        ));
        
        $deleted = $this->Question->TestContent->delete( $tc['TestContent']['id'] );
        
        if ($this->isAjax() ) {
            echo $deleted ? '1' : 0;
            exit();
        } else {
            if ( $deleted ) {
                $this->Session->setFlash(__('Removed', true));
                $this->redirect(array( 'controller' => 'tests',  'action'=>'view', $test_id ));
            } else {
                $this->Session->setFlash(__('The Question could not be removed. Please, try again.', true));
            }
        }
    }
    
    //ajax function for getting different type of question
    function get_question_template( $test_id, $question_type ) {
        if( !isset( $this->Question->types[$question_type] ) ) {
            exit();
        }
        
       
        App::import('Helper', 'Mustache'); // loadHelper('Html'); in CakePHP 1.1.x.x
        $Mustache = new MustacheHelper();
        //the helper is not getting the correct view variables, but it works if we pass them in
        @$html = $Mustache->element( 'questions__add__' . $this->Question->types[$question_type]['template'], array( 'test_id' => $test_id ) );
        die($html);
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
			$this->data = $this->Question->getQuestion($id);
            $this->set('question', $this->data); //easier varaible access since we are probably going to use mustache templates
		}
		$this->set(compact('tests','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
