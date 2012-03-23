<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

?>

<div class="fancypantsaccordionholder <?php echo $moduleclass_sfx;?>">

	<ul>
		
		<?php foreach ($list as $item): ?>
		
		<?php $headingHeight = $params->get('headingHeight'); ?>
		<?php $headingSize = $params->get('headingSize'); ?>
		
		<li <?php if($headingHeight != "") { echo "style='height:".$headingHeight."px; list-style:none;'"; } ?>>
			<a href="#" class="headerlink" <?php if($headingHeight != "" && $headingSize =="" ) { echo "style='line-height:".$headingHeight."px;'"; }  
											else if($headingHeight == "" && $headingSize !="" ) { echo "style='font-size:".$headingSize."px;'"; }
											else if($headingHeight != "" && $headingSize !="" ) { echo "style='font-size:".$headingSize."px; line-height:".$headingHeight."px;'";}
			?> >
				<?php echo htmlspecialchars($item->title); ?>
				<span class="acc-arrow">Open or Close</span>
			</a>
			<div class="acc-content">
				<?php echo $item->introtext; ?>
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
			<?php if($params->get('firstopen') == 1){ echo ",open:0"; } ?>
		});
    });
</script>