<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add Role</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>news/add">
             <div class="row">
                <div class="col-xs-12">
                    <label>URL:</label>
                    <input class="form-control" name="news_url" value="<?=set_value('news_url');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="news_title" value="<?=set_value('news_title');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Short Description:</label>
                    <input class="form-control" name="news_short_desc" value="<?=set_value('news_short_desc');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Description:</label>
                    <textarea id="editor1" name="description"><?=set_value('description');?></textarea>
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
        filebrowserBrowseUrl: '<?=base_url();?>assets/ckfinder/ckfinder.html?resourceType=Files'
    });
</script>
<?=$footer;?>
