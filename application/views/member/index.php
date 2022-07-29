<!DOCTYPE html>
<html>
    <?php
    $this->load->view('member/head');
    ?>
    <body class="auth-wrapper">
        <div class="all-wrapper menu-side with-pattern">
            <div class="auth-box-w">
                <div class="logo-w"><a href="<?php base_url()?>admin-dashboard"><img style="padding-top: -50px;padding-bottom: -60px" src="<?php base_url()?>admin_assets/img/logo6.png"></a></div>
                <h4 class="auth-header">Login</h4>
                <form action="" method="post" name="login">
                    <div class="form-group"><label for="">Email</label><input class="form-control" name="email" placeholder="Enter your Email" value="<?php
                        if ($this->input->cookie('admin_email'))
                        {
                            echo ($this->input->cookie('admin_email')); 
                        }
                            
                    ?>">
                        <div class="pre-icon os-icon os-icon-email-2-at"></div>
                    </div>

                    <div class="form-group ">
                        <input type="password" name="ps" id="txt4" placeholder="Password" class="form-control" required="" value="<?php
                        if ($this->input->cookie('admin_password'))
                        {
                            echo ($this->input->cookie('admin_password')); 
                        }
                            
                    ?>">
                    <div title="Show Password" class="input-group-addon" id="show_pass4">
                        <i class="pre-icon os-icon os-icon-eye"></i>
                    </div>
                    </div>

                    <div class="form-check"><label class="form-check-label"><input name="svp" value="yes" class="form-check-input" type="checkbox" <?php 
                        if ($this->input->cookie('admin_email'))
                        {
                            echo "checked";
                        }
                    ?>/>Remember Me</label>
                    </div>
                    
                    <div>
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
                        ?>
                        
                    </div>
    
                    
                    <div class="buttons-w"><button type="submit" name="login" value="yes" class="btn btn-primary">Login</button>    
                    </div>
                    <a href="<?php echo base_url('admin-forget-password'); ?>" style="float: right;margin-top: -25px;">Forgot Password ?</a>
                </form>
            </div>
        </div>
        <?php
        $this->load->view('member/footerscript');
        ?>
    </body>
</html>