


<?php 
include('connection.php');
  if(isset($_POST['submit']))

    {
  $R_ID = $_POST['R_ID'];
  $INGREDIENTS=$_POST['INGREDIENTS'];




  $sql= "INSERT INTO INGREDIENTS(R_ID,INGREDIENTS)VALUES ('$R_ID','$INGREDIENTS')";


  if ($db->query($sql) === TRUE) {
    echo "<script>alert('Recipe Ingresients Added')</script>";

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

<h2>INGREDIENTS</h2>

<div class="container">

<form action="" method="post" enctype="multipart/form-data">
<?php
include("connection.php");
$R_ID=$_REQUEST['R_ID'];
$sql = 'SELECT * FROM RECEIPE where R_ID='.$R_ID; 
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
?>
<td>
     



<div class="row">
    <div class="col-25">

    </div>
    <div class="col-75">
      <input type="hidden" id="fname" name="R_ID" value="<?php echo $row['R_ID'];}?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">INGREDIENTS</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="INGREDIENTS" placeholder="Enter Your Ingredients name..">
    </div>
  </div>
  
  </div>

  <div class="row">

  <button name="submit"  class="button" >Submit</button> </td>

  </div>
  </form>
</div>

<?php

include("connection.php");

if(isset($_REQUEST["R_ID"]))
{
	$R_ID=$_REQUEST["R_ID"];


	$query="select * from RECEIPE where R_ID=$R_ID ";
 $counter = 0;
$query1=mysqli_query($db,$query);

while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC))
    {
        ?>
        <center>
            <font color="light blue" size="50"><b>
        
        <?php echo $row['R_NAME']?>
       </b> </font>
       </center>
       <br/>
   
<?php
}
}
?>



    
 <table border="3" id="customers" >
     




<br/>
<br/>
  <tr>
    <th>SL NO.</th>
    <th>INGREDIENTS</th>
    
  </tr>
<?php

include("connection.php");

if(isset($_REQUEST["R_ID"]))
{
	$R_ID=$_REQUEST["R_ID"];


	$query="select * from INGREDIENTS where R_ID=$R_ID ";
 $counter = 0;
$query1=mysqli_query($db,$query);

while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC))
    {
        
 $counter++;
        echo "<tr><td>" . $counter . "</td>";
    
 
 echo "<td>".$row['INGREDIENTS']."</td>";
   
   }

?>
<?php
}
?>