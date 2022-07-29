<?php 
$wh['register_id'] = $this->session->userdata('user');
$record = $this->md->my_select('tbl_register','*',$wh)[0];
?>
    <div class="top-bar color-scheme-transparent">
        <div class="top-menu-controls">
            <div class="logged-user-w">
                <div class="logged-user-i">
                    <div class="avatar-w">
                        <?php 
                        if(strlen($record->profile_pic) > 0 )
                        {
                           ?>
                        <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record->profile_pic; ?>">

                        <?php
                        }
                        else 
                        {
                            ?>
                        <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url(); ?>member_assets/img/blankuser.png">

                        <?php
                        }
                        ?>
                    </div>
                    <div class="logged-user-menu color-style-bright">
                        <div class="logged-user-avatar-info">
                            <div class="avatar-w">
                                <?php 
                if(strlen($record->profile_pic) > 0 )
                {
                   ?>
                <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record->profile_pic; ?>">

                <?php
                }
                else 
                {
                    ?>
                <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url(); ?>member_assets/img/blankuser.png">

                <?php
                }
                ?>
                            </div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name"><?php echo $record->name; ?></div>
                                <div class="logged-user-role">Member Administrator</div>
                            </div>
                        </div>
                        <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                        <ul>
                            <li><a href="<?php echo base_url('member-change-password')?>"><i class="os-icon os-icon-grid-squares-22"></i><span>Setting</span></a></li>
                             <li><a href="<?php echo base_url('member-logout'); ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>