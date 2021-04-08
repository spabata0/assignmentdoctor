<?=$header;?>
<main id="main">
    <div class="container-fluid about" style="padding-left:0;padding-right:0">    
        <img src="<?php echo isset($page[0]->image) ? $page[0]->image : '';?>" class="img-fluid" alt="">
    </div>
    <div class="container">
        <div class="col-lg-12">
            <?=html_entity_decode($page[0]->long_desc);?>
        </div>
    </div>
</main>
<?=$footer;?>
