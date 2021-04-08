<?=$header;?>
<?php 
// print '<pre>'.print_r($programmes,true).'</pre>';
?>
<div class="container-fluid">
        <section id="first" style="border:1px solid #000;background-color: #000;color:#FFF;">
            <div class="row">
                <div class="col-md-12 banner_header">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="logo center-block" src="<?=base_url();?>assets/img/huelogo.gif" />
                        </div>
                    </div>
                    <h1>CHANNEL HUE TVEverywhere</h1>
                </div>
            </div>
        </section>
        <section id="featured-vid" class="bd_section">
            <div class="row">
                <div class="col-md-12">
                    <h1>FEATURED VIDEO</h1>
                </div>
                <div class="col-md-12">
                    <iframe src="https://player.vimeo.com/video/230031582" width="800" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allowfullscreen ></iframe>
                </div>
            </div>
        </section>
        <section id="programmes" class="bd_section">
        	<?php $x = 0;?>
        	       <h1></h1>
					<?php foreach($programmes as $p) {?>
                             <div class="row">
                                    <div class="col-md-12">
                            <?php foreach($p as $t){?>
                               
                                            <a href="<?=base_url();?>programmes/<?=$t['url'];?>">
                                                    <div class="col-md-3 text-center">
                                                    <img src="<?=IMG_URL;?>assets/uploads/<?=$t['img_url'];?>" width=350 height=200 "/>
                                                    <h4><?=$t['programme_name'];?></h4>
                                                </a>    
                                        </div>
                                  
                            <?php } ?> 
                              </div> 
                                </div>
		      		  <?php } ?> 
            <a class="btn btn-danger btn-learmore" href="<?=base_url();?>programmes">View All Programmes</a>
        </section>
    </div>
<?=$footer;?>