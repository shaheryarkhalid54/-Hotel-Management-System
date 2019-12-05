<?php

mysql_connect('localhost','arbaz','fizza') or die("mysql_error()");
mysql_select_db('fyp');
$output='';
$count=0;

if(isset($_POST['search'])){
	$searchq=$_POST['search'];
	//$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	$query=mysql_query("select name from rooms_khi where name like '%$searchq%' or description like '%$searchq%' ") or die ("could not search");
	$count=mysql_num_rows($query);
	
	
	if($_POST['search']=='')
	{
			header("location:index.php");
	}
	else{
		
	if($count==0)
	{
		$output='there was no result';
		
	}
	else{
		while($rows=mysql_fetch_assoc($query))
		{
			$name=$rows['name'];
			$output .='<div> '.$name.'</div>';
			
		}
		
	}	
	}
}
 
 ?>		   
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hotel Management System</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/mainstyle.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Mövenpick Hotel</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="about.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accom.html">Accomodation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.html">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li> 
		  </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url('http://wallperio.com/data/out/172/hotel-images_604382358.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Hotel View</h3>
            <p>Description for the about hotel.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ1A-XK5cjpFDFFtxnd4ngnd-0Y-AVtYZwjOeqLVoZ6GWrz8FLG')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Pool Side</h3>
            <p>Description for this facility.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://www.atriumhotels.gr/wp-content/uploads/2016/04/Spa-2_Hi-Res-1900x1080.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Spa</h3>
            <p>Description for this.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <div class="container">
  		   <form  method="post" action="index.php" style="float:right" >
			<input name="search" type="text" size="20" placeholder="search" maxlength="50"/>
			<input type="submit" name="Submit" value="Search" />		   
		   </form>
		   <?php print("$output");?>

			
   
    <h1 class="my-4">Welcome to Mövenpick Hotel</h1>
		


    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Islamabad</h4>
          <div class="card-body" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQacOlzgyg1yQK2mdQws4rMQIhaxYvjwoaGDZ_rAZ1wE8RNolLL'); opacity: 1; filter: alpha(opacity=50);">
            <p class="card-text"><br><br><br><br></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Karachi</h4>
          <div class="card-body"  style="background-image: url('https://cdn4.loyaltylobby.com/wp-content/uploads/2018/11/Conrad-Bengaluru-700x400.png'); opacity: 1; filter: alpha(opacity=50); " >
            <p class="card-text"><br><br><br><br></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Lahore</h4>
          <div class="card-body" style="background-image: url(' https://static.politico.com/dims4/default/84f3fb1/2147483647/resize/1160x%3E/quality/90/?url=https%3A%2F%2Fstatic.politico.com%2Fcapny%2Fsites%2Fdefault%2Ffiles%2Fa%20-%20opera%20house%20hotel_0.png'); opacity: 1; filter: alpha(opacity=50);">
            <p class="card-text"><br><br><br><br></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    </div>


    <h2>Hotel Facilities</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="data:image/jpeg;base64,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" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Hotel View</a>
            </h4>
            <p class="card-text">Elegant and state of the art</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://www.xfi-hotel.com/public/images/54c8867d43dc77.701016801422427773.700x400.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Banquet And Conferencing</a>
            </h4>
            <p class="card-text">Quite and professional</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://medias.bestwestern.fr/props_iceportal/83862/60568385_XL.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Gymnasium And Spa</a>
            </h4>
            <p class="card-text">Stay fit forever</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://img.traveltriangle.com/blog/wp-content/tr:w-700,h-400/uploads/2018/02/the-terrace.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Restaurants & cafe</a>
            </h4>
            <p class="card-text">Eat like never before</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://techcrunch.com/wp-content/uploads/2019/02/didi-chuxing2.jpg?w=700" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Transportation Facilities</a>
            </h4>
            <p class="card-text">Ride with a Guide</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 homebox">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://www.ominfosolutions.com/Content/Images/uploaded/blogposts/building-bydget-trust.JPG" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Loyalty Card</a>
            </h4>
            <p class="card-text">You're Important</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <h2>WHY US?</h2>
        <p>why choose us:</p>
        <ul>
          <li>
            <strong>Cheers</strong>
          </li>
          <li>Customer satifaction</li>
          <li>High in priority</li>
          <li>Never disappoint</li>
          <li>Our customers are like Family</li>
        </ul>
        <p>Hotels.com is a leading online accommodation site. We're passionate about travel. Every day we inspire and reach millions of travellers across 90 local websites in 41 languages. .</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="https://cdn.aohostels.com/img/footer/stammkunden_v1.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <div class="row mb-4">
      <div class="col-md-8">
        <p>Hotel.com is a leading online accommodation site. We're passionate about travel. Every day we inspire and reach millions of travellers across 90 local websites in 41 languages. So when it comes to booking the perfect hotel, vacation rental, resort, apartment, guest house or treehouse - we’ve got you covered. With hundreds of thousands of properties in over 200 countries and territories, we provide incomparable choice with a Price Guarantee. Our site is fun and simple to use and we offer innovative online tools and a top rated mobile app.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="bookingonline.html">BOOK HERE</a>
      </div>
    </div>

  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; ABCD 2019</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


		



