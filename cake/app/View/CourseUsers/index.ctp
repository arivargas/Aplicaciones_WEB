<div class="courseUsers index">
	<h2><?php __('Course Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<!--<th class="actions"><?php echo __('Actions'); ?></th>-->
	</tr>
	<?php
	$i = 0;
	foreach ($courseUsers as $courseUser):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($courseUser['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseUser['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($courseUser['User']['username'], array('controller' => 'users', 'action' => 'view', $courseUser['User']['id'])); ?>
		</td>
		<!--<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $courseUser['CourseUser']['user_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $courseUser['CourseUser']['user_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $courseUser['CourseUser']['user_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $courseUser['CourseUser']['user_id'])); ?>
		</td>-->
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Course User', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses', true), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course', true), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
