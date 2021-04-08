

<?=$header;?>

<div class="main-content-inner"> 
        <div class="col-md-9  ml-4" id="main-content-inner1">
            <div class="inner-section">
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-reg w600 xl dgray" >THANK YOU FOR </span><span class="text-reg w600 xl orange" >&nbsp;YOUR PURCHASE</span>
                    </div>
                </div>
                <div class="inner-section-desc row">
                        Here are the details of your order.
                </div>
                <div>
                    <ul>
                      <li>Order no. : <?=$pay_details[0]->id?></li>
                      <li>Order name : <?=$pay_details[0]->order_name;?></li>
                      <li>Urgency : <?=$pay_details[0]->urgency;?></li>
                      <li>No 0f pages : <?=$pay_details[0]->no_of_pages;?></li>
                      <li>Price : <?=$pay_details[0]->price;?></li>
                    </ul>
                </div>
            </div>
        </div>  
    </div>


<?=$footer;?>

