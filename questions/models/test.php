<?php
class Test extends AppModel {

	var $name = 'Test';

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

//	var $hasMany = array(
//		'TestQuestion' => array(
//			'className' => 'TestQuestion',
//			'foreignKey' => 'test_id',
//			'dependent' => false,
//		)
//	);

	var $hasAndBelongsToMany = array(
		'Question' => array(
			'className' => 'Question',
			'joinTable' => 'test_content',
			'foreignKey' => 'test_id',
			'associationForeignKey' => 'content_id',
			'unique' => true,
			'conditions' => array('TestContent.content_type' => CONTENT_QUESTION),
			'fields' => '',
			'order' => array( 'TestContent.order' => 'ASC' ),
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
    
    /** Expand question data
     *
     * @param type $id
     * @return type 
     */
    function getTest( $id ) {
        $test = $this->find('first', array(
            'conditions' => array('Test.id' => $id ),
            'contain' => array( 'Question', 'User' )
        ) );
        
        foreach ($test['Question'] as &$question) {
            if( !empty( $question['data'])) {
                $question['data'] = json_decode( $question['data'], true );
            }
        }
        
        return $test;
    }

}
