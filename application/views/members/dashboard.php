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
                            <span class="text-thn w600 ml dgray" >Welcome</span>&nbsp;<span class="text-reg w600 ml orange"><?=$username?></span>
                        </div>
                    </div>
                    <div class="table text-left">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order</th>
                                <th scope="col">Urgency Level</th>
                                <th scope="col"># of Pages</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if($query == null) { ?>
                                <tr>
                                <th scope="row">-</th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                              </tr>  
                            <?php } else {?>
                            <?php foreach ($query->result() as $row){ ?>    
                              <tr>
                                <th scope="row"><?=$row->id;?></th>
                                <td><?=$row->order_name;?></td>
                                <td><?=$row->urgency;?></td>
                                <td><?=$row->no_of_pages;?></td>
                                <td><?=$row->price;?></td>
                                <td><?=$row->status;?></td>
                              </tr>
                              <?php } ?>
                              <?php } ?>
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