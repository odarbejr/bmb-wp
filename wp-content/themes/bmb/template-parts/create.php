<main id="content" role="main">
    <div class="container"> 
        <div class="row">
          
            <div class="col-xl-2 col-lg-2 col-md-2 col-2"></div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-10">
                <div class="row pt-3 pb-3">
                    <div class="card pb-3">
                        <div class="card-header bg-white"><h4>Layer attribute</h4></div>
                        <div class="card-body">
                            <input type="hidden" name="id"  />
                            <div class="mb-3">
                                <label for="layer_name" class="col-form-label">Layer Name:</label>
                                <input type="text" class="form-control" id="layer_name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="description" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="region" class="col-form-label">Region:</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>select</option>
                                    <option value="NCR">NCR</option>
                                    <option value="2">Region I</option>
                                    <option value="3">Region II</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="col-form-label">City:</label>
                                <select class="form-select" id="city" aria-label="Default select example">
                                    <option selected>select</option>
                                    <option value="Adams">Adams</option>
                                    <option value="Bacarra">Bacarra </option>
                                    <option value="Quezon city">Quezon city</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="barangay" class="col-form-label">Barangay:</label>
                                <select class="form-select" id="barangay" aria-label="Default select example">
                                    <option selected>select</option>
                                    <option value="brgy 1">brgy 1</option>
                                    <option value="brgy 2">brgy21</option>
                                    <option value="brgy 3">brgy III</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="total_of_cave" class="col-form-label">Total of cave:</label>
                                <input type="number" class="form-control" id="total_of_cave" placeholder="Total cave">
                            </div>
                            <div class="mb-3">
                                <label for="type_of_animal" class="col-form-label">Type of animal:</label>
                                <!-- <input type="text" class="form-control" id="type_of_animal"> -->
                                <select class="choices-multiple-remove-button" id="type_of_animal" placeholder="Select " multiple>
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
                                <label for="total_of_male" class="col-form-label">Total of male:</label>
                                <input type="number" class="form-control" id="total_of_male" placeholder="Total male">
                            </div>
                            <div class="mb-3">
                                <label for="total_of_female" class="col-form-label">Total of female:</label>
                                <input type="number" class="form-control" id="total_of_female" placeholder="Total female">
                            </div>
                            <div class="mb-3">
                                <label for="overall_gender" class="col-form-label">Overall gender:</label>
                                <input type="number" class="form-control" id="overall_gender" placeholder="overall total gender">
                            </div>
                            <div class="mb-3">
                                <label for="size" class="col-form-label">Size:</label>
                                <select class="form-select" id="size" aria-label="Default select example">
                                    <option selected>select</option>
                                    <option value="L">Large</option>
                                    <option value="M">Medium</option>
                                    <option value="S">Small</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="col-form-label">Color:</label>
                                <input type="text" class="form-control" id="color" placeholder="Color">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="remarks" class="col-form-label">remarks:</label>
                                <textarea class="form-control" id="remarks"></textarea>
                            </div> -->
                            <div class="float-end">
                                <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
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
    // Add
    $('#btnSubmit').click(function () {

        // let idValue = $('#Id').val();
        let layer_name = $('#layer_name').val();
        let description = $('#description').val();
        let region = $('#region').val();
        let city = $('#city').val();
        let barangay = $('#barangay').val();
        let total_of_cave = $('#total_of_cave').val();
        let type_of_animal = $('#type_of_animal').val();
        let total_of_male = $('#total_of_male').val();
        let total_of_female = $('#total_of_female').val();
        let overall_gender = $('#overall_gender').val();
        let size = $('#size').val();
        let color = $('#color').val();
        // let remarks = $('#remarks').val();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                // "id": idValue,
                "layer_name": layer_name,
                "description": description,
                "region": region,
                "city": city,
                "barangay": barangay,
                "total_of_cave": total_of_cave,
                "type_of_animal": type_of_animal,
                "total_of_male": total_of_male,
                "total_of_female": total_of_female,
                "overall_gender": overall_gender,
                "size": size,
                "color": color
                // "remarks": remarks
            },

            url: "http://127.0.0.1:8000/restApi/Layers_attribute/",
            error: function (xhr, status, error) {

                var err_msg = ''
                for (var prop in xhr.responseJSON) {
                    err_msg += prop + ': ' + xhr.responseJSON[prop] + '\n';
                }

                alert(err_msg);
            },
            success: function (result) {
                
                Layers_attribute();
                alert('Data Saved Successfully.');
                window.location="<?php echo esc_url( home_url( '/' ) ) ?>";

                // $('#Id').val("");
                $('#layer_name').val("");
                $('#description').val("");
                $('#region').val("");
                $('#city').val("");
                $('#barangay').val("");
                $('#total_of_cave').val("");
                $('#type_of_animal').val("");
                $('#total_of_male').val("");
                $('#total_of_female').val("");
                $('#overall_gender').val("");
                $('#size').val("");
                $('#color').val("");
                // $('#remarks').val("");
            }
        });
    });
</script>
