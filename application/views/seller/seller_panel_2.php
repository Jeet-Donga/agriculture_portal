
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
        <div id="category_model" class="header-cate-model main-gambo-model modal fade" role="dialog" aria-modal="false">
            <div class="modal-dialog category-area" role="document">
                <div class="category-area-inner">
                    <div class="modal-header">
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                            <i class="uil uil-multiply"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!cart>

    <header class="header clearfix" >
        <div class="top-header-group">
            <div class="top-header">
                <div class="res_main_logo">
                    <a href="home"><img src="sellerassets/images/title.png" alt=""></a>
                </div>

                <div class="col-lg-6">
                    <div class="main_logo" id="logo">
                        <a href="home"><img src="sellerassets/images/logo5.png" alt=""></a>
                        <a href="home"><img class="logo-inverse" src="sellerassets/images/title.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="all-product-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2 style="padding-bottom: 15px">Welcome, <?php echo $this->session->userdata('company_name'); ?></h2>
                        </div>
                        <form action="" method="post" name="seller_register" >

                            <div class="element-wrapper">
                                <div class="form-group"><label for="">State</label>
                                    <select class="form-control" type="dropdown" name="state" id="state"  onchange="set_combo('city', this.value);" >
                                        <option value="">Select State</option>
                                        <?php
                                        foreach ($state as $data) {
                                            ?>
                                            <option value="<?php echo $data->location_id; ?>" <?php
                                            if($this->session->userdata('state'))
                                                {
                                                    if($data->location_id == $this->session->userdata('state'))
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                else
                                                {
                                                    echo set_select('state',$data->location_id);
                                                }
                                            ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                                <p class="err-msg">
                                    <?php
                                    echo form_error('state');
                                    ?>
                                </p>
                            </div>

                            <div class="element-wrapper">
                                <div class="form-group"><label for="">City</label>
                                    <select class="form-control" type="dropdown" id="city" name="city" >
                                        <option value="">Select City</option>
                                        <?php
                                         if ($this->input->post('state') || $this->session->userdata('state')) 
                                             {
                                             if($this->session->userdata('state'))
                                             {
                                                 $wh['parent_id'] = $this->session->userdata('state');
                                             }
                                             else 
                                             {
                                                $wh['parent_id'] = $this->input->post('state'); 
                                             }
                                            
                                            $city = $this->md->my_select('tbl_location', '*', $wh);

                                            foreach ($city as $data) {
                                                ?>
                                                <option value="<?php echo $data->location_id; ?>" <?php
                                                if($this->session->userdata('state') )
                                                {
                                                    if($data->location_id == $this->session->userdata('city'))
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                else 
                                                {
                                                    echo set_select('city', $data->location_id);
                                                }
                                                
                                                
                                                ?> ><?php echo $data->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                    </select>
                                </div>
                                <p class="err-msg">
                                    <?php
                                    echo form_error('city');
                                    ?>
                                </p>
                            </div>

                            <div class="element-wrapper">
                                <div class="form-group"><label for="">Pick Up Address</label>
                                    <textarea class="form-control" rows="5" style=" resize: none" name="address" palceholder="Enter Address"><?php 
                                        if ($this->session->userdata('address'))
                                        {
                                            echo $this->session->userdata('address'); 
                                        }
                                        else
                                        {
                                            echo set_value('address');
                                        }
                                        ?></textarea>

                                </div>
                                <p class="err-msg">
                                    <?php
                                    echo form_error('address');
                                    ?>
                                </p>
                            </div>

                            <div class="element-wrapper">
                                <div class="form-group"><label for="">PIN  Code Number</label>
                                    <input class="form-control" placeholder="Enter PIN Number" type="text" name="pincode" value="<?php
                                    
                                    if ($this->session->userdata('pincode'))
                                        {
                                            echo $this->session->userdata('pincode'); 
                                        }
                                    else 
                                        {
                                            echo set_value('pincode');
                                        }
                                    ?>">
                                </div>
                                <p class="err-msg">
                                    <?php
                                    echo form_error('pincode');
                                    ?>
                                </p>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="next-btn16 hover-btn mt-3" type=""  value="Pravious" href="<?php echo base_url('seller-registration-1') ?>" ><<< Pravious</a>
                                </div>

                                <div class="col-lg-6">
                                    <button class="next-btn16 hover-btn mt-3" type="submit" name="add" value="Next">Next >>></button>
                                </div>
                            </div>
                        </form>
                    </div>    


                </div> 
                <!--- complete--->
                <div class="col-lg-6 col-md-6">
                    <div class="contact-title">
                        <div class="about-img">
                            <img src="sellerassets/images/seedling.svg" alt="" style="margin-left: 150px;margin-top:100px ">
                        </div>
                    </div>
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


        <script src="sellerassets/js/jquery-3.3.1.min.js"></script>
        <script src="sellerassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="sellerassets/vendor/OwlCarousel/owl.carousel.js"></script>
        <script src="sellerassets/vendor/semantic/semantic.min.js"></script>
        <script src="sellerassets/js/jquery.countdown.min.js"></script>
        <script src="sellerassets/js/custom.js"></script>
        <script src="sellerassets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>


    </body>
</html>

