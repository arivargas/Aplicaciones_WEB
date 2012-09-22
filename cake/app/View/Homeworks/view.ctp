<div class="homeworks view">
<h2><?php  echo __('Homework'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($homework['Homework']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($homework['Homework']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($homework['Homework']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($homework['Course']['name'], array('controller' => 'courses', 'action' => 'view', $homework['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php 	if ($authUser['role'] != 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('Edit Homework'), array('action' => 'edit', $homework['Homework']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Homework'), array('action' => 'delete', $homework['Homework']['id']), null, __('Are you sure you want to delete it?', $homework['Homework']['id'])); ?> </li>
		<?php } ?>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('action' => 'index')); ?> </li>
	</ul>
</div>
