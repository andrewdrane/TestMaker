<?php 
if ( !empty( $question_options ) ) { 
   foreach ( $question_options as $question ) {
      $question['Question']['edit'] = array( 'test_id' => $test_id, 'question_id' => $question['Question']['id'] );
      echo $this->Mustache->element('questions__list__short_answer', array('Question' => $question['Question'] ));
   }
}
?>