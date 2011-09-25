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
    <?php echo $this->Mustache->element('questions__add_in_test'); ?>
    
</div>
<div class="actions">
    <h2>My Questions</h2>
</div>

<script type="html/template" id="questionTemplate">
    <?php echo $this->Mustache->getSingleTemplate('questions__question_in_test'); ?>
</script>

<script type="text/javascript">
$(function(){
    //on return, clear form, render mustache, add to questions
    $('.new_question_submit').bind('click', function(e){
        if( !$( '#QuestionQuestion' ).val().length ) {
            return;
        }
        
        $.post(
            $('#newQuestionForm').attr('action'),
            $('#newQuestionForm').serialize(),
            function(data) {
                if(!data){
                    alert('Sorry, did not save');
                    return;
                }
                
                mustache_html = Mustache.to_html(
                            $('#questionTemplate').html(), 
                            data, 
                            []);
                $('#questions').append( mustache_html );
            }
        );
    });
})
</script>
