<?=$header;?>
<?php 
// print '<pre>'.print_r($programmes,true).'</pre>';
?>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-md-12">
                <ul class="nav nav-pills nav-stacked sidenav">
                    <li>
                        <a class="side_active" href="#about-us">COMING SOON</a>
                    </li>
                    <li>
                        <a href="#social">PROGRAMMES</a>
                    </li>
                    <li>
                        <a href="#contact">FILM COMPETITION</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 col-md-12">
                <section id="about-us" class="bd_section">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <?=utf8_decode($pages[0]->page_content);?>
                            </p>
                        </div>
                    </div>
                </section>
                <section id="social" class="bd_section list_item">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>SOCIAL MEDIA</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <img src="http://via.placeholder.com/350x250" />
                                <h3>FB</h3>
                            </div>
                            <div class="col-md-4">
                                <img src="http://via.placeholder.com/350x250" />
                                <h3>TWITTER</h3>
                            </div>
                            <div class="col-md-4">
                                <img src="http://via.placeholder.com/350x250" />
                                <h3>INSTAGRAM</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="contact" class="bd_section">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>CONTACT US</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="send.php">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Full Name" name="name" aria-describedby="inputGroupSuccess2Status">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="text" class="form-control" name="contactNumber" placeholder="Contact Number" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email Address" name="email" aria-describedby="inputGroupSuccess2Status">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Subject" name="subject" aria-describedby="inputGroupSuccess2Status">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-12">
                                        <textarea class="form-control" placeholder="Message" name="message" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-danger">SUBMIMT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </section>
            </div>
        </div>

    </div>
<?=$footer;?>