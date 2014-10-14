<?php

return array(
        'favico' => array(
                'dir' => '/theme_config/icons/electra.png'
        ),
        'option_saved_text' => 'Options successfully saved',
        'tabs' => array(
                array(
                        'title'=>'General Options',
                        'icon'=>1,
                        'boxes' => array(
                                'Logo Customization' => array(
                                        'icon'=>'customization',
                                        'size'=>'2_3',
                                        'columns'=>true,
                                        'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
                                        'input_fields' => array(
                                                'Logo As Image'=>array(
                                                        'size'=>'half',
                                                        'id'=>'logo_image',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can insert your link to a image logo or upload a new logo image.'
                                                ),
                                                'Logo As Text'=>array(
                                                        'size'=>'half_last',
                                                        'id'=>'logo_text',
                                                        'type'=>'text',
                                                        'note' => "Type the logo text here, then select a color, set a size and font",
                                                        'color_changer'=>true,
                                                        'font_changer'=>true,
                                                        'font_size_changer'=>array(1,10, 'em'),
                                                        'font_preview'=>array(true, true)
                                                )
                                        )
                                ),
                                'Favicon' => array(
                                        'icon'=>'customization',
                                        'size'=>'1_3_last',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'favicon',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can upload the favicon icon.'
                                                )
                                        )
                                ),
                                'Custom CSS' => array(
                                        'icon'=>'css',
                                        'size'=>'1_3_last',
                                        'description'=>'Here you can write your personal CSS for customizing the classes you choose to modify.',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'custom_css',
                                                        'type'=>'textarea'
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Appearance',
                        'icon'=>4,
                        'boxes' => array(
                                'Color & Layout'=>array(
                                        'icon'=>'background',
                                        'columns'=>true,
                                        'size' => '1',
                                        'input_fields' => array(
                                                'Site Color' => array(
                                                        'size'=>'3',
                                                        'id'=>'site_color',
                                                        'type'=>'colorpicker'
                                                ),
                                                'Site Skin'=>array(
                                                        'size'=>'3',
                                                        'id'=>'site_skin',
                                                        'type' => 'radio',
                                                        'values' => array('Light','Dark'),
                                                        'list' => true
                                                ),
                                                'Site Layout' => array(
                                                        'size'=>'3_last',
                                                        'id'=>'site_layout',
                                                        'type' => 'radio',
                                                        'values' => array('Wide','Boxed'),
                                                        'list' => true
                                                )
                                        )
                                ),
                                'Background Customization'=>array(
                                        'icon'=>'background',
                                        'columns'=>true,
                                        'size' => '1',
                                        'input_fields' => array(
                                                'Background Color'=>array(
                                                        'size'=>'3',
                                                        'id'=>'bg_color',
                                                        'type'=>'colorpicker'
                                                ),
                                                'Background Image' => array(
                                                        'size'=>'3',
                                                        'id'=>'bg_image',
                                                        'type'=>'image_upload'
                                                ),
                                                'Position' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_position',
                                                        'type' => 'radio',
                                                        'values' => array('Left','Center','Right')
                                                ),
                                                'Repeat' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_repeat',
                                                        'type' => 'radio',
                                                        'values' => array('bitch'=>'No Repeat','Tile','Tile Horizontally','Tile Vertically')
                                                ),
                                                'Attachment' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_attachment',
                                                        'type' => 'radio',
                                                        'values' => array('Scroll','Fixed')
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'SEO and Socials',
                        'icon'=>2,
                        'boxes'=>array(
                                'ShareThis feature'=>array(
                                        'icon'=>'social',
                                        'description'=>"To use this service please select your favorite social networks",
                                        'size'=>'3',
                                        'input_fields'=>array(
                                                array(
                                                        'type'  => 'select',
                                                        'id'    => 'share_this',
                                                        'label' => 'Facebbok',
                                                        'class'  => 'social_search',
                                                        'multiple' => true,
                                                        'options'=>array('Google'=>'google','Facebook'=>'Facebook','Twitter'=>'Twitter','Pinterest'=>'Pinterest')
                                                )
                                        )
                                ),
                                'Social Platforms'=>array(
                                        'icon'=>'social',
                                        'description'=>"Insert the link to the social share page.",
                                        'size'=>'3',
                                        'columns'=>true,
                                        'input_fields'=>array(
                                                array(
                                                        'id'=>'social_platforms',
                                                        'size'=>'half',
                                                        'type'=>'social_platforms',
                                                        'platforms'=>array('facebook','twitter','linkedin','rss','pinterest','flickr','google')
                                                )
                                        )
                                ),
                                'Tracking Code' => array(
                                        'icon'=>'track',
                                        'size'=>'3_last',
                                        'input_fields'=>array(
                                                array(
                                                        'type'=>'textarea',
                                                        'id'=>'tracking_code'
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Additional Options',
                        'icon'  => 6,
                        'boxes' => array(
                                '404 page settings'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Setup your 404 page",
                                        'size'=>'1_3',
                                        'columns'=>false,
                                        'input_fields' =>array(
                                                'Page title' => array(
                                                        'id'    => '404_title',
                                                        'type'  => 'text',
                                                        'note' => 'this is the title of the 404 page',
                                                        'size' => 'full'
                                                ),
                                                'Error image' => array(
                                                        'id'    => '404_img',
                                                        'type'  => 'image_upload',
                                                        'note' => 'This is the image used on 404 page',
                                                        'size' => 'full'
                                                ),
                                                'Message' => array(
                                                        'id'    => '404_mess',
                                                        'type'  => 'textarea',
                                                        'note' => 'This message will appear on 404 page',
                                                        'size' => 'full'
                                                )
                                        )
                                ),
                                'Twitter Settings'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Used by the Twitter Widget",
                                        'size'=>'1_3',
                                        'columns'=>false,
                                        'input_fields' =>array(
                                                'Consumer Key' => array(
                                                        'id'    => 'twitter_consumerkey',
                                                        'type'  => 'text',
                                                        'size' => '1'
                                                ),
                                                'Consumer Secret' => array(
                                                        'id'    => 'twitter_consumersecret',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                ),
                                                'Access Token' => array(
                                                        'id'    => 'twitter_accesstoken',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                ),
                                                'Access Toekn Secret' => array(
                                                        'id'    => 'twitter_accesstokensecret',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Contact Info',
                        'icon'  => 5,
                        'boxes' => array(
                                'Contact info'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Provide contact information. This information will appear in contact template. For more informations read documentation.",
                                        'size'=>'2_3',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                                'Map title' => array(
                                                        'id'    => 'map_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a title for the map',
                                                        'size' => '1',
                                                        'placeholder' => 'The title'
                                                ),
                                                'Map' => array(
                                                        'id'    => 'contact_map',
                                                        'type'  => 'map',
                                                        'note' => 'Here you can insert iframe with your location. For more information you can find in theme\'s documentation' ,
                                                        'size' => '1',
                                                        'icons' => array('google-marker.gif','home.png','home_1.png','home_2.png','administration.png','office-building.png')
                                                ),
                                                'Contact form' => array(
                                                        'id'    => 'contact_form',
                                                        'type'  => 'checkbox',
                                                        'label' => 'Enable contact form',
                                                        'size' => '1',
                                                        'action' => array('show',array('email_contact'))
                                                ),
                                                array(
                                                        'id'    => 'contact_form_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a title for contact form',
                                                        'size' => '1',
                                                        'placeholder' => 'The title'
                                                ),
                                                array(
                                                        'id'    => 'contact_form_intro',
                                                        'type'  => 'textarea',
                                                        'note' => 'If is needed, provide a intro for the form',
                                                        'size' => '1',
                                                        'placeholder' => ''
                                                ),
                                                 array(
                                                        'id'    => 'email_contact',
                                                        'type'  => 'text',
                                                        'note' => 'Provide an email, used to recive messages from Contact Form (required)',
                                                        'size' => '1',
                                                        'placeholder' => 'Contact Form Email'
                                                ),
                                                'Contact address' => array(
                                                        'id'    => 'contact_info_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a title for contact info area',
                                                        'size' => '1'
                                                ),
                                                array(
                                                        'id'    => 'contact_address',
                                                        'type'  => 'textarea',
                                                        'note' => 'Provide your address',
                                                        'size' => '1'
                                                ),
                                               array(
                                                        'id'    => 'contact_phone',
                                                        'type'  => 'text',
                                                        'note' => 'Provide your phone number',
                                                        'size' => '1',
                                                        'placeholder' => 'Phone number'
                                                ),
                                                array(
                                                        'id'    => 'contact_fax',
                                                        'type'  => 'text',
                                                        'note' => 'Provide your fax number',
                                                        'size' => '1',
                                                        'placeholder' => 'Fax number'
                                                ),
                                        )
                                )

                        )
                ),
                array(
                        'title' => 'Start a project settings',
                        'icon'  => 1,
                        'boxes' => array(
                                'Start a project form'=>array(
                                        'icon' => 'customization',
                                        'description'=>"",
                                        'size'=>'1',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                                'Title for the form' => array(
                                                        'id'    => 'custom_form_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a title for the form',
                                                        'size' => '1',
                                                        'placeholder' => 'The title'
                                                ),
                                                'Email to send the form' => array(
                                                        'id'    => 'custom_form_email',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a e-mail to setup for sending the form',
                                                        'size' => '1_3',
                                                        'placeholder' => 'E-mail'
                                                ),
                                                'Before submit form message' => array(
                                                        'id'    => 'custom_form_info',
                                                        'type'  => 'text',
                                                        'note' => 'Provide info before submiting the form',
                                                        'size' => '1_3',
                                                        'placeholder' => 'Info'
                                                ),
                                                'Submit button text' => array(
                                                        'id'    => 'custom_form_button',
                                                        'type'  => 'text',
                                                        'note' => 'Provide name for the submit button',
                                                        'size' => '1_3_last',
                                                        'placeholder' => 'The title'
                                                )
                                        )
                                ),
                                'Form builder'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Our builder is great tool to manage the form for \" Start a project \".",
                                        'size'=>'1',
                                        'columns'=>true,
                                        'repeater' => 'Add fields',
                                        'input_fields' =>array(
                                                array(
                                                        'id'    => 'custom_input_label',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a label for the field',
                                                        'size' => '1_3',
                                                        'placeholder' => 'Label for the field'
                                                ),
                                                array(
                                                         'id'    => 'custom_input_type',
                                                        'type'  => 'select',
                                                        'note' => 'Select type of the field',
                                                        'multiple'  => false,
                                                        'size' => '1_3',
                                                        'options'=>array(
                                                                    'Text'        =>'text',
                                                                    'E-mail'       =>'email',
                                                                    'Select'      =>'select',
                                                                    'Textarea'     =>'textarea',
                                                                )
                                                ),
                                                array(
                                                        'id'    => 'custom_input_size',
                                                        'type'  => 'select',
                                                        'note' => 'Select size of the field',
                                                        'multiple'  => false,
                                                        'size' => '1_3_last',
                                                        'options'=>array(
                                                                    'Full size'        =>'12',
                                                                    'Half size'       =>'6',
                                                                )
                                                ),
                                                array(
                                                        'id'    => 'custom_form_value',
                                                        'type'  => 'textarea',
                                                        'note' => 'Provide a value for the field (for select the values must be separated by " , ")',
                                                        'size' => '2_3',
                                                        'placeholder' => 'The title'
                                                ),
                                                array(
                                                        'id'    => 'custom_form_placeholder',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a placeholder for the form',
                                                        'size' => '1_3_last',
                                                        'placeholder' => 'The placeholder'
                                                ),
                                                array(
                                                        'id'    => 'custom_input_position',
                                                        'type'  => 'select',
                                                        'note' => 'Position of the field',
                                                        'multiple'  => false,
                                                        'size' => '1_3_last',
                                                        'options'=>array(
                                                                    'Left'   =>'1',
                                                                    'Right'  =>'2',
                                                                )
                                                )
                                        )
                                )

                        )
                ),
                array(
                        'title' => 'Subscription',
                        'icon'  => 7,
                        'boxes' => array(
                                'Configurations'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Configure the subscription field below.",
                                        'size'=>'half',
                                        'input_fields' =>array(
                                                'Subscription Field'=>array(
                                                        'type'=>'text',
                                                        'id'=>'subscription_title',
                                                        'placeholder'=>'SUBSCRIBE TO NEWSLETTER',
                                                        'note'=>'Insert title for subscription field here.'
                                                ),
                                                array(
                                                        'type'=>'text',
                                                        'id'=>'subscription_placeholder',
                                                        'note'=>'Insert placeholder for subscription field here',
                                                        'placeholder'=>'Enter your e-mail address'
                                                )
                                        )
                                ),
                                'Subscribers'=>array(
                                        'icon' => 'social',
                                        'description'=>'First 20 subscribers are listed here. To get the full list export files using buttons below:',
                                        'size'=>'half_last',
                                        'input_fields' => array(
                                                array(
                                                        'type'=>'subscription',
                                                        'id'=>'subscription_list'
                                                )
                                        )
                                )
                        )
                )
        ),
        'styles' => array( array('wp-color-picker'),'style','select2' )
        ,
        'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);