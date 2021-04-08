<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add News</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form id="fileupload" method="post" action="<?=base_url();?>news/add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Banner Image:</label>
                    <input class="form-control" name="image_url" type="file" value="<?=set_value('url');?>">
                </div>
                <?=form_error('image_url');?>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>*Title:</label>
                    <input class="title form-control" name="news_title" value="<?=set_value('news_title');?>">
                </div>
                <?=form_error('news_title');?>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>*URL:</label>
                    <input class="slug form-control" name="slug" value="<?=set_value('slug');?>">
                </div>
                <?=form_error('news_url');?>
            </div>
            
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label>Short Description:</label>
                    <input class="form-control" name="news_short_desc" value="<?=set_value('news_short_desc');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>*Body:</label>
                    <textarea id="editor1" name="description"><?=set_value('description');?></textarea>
                </div>
                <?=form_error('description');?>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        Banner Images
                    </div>
                    <div class="panel-body">
                    <div id="image_preview">
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
                    </div>
                    </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Publish</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
            </div>
            <hr>
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
    $(".tbl").on('change','.imgInp',function(){
        readURL(this);
    });
    var _xclone = function(tbll){
        var _clone_firstrow =  tbll.find("tbody > tr.clone:first").clone();
        _clone_firstrow.find("input").val("");
        _clone_firstrow.find("img-preview").attr('src','');
        _clone_firstrow.find("img-title").val("");
        return _clone_firstrow;
    }
    $('.remove').hide();
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
        $('.img-title').html(input.files[0].name);
        // console.log(input.files);
        reader.onload = function (e) {
           
            $('.tbl').find('.img-preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?=$footer;?>
