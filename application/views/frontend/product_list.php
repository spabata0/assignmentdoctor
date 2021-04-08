<?=$header;?>
<main id="main">
    <div class="container about"> 
        <p class="breadcrumbs"><a href="<?=base_url();?>">Home </a><i class="icofont-rounded-right"></i> Products & Solutions <i class="icofont-rounded-right"></i><?=ucfirst($products[0]->category);?> <?php echo !empty($subcategory[0]->subcategory_name) ? '<i class="icofont-rounded-right"></i>'.$subcategory[0]->subcategory_name.'</p>':'';?>
        <hr/>
        <?php
        $url ="";
        //Columns must be a factor of 12 (1,2,3,4,6,12)
        $numOfCols = 4;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        foreach ($products as $row){
        if($row->category_id == 1){
            $url= base_url().'product/'.strtolower($row->category).'/'.$row->slug_name.'/'.$row->slug;;
        }else{
            $url = base_url().'product/'.strtolower($row->category).'/'.$row->slug;
        }
        if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
            $rowCount++; 
        ?>  
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            
            <a href="<?=$url;?>">
                <div class="thumbnail text-center">
                    <img src="<?=base_url();?>assets/uploads/<?=$row->featured_image_url;?>" class="img-fluid" alt="">
                    <h5 style="font-size: 1rem;"><?=$row->title;?></h5>
                </div>
            </a>
        </div>
    <?php if($rowCount % $numOfCols == 0) { ?> </div> <?php } } ?>
    </div>
</main>
<?=$footer;?>