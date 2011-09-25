<?php

class User extends AppModel {

    var $hasMany = array( 'Test', 'Question');
    
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
    
    
    // Get user data and make sure to restrict Job.approved
    function getUser( $id ) {

    }

}
?>