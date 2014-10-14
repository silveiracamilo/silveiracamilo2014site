		</div>	
	</div>	
	<div class="footer">
		<div class="container">
	    	<div class="row">
		        <div class="span4">
		            <?php dynamic_sidebar('footer-sidebar-left'); ?>
		        </div>
		        <div class="span3 offset1">
		            <?php dynamic_sidebar('footer-sidebar-middle'); ?>
		        </div>
		        <div class="span3 offset1">
		            <?php dynamic_sidebar('footer-sidebar-right'); ?>
		        </div>
		    </div>
		</div>
	</div>

	<div class="footer_bottom">
		<div class="container">
		    <div class="row">
		        <div class="span6">
		            <p>Copyright 2013 electra. <span>design by <a href="http://www.teslathemes.com" target="_blank">TeslaThemes</a></span></p>
		        </div>
		        <?php echo tt_social_icon('<div class="span6"><ul class="socials">','</ul></div>','<li><a href="%2$s"><img src="'.get_template_directory_uri().'/images/socials/%1$s.png" alt="%1$s" title="%1$s" /></a></li>'); ?>
		    </div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>