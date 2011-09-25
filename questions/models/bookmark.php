<?php
class Bookmark extends AppModel {

	var $name = 'Bookmark';
	var $validate = array(
		'content_type' => array('numeric'),
		'content_id' => array('numeric')
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

}
?>