<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('mockup');
		echo $this->Html->css('prototype/stylesheets/screen');
		echo $this->Html->css('prototype/stylesheets/print', 'stylesheet', array('media' => 'print'));

		echo $scripts_for_layout;
	?>
    <script type="text/javascript" src="/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="/js/mustache.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('Quiz builder', true), 'http://cakephp.org'); ?></h1>
            
                <?php if( !empty( $logged_in_user_id)) { //if the user is logged in 
                    echo "<span>Welcome {$logged_in_user_info['User']['full_name']}, your email is {$logged_in_user_info['User']['email']}</span>";
                } ?>
                
                
                <?php echo $this->Html->link('View tests', array('controller' => 'tests', 'action' => 'index')); ?>
                <?php echo $this->Html->link('View questions', array('controller' => 'questions', 'action' => 'index')); ?>
                <?php echo $this->Html->link('View users', array('controller' => 'users', 'action' => 'index')); ?>
            
                <?php if( !empty( $logged_in_user_id)) { //if the user is logged in ?>
                    <?php echo $this->Html->link('Create a test', array('controller' => 'tests', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('My Questions', array('controller' => 'questions', 'action' => 'my_questions')); ?>
                    <?php echo $this->Html->link('My Tests', array('controller' => 'tests', 'action' => 'my_tests')); ?>
                    <?php echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?>
                <?php } else { ?>
                    <?php echo $this->Html->link('Create an account', array('controller' => 'jobs', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
                <?php } ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
            Footer
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>