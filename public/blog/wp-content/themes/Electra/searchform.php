<form role="search" method="get" id="searchform" class="search" action="<?php esc_url( home_url( '/' ) ) ?>">
    <input type="submit" value="" class="serach_button"/>
    <input type="text" name="s" id="s" value="<?php get_search_query(); ?>" placeholder="Search ..." class="search_line" />
</form>