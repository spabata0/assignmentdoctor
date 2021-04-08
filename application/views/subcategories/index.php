<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Subcategories</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>subcategories/add">Add Subcategory</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Subcategory</th>
                      <th>Description</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subcategories as $n) {?>
                        <tr>
                            <td><?=$n->subcategory_name;?></td>
                            <td><?=$n->description;?></td>
                            <td>
                                <a href="<?=base_url();?>subcategories/edit/<?=$n->id_subcategories;?>">Edit</a>
                                <a href="<?=base_url();?>subcategories/delete/<?=$n->id_subcategories;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
