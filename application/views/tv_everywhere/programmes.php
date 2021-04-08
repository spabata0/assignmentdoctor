<?=$header;?>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked sidenav">
                    <li>
                        <a href="<?=base_url();?>coming-soon">COMING SOON</a>
                    </li>
                    <li>
                        <a class="side_active" href="<?=base_url();?>programmes">PROGRAMMES</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>competitions">FILM COMPETITION</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <section id="about-us" class="bd_section">
                    <div class="row">
                        <div class="col-md-12">
                            <?php $x = 0;?>
                           <h1></h1>
                            <?php foreach($programmes as $p) {?>
                                     <div class="row">
                                            <div class="col-md-12">
                                                <?php foreach($p as $t){?>
                                                <a href="<?=base_url();?>programmes/<?=$t['url'];?>">
                                                    <div class="col-md-3 text-center">
                                                    <img src="http://channelhue.tv/auth/assets/uploads/<?=$t['img_url'];?>" width=350 height=200 style="width:100%;height:200px;" />
                                                    <h4><?=$t['programme_name'];?></h4>
                                                </a>
                                                </div>
                                          
                                    <?php } ?> 
                                      </div> 
                                        </div>
                              <?php } ?> 
                        </div>
                
                    </div>

                </section>
            </div>
        </div>

    </div>
<?=$footer;?>