
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
 include('server2.php');
 // $db = mysqli_connect('localhost', 'root', '', 'registration');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="stylei.css">
</head>
<body>

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

<br>
<?php
if (isset($_GET['ct'])) {
echo '
<form method="post" action="create.php">
<input  type="text"  class="inp" placeholder="Title..." style="border:solid;" name="sct">
<button type="submit" class="addBtn" name="sctb">Create</button>
</form>';


}?>
<?php if (isset($_GET['cn'])): ?>
  <form method="post">
    <div class="input-group">
      <label>TITLE</label>
      <input type="text" name="nottit" >
    </div>
    <br>
    <div class="input-group">
       <textarea name="notcon" rows="10" cols="70"></textarea>
    </div>
    <br>
    <div class="input-group">
      <button type="submit" class="btn" name="crnot">Create</button>
    </div>
  </form>
<?php endif;?>

		
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