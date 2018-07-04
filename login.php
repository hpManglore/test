
<?php
/*
* Following code will create a new product row
* All product details are read from HTTP Post Request
*/
// array for JSON response
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
  // include db connect class
   require_once __DIR__ . '/dbConnect.php';
	
	$name=$_POST['name'];
	$password = $_POST['password'];
// $sql="SELECT * FROM `register` WHERE  password=$password and name=$name" ;
$sql="SELECT `id`, `name`, `password`, `email`, `phoneno` FROM `register` WHERE `password`='$password' AND `name`='$name'" ;
 $result = $con->query($sql);
if ($result->num_rows > 0) {
  
   $response["products"] = array();
   while($row = $result->fetch_assoc()) {
       // temp user array
       $product = array();
       $product["id"] = $row["id"]; 
       $product["name"] = $row["name"];
	   $product["password"] = $row["password"];
       $product["email"] = $row["email"];
       $product["phoneno"] = $row["phoneno"];
       // push single product into final response array
       array_push($response["products"], $product);
   }
   // success
   $response["success"] = 1;
   // echoing JSON response
   echo json_encode($response);
} else {
   // no products found
   $response["success"] = 0;
   $response["message"] = "No products found";
   // echo no users JSON
   echo json_encode($response);
}
}
?>