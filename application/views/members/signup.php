<?=$header;?>


    <div class="main-content-inner">
        <div class="col-md-8" id="main-content-inner1">
                <div class="form-holder">
                    <div class="text-center" id="form-title">
                            <span class="text-reg w600 xl dgray" >SIGN UP</span>
                    </div>
                    <div class="text-center">
                            <span class="text-reg w600 rg red" ><?=$message?></span>
                            <span class="text-reg w600 rg blue" ><?=$this->session->message?></span>
                    </div>
                    <div class="form">
                   <!-- <form action='<?=base_url();?>members/signup' method='post' name='process'>-->
                        <?php echo form_open();?>
                                <ul class="field-list">
                                <li class="field-holder">
                                        <input type="text" name="firstname" size="40" placeholder="Firstname" value="<?=$this->input->post('firstname')?>"/>
                                        <div><span class="text-reg sm red" ><?php echo form_error('firstname');?></span></div>
                                    </li>
                                    <li class="field-holder">
                                        <input type="text" name="lastname" size="40" placeholder="Lastname"/>
                                        <span class="text-reg sm red" ><?php echo form_error('lastname');?></span>
                                    </li>
                                    <li class="field-holder">
                                        <input type="text" name="username" size="40" placeholder="Username"/>
                                        <span class="text-reg sm red" ><?php echo form_error('username');?></span>
                                    </li>
                                    <li class="field-holder">
                                        <input type="text" name="email" size="40" placeholder="Email"/>
                                        <span class="text-reg sm red" ><?php echo form_error('email');?></span>
                                    </li>
                                    <li class="field-holder">
                                        <input type="password" name="password" placeholder='Enter  Password'/>   
                                        <span class="text-reg sm red" ><?php echo form_error('password');?></span>                                
                                    </li>
                                    <li class="field-holder">
                                        <input type="password" name="password2" placeholder='Re-enter  Password'/>     
                                        <span class="text-reg sm red" ><?php echo form_error('password2');?></span>                              
                                    </li>
                                    <li class="nav-item">
                                        or sign-up with 
                                        <a href="<?=$authURL?>"><img src="<?=base_url();?>fe_assets/images/Facebook Button.png"/></a>
                                        <a href="<?=$google_client->createAuthUrl()?>"><img src="<?=base_url();?>fe_assets/images/Google Button.png"/></a>
                                    </li>
                                    <li>
                                        <input type="checkbox">&nbsp;I agree to the Terms and Conditions.                                
                                    </li>
                                    <li class="text-right">
                                        <div><input type="image" src="<?=base_url();?>fe_assets/images/Login Button.png" /></div>                      
                                    </li>

                                    
                                </ul>
                           <!-- </form>-->
                            <?php echo  form_close();?>  
                        </div>   
                </div>
        </div>
        <div class="col-md-4" id="main-content-inner2">
            <div class="text-center" id="signin-cta">
                <div class="text-bld w400 xx white">Welcome</div>
                <div class="text-thn w600 ml white">Already have an account??</div>
                <div><a href="members/"><img src="<?=base_url();?>fe_assets/images/SignIn.png"/></a></div>
            </div>    
        </div>
    </div>
    </main>

<?=$footer;?>