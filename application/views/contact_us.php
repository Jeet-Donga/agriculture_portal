<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Contact Us-Agriculture Portal</title>

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
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-9">
                            <div class="contact-title">
                                <h2>Submit customer service request</h2>
                                <p>If you have a question about our service or have an issue to report, please send a request and we will get back to you as soon as possible.</p>
                            </div>
                            <div class="contact-form">
                                <form action="" method="post" name="contact" >
                                    <div class="form-group mt-1">
                                        <label class="control-label">Full Name*</label>
                                        <div class="ui search focus">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <input class="prompt srch_explore" type="text" name="name"  placeholder="Your Full" value="<?php 
                                                       if (!isset($success)&& set_value('name'))
                                                       {
                                                           echo set_value('name');
                                                       }
                                                            ?>" />
                                            </div>
                                            
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('name');
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-1">
                                        <label class="control-label">Email*</label>
                                        <div class="ui search focus">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <input class="prompt srch_explore" type="email" name="email" id="emailaddress"  placeholder="Your Email" value="<?php 
                                                       if (!isset($success)&& set_value('email'))
                                                       {
                                                           echo set_value('email');
                                                       }
                                                            ?>" />
                                            </div>
                                            
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('email');
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label class="control-label">Subject*</label>
                                        <div class="ui search focus">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <input class="prompt srch_explore" type="text" name="subject" id="sendersubject"  placeholder="Subject" value="<?php 
                                                       if (!isset($success)&& set_value('subject'))
                                                       {
                                                           echo set_value('subject');
                                                       }
                                                            ?>" />
                                            </div>
                                            
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('subject');
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1">
                                        <div class="field">
                                            <label class="control-label">Message*</label>
                                            <textarea rows="4" class="form-control" id="sendermessage" name="message"  placeholder="Write Message" style="resize: none" value="<?php 
                                                       if (!isset($success)&& set_value('message'))
                                                       {
                                                           echo set_value('message');
                                                       }
                                                            ?>" /></textarea>
                                        </div>
                                        
                                        <p class="err-msg">
                                        <?php
                                            echo form_error('message');
                                        ?>
                                        </p>
                                    </div>  
                                    <button class="next-btn16 hover-btn mt-3" type="submit" name="add" value="ADD" data-btntext-sending="Sending...">Submit Request</button>
                                    <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <br/><br/>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Ok !</strong> <?php echo $success; ?>
                                                    </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                    <br/><br/>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
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
                        </div>                                
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-title">
                                <h2>Get In Touch</h2>                                
                                <div style="padding-top:70px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6077780056703!2d72.47117301484647!3d22.81699292970598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e92d7452e8655%3A0x8b3fd7e0e7f3d3bb!2sRai%20University!5e0!3m2!1sen!2sin!4v1614687135716!5m2!1sen!2sin" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy"></iframe>
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

