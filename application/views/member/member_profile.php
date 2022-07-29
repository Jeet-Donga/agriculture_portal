
<html>
    <?php
    $this->load->view('member/head');
    ?> 
    <style type="text/css">
            .err-msg + P
            {
                color: red;
                font-size: 13px;
            }
        </style>
  
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
                    <?php
                    $wh['register_id'] = $this->session->userdata('user');
                    $record = $this->md->my_select('tbl_register','*',$wh)[0];
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-profile">My Profile</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">My Profile</h6>
                                </div>
                            </div>
                        </div>
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="avatar-w">
                                           <?php 
                                            if(strlen($record->profile_pic) > 0 )
                                            {
                                               ?>
                                            <img style="height: 150px; width: 150px; border-radius: 75px;" src="<?php echo base_url().$record->profile_pic; ?>">

                                            <?php
                                            }
                                            else 
                                            {
                                                ?>
                                            <img style="height: 150px; width: 150px; border-radius: 75px;" src="<?php echo base_url(); ?>member_assets/img/blankuser.png">

                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-10">
                                        <h5 class="form-header" ><?php echo $record->name; ?></h5>
                                         <a href="<?php base_url()?>member-update-profile" class="btn btn-primary"   value="ADD" type="submit" >Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        
                        <div class="row">
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="">
                                        <h5 class="form-header">Basic Information</h5>
                                        <div class="form-group"><label for=""><b>Name</b>    :   <?php echo $record->name; ?></label></div>
                                        <div class="form-group">
                                            <?php
                                            if($record->birth_date == "0000-00-00")
                                            {
                                              ?>
                                            <label for=""><b>DOB</b>  : Not Specifide</label>
                                            <?php
                                            }
                                            else 
                                            {
                                             ?>
                                            <label for=""><b>DOB</b>  : <?php echo date('d-m-Y', strtotime($record->birth_date)); ?></label>
                                            <?php   
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            if(strlen($record->gender) == 0)
                                            {
                                              ?>
                                            <label for=""><b>Gender</b>  : Not Specifide</label>
                                            <?php
                                            }
                                            else 
                                            {
                                             ?>
                                            <label for=""><b>Gender</b>  : <?php echo $record->gender; ?></label>
                                                <?php   
                                            }
                                            ?>
                                            
                                        </div>
                                        </form>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="">
                                        <h5 class="form-header">Contact Information</h5>
                                        <div class="form-group"><label for=""><b>Email</b>    :   <?php echo $record->email; ?></label></div>
                                        <div class="form-group"><label for=""><b>Contact No</b>  : <?php echo $record->mobile; ?></label></div>
                                        <div class="form-group"><label for=""><b>Join Date</b>  : <?php echo date('d-m-Y', strtotime($record->join_date)); ?></label></div>
                                        
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
        $this->load->view('member/footerscript');
        ?>
    </body>
</html>


