<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */


  .affix {
      top: 0;
      width: 100%;
  }

  .affix:nth-child(1){
    top: 10%;
    width: 15%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }

  /*[class*="col-md-"]{
    z-index: -1 !important;
  }*/

  [class*="menuTop"] {
    z-index: 2 !important;
  }

  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
   #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
   #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
   #section4 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section5 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
  <script type="text/javascript">
    $(function(){

      $('.menuLateral').affix({offset: {top: 197} });
       $('body').scrollspy({target: "#aqui", offset: 50});

           // Add smooth scrolling on all links inside the navbar
      $("#aqui a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        }  // End if
      });

    });
  </script>
</head>

<body>

<div id="menu">
<div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
  <h1>Bootstrap Affix Example</h1>
  <h3>Fixed (sticky) navbar on scroll</h3>
  <p>Scroll this page to see how the navbar behaves with data-spy="affix".</p>
  <p>The navbar is attached to the top of the page after you have scrolled a specified amount of pixels.</p>
</div>

<nav class="navbar navbar-inverse menuTop" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Basic Topnav</a></li>
    <li><a href="#">Page 1</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
  </ul>
</nav>
</div>




<div class="container-fluid" id="contenido">
  <div class="row">
    <div class="col-md-2">
      <nav id="aqui">

      <ul class="nav nav-pills nav-stacked menuLateral">
        <li class="active"><a href="#section1">Section1</a></li>
        <li><a href="#section2">Section 2</a></li>
        <li><a href="#section3">Section 3</a></li>
        <li><a href="#section4">Section 4</a></li>
        <li><a href="#section5">Section 5</a></li>
      </ul>
    </nav>
    </div>
    <div class="col-md-10" >
      <div id="section1" class="container-fluid">
        <h1>Section 1</h1>
        <p>Click on the different Section links in the navbar to see the smooth scrolling effect.</p>
      </div>
      <div id="section2" class="container-fluid">
        <h1>Section 2</h1>
        <p>Click on the different Section links in the navbar to see the smooth scrolling effect.</p>
      </div>
      <div id="section3" class="container-fluid">
        <h1>Section 3</h1>
        <p>Click on the different Section links in the navbar to see the smooth scrolling effect.</p>
      </div>
      <div id="section4" class="container-fluid">
        <h1>Section 4</h1>
        <p>Click on the different Section links in the navbar to see the smooth scrolling effect.</p>
      </div>
      <div id="section5" class="container-fluid">
        <h1>Section 5</h1>
        <p>Click on the different Section links in the navbar to see the smooth scrolling effect.</p>
      </div>
    </div>
    <div class="clearfix visible-lg"></div>
  </div>
</div>

</body>
</html>
