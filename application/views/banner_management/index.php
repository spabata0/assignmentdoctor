<?=$header;?>

<div class="row">

    <div class="col-xs-12">

        <h1 class="page-header">Banner Management</h1>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <div class="col-xs-4">

            <a class="btn btn-primary" href="<?=base_url();?>banners/add">Add Banners</a>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <div class="col-xs-12">

        <?php if(!empty($banners)):?>

            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">

                <thead>

                    <tr>

                      <th>Banner Name</th>

                      <th>Description</th>

                      <th>Date Posted</th>

                       <th></th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($banners as $n) {?>

                        <tr>

                            <td><?=$n->title;?></td>

                            <td><?=$n->description;?></td>

                            <td><?=date("d-m-Y",strtotime($n->created_at));?></td>

                            <td>

                                <a href="<?=base_url();?>banners/edit/<?=$n->id_banners;?>">Edit</a>

                                <a href="<?=base_url();?>banners/delete/<?=$n->id_banners;?>">Delete</a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        <?php else: ?>

            <h2>No items found</h2>

        <?php endif;?>

        </div>

    </div>

</div>

<?=$footer;?>

