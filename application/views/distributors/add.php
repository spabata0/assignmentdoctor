<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Add Distributors</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>distributors/add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Title:</label>
                    <input class="form-control" name="name" value="<?=set_value('name');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Longitude:</label>
                    <input class="form-control" name="latitude" value="<?=set_value('latitude');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Latitude:</label>
                    <input class="form-control" name="latitude" value="<?=set_value('latitude');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Address:</label>
                    <input class="form-control" name="address" value="<?=set_value('address');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Company website:</label>
                    <input class="form-control" name="company_website" value="<?=set_value('company_website');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Email Address:</label>
                    <input class="form-control" name="email_address" value="<?=set_value('email_address');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    <label>Contact Number:</label>
                    <input class="form-control" name="contact_number" value="<?=set_value('contact_number');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
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
                    <a href="<?=base_url();?>/distributors" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?=$footer;?>
