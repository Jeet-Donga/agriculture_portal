<?php
$wh['admin_id'] = $this->session->userdata('admin');
$record = $this->md->my_select('tbl_admin_login','*',$wh);
$path = $record[0]->profile_pic;
?>


<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div class="logo-w">
                    <a class="logo" href="<?php base_url()?>admin-dashboard">
                        <img alt="" src="<?php echo base_url(); ?>admin_assets/img/logo6.png">
                        
                    </a>
                </div>
                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                                
                        <div class="avatar-w"><img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$path; ?>"></div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">Admin Panal</div>
                            <div class="logged-user-role"><?php echo date('d-m-y h:i:s',strtotime($record[0]->last_login));?></div>
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
                                    <li><a href="<?php base_url()?>admin-dashboard">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-file-text"></div>
                            </div><span>Pages</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Pages</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-file-text"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>manage-contact-us">Contact Us</a></li>
                                    <li><a href="<?php base_url()?>manage-feedback">Feedback</a></li>
                                    <li><a href="<?php base_url()?>manage-email-subscriber">Email Subscriber</a></li>
                                    <li><a href="<?php base_url()?>manage-banner">Banner</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div><span>Users</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Users</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-users"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>manage-member">Member</a></li>
                                    <li><a href="<?php base_url()?>manage-seller">Seller</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                     <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-map-pin"></div>
                            </div><span>Location</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Location</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-map-pin"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>manage-state">State</a></li>
                                    <li><a href="<?php base_url()?>manage-city">City</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-list"></div>
                            </div><span>Category</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Category</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-list"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>manage-main-category">Main Category</a></li>
                                    <li><a href="<?php base_url()?>manage-sub-category">Sub Category</a></li>
                                    <li><a href="<?php base_url()?>manage-peta-category">Peta Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-database"></div>
                            </div><span>Product</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Product</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-database"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>manage-product-detail">Product Detail</a></li>
                                    <li><a href="<?php base_url()?>manage-product-review">Product Review</a></li>
                                    <li><a href="<?php base_url()?>manage-offer">Offers</a></li>
                                    <li><a href="<?php base_url()?>manage-promocode">Promocode</a></li>
                                    <li><a href="<?php base_url()?>manage-profit-rate">Profit Rate</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-printer"></div>
                            </div><span>View Bill</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">View Bill</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-printer"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>view-bill">View Bill</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>