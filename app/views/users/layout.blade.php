
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/31/2015
 * Time: 6:03 PM
 */
  <html lang="en">
 <head>
 	<meta charset= "UTF-8" >
 	<title>My Website</title>

 	<!-- CSS -->
 	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" >



 	<!-- js -->
 	<script src= "https://code.jquery.com/jquery.js" ></script>
 	<script src= "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

 </head>
 <body>
 	<header>
 		<nav class="navbar navbar-defualt" role="navigation">
 			<div class="navbar-header">
 				<ul class="nav navbar-nav">
 					<li><a href="./">Home</a></li>
 					<li><a href="./about">About</a></li>
 					<li><a href="./contact">Contact</a></li>
 				</ul>
 			</div>
 		</nav>
 	</header>
 	@yield('content')
 </body>
 </html>