<?=$header;?>
<main id="main">
<section id="news-inner-page">
    <div class="container">   
        <div class="col-lg-12">
            <img src="<?=base_url().'assets/uploads/'.$page[0]->image_url;?>" class="img-fluid" style="width:100%"/>
            <?=html_entity_decode($page[0]->description);?>
        </div>
        <?php if(count($image > 0)):?>
        <script type="text/javascript">
          var vcount = "<?php echo isset($image) ? count($image) : 3;?>";
        </script>
        <div class="col-lg-12">
        <ul id="responsive" class="gallery content-slider list-unstyled clearfix lightSlider lsGrab lSSlide">
            
            <?php foreach($image as $key => $val):?>
            <?php $active = ($key == 0) ? 'active' : '';?>
            <li class="lslide <?=$active;?>" style="width: 233.5px; margin-right: 10px;">
                <a class="img-enlarge"href="javascript:void(0)" data-rel="<?=base_url().$val['img'];?>"><img class="img-fluid" src="<?=base_url().$val['img'];?>" /></a>
            </li>
            <?php endforeach;?>
        </ul>
        </div>
      <?php endif;?>
    </div>
</section>
<!-- The Modal -->
<div class="modal" id="imgModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <img class="data-image img-fluid" src="" />
      </div>

     
    </div>
  </div>
</div>
</main>
<?=$footer;?>