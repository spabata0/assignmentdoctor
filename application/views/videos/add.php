<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add Video</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>videos/add">
             <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="video_name" value="<?=set_value('video_name');?>">
                    <?=form_error('video_name');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Image Thumbnail URL:</label>
                    <input class="form-control" name="vid_thumb" value="<?=set_value('vid_thumb');?>">
                    <?=form_error('vid_thumb');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Video Code:</label>
                    <textarea class="form-control" name="vid_url"><?=set_value('vid_url');?></textarea>
                    <?=form_error('vid_url');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Video Author:</label>
                    <input class="form-control" name="video_author" value="<?=set_value('video_author');?>">
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
                    <a href="<?=base_url();?>/videos" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?=$footer;?>
