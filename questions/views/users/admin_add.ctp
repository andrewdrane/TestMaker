<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php
		echo $form->input('email');
		echo $form->input('password');
		echo $form->input('first_name');
		echo $form->input('last_name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Tests', true), array('controller' => 'tests', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test', true), array('controller' => 'tests', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
