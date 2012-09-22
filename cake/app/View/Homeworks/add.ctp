<?php 	if ($authUser['role'] != 'estudiante'){ ?>
<div class="homeworks form">
<?php echo $this->Form->create('Homework'); ?>
	<fieldset>
		<legend><?php echo __('Add Homework'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php } ?>
