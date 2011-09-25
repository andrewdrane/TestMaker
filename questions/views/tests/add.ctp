<div class="tests form">
<?php echo $form->create('Test');?>
	<fieldset>
 		<legend><?php __('Test');?></legend>
	<?php
		echo $form->input('id', array('value' => $test_id));
		echo $form->input('description');
	?>
	</fieldset>
    <?php echo $form->end('Save Test');?>

        <div id="questions">
            <h3>Questions:</h3>
            <?php 
            if(!empty( $questions )) {
               foreach ($questions as $question) {
                  echo $this->Mustache->element('questions__question_in_test', array('Question' => $question ));
               }
                
            } ?>
        </div>
    <?php echo $this->Mustache->element('questions__add_in_test'); ?>   
    
</div>



<script type="html/template" id="questionTemplate">
    <?php echo $this->Mustache->getSingleTemplate('questions__question_in_test'); ?>
</script>

<script type="text/javascript">
$(function(){
    //on return, clear form, render mustache, add to questions
    $('.new_question_submit').bind('click', function(e){
        e.preventDefault();
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
                            $.parseJSON(data), 
                            []);
                $('#questions').append( mustache_html );
                console.log( mustache_html +  'HI!!' );
                console.log(data)
                $( '#QuestionQuestion' ).val('');//clear the form
                $( 'QuestionSampleAnswer' ).val('');
            }
        );
    });
})
</script>
