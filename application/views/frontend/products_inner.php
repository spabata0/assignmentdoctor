<?=$header;?>

<main id="main">

    <div class="container-fluid about" style="padding-left:0;padding-right:0">    

        <img src="<?=base_url();?>assets/uploads/<?=$page[0]->image;?>" class="img-fluid" alt="">

    </div>

    <div class="container-fluid" style="padding-left: 0;
    padding-right: 0;">



            <?=html_entity_decode($page[0]->long_desc);?>

        

    </div>

</main>

<?=$footer;?>

