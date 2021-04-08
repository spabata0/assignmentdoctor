<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Subcategory</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>subcategories/edit/<?=$subcategory[0]->id_subcategories;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Category:</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach($category as $objCategory):?>
                            <option value="<?=$objCategory->id_categories;?>" <?php echo ($subcategory[0]->category_id == $objCategory->id_categories) ? 'selected':'' ;?>><?=$objCategory->category;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4">
                    <label>Title:</label>
                    <input class="form-control" name="subcategory_name" value="<?=set_value('subcategory_name',$subcategory[0]->subcategory_name);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Description:</label>
                    <input class="form-control" name="description" value="<?=set_value('description',$subcategory[0]->description);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <button class="btn btn-success">Submit</button>
                    <a href="<?=base_url();?>/categories" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?=$footer;?>
