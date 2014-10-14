<?php 
return array(
		'metaboxes'=>array(
			// array(
			//     'id'             => 'demo_meta_box',            // meta box id, unique per meta box
			//     'title'          => 'Simple Meta Box fields',   // meta box title
			//     'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			//     'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			//     'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			//     'priority'		 => 'low',						// order of meta box: high (default), low; optional
			//     'input_fields'   => array(            			// list of meta fields 
			//     	'text_test'=>array(
			//     		'name'=>'My Test',
			//     		'type'=>'text'
			//     		),
			//     	'textarea_test'=>array(
			//     		'name'=>'My Test 2',
			//     		'type'=>'textarea'
			//     		),
			//     	'taxonomy_test'=>array(
			//     		'name'=>"My Taxonomies",
			//     		'type'=>"taxonomy",
			//     		'taxonomy'=>'category'
			//     		)
			//     	)
			// 	),
			// array(
			//     'id'             => 'demo_meta_box2',          // meta box id, unique per meta box
			//     'title'          => 'Simple Meta Box fields2',          // meta box title
			//     'post_type'      => array('post'),      // post types, accept custom post types as well, default is array('post'); optional
			//     'priority'		 => 'low',
			//     'input_fields'   => array(            // list of meta fields 
			//     	'test_checkbox'=>array(
			//     		'name'=>'My Test3',
			//     		'type'=>'checkbox'
			//     		),
			//     	'test_radio'=>array(
			//     		'name'=>'My Test4',
			//     		'type'=>'radio',
			//     		'values'=>array(
			//     				'value1'=>'Value 1',
			//     				'value2'=>'Value 2',
			//     				'value3'=>'Value 3',
			//     				'value4'=>'Value 4'
			//     			),
			//     		'std'=>'value2'  //default value selected
			//     		),
			//     	'test_select'=>array(
			//     		'name'=>'My Test5',
			//     		'type'=>'select',
			//     		'values'=>array(
			//     				'value1'=>'Value 1',
			//     				'value2'=>'Value 2',
			//     				'value3'=>'Value 3',
			//     				'value4'=>'Value 4'
			//     			),
			//     		'std'=>'value3'  //default value selected
			//     		),
			//     	'test_image upload'=>array(
			//     		'name'=>'My Test6',
			//     		'type'=>'image'
			//     		),
			//     	'test_file_upload'=>array(
			//     		'name'=>'My Test6',
			//     		'type'=>'file'
			//     		)
			//     	)
			// 	),
			// array(
			//     'id'             => 'demo_meta_box3',          // meta box id, unique per meta box
			//     'title'          => 'Simple Meta Box fields3',          // meta box title
			//     'post_type'          => array('post'),
			//     'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			//     	'test_date'=>array(
			//     		'name'=>'Test Date',
			//     		'type'=>'date',
			//     		'group'=>'start'     //start horizontal group
			//     		),
			//     	'test_time'=>array(
			//     		'name'=>'Test Time',
			//     		'type'=>'time',
			//     		'group'=>'end'
			//     		)
			//     	)
			// 	),
			array(
			    'id'             => 'video_featured',          // meta box id, unique per meta box
			    'title'          => 'Featured Video Embed',         // meta box title
			    'post_type'      => array('post'),
			    'priority'		 => 'low',
			    'context'		=> 'side',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			    	'video_embed'=>array(
			    		'name'=>"Insert your embed code",
			    		'type'=>"textarea",
			    		)
			    	)
				),
			array(
			    'id'             => 'revolution_slider_alias',          // meta box id, unique per meta box
			    'title'          => 'Revolution Slider Alias',         // meta box title
			    'post_type'      => array('page'),
			    'priority'		 => 'low',
			    'context'		=> 'normal',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			    	'alias_slider'=>array(
			    		'name'=>"Provide the alias for slider to use",
			    		'type'=>"text",
			    		)
			    	)
			),
			array(
			    'id'             => 'blog_columns',          // meta box id, unique per meta box
			    'title'          => 'Blog options',         // meta box title
			    'post_type'      => array('page'),
			    'priority'		 => 'low',
			    'context'		=> 'normal',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			    	'blog_columns_num'=>array(
			    		'name'=>"Select more than one column for enable masonry for blog posts",
			    		'type'=>'select',
			    		'values'=>array(
			    				'1'=>'1 column',
			    				'2'=>'2 columns',
			    				'3'=>'3 columns',
			    				'4'=>'4 columns',
			    			),
			    		'std'=>'0'  //default value selected
		    		),
		    		'single_blog_opt'=>array(
			    		'name'=>"Disable sidebar from single post",
			    		'type'=>'checkbox',
		    		),
		    	)
			),
			array(
			    'id'             => 'use_breadcrumbs',          // meta box id, unique per meta box
			    'title'          => 'Page options',         // meta box title
			    'post_type'      => array('page'),
			    'priority'		 => 'low',
			    'context'		=> 'side',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
			    	'show_breadcrumbs'=>array(
			    		'name'=>"Disable breadcrumbs",
			    		'type'=>'checkbox',
		    		),
		    		'use_breadcrumbs_img'=>array(
			    		'name'=>"Icon in the breadcrumbs",
			    		'type'=>'select',
			    		'values'=>array(
			    				'0'=>'Select image',
			    				'path_full'=>'Full icon',
			    				'path_ls'=>'Left sidebar icon',
			    				'path_rs'=>'Right sidebar icon',
			    				'path_2c'=>'Two columns icon',
			    				'path_3c'=>'Three columns icon',
			    				'path_4c'=>'Four columns icon',
			    				'path_single'=>'Single icon',
			    			),
			    		'std'=>'0'  //default value selected
		    		),
		    		'custom_breadcrumbs_img'=>array(
			    		'name'=>'Or, use custom icon',
			    		'type'=>'image'
			    	),
			    	'page_sidebar'=>array(
			    		'name'=>"Sidebar option",
			    		'type'=>'select',
			    		'values'=>array(
			    				'0'=>'No sidebar',
			    				'12'=>'Right sidebar',
			    				'21'=>'Left sidebar'
			    			),
			    		'std'=>'0'  //default value selected
		    		),
		    		'page_skin'=>array(
			    		'name'=>"Change the skin of the page",
			    		'type'=>'select',
			    		'values'=>array(
			    				'default'=>'Default',
			    				'dark'=>'Dark',
			    				'light'=>'Light',
			    			),
			    		'std'=>'0'  //default value selected
		    		),
		    		'page_layout'=>array(
			    		'name'=>"Change page layout",
			    		'type'=>'select',
			    		'values'=>array(
			    				'default'=>'Default',
			    				'wide'=>'Wide',
			    				'boxed'=>'Boxed',
			    			),
			    		'std'=>'0'  //default value selected
		    		),
		    		'page_background'=>array(
			    		'name'=>"Set image for the background of page",
			    		'type'=>'image',
		    		),
		    	)
			),
			array(
			    'id'             => 'portfolio_settings',          // meta box id, unique per meta box
			    'title'          => 'Page Settings',         // meta box title
			    'post_type'      => array('page'),
			    'priority'		 => 'low',
			    'context'		=> 'normal',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
		    		'portfolio_view'=>array(
			    		'name'=>"Page template helper (setup a view for the page)",
			    		'type'=>'select',
			    		'values'=>array(
			    				'0'=>'Full',
			    				'2'=>'2 columns',
			    				'3'=>'3 columns',
			    				'4'=>'4 columns'
			    			),
			    		'std'=>'0'  //default value selected
		    		),
			    	'show_filters'=>array(
			    		'name'=>"Enable filters for this page",
			    		'type'=>'checkbox',
		    		),
		    		'portfolio_items_per_page'=>array(
			    		'name'=>'Set how many items view per page to enable pagination',
			    		'type'=>'number'
		    		),
		    	)
			),
			array(
			    'id'             => 'countdown_settings',          // meta box id, unique per meta box
			    'title'          => 'Countdown Settings',         // meta box title
			    'post_type'      => array('page'),
			    'priority'		 => 'low',
			    'context'		=> 'normal',
			    'input_fields'   => array(            // list of meta fields (can be added by field arrays)
		    		'countdown_title'=>array(
			    		'name'=>"Provide a title for the countdown",
			    		'type'=>"text",
		    		),
		    		'countdown_search'=>array(
			    		'name'=>"Hide search form for this page",
			    		'type'=>'checkbox',
		    		),
		    		'countdown_start'=>array(
			    		'name'=>'Start date',
			    		'type'=>'date',
			    		'group'=>'start'     //start horizontal group
		    		),
			    	'countdown_end'=>array(
			    		'name'=>'End date',
			    		'type'=>'date',
			    		'group'=>'end'
		    		),
		    	)
			),
		)
);