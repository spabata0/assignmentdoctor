<?=$header;?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Distributors</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <form method="post" action="<?=base_url();?>distributors/edit/<?=$distributors[0]->id_distributors;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Title:</label>
                    <input class="form-control" name="name" value="<?=set_value('name',$distributors[0]->name);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Longitude:</label>
                    <input class="form-control" name="longitude" value="<?=set_value('longitude',$distributors[0]->longitude);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Latitude:</label>
                    <input class="form-control" name="latitude" value="<?=set_value('latitude',$distributors[0]->latitude);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Address:</label>
                    <input class="form-control" name="address" value="<?=set_value('address',$distributors[0]->address);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Company website:</label>
                    <input class="form-control" name="company_website" value="<?=set_value('company_website',$distributors[0]->company_website);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Email Address:</label>
                    <input class="form-control" name="email_address" value="<?=set_value('email_address',$distributors[0]->email_address);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Contact Number:</label>
                    <input class="form-control" name="contact_number" value="<?=set_value('contact_number',$distributors[0]->contact_number);?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label>Status:</label>
                    <select class="form-control" name="is_active">
                        <option  value="1" <?php echo ($distributors[0]->is_active == 1) ? 'selected':'';?>>Active</option>
                        <option value="0" <?php echo ($distributors[0]->is_active == 0) ? 'selected':'';?>>Inactive</option>
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
