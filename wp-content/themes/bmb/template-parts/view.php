<?php
    /* Template Name: viewpage */
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
                    <div class="card-header bg-white"><h5>View attributes</h5></div>
                    <div class="card-body">
                        <input type="hidden" name="id"  />
                        <div id="getData"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<script>
        
    fetch("http://127.0.0.1:8000/restApi/Layers_attribute/")
    
    .then(response => response.json())
    .then(json => {

        let result = "";
        
        json.forEach(getData => {
            while (result < 1) {
                console.log(getData);
                result += `
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="layer_name" class="col-form-label">ID Number</label>
                            <div class="">${getData.id}</div>
                        </div>
                        <div class="mb-3">
                            <label for="layer_name" class="col-form-label">Layer Name:</label>
                            <div class="">${getData.layer_name}</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <div>${getData.description}</div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="">
                            <label for="region" class="col-form-label">Region</label>
                            <div>${getData.region}</div>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="col-form-label">City</label>    
                            <div>${getData.city}</div>
                        </div>
                    </div>
                </div>`;
            }
        });
        // Display result
        document.getElementById("getData").innerHTML = result;
    });
    
</script>


