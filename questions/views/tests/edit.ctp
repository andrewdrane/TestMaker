<div id="leftcol">
    questions
    <ul id="question_list_options">
        <li>Bookmarked</li>
        <li>All questions</li>
    </ul>
    
    <ul id="question_list">
        <?php echo $this->element('tests/question_list'); ?>
    </ul>
</div>
<div class="tests form" id="rightcol">
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
            if ( !empty( $questions ) ) { 
               foreach ( $questions as $question ) {
                  $question['edit'] = array( 'test_id' => $test_id, 'question_id' => $question['id'] );
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
                
                $( '#QuestionQuestion' ).val('');//clear the form
                $( '#QuestionSampleAnswer' ).val('');
            }
        );
    });
    
    $('.removeFromTest').bind('click', function(e){
        e.preventDefault();
        //remove from the test - call the 
        the_link = $(this);
        $.get(
            the_link.attr('href'),
            {},
            function(data){
                if( data ) {
                    the_link.closest('.question').remove();
                }
            }
        )
    });
    
    
    $('.addToTest').bind('click', function(e){
        e.preventDefault();
        //remove from the test - call the 
        the_link = $(this);
        $.get(
            the_link.attr('href'),
            {},
            function(data){
               if(!data){
                   alert('Sorry, did not save');
                   return;
               }
               mustache_html = Mustache.to_html(
                            $('#questionTemplate').html(), 
                            $.parseJSON(data), 
                            []);
               $('#questions').append( mustache_html );
            }
        )
    });

})
</script>
