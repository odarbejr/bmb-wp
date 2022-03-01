<main id="content" role="main">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <?php get_header();?>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-2">
                <!-- <ul>
                    <li><a href="Excisting-land-use.php">Excisting land use</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About</a></li>
                </ul> -->
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-10">
                <div>
                    <div class="row">
                        <div class="text-right pt-3">
                            <!-- <button type="button" class="btn btn-primary w-25 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add layers attribute</button> -->
                            <a href='create' class='btn btn-primary btn-sm m-1'>+ Add layer attribute</a>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog form-inline">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Layers Attribute</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id"  />
                                        <div class="mb-3">
                                            <label for="layer_name" class="col-form-label">layer name:</label>
                                            <input type="text" class="form-control" id="layer_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="region" class="col-form-label">region:</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>select</option>
                                                <option value="1">NCR</option>
                                                <option value="2">Region I</option>
                                                <option value="3">Region II</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="col-form-label">city:</label>
                                            <select class="form-select" id="city" aria-label="Default select example">
                                                <option selected>select</option>
                                                <option value="Adams">Adams</option>
                                                <option value="Bacarra">Bacarra </option>
                                                <option value="Quezon city">Quezon city</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="barangay" class="col-form-label">barangay:</label>
                                            <select class="form-select" id="barangay" aria-label="Default select example">
                                                <option selected>select</option>
                                                <option value="brgy 1">brgy 1</option>
                                                <option value="brgy 2">brgy21</option>
                                                <option value="brgy 3">brgy III</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_of_cave" class="col-form-label">total of cave:</label>
                                            <input type="number" class="form-control" id="total_of_cave">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type_of_animal" class="col-form-label">type of animal:</label>
                                            <!-- <input type="text" class="form-control" id="type_of_animal"> -->
                                            <select id="choices-multiple-remove-button" placeholder="Select " multiple>
                                                <option value="Paniki">Paniki</option>
                                                <option value="Bear">Bear</option>
                                                <option value="Monkey">Monkey</option>
                                                <option value="Snike 3">Snike 3</option>
                                                <option value="Dog 4">Dog 4</option>
                                                <option value="Cat">Cat</option>
                                                <option value="Alaconda">Alaconda</option>
                                                <option value="Angular">Angular</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_of_male" class="col-form-label">total of male:</label>
                                            <input type="number" class="form-control" id="total_of_male">
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_of_female" class="col-form-label">total of female:</label>
                                            <input type="number" class="form-control" id="total_of_female">
                                        </div>
                                        <div class="mb-3">
                                            <label for="overall_gender" class="col-form-label">Overall gender:</label>
                                            <input type="number" class="form-control" id="overall_gender">
                                        </div>
                                        <div class="mb-3">
                                            <label for="size" class="col-form-label">size:</label>
                                            <select class="form-select" id="size" aria-label="Default select example">
                                                <option selected>select</option>
                                                <option value="L">Large</option>
                                                <option value="M">Medium</option>
                                                <option value="S">Small</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="color" class="col-form-label">Color:</label>
                                            <input type="text" class="form-control" id="color">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="remarks" class="col-form-label">remarks:</label>
                                            <textarea class="form-control" id="remarks"></textarea>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Layer name</th>
                                <th>Description</th>
                                <th>Region</th>
                                <th>Barangay</th>
                                <th>City</th>
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
                        <tbody class="border-top-0" id="divBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
    <script>
            
       
        $(document).ready(function () {
            Layers_attribute();
        });
        // Add
        // $('#btnSubmit').click(function () {

            //     // let idValue = $('#Id').val();
            //     let layer_name = $('#layer_name').val();
            //     let description = $('#description').val();
            //     let region = $('#region').val();
            //     let city = $('#city').val();
            //     let barangay = $('#barangay').val();
            //     let total_of_cave = $('#total_of_cave').val();
            //     let type_of_animal = $('#type_of_animal').val();
            //     let total_of_male = $('#total_of_male').val();
            //     let total_of_female = $('#total_of_female').val();
            //     let overall_gender = $('#overall_gender').val();
            //     let size = $('#size').val();
            //     let color = $('#color').val();
            //     // let remarks = $('#remarks').val();

            //     $.ajax({
            //         type: 'POST',
            //         dataType: 'json',
            //         data: {
            //             // "id": idValue,
            //             "layer_name": layer_name,
            //             "description": description,
            //             "region": region,
            //             "city": city,
            //             "barangay": barangay,
            //             "total_of_cave": total_of_cave,
            //             "type_of_animal": type_of_animal,
            //             "total_of_male": total_of_male,
            //             "total_of_female": total_of_female,
            //             "overall_gender": overall_gender,
            //             "size": size,
            //             "color": color
            //             // "remarks": remarks
            //         },

            //         url: "http://127.0.0.1:8000/restApi/Layers_attribute/",
            //         error: function (xhr, status, error) {

            //             var err_msg = ''
            //             for (var prop in xhr.responseJSON) {
            //                 err_msg += prop + ': ' + xhr.responseJSON[prop] + '\n';
            //             }

            //             alert(err_msg);
            //         },
            //         success: function (result) {
                    
            //             Layers_attribute();
            //             alert('Data Saved Successfully.');

            //             // $('#Id').val("");
            //             $('#layer_name').val("");
            //             $('#description').val("");
            //             $('#region').val("");
            //             $('#city').val("");
            //             $('#barangay').val("");
            //             $('#total_of_cave').val("");
            //             $('#type_of_animal').val("");
            //             $('#total_of_male').val("");
            //             $('#total_of_female').val("");
            //             $('#overall_gender').val("");
            //             $('#size').val("");
            //             $('#color').val("");
            //             // $('#remarks').val("");
            //         }
            //     });
        // });
        //Fetch 
        function Layers_attribute() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "http://127.0.0.1:8000/restApi/Layers_attribute/", success: function (result) {
                   
                    var totalCount = result.length;
                    var structureDiv = "";
                    for (let i = 0; i < totalCount; i++) {
                        structureDiv += "<tr>" +
                            // "      <td>" + result[i].id + "</td>" +
                            "      <td>" + result[i].layer_name + "</td>" +
                            "      <td>" + result[i].description + "</td>" +
                            "      <td>" + result[i].region + "</td>" +
                            "      <td>" + result[i].city + "</td>" +
                            "      <td>" + result[i].barangay + "</td>" +
                            "      <td>" + result[i].total_of_cave + "</td>" +
                            "      <td>" + result[i].type_of_animal + "</td>" +
                            "      <td>" + result[i].total_of_male + "</td>" +
                            "      <td>" + result[i].total_of_female + "</td>" +
                            "      <td>" + result[i].overall_gender + "</td>" +
                            "      <td>" + result[i].size + "</td>" +
                            "      <td>" + result[i].color + "</td>" +
                            // "      <td>" + result[i].remarks + "</td>" +
                            "      <td>"+
                            "           <a href='update' class='btn btn-primary btn-sm m-1'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>"+
                            "           <button class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\",deleteData(" + result[i].id + "))'><i class='fa fa-trash' aria-hidden='true'></i></button>"+
                            "       </td>" +
                            "</tr>";
                    }
                    $("#divBody").html(structureDiv);
                }
            });

        }
        // delete
        function deleteData(id) {
            
            $.ajax({
                type: 'DELETE',
                dataType: 'json',

                url: "http://127.0.0.1:8000/restApi/Layers_attribute/"+id+"/",
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
