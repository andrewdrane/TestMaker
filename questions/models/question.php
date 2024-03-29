<?php
class Question extends AppModel {

	var $name = 'Question';
	var $validate = array(
		'question' => array('notempty')
	);
    
    //put in DB??
    var $types = array(
        QUESTION_SHORT_ANSWER => array( 
            'name' => 'Short Answer', 
            'template' => 'short_answer', 
            'processing_function' => '', 
            'type_id' => QUESTION_SHORT_ANSWER ),
        QUESTION_MULTIPLE => array( 
            'name' => 'Multiple Choice', 
            'template' => 'multiple', 
            'processing_function' => 'questionMultiple', 
            'type_id' => QUESTION_MULTIPLE )
    );
    
    //for generating a dropdown
    function getTypes(){
        $types = array();
        foreach ($this->types as $type_id => $type) {
            $types[ $type_id ] = $type['name'];
        }
        return $types;
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Test' => array(
			'className' => 'Test',
			'joinTable' => 'test_content',
			'foreignKey' => 'content_id',
			'associationForeignKey' => 'test_id',
			'unique' => true,
			'conditions' => array('TestContent.content_type' => CONTENT_QUESTION),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
    
    //gets questions with the proper templates
    function getQuetsions( $conditions = array(), $keyworkds = array() ) {
        
        $params = array(
            'contain' => array(),
        );
        
        if( !empty( $conditions )) {
            $params['conditions'] = $conditions;
        }
        
        $questions = $this->find('all',$params  );
        
        //foreach question - add the template data
        
        return $questions;
    }
    
    function getQuestion( $id ) {
        $this->recursive = 0;
        $question = $this->findById($id);
        if( !empty( $question['Question']['data'] ) ) {
            $question['Question']['json_data'] = $question['Question']['data']; //in case we want the original JSON
            $question['Question']['data'] = json_decode( $question['data'], true );
        }
        $question['Type'] = $this->types[ $question['Question']['type'] ] ; //so we have the template data for rendering if needed
        return $question;
    }
    
    
    //question processing for saving
    function questionMultiple( $data ) {
        //serialize data to json, make sure all questions are an array.
    }
    
    //serialize the data portion if it is an array
    function beforeSave(){
        if( !empty($this->data['Question']['data']) && is_array($this->data['Question']['data'])) {
            $this->data['Question']['data'] = json_encode( $this->data['Question']['data'] );
        }
        return true;
    }

}
