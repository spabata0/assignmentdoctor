<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add User</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>users/add">
            <div class="row">
                <div class="col-xs-12">
                    <label>Username:</label>
                    <input class="form-control" type="text" name="username" value="<?=set_value('username');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Password:</label>
                    <input class="form-control" type="password" name="password" value="<?=set_value('password');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Lastname:</label>
                    <input class="form-control" type="text" name="lastname" value="<?=set_value('lastname');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Firstname:</label>
                    <input class="form-control" type="text" name="firstname" value="<?=set_value('firstname');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Email Address:</label>
                    <input class="form-control" type="text" name="email" value="<?=set_value('email');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Mobile Number:</label>
                    <input class="form-control" type="text" name="mobile_no" value="<?=set_value('mobile_no');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="role_id">
                        <option value="1">Administrator</option>
                        <option value="2">Employee</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-success">Submit</button>
                    <a href="<?=base_url();?>/news" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '<?=base_url();?>assets/ckfinder/ckfinder.html?resourceType=Files'
    });
</script>
<?=$footer;?>
