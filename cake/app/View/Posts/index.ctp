<div class="posts index">
	<h2><?php __('Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('website');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $post['Post']['title']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['website']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['Course']['name'], array('controller' => 'courses', 'action' => 'view', $post['Course']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['Post']['id'])); ?>
		<?php 	if ($authUser['role'] != 'estudiante'){ ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete it?', true), $post['Post']['id'])); ?>
		<?php } ?>
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
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'profesor'){ ?>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('View Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Documents'), array('controller' => 'documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('View Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
</div>
