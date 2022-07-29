<!DOCTYPE html>
<html>
    <?php
    $this->load->view('selleradmin/head');
    ?> 
  <style type="text/css">
        .err-msg
            {
                color: red;
                font-size: 13px;
            }    
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
                $this->load->view('selleradmin/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('selleradmin/header');
                    ?>
                    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-update-profile">Update Profile</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Update Profile</h6>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post" name="editseller" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="element-wrapper">
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2">
                                                <div class="avatar-w">
                                                    <img style=" height: 150px; width: 150px" id="blah" src="<?php echo base_url().$record[0]->profil_pic;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                        <input type="file" id="imgInp" name="profile"  >

                                        <div class="col-md-10" style="margin-top: 30px">
                                        <button class="btn btn-primary"  name="edit" value="Save" type="submit" >Save</button>
                                        <a href="<?php base_url()?>seller-profile" class="btn btn-primary"  name="" value="ADD" type="submit">Cancle</a>
                                        </div>
                                    </div>
                                        </div>

                                    </div>
                               </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                        <h5 class="form-header">Basic Information</h5>
                                        <div class="form-group"><label for="">Company :</label>
                                            <input class="form-control" name="company_name" placeholder="Company Name"  type="text" value="<?php
                                            if(!isset($success) && set_value('company_name'))
                                            {
                                                echo set_value('company_name');
                                            }
                                            else 
                                            {
                                               echo $record[0]->company_name;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('company_name');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">PAN No :</label>
                                        <input class="form-control" name="pan" placeholder="PAN No" type="text" value="<?php
                                            if(!isset($success) && set_value('pan'))
                                            {
                                                echo set_value('pan');
                                            }
                                            else 
                                            {
                                               echo $record[0]->pan_no;
                                            }
                                            ?>" />
                                        <p class="err-msg">
                                                <?php
                                                    echo form_error('pan');
                                                ?>
                                        </p>
                                        </div>
                                        <div class="form-group"><label for="">GST NO :</label>
                                        <input class="form-control" name="gst" placeholder="GST No" type="text" value="<?php
                                            if(!isset($success) && set_value('gst'))
                                            {
                                                echo set_value('gst');
                                            }
                                            else 
                                            {
                                               echo $record[0]->gst_no;
                                            }
                                            ?>" />
                                        <p class="err-msg">
                                                <?php
                                                    echo form_error('gst');
                                                ?>
                                        </p>
                                        </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                        <h5 class="form-header">Contact Information</h5>
                                        <div class="form-group"><label for="">Email :</label>
                                            <input class="form-control" name="email"   type="text" value="<?php
                                            if(!isset($success) && set_value('email'))
                                            {
                                                echo set_value('email');
                                            }
                                            else 
                                            {
                                                echo $record[0]->email;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                            <?php
                                                if(isset($email_error))
                                                {
                                                    echo $email_error;
                                                }
                                            ?>
                                            <?php
                                                echo form_error('email');
                                            ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">Contact No :</label>
                                        <input class="form-control" name="mobile" placeholder="Contact No" type="text" value="<?php
                                            if(!isset($success) && set_value('mobile'))
                                            {
                                                echo set_value('mobile');
                                            }
                                            else 
                                            {
                                               echo $record[0]->mobile;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('mobile');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">Join Date :</label>
                                        <input class="form-control" name="" readonly="" disabled="" type="" value="<?php
                                            echo date('d-m-Y', strtotime($record[0]->join_date));
                                            ?>" />
                                        </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                        <h5 class="form-header">Bank Information</h5>
                                        <div class="form-group"><label for="">Bank Benificiary Name :</label>
                                        <input class="form-control" name="bname" placeholder="Bank Benificiary Name" type="text" value="<?php
                                            if(!isset($success) && set_value('bname'))
                                            {
                                                echo set_value('bname');
                                            }
                                            else 
                                            {
                                               echo $record[0]->bank_benificial_name;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('bname');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">Branch Name :</label>
                                        <input class="form-control" name="branchname" placeholder="Branch Name" type="text" value="<?php
                                            if(!isset($success) && set_value('branchname'))
                                            {
                                                echo set_value('branchname');
                                            }
                                            else 
                                            {
                                               echo $record[0]->branch_name;
                                            }
                                            ?>"  />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('branchname');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">IFSC Code :</label>
                                        <input class="form-control" name="ifsc" placeholder="IFSC Code" type="text" value="<?php
                                            if(!isset($success) && set_value('ifsc'))
                                            {
                                                echo set_value('ifsc');
                                            }
                                            else 
                                            {
                                               echo $record[0]->ifsc_code;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('ifsc');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">Account No :</label>
                                        <input class="form-control" name="ac_no" placeholder="Account No" type="text" value="<?php
                                            if(!isset($success) && set_value('ac'))
                                            {
                                                echo set_value('ac');
                                            }
                                            else 
                                            {
                                               echo $record[0]->ac_no;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('ac_no');
                                                ?>
                                            </p>
                                        </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <h5 class="form-header">Location Information</h5>
                                    <div class="form-group"><label for="">Address :</label>
                                    <textarea rows="3" style="resize: none" class="form-control" name="address"  placeholder="Write Address"><?php
                                        if(!isset($success) && set_value('address'))
                                        {
                                            echo set_value('address');
                                        }
                                        else 
                                        {
                                           echo $record[0]->address;
                                        }
                                        ?></textarea>
                                        <p class="err-msg">
                                                <?php
                                                    echo form_error('address');
                                                ?>
                                            </p>
                                    </div> 
                                    <div class="form-group"><label for="">PIN Code :</label>
                                        <input class="form-control" name="pincode" placeholder="PIN Code" type="text" value="<?php
                                        if(!isset($success) && set_value('pincode'))
                                        {
                                            echo set_value('pincode');
                                        }
                                        else 
                                        {
                                           echo $record[0]->pincode;
                                        }
                                        ?>"/>
                                        <p class="err-msg">
                                                <?php
                                                    echo form_error('pincode');
                                                ?>
                                            </p>
                                    </div>
                                </div>
                            </div> 
                        </div>

                       </div>
                        </form>
                </div>
            </div>
                    
                </div>
            </div>
        </div>
        <?php
        $this->load->view('selleradmin/footerscript');
        ?>
        <script type="text/javascript">
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });
        </script>
    </body>
</html>


