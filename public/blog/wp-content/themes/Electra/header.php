<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <meta name="author" content="<?php $user = get_user_by('email',get_option( 'admin_email' ));
        echo $user->data->user_nicename;?>" />

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <!-- Mobile Specific Meta -->
        <?php
            $favicon = _go('favicon');
            if(empty($favicon))
                $favicon = get_template_directory_uri().'/images/favicon.ico';
            echo '<link rel="shortcut icon" type="image/x-icon" href="'.$favicon.'">';
        ?>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <?php wp_head(); ?>
    </head>
    <?php
    $tt_skin = strtolower(_go('site_skin'));
    $tt_layout = strtolower(_go('site_layout'));

    if(is_page()){

        $tt_page_skin = strtolower(tt_meta('page_skin'));
        $tt_page_layout = strtolower(tt_meta('page_layout'));

        $tt_skin = empty($tt_page_skin)||'default'===$tt_page_skin?$tt_skin:$tt_page_skin;
        $tt_layout = empty($tt_page_layout)||'default'===$tt_page_layout?$tt_layout:$tt_page_layout;

    }

    $tt_body_classes = array('electra_custom_background');
    if('boxed'===$tt_layout)
        array_push($tt_body_classes, 'boxed');
    ?>
    <body <?php body_class($tt_body_classes); ?>>
        <!-- ================================= END BLACK-WHITE VERSION === -->

        <!-- ================================= START CLASS FOR BOXED/FLUID -->
        <div class="boxed_fluid<?php if('dark'===$tt_skin) echo ' black_version'; ?>">
            <!-- ================================= START CLASS HEADER -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="span2">
                            <div class="logo">
                                <a href="<?php echo home_url(); ?>">
                                    <?php
                                        $logo = _go('logo_text');
                                        if(empty($logo)){
                                                $logo = _go('logo_image');
                                            if(empty($logo))
                                                $logo = get_template_directory_uri().'/images/elements/logo_silveiracamilo.jpg';
                                            echo '<img src="'.$logo.'" alt="site logo" />';
                                        }else{
                                            $text_color = _go('logo_text_color');
                                            if(empty($text_color))
                                                $text_color = '#22948f';
                                            echo '<div class="logo" style="margin-top:0;"><a href="'.home_url().'"><span style="line-height:43px;font-family:'._go('logo_text_font').';color:'.$text_color.';font-size:'._go('logo_text_size').'px;">'.$logo.'</span></a></div>';
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="span10">
                            <div class="menu">
                                <ul>
                                    <?php tt_menu('Main menu'); ?>
                                </ul>                            
                            </div>
                        </div> 
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- ================================= END CLASS HEADER -->

            <!-- ================================= START SITE CONTENT -->
            <div class="site_content">
                <?php if(tt_breadcrumb_switcher() != 1): ?>
                <div class="path">
                    <div class="container">
                        <h1>
                            <?php tt_title_breadcrumbs(); ?>
                            <?php tt_breadcrumb_img(); ?>
                        </h1>
                        <div class="path_line"><?php echo tt_breadcrumbs(); ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="container">