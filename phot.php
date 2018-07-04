 <?php include('server2.php') ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location: login.php");
  }
  
  $idea=$_SESSION['id'];

?>
<?php
  // Create database connection
  $dbs = mysqli_connect("localhost", "root", "", "registration");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($dbs, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text,id) VALUES ('$image', '$image_text','$idea')";
  	// execute query
  	mysqli_query($dbs, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($dbs, "SELECT * FROM images where id='$idea'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type="text/css" href="stylei.css">
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
 <div class="navbar">
  <a href="index.php">Home</a>
  <a href="index.php?logout='1'" >Logout</a>
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction1()">Create
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown1">
      <a href="create.php?ct=<?php echo "wantcreate"; ?>"> To-do list</a> 
      <a href="create.php?cn=<?php echo "wantcreate"; ?>" >Notes</a>
    </div>
  </div> 
</div>
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="phot.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
<script>


function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
   var myDropdown = document.getElementById("myDropdown2");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
}}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
    var myDropdown = document.getElementById("myDropdown1");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
}}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown1");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
      myDropdown = document.getElementById("myDropdown2");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}
</script>
</html>