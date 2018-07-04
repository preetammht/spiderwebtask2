
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
   include('server2.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="stylei.css">
  
  <style type="text/css">
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */
  </style>

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
<div class="hello"><?php echo "Hello!  ".$_SESSION['username']; ?></div>
<br>
<br>
<a class="button" href="server2.php?but1=<?php echo "tdo"; ?>">To-do lists</a>
<a class="button button2" href="server2.php?but2=<?php echo "tdo"; ?>">Notes</a>
<a class="button button3" href="phot.php">Pictures</a>





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

