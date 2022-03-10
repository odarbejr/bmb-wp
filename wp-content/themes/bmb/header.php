<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>API</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script>
        $(document).ready(function(){

                var multipleCancelButton = new Choices('.choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount:5,
                searchResultLimit:5,
                renderChoiceLimit:5
            });
        });
    </script>

    <script>
        function ajaxCall() {
            this.send = function(data, url, method, success, type) {
                type = type||'json';
                var successRes = function(data) {
                    success(data);
                }

                var errorRes = function(e) {
                    console.log(e);
                    //alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
                    //jQuery('#loader').modal('hide');
                }
                jQuery.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: successRes,
                    error: errorRes,
                    dataType: type,
                    timeout: 60000
                });

            }

        }

        function locationInfo() {
            var rootUrl = "https://geodata.solutions/api/api.php";
            //now check for set values
            var addParams = '';
            if(jQuery("#gds_appid").length > 0) {
                addParams += '&appid=' + jQuery("#gds_appid").val();
            }
            if(jQuery("#gds_hash").length > 0) {
                addParams += '&hash=' + jQuery("#gds_hash").val();
            }

            var call = new ajaxCall();

            this.confCity = function(id) {
            //   console.log(id);
            //   console.log('started');
                var url = rootUrl+'?type=confCity&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + jQuery('#stateId option:selected').attr('stateid') + '&cityId=' + id;
                var method = "post";
                var data = {};
                call.send(data, url, method, function(data) {
                    if(data){
                        //    alert(data);
                    }
                    else{
                        //   alert('No data');
                    }
                });
            };


            this.getCities = function(id) {
                jQuery(".cities option:gt(0)").remove();
                //get additional fields
                var stateClasses = jQuery('#cityId').attr('class');

                var cC = stateClasses.split(" ");
                cC.shift();
                var addClasses = '';
                if(cC.length > 0)
                {
                    acC = cC.join();
                    addClasses = '&addClasses=' + encodeURIComponent(acC);
                }
                var url = rootUrl+'?type=getCities&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + id + addParams + addClasses;
                var method = "post";
                var data = {};
                jQuery('.cities').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.cities').find("option:eq(0)").html("Select City");
                    if(data.tp == 1){
                        var listlen = Object.keys(data['result']).length;

                        if(listlen > 0)
                        {
                            jQuery.each(data['result'], function(key, val) {

                                var option = jQuery('<option />');
                                option.attr('value', val).text(val);
                                jQuery('.cities').append(option);
                            });
                        }
                        else
                        {
                            var usestate = jQuery('#stateId option:selected').val();
                            var option = jQuery('<option />');
                            option.attr('value', usestate).text(usestate);
                            option.attr('selected', 'selected');
                            jQuery('.cities').append(option);
                        }

                        jQuery(".cities").prop("disabled",false);
                    }
                    else{
                        alert(data.msg);
                    }
                });
            };

            this.getStates = function(id) {
                jQuery(".region option:gt(0)").remove();
                jQuery(".cities option:gt(0)").remove();
                //get additional fields
                var stateClasses = jQuery('#stateId').attr('class');

                var cC = stateClasses.split(" ");
                cC.shift();
                var addClasses = '';
                if(cC.length > 0)
                {
                    acC = cC.join();
                    addClasses = '&addClasses=' + encodeURIComponent(acC);
                }
                var url = rootUrl+'?type=getStates&countryId=' + id + addParams  + addClasses;
                var method = "post";
                var data = {};
                jQuery('.region').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.region').find("option:eq(0)").html("Select State");
                    if(data.tp == 1){
                        jQuery.each(data['result'], function(key, val) {
                            var option = jQuery('<option />');
                            option.attr('value', val).text(val);
                            option.attr('stateid', key);
                            jQuery('.region').append(option);
                        });
                        jQuery(".region").prop("disabled",false);
                    }
                    else{
                        alert(data.msg);
                    }
                });
            };

            this.getCountries = function() {
                //get additional fields
                var countryClasses = jQuery('#countryId').attr('class');

                var cC = countryClasses.split(" ");
                cC.shift();
                var addClasses = '';
                if(cC.length > 0)
                {
                    acC = cC.join();
                    addClasses = '&addClasses=' + encodeURIComponent(acC);
                }

                var presel = false;
                var iip = 'N';
                jQuery.each(cC, function( index, value ) {
                    if (value.match("^presel-")) {
                        presel = value.substring(7);

                    }
                    if(value.match("^presel-byi"))
                    {
                        var iip = 'Y';
                    }
                });


                var url = rootUrl+'?type=getCountries' + addParams + addClasses;
                var method = "post";
                var data = {};
                jQuery('.countries').find("option:eq(0)").html("Please wait..");
                call.send(data, url, method, function(data) {
                    jQuery('.countries').find("option:eq(0)").html("Select Country");

                    if(data.tp == 1){
                        if(presel == 'byip')
                        {
                            presel = data['presel'];
                            console.log('2 presel is set as ' + presel);
                        }


                        if(jQuery.inArray("group-continents",cC) > -1)
                        {
                            var $select = jQuery('.countries');
                            console.log(data['result']);
                            jQuery.each(data['result'], function(i, optgroups) {
                                var $optgroup = jQuery("<optgroup>", {label: i});
                                if(optgroups.length > 0)
                                {
                                    $optgroup.appendTo($select);
                                }

                                jQuery.each(optgroups, function(groupName, options) {
                                    var coption = jQuery('<option />');
                                    coption.attr('value', options.name).text(options.name);
                                    coption.attr('countryid', options.id);
                                    if(presel) {
                                        if (presel.toUpperCase() == options.id) {
                                            coption.attr('selected', 'selected');
                                        }
                                    }
                                    coption.appendTo($optgroup);
                                });
                            });
                        }
                        else
                        {
                            jQuery.each(data['result'], function(key, val) {
                                var option = jQuery('<option />');
                                option.attr('value', val).text(val);
                                option.attr('countryid', key);
                                if(presel)
                                {
                                    if(presel.toUpperCase() ==  key)
                                    {
                                        option.attr('selected', 'selected');
                                    }
                                }
                                jQuery('.countries').append(option);
                            });
                        }
                        if(presel)
                        {
                            jQuery('.countries').trigger('change');
                        }
                        jQuery(".countries").prop("disabled",false);
                    }
                    else{
                        alert(data.msg);
                    }
                });
            };

        }

        jQuery(function() {
            var loc = new locationInfo();
            loc.getCountries();
            jQuery(".countries").on("change", function(ev) {
                var countryId = jQuery("option:selected", this).attr('countryid');
                if(countryId != ''){
                    loc.getStates(countryId);
                }
                else{
                    jQuery(".region option:gt(0)").remove();
                }
            });
            jQuery(".region").on("change", function(ev) {
                var stateId = jQuery("option:selected", this).attr('stateid');
                if(stateId != ''){
                    loc.getCities(stateId);
                }
                else{
                    jQuery(".cities option:gt(0)").remove();
                }
            });

            jQuery(".cities").on("change", function(ev) {
                var cityId = jQuery("option:selected", this).val();
                if(cityId != ''){
                    loc.confCity(cityId);
                }
            });
        });
    </script>

    <style>
        body {
            padding-top: 97px;
            background-color:#EDEDED;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        } 
        th{
            /* font-weight: normal; */
            border:none !important;
        }
        .sticky-offset {
            top: 97px;
        }

        #body-row {
            margin-left:0;
            margin-right:0;
        }
        #sidebar-container {
            min-height: 100vh;   
            background-color: #fff;
            /* background-color: #333; */
            padding: 0;
            border:none !important;
        }

        /* Sidebar sizes when expanded and expanded */
        .sidebar-expanded {
            width: 290px;
        }
        /* Menu item*/
        #sidebar-container .list-group a {
            height: 40px;
            color: white;
        }

        /* Submenu item*/
        #sidebar-container .list-group .sidebar-submenu a {
            height: 45px;
            padding-left: 30px;
        }
        .sidebar-submenu {
            font-size: 0.9rem;
        }

        /* Separators */
        .sidebar-separator-title {
            background-color: #fff;
            height: 35px;
            border:none !important;
        }
        .sidebar-separator {
            /* background-color: #333; */
            height: 25px;
        }
        .accordion-item{
            border-radius: none !important;
            background-color:#C1C1C1;
        }
        .accordion-button:not(.collapsed) {
            background-color: #DCDCDC;
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
            color:#000;
        }
        .accordion-button:focus {
            border-color: none !important;
        }

        .accordion-h{
            height: 35px;
        }
        .accordion-body{
            background-color: #F1F1F1;   
            border:none !important; 
        }
        .accordion-body a{
            font-size:1rem;
            text-decoration:none!important;
            color:#000;
        }
    </style>
</head>
