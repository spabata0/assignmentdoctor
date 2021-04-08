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
                            <span class="text-thn w600 ml dgray" >REQUEST FOR</span>&nbsp;<span class="text-reg w600 ml orange">REVISION</span>
                        </div>
                        <div style="padding_top:10px">
                        If you need changes, edits, or additions to your downloaded project, please mark revisions
here immediately, Your project writer may have a boclog of other work, but if you remain with
your deadline period, those task will be set aside to provide you with reasonable revisions
on a "first come" basis/ Changes to original guidelines, however, are not considered revision
You must provide specific and detailed notes, comments and instruction when requesting any
changes, Extensive changes beyond your original guidelines or project description my incur delivery
delays and reasonable additional charges, Your complete satisfaction is our objective, and
you are the sole of the writing we provide.

Please be sure to give us a accurate order id
                        </div>
                    </div>
                    <div class="order-form">
                    <form action="request_revision" method="POST">
                        <ul class="field-list">
                            <li class="field-holder">
                                <input type="input" class="inputText" name="order_no" size="40"  value="<?=$oid?>" placeholder="Order Number"/>
                                <label class="floating-label" >Order No.</label>
                            </li>
                            <li>
                                <textarea cols="100" rows="10" name="notes">Your details goes here.</textarea>
                            </li>
                            <li class="field-holder">
                                <input type="file" name="file" />                                
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