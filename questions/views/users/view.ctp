<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Admin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['is_admin']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
        <?php 
            //NOTE: It is very useful to use the debug statement to see what values are being passed sometimes
            //echo debug($user); 
        ?>
    <h2>Here are the jobs <?php echo $user['User']['full_name'] ?> has applied for</h2>
    <ul>
    <?php foreach ($user['Prospects'] as $prospect) { ?>
        <li>
            <?php 
                echo $this->Html->link( $prospect['title'], array('controller' => 'jobs', 'action' => 'view', $prospect['id']) ); 
                echo " on {$prospect['Application']['created']} ";
                echo $this->Html->link( 'Read the application', array('controller' => 'applications', 'action' => 'view', $prospect['Application']['id']) ); 
            ?>
        </li>
     <?php  } ?>
    </ul>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
        <?php if ( $logged_in_user_id == $user['User']['id'] ) { //only show the edit and delete if this is a job you posted ?>
            <li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <?php } ?>
            
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
