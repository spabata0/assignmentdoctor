<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add Subcategory</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>subcategories/add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Category:</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach($category as $objCategory):?>
                            <option value="<?=$objCategory->id_categories;?>"><?=$objCategory->category;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Title:</label>
                    <input class="form-control" name="subcategory_name" value="<?=set_value('subcategory_name');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Description:</label>
                    <input class="form-control" name="description" value="<?=set_value('description');?>">
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
