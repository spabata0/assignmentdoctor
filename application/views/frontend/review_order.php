<?=$header;?>
<div class="main-content-inner"> 
<div class="col-md-9" id="main-content-inner1">
    <div id="dashboard-title">
        <div class="text-left" id="form-title">
                <span class="text-reg w600 xl dgray" >Review your</span> <span class="text-reg w600 xl orange" >Order</span>
        </div>
    </div>
        <div id="order-form">
            <div class="col-sm-5">
                <div>
                </div>   
                <div class="order-form">
                        <ul class="field-list">
                        <li class="field-holder">
                                Academic Level: <?=$academic_level;?><input type="hidden" value='<?=$order_det['academic_level'];?>' id="type">
                            </li>
                            <li class="field-holder">
                                Order Name: <?=$order_name;?>
                            </li>
                            <li class="field-holder">
                                Urgency Level: <?=$urgency_level;?><input type="hidden" value='<?=$order_det['urgency_level']?>' id="days">
                            </li>
                            <li class="field-holder">
                                Format : <?=$formatting;?>  
                            </li>      
                        </ul>  
                </div>   
            </div>
            <div class="col-sm-5">
                <div class="order-form">
                        <ul class="field-list">
                            <li class="field-holder">
                                Language : <?=$language;?>                                
                            </li>   
                            <li class="field-holder">
                                number of pages: <?=$order_det['no_of_pages'];?>
                            </li>  
                            </li>
                            <li class="field-holder">
                                number of sources: <?=$order_det['reference'];?>
                            </li>  
                            <li class="field-holder">
                                reference: <?=$order_det['reffile'];?>                 
                            </li>

                        </ul>
                     
                </div>   
            </div>
        </div>
        <div style="width:70%;margin-left:10%;margin-right:auto;margin-top:30;">
        <?=$order_det['comments'];?>
        </div>
</div>
<div class="col-md-3" id="main-content-inner2">
    <div class="text-left" id="members-menu">
        <div class="text-reg w200 rd white">
            <div class="order-details">
                <ul class="no-bullets">                    
                    <li>
                       <span class="prod text-bld md w200"><?=$order_name;?></span>
                    </li>
                    <li>
                        Number of Pages : <span class="qty  text-reg rg w200 white" ><?=$order_det['no_of_pages'];?>
                        <input type="hidden" name="noofpages"  id="pagetxt" value="<?=$order_det['no_of_pages']?>" size="45" placeholder='# of Pages''>                                
                    </li>
                    <li>
                        <hr/>
                    </li>
                    <li>
                    <span class="text-thn xl w200 white">Total :</span> <span class="d amtfig text-bld xl w200 white" ><?=$order_det['price'];?></span>
                    </li>
                    <li>
                        <hr/>
                    </li>
                    <!--
                    <li>
                         Pay with :
                    </li>            
                    <li>
                        <input type="radio" <?php if($order_det['pay_option'] == 'Paypal') echo " checked"; ?> value="Paypal" name="payoption">
                        <label for="paypal">Paypal</label>
                    </li>
                    <li>
                        <input type="radio" <?php if($order_det['pay_option'] == 'Stripe') echo " checked"; ?> value="Stripe" name="payoption">
                        <label for="stripe">Stripe</label>
                    </li>
                    -->
                    <li>
                        <hr/>
                    </li>
                    <li>
                    <button type="button" id="stripe-button">Pay&nbsp;<?=$order_det['price'];?></button>    
                    </li>
                </ul>

            </div>
        </div>
    </div>    
</div>
</div>
</main>
<?=$footer;?>