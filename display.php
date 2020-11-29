
<html> 
   <head> 
		<style>
		body {
 
  background-color: black;
  height: 500px;
  background-position: 1008*97;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
table{
	width: 96% ;
}
th {
  background-color: grey;
  color: white;
  
}

tr:nth-child(even) {background-color: white;}
tr:nth-child(odd) {background-color: lightgreen;}

h1{
	color: white;
	text-align: center;
}
h6{
	font-size:20px;
	color: white;
}

</style>		
</head>   
<body>
<h6 style="float:right; color:white;"><a href="appoinment.html">Book your appoinment</a></h6> 
<h1>List of apppoinments</h1></body>

</html>







<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect('localhost','root','','patient');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM pat_table";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>firstName</th>";
                echo "<th>lastName</th>";
                echo "<th>gender</th>";
                echo "<th>age</th>";
                echo "<th>blood</th>";
                echo "<th>number</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['blood'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>