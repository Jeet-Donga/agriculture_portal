<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Login-Agriculture Portal</title>

        <?php
        $this->load->view('headerlink');
        ?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Login</li>
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
                                            <form action="" method="post" name="login">
                                                <div class="form-title"><h6>Log In</h6></div>
                                                <div class="form-group pos_rel">
                                                    <input id="Email" name="email" type="text" placeholder="Enter Email" class="form-control lgn_input" value="<?php 
                                                    if($this->input->cookie('user_email'))
                                                    {
                                                        echo $this->input->cookie('user_email');
                                                    }
                                                    ?>">
                                                    <i class="uil uil-envelope lgn_icon"></i>
                                                </div>
                                                <div class="form-group pos_rel">
                                                    <input type="password" name="ps" id="txt1" placeholder="Password" class="form-control lgn_input" value="<?php 
                                                    if($this->input->cookie('user_password'))
                                                    {
                                                        echo $this->input->cookie('user_password');
                                                    }
                                                    ?>">
                                                    <div title="Show Password" class="input-group-addon" id="show_pass">
                                                        <i class="uil uil-eye lgn_icon"></i>
                                                    </div>
                                                </div> 
                                              
                                                <div class="form-group pos_rel">
                                                    <input type="checkbox"  name="svp" value="yes" <?php 
                                                    if($this->input->cookie('user_email'))
                                                    {
                                                        echo "checked";
                                                    }
                                                    ?>> Save Password                                                  
                                                </div>
                                                <div>
                                                <button class="login-btn hover-btn" name="login" value="LOGIN" type="submit">Log In Now</button>
                                                </div>
                                                
                                                <?php
                                                if(isset($error))
                                                {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 5px">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo $error; ?>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            
                                            </form>
                                        </div>
                                        <div class="password-forgor">
                                            <a href="<?php base_url()?>forgot-password">Forgot Password?</a>
                                        </div>
                                        <div class="signup-link">
                                            <p>Don't have an account? - <a href="<?php base_url()?>register">Registration Now</a></p>
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



