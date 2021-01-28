<?php include 'inc/header.php'; ?>
<style>
    
    .notfound{}
    .notfound h2{   font-size: 80px;
                    line-height: 130px;
                    text-align: center; }
    
    .notfound h2 span{  display: block; 
                        color: red; 
                        font-size: 150px;  }
    
</style>


  <?php 
  $login =  Session::get("cuslogin");
  if ($login == false) {
  	header("Location:login.php");
  }

  ?>

<?php
if(isset($_GET['orderid']) && $_GET['orderid'] == 'order' ){
   $cmrId =  Session::get("cmrId"); 
    $insertOrder = $ct->orderProduct($cmrId);
    $delData= $ct->delCustomerCart();
    
    header("location:success.php");
}

?>

<style>
    .payment{   
            width: 500px; 
            text-align: center;
            border: 1px solid #ddd;
            margin:0 auto;
            padding:50px;
    }
    .payment h2{border-bottom: 1px solid #ddd;margin-bottom: 40px;padding-bottom: 10px;}
    .payment a{}
    
    
    
</style>

 <div class="main">
    <div class="content">	
        <div class="section group">
            
<div class='division'> 
            
    					<table class="tblone">
							<tr>
								<th>Sl</th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total </th>
								
							</tr>
                                <?php
 					$getPro = $ct->getCartProduct();
 					if ($getPro) {
 						$i = 0;
 						$sum = 0;
 						$qty = 0;
 						while ($result = $getPro->fetch_assoc()) {
 							 $i++;
 						         ?>
 								<tr>
								<td><?php echo $i;  ?></td>
								<td><?php echo $result['productName'];  ?></td>
                                    
								<td>$ <?php echo $result['price'];  ?></td>
                                <td><?php echo $result['quantity'];  ?></td>   
                                    
								<td>
									
								</td>
								<td>$ 
     							<?php 
     							$total = $result['price'] * $result['quantity'];
     							echo $total;

     							?>			
 
								</td>
								
							</tr>
 							<?php 
                            
 							    $qty = $qty +  $result['quantity'];
 								$sum = $sum + $total;
 						

 							 ?>


							<?php } }   ?>
							 
							
						</table>
                
	


						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum;  ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>   
      									10%(<?php echo $vat = $sum * 0.1;?>)
								</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$<?php 
									$vat = $sum * 0.1;
									$gtotal = $sum + $vat;
									echo $gtotal;
									?> </td>
							</tr>
                            
                            		<tr>
								<th>quantity :</th>
								<td><?php echo $qty;
									?></td>
							</tr>
                            
					   </table>        
            
            </div>
    
            
<div class='division'> 
    <?php 
   $id = Session::get('cmrId');
   $getdata = $cmr->getCustomerData($id);
   if ($getdata) {
     while ($result = $getdata->fetch_assoc()) {
        
  ?>
        
            <table class="tblone">
            <tr>
              
                <td colspan='3'> <h2> Your Profile Details </h2> </td>
               
            </tr>
            <tr>
                <td> Phone </td>
                <td> : </td>
                <td> <?php echo $result['phone']; ?> </td>
            </tr>
            <tr>
                <td> Email </td>
                <td> : </td>
                <td> <?php echo $result['email']; ?> </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> : </td>
                <td> <?php echo $result['address']; ?> </td>
            </tr>
            <tr>
                <td> City </td>
                <td> : </td>
                <td> <?php echo $result['city']; ?> </td>
            </tr>
             <tr>
                <td> Zipcode </td>
                <td> : </td>
                <td> <?php echo $result['zip']; ?> </td>
            </tr>   
             <tr>
                <td> Country </td>
                <td> : </td>
                <td><?php echo $result['country']; ?> </td>
            </tr>   
               <tr>
                <td>  </td>
                <td></td>
                <td><a href="editprofile.php"> Update Details</a> </td>
            </tr>      
            </table>
            
            <?php } } ?>         
            
            
            </div>   

</div>
        
 </div>
     <div><a href = "?orderid=order"> Order </a></div>
</div>
  

<?php include 'inc/footer.php'; ?> 