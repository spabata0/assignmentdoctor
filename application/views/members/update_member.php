<?=$header;?>


        <div class="main-content-inner">
        <div class="col-md-2" id="main-content-inner2">
            <div class="text-left" id="members-menu">
                <div class="text-reg w200 rd white">
                    <div class="support-links">
                        <?=$members_menu?>       
                    </div>
                </div>
            </div>    
        </div>
        <div class="col-md-10" id="main-content-inner1">
                <div class="form-holder">
                    <div id="dashboard-title">
                        <div class="text-left" id="form-title">
                                <span class="text-reg w600 xl dgray" >Dashboard</span>
                        </div>
                        <div class="text-left">
                            <span class="text-thn w600 ml dgray" >MANAGE YOUR</span>&nbsp;<span class="text-reg w600 ml orange">PROFILE</span>
                        </div>
                    </div>
                    <div class="order-form">
                    <form action="update_member" method="POST">
                        <ul class="field-list">
                            <li class="field-holder">
                                <input type="input" name="firstname" size="40" value="<?=$member_details[0]->firstname;?>" placeholder="Firstname"/>
                            </li>
                            <li class="field-holder">
                                <input type="input" name="lastname" value="<?=$member_details[0]->lastname;?>" size="40" placeholder="Lastname"/>
                            </li>
                            <li class="field-holder">
                                <input type="input" name="email" value="<?=$member_details[0]->email;?>" size="40" placeholder="Email"/>                                
                            </li>
                            <li class="field-holder">
                                <input type="input" name="address" value="<?=$member_details[0]->address;?>" size="40" placeholder="Address"/>                                
                            </li>
                            <li class="field-holder">
                                <input type="input" name="city" value="<?=$member_details[0]->city;?>" size="40" placeholder="city"/>                                
                            </li>
                            <li class="field-holder">
                                <input type="input" name="country" value="<?=$member_details[0]->country;?>" size="40" placeholder="country"/>                                
                            </li>
                            <li class="field-holder">
                                <input type="input" name="phone_no" value="<?=$member_details[0]->phone_no;?>" size="40" placeholder="Phone"/>                                
                            </li>
                            <li>
                                <input type="submit" name="Submit"/>                                
                            </li>
                        </ul>
                    </form>    
                </div>   
                </div>
        </div>
    </div>
    </main>
        
    </div>

<?=$footer;?>