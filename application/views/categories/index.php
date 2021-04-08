<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Categories</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>categories/add">Add Categories</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Category</th>
                      <th>Description</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $n) {?>
                        <tr>
                            <td><?=$n->category;?></td>
                            <td><?=$n->description;?></td>
                            <td>
                                <a href="<?=base_url();?>categories/edit/<?=$n->id_categories;?>">Edit</a>
                                <a href="<?=base_url();?>categories/delete/<?=$n->id_categories;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
