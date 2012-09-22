<div class="courseUsers form">
<?php echo $this->Form->create('CourseUser');?>
	<fieldset>
 		<legend><?php __('Edit Course User'); ?></legend>
	<?php
		echo $this->Form->input('course_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CourseUser.user_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CourseUser.user_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Course Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Courses', true), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course', true), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>