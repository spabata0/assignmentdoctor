<?=$header;?>
<section id="news" class="news">
    <?php if(!empty($page)){?>
        <?php foreach($page as $objNews){ ?>
            <div class="container">
                <div class="row mt-2">
                <div class="col-lg-4 video-box">
                    <img src="<?=base_url();?>assets/uploads/<?=$objNews->image_url;?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8">
                    <div >
                    <h2><?=$objNews->title;?></h2>
                    <?=$objNews->news_short_desc;?>
                    <div class="mt-3 text-left">
                        <a class="btn btn-primary btn-get-started animated fadeInUp scrollto" href="<?=base_url();?>news-and-updates/<?=$objNews->slug;?>">Learn More</a>
                    </div>  
                    </div>   
                </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

</section>
<?=$footer;?>