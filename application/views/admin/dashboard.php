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
                        <li class="breadcrumb-item"><a href="<?php base_url()?>admin-dashboard"">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>admin-dashboard">Dashboard</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Pages</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Contact Us</div>
                                                        <?php 
                                                        $contact = count($this->md->my_select('tbl_contact_us'));
                                                        ?>
                                                        <div class="value"><?php echo $contact;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Feedback</div>
                                                        <?php 
                                                        $feedback = count($this->md->my_select('tbl_feedback'));
                                                        ?>
                                                        <div class="value"><?php echo $feedback?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Email Subscriber</div>
                                                        <?php 
                                                        $emails = count($this->md->my_select('tbl_email_subscriber'));
                                                        ?>
                                                        <div class="value"><?php echo $emails;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Banner</div>
                                                        <?php 
                                                        $banner = count($this->md->my_select('tbl_banner'));
                                                        ?>
                                                        <div class="value"><?php echo $banner?></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Users-->
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Users</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Member</div>
                                                        <?php 
                                                        $member = count($this->md->my_select('tbl_register'));
                                                        ?>
                                                        <div class="value"><?php echo $member;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Active Member</div>
                                                        <?php 
                                                        $am = count($this->md->my_select('tbl_register','*',array('status' => 1)));
                                                        ?>
                                                        <div class="value"><?php echo $am;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Pending Member</div>
                                                        <?php 
                                                        $pm = count($this->md->my_select('tbl_register','*',array('status'=>0)));
                                                        ?>
                                                        <div class="value"><?php echo $pm;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Seller</div>
                                                        <?php 
                                                        $seller = count($this->md->my_select('tbl_seller'));
                                                        ?>
                                                        <div class="value"><?php echo $seller;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Active Seller</div>
                                                        <?php 
                                                        $as = count($this->md->my_select('tbl_seller','*',array('status'=>1)));
                                                        ?>
                                                        <div class="value"><?php echo $as;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Pending Seller</div>
                                                        <?php 
                                                        $ps = count($this->md->my_select('tbl_seller','*',array('status'=>0)));
                                                        ?>
                                                        <div class="value"><?php echo $ps;?></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--location-->
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Location</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">State</div>
                                                        <?php 
                                                        $state = count($this->md->my_select('tbl_location','*',array('label' => 'state')));
                                                        ?>
                                                        <div class="value"><?php echo $state; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">City</div>
                                                        <?php 
                                                        $city = count($this->md->my_select('tbl_location','*',array('label' => 'city')));
                                                        ?>
                                                        <div class="value"><?php echo $city; ?></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--category-->
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Category</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Main Category</div>
                                                        <?php 
                                                        $mc = count($this->md->my_select('tbl_category','*',array('label' => 'maincategory')));
                                                        ?>
                                                        <div class="value"><?php echo $mc;?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Sub Category</div>
                                                        <?php 
                                                        $sc = count($this->md->my_select('tbl_category','*',array('label' => 'subcategory')));
                                                        ?>
                                                        <div class="value"><?php echo $sc; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Peta Category</div>
                                                        <?php 
                                                        $pc = count($this->md->my_select('tbl_category','*',array('label' => 'petacategory')));
                                                        ?>
                                                        <div class="value"><?php echo $pc; ?></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product-->
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
                                                        <div class="label">Total Product </div>
                                                        <?php 
                                                        $allp = count($this->md->my_select('tbl_product','*'));
                                                        ?>
                                                        <div class="value"><?php echo $allp; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Active Product</div>
                                                        <?php 
                                                        $ap = count($this->md->my_select('tbl_product','*',array('status' => 1)));
                                                        ?>
                                                        <div class="value"><?php echo $ap; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Dective Product</div>
                                                        <?php 
                                                        $dp = count($this->md->my_select('tbl_product','*',array('status' => 0)));
                                                        ?>
                                                        <div class="value"><?php echo $dp; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Total Review</div>
                                                        <?php 
                                                        $review = count($this->md->my_select('tbl_review','*'));
                                                        ?>
                                                        <div class="value"><?php echo $review; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Active Review</div>
                                                        <?php 
                                                        $ar = count($this->md->my_select('tbl_review','*',array('status' => 1)));
                                                        ?>
                                                        <div class="value"><?php echo $ar; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">Pending Review</div>
                                                        <?php 
                                                        $pr = count($this->md->my_select('tbl_review','*',array('status' => 0)));
                                                        ?>
                                                        <div class="value"><?php echo $pr; ?></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---offer--->
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Pages</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">past offer </div>
                                                        <?php 
                                                        $date = date('Y-m-d');
                                                        
                                                        $po = count($this->md->my_select('tbl_offer','*',array('strt_date' < $date)));
                                                        ?>
                                                        <div class="value"><?php echo $po; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">runing offer</div>
                                                        <?php 
                                                        $ro = count($this->md->my_select('tbl_offer','*',array('status' => 1)));
                                                        ?>
                                                        <div class="value"><?php echo $ro; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">future offer</div>
                                                        <?php 
                                                        $date = date('Y-m-d');
                                                        
                                                        $fo = count($this->md->my_select('tbl_offer','*',array('strt_date' > $date)));
                                                        ?>
                                                        <div class="value"><?php echo $fo; ?></div>
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
        $this->load->view('admin/footerscript');
        ?>
    </body>
   </html>