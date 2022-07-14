<?php
/* Template Name: fetch existing land use */
?>
<main id="content" role="main">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <?php get_header();?>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                <?php get_sidebar();?>
            </div>
            <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-8 pt-2">
                <div class="card border-0 p-2">
                    <div class="pt-3">
                        <a href='create-existing-land-use' class='btn btn-primary btn-sm'>+ Add Existing land use</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped ml-3 mr-2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>listing by type</th>
                                    <th>adjacent to cave</th>
                                    <th>above cave</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0" id="getData"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

    <script>
        $(document).ready(function () {
            excisting_land();
        });
        //Fetch 
        function excisting_land() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "http://127.0.0.1:8000/api/excisting_land_use/", success: function (result) {
                   
                    var totalCount = result;
                    var structureDiv = "";
                    for (let i = totalCount.length -1; i >= 0; i--) {
                        // console.log(i);
                        structureDiv += `<tr>
                            <td> ${result[i].id} </td>
                            <td> ${result[i].listing_by_type} </td>
                            <td> ${result[i].adjacent_to_cave} </td>
                            <td> ${result[i].above_cave} </td>
                            <td>
                                <a href='<?php echo esc_url( get_permalink() );?>update/.?data-id=${result[i].id}' class='btn btn-primary btn-sm m-1' data-toggle='tooltip' data-placement='bottom' title='update details'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <button class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\", deleteData(" ${result[i].id} "))'><i class='fa fa-trash' aria-hidden='true'></i></button>
                            </td>
                        </tr>`;
                    }
                    $("#getData").html(structureDiv); 
                }
            });
        }
    </script>
<?php get_footer();?>
  