<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>
<h2>Search Your Recipe</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for recipe.." title="Type in a name">

<table id="myTable">
  <tr class="header">

    <th style="width:40%;">RECIPE NAME</th>
    <th style="width:40%;">RECIPE IMAGE</th>
    <th style="width:20%;">VIEW INGREDIENTS</th>
  </tr>
<?php


$db=mysqli_connect("mysql_container","root","rootpassword","recipe_finder");


$query = "SELECT * FROM RECEIPE;";

$query=mysqli_query($db,$query) or die('error');
while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) 
    {
 
 
        ?>

 <td><?php echo $row["R_NAME"]?></td>
 <td><?php echo '<img src="data:image/jpg;base64,'. base64_encode($row['R_IMAGE']).'" width=50px heigth=100px;>';?></td>

 <td><?php echo "<a href=ingredient.php?R_ID=".$row['R_ID'].">VIEW</a>" ?></td>
    
  </tr>
 
  <?php
}
?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
