<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Products</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4 form-group">
            <a class="btn btn-primary" href="<?=base_url();?>products/add">Add Products</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Date Posted</th>
                      <th>Status</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $n) {?>
                        <tr>
                            <td><?=$n->title;?></td>
                            <td><?=$n->category;?></td>
                            <td><?=$n->subcategory_name;?></td>
                            <td><?=date("m-d-Y",strtotime($n->date_created));?></td>
                            <td><?php echo ($n->is_publish ==1)? 'Published':'Draft';?></td>
                            <td>
                                <a href="<?=base_url();?>products/edit/<?=$n->id_products;?>">Edit</a>
                                <a href="<?=base_url();?>products/delete/<?=$n->id_products;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
