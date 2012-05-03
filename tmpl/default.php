<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

?>

<?php $showCat = $params->get('showCat');
	  $headingHeight = $params->get('headingHeight');
      $headingSize = $params->get('headingSize'); 
      $catSize = $params->get('catSize');
?>

<div class="fancypantsaccordionholder <?php echo $moduleclass_sfx;?>">

	<ul>
		
		<?php foreach ($list as $item): ?>
		
		<?php 
			$categoryID = $item->catid;
			$itemID = $item->id;
			$database = JFactory::getDBO();
			$sql = "SELECT title FROM #__categories WHERE id = ".$categoryID;
			$database->setQuery( $sql );
			$catname=$database->loadResult();	
			$url = JRoute::_(ContentHelperRoute::getArticleRoute($itemID, $categoryID));
		?>
		
		<li <?php if($headingHeight != "") { echo "style='height:".$headingHeight."px; list-style:none;'"; } ?>>
			<a href="#" class="headerlink" <?php if($headingHeight != "" && $headingSize =="" ) { echo "style='line-height:".$headingHeight."px;'"; }  
											else if($headingHeight == "" && $headingSize !="" ) { echo "style='font-size:".$headingSize."px;'"; }
											else if($headingHeight != "" && $headingSize !="" ) { echo "style='font-size:".$headingSize."px; line-height:".$headingHeight."px;'";}
			?> >
			<?php if ($showCat == '0'){
					echo htmlspecialchars($item->title);
				} else if ($showCat == '1' && $catSize == ""){
					echo htmlspecialchars($item->title)." <p style='display:inline'>(".$catname.")</p>" ; 
				} else {
					echo htmlspecialchars($item->title)." <p style='display:inline; font-size:".$catSize."px'>(".$catname.")</p>" ;
				}
			?>
				<span class="acc-arrow">Open or Close</span>
			</a>
			<div class="acc-content">
				<?php 
					$intro = $item->introtext;
					$full = $item->fulltext;
					echo $intro;
					if($full != ''){
					echo "<a href='.$url.'>Read More</a>";
					}
				?>
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