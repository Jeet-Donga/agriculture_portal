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
                        <li class="breadcrumb-item"><a href="#">Feedback Us</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Manage Feedback Us</h6>
                                        <div class="content-i">
                                            <div class="element-box" style="width: 100%;">
                                                <h5 class="form-header">View All Feedback</h5>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Name</th>
                                                                <th>Message</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                    $no=0;
                                    foreach ($feedback as $data)
                                        {
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $data->name;?></td>
                                            <td class="center hidden-xs"><?php echo $data->message;?></td>
                                            <td><a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/feedback/<?php echo $data->feedback_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
                                                 <i data-target="#exampleModal1" data-toggle="modal" class="pre-icon os-icon os-icon-trash" style="color: red"></i>
                                                </a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                                        </tbody>
                                                    </table>
                                                <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button></div>
                                                            <div class="modal-body">
                                                                <p style="text-transform: capitalize;">Are you sure want to delete feedback ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                                                                <a class="btn btn-danger" style="color: #fff;" id="delete-link">Yes, Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                </div>
                                            </div>
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
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>