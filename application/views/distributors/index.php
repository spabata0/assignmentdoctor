<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Distributors</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>distributors/add">Add Distributor</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Distributor Name</th>
                      <th>Location</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($distributors as $n) {?>
                        <tr>
                            <td><?=$n->name;?></td>
                            <td><?=$n->address;?></td>
                            
                            <td>
                                <a href="<?=base_url();?>distributors/edit/<?=$n->id_distributors;?>">Edit</a>
                                <a href="<?=base_url();?>distributors/delete/<?=$n->id_distributors;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
