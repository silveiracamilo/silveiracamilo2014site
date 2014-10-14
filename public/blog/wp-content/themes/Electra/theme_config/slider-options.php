<?php

return array(
	'electra_faq' => array(
		'name' => 'FAQ',
		'term' => 'Questions and answers',
		'term_plural' => 'Q & A',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=> array( 'title', 'editor')),
		'taxonomy_options' => array('show_ui' => false),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_faq',
				'view' => 'views/faq-view',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			)
		)
	),
	'electra_portfolio' => array(
		'name' => 'Portfolio',
		'term' => 'Portfolio',
		'term_plural' => 'Items in portfolio',
		'order' => 'ASC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title', 'editor'), 'taxonomies' => array('post_tag'),'has_archive'=>true),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'short_description' => array(
				'type' => 'line',
				'description' => 'Short item description, shown under the title on Single Portfolio Page',
				'title' => 'Short description',
				'default' => ''
			),
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item cover',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'image_slider' => array(
				'type' => 'image',
				'description' => ' ',
				'title' => 'Project Image Slider (shown on the Single Portfolio Page)',
				'default' => 'holder.js/627x330/auto',
				'multiple' => true
			),
		),
		'icon' => 'icons/portfolio.png',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_portfolio',
				'view' => 'views/portfolio-view',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
			'slider_port' => array(
				'shortcode' => 'electra_portfolio_slider',
				'view' => 'views/portfolio-slider',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
		)
	),
	'electra_events' => array(
		'name' => 'Event',
		'term' => 'Event',
		'term_plural' => 'Events',
		'order' => 'ASC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title', 'editor', 'excerpt'), 'taxonomies' => array(),'has_archive'=>true),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item cover',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'image_slider' => array(
				'type' => 'image',
				'description' => ' ',
				'title' => 'Project Image Slider (shown on the Single Portfolio Page)',
				'default' => 'holder.js/627x330/auto',
				'multiple' => true
			),
			'date_event' => array(
				'type' => 'date',
				'description' => ' ',
				'title' => 'Set the date when will start the event',
				'default' => '',
			),
		),
		'icon' => 'icons/portfolio.png',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_portfolio',
				'view' => 'views/events-view',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
			'slider_port' => array(
				'shortcode' => 'electra_portfolio_slider',
				'view' => 'views/portfolio-slider',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
			'related_items' => array(
				'view' => 'views/related-view',
			),
		)
	),
	'electra_gallery' => array(
		'name' => 'Gallery',
		'term' => 'Gallery',
		'term_plural' => 'Items in gallery',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=> array( 'title')),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Gallery item cover',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Gallery item full size',
				'title' => 'full size',
				'default' => 'holder.js/240x240/auto'
			),
		),
		'icon' => 'icons/portfolio.png',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_portfolio',
				'view' => 'views/gallery-view',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
			'slider_port' => array(
				'shortcode' => 'electra_portfolio_slider',
				'view' => 'views/portfolio-slider',
				'shortcode_defaults' => array(
					'no_more' => false,
					'default_view' => 'default'
				)
			),
		)
	),
	'electra_main' => array(
		'name' => 'Main Slider',
		'term' => 'slide',
		'term_plural' => 'slides',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_main_slider',
				'view' => 'views/main-slider-view',
				'shortcode_defaults' => array(
					'test' => false
				)
			)
		)
	),
	'electra_services' => array(
		'name' => 'Services',
		'term' => 'service',
		'term_plural' => 'services',
		'order' => 'ASC',
		'has_single' => true,
		'post_options' => array('supports'=>array('title','editor','thumbnail','excerpt')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(
			'icon' => array(
				'titile' => 'Service Icon',
				'description' => 'This icon is displayed in the [electra_services] shortcode.',
				'type' => 'image',
				'default' => 'holder.js/32x32/auto'
			),
			'related' => array(
				'titile' => 'Image for "Related Servies" section',
				'description' => 'This image is displayed in "Related Services" section on other services single page.',
				'type' => 'image',
				'default' => 'holder.js/219x218/auto'
			)
		),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_services',
				'view' => 'views/services-view',
				'shortcode_defaults' => array(
					'title' => 'our services',
					'nr' => 0,
					'no_links' => false
				)
			),
			'single' => array(
				'view' => 'views/services-single-view'
			)
		)
	),
	'electra_testimonials' => array(
		'name' => 'Testimonials',
		'term' => 'testimonial',
		'term_plural' => 'testimonials',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_testimonials',
				'view' => 'views/testimonials-view',
				'shortcode_defaults' => array(
					'title' => 'testimonials'
				)
			)
		)
	),
	'electra_skills' => array(
		'name' => 'Skills',
		'term' => 'skill',
		'term_plural' => 'skills',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_skills',
				'view' => 'views/skills-view',
				'shortcode_defaults' => array(
					'title' => 'our skills'
				)
			)
		)
	),
	'electra_clients' => array(
		'name' => 'Clients Slider',
		'term' => 'slide',
		'term_plural' => 'slides',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_clients_slider',
				'view' => 'views/clients-slider-view',
				'shortcode_defaults' => array(
					'title' => 'our clients'
				)
			)
		)
	),
	'electra_calendar' => array(
		'name' => 'Calendar',
		'term' => 'calendar',
		'term_plural' => 'calendar',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(
			'date_calendar' => array(
				'type' => 'date',
				'description' => ' ',
				'title' => 'Date for the calendar',
				'default' => '',
			),
		),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'view' => 'views/clients-slider-view',
			)
		)
	),
	'electra_toggle' => array(
		'name' => 'Toggle List',
		'term' => 'Toggle list item',
		'term_plural' => 'Toggle list items',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_toggle_list',
				'view' => 'views/toggle-list-view',
				'shortcode_defaults' => array(
					'title' => 'why choose us'
				)
			)
		)
	),
	'electra_team' => array(
		'name' => 'Team',
		'term' => 'team member',
		'term_plural' => 'team members',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'options' => array(
			'position' => array(
				'title' => 'Position',
				'description' => 'Enter the position of this team member.',
				'type' => 'line'
			),
			'social' => array(
				'title' => 'Social Icons',
				'description' => 'Add social icons for current team member.',
				'type' => array(
					'facebook' => array(
						'title' => 'Facebook',
						'description' => 'Set the full URL to the Facebook page.',
						'type' => 'line'
					),
					'twitter' => array(
						'title' => 'Twitter',
						'description' => 'Set the full URL to the Twitter page.',
						'type' => 'line'
					),
					'linkedin' => array(
						'title' => 'Linkedin',
						'description' => 'Set the full URL to the Linkedin page.',
						'type' => 'line'
					),
					'flickr' => array(
						'title' => 'Flickr',
						'description' => 'Set the full URL to the Flickr page.',
						'type' => 'line'
					),
					'googleplus' => array(
						'title' => 'Google+',
						'description' => 'Set the full URL to the Google+ page.',
						'type' => 'line'
					),
					'custom' => array(
						'title' => 'Custom icon',
						'description' => 'Set up an icon for a custom social platform.',
						'type' => array(
							'icon' => array(
								'title' => 'Icon',
								'description' => 'Set the icon for the social platform.',
								'type' => 'image',
								'default' => 'holder.js/20x20/auto/#fff:#000'
							),
							'url' => array(
								'title' => 'URL',
								'description' => 'Set the full URL to the custom social platform.',
								'type' => 'line'
							)
						)
					)
				),
				'group' => false,
				'multiple' => true
			)
		),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_team',
				'view' => 'views/team-view',
				'shortcode_defaults' => array(
					'title' => 'our team',
					'wide' => true,
					'background' => ''
				)
			)
		)
	),
	'electra_price' => array(
		'name' => 'Pricing Tables',
		'term' => 'Pricing table',
		'term_plural' => 'Pricing tables',
		'order' => 'ASC',
		'has_single' => false,
		'options' => array(
			'price' => array(
				'title' => 'Price',
				'description' => 'Set the price for current table.',
				'type' => 'line'
			),
			'link' => array(
				'title' => 'Link',
				'description' => 'Set the full URL for the buy button.',
				'type' => 'line'
			),
			'outlined' => array(
				'title' => 'Outline',
				'type' => 'checkbox',
				'label' => array('outlined'=>'Outline this table (make it stand out)')
			),
			'features' => array(
				'title' => 'Options',
				'description' => 'Add options for current table.',
				'type' => 'line',
				'multiple' => true
			)
		),
		'icon' => 'icons/portfolio.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'electra_pricing_tables',
				'view' => 'views/price-view',
				'shortcode_defaults' => array(
					'style' => '1',
					'size' => 4
				)
			)
		)
	)
);