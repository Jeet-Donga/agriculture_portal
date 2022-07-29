<!DOCTYPE html>
<html>
    <?php
    $this->load->view('admin/head');
    ?> 
    <body class="menu-position-side menu-side-left full-screen with-content-panel" style="min-height: 0px">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">
                <?php
                $this->load->view('admin/menu');
                ?>
                <div class="content-w">
                    <?php
                    $this->load->view('admin/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>admin-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Setting</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="changeprofile" enctype="multipart/form-data">
                                        <h5 class="form-header">Edit Profile</h5>
                                         <center>
                                             <?php
                                                $path = $this->md->my_select('tbl_admin_login','*',array('admin_id'=>$this->session->userdata('admin')))[0]->profile_pic;
                                             ?>
                                         <img src="<?php echo base_url().$path; ?>"  id="blah" style="height: 200px; width: 200px; border-radius: 50%"  class="img-fluid" ></td>       
                                         </center>
                                        <div >
                                            <input type="file" id="imgInp" name="photo">
                                        </div></br>
                                        <div>
                                            <button class="btn btn-primary"  type="submit" name="btn_profile" value="Edit Profile" >Adit Profile</button>
                                            
                                        </div>
                                        <?php 
                                                if(isset($photo_err))
                                                    {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo $photo_err; ?>
                                                    </div>
                                                    <?php
                                                    }
                                                    if(isset($success))
                                                    {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Ok !</strong> <?php echo $success; ?>
                                                    </div>
                                                    <?php
                                                    }
                                            ?>
                                    </form>
                                </div>
                            </div> 
                        </div>
        <div class="col-lg-6">
            <div class="auth-box-w" style="width:130%">
                <form action="" method="post" name="changeps" >
                    <h5 class="form-header">Edit Password</h5>
                    <div class="form-group "><label for="">Current Password</label>
                        <input type="password" name="cps" id="txt5" placeholder="Current Password" class="form-control" >
                    <div title="Show Password" class="input-group-addon" id="show_pass5">
                        <i class="pre-icon os-icon os-icon-eye"></i>
                    </div>
                    </div>
                    
                    <div class="form-group "><label for="">New Password</label>
                        <input type="password" name="nps" id="txt7" placeholder="New Password" class="form-control" >
                    <div title="Show Password" class="input-group-addon" id="show_pass7">
                        <i class="pre-icon os-icon os-icon-eye"></i>
                    </div>
                    </div>

                    <div class="form-group "><label for="">Confirm Password</label>
                        <input type="password" name="cnps" id="txt6" placeholder="Confirm New Password" class="form-control" >
                    <div title="Show Password" class="input-group-addon" id="show_pass6">
                        <i class="pre-icon os-icon os-icon-eye"></i>
                    </div>
                    </div>
                    
                        <button class="btn btn-primary" type="submit" value="CHANGE" name="btn_ps">Change</button>
                        <button class="btn btn-default" type="reset" value="CLEAR">Clear</button>
                        <?php
                        if(isset($error))
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Oops !</strong> <?php echo $error; ?>
                        </div>
                        <?php
                        }
                        if(form_error('nps') || form_error('cnps'))
                        {
                    ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Oops !</strong> <?php echo form_error('nps'); ?>
                                    </br>
                                    <strong>Oops !</strong> <?php echo form_error('cnps'); ?>
                        </div>
                    <?php
                        }
                    ?>

                </form>
            </div>
        </div>
                        
                    </div>
                </div>
            </div>
                    
                </div>
            </div>
        </div>
        <?php
        $this->load->view('admin/footerscript');
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