<?php

defined('_JEXEC') or die;

?>

<div class="fancypantsaccordionholder <?php echo $moduleclass_sfx;?>">

	<ul>
		
		<?php foreach ($list as $item): ?>
		
		<li>
			<a href="#">
				<?php echo htmlspecialchars($item->title); ?>
				<span class="acc-arrow">Open or Close</span>
			</a>
			<div class="acc-content">
				<?php echo strip_tags($item->introtext); ?>
			</div>
		</li>
		
		<?php endforeach; ?>
	</ul>

</div>

<script type="text/javascript">
	jQuery(function() {
		jQuery('.fancypantsaccordionholder').accordion({
			oneOpenedItem:true,
			speed:300,
			scrollSpeed:300	
		});
    });
</script>