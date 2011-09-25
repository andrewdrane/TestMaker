<div id="leftcol">
    questions
    <ul id="question_list_options">
        <li>
            <?php echo $this->Html->link('Bookmarked questions', 
                    array('controller' => 'tests', 'action' => 'bookmarked_questions', $test_id)); ?>
        </li>
        <li>
            <?php echo $this->Html->link('All questions', 
                    array('controller' => 'tests', 'action' => 'all_questions', $test_id), 
                    array('class' => 'selected') ); ?>
        </li>
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
		echo $form->input('name');
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
    <h2>Add a question to the test</h2>
    <?php echo $this->Form->input('type', array( 'label' => 'Question Type (Not yet active...)', 'options' => $question_types)); ?>
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
    
    $('#question_list_options a').click( function(e){
        $('#question_list_options a').removeClass('selected');
        e.preventDefault();
        the_link = $(this);
        $.get(
            the_link.attr('href'),
            {},
            function(data){
               $('#question_list').html( data );
               the_link.addClass('selected');
            }
        )
    })

})
</script>
