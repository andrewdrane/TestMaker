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
        <li>
            <?php echo $this->Html->link('My questions', 
                    array('controller' => 'tests', 'action' => 'my_questions', $test_id) ); ?>
        </li>
    </ul>
    
    <ul id="question_list">
        <?php echo $this->element('tests/question_list'); ?>
    </ul>
</div>
<div class="tests form" id="rightcol">
<?php echo $form->create('Test', array('url' => array('action' => 'edit')));?>
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
                  if( empty( $question_type_data[$question['type']]['template'] )) continue; //if we have bad data
                  $question['edit'] = array( 'test_id' => $test_id, 'question_id' => $question['id'] );
                  $template = $question_type_data[$question['type']]['template']; 
                  echo $this->Mustache->element('questions__view__' . $template, array('Question' => $question ));
               }
            }
            ?>
            </ol>
        </div>
    <h2>Add a question to the test</h2>
    <?php echo $this->Form->input('type', array( 'label' => 'Question Type (Not yet active...)', 'id' => 'questionTypes', 'options' => $question_types)); ?>
    <div id="createQuestionContainer">
        <?php echo $this->Mustache->element('questions__add__short_answer'); ?>  
    </div>
    
</div>
<?php echo $this->Form->hidden('test_id', array('value' => $test_id, 'id' => 'test_id_value')); ?>


<script type="html/template" id="questionTemplate">
    <?php echo $this->Mustache->getSingleTemplate('questions__view__short_answer'); ?>
</script>

<script type="text/javascript">
$( function() {
    TM.initNewQuestion();
    TM.initRemoveQuestion();
    TM.initQuestionLists();
    
    $('#questionTypes').bind('change', function(){
        $.get(
            '/questions/get_question_template/' + $('#test_id_value').val() + '/' + $('#questionTypes').val(),
            {},
            function( data ) {
                $('#createQuestionContainer').html(data);
            }
        );
    });
});

//test maker oo programming
TM = {};

//make the question lists clickable
TM.initQuestionLists = function(){
    $('#question_list_options a').click( function(e){
        e.preventDefault();
        $('#question_list_options a').removeClass('selected');
        the_link = $(this);
        $.get(
            the_link.attr('href'),
            {},
            function(data){
               $('#question_list').html( data );
               the_link.addClass('selected');
            }
        )
    });
    
    //activate the questions on the left
    $('.addToTest').live('click', function(e){
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
}

//initialize saving new questions
TM.initNewQuestion = function(){
    //on return, clear form, render mustache, add to questions
    $('#newQuestionForm').live('submit', function(e){
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
}

TM.initRemoveQuestion = function(){
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
}

</script>
