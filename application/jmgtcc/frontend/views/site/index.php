<script src="assets/1f536bbd/js/jquery-1.9.1.min.js"></script>
<script src="assets/1f536bbd/js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {    

        var options = {
            $AutoPlay: true,
            $SlideDuration: 500,
            $ArrowKeyNavigation: true,
            $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $ChanceToShow: 2,
                    $AutoCenter: 1,
                    $Steps: 1,
                    $Lanes: 1,
                    $SpacingX: 1,
                    $SpacingY: 1,
                    $Orientation: 1
                }        
        };
        var slideMain = new $JssorSlider$('slideMain', options);

    });
</script>


<?php
/* @var $this yii\web\View */
$this->title = 'JMGTCC';
?>
<div class="site-index">

    <div class="jumbotron">
            
        <center>
            <div id="slideMain">           
                <div class="slideDiv" u="slides">
                    <div><img class="slideImg" u="image" src="images/Slide/Hotel-Accommodation.jpeg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/City-Tour.jpg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/Street-Market-Shopping.jpg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/Museum-Tours.jpg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/Historical-Places.jpg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/Amusement-Park.jpg" /></div>
                    <div><img class="slideImg" u="image" src="images/Slide/Beaches-Summer-Tours.jpg" /></div>
                </div>

                <!-- BULLET NAVIGATOR -->
                <style>                   
                    .slideBullet div, .slideBullet div:hover, .slideBullet .av
                    {
                        background: url(images/Navigator/b06.png) no-repeat;
                        overflow:hidden;
                        cursor: pointer;
                    }
                    .slideBullet div { background-position: -6px -6px; 
                            margin-top: 640px;
                    }
                    .slideBullet div:hover, .slideBullet .av:hover { background-position: -36px -6px; }
                    .slideBullet .av { background-position: -66px -6px; }
                    .slideBullet .dn, .slideBullet .dn:hover { background-position: -96px -6px; }
                </style>
                <div u="navigator" class="slideBullet">
                    <div u="prototype" style="position: absolute; width: 18px; height: 18px; left: 0px; top: 0px;" class=""></div>
                    <div u="prototype" style="position: absolute; width: 18px; height: 18px; left: 19px; top: 0px;" class=""></div>
                    <div u="prototype" style="position: absolute; width: 18px; height: 18px; left: 38px; top: 0px;" class=""></div>
                    <div u="prototype" style="position: absolute; width: 18px; height: 18px; left: 57px; top: 0px;" class=""></div>
                </div>

            </div>
        </center>

        <br><br>

        <a href="#" title="Create a Travel Arrangement"><img class="servicesImg" src="images/customised-travel-arrangements-journeys.jpg" /></a>
        <a href="http://travelmall.ph/asia-travel-deals/philippine-tour-packages-and-prices" title="Choose a Tour Package" target="_blank">
                <img class="servicesImg" src="images/Philippine-tour-packages-journeys.jpg" /></a>
        <a href="#" title="Create an Appointment"><img class="servicesImg" src="images/Visa-assistance-sevices-journeys-home.jpg" /></a>

    </div>

    <div class="body-content">

        <div class="row">
            
            <div class="col-lg-9">
                <h3>Journeys & More Global Tours</h3>

                <p>
                    Journeys & More Global Tours and Consultancy Company (JMGTC) is a Philippine travel bureau engaged in the 
                    wholesale distribution of local and international package tours: hotels, transfers, city tours, theme park 
                    tickets and customized travel arrangement. It is the Hong Kong General Sales Agent (GSA) in the Philippines.
                    <br><br>
                    WE SPECIALIZE IN GROUP BOOKINGS INCLUSIVE OF COMPREHENSIVE TRAVEL ORIENTATION, AIRPORT ESCORT SERVICE AND FREE TRAVEL INSURANCE.
                    <br><br>
                    WE ARE THE COUNTRY’S REPUTABLE “METRO MANILA VISA ASSISTANCE CENTER” HANDLING ALL VISA DOCUMENTATION AND PROCESSING 
                    REQUIREMENTS FOR YOUR CONVENIENCE, SERVING TOP CORPORATIONS, GOVERNMENT AGENCIES, SHOWBUSINESS PERSONALITIES AND THE 
                    BUSINESS COMMUNITY.
                    <br><br>
                    WE ARE THE PHILIPPINES’ TRUSTED BOOKING PARTNER OF LAND ARRANGEMENT PACKAGES AROUND THE WORLD.
                    <br><br>
                    VISIT US AND ENJOY THE COMFORTS OF OUR OFFICE ENVIRONMENT AND EXPERIENCED TRAVEL STAFF!
                </p>
                
            </div>
            <div class="col-lg-3">
                <h3>Official Accounts</h3>
                <p>                    
                    <br><b>Website:</b><a href="http://journeysglobaltours.com/" target="_blank"> journeysglobaltours.com</a>
                    <br>                   
                    <a class="accountT" href="https://twitter.com/journeysandmore" target="_blank" title="@journeysandmore"><img src="images/Twitter-icon.png"></a>
                    <a class="accountF" href="https://www.facebook.com/journeysandmore" target="_blank" title="journeysandmore"><img src="images/Facebook-icon.png"></a>
                    
                  <br>
                    <script type="text/javascript" src="//rj.revolvermaps.com/0/0/6.js?i=9g9tn7v5zxe&amp;m=6&amp;s=220&amp;c=ff0000&amp;cr1=ffffff&amp;f=arial&amp;l=0" async="async"></script>  
                </p>
            </div>
        </div>

    </div>
</div>