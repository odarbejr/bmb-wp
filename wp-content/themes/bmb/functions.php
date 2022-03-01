<?php


add_action('template_redirect', function() {
    if (is_single() && get_post_type(get_queried_object_id()) == 'sorteio')
            wp_redirect('edicao/?id=' . get_queried_object_id());
});