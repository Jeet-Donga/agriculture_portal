
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Seller Registration-Agriculture Portal</title>

        <link rel="icon" type="image/png" href="sellerassets/images/title.png">

        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="sellerassets/vendor/unicons-2.0.1/css/unicons.css" rel="stylesheet">
        <link href="sellerassets/css/style.css" rel="stylesheet">
        <link href="sellerassets/css/responsive.css" rel="stylesheet">
        <link href="sellerassets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="sellerassets/vendor/OwlCarousel/sellerassets/owl.carousel.css" rel="stylesheet">
        <link href="sellerassets/vendor/OwlCarousel/sellerassets/owl.theme.default.min.css" rel="stylesheet">
        <link href="sellerassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="sellerassets/vendor/semantic/semantic.min.css">
        <style type="text/css">
            .err-msg + p
            {
                color: red;
                font-size: 13px;
            }

        </style>

    </head>
    <body>
        <header class="header clearfix">
            <div class="top-header-group" >
                <div class="top-header" style="height:150px">
                    <div class="res_main_logo">
                        <a href="<?php base_url() ?>home"><img src="<?php echo base_url(); ?>assets/images/title.png" alt=""></a>
                    </div>
                    <div class="main_logo" id="logo" style="width:20%; margin-top: 25px">
                        <a href="<?php base_url() ?>home"><img src="<?php echo base_url(); ?>assets/images/logo5.png" alt=""></a>
                        <a href="<?php base_url() ?>home"><img class="logo-inverse" src="<?php echo base_url(); ?>assets/images/title.png" alt=""></a>
                    </div>

                    <div class="header_right">

                        <ul>
                            
                            <form action="" method="post" name="loginform">
                                <li><h2>Login Now</h2></li>
                                <li>
                                    <div class="form-group pos_rel" style="margin-top:40px">
                                        <input id="" name="selleremail" type="email" placeholder="Email Address" class="form-control lgn_input" >
                                        <i class="uil uil-envelope lgn_icon"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group pos_rel" style="margin-top:40px" >
                                        <input type="password"  name="sellerps" id="txt3" placeholder="Password" class="form-control lgn_input">
                                        <div title="Show Password" class="input-group-addon" id="show_pass3">
                                            <i class="uil uil-eye lgn_icon"></i>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group pos_rel" style=" margin-top: 60px;width: 90%">
                                        <button class="login-btn hover-btn" name="login" value="Login" type="submit">Log In Now</button>
                                        <a href="<?php base_url()?>seller-forget-password">Forgot Password?</a>
                                    </div>
                                </li>
                                <p class="err-msg" style="margin-top:-20px;color: red">
                                    <?php 
                                    if(isset($error))
                                    {
                                        echo $error;
                                    }
                                    ?>
                                </p>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
        <div class="wrapper" style="margin-bottom: 200px">
            <div class="all-product-grid" style="margin-top: -50px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-9">
                            <div class="contact-form">
                                <div class="contact-title">
                                    <h2 style="padding-bottom: 15px">Register Now(For New Seller)</h2>
                                </div>
                                <form action="" method="post" name="seller_register" >

                                    <div class="element-wrapper">
                                        <div class="form-group"><label for="">Company Name</label>
                                            <input class="form-control" placeholder="Enter Company Name" type="text" name="company_name" value="<?php
                                            if ($this->session->userdata('company_name')) {
                                                echo $this->session->userdata('company_name');
                                            } else {
                                                echo set_value('company_name');
                                            }
                                            ?>"></div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('company_name');
                                            ?>
                                        </p>
                                    </div>
                                    <div class="element-wrapper">
                                        <div class="form-group"><label for="">Email Id</label>
                                            <input class="form-control" placeholder="Enter Email Id" type="text" name="email" value="<?php
                                            if ($this->session->userdata('email')) {
                                                echo $this->session->userdata('email');
                                            } else {
                                                echo set_value('email');
                                            }
                                            ?>"></div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('email');
                                            ?>
                                        </p>
                                    </div> 
                                    <div class="row">        
                                        <div class="col-lg-6">
                                            <div class="form-group pos_rel"><label for="">Password</label>
                                                <input type="password" id="txt1" placeholder="Password" class="form-control lgn_input" name="password" value="<?php
                                                if ($this->session->userdata('password')) {
                                                    echo $this->session->userdata('password');
                                                } else {
                                                    echo set_value('password');
                                                }
                                                ?>">
                                                <div title="Show Password" class="input-group-addon" id="show_pass">
                                                    <i class="uil uil-eye lgn_icon"style="margin-top: 20px"></i>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('password');
                                                    ?>
                                                </p> 
                                            </div>
                                            <div class="element-wrapper">
                                                <div class="form-group"><label for="">PAN Number</label>
                                                    <input class="form-control" placeholder="Enter PAN Number" type="text" name="pan_no" value="<?php
                                                    if ($this->session->userdata('pan_no')) {
                                                        echo $this->session->userdata('pan_no');
                                                    } else {
                                                        echo set_value('pan_no');
                                                    }
                                                    ?>">
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('pan_no');
                                                    ?>
                                                </p>
                                            </div>
                                        </div>    
                                        <div class="col-lg-6">
                                            <div class="form-group pos_rel"><label for="">Confirm Password</label>
                                                <input type="password" id="txt2" name="cpassword" placeholder="Confirm Password" class="form-control lgn_input" >
                                                <div title="Show Password" class="input-group-addon" id="show_pass2">
                                                    <i class="uil uil-eye lgn_icon" style="margin-top: 20px"></i>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('cpassword');
                                                    ?>
                                                </p> 
                                            </div>
                                            <div class="element-wrapper">
                                                <div class="form-group"><label for="">GST Number</label>
                                                    <input class="form-control" placeholder="Enter GST Number" type="text" name="gst_no" value="<?php
                                                    if ($this->session->userdata('gst_no')) {
                                                        echo $this->session->userdata('gst_no');
                                                    } else {
                                                        echo set_value('gst_no');
                                                    }
                                                    ?>"></div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('gst_no');
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="element-wrapper">
                                        <div class="form-group"><label for="">Mobile Number</label>
                                            <input class="form-control" placeholder="Enter Mobile Number" type="text" name="mobile" value="<?php
                                            if ($this->session->userdata('mobile')) {
                                                echo $this->session->userdata('mobile');
                                            } else {
                                                echo set_value('mobile');
                                            }
                                            ?>"></div>
                                        <p class="err-msg">
                                            <?php
                                            echo form_error('mobile');
                                            ?>
                                        </p>
                                    </div>
                                    <button class="login-btn hover-btn" name="add" value="Next" type="submit">Next >>></button>
                                </form>
                            </div>      
                        </div> 

                        <div class="col-lg-6 col-md-6">
                            <div class="about-img">
                                <img src="<?php echo base_url(); ?>sellerassets/images/2.jpg" alt="" style="width:90%; height: 60% ">
                            </div>
                        </div>

                    </div>
                </div>

                <footer class="footer">
                    <div class="footer-last-row" >
                        <div class="container" style="margin-bottom: -100px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright-text" >
                                        Copyright <i class="uil uil-copyright"></i> 2021 <b>Agriculture Portal</b> . All Rights Reserved. Design by : <a href="https://www.instagram.com/mr.jeet_donga/" target="_blank">Jeet Donga</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


        <script src="sellerassets/js/jquery-3.3.1.min.js"></script>
        <script src="sellerassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="sellerassets/vendor/OwlCarousel/owl.carousel.js"></script>
        <script src="sellerassets/vendor/semantic/semantic.min.js"></script>
        <script src="sellerassets/js/jquery.countdown.min.js"></script>
        <script src="sellerassets/js/custom.js"></script>
        <script src="sellerassets/js/app.js"></script>


    </body>

</html>

