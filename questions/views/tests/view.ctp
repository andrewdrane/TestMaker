<div class="tests view">
<h2 class="screenOnly"><?php  __('Test');?></h2>
<div class="printOnly">
    <p>Your name: _______________________________</p>
</div>
	<dl class="screenOnly"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Author'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($test['User']['full_name'], array('controller' => 'users', 'action' => 'view', $test['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $test['Test']['name']; ?>
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

    <dl class="printOnly">
		<dt>&nbsp;</dt>
		<dd>
			<?php echo $test['Test']['name']; ?>
			&nbsp;
		</dd>
        <?php __('Description'); ?>
        <dd>
			<?php echo $test['Test']['description']; ?>
			&nbsp;
		</dd>
	</dl>
    
    <div>
        <h3>Questions:</h3>
        <ol  id="questions">
        <?php 
        if ( !empty( $test['Question'] ) ) { 
           foreach ( $test['Question'] as $question ) {
              $template = $question_type_data[$question['type']]['template']; 
              echo $this->Mustache->element('questions__view__' . $template, array('Question' => $question ));
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


