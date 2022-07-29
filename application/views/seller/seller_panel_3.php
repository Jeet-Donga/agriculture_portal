
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
                                <h2 style="padding-bottom: 15px">Welcome, <?php echo $this->session->userdata('company_name') ; ?></h2>
                            </div>
                        <form action="" method="post" name="register3" >
                            
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">Bank Benificial Name</label>
                                                <input class="form-control" placeholder="Enter Bank Benificial Name" type="text" name="bank_benificial_name" value="<?php 
                                               if ($this->session->userdata('bank_benificial_name'))
                                               {
                                                   echo $this->session->userdata('bank_benificial_name');
                                               }
                                               else 
                                               {
                                                   echo set_value('bank_benificial_name');
                                               }
                                                
                                                ?>">
                                            </div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('bank_benificial_name');
                                                ?>
                                            </p>
                                        </div>
                                        
                                        <div class="element-wrapper">
                                           <div class="form-group"><label for="">Bank Name</label>
                                            <select class="form-control" type="dropdown" name="bank_name" >
                                            <option value="">Select Bank Name</option>
                                            <option <?php
                                            if($this->session->userdata('bank_name') && $this->session->userdata('bank_name') == 'State Bank Of India' )
                                            {
                                              echo "selected";  
                                            }
                                            else 
                                            {
                                                echo set_select('bank_name','State Bank Of India');
                                            }
                                                ?>>State Bank Of India</option>
                                            
                                            <option <?php
                                            if($this->session->userdata('bank_name') && $this->session->userdata('bank_name') == 'HDFC Bank' )
                                            {
                                              echo "selected";  
                                            }
                                            else 
                                            {
                                                echo set_select('bank_name','HDFC Bank');
                                            }
                                                ?>>HDFC Bank</option>
                                            
                                            
                                            
                                            <option <?php
                                            if($this->session->userdata('bank_name') && $this->session->userdata('bank_name') == 'Axis Bank' )
                                            {
                                              echo "selected";  
                                            }
                                            else 
                                            {
                                                echo set_select('bank_name','Axis Bank');
                                            }
                                                ?>>Axis Bank</option>
                                            
                                            <option <?php 
                                                if($this->session->userdata('bank_name') && $this->session->userdata('bank_name') == 'Panjab National Bank' )
                                            {
                                              echo "selected";  
                                            }
                                            else 
                                            {
                                                echo set_select('bank_name','Panjab National Bank');
                                            }
                                                ?>>Panjab National Bank</option>
                                            
                                            <option <?php 
                                                if($this->session->userdata('bank_name') && $this->session->userdata('bank_name') == 'ICICI Bank' )
                                            {
                                              echo "selected";  
                                            }
                                            else 
                                            {
                                                echo set_select('bank_name','ICICI Bank');
                                            }
                                                ?>>ICICI Bank</option>
                                            
                                            </select>
                                               <p class="err-msg">
                                                <?php
                                                echo form_error('bank_name');
                                                ?>
                                            </p>
                                           </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-lg-6">
                                         <div class="element-wrapper">
                                             <div class="form-group"><label for="">Branch Name</label><input class="form-control" placeholder="Enter Branch Name" type="text" name="branch_name" value="<?php 
                                             if ($this->session->userdata('branch_name'))
                                               {
                                                   echo $this->session->userdata('branch_name');
                                               }
                                               else 
                                               {
                                                   echo set_value('branch_name');
                                               }
                                             ?>"></div>
                                        </div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('branch_name');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="element-wrapper">
                                              <div class="form-group"><label for="">IFSC Code</label><input class="form-control" placeholder="Enter IFSC Code" type="text" name="ifsc_code" value="<?php 
                                             if ($this->session->userdata('ifsc_code'))
                                               {
                                                   echo $this->session->userdata('ifsc_code');
                                               }
                                               else 
                                               {
                                                   echo set_value('ifsc_code');
                                               }
                                             ?>"></div>
                                          </div> 
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('ifsc_code');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                            
                                        <div class="form-group pos_rel"><label for="">Enter Account Number</label>
                                            <input type="password" id="txt3" placeholder=" Account Number" class="form-control lgn_input" name="ac_no" value="<?php 
                                            if ($this->session->userdata('ac_no'))
                                               {
                                                   echo $this->session->userdata('ac_no');
                                               }
                                               else 
                                               {
                                                   echo set_value('ac_no');
                                               }
                                            ?>" >
                                            <div title="Show Account Number" class="input-group-addon" id="show_pass3">
                                                <i class="uil uil-eye lgn_icon" style="margin-top: 20px"></i>
                                            </div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('ac_no');
                                                ?>
                                            </p>
                                        </div>
                            
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">Enter Confirm Account Number</label>
                                                <input class="form-control" placeholder="Enter Account Number" type="text" name="cac_no" value="<?php
                                                if ($this->session->userdata('ac_no'))
                                               {
                                                   echo $this->session->userdata('ac_no');
                                               }
                                               else 
                                               {
                                                   echo set_value('cac_no');
                                               }
                                                ?>" ></div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('cac_no');
                                                ?>
                                            </p>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <a class="next-btn16 hover-btn mt-3" type=""  value="Pracious" href="<?php echo base_url('seller-registration-2')?>" ><<< Pravious</a>
                                        </div>

                                        <div class="col-lg-6">
                                            <button class="next-btn16 hover-btn mt-3" type="submit" name="add" value="Next">Next >>></button>
                                        </div>
                                    </div>    
                        </form>
                                   
                                    
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




   
    </body>
</html>
    

