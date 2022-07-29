
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
                            <form action="" method="post" name="registration4" enctype="multipart/form-data" >
                                <div><label for="">Upload Profile Photo</div>
                                                <input type="file" name="profile" id="profile" style="display: none;" />
                                                <div >
                                                    <label for="profile" style="width: 100%;">
                                                    <div style="cursor: pointer; background: #ddd; width: 100%; padding:50px 20px; text-align: center">
                                                        <h4 id="preview-text">Click To Upload Profile</h4>
                                                        <img id="preview-img" style="width: 250px"/>
                                                    </div>
                                                    </label>
                                                </div>
                                                <p class="err-msg">
                                                <?php 
                                                if(isset($error))
                                                {
                                                    echo $error;
                                                }
                                                ?>
                                                </p>
                               
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="next-btn16 hover-btn mt-3" type=""  value="Pravious" href="<?php echo base_url('seller-registration-3') ?>" ><<< Pravious</a>
                                </div>

                                <div class="col-lg-6">
                                    <button class="next-btn16 hover-btn mt-3" type="submit" name="add" value="Next">Go To seller panel</button>
                                </div>
                            </div>
                        </form>
                        </div>    
                                   
                                    
                        </div> 
                <!--- complete--->
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-title">
                            <div class="about-img">
                                <img src="sellerassets/images/seedling.svg" alt="" style="margin-left: 150px;margin-top:20px ">
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
<script>
                  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
        
      $("#preview-text").html("");  
      $('#preview-img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#profile").change(function() {
  readURL(this);
});
            </script>

    </body>
</html>
    



