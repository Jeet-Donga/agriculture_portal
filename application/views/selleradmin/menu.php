

<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div class="logo-w">
                    <a class="logo" href="admin-dashboard">
                        <img alt="" src="selleradmin_assets/img/logo6.png">
                    </a>
                </div>
                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                        <?php
                        
                        $wh['seller_id'] = $this->session->userdata('seller');
                        $record = $this->md->my_select('tbl_seller','*',$wh);
                        ?>
                                
                        <div class="avatar-w"><img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record[0]->profil_pic; ?>"></div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name"><?php echo $record[0]->company_name; ?></div>
                            <div class="logged-user-role"><?php echo date('d-m-Y h:i:s', strtotime($record[0]->last_login)); ?></div>
                        </div>
                    </div>
                </div>
                
                <h1 class="menu-page-header">Page Header</h1>
                <ul class="main-menu">
                    
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div><span>Dashboard</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Dashboard</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>seller-dashboard">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-user"></div>
                            </div><span>My Profile </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Profile</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-user"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>seller-profile">My Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php 
                        $wh['seller_id'] = $this->session->userdata('seller');
                        $status = $this->md->my_select('tbl_seller','*',$wh)[0]->status;
                        
                        if($status == 1)
                        {
                    ?>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-list"></div>
                            </div><span>My Product</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Product</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-list"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url()?>seller-add-new-product">Add New Product</a></li>
                                    <li><a href="<?php echo base_url()?>seller-view-product">View All Product</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                    
                    <?php
                        }
                    ?>
                </ul>
            </div>