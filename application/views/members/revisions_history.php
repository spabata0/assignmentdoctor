<?=$header;?>


        <div class="main-content-inner">
        <div class="col-md-2" id="main-content-inner2">
            <div class="text-left" id="members-menu">
                <div class="text-reg w200 rd white">
                    <div class="support-links">
                        <?=$members_menu;?>     
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
                            <span class="text-thn w600 ml dgray" >REVISION HISTORY FOR ORDER # : </span>&nbsp;<span class="text-reg w600 ml orange"><?=$order_no?></span>
                        </div>
                    </div>
                    <div class="table text-left">
                        <?php if($query == false) { ?>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Revision ID:x</th>
                                <th scope="col">Date::</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr colspan="2">
                                <th scope="row">No Revisions for this file</th>
                              </tr>  
                            </tbody>
                        </table>
                        <?php } else { ?> 
                        <?php foreach ($query->result() as $row){ ?>
                            <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Revision ID:<?=$row->id?></th>
                                <th scope="col">Date:<?=$row->rev_date?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr colspan="3">
                                <th scope="row"><?=$row->notes?></th>
                              </tr>  
                            </tbody>
                        </table>
                        <?php } ?>
                        <?php }?>
                          
                            <hr/>

                        </div>   
                </div>
        </div>
    </div>
    </main>
        
    </div>
<?=$footer;?>