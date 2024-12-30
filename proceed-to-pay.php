<?php 
echo "<div style='background-color: #aaaaaa; padding: 20px; text-align: center;'>";
include("dashboard/includes/config.php");
include("head.php"); 
echo "</div>";
// include("dashboard/includes/config.php");

?>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-light">
                <div class="card-header text-center" style="background-color: #543554;">
                    <h3 class="mb-0" style="color: white!important;">Proceed with Payment</h3>
                </div>
                <div class="card-body">
                    <form action="https://www.afripay.africa/checkout/index.php" method="post" id="afripayform">
                        <input type="hidden" name="amount" value="<?=$_POST['totalPrice']?>" >
                        <input type="hidden" name="currency" value="USD" >
                        <input type="hidden" name="comment" value="Order <?=$_POST['packageId']?>">
                        <input type="hidden" name="client_token" value="<?=uniqid()?>" >
                        <input type="hidden" name="return_url" value="https://firstclasstours.rw" >
                        <input type="hidden" name="app_id" value="b8b666ab2fccaef6ebd5c532c20358a7">
                        <input type="hidden" name="app_secret" value="JDJ5JDEwJEZHTk1o">
                        
                        <div class="text-center mb-4">
                            <p><strong>Total Amount: $ <?=number_format($_POST['totalPrice'], 2)?></strong></p>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <img src="https://www.afripay.africa/logos/pay_with_afripay.png" alt="Pay with AfriPay" class="img-fluid" style="max-width: 250px;">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

