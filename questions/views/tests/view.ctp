<div class="tests view">
<h2><?php  __('Test');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $test['Test']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($test['User']['id'], array('controller' => 'users', 'action' => 'view', $test['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $test['Test']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $test['Test']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $test['Test']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
    
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

</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Test', true), array('action' => 'edit', $test['Test']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Test', true), array('action' => 'delete', $test['Test']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $test['Test']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Tests', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test', true), array('action' => 'add')); ?> </li>
	</ul>
</div>


