<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Suggest Us-Agriculture Portal</title>

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
                                    <li class="breadcrumb-item active" aria-current="page">Suggest Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-title">
                                <h2>Submit Suggestion request</h2>
                                <p>If you have a take a suggestion about our service or have an issue to report, please send a suggestion quary and we will get back to you as soon as possible.</p>
                            </div>
                            <div class="contact-form">
                                <form action="" method="post" name="feedback">
                                    <div class="form-group mt-1">
                                        <label class="control-label">Full Name*</label>
                                        <div class="ui search focus">
                                            <div class="ui left icon input swdh11 swdh19">
                                                <input class="prompt srch_explore" type="text" name="name" id="sendername"  placeholder="Your Full" value="<?php
                                               if (!isset($success) && set_value('name')) {
                                                   echo set_value('name');
                                               }
                                               ?>"

                                        <div class="text-danger ">
                                        <?php
                                            echo form_error('name');
                                            
                                         ?> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-1">
                                        <div class="field">
                                            <label class="control-label">Suggestion*</label>
                                            <textarea rows="6" style="resize: none" class="form-control" id="sendermessage" name="message" required="" placeholder="Write Message"><?php
                                                if (!isset($success) && set_value('message'))
                                                {
                                                    echo set_value('message');
                                                }
                                                ?></textarea>
                                            <div class="text-danger ">
                                                    <?php
                                                    echo form_error('message');
                                                    ?>
                                                    <br/>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="next-btn16 hover-btn mt-3" name="add" value="Add"type="submit" data-btntext-sending="Sending...">Submit Suggestion</button>
                                <?php
                                if (isset($success))
                                    {
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
                            <div class="about-img">
                                <img src="<?php echo base_url(); ?>assets/images/GS-Agriculture-logo.svg" alt="" style="width:90%; height: 100% ">
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



