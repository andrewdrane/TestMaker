<?php

class User extends AppModel {

    var $hasMany = array( 
        'Test', 
        'Question' );
    
    var $hasAndBelongsToMany = array(
		'Bookmarks' => array(
			'className' => 'Question',
			'joinTable' => 'bookmarks',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'content_id',
			'conditions' => array('Bookmark.content_type' => CONTENT_QUESTION)
		)
	);
    
    var $validate = array(
        'name' => array( 'rule' => 'notEmpty' ),
        'email' => array(
                         'rule1'=> array('rule' => 'notEmpty'),
                         'rule2'=> array(
                                         'rule' => 'email',
                                         'message' => 'Must be a valid email address'
                                         ),
                         ),
        'password' => array( 'rule' => 'notEmpty' ),
        'password2' => array( 'rule' => 'notEmpty' ),
        'company' => array( 'rule' => 'notEmpty' ),
        'introduction' => array( 'rule' => 'notEmpty' ),
        'website' => array( 'rule3' => array(
                                             'rule' => 'url',
                                             'message' => 'Must be a valid url',
                                             'allowEmpty' => true
                                            ))
    );
    
    //virtual fields allow us to automatically combine or alter fields for display purposes. Full name simply combines the first and last names!
    var $virtualFields = array(
        'full_name' => 'CONCAT(first_name, " ", last_name)'
    );
    
    
}
