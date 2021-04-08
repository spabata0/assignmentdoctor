<?=$header;?>

<div class="row">

    <div class="col-md-12">

        <h1 class="page-header">System Configuration</h1>

        <div class="col-md-12">

            <?php if($this->session->flashdata('success')) { ?>

                <div class="alert alert-success">

                  <strong><?=$this->session->flashdata('success');?></strong>

                </div>

            <?php }else if($this->session->flashdata('error')){ ?>

                <div class="alert alert-danger">

                  <strong><?=$this->session->flashdata('error');?></strong>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <form enctype="multipart/form-data" method="post" action="<?=base_url();?>settings/updateConfig" >
../images/
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h4>General</h4>

                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Company Logo:</label>

                                    <input type="file" name="fileToUpload" id="fileToUpload">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <img src="<?php echo (!empty($settings[0]->value)) ? base_url().'/assets/uploads/'.$settings[0]->value : base_url().'assets/images/no-image.png';?>" width="150" height="150"/>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Company Name:</label>

                                     <input class="form-control" type="text" name="company_name" value="<?=$settings[1]->value;?>">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Company Address:</label>

                                     <input class="form-control" type="text" name="company_address" value="<?=$settings[5]->value;?>">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Company Lat:</label>

                                     <input class="form-control" type="text" name="lat" value="<?=$settings[7]->value;?>" required>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Company Long:</label>

                                     <input class="form-control" type="text" name="long" value="<?=$settings[8]->value;?>" required>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Email Address:</label>

                                     <input class="form-control" type="text" name="email_address" value="<?=$settings[4]->value;?>">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Contact Number:</label>

                                     <input class="form-control" type="text" name="contact_number" value="<?=$settings[6]->value;?>">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h4>Social Media</h4>

                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Facebook Link:</label>

                                     <input class="form-control" type="text" name="facebook_link" value="<?=$settings[2]->value;?>">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-3">

                                    <label>Youtube Link:</label>

                                     <input class="form-control" type="text" name="youtube_link" value="<?=$settings[3]->value;?>">

                                </div>

                            </div>

                        </div>

                    </div>

                    

                </div>

            </div>

            

            <hr/>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <input type="submit" class="btn btn-success" value="Submit"/>

                        <a href="<?=base_url();?>settings" class="btn btn-danger">Cancel</a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>



<?=$footer;?>