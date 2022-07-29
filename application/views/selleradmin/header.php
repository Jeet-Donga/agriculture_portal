<div class="top-bar color-scheme-transparent">
                    <div class="top-menu-controls">
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <?php 
                                $wh['seller_id'] = $this->session->userdata('seller');
                                $record = $this->md->my_select('tbl_seller','*',$wh);
                                
                                if($record[0]->status == 0)
                                {
                                ?>
                                <div style="float: left;width: 300px;padding-right: 20px;margin-top: 10px;color: red">
                                    <marquee>Courrently This Account is Not Verified. You can Manage product After Verification By Administration Department.</marquee>
                                </div>
                                <?php 
                                }
                                ?>
                                <div class="avatar-w"><img style=" height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record[0]->profil_pic; ?>"></div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w"><img style=" height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record[0]->profil_pic; ?>"></div>
                                        <div class="logged-user-info-w">
                                            <div class="logged-user-name"><?php echo $record[0]->company_name; ?></div>
                                            <div class="logged-user-role">Seller Administrator</div>
                                        </div>
                                    </div>
                                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                    <ul>
                                        <li><a href="seller-change-password"><i class="os-icon os-icon-grid-squares-22"></i><span>Setting</span></a></li>
                                        <li><a href="<?php echo base_url('seller-logout'); ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>