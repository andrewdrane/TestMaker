<?php

class UsersController extends AppController {
	var $name = 'Users';

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login');
                    
        $this->Auth->fields = array(
            'username' => 'email',
            'password' => 'password'
        );
        
    }
    
    function login() {
        if( !(empty($this->data)) && $this->Auth->user() ) {
            $this->redirect($this->Auth->redirect());      
        }

    }
    
    function index() {
        
    }
  
    function register( ) {
        
        if( !empty( $this->data ) ) {
            
            if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password2'])) {
            
                // Passwords match, continue processing
                    if( $this->User->save( $this->data ) ) {
                        $this->Session->setFlash('Thank you for registering');
                        $this->redirect(array('controller'=>'users','action'=>'index'));
                    } else {
                        // erase passwords
                        unset( $this->data['User']['password'] );
                        unset( $this->data['User']['password2'] );
                    }
            } else { 
                 $this->Session->setFlash('Typed passwords did not match');
            }   
        }   

    }

    function view( $id ) {
        $user = $this->User->getUser( $id ) ;
        $this->set( 'user', $user );
    }    
    
    function logout() {
        $this->Auth->logout();
        $this->redirect( array('controller'=>'users','action'=>'index'));
    }
}
?>