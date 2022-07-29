<!DOCTYPE html>
<html>
    <?php
    $this->load->view('member/head');
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
                $this->load->view('member/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('member/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-update-profile">Update Profile</a></li>
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
                    </div>
                    </div> 
                    <form action="" method="post" name="edit" enctype="multipart/form-data">
                    <div class="element-wrapper">
                        <div class="element-box">
                            <div class="row">
                            <div class="col-lg-2 col-md-2" >
                                <?php 
                                    if(strlen($record[0]->profile_pic) > 0 )
                                    {
                                       ?>
                                <img style="height: 150px; width: 150px; border-radius: 75px;" id="blah" src="<?php echo base_url().$record[0]->profile_pic; ?>">

                                    <?php
                                    }
                                    else 
                                    {
                                        ?>
                                <img style="height: 150px; width: 150px; border-radius: 75px;" id="blah" src="<?php echo base_url(); ?>member_assets/img/blankuser.png">

                                    <?php
                                    }
                                    ?>
                            </div>
                                <div class="col-md-10">
                                    <input type="file" id="imgInp" name="profile"  >

                                    <div class="col-md-10" style="margin-top: 30px">
                                    <button class="btn btn-primary"  name="edit" value="Save" type="submit" >Save</button>
                                    <a href="<?php base_url()?>member-profile" class="btn btn-primary"  name="" value="ADD" type="submit">Cancle</a>
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
                                        <div class="form-group"><label for="">Name :</label>
                                            <input class="form-control" name="name" placeholder=" Name" type="text" value="<?php
                                            if(!isset($success) && set_value('name'))
                                            {
                                                echo set_value('name');
                                            }
                                            else 
                                            {
                                               echo $record[0]->name;
                                            }
                                            ?>" />
                                            <p class="err-msg">
                                                <?php
                                                    echo form_error('name');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">DOB :</label>
                                            <input class="form-control" placeholder="Enter DOB" type="date" name="birth_date" value="<?php
                                            if(!isset($success) && set_value('birth_date'))
                                            {
                                                echo set_value('birth_date');
                                            }
                                            else 
                                            {
                                               echo $record[0]->birth_date;
                                            }
                                            ?>" >
                                        </div>
                                        <div class="form-group"><label for="">Gender :</label>
                                            <select class="form-control" type="dropdown" name="gender" >
                                            <option value="">Select Gender</option>
                                            <option <?php 
                                            if(!isset($success) && set_select('gender','Male'))
                                            {
                                                echo set_select('gender','Male');
                                            }
                                            else 
                                            {
                                                if($record[0]->gender == "Male")
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>Male</option>
                                            <option <?php 
                                            if(!isset($success) && set_select('gender','Female'))
                                            {
                                                echo set_select('gender','Female');
                                            }
                                            else 
                                            {
                                                if($record[0]->gender == "Female")
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>Female</option>
                                            </select>
                                        </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <h5 class="form-header">Contact Information</h5>
                                    <div class="form-group"><label for="">Email :</label>
                                        <input class="form-control"  type="email" name="email" value="<?php
                                            if(!isset($success) && set_value('email'))
                                            {
                                                echo set_value('email');
                                            }
                                            else 
                                            {
                                                echo $record[0]->email;
                                            }
                                            ?>"  />
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
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('member/footerscript');
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


