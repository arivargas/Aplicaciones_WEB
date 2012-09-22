<div class="homeworks index">
	<h2><?php echo __('Homeworks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($homeworks as $homework): ?>
	<tr>
		<td><?php echo h($homework['Homework']['title']); ?>&nbsp;</td>
		<td><?php echo h($homework['Homework']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($homework['Course']['name'], array('controller' => 'courses', 'action' => 'view', $homework['Course']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $homework['Homework']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homework['Homework']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $homework['Homework']['id']), null, __('Are you sure you want to delete # %s?', $homework['Homework']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><?php 	if ($authUser['role'] == 'administrador'){ ?>
		<li><?php echo $this->Html->link(__('New Homework'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'profesor'){ ?>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('View Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
</div>
