<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         ?>  
         
<?php
 $conn = new mysqli("localhost","root","","peachblossom");
 if(isset($_SESSION['user'])){
 	if(isset($_POST['orderitem'])){
 	$name = $_POST['id'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];?>
 
<div class="container">
  <div class="my-5 mx-5">
    <h2 class="text-info">Ordered Details of <?php echo $fname." ".$lname ?></h2>
  </div>
  <div class="mx-5 my-5">
  	<table class="table table-striped" style="width:118%!important; margin-top: 1pc;">
  <thead>
    <tr class="mt-5 mb-5">
      <th scope="col">Order Id</th>
      <th scope="col">Transaction Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Ordered Date</th>
      <th scope="col">Status</th>
    </tr>

  </thead>
  <tbody>
  	<?php 
  
  	$sql = "SELECT * FROM orders WHERE customer='$name'";
  	$results=$conn->query($sql);
	if($results->num_rows>0){
		while($row = $results->fetch_assoc()){?>
	<tr class="mt-5 mb-5">
    <td><?php echo $row['ORDER_ID'] ?></td>
  	 <td><?php echo $row['TRANSACTION_ID'] ?></td>
      <td><?php echo $row['PRODUCT_NAME'] ?></td>
      <td><?php echo $row['QUANTITY'] ?></td>
      <td><?php echo $row['PRICE'] ?></td>
      <td><?php echo $row['ORDERED_DATE']?></td>
      <td><?php echo $row['ORDER_STATUS']?></td>
      <td></td>
  	</tr>
  	 <?php
  	}
  }
  else{
  	?>
  </tbody>
</table>
<div>
    <h2>No Order has been made by this customer.</h2>
  </div>
     
  <?php
  }

  ?>
  </div>
</div>
</div>
</div> 
<?php
	}
}
?>