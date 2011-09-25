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
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Test', true), array('action' => 'edit', $test['Test']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Test', true), array('action' => 'delete', $test['Test']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $test['Test']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Tests', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Test Questions', true), array('controller' => 'test_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test Question', true), array('controller' => 'test_questions', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Questions', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Test Questions');?></h3>
	<?php if (!empty($test['TestQuestion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Test Id'); ?></th>
		<th><?php __('Question Id'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('Comment'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($test['TestQuestion'] as $testQuestion):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $testQuestion['id'];?></td>
			<td><?php echo $testQuestion['test_id'];?></td>
			<td><?php echo $testQuestion['question_id'];?></td>
			<td><?php echo $testQuestion['order'];?></td>
			<td><?php echo $testQuestion['comment'];?></td>
			<td><?php echo $testQuestion['created'];?></td>
			<td><?php echo $testQuestion['updated'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'test_questions', 'action' => 'view', $testQuestion['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'test_questions', 'action' => 'edit', $testQuestion['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'test_questions', 'action' => 'delete', $testQuestion['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $testQuestion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Test Question', true), array('controller' => 'test_questions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Questions');?></h3>
	<?php if (!empty($test['questions'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Question'); ?></th>
		<th><?php __('Sample Answer'); ?></th>
		<th><?php __('Data'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($test['questions'] as $questions):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $questions['id'];?></td>
			<td><?php echo $questions['user_id'];?></td>
			<td><?php echo $questions['order'];?></td>
			<td><?php echo $questions['type'];?></td>
			<td><?php echo $questions['question'];?></td>
			<td><?php echo $questions['sample_answer'];?></td>
			<td><?php echo $questions['data'];?></td>
			<td><?php echo $questions['created'];?></td>
			<td><?php echo $questions['updated'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'questions', 'action' => 'view', $questions['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'questions', 'action' => 'edit', $questions['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'questions', 'action' => 'delete', $questions['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $questions['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Questions', true), array('controller' => 'questions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
