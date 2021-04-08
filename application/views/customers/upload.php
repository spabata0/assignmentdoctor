<?=$header;?>

<div class="row">

    <div class="col-md-12">

        <h1 class="page-header">Customers</h1>

        <div class="col-md-12">

                <div class="alert alert-success">

                  <strong><?=$message;?></strong>

                </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <form enctype="multipart/form-data" method="post" action="<?=base_url();?>customers/upload/" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload output file to customer.</h4>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Output file:</label>
                                    <input type="file" name="output" id="output">
                                    <input type="text" name="oid" value="<?=$this->input->get('oid');?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php if($output_file != false) { ?>
                                <?=$output_file[0]->output_file;?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Submit"/>
                                <a href="<?=base_url();?>customers/" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>

                    <hr/>


                </div>
            </div>        
        </form>

    </div>

</div>



<?=$footer;?>