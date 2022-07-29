<!DOCTYPE html>
<html>
    <?php
    $this->load->view('member/head');
   ?> 
    <body class="menu-position-side menu-side-left full-screen with-content-panel" style="min-height: 0px">
        <div class="all-wrapper with-side-panel solid-bg-all">
          <div class="layout-w">
               <?php
                $this->load->view('member/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('member/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="member-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="member-dashboard">Dashboard</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                   
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">My Dashboard</h6>
                                        <div class="element-content">
                                            <div class="row">
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">My Wish</div>
                                                        <?php 
                                                        $wish = count ($this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user'))));
                                                        ?>
                                                        <div class="value"><?php echo $wish; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">My Address</div>
                                                        <?php 
                                                        $add = count($this->md->my_select('tbl_shipment','*',array('register_id'=>$this->session->userdata('user'))));
                                                        ?>
                                                        <div class="value"><?php echo $add; ?></div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 col-xxxl-3">
                                                    <a class="element-box el-tablo" href="#">
                                                        <div class="label">My_Review</div>
                                                        <?php 
                                                        $mr = count ($this->md->my_select('tbl_review','*',array('register_id'=>$this->session->userdata('user'))));
                                                        ?>
                                                        <div class="value"><?php echo $mr; ?></div>
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
        $this->load->view('member/footerscript');
        ?>
    </body>
   </html>