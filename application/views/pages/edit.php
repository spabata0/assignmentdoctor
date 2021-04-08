<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Page</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>pages/edit/<?=$pages[0]->id_pages;?>" enctype="multipart/form-data">
             <div class="row">
                <div class="col-xs-12">
                    <label>URL:</label>
                    <input class="form-control" name="url" value="<?=set_value('url',$pages[0]->url);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="page_title" value="<?=set_value('page_title',$pages[0]->page_title);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Description:</label>
                    <textarea id="editor1" name="page_content"><?=set_value('page_content',html_entity_decode($pages[0]->page_content));?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?=($pages[0]->is_active == 1) ? 'selected':'';?>>Active</option>
                        <option value="0" <?=($pages[0]->is_active == 0) ? 'selected':'';?>>Inactive</option>
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
