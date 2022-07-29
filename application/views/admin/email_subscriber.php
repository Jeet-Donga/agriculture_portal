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
                        <li class="breadcrumb-item"><a href="#">Email Subscriber</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage Email Subscriber</h6>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="" name="email">
                        <div class="row">
                            <div class="col-lg-6">
                             <div class="element-wrapper">
                                <div class="element-box">
                                    
                                        <h5 class="form-header">Send Email</h5>
                                        <div class="form-group"><label for="">Subject</label>
                                            
                                            <input class="form-control" name="title" placeholder="Enter Subject" type="text" value="<?php 
                                            
                                            if (!isset($success)&& set_value('title'))
                                                       {
                                                           echo set_value('title');
                                                       }
                                            ?>">
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('title');
                                            ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for=""> Message</label>
                                            <textarea class="form-control" name="msg" id="editor1" type="text">
                                                <?php
                                                if (!isset($success)&& set_value('msg'))
                                                       {
                                                           echo set_value('msg');
                                                       }
                                                ?>
                                            </textarea></div>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('msg');
                                            ?>
                                            </p>   
                                        <div>
                                            <button class="btn btn-primary" name="send" value="SEND" type="submit">Send</button>
                                            <button class="btn btn-default" name="clear" value="CLEAR" type="reset">Clear</button>
                                        </div>
                                            <?php 
                                            if (isset($success))
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
                            </div>   
                        </div>
                        <div class="col-lg-6">
                            <div class="element-wrapper">
                                    <div class="element-box">
                                            <h5 class="form-header">View All Subscriber</h5>
                                            <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th><input type="checkbox" name="all" value="all" id="all"></th>
                                                                <th>Email</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                            foreach($subscriber as $data)
                                                            {
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><input type="checkbox" name="email[]" value="<?php echo $data->email; ?>" id="input"></td>
                                                                    <td><?php echo $data->email;  ?></td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/subscriber/<?php echo $data->subscriber_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
                                                                            <i data-target="#exampleModal1" data-toggle="modal" class="pre-icon os-icon os-icon-trash" style="color: red"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button></div>
                                                            <div class="modal-body">
                                                                <p style="text-transform: capitalize;">Are you sure want to delete email subscriber ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                                                                <a class="btn btn-danger" id="delete-link" style="color: #fff;" type="button">Yes, Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        </form >
                </div>
            </div>
                    
                </div>
            </div>
        </div>
        
        <script src="<?php base_url()?>ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">
            CKEDITOR.replace("editor1");
        </script>
        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>