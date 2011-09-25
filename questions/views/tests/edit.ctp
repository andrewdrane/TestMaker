<div class="tests form">
<?php echo $form->create('Test');?>
	<fieldset>
 		<legend><?php __('Edit Test');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('description');
		echo $form->input('questions');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Test.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Test.id'))); ?></li>
		<li><?php echo $html->link(__('List Tests', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Test Questions', true), array('controller' => 'test_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test Question', true), array('controller' => 'test_questions', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Questions', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
