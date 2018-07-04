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
      <a href="todolist.php">Time of creation</a>
      <a href="todolistup.php">Last Modification </a>
    </div>
  </div> 
</div>

<br>
<div class="hello">To-do lists---- sorted by updation.</div>
 


<?php      $idea=$_SESSION['id']; 
$res = mysqli_query($dbb, "SELECT * FROM tod where ide='$idea' and content like 'hi' order by date_updated desc"); ?>

<?php while ($ro = mysqli_fetch_array($res)):?>
 <?php   $te=$ro['title'];
       $datc=$ro['date_created'];
       $datr=$ro['date_updated']; 

 echo "date created:".$datc."  -- date updated:".$datr; ?>
 <br>
<div id="myDIV" class="header" style="padding: 5px 40px;">
  <h2 style="margin:5px"><?php echo $ro['title'] ?></h2>
  <form method="post"  >
  <input type="text" class="inp" placeholder="add..." name="addingcontent2">
  <button type="submit" class="addBtn" name="addp2" value="<?php echo $ro['title']; ?>">Save</button></form>
  <br>
  <a class="button button3" href="server2.php?dl5=<?php echo $ro['title']; ?>&iid5=<?php echo $_SESSION['id']; ?>">DELETE</a>
</div>


 <?php $results = mysqli_query($dbb, "SELECT * FROM tod where ide='$idea' and title like '$te' AND content not like 'hi' order by date_updated"); ?>
<?php while($row = mysqli_fetch_array($results)): ?>




<?php if($row['checkd']==0): ?>
<ul id="myUL">
  <li><a href="server2.php?checku2=<?php echo $row['content']; ?>&iid2=<?php echo $_SESSION['id']; ?>&upl2=<?php echo $row['title']; ?>" > <?php echo $row['content'] ?></li></a>
  
  

</ul>
<?php else : ?>
  <ul id="myUL" >
  <li class="checked"> <a href="server2.php?uchecku2=<?php echo $row['content']; ?>&iid2=<?php echo $_SESSION['id']; ?>&upl2=<?php echo $row['title']; ?>" ><?php echo $row['content'] ?> </a></li>
  


</ul>
<?php endif; ?> 
<?php endwhile; ?> 
<br>
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

