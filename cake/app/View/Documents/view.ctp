<div class="documents view">
<h2><?php  echo __('Document'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($document['Document']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($document['Document']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('Download Document'), array('action' => 'download', $document['Document']['id'])); ?> </li> 
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($document['Document']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($document['Course']['name'], array('controller' => 'courses', 'action' => 'view', $document['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php 	if ($authUser['role'] != 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $document['Document']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']), null, __('Are you sure you want to delete it?', $document['Document']['id'])); ?> </li>
		<?php } ?>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?> </li>
	</ul>
</div>
