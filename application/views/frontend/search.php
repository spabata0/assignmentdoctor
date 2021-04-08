<?=$header;?>
<section id="search">
<div class="container">
    <hr/>
    <div class="row">
        <div class="col-md-12">
            Search result for '<?=$search_key;?>'
        </div>
    </div>
    <div class="mt-3">
    <?php 
        $content_type = "";
        $type = "";
    ?>
    <?php if(!empty($search_result)){ ?>
        <?php foreach($search_result as $objSearch){ ?>
            <div class="row">
                <?php
                    if(!empty($objSearch->content_type)){
                        $content_type = $objSearch->content_type.'/';
                    }
                    if(!empty($objSearch->type)){
                        $type = $objSearch->type.'/';
                    }
                ?>
                <a href="<?=base_url().$content_type.$type.$objSearch->slug;?>">
                    <div class="col-md-12">
                        <?=ucfirst($objSearch->type);?><i class="icofont-rounded-right"></i><?=$objSearch->title;?>
                    </div>
                    <div class="col-md-12">
                        <p><?=$objSearch->meta_desc;?></p>
                    </div>
                </a>
            </div>
        <?php } ?>
    <?php }else{ ?>
    <div class="row">
        <div class="col-md-12">
            <h1>No results found</h1>
        </div>
    </div>
    <?php } ?>
    </div>
</div>
</section>
<?=$footer;?>