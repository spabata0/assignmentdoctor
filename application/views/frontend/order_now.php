<?=$header;?>

<form action='<?=base_url();?>process_order/' method='post' name='process' enctype="multipart/form-data">
<div class="main-content-inner"> 
<div class="col-md-9" id="main-content-inner1">
    <div id="dashboard-title">
        <div class="text-left" id="form-title">
                <span class="text-reg w600 xl dgray" >PLACE YOUR</span> <span class="text-reg w600 xl orange" >ORDER</span>
        </div>
        <?php if (!isset($this->session->userdata['logged_in'])) { ?>
        <div class="dgray">
        <?=$order_det['message'];?>
        </div>
        <?php } ?>
    </div>    
        <div id="order-form">
            <div class="col-sm-5">
                <div>
                </div>   

                <div class="order-form">
                        <ul class="field-list">
                            <li class="field-holder">
                                        <select  name="academic_level" class="order-select" id="type">
                                          <option  selected value="hs">Whats youe academic level?</option>
                                          <option <?php if($order_det['academic_level'] == "hs") echo " selected"; ?> value="hs">High school</option>
                                          <option <?php if($order_det['academic_level'] == "col") echo " selected"; ?> value="col">College/University</option>
                                          <option <?php if($order_det['academic_level'] == "mba") echo " selected"; ?> value="mba">Masters/MBA</option>
                                          <option <?php if($order_det['academic_level'] == "doc") echo " selected"; ?> value="doc">Doctorate</option>
                                      </select>
                            </li>
                            <li class="field-holder">
                                <select  name="doctype" class="order-select" id="doctype">
                                    <option selected value="1">What type of document?</option>
                                    <option <?php if($order_det['order_name'] == 1) echo " selected"; ?> value="1">Essay</option>
                                    <option <?php if($order_det['order_name'] == 2) echo " selected"; ?> value="2">Narrative Essay</option>
                                    <option <?php if($order_det['order_name'] == 3) echo " selected"; ?> value="3">Descriptive Essay</option>
                                    <option <?php if($order_det['order_name'] == 4) echo " selected"; ?> value="4">Argumentative Essay Term Paper</option>
                                    <option <?php if($order_det['order_name'] == 5) echo " selected"; ?> value="5">Research Paper</option>
                                    <option <?php if($order_det['order_name'] == 6) echo " selected"; ?> value="6">Draft</option>
                                    <option <?php if($order_det['order_name'] == 7) echo " selected"; ?> value="7">Abstract</option>
                                    <option <?php if($order_det['order_name'] == 8) echo " selected"; ?> value="8">Literature Review</option>
                                </select>
                            </li>
                            <li class="field-holder">
                                <select  id="days" name="urgency_level" class="order-select">
                                    <option selected value="1">How may day you want it done?</option>
                                    <option <?php if($order_det['urgency_level'] == 1) echo " selected"; ?> value="1">1 Day</option>
                                    <option <?php if($order_det['urgency_level'] == 2) echo " selected"; ?> value="2">2 Days</option>
                                    <option <?php if($order_det['urgency_level'] == 3) echo " selected"; ?> value="3">3-4 Days</option>
                                    <option <?php if($order_det['urgency_level'] == 4) echo " selected"; ?> value="4">5-7 Days</option>
                                    <option <?php if($order_det['urgency_level'] == 5) echo " selected"; ?> value="5">7-8 Days</option>
                                    <option <?php if($order_det['urgency_level'] == 6) echo " selected"; ?> value="6">10 Days</option>
                                  </select>                               
                            </li>
                            <li class="field-holder">
                                <select  id="formatting" name="formatting" class="order-select">
                                    <option selected value="1">What format do you want?</option>
                                    <option <?php if($order_det['formatting'] == 1) echo " selected"; ?> value="1">APA</option>
                                    <option <?php if($order_det['formatting'] == 2) echo " selected"; ?> value="2">MLA</option>
                                    <option <?php if($order_det['formatting'] == 3) echo " selected"; ?> value="3">Harvard</option>
                                    <option <?php if($order_det['formatting'] == 4) echo " selected"; ?> value="4">Chicago</option>
                                    <option <?php if($order_det['formatting'] == 5) echo " selected"; ?> value="5">Others</option>
                                  </select>                               
                            </li>
                                                              
                        </ul>  
                </div>   
            </div>
            <div class="col-sm-5">
                <div class="order-form">
                        <ul class="field-list">
                            <li class="field-holder">
                                 <select  id="language" name="language" class="order-select">
                                    <option selected value="0">What Language?</option>
                                    <option <?php if($order_det['language'] == '1') echo " selected"; ?> value="1">British</option>
                                    <option <?php if($order_det['language'] == '2') echo " selected"; ?> value="2">American</option>
                                    <option <?php if($order_det['language'] == '3') echo " selected"; ?> value="3">Australian</option>
                                  </select>                               
                            </li>
                            <li class="field-holder">
                                <input type="text"name="noofpages"  id="pagetxt" value="<?=$order_det['no_of_pages']?>" size="45" placeholder='# of Pages''>                                
                            </li>  
                            <li class="field-holder">
                                <input type="text" name="reference" size="40" value="<?=$order_det['reference']?>" size="45" placeholder="Enter number of sources"/>
                            </li>
                            <?php if($this->session->userdata('logged_in') != null) { ?>
                            </li>
                            <li class="field-holder">
                                <input type="file" id="reffile" name="reffile" value="" >       
                                <label for="male"><?=$order_det['reffile']?></label>                          
                            </li>
                            <?php } ?>

                        </ul>
                </div>   
            </div>
        </div>
    <div style="margin-left:8%">
        Please enter furthur instruction and requirements
        <textarea name="notes" rows="3" cols="50" style="margin-left:5px; margin-top:5px;" placeholder="Please enter furthur instruction and requirements"><?=$order_det['comments']?></textarea>                                  
    </div>
</div>
<div class="col-md-3" id="main-content-inner2">
    <div class="text-left" id="members-menu">
        <div class="text-reg w200 rd white">
            <div class="order-details">
                <ul class="no-bullets">
                
                    <li>
                        <span class="text-thn xl w200 white" >Order Details </span>
                    </li>
                    <li>
                        <hr/>
                    </li>
                    <li>
                       <span class="prod text-bld md w200">None</span><input type="hidden" name="prod" class="prod"/>
                    </li>
                    <li>
                        Urgency level : <span class="urgency text-bld rg w200">None</span><input type="hidden" name="urgency" class="urgency"/>
                    </li>
                        
                    <li>
                        Price per page : <span class="origamt amtfig text-bld rg w200 strike-thru ">$0.00</span><input type="hidden" name="a" class="a"/>
                        <span style="visibility:hidden" class="origamt"></span>
                    </li>
                    <li>
                        No of pages : <span class="qty  text-reg rg w200 white" ><?=$order_det['no_of_pages']?></span><input type="hidden" name="qty" class="qty" value="<?=$order_det['no_of_pages']?>"/>
                    </li>
                    <li>
                        <hr/>
                    </li>
                    <li>
                    <span class="text-thn xl w200 white" >Total : </span><span class="d amtfig text-bld xl w200 white" >0.00</span><input type="hidden" name="d" class="d"/>
                    </li>
                    <li>
                        <hr/>
                    </li>
                </ul>
                <ul class="no-bullets">
                            <li class="text-right">
                                <input type="image" name="submit" src="<?=base_url();?>fe_assets/images/group165.png" width="180" height="50" alt="submit">   
                            </li>
                </ul>
            </div>
        </div>
    </div>    
</div>
</div>
</form>  
</main>

<?=$footer;?>
