<?php TT_Log::write($slides,true); ?>

<ul>
<?php foreach($slides as $slide): ?>
	<li>
		<img src="<?php echo $slide['options']['beeld']; ?>" alt="" />
		<pre><?php echo var_export($slide['categories'],true); ?></pre>
		<?php foreach($slide['related'] as $related): ?>
			<pre><?php echo get_the_title($related['post']->ID); ?></pre>
			<pre><?php echo var_export($related['categories'],true); ?></pre>
		<?php endforeach; ?>
	</li>
<?php endforeach; ?>
</ul>