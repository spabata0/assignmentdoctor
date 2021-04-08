<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">User Management</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a class="btn btn-primary" href="<?=base_url();?>users/add">Add News</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-12">
            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email Address</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $n) {?>
                        <tr>
                            <td><?=$n->username;?></td>
                            <td><?=$n->firstname;?> <?=$n->lastname;?></td>
                            <td><?=$n->email;?></td>
                            <td>
                                <a href="<?=base_url();?>users/edit/<?=$n->id_accounts;?>">Edit</a>
                                <a href="<?=base_url();?>users/delete/<?=$n->id_accounts;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$footer;?>
