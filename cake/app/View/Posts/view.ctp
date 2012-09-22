<div class="posts view">
<h2><?php  __('Post');?></h2>

	<?php foreach($post as $itemrss){

		echo "<p><a href=" . $itemrss['link'] . ">" . $itemrss['title'] . "</a></p>";
	}?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
