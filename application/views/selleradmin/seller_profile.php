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
                    <?php
                    $wh['seller_id'] = $this->session->userdata('seller');
                    $record = $this->md->my_select('tbl_seller','*',$wh)[0];
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-profile">My Profile</a></li>
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
                                             <img style=" height: 150px; width: 150px" src="<?php echo base_url().$record->profil_pic;?>">
                                         </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <h5 class="form-header" ><?php echo $record->company_name;?></h5>
                                        <a href="<?php base_url()?>seller-update-profile" class="btn btn-primary"   value="ADD" type="submit" >Edit Profile</a>
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
                                        <div class="form-group"><label for=""><b>Company</b>    :   <?php echo $record->company_name;?></label></div>
                                        <div class="form-group"><label for=""><b>PAN No.</b>  : <?php echo $record->pan_no;?></label></div>
                                        <div class="form-group"><label for=""><b>GST No.</b>  : <?php echo $record->gst_no;?></label></div>
                                        </form>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="">
                                        <h5 class="form-header">Contact Information</h5>
                                        <div class="form-group"><label for=""><b>Email</b>    :   <?php echo $record->email;?></label></div>
                                        <div class="form-group"><label for=""><b>Contact No</b>  : <?php echo $record->mobile;?></label></div>
                                        <div class="form-group"><label for=""><b>Register Date</b>  : <?php echo date('d-m-Y',strtotime($record->join_date));?></label></div>
                                        
                                        </form>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="">
                                        <h5 class="form-header">Bank Information</h5>
                                        <div class="form-group"><label for=""><b>Bank Benificialy Name</b> : <?php echo $record->bank_benificial_name;?></label></div>
                                        <div class="form-group"><label for=""><b>Bank Name</b>  : <?php echo $record->bank_name;?></label></div>
                                        <div class="form-group"><label for=""><b>Branch Name</b>  : <?php echo $record->branch_name;?></label></div>
                                        <div class="form-group"><label for=""><b>IFSC Code</b>  : <?php echo $record->ifsc_code;?></label></div>
                                        <div class="form-group"><label for=""><b>Account No</b>  : <?php echo $record->ac_no;?></label></div>
                                        
                                        </form>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                               <?php 
                               $city = $record->location_id;
                               
                               $data = $this->md->my_query("SELECT ct.`name` AS 'city' , s.`name` AS 'state' FROM `tbl_location` AS ct , `tbl_location` AS s WHERE  s.`location_id` = ct.`parent_id` AND ct.`location_id` =  $city")[0];
                               ?>
                                <div class="element-box">
                                    <form action="" method="post" name="">
                                        <h5 class="form-header">Location Information</h5>
                                        <div class="form-group"><label for=""><b>State</b>    :   <?php echo $data->state;?></label></div>
                                        <div class="form-group"><label for=""><b>City</b>  : <?php echo $data->city;?></label></div>
                                        <div class="form-group"><label for=""><b>Address</b>  : <?php echo $record->address;?></label></div> 
                                        <div class="form-group"><label for=""><b>PIN Code</b>  : <?php echo $record->pincode;?></label></div>
                                        <br><br>
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
        $this->load->view('selleradmin/footerscript');
        ?>
    </body>
</html>

