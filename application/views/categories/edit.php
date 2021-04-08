<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>categories/add" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="category" value="<?=set_value('category');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Description:</label>
                    <input class="form-control" name="description" value="<?=set_value('description');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
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
