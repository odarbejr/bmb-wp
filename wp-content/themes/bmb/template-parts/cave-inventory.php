<?php
    /**
     * Template Name: Cave Inventory
     */
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
                    <div class="card-header bg-white pt-5 border-bottom-none"><h3>Cave Inventory Form</h3></div>
                    <div class="card-body">
                        <input type="hidden" name="id"  />
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="cname" class="col-form-label">Cave Name</label>
                                            <input type="text" class="form-control" id="cname" placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="region" class="col-form-label">Region</label>
                                            <select class="region form-control select-data" name="region" id="region"></select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="cave_name" class="col-form-label">Other Name of Cave</label>
                                            <input type="text" class="form-control" id="cave_name" placeholder="Type Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="province" class="col-form-label">Province</label>
                                            <select class="province form-control select-data" name="province" id="province"></select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="city" class="col-form-label">Municipality/City</label>
                                            <select class="city form-control select-data" name="city" id="city"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="barangay" class="col-form-label">Barangay</label>
                                            <select class="barangay form-control select-data" name="barangay" id="barangay"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="mb-3">
                                            <label for="sitio_purok" class="col-form-label">Sitio/Purok</label>
                                            <input type="text" class="form-control" id="sitio_purok" placeholder="Type Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="remark" class="col-form-label">Remarks</label>
                                            <textarea type="text" class="form-control" id="remark" style="height:150px" placeholder="Type here.."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12"></div>
                            <div class="col-12 float-end">
                                <button id="btnSubmit" type="submit" class="btn btn-secondary">Submit</button>
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
        let cname = $('#cname').val();
        let region = $('#region').val();
        let province = $('#province').val();
        let city = $('#city').val();
        let barangay = $('#barangay').val();
        let sitio_purok = $('#sitio_purok').val();
        let remark = $('#remark').val();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                // "id": id,
                "cname": cname,
                "region": region,
                "province": province,
                "city": city,
                "barangay": barangay,
                "sitio_purok": sitio_purok,
                "remark": remark
            },

            url: "http://127.0.0.1:8000/api/caveinventory/",
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

                $('#cname').val("");
                $('#region').val("");
                $('#province').val("");
                $('#city').val("");
                $('#barangay').val("");
                $('#sitio_purok').val("");
                $('#remark').val("");
            }
        });
    });

    // Select Region
        let dropdown = $('#region');

        dropdown.empty();

        dropdown.append('<option selected="true" disabled>Select</option>');
        dropdown.prop('selectedIndex', 0);

        const urlRegion = 'http://127.0.0.1:8000/api/region/';

        // Populate dropdown with list of type of animal
        $.getJSON(urlRegion, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
            })
        });

        // Select province
        let provinceList = $('#province');

        provinceList.empty();

        provinceList.append('<option selected="true" disabled>Select</option>');
        provinceList.prop('selectedIndex', 0);

        const urlProvince = 'http://127.0.0.1:8000/api/provinces/';

        // Populate provinceList with list of type of animal
        $.getJSON(urlProvince, function (dataProvince) {
            $.each(dataProvince, function (key, dbProvince) {
                provinceList.append($('<option value=""></option>').attr('value', dbProvince.abbreviation).text(dbProvince.name));
            })
        });

        // Select City
        let cityList = $('#city');

        cityList.empty();

        cityList.append('<option selected="true" disabled>Select</option>');
        cityList.prop('selectedCity', 0);

        const urlCity = 'http://127.0.0.1:8000/api/cities/';

        // Populate dropdown with list of type of city
        $.getJSON(urlCity, function (dataCity) {
            $.each(dataCity, function (key, dbCity) { 
                cityList.append($('<option></option>').attr('value', dbCity.variable).text(dbCity.name));
            })
        });

        // Select brgy
        let brgyList = $('#barangay');

        brgyList.empty();

        brgyList.append('<option selected="true" disabled>Select</option>');
        brgyList.prop('selectedBrgy', 0);

        const urlBrgy = 'http://127.0.0.1:8000/api/barangay/';

        // Populate dropdown with list of type of brgy
        $.getJSON(urlBrgy, function (dataBrgy) {
            $.each(dataBrgy, function (key, dbBrgy) { 
                brgyList.append($('<option></option>').attr('value', dbBrgy.variable).text(dbBrgy.name));
            })
    });



</script>

<script>
//     ( function( $, window, document, undefined ) {

// "use strict";

//     // defaults
//     var pluginName = "ph_locations",
//         defaults = {
//             location_type : "city", // what data this control supposed to display? regions, provinces, cities or barangays?,
//             api_base_url: 'https://ph-locations-api.buonzz.com/',
//             order: "name asc",
//             filter: {}
//         };

//     // plugin constructor
//     function Plugin ( element, options ) {
//         this.element = element;
//         this.settings = $.extend( {}, defaults, options );
//         this._defaults = defaults;
//         this._name = pluginName;
//         this.init();
//     }

//     // Avoid Plugin.prototype conflicts
//     $.extend( Plugin.prototype, {
//         init: function() {
//             return this
//         },
        
//         fetch_list: function (filter) {

//             this.settings.filter = filter;

//             $.ajax({
//                 type: "GET",
//                 url: this.settings.api_base_url + '/v1/' +  this.settings.location_type,
//                 success: this.onDataArrived.bind(this),
//                 data: $.param(this.map_parameters())
//             });

//         }, // fetch list
//         onDataArrived(data){
//             $(this.element).html(this.build_options(data));
//         },

//         map_parameters(){

//             var mapped_parameter = {"filter": {
//                 "where": {},
//                 "order" : this.settings.order
//                 }
//             };

//              for(var property in this.settings.filter)
//                 mapped_parameter.filter.where[property] = this.settings.filter[property];

//              return mapped_parameter;
//         },

//         build_options(params){
//             var shtml = "";

//             for(var i=0; i<params.data.length;i++){
//                 shtml += '<option value="' + params.data[i].id + '">';
//                 shtml +=  params.data[i].name ;
//                 shtml += '</option>';
//             }

//             return shtml
//         }
        
//     } );


//     $.fn[ pluginName ] = function( options, args ) {
//         return this.each( function() {
//             var $plugin = $.data( this, "plugin_" + pluginName );
//             if (!$plugin) {
//                 var pluginOptions = (typeof options === 'object') ? options : {};
//                 $plugin = $.data( this, "plugin_" + pluginName, new Plugin( this, pluginOptions ) );
//             }
            
//             if (typeof options === 'string') {
//                 if (typeof $plugin[options] === 'function') {
//                     if (typeof args !== 'object') args = [args];
//                     $plugin[options].apply($plugin, args);
//                 }
//             }
//         } );
//     };

// } )( jQuery, window, document );
</script>


        <script type="text/javascript">
            
            var my_handlers = {

                fill_provinces:  function(){

                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                    
                },

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#region').ph_locations('fetch_list');
            });
        </script> 