<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Registration-Agriculture Portal</title>
        <?php
        $this->load->view('headerlink');
        ?>
        <style type="text/css">
            .err-msg + P
            {
                color: red;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <?php
        $this->load->view('header');
        ?>
        <div class="wrapper">
            <div class="gambo-Breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php base_url()?>home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Registration</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sign-inup">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">                            
                            <div class="sign-form">
                                <div class="sign-inner">
                                    <div class="form-dt">
                                        <div class="form-inpts checout-address-step">
                                            <form action="" method="post" name="register">
                                                <div class="form-title"><h6>Registration</h6></div>
                                                <div class="form-group pos_rel">
                                                    <input id="full[name]" name="name" type="text" placeholder="Full name" class="form-control lgn_input" value="<?php 
                                                     if(!isset($success) && set_value('name'))
                                                     {
                                                        echo set_value('name');
                                                     }
                                                    ?>" >
                                                    <p class="err-msg">
                                                    <?php
                                                        echo form_error('name');
                                                    ?>
                                                    </p>
                                                    <i class="uil uil-user-circle lgn_icon"></i>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input id="email" name="email" type="email" placeholder="Email Address" class="form-control lgn_input" value="<?php 
                                                    if(!isset($success) && set_value('email'))
                                                     {
                                                         echo set_value('email');
                                                     }
                                                    ?>">
                                                   <p class="err-msg">
                                                    <?php
                                                        echo form_error('email');
                                                    ?>
                                                    </p>
                                                    <i class="uil uil-envelope lgn_icon"></i>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input id="phone[number]" name="mobile" type="text" placeholder="Phone Number" class="form-control lgn_input" value="<?php
                                                    if(!isset($success) && set_value('mobile'))
                                                     {
                                                         echo set_value('mobile');
                                                     }
                                                    ?>">
                                                    <p class="err-msg">
                                                    <?php
                                                        echo form_error('mobile');
                                                    ?>
                                                    </p>
                                                    <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input type="password" name="ps" id="txt3" placeholder="Password" class="form-control lgn_input" value="<?php 
                                                    if(!isset($success) && set_value('ps'))
                                                     {
                                                        echo  set_value('ps');
                                                     }
                                                    ?>" >
                                                    <p class="err-msg">
                                                    <?php
                                                        echo form_error('ps');
                                                    ?>
                                                    </p>
                                                    <div title="Show Password" class="input-group-addon" id="show_pass3">
                                                        <i class="uil uil-eye lgn_icon"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input type="password" name="cps" id="txt2" placeholder="Confirm Password" class="form-control lgn_input" >
                                                    <p class="err-msg">
                                                    <?php
                                                        echo form_error('cps');
                                                    ?>
                                                    </p>
                                                    <div title="Show Password" class="input-group-addon" id="show_pass2">
                                                        <i class="uil uil-eye lgn_icon"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input type="checkbox" id="save password" name="save password" value="Save Password"> I Accept All <a href="term-and-conditions">Terms & Conditions</a>          
                                                </div>
                                                <button class="login-btn hover-btn" name="register" value="continue" type="submit">Registration Now</button>
                                            </form>
                                        </div>
                                        <div class="signup-link">
                                            <p>I have an account? - <a href="<?php base_url()?>login">Log In Now</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>
</html>