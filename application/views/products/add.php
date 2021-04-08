<?=$header;?>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    Add Products
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?=base_url();?>products/add" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Title:</label>
                        <input class="form-control" name="title" value="<?=set_value('title');?>">
                        <?=form_error('title');?>
                    </div>   
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-4 form-group form-inline">
                        <label><?=base_url();?></label>
                        <input class="form-control" name="slug" value="<?=set_value('slug');?>">
                    </div>
                    <?=form_error('slug');?>
                </div>
                <div class="row">
                    <div class="col-xs-3 form-group">
                        <label>Category:</label>
                        <select class="category form-control" name="category">
                            <option value="">Select Product Category</option>
                            <?php foreach($categories as $c){ ?>
                                <option value="<?=$c->id_categories;?>"><?=$c->category;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row subcategory">
                    <div class="col-xs-3 form-group">
                        <label>Subcategory:</label>
                        <select class="form-control" name="subcategory_id">
                            <option value="">Select Product Subcategory</option>
                            <?php foreach($subcategories as $c){ ?>
                                <option value="<?=$c->id_subcategories;?>"><?=$c->subcategory_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Product Banner Image:</label>
                        <input id="bannerImg" class="form-control" name="image_url" type="file" value="<?=set_value('image_url');?>">
                        <input type="hidden" name="image" class="data_image" value=""/>
                    </div>
                    <?=form_error('image_url');?>
                </div>
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Featured Image:</label>
                        <input class="form-control" name="featured_image_url" type="file" value="<?=set_value('featured_image_url');?>">
                    </div>
                    <?=form_error('featured_image_url');?>
                </div>
                 <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Featured Video:</label>
                        <input class="form-control" name="video_url" type="text" value="<?=set_value('video_url');?>">
                    </div>
                    <?=form_error('video_url');?>
                </div>
                <div class="row">
                    <div class="col-xs-4 form-group">
                        <label>Short Description:</label>
                        <input class="form-control" name="news_short_desc" value="<?=set_value('news_short_desc');?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label>Body:</label>
                        <textarea id="editor1" name="description"><?=set_value('description');?></textarea>
                    </div>
                    <?=form_error('description');?>
                </div>
                <div class="row">
                    <div class="col-xs-3 form-group">
                        <label>Status:</label>
                        <select class="form-control" name="is_active">
                            <option value="0">Draft</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="is_hf" value="">Featured to Homepage?</label>
                        </div>
                    </div> 
                </div>
                <hr/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-12">
                        <button class="btn btn-success">Submit</button>
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
