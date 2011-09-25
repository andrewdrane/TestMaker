<div class="questions index">
<h2><?php __('Questions');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>

<?php echo $this->Form->create('Question', array('url' => array('controller' => 'questions', 'action' => 'index'))); 


echo $this->Form->input('keyword', array('type' => 'text', 'label' => 'Search'));


echo $this->Form->end('Search');
?>



<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('question');?></th>
	<th><?php echo $paginator->sort('sample_answer');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($questions as $question):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $question['Question']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($question['User']['full_name'], array('controller' => 'users', 'action' => 'view', $question['User']['id'])); ?>
		</td>
		<td>
			<?php echo $question['Question']['question']; ?>
		</td>
		<td>
			<?php echo $question['Question']['sample_answer']; ?>
		</td>

		<td>
			<?php echo $question['Question']['created']; ?>
		</td>

		<td class="actions">
			<?php 
            if( empty( $question['Bookmark']['id'])) {
                echo $html->link(__('Bookmark', true), array( 'controller' => 'bookmarks', 'action' => 'add_bookmark', $question['Question']['id']), array('class' => 'addBookmark')); 
            } else {
                echo 'Bookmarked';
            }
            ?>
			<?php echo $html->link(__('View', true), array('action' => 'view', $question['Question']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $question['Question']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $question['Question']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['Question']['id'])); ?>
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
		<li><?php echo $html->link(__('New Question', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('List Tests', true), array('controller' => 'tests', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Test', true), array('controller' => 'tests', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script type="text/javascript">
    $('.addBookmark').click(function(e){
       e.preventDefault();
       var link = $(this);
       $.get(
           link.attr('href'),
           {},
           function(data){
               if(data){
                   link.replaceWith('<span>saved</span>');
               }
           }
       )
    });
</script>
