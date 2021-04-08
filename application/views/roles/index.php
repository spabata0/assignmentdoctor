<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Role Management</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>news/add">Add News</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>News Title</th>
                      <th>News URL</th>
                      <th>Date Posted</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $n) {?>
                        <tr>
                            <td><?=$n->news_title;?></td>
                            <td><?=$n->news_short_desc;?></td>
                            <td><?=date("d-m-Y",strtotime($n->date_created));?></td>
                            <td>
                                <a href="<?=base_url();?>news/edit/<?=$n->id_news;?>">Edit</a>
                                <a href="<?=base_url();?>news/delete/<?=$n->id_news;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
