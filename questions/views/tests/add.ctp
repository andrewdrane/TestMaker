<div class="tests form">
<?php echo $form->create('Test');?>
	<fieldset>
 		<legend><?php __('Add Test');?></legend>
	<?php
		echo $form->input('id', array('value' => $test_id));
		echo $form->input('description');
		echo $form->input('questions');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
    <div id="questions"></div>
    <?php echo $this->Mustache->element('questions/add_in_test'); ?>
    
</div>
<div class="actions">
    <h2>My Questions</h2>
</div>

<script type="text/javascript">
$(function(){
    //on return, clear form, render mustache, add to questions
})
</script>
