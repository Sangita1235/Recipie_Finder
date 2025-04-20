<!DOCTYPE html>
<html>
<head>
<style>
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
body {
  background-image: url("paper.gif");
}
</style>
</head>
<body>

<h1>RECIPE INGREDIENTS</h1>


<?php

$db=mysqli_connect("localhost","root","rootpassword","recipe_finder","3307");

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


<center>
    
 <table border="3" id="customers" >
     




<br/>
<br/>
  <tr>
    <th>SL NO.</th>
    <th>INGREDIENTS</th>
    
  </tr>
<?php

$db=mysqli_connect("localhost","root","rootpassword","recipe_finder","3307");

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
</center>
</body>
</html>