  <?php

  $dbb = mysqli_connect('localhost', 'root', '', 'registration');
  
  $conte="";
  $tempcon="";

  
if(isset($_GET['but1']))
	{ header("location: todolist.php");}

if(isset($_GET['but2']))
	{ header("location: notes.php");}

if(isset($_GET['but3']))
	{ header("location: todolist.php");}
  

  if(isset($_POST['sctb'])){
  	$s=mysqli_real_escape_string($dbb, $_POST['sct']);
   $idea=$_SESSION['id'];
  $query = "INSERT INTO tod (ide,title,content,date_created,date_updated,checkd)
          VALUES ('$idea','$s','hi', NOW(),NOW(),0)";

    mysqli_query($dbb, $query);

 header("location:todolist.php");

}


if(isset($_POST['crnot'])){
	$ti=$_POST['nottit'];
	$conten=$_POST['notcon'];
    $idea=$_SESSION['id'];
$query = "INSERT INTO notes (ide,title,content,date_created,date_updated)
          VALUES ('$idea','$ti','$conten',NOW(),NOW())";

    mysqli_query($dbb, $query);

 header("location:notes.php");
}




if (isset($_POST['addp'])) {
	$conte=$_POST['addingcontent'];
    $t=$_POST['addp'];
       //  mysqli_real_escape_string($dbb,$_SESSION['tit']);
     $idea=$_SESSION['id'];
 
 $query = "INSERT INTO tod (ide,title,content,date_created,date_updated,checkd)
          VALUES ( '$idea','$t','$conte',NOW(),NOW(),0)";
    mysqli_query($dbb, $query);
 $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

    header("location:todolist.php");
  }


  if(isset($_GET['checku']))
     {$tempcon=$_GET['checku'];
       $idea=$_GET['iid'];
       $t=$_GET['upl'];
      $query = "UPDATE tod SET checkd=1 where content='$tempcon' and ide=$idea";
    mysqli_query($dbb, $query);
     $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

     header("location: todolist.php");}


   if(isset($_GET['uchecku']))
     {$tempcon=$_GET['uchecku'];
      $idea=$_GET['iid'];
      $t=$_GET['upl'];
      $query = "UPDATE tod SET checkd=0 where content='$tempcon' and ide='$idea'";
    mysqli_query($dbb, $query);
     $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

     header("location: todolist.php");} 
 

 if (isset($_POST['addp2'])) {
	$conte=$_POST['addingcontent2'];
    $t=$_POST['addp2'];
       //  mysqli_real_escape_string($dbb,$_SESSION['tit']);
     $idea=$_SESSION['id'];
 
 $query = "INSERT INTO tod (ide,title,content,date_created,date_updated,checkd)
          VALUES ( '$idea','$t','$conte',NOW(),NOW(),0)";
    mysqli_query($dbb, $query);
 $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

    header("location:todolistup.php");
  }


  if(isset($_GET['checku2']))
     {$tempcon=$_GET['checku2'];
       $idea=$_GET['iid2'];
       $t=$_GET['upl2'];
      $query = "UPDATE tod SET checkd=1 where content='$tempcon' and ide=$idea";
    mysqli_query($dbb, $query);
     $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

     header("location: todolistup.php");}


   if(isset($_GET['uchecku2']))
     {$tempcon=$_GET['uchecku2'];
      $idea=$_GET['iid2'];
      $t=$_GET['upl2'];
      $query = "UPDATE tod SET checkd=0 where content='$tempcon' and ide='$idea'";
    mysqli_query($dbb, $query);
     $query = "UPDATE tod SET date_updated=NOW() where ide=$idea and title like '$t' and content like 'hi'";
    mysqli_query($dbb, $query);

     header("location: todolistup.php");} 
    
     if(isset($_GET['dl5']))
     {
     	$dt=$_GET['dl5'];
     	$idea=$_GET['iid2'];
     	$query = "DELETE from tod where title like '$dt' and ide='$idea'";
         mysqli_query($dbb, $query);
         header("location: todolistup.php");
     }



     if(isset($_GET['dl']))
     {
     	$dt=$_GET['dl'];
     	$idea=$_GET['iid'];
     	$query = "DELETE from tod where title like '$dt' and ide='$idea'";
         mysqli_query($dbb, $query);
         header("location: todolist.php");
     }


      if(isset($_GET['dl2']))
     {
     	$dt=$_GET['dl2'];
     	$idea=$_GET['iid2'];
     	$query = "DELETE from notes where ide='$idea'and title like '$dt'  ";
         mysqli_query($dbb, $query);
         header("location: notes.php");
     }
      if(isset($_GET['dl6']))
     {
     	$dt=$_GET['dl6'];
     	$idea=$_GET['iid22'];
     	$query = "DELETE from notes where ide='$idea'and title like '$dt'  ";
         mysqli_query($dbb, $query);
         header("location: notesup.php");
     }
     ?>
   
     <?php if(isset($_GET['ed2'])): ?>
     <?php  
         $dt=$_GET['ed2'];
     	 $idea=$_GET['iid3'];
     	 $c=$_GET['conn2'];
     	// $query = "DELETE from notes where ide='$idea'and title like '$dt'  ";
        // mysqli_query($dbb, $query);
             
         ?>
     	<form method="post">
    <div class="input-group">
      <label>TITLE</label>
      <input type="text" name="nottitu" value="<?php echo $dt;  ?>">
    </div>
    <br>
    <div class="input-group">
       <textarea name="notconu" rows="10" cols="70" ><?php echo $c;  ?></textarea>
    </div>
    <br>
    <div class="input-group">
      <button type="submit" class="btn" name="crnotu">save</button>
    </div>
  </form>
   <?php endif; ?>
   <?php if(isset($_POST['crnotu'])) { 
      $dtxz=$_POST['nottitu'];
      $cxz=$_POST['notconu'];
      $query = "UPDATE notes SET title='$dtxz',content='$cxz',date_updated=NOW() where title='$dt' and ide='$idea'";
      mysqli_query($dbb, $query);
      header("location: notes.php");}

      ?>

      <?php if(isset($_GET['ed6'])): ?>
     <?php  
         $dt=$_GET['ed6'];
     	 $idea=$_GET['iid33'];
     	 $c=$_GET['conn22'];
     	// $query = "DELETE from notes where ide='$idea'and title like '$dt'  ";
        // mysqli_query($dbb, $query);
             
         ?>
     	<form method="post">
    <div class="input-group">
      <label>TITLE</label>
      <input type="text" name="nottitu2" value="<?php echo $dt;  ?>">
    </div>
    <br>
    <div class="input-group">
       <textarea name="notconu2" rows="10" cols="70" ><?php echo $c;  ?></textarea>
    </div>
    <br>
    <div class="input-group">
      <button type="submit" class="btn" name="crnotu2">save</button>
    </div>
  </form>
   <?php endif; ?>
   <?php if(isset($_POST['crnotu2'])) { 
      $dtxz=$_POST['nottitu2'];
      $cxz=$_POST['notconu2'];
      $query = "UPDATE notes SET title='$dtxz',content='$cxz',date_updated=NOW() where title='$dt' and ide='$idea'";
      mysqli_query($dbb, $query);
      header("location: notesup.php");}

      ?>


     	
     

     

