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
            
  <div class = "Payment">
      <h2> Success </h2>
 <p> payment successfull. order details: <a href='order.php'>visit here </a> </p>
            </div>
            
            

     
    </div>
<div class="back">


    
    

</div>
        
 </div>
</div>
  

<?php include 'inc/footer.php'; ?>