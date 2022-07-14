<?php /* Template Name: updatepage */ ?>

<main id="content" role="main">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <?php get_header();?>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                <?php get_sidebar();?>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-8">
                <div class="row pt-3 pb-3">
                    <div class="card pb-3">
                        <div class="card-header bg-white pt-3"><h5>Update attributes</h5></div>
                        <div class="card-body">
                            <input type="hidden" name="id"  />
                            <div id="result"></div>
                            <input type="text" class="form-control" id="layer_name" name="layer_name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  


<script>

function edit(attribute){
    
    $.ajax({
        type: 'GET',
        dataType: 'json',
        // headers: {Authorization: 'Bearer '+token}
        url: "http://127.0.0.1:8000/api/Layers_attribute/", success: function (result) {

            $('#layer_name' + attribute)html($(layer_name)).val();

            // var row=document.getElementById(id);
            // console.log(result);
            // row.innerHTML=`<div>
            //     <td>${id} </td>
            //     <td>${layer_name} </td>
            //     <td>${description}</td> 
            // </div>`;
            //     document.getElementById("result").innerHTML = result;
        }
    }); 
}
</script>
<?php get_footer(); ?>