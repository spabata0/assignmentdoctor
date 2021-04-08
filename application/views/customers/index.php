<?=$header;?>

<div class="row">

    <div class="col-xs-12">

        <h1 class="page-header">Orders</h1>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <div class="col-xs-4">

            <!--<a class="btn btn-primary" href="<?=base_url();?>banners/add">Add Banners</a>-->

        </div>

    </div>

</div>

<div class="row">

    <div class="col-xs-12">

        <div class="col-xs-12">

        <div class="text-right">
            <form action="<?=base_url();?>customers" method="post">
                Search:
                <input type="text" name="keyword" id="keyword"><input type="submit" value="Search" name="submit">
                <input type="hidden" name="is_search" value="1">
            </form>
        </div>

        <?php if(!empty($customers)):?>

            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Order Name</th>
                      <th>No of Pages</th>
                      <th>Urgency</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Date< Paid/th>
                      <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($customers->result() as $n) {?>
                        <tr>
                            <td><?=$n->id;?></td>
                            <td><?=$n->lastname;?>,<?=$n->firstname;?></td>
                            <td><?=$n->order_name;?></td>
                            <td><?=$n->no_of_pages;?></td>
                            <td><?=$n->urgency;?></td>
                            <td><?=$n->price;?></td>
                            <td><?=$n->status;?></td>         
                            <td><?=date("d-m-Y",strtotime($n->paid_date));?></td>
                            <td>
                                <a href="<?=base_url();?>customers/edit/<?=$n->id;?>">Edit</a>
                                <a href="<?=base_url();?>customers/delete/<?=$n->id;?>">Delete</a>
                                <a href="<?=base_url();?>customers/upload/?oid=<?=$n->id;?>">Upload Output</a>
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

