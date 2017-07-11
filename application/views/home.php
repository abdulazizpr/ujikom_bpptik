<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("<?php echo base_url();?>/assets/img/background.jpg");
    min-height: 90%;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button">CONTACT</a>
	<a href="<?php echo site_url();?>/login" class="w3-bar-item w3-button">LOGIN</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px;color:black;">Selamat Datang<br>DI WEBSITE E-BOOK</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px;color:black"><b>Selamat Datang<br>DI WEBSITE E-BOOK</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Lihat List Buku</a> <a href="<?php echo site_url();?>/pemesanan" class="w3-button w3-xxlarge w3-black">Lakukan Pemesanan</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">LIST BUKU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Popular</div>
      </a>
      <a href="#" >
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"></div>
      </a>
      <a href="#">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"></div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <?php foreach($buku as $row){ ?>
      <h1><b><?php echo $row->aap_judul_buku;?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo "Rp ".number_format($row->aap_harga,2,',','.'); ?></span></h1>
      <hr>
      <?php } ?>

    </div>

    <br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>E-book adalah singkatan dari Electronic Book atau buku elektronik. E-book tidak lain adalah sebuah bentuk buku yang dapat dibuka secara elektronis melalui komputer. E-book ini berupa file dengan format bermacam-macam,
ada yang berupa pdf (portable document format) yang dapat dibuka dengan program Acrobat Reader atau sejenisnya. Ada juga yang dengan bentuk format htm, yang dapat dibuka dengan browsing atau internet eksplorer secara offline. Ada juga yang berbentuk format exe.</p>
    
    
  </div>
</div>

<!-- Contact (with google maps) -->

<div id="contact" class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer  class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>&copy; Copyrights 2017. Abdul Aziz Priatna</p>
</footer>

<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
