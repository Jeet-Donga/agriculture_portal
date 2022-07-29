<!DOCTYPE html>
<html>
    <?php
    $this->load->view('selleradmin/head');
   ?> 
    <body class="menu-position-side menu-side-left full-screen with-content-panel" style="min-height: 0px">
        <div class="all-wrapper with-side-panel solid-bg-all">
          <div class="layout-w">
               <?php
                $this->load->view('selleradmin/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('selleradmin/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="seller-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="seller-dashboard">Dashboard</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                   
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Product</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">All Upload Product</div>
                                                        <?php 
                                                        $allp = count ($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'))));
                                                        ?>
                                                        <div class="value"><?php echo $allp ; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Active Product</div>
                                                        <?php 
                                                        $ap = count ($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'),'status'=>1)));
                                                        ?>
                                                        <div class="value"><?php echo $ap; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Pending Product</div>
                                                        <?php 
                                                        $pap = count ($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'),'status'=>0)));
                                                        ?>
                                                        <div class="value"><?php echo $pap; ?></div>
                                                    </a>
                                                </div>
                                            </div>
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
        $this->load->view('selleradmin/footerscript');
        ?>
    </body>
   </html>