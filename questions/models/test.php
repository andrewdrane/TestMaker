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
			'joinTable' => 'test_questions',
			'foreignKey' => 'test_id',
			'associationForeignKey' => 'question_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => array( 'TestQuestion.order' => 'ASC' ),
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>