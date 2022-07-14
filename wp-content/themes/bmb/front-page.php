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
                        <a href='create' class='btn btn-primary btn-sm'>+ Add layer attribute</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped ml-3 mr-2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Layer name</th>
                                    <th>Description</th>
                                    <th>Region</th>
                                    <th>City</th>
                                    <th>Barangay</th>
                                    <th>Total of cave</th>
                                    <th>Type of animal</th>
                                    <th>Total of male</th>
                                    <th>Total of female</th>
                                    <th>Overall gender</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <!-- <th>Remarks</th> -->
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
            Layers_attribute();
        });
        //Fetch 
        function Layers_attribute() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                // url: "http://34.80.33.52/api/v2/layers", success: function (result) {
                url: "http://127.0.0.1:8000/api/Layers_attribute/", success: function (result) {
                   
                    var totalCount = result;
                    var structureDiv = "";
                    for (let i = totalCount.length -1; i >= 0; i--) {
                        // console.log(i);
                        structureDiv += `<tr>
                            <td> ${result[i].id} </td>
                            <td> ${result[i].layer_name} </td>
                            <td> ${result[i].description} </td>
                            <td> ${result[i].region} </td>
                            <td> ${result[i].city} </td>
                            <td> ${result[i].barangay} </td>
                            <td> ${result[i].total_of_cave}  <span class='badge badge-secondary bg-info' style='font-size:0.6rem'>Cave</span></td>
                            <td> ${result[i].type_of_animal} </td>
                            <td> ${result[i].total_of_male} </td>
                            <td> ${result[i].total_of_female} </td>
                            <td> ${result[i].overall_gender} </td>
                            <td> ${result[i].size} </td>
                            <td> ${result[i].color} </td>
                            <td>
                                <a href='<?php echo esc_url( get_permalink() );?>view/.?data-id=${result[i].id}' class='btn btn-secondary btn-sm m-1' data-toggle='tooltip' data-placement='bottom' title='view details'><i class='fa fa-eye' aria-hidden='true'></i></a>
                                <a href='<?php echo esc_url( get_permalink() );?>update/.?data-id=${result[i].id}' class='btn btn-primary btn-sm m-1' data-toggle='tooltip' data-placement='bottom' title='update details'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <button class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\", deleteData(" ${result[i].id} "))'><i class='fa fa-trash' aria-hidden='true'></i></button>
                            </td>
                        </tr>`;
                    }
                    $("#getData").html(structureDiv); 
                }
            });
        }
        // delete
        function deleteData(id) {
            
            $.ajax({
                type: 'DELETE',
                dataType: 'json',

                url: "http://127.0.0.1:8000/api/Layers_attribute/"+id+"/",
                error: function (xhr, status, error) {

                    var err_msg = ''
                    for (var prop in xhr.responseJSON) {
                        err_msg += prop + ': ' + xhr.responseJSON[prop] + '\n';
                    }

                    alert(err_msg);
                },
                success: function (result) {
              
                    Layers_attribute();
                }
            });
        }
    </script>
    <?php get_footer();?>
