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
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction2()">Sort
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown2">
      <a href="notes.php">Time of creation</a>
      <a href="notesup.php">Last Modification </a>
    </div>
  </div> 
</div>

<br>
<div class="hello">-NOTES- sorted by updation</div>
<br>
 
<?php $idea=$_SESSION['id'];
 $res = mysqli_query($dbb, "SELECT * FROM notes where ide='$idea' order by date_updated desc"); ?>

<?php while ($ro = mysqli_fetch_array($res)):?>
 <?php   $te=$ro['title'];
       $datc=$ro['date_created'];
       $datr=$ro['date_updated']; 

 echo "date created:".$datc."  -- date updated:".$datr; ?>
 <br>

 <div class="notesti">
   <?php echo $ro['title'];?>
 </div> 
 <div class="notescon">
   <?php echo $ro['content'];?>
 </div> 
 <a class="button button3" href="server2.php?dl6=<?php echo $ro['title']; ?>&iid22=<?php echo $_SESSION['id']; ?>">DELETE</a>
 <a class="button button2" href="server2.php?ed6=<?php echo $ro['title']; ?>&iid33=<?php echo $_SESSION['id']; ?>&conn22=<?php echo $ro['content']; ?>">EDIT</a>
 <br>
 <br>
 <br>
<?php endwhile; ?>

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