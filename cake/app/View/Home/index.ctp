<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><?php 	if ($authUser['role'] == 'administrador'){ ?>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'profesor'){ ?>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit', $authUser['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
	<ul><?php 	if ($authUser['role'] == 'estudiante'){ ?>
		<li><?php echo $this->Html->link(__('View Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Homeworks'), array('controller' => 'homeworks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('View Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'users', 'action' => 'edit', $authUser['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul><?php } ?>
</div>
