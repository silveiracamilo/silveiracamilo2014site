/* ================= TABS WIDGET ================= */
(function($){
	$(function(){
		$('body').on('click','.electra_widget_remove',function(){
			var t = $(this);
			var t_parent = t.parent();
			if(t_parent.parent().children('.electra_widget_option').length>1)
				t_parent.remove();
		});
		$('body').on('click','.electra_widget_add',function(){
			var t = $(this);
			var t_parent = t.parent();
			t_parent.parent().children('.electra_widget_template').clone().removeClass('electra_widget_template').addClass('electra_widget_option').insertAfter(t_parent).find('[disabled]').removeAttr('disabled');
		});
		$('body').on('click','.electra_widget_ads img',function(){
			var t = $(this);
			var t_parent = t.closest('.electra_widget_option');
			var frame = t.data('frame');

			if(frame===undefined){
				frame = wp.media();
				t.data('frame',frame);
				frame.on('select',function(){
					var url = frame.state().get('selection').first().toJSON().url;
					t_parent.find('img').attr('src',url);
					t_parent.children('input[name$="[image][]"][type="hidden"]').val(url);
				});
			}
			
			frame.open();
		});

		var portfolioSettings = function() {
			var template = $('#page_template'),
				box = $('#portfolio_settings'),
				blog = $('#blog_columns'),
				home = $('#revolution_slider_alias'),
				countdown = $('#countdown_settings'),
				templateName;

				template.change(function () {
					templateName = template.children('option:selected').text();
					box.hide();
					blog.hide();
					home.hide();
					home.hide();
					home.hide();
					
					if(templateName === 'Portfolio' || templateName === 'Gallery' || templateName === 'Events') {
						box.show();
						// $("html, body").animate({ scrollTop: box.offset().top }, 1000);
					}else if(templateName === 'Blog'){
						blog.show();
					}else if(templateName === 'Home'){
						home.show();
					}else if(templateName === 'Countdown'){
						countdown.show();
					}else {
						box.hide();
						blog.hide();
						home.hide();
						countdown.hide();
					}			
				})
				.change();

		}

		portfolioSettings();
	});
})(jQuery);
/* ================= TABS WIDGET ================= */