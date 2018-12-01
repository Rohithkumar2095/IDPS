<?php

require_once('NBC.php');

?><HTML><HEAD>  <link rel="stylesheet" href="css/style.css">
</HEAD>


<body bgcolor="#182C61">
<center> <img src="1159960267-health-logo.png"  alt="" width="101" height="100"/><h1 style="color:#FFF;">intelligent Disease Prediction system</h1><h3 style="color:#FFF;">Be Your Own Doctor</h3></center>
	 <h3> 
	 <!-- <a href="feedback.php" class="bt">Feedback</a>
 	 <a href="" class="bt">View Doctor</a>  -->
     <a href="../index.php" class="bt">login</a></h3>
	 <br>
	 <div  class="mybox" >
		 <div class="wrap input"><center>
      	  <h3 style="color: #fff; font-style: italic">Enter your symptoms seperated by comma</h3><br/><br/>
	
		  <FORM action="index.php" method="get" style="height: 90px;">
		<INPUT name="sympt" type="text"  size="70" style="height: 40px;border-radius: 5px;"<?php
	if(!empty($_GET['sympt']))
		{echo 'value="'.$_GET['sympt'].'"';
}else
echo 'please enter atleast symptopms';?> > <br/><br>
<input type="submit" value=" Submit" style="margin-top:15px;padding: 8px 30px;border-top-width: 2px;">
</FORM>
</center><br>
<div class="holder">
<?php $nbc = new NBC();

if(!empty($_GET['sympt'])){
$nbc->train(new FileDataSource('datasets/chickengunea.txt'), 'Chickungunya');
$nbc->train(new FileDataSource('datasets/gastic.txt'), 'Gastric');
$nbc->train(new FileDataSource('datasets/jaundice.txt'), 'Jaundice');
$nbc->train(new FileDataSource('datasets/cholera.txt'), 'Cholera');
$nbc->train(new FileDataSource('datasets/dengue.txt'), 'Dengue');
$nbc->train(new FileDataSource('datasets/hyperthyroidism.txt'), 'Hyperthyroid');
$nbc->train(new FileDataSource('datasets/goiter.txt'), 'Goiter');
$nbc->train(new FileDataSource('datasets/maleria.txt'), 'Maleria');
 ; 
$result= $nbc->classify($_GET['sympt']); 
//For plotting Graph
 $flag=true;$max=1;  
foreach ($result as $key => $value)
		{
			if($flag){$max=$value;$per=100;$flag=false;}else{$per=($value/$max)*100;}
		
		

			
		
		echo ' <div class="bar cf" data-percent="'.$per.'%"><span class="label">'.$key.'</span></div>';
		 }
}

?>

</div></div></div>
<div class="mapouter"><div class="gmap_canvas"><iframe width="1440" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=hospitals%20in%20bangalore&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1440px;}</style></div>
<p>
  <script src='js/jquery.min.js'></script>
  
  <script src="js/index.js"></script>
  
</p>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body></HTML>