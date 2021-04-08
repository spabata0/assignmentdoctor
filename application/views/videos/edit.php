<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Video</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>videos/edit/<?=$videos[0]->id_videos;?>">
            <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="video_name" value="<?=set_value('video_name',$videos[0]->video_name);?>">
                    <?=form_error('video_name');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Image Thumbnail URL:</label>
                    <input class="form-control" name="vid_thumb" value="<?=set_value('vid_thumb',$videos[0]->vid_thumb);?>">
                    <?=form_error('vid_thumb');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Video Code:</label>
                    <textarea class="form-control" name="vid_url"><?=set_value('vid_url',$videos[0]->video_url);?></textarea>
                    <?=form_error('vid_url');?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Video Author:</label>
                    <input class="form-control" name="video_author" value="<?=set_value('video_author',$videos[0]->video_author);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?=($videos[0]->is_active == 1) ? 'selected':'';?>>Active</option>
                        <option value="0" <?=($videos[0]->is_active == 0) ? 'selected':'';?>>Inactive</option>
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
