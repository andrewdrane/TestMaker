<?php

/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    var $components = array( 'Auth', 'Session', 'RequestHandler' );
    var $helpers = array( 'Html', 'Form', 'Session', 'Paginator', 'Mustache');
    
    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->fields = array(
            'username' => 'email',
            'password' => 'password'
        );
//        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
//        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
//        $this->Auth->authorize = 'controller';
    }
    
    //Always run before rendering.
    function beforeRender(){
        parent::beforeRender();
        $logged_in_user_id = $this->Auth->user('id'); //will be NULL if user is not logged in
        $this->set( compact('logged_in_user_id') );
        if( $logged_in_user_id ) {
            $this->set('logged_in_user_info', $this->Auth->user() );
        }
    }
    
    function isAjax(){
        return $this->RequestHandler->isAjax();
    }
}
