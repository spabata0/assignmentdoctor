<?=$header;?>

<div class="row">

    <div class="col-xs-12">

        <h1 class="page-header">Add Banner</h1>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <form id="fileupload" method="post" action="<?=base_url();?>banners/add" enctype="multipart/form-data">

            <div class="row">

                <div class="col-xs-4 form-group">

                    <label>*Title:</label>

                    <input class="title form-control" name="title" value="<?=set_value('title');?>">

                </div>

                <?=form_error('title');?>

            </div>

            <div class="row">

                <div class="col-xs-4 form-group">

                    <label>Description:</label>

                    <input class="title form-control" name="description" value="<?=set_value('description');?>">

                </div>

                <?=form_error('description');?>

            </div>

            <div class="row">

                <div class="col-xs-12">

               <div class="panel panel-default">

                    <div class="panel-heading">

                        Add Banner Images

                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="banner-container col-xs-12">

                                <div class="clone" style="border:1px solid black;margin-top:5px;padding:10px">

                                    <div class="float-right form-group">

                                        <a href="javascript:void(0);" class="add btn btn-primary">+</a>  <a href="javascript:void(0);" class="remove btn btn-primary">-</a>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-4">

                                            <label>Image:</label>

                                            <input type="file" class="form-control" name="banner_file[]" />

                                        </div>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-4">

                                            <label>Title:</label>

                                            <input type="text" class="form-control" name="image_title[]" />

                                        </div>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-8">

                                            <label>Description:</label>

                                            <textarea name="image_description[]" class="form-control"></textarea>

                                        </div>

                                    </div>

                                     <div class="row form-group">

                                        <div class="col-xs-8">

                                            <label>Link:</label>

                                            <input type="text" name="image_link[]" class="form-control">

                                        </div>

                                    </div>

                                </div>

                            </div>

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

    // CKEDITOR.replace( 'editor1', {

    //     filebrowserBrowseUrl: '<?=base_url();?>assets/ckfinder/ckfinder.html?resourceType=Files'

    // });

    $(".tbl").on('change','.imgInp',function(){

        readURL(this);

    });

    //

    $('.remove').hide();

    $('.banner-container').on('click','.add' ,function(){

        var t = $('.banner-container').find('div.clone:first');

        // var tbll = $(this).closest('.tbll');

        // var ctr = 0;

        

        if($('.banner-container').find('div.clone').length >= 1){

            $('.remove').show();

        }

        t.clone().appendTo('.banner-container');

        

        // $('div.bu-clone:last').find('tbody > tr').each(function(){

        //     $(this).closest('.remove').hide();

        //     $(this).find(".xx").val("");

        //     $(this).find("select").val(""); 

        //     if(ctr < t.find('tbody > tr').length -1){

        //         $(this).remove();        

        //     }

        //     ctr++;

        // });

        

        // $('div.bu-clone:last').find("[data-rel='bu-select']").val("");

        // if($('div.bu-clone:last').find('tbody > tr').length === 1){

        //     $('div.bu-clone:last').find('tbody > tr').find('.remove').hide();

        // }

        

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

