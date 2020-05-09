<?php
session_start();
$_SESSION['players'] = '';
?><!doctype unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body>
<div class="headingDiv">
	<marquee behavior="scroll" direction="right">RoadBlocks</marquee>
</div>
<div class="menu">
	<ul>
	 <li class="li0"><a class = "a1" ></a></li>
	  <li class="li1"><a class = "a1" class="active" href="index.php">HOME</a></li>
	  <li class="li2"><a class = "a2" href="about.php">ABOUT</a></li>
	  <li class="li3"><a class = "a5" href="milestone.php">GAME</a></li>
	</ul>
</div>
<div class="mainBodyDiv">
	<div class="mainContentDiv">
	</div>
</div>

<div class="mainContentDiv2">
  <h4>FOLLOW</h4>
	<a href="http://www.twitter.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/t.png"/>
	</a>

	<a href="http://www.facebook.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/f.png"/>
	</a>

	<a href="http://www.youtube.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/y.png"/>
	</a>

	<a href="http://www.pinterest.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/p.png"/>
	</a>
</div>


</body>
</html>
<?php
?>
