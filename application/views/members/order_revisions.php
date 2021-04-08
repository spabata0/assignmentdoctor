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
                            <span class="text-thn w600 ml dgray" >CHECK YOUR</span>&nbsp;<span class="text-reg w600 ml orange">REVISIONS</span>
                        </div>
                    </div>
                    <div class="table text-left">
                    
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order</th>
                                <th scope="col">Days Passed</th>
                                <th scope="col">Request for Revision</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if($query == false) { ?>
                                <tr>
                                <th scope="row"></th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                              </tr>   
                            <?php } else { ?> 
                            <?php foreach ($query as $row){ ?>   
                              <tr>
                                <td scope="row"><?=$row->id;?></td>
                                <td><?=$row->order_name;?></td>
                                <td><?=abs($row->elapse_days);?></td>
                                <td><a href="revision_history?oid=<?=$row->id?>" >View History</a></td>
                              </tr>
                              <?php } ?>
                              <?php }?>
                            </tbody>
                          </table>
                          
                            <hr/>

                        </div>   
                </div>
        </div>
    </div>
    </main>
        
    </div>
<?=$footer;?>