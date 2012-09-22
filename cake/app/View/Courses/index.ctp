<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($course['Area']['name'], array('controller' => 'areas', 'action' => 'view', $course['Area']['id'])); ?>
		</td>
		<td class="actions">
	<?php 	if ($authUser['role'] == 'estudiante'){ ?>
			<?php echo $this->Html->link(__('Documents'), array('controller' => 'documents' , 'action' => 'index', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Homeworks'), array('controller' => 'homeworks' , 'action' => 'index', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('News'), array('controller' => 'news' , 'action' => 'index', $course['Course']['id']));?>

	<?php } ?> 

	<?php if ($authUser['role'] == 'administrador'){ ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete it?')); ?>
	<?php }  ?>

			<?php echo $this->Html->link(__('Add to group'), array('controller' => 'courseUsers' , 'action' => 'add', $course['Course']['id'], 'curso')); ?>
			<?php echo $this->Html->link(__('Members'), array('controller' => 'courseUsers' , 'action' => 'index', $course['Course']['id'], 'curso')); ?>
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

	<ul><?php if ($authUser['role'] == 'administrador'){ ?>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'profesor'){ ?>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit', $authUser['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('View Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit', $authUser['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
</div>
