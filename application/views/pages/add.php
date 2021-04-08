<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add Page</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>pages/add" enctype="multipart/form-data">
             <div class="row">
                <div class="col-xs-12">
                    <label>URL:</label>
                    <input class="form-control" name="url" value="<?=set_value('url');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="page_title" value="<?=set_value('page_title');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Short Description:</label>
                    <input class="form-control" name="page_content" value="<?=set_value('page_content');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Description:</label>
                    <textarea id="editor1" name="page_content"><?=set_value('page_content');?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-success">Submit</button>
                    <a href="<?=base_url();?>/news" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1', {
        extraAllowedContent: true,
        filebrowserBrowseUrl: '<?=base_url();?>assets/ckfinder/ckfinder.html?resourceType=Files'
    });
</script>
<?=$footer;?>
