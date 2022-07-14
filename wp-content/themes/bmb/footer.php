</main>

<?php
/* Inline script printed out in the footer */
add_action('wp_footer', 'tutsplus_add_script_wp_footer');
function tutsplus_add_script_wp_footer() {
    ?>
        <script>
            console.log("I'm an inline script tag added to the footer.");
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </script>
    <?php
}




