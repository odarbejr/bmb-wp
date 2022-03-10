<?php /* Template Name: createpage */ ?>
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
                    <div class="card-header bg-white"><h5>Add attributes</h5></div>
                    <div class="card-body">
                        <input type="hidden" name="id"  />
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="layer_name" class="col-form-label">Layer Name:</label>
                                    <input type="text" class="form-control" id="layer_name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <textarea class="form-control" id="description" placeholder="Description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="total_of_cave" class="col-form-label">Total of Cave:</label>
                                    <input type="number" class="form-control" id="total_of_cave" placeholder="Total cave">
                                </div>
                                <div class="mb-3">
                                    <label for="type_of_animal" class="col-form-label">Type of animal:</label>
                                    <select class="choices-multiple-remove-button form-control" id="type_of_animal" placeholder="Select " multiple>
                                        <option value="Paniki">Paniki</option>
                                        <option value="Bear">Bear</option>
                                        <option value="">Monkey</option>
                                        <option value="">Snike 3</option>
                                        <option value="">Dog 4</option>
                                        <option value="">Cat</option>
                                        <option value="">Alaconda</option>
                                        <option value="">Angular</option>
                                    </select>
                                </div>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label" for="total_of_male">Total of Male:</label>
                                        <div class="mb-3">
                                            <input type="number" name="total_of_male" id="total_of_male" class="form-control" min="0" placeholder="Enter total of male" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="total_of_female">Total of Female:</label>
                                        <div class="mb-3">
                                            <input type="number" name="total_of_female" id="total_of_female" class="form-control" min="0" placeholder="Enter total of female" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="overall_gender">Overall total of Gender:</label>
                                        <div class="mb-3">
                                            <input type="number" name="overall_gender" id="overall_gender" class="form-control" readonly />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="country" class="col-form-label">Country</label>
                                    <select name="country" class="countries form-control" id="countryId">
                                        <option value="">Select country</option>
                                    </select>
                                </div>
                                
                                <div class="">
                                    <label for="region" class="col-form-label">Region</label>
                                    <select name="region" class="region form-control" id="stateId">
                                        <option value="">Select region</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="col-form-label">City</label>    
                                    <select name="city" class="cities form-control" id="cityId">
                                        <option value="">Select city</option>
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
                            </div>
                        </div>
                        <div class="float-end">
                            <button id="btnSubmit" type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<script>
    // Add
    $('#btnSubmit').click(function () {

        // let idValue = $('#Id').val();
        let layer_name = $('#layer_name').val();
        let description = $('#description').val();
        let region = $('#stateId').val();
        let city = $('#cityId').val();
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

                alert('Data Saved Successfully.');
                window.location="<?php echo esc_url( home_url( '/' ) ) ?>";

                $('#layer_name').val("");
                $('#description').val("");
                $('#stateId').val("");
                $('#cityId').val("");
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
<script>
    $(function(){
        $('#total_of_male, #total_of_female').keyup(function(){
            var total_of_male = parseFloat($('#total_of_male').val()) || 0;
            var total_of_female = parseFloat($('#total_of_female').val()) || 0;
            $('#overall_gender').val(total_of_male + total_of_female);
        });
    });
</script>


