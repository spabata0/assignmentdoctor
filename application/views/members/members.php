<?=$header;?>

    <div class="main-content-inner">
        <div class="col-md-8" id="main-content-inner1">
                <div class="form-holder">
                    <div class="text-center" id="form-title">
                            <span class="text-reg w600 xl dgray" >SIGN IN</span>
                    </div>
                    <?php if($message != '') {?>
                    <div class="text-center">
                            <span class="text-reg sm red" ><?=$message?></span>
                    </div>
                    <?php } ?>
                    <div class="form">
                    <form action='<?php echo base_url();?>members/login_member' method='post' name='process'>
                                <ul class="field-list">
                                    <li class="field-holder">
                                        <input type="text" name="username" size="40" placeholder="Username"/>
                                    </li>
                                        
                                    <li class="field-holder">
                                        <input type="password" name="password" placeholder='Password'/>                                   
                                    </li>
                                    <li>
                                        <input type="checkbox">&nbsp;Remember me.                                
                                    </li>
                                    <li class="text-right">
                                       <input type="image" src="<?=base_url();?>fe_assets/images/SignIn.png"/>                        
                                    </li>

                                    <li>
                                        <hr/>
                                    </li>
                                    <li class="nav-item">
                                        or login with 
                                        <a href="<?=$authURL?>"><img src="<?=base_url();?>fe_assets/images/Facebook Button.png"/></a>
                                        <a href="<?=$google_client->createAuthUrl()?>"><img src="<?=base_url();?>fe_assets/images/Google Button.png"/></a>
                                    </li>

                                    
                                </ul>
                            </form>    
                            <hr/>
                            <div class="support-links">
                                <ul>
                                    <li>
                                       Forget Username/Password
                                    </li>
                                        
                                    <li>
                                         Don't have and account? Sign-up fpr free
                                    </li>
                                </ul>
                            </div>
                        </div>   
                </div>
        </div>
        <div class="col-md-4" id="main-content-inner2">
                <div class="text-center" id="signin-cta">
                    <div class="text-bld w400 xx white">Welcome</div>
                    <div class="text-thn w600 ml white">Dont have an account?</div>
                    <div><a href="signup/"><img src="<?=base_url();?>fe_assets/images/Sign up free.png" /></a></div>
                </div>  
        </div>
    </div>
    </main>


<?=$footer;?>