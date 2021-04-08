<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Videos</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a class="btn btn-primary" href="<?=base_url();?>videos/add">Add Videos</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($videos as $n) {?>
                        <tr>
                            <td><?=$n->video_name;?></td>
                            <td>
                                <a href="<?=base_url();?>videos/edit/<?=$n->id_videos;?>">Edit</a>
                                <a href="<?=base_url();?>videos/delete/<?=$n->id_videos;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
