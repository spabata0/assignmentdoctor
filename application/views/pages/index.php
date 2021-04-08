<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Pages</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>pages/add">Add Pages</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Page Title</th>
                      <th>Page URL</th>
                      <th>Date Posted</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pages as $n) {?>
                        <tr>
                            <td><?=$n->page_title;?></td>
                            <td><?=$n->url;?></td>
                            <td><?=date("d-m-Y",strtotime($n->date_created));?></td>
                            <td>
                                <a href="<?=base_url();?>pages/edit/<?=$n->id_pages;?>">Edit</a>
                                <a href="<?=base_url();?>pages/delete/<?=$n->id_pages;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
