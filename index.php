
<html>

<head>
<title>Maker Park Radio</title>
<meta charset="utf-8">
<meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
<meta property="og:image"content="/sites/default/files/mprshows/mprlogo.png" />
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.49">
<script src="node_modules/jquery/dist/jquery.js"></script>

<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<link rel="stylesheet" href="includes/frontpg.css">

</head>

<?php include("includes/nav.inc.php"); ?>
<?php include("chat.inc.php"); ?>






<body style="background: #161616;" >


    <?php
      // Create connection
      $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

    $sql = "SELECT * FROM `mpr_live` ORDER BY `live_id` DESC LIMIT 1";

      $result = mysqli_query($conn, $sql);
      mysqli_close($conn);
      ?>

          <?php foreach ($result as $row):?>
          <?php $row['live_url'];?>
          <?php endforeach;?>

    <div class="tab">
      <button class="tablinks active" onclick="openCity(event, 'Paris')">Livestream</button>
      <button class="tablinks" onclick="openCity(event, 'Livestream')">Events</button>

    </div>

    <div id="Paris" class="tabcontent" style="display: block;">
      <div class="embed-responsive embed-responsive-16by9"><iframe allowfullscreen="true" autoplay="true" src="<?php echo $row['live_url'];?>"></iframe></div>
  </div>

  <div id="Livestream" class="tabcontent">
      <div class="embed-responsive embed-responsive-16by9"><iframe allowfullscreen="true" autoplay="true" src="https://livestream.com/accounts/25937168/events/8437304/player?&enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false"></iframe></div>
  </div>

    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<div class="container">
<center>  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick"><br>
  <input name="hosted_button_id" type="hidden" value="UCSBNCDQBKV6Q"><br>
  <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" type="image"><br>
</center>
</div>


      <!-- SnapWidget -->
      <div class="responsive container" style="display: block;">
        <!-- SnapWidget -->
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/520535" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style=" display:block; margin: 0 auto; border:none; width:100%; "></iframe>
      </div>

<div class="container" style="padding-top: 30px; padding-bottom: 30px; width: 75%; height: 50%;">

      <center>
      <!-- Begin MailChimp Signup Form -->
      <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> </link>

            <div class="wbackground"id="mc_embed_signup" style="border-radius: 25px;">
            <form action="https://nyc.us16.list-manage.com/subscribe/post?u=6338c9a8cce6df046dc5ff501&amp;id=d312a7841c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
            	<h2>Subscribe to our mailing list</h2>
              <label  for="mce-EMAIL">Email Address </label>
            <div class="form-group">
            	<input class="from-control" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
            <label style="float: left;" for="mce-FNAME">First Name </label>
            <div class="form-group">
            	<input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME">
            </div>
            <div class="form-group">
            	<label style="float: left;" for="mce-LNAME">Last Name </label>
            	<input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME">
            </div>
            	<div id="mce-responses" class="clear">
            		<div class="response" id="mce-error-response" style="display:none"></div>
            		<div class="response" id="mce-success-response" style="display:none"></div>
            	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6338c9a8cce6df046dc5ff501_d312a7841c" tabindex="-1" value=""></div>
                <div style="padding-bottom:10px;"class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary="></div>
                </div>
            </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

            <!--End mc_embed_signup-->
      </center>
    </div>


    <div class="container gcalendar">
    <center>  <iframe src="https://calendar.google.com/calendar/embed?showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=e13rd7dtkjr7ba0lr6t4178n4s%40group.calendar.google.com&amp;color=%23691426&amp;ctz=America%2FNew_York" style="border-width:0" width="100%" height="700px" frameborder="0" scrolling="no"></iframe> </center>
    </div>


<div class="sponsorslider container">
  <h2>Our  Sponsors</h2>
   <section class="customer-logos slider">
    <div class="slide"> <a href="https://www.makerspace.nyc/"> <img src="assets/mprsponsors/simakerspace.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="https://www.empressgreen.com/" ><img src="assets/mprsponsors/expressgreen.jpeg" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="https://5050store.com/" ><img src="assets/mprsponsors/5050.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="http://pesochin.video/" ><img src="assets/mprsponsors/gp-logo.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="https://projectivitygroup.org/" ><img src="assets/mprsponsors/projectivity.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="https://statenislandarts.org/" ><img src="assets/mprsponsors/sia.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a href="https://www.flagshipbrewery.nyc/" ><img src="assets/mprsponsors/flagship.png" alt="HTML tutorial"></a> </div>
    <div class="slide"> <a ><img src="assets/mprsponsors/sibeercompany.png" alt="HTML tutorial"></a> </div>
   </section>
     <h2 class="my-4 text-center text-white container">"This project was funded in part by an NYSCA Encore Grant"</h2>
</div>

<style>
h2{
  text-align:center;
  padding: 20px;
}
/* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    height: 20%;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 25%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    padding-left: 11px;
    width: 250px;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: #161616;
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #F5B64F;
    color: black;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
}
</style>



</style>

<script type="text/javascript">

$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});

</script>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="/assets/jquery.cycle2.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  </body>
</html>
