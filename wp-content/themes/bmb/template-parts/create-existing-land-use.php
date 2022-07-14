<?php
/* Template Name: create existing land use */
?>

<main id="content" role="main">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <?php get_header();?>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                <?php get_sidebar();?>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-8 pt-3">
                <div class="card pb-3">
                    <div class="card-header bg-white"><h5>Excisting lang use</h5></div>
                    <div class="card-body">
                        <input type="hidden" name="id"  />
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="listing_by_type" class="col-form-label">Listing by Type</label>
                                    <input type="text" class="form-control" id="listing_by_type" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="adjacent_to_cave" class="col-form-label">Adjacent to Cave:</label>
                                    <textarea class="form-control" id="adjacent_to_cave" placeholder="Type here.."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="above_cave" class="col-form-label">Above Cave:</label>
                                    <textarea class="form-control" id="above_cave" placeholder="Type here.."></textarea>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-12">
                                <button id="btnSubmit" type="submit" class="btn btn-primary" >Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<?php get_footer();?>

<script>
     // Add
     $('#btnSubmit').click(function () {

        // let idValue = $('#Id').val();
        let listing_by_type = $('#listing_by_type').val();
        let adjacent_to_cave = $('#adjacent_to_cave').val();
        let above_cave = $('#above_cave').val();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                // "id": idValue,
                // "id": id,
                "listing_by_type": listing_by_type,
                "adjacent_to_cave": adjacent_to_cave,
                "above_cave": above_cave
            },

            url: "http://127.0.0.1:8000/api/excisting_land_use/",
            error: function (xhr, status, error) {

                var err_msg = ''
                for (var prop in xhr.responseJSON) {
                    err_msg += prop + ': ' + xhr.responseJSON[prop] + '\n';
                }

                alert(err_msg);
            },
            success: function (result) {

                alert('Data Saved Successfully.');
                window.location="<?php echo esc_url( get_permalink() );?>fetch-existing-land-us/";

                $('#listing_by_type').val("");
                $('#adjacent_to_cave').val("");
                $('#above_cave').val("");
            }
        });
    });
</script>