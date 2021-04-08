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

                            <h1><?=$programmes[0]->programme_title;?></h1>
                        </div>
                
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <center>
                          <?=utf8_decode(htmlspecialchars_decode($programmes[0]->description));?>
                         </center>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
<?=$footer;?>   