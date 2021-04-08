<?=$header;?>

<div class="row">

    <div class="col-xs-12">

        <h1 class="page-header">Edit Banner</h1>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <form id="fileupload" method="post" action="<?=base_url();?>banners/edit/<?=$banners[0]->id_banners;?>" enctype="multipart/form-data">

            <div class="row">

                <div class="col-xs-4 form-group">

                    <label>*Title:</label>

                    <input class="title form-control" name="title" value="<?=set_value('title',$banners[0]->title);?>">

                </div>

                <?=form_error('title');?>

            </div>

            <div class="row">

                <div class="col-xs-4 form-group">

                    <label>Description:</label>

                    <input class="title form-control" name="description" value="<?=set_value('description',$banners[0]->description);?>">

                </div>

                <?=form_error('description');?>

            </div>

            <div class="row">

                <div class="col-xs-12">

               <div class="panel panel-default">

                    <div class="panel-heading">

                        Banner Images

                    </div>

                    <div class="panel-body">

                        <div class="banner-container col-xs-12">

                        <?php foreach($banners as $objBanners):?>

                        

                            

                                <div class="clone" style="border:1px solid black;margin-top:5px;padding:10px">

                                    <div class="float-right form-group">

                                        <a href="javascript:void(0);" class="add btn btn-primary">+</a>  <a href="javascript:void(0);" class="remove btn btn-primary">-</a>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-4">

                                            <label>Image:</label>

                                            <input type="file" class="form-control tbl" name="banner_file[]" />

                                            <input type="hidden" class="form-control xhid" name="banner_image_id[]"  value="<?php echo $objBanners->id_banner_images;?>"/>

                                            <img class="img-fluid xprev img-preview" style="width:300px;height:300px" src="<?=base_url().'assets/uploads/'.$objBanners->image_name;?>" />

                                        </div>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-4">

                                            <label>Title:</label>

                                            <input type="text" class="form-control xtitle" name="image_title[]"  value="<?=$objBanners->image_title;?>"/>

                                        </div>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-8">

                                            <label>Description:</label>

                                            <textarea class="form-control xdesc" name="image_description[]" ><?=$objBanners->image_description;?></textarea>

                                        </div>

                                    </div>

                                    <div class="row form-group">

                                        <div class="col-xs-8">

                                            <label>Link:</label>

                                            <input type="text" class="form-control xlink" name="image_link[]" value="<?=$objBanners->image_link;?>"/>

                                        </div>

                                    </div>

                                </div>

                         

                        <?php endforeach;?>

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

   

    $('.banner-container').on('change','.tbl',function(){

        var input = this;

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            $('.img-title').html(input.files[0].name);

            // console.log(input.files);

            reader.onload = function (e) {

                console.log(e);

                $('div.clone:last').find('.img-preview').attr('src', e.target.result);

            }

            

            reader.readAsDataURL(input.files[0]);

        }



        // readURL(this);



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

        $('div.clone:last').find('.xprev').attr('src','');

        $('div.clone:last').find('.xhid').val('');

        $('div.clone:last').find('.xtitle').val('');

        $('div.clone:last').find('.xdesc').val('');

        $('div.clone:last').find('.xlink').val('');

    });



    if($('div.clone').length > 1){

        $('.remove').show();

    }

    $('.remove').click(function(){

        $(this).parent().parent().remove();

    });

    console.log($('div.clone').length);





</script>

<?=$footer;?>

