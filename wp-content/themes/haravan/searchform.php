<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form role="search" method="get" class="search-form wanda-mxm-search" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-inner">

        <input type="search" class="searchinput input-search search-input search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'haravan'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </div>
    <button type="submit" class="btn-search" id="search-header-btn"
            aria-label="Tìm kiếm">
        <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/searcg-icon.svg?v=51"
             alt="Tìm kiếm">
    </button>
</form>


