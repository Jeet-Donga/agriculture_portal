<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Forgot Password-Agriculture Portal</title>

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
                                    <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" >
                    <div class="col-lg-5">
                        <div class="sign-form">
                            <div class="sign-inner">
                                
                                <div class="form-dt">
                                    <div class="form-inpts checout-address-step">
                                        
                                            <div class="form-title"><h6>Forgot Password</h6></div>
                                            <p>Enter the ragisterd email, we will send your password via email.</p>
                                            <div class="form-group pos_rel">
                                                <input   id="femail"  placeholder="Your Email Address" class="form-control lgn_input">
                                                <i class="uil uil-envelope lgn_icon"></i>
                                            <p id="sforget-msg" style="color: red; font-size: 13px">
                                                
                                            </p>
                                            </div>
                                            <input type="button" class="login-btn hover-btn" value="SEND EMAIL" onclick="forget_ps();">
                                            
                                    </div>
                                    <div class="signup-link">
                                        <p>Go Back - <a href="<?php base_url()?>login">Log In Now</a></p>
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
        <script type="text/javascript" >
        function forget_ps()
        {
            var email = document.getElementById('femail').value;
            
           if( email != "" )
        {
            var ptn = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            
            if(email.match(ptn))
            {
                $data = { email:email};
               var path = "http://localhost/agriculture_portal/backend/user_forgetps";
               
               $.post( path , $data , function(output){
                   
                   if( output == "0")
                   {
                       $("#sforget-msg").html("Something Went Wrong Try Later.");
                       document.getElementById('femail').value ='';
                   }
                   if( output == "1")
                   {
                       $("#sforget-msg").html("Your Password is Send To Registered Email.");
                       document.getElementById('femail').value ='';
                   }
        
                   if( output == "2")
                   {
                       $("#sforget-msg").html("This Email Is Not Registerd.");
                   }
               });
               
            }
            else
            {
                $("#sforget-msg").html("Please Enter Valid Email");
            }
            
        }
        else
        {
           $("#sforget-msg").html("Please Enter Email."); 
        }
        }
        </script>
    </body>

</html>