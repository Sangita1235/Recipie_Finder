<?php 
include('connection.php');
  if(isset($_POST['submit']))

    {
  $R_NAME=$_POST['R_NAME'];
  $R_TYPE=$_POST['R_TYPE'];
  $R_IMAGE=addslashes(file_get_contents($_FILES["R_IMAGE"]["tmp_name"]));



  $sql= "INSERT INTO RECEIPE(R_NAME,R_TYPE,R_IMAGE)VALUES ('$R_NAME','$R_TYPE','$R_IMAGE')";


  if ($db->query($sql) === TRUE) {
    echo "<script>alert('Your Recipe Added')</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
}
  $db->close();
  ?>



<!DOCTYPE html>
<html>
<head>
<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 25px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}

* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>Recipe/Cuisine Form</h2>

<div class="container">

<form action="" method="post" enctype="multipart/form-data">


  <div class="row">
    <div class="col-25">
      <label for="fname">Recipe/Cuisine Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="R_NAME" placeholder="Enter Your recipe name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Recipe Type</label>
    </div>
    <div class="col-75">
      <select id="country" name="R_TYPE">
        <option value="Indian">Indian</option>
        <option value="Chinese">Chinese</option>
        <option value="Italian">Italian</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Recipe Type</label>
    </div>
    <div class="col-75">
    <input type="file"  name="R_IMAGE">
    </div>
  </div>
  </div>

  <div class="row">

  <button name="submit"  class="button" >Submit</button> </td>

  </div>
  </form>
</div>

</body>
</html>



 <table border="3" id="customers">
  <tr>
       
    <th>SL NO.</th>
    <th>RECIPE NAME</th>
    <th>RECIPE TYPE</th> 
    <th>Photo</th>
    <th>Ingredients</th>
  </tr>

<?php 
include('connection.php');

$query="select * from RECEIPE";
$query=mysqli_query($db,$query);
 $counter = 0;
while ($results=mysqli_fetch_array($query,MYSQLI_ASSOC)) 
  {

            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
 
 
 $counter++; //increment counter by 1 on every pass 
 
  ?>

<tr>
  <?php echo "<td>" . $counter . "</td>"; ?>
      
         <td><?php echo $results["R_NAME"]?></td>
         
         <td><?php echo $results["R_TYPE"]?></td>
         <td>
             <?php echo '<img src="data:image/jpg;base64,'. base64_encode($results['R_IMAGE']).'" width=50px heigth=100px;>';
?>
         </td>
         <td><?php echo "<a href=ingredients.php?R_ID=".$results['R_ID'].">INGREDIENTS</a>" ?></td>

         

    </tr>
    

<?php
}

    
?>