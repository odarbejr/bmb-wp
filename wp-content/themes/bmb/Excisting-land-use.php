<div class="container-fluid"> 
    <div class="row">
        <div class="col-12">
            <?php get_header();?>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-2">
            <ul>
                <li><a href="Excisting-land-use.php">Excisting land use</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-10">
            <div>
                <h2>Add layers</h2><br>
                <div class="row">
                    <div class="form-inline">
                        <div class="form-group" style="margin-right: 20px;">
                            <label for="listing_by_type">listing by type: &nbsp;</label>
                            <input type="text" class="form-control" id="listing_by_type">
                        </div>
                        <div class="form-group" style="margin-right: 20px;">
                            <label for="adjacent_to_cave">Adjacent to cave: &nbsp;</label>
                            <input type="text" class="form-control" id="adjacent_to_cave">
                        </div>
                        <div class="form-group" style="margin-right: 20px;">
                            <label for="above_cave">Above cave: &nbsp;</label>
                            <input type="text" class="form-control" id="above_cave">
                        </div>
                        <br>
                        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <br><br>

                <h2>Excisting land use</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Listing by type</th>
                        <th>Adjacent to cave</th>
                        <th>Above cave</th>
                        <th>Action</th>
                    </tr>
                    <tbody id="divBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {
            Layers_attribute();
        });

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
                    "listing_by_type": listing_by_type,
                    "adjacent_to_cave": adjacent_to_cave,
                    "above_cave": above_cave
                },

                url: "http://127.0.0.1:8000/restApi/excisting_land_use/",
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

                    // $('#Id').val("");
                    $('#listing_by_type').val("");
                    $('#adjacent_to_cave').val("");
                    $('#above_cave').val("");
                }
            });
        });

        function Layers_attribute() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "http://127.0.0.1:8000/restApi/excisting_land_use/", success: function (result) {
                   
                    var totalCount = result.length;
                    var structureDiv = "";
                    for (let i = 0; i < totalCount; i++) {
                        structureDiv += "<tr>" +
                            // "     <td>" + result[i].id + "</td>" +
                            "      <td>" + result[i].listing_by_type + "</td>" +
                            "      <td>" + result[i].adjacent_to_cave + "</td>" +
                            "      <td>" + result[i].above_cave + "</td>" +
                            // "      <td>" + result[i].city + "</td>" +
                            // "      <td>" + result[i].barangay + "</td>" +
                            "      <td><button class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\",DeleteRow(" + result[i].id + "))'><i class='fa fa-trash' aria-hidden='true'></i></button></td>" +
                            "</tr>";
                    }

                    $("#divBody").html(structureDiv);
              
                }
            });

        }

        function DeleteRow(id) {
            
            $.ajax({
                type: 'DELETE',
                dataType: 'json',

                url: "http://127.0.0.1:8000/restApi/excisting_land_use/"+id+"/",
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
