<nav class="navbar navbar-expand-md navbar-dark bg-white fixed-top border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="http://staging1.beecr8tive.net/bmb-cwis/wp-content/themes/bmb-child/assets/img/nav-logo.png"  class="d-inline-block align-top" alt="">
        </a>
        <div class="d-flex">
            <div class="">Login</div>
        </div>
    </div>
</nav>
<!-- NavBar END -->

<!-- Sidebar -->
<div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
    <ul class="list-group sticky-top sticky-offset">
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MAIN MENU</small>
        </li>
        <!-- /END Separator -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item rounded-0 border-0" style="background-color: #C1C1C1;">
                <button class="accordion-button accordion-h" type="button" data-bs-toggle="collapse" data-bs-target="#ci" aria-expanded="true" aria-controls="ci">
                    Cave Inventory
                </button>
                <div id="ci" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- <php
                            //display primary menu
                            if(has_nav_menu('primary-menu')){
                                wp_nav_menu(array(
                                    'theme_location'=>'primary-menu',
                                    'container'=>'',
                                    'items_wrap'=>'<ul>%3$s</ul>'
                                ));
                            }
                        ?> -->
                        <ul>
                            <li class="border-bottom pb-2"><a href="http://localhost/bmb-wp/cave-inventory/" class="text-dark">New Inventory</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item rounded-0 border-0" style="background-color: #C1C1C1;">
                <button class="accordion-button accordion-h" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLayer" aria-expanded="true" aria-controls="collapseLayer">
                    LAYER
                </button>
                <div id="collapseLayer" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li class="border-bottom pb-2"><a href="home" class="text-dark">Attributes</a></li>
                            <li><a href="#" class="text-dark"><a href="http://localhost/bmb-wp/fetch-existing-land-us/" class="text-dark">Existing land Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- <div class="accordion-item rounded-0 border-0" style="background-color: #C1C1C1;">   
                <button class="accordion-button accordion-h" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMap" aria-expanded="true" aria-controls="collapseMap">
                    MAP
                </button>
                <div id="collapseMap" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li class="border-bottom"><a href="#" class="text-dark">Map layers</a></li>
                            <li><a href="#" class="text-dark">Maps</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    menu2
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    menu3
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   
                </div>
                </div>
            </div> -->
        </div>
    </ul>
    <!-- List Group END-->
</div>