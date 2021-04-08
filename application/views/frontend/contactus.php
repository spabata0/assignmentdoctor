<?=$header;?>
<?php echo $map['js'];?>
<main id="main">
<section id="contact" class="contact">
<div class="container">
    <p class="breadcrumbs"><a href="<?=base_url();?>">Home </a><i class="icofont-rounded-right"></i> Contact Us </p>
    <hr/>
    <div class="row">
      <div class="col-lg-12">
        <?php if($this->session->flashdata('error')): ?>
          <div style="color:red"><?=$this->session->flashdata('error');?></div>
        <?php else: ?>
          <div style="color:green"><?=$this->session->flashdata('success');?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form id="contactForm" action="<?php echo base_url().'/welcome/inquiry';?>" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-lg-12 form-group">
                  <label>Name (Required)</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-lg-12 form-group">
                  <label>Email (Required)</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center">
                <button class="g-recaptcha btn btn-primary" 
                  data-sitekey="6LepKbwZAAAAAI40uBEV0ZgO1z8uSyL3MdteR_nm" 
                  data-callback='onSubmit' 
                  data-action='submit'>Send Message</button>
              </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="contact-us-address">
                <p><strong><?php echo !empty($company_info['company_name'][0]->value)  ? $company_info['company_name'][0]->value : '';?> </strong></p>
                <div class="row">
                  <div class="col-lg-12">
                        <?php echo !empty($company_info['company_address'][0]->value)  ? $company_info['company_address'][0]->value : '';?>       
                  </div>
                </div>
                <?php if(!empty($company_info['contact_num'][0]->value)){ ?>
                      <div class="row">
                            <div class="col-lg-2"><strong>Phone:</strong></div>
                            <div class="col-lg-6">
                                  <?php echo !empty($company_info['contact_num'][0]->value)  ? $company_info['contact_num'][0]->value : '';?>
                            </div>
                      </div>
                <?php } ?>
                <?php if(!empty($company_info['email_address'][0]->value)){ ?>
                      <div class="row">
                            <div class="col-lg-2"><strong>Email:</strong></div>
                            <div class="col-lg-6">
                                  <?php echo !empty($company_info['email_address'][0]->value)  ? $company_info['email_address'][0]->value : '';?>
                            </div>
                      </div>
                <?php } ?>
                </div>
            <div class="contact-us-map">
                <?php echo $map['html'];?>
            </div>
        </div>
    </div>
</div>
</section>
</main>
<?=$footer;?>