<!DOCTYPE html>
<html>
    <?php
    $this->load->view('admin/head');
    ?> 
    <body class="menu-position-side menu-side-left full-screen with-content-panel" style="min-height: 0px">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">
                <?php
                $this->load->view('admin/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('admin/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>admin-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Profit Rate</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage Profit Rate</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="element-wrapper">
                                    <form action="" method="post" name="update">
                                    <div class="element-box">
                                        <h5 class="form-header">Update Profit Rate...</h5>
                                        <div class="form-group"><input class="form-control"  name="rate" type="text" value="<?php
                                            echo $rate[0]->rate;
                                        ?>"</div>
                                        <h6>Note that here,product rate is increase by following percentage and it is your profit.</h6>
                                        <p class="err-msg">
                                            <?php
                                                if(form_error('rate'))
                                                {
                                                   echo form_error('rate');
                                                }
                                            ?>
                                        </p>
                                            <div>
                                               <button class="btn btn-primary" type="submit" name="update" value="UPDATE">Update</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6">
                            <div class="element-wrapper">
                                <div class="element-box">
                                    <h5 class="form-header">View Profit Rate...</h5>
                                        <div class="element-wrapper" style="text-align: center; padding-top: 40px; padding-bottom: 40px">
                                            <h1 style="color: #047bf8">Profit Rate:<?php echo $rate[0]->rate; ?>%</h1>
                                        </div>
                                    </form>
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
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>