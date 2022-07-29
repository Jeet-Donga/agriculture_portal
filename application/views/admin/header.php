<div class="top-bar color-scheme-transparent">
                    <div class="top-menu-controls">
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <?php
                                    $path = $this->md->my_select('tbl_admin_login','*',array('admin_id'=>$this->session->userdata('admin')))[0]->profile_pic;
                                ?>
                                <div class="avatar-w"><img style=" height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$path; ?>"></div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w"><img style=" height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$path; ?>"></div>
                                        <div class="logged-user-info-w">
                                            <div class="logged-user-name">Admin Panal</div>
                                            <div class="logged-user-role">Administrator</div>
                                        </div>
                                    </div>
                                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>manage-setting"><i class="os-icon os-icon-grid-squares-22"></i><span>Setting</span></a></li>
                                         <li><a href="<?php echo base_url(); ?>admin-logout"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>