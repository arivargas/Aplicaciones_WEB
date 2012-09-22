<?php 	if ($authUser['role'] != 'estudiante'){ ?>
<div class="documents form">
<?php echo $this->Form->create('Document', array ( 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Document'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->label('Please select a resource to upload');
		echo $this->Form->file('data');
		echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php } ?>
