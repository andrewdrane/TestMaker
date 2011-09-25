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

        <div>
            <h3>Questions:</h3>
            <ol  id="questions">
            <?php 
            if ( !empty( $questions ) ) { debug($questions);
               foreach ( $questions as $question ) {
                  echo $this->Mustache->element('questions__view__short_answer', array('Question' => $question ));
               }
            }
            ?>
            </ol>
        </div>
    <?php echo $this->Mustache->element('questions__add__short_answer'); ?>   
    
</div>



<script type="html/template" id="questionTemplate">
    <?php echo $this->Mustache->getSingleTemplate('questions__view__short_answer'); ?>
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
                $( '#QuestionSampleAnswer' ).val('');
            }
        );
    });
})
</script>
