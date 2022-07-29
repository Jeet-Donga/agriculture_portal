<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title> View Product-Agriculture Portal </title>

        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body onload="view_more('<?php echo $this->uri->segment(2);?>',<?php echo $this->uri->segment(3);?>,12)">

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
                                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="all-product-grid">
                <div class="container" id="product_data">
                    
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
<script type="text/javascript">
function view_more(action,id,limit)
{
    $data = { action:action , id:id , limit:limit };
    
    var path = 'http://localhost/agriculture_portal/backend/view_more/';

            $.post( path , $data , function(output){
               
                   $("#product_data").html(output);
               
            });
}
</script>
