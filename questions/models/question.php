<?php
class Question extends AppModel {

	var $name = 'Question';
	var $validate = array(
		'question' => array('notempty')
	);

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

}
?>