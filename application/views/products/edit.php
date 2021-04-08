<?=$header;?>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    Edit Products
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12">
            <form id="form" method="post" action="<?=base_url();?>products/edit/<?=$products[0]->id_products;?>" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-xs-4">
                        <label>Title:</label>
                        <input class="form-control" name="title" value="<?=set_value('title',$products[0]->title);?>">
                        <?=form_error('title');?>
                    </div>   
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-4 form-group form-inline">
                        <label><?=base_url();?></label>
                        <input class="form-control" name="slug" value="<?=set_value('slug',$products[0]->slug);?>">
                    </div>
                    <?=form_error('slug');?>
                </div>
                <div class="row ">
                    <div class="col-xs-3">
                        <label>Category:</label>
                        <select class="category form-control" name="category">
                            <option value="">Select Product Category</option>
                            <?php foreach($categories as $c){ ?>
                                <option value="<?=$c->id_categories;?>" <?php echo ($c->id_categories == $products[0]->id_categories) ? 'selected':'';?>><?=$c->category;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row subcategory">
                    <div class="col-xs-3">
                        <label>Subcategory:</label>
                        <select class="form-control" name="subcategory_id">
                            <option value="">Select Product Subcategory</option>
                            <?php foreach($subcategories as $c){ ?>
                                <option value="<?=$c->id_subcategories;?>" <?php echo ($c->id_subcategories == $products[0]->subcategory_id) ? 'selected':'';?>><?=$c->subcategory_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <label>Product Banner Image:</label>
                        <input id="bannerImg" class="form-control" name="image_url" type="file" value="<?=set_value('image_url');?>">
                        <input type="hidden" name="image" class="data_image" value="<?php echo !empty($products[0]->image) ? base_url().'/assets/uploads/'.$products[0]->image:'';?>"/>
                        <?php
                            if(!empty($products[0]->image)){
                        ?>
                                <img src="<?php echo base_url().'assets/uploads/'.$products[0]->image;?>" style="width:100%" />
                        <?php } ?>
                    </div>
                    <?=form_error('image_url');?>
                </div>
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Featured Image:</label>
                        <input class="form-control" name="featured_image_url" type="file" value="<?=set_value('featured_image_url');?>">
                        <?php
                            if(!empty($products[0]->featured_image_url)){
                        ?>
                                <img src="<?php echo base_url().'assets/uploads/'.$products[0]->featured_image_url;?>" style="width:100%" />
                        <?php } ?>
                    </div>
                    <?=form_error('featured_image_url');?>
                </div>
                 <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Featured Video:</label>
                        <input class="form-control" name="video_url" type="text" value="<?=set_value('video_url',$products[0]->video_url);?>">
                    </div>
                    <?=form_error('video_url');?>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <label>Short Description:</label>
                        <input class="form-control" name="news_short_desc" value="<?=set_value('news_short_desc',$products[0]->meta_desc);?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>Body:</label>
                        <textarea id="editor1" name="description"><?=set_value('description',$products[0]->long_desc);?></textarea>
                    </div>
                    <?=form_error('description');?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label>Status:</label>
                        <select class="form-control" name="is_active">
                            <option value="0" <?php echo ($products[0]->is_active ==0) ? 'selected' :'';?>>Draft</option>
                            <option value="1" <?php echo ($products[0]->is_active ==1) ? 'selected' :'';?>>Publish</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="checkbox">
                            <label><input type="checkbox"  id="is_hf" name="is_hf"  <?php echo ($products[0]->is_hf == 1) ? 'checked':'';?>/>Featured to Homepage?</label>
                        </div>
                    </div> 
                </div>
                <hr/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-12">
                        <button class="btn btn-success">Submit</button>
                        <!-- <input type="submit" class="preview btn btn-primary" value="Preview"/> -->
                        <a href="javascript:void(0);" target="_blank" class="preview btn btn-primary">Preview</a>
                        <a href="<?=base_url();?>/products" class="btn btn-danger">Cancel</a>
                        </div>     
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '<?=base_url();?>assets/ckfinder/ckfinder.html?resourceType=Files'
    });
</script>
<?=$footer;?>
