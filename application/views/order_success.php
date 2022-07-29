<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Shoping Cart-Agriculture Portal</title>

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
                                    <li class="breadcrumb-item"><a href="<?php base_url() ?>home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Success</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <div class="row" style="background: white;">
                        <div class="col-md-12" style="padding: 60px; text-align: center;border-bottom: 1px solid #b3b7bb">
                            <p style="text-align: center; font-size: 100px; color: green;">
                                <img style="width: 100px;background: green;border-radius: 50px" src="assets/images/check-circle.svg"></img></p>
                            <h2 style="text-align: center; color: orangered; font-weight: bold">Hello, thank You For Your Order.</h2>
                            <h2 style="text-align: center; color: gray;">Agriculture Portal has received your order successfully.</h2>
                            <h5 style="color: gray">Note: if you have any query thent contact us via mail.</h5>
                           <br>
                           <div class="row" style="border-top: 1px solid #b3b7bb ">
                               
                                <div class="col-md-4">
                                    <div class="signup-link" style="width: 250px;margin-left: 40px;border-radius: 7px">
                                        <a style="font-size: 15px;cursor: pointer;color: white" href="<?php base_url()?>home"><b>Continue Shopping</b></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="signup-link" style="width: 250px;margin-left: 40px;border-radius: 7px">
                                        <a style="font-size: 15px;cursor: pointer;color: white" href="<?php base_url()?>member-mybill"><b>View Bill</b></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="signup-link" style="width: 250px;margin-left: 40px;border-radius: 7px">
                                        <a style="font-size: 15px;cursor: pointer;color: white" href="<?php base_url()?>member-dashboard"><b>Go To Account</b></a>
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


