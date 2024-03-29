<div class="tests index">
<h2><?php echo (empty($headline) ) ? __('Tests', true) : $headline;?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tests as $test):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $test['Test']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($test['User']['full_name'], array('controller' => 'users', 'action' => 'view', $test['User']['id'])); ?>
		</td>
		<td>
			<?php echo $test['Test']['description']; ?>
		</td>
        <td>
			<?php echo $test['Test']['name']; ?>
		</td>
		<td>
			<?php echo $test['Test']['created']; ?>
		</td>
		<td>
			<?php echo $test['Test']['updated']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $test['Test']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $test['Test']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $test['Test']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $test['Test']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Test', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('List Questions', true), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Questions', true), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
