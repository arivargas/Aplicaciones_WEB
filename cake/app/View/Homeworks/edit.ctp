<div class="homeworks form">
<?php echo $this->Form->create('Homework'); ?>
	<fieldset>
		<legend><?php echo __('Edit Homework'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Homework.id')), null, __('Are you sure you want to delete it?', $this->Form->value('Homework.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
