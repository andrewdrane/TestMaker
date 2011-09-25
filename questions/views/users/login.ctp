<?php echo $this->Form->create('User'); ?>
	<fieldset>
 		<legend><?php __('Please Login'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end('Login'); ?>

<p><?php echo $this->Html->link( __('Create an account', true), array( 'controller' => 'users', 'action' => 'add' ) ); ?> </p>
<p><strong>NOTE: </strong> For the demo - you can log in with any of the pre-loaded users who are loaded with password '123'</p>
<p>For example, a user who has CREATED a lot of jobs: <strong>max@test.com</strong> and password <strong>123</strong></p>
<p>And, a user who has APPLIED TO lot of jobs: <strong>lance@test.com</strong> and password <strong>123</strong></p>
