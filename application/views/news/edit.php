<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit News</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>news/edit/<?=$news[0]->id_news;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12">
                    <label>*Image:</label>
                    <input class="form-control" name="image_url" type="file" value="<?=set_value('url');?>">
                </div>
                <?=form_error('image_url');?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>URL:</label>
                    <input class="form-control" name="slug" value="<?=set_value('slug',$news[0]->slug);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Title:</label>
                    <input class="form-control" name="news_title" value="<?=set_value('news_title',$news[0]->title);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Short Description:</label>
                    <input class="form-control" name="news_short_desc" value="<?=set_value('news_short_desc',$news[0]->news_short_desc);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Description:</label>
                    <textarea id="editor1" name="description"><?=set_value('description',$news[0]->description);?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        Banner Images
                    </div>
                    <div class="panel-body">
                    <div id="image_preview">
                        <?php if(empty($news_image)): ?>

                        <table class="tbl table table-hover">
                            <tbody>
                                <tr class="clone">
                                    <td>
                                        <div class="col-lg-3">
                                            <input type='file' class="imgInp" name="news_image[]"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <a class="add btn btn-success" href="javascript:void(0)" >+</a><a href="javascript:void(0)" class="remove btn btn-danger">-</a>
                                        </div>
                                        <div class="col-lg-12">
                                            <img class="img-preview" style="width:50px;height:50px"  src="#" alt="your image" />
                                            <p class="img-title"></p>
                                        </div>
                                       
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php else:?>
                            <?php //print '<pre>'.print_r($news_image,1).'</pre>';exit;?>
                            <table class="tbl table table-hover">
                                <tbody>
                                    <?php foreach($news_image as $ni):?>
                                    <tr class="clone">
                                        <td>
                                            <div class="col-lg-3">
                                                <input type='file' class="imgInp" name="news_image[]"/>
                                                <input type="hidden" name="existing_image[]" value="<?php echo $ni->filename;?>"/>
                                                 <input type="hidden" name="image_id[]" value="<?php echo $ni->id_images;?>"/>
                                            </div>
                                            <div class="col-lg-3">
                                                <a class="add btn btn-success" href="javascript:void(0)" >+</a><a href="javascript:void(0)" class="remove btn btn-danger">-</a>
                                            </div>
                                            <div class="col-lg-12">
                                                <img class="img-preview" style="width:50px;height:50px"  src="<?php echo base_url();?><?php echo $ni->filename;?>" alt="your image" />
                                                <p class="img-title"></p>
                                            </div>     
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php endif;?>
                    </div>
                    </div>
                    </div>
                </div>   
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1" <?=($news[0]->is_active == 1) ? 'selected':'';?>>Active</option>
                        <option value="0" <?=($news[0]->is_active == 0) ? 'selected':'';?>>Inactive</option>
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
    $(document).ready(function(){
        var t = $(".tbl tr").length;
        $('.remove').hide();
     
        $(".tbl").on('change','.imgInp',function(){
          
            readURL(this);
        });

        if(t > 1){
            $('.remove').show();
        }
        var _xclone = function(tbll){
            var _clone_firstrow =  tbll.find("tbody > tr.clone:first").clone();
            _clone_firstrow.find("input").val("");
            _clone_firstrow.find(".img-preview").attr('src','');
            _clone_firstrow.find(".img-title").val("");
            return _clone_firstrow;
        }
        
        $(".tbl").on('click','.add',function(){
            var tbll = $(this).closest('.tbl');
            _xclone(tbll).appendTo(tbll);

            if(tbll.find('tr.clone').length >1){
                tbll.find('.remove').show();
            }
        });
        $(".tbl").on('click','.remove',function(){
            var tbll = $(this).closest('.tbl');
            console.log(tbll.find('tr.clone').length);
            if(tbll.find('tr.clone').length == 2) {
                tbll.find('.remove').hide();
            }
            $(this).parent().parent().remove();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('.tbl').find("tbody > tr.clone:last").find('.img-title').html(input.files[0].name);
                // console.log(input.files);
                reader.onload = function (e) {
                   
                    $('.tbl').find("tbody > tr.clone:last").find('.img-preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
    
    
</script>
<?=$footer;?>
