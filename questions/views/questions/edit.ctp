<div class="questions form">
<?php echo $form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question');?></legend>
	<?php
		echo $this->Mustache->element( 'questions__edit__' . $question['Type']['template'] );
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Questions', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Tests', true), array('controller' => 'tests', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test', true), array('controller' => 'tests', 'action' => 'add')); ?> </li>
	</ul>
</div>