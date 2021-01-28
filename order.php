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


 <div class="main">
    <div class="content">
    		
        <div class="section group">
        
            <div class="notfound"></div>
        <h2><span>Your Order details</span></h2>
            
            <table class="tblone">
							<tr>
								<th>Sl</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th>
								<th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
                                <?php
                $cmrId =  Session::get("cmrId");
 					$getOrder = $ct->getOrderProduct($cmrId);
 					if ($getOrder) {
 						$i = 0;
 						
 						while ($result = $getOrder->fetch_assoc()) {
 							 $i++;
 						         ?>
 								<tr>
								<td><?php echo $i;  ?></td>
								<td><?php echo $result['productName'];  ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td> <?php echo $result['quantity'];  ?></td>
								
								<td>$ 
     							<?php 
     							$total = $result['price'] * $result['quantity'];
     							echo $total;

     							?>			
 
								</td>
                                    
                                  
                        <td><?php echo $fm->formatDate($result['date']) ;  ?></td>  
                                    
                                    
                                <td>
                                    <?php 
                            if($result['status'] == '0'){
                                echo " pending ";
                            }else{
                                echo "shifted";
                            }
                            
                            
                             ?>
                                
                                    
                                    
                                    
                                    
                                    </td>
                                    
                                    <?php
                            if($result['status'] == '1'){ ?>
                                <td><a onclick="return confirm('Are you sure to Delete');" href="">X</a></td>
                        
                        <?php    }else{ ?>
                                    <td>N/A</td>
                                    
                            <?php } ?>        
								
							</tr>
 							


							<?php } }   ?>
							 
							
						</table>
            
        </div>
        
        
        
        
        
        
        
       <div class="clear"></div>
    </div>
 </div>
</div>
  

<?php include 'inc/footer.php'; ?>