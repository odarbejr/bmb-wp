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
                            <div id="id"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  


<script>

function edit(id){
    console.log(id);
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "http://127.0.0.1:8000/restApi/Layers_attribute/", success: function (result) {

            var row=document.getElementById(id);
            row.innerHTML=`<div>
                <td>${id} </td>
                <td>${layer_name} </td>
                <td>${description}</td> 
            </div>`;
                document.getElementById("id").innerHTML = result;
        }
    }); 
}
</script>
<?php get_footer(); ?>