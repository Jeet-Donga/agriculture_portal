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
                                <li class="breadcrumb-item"><a href="#">Promocode</a></li>
                            </ul>
                            <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                            <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                               <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage Promocode</h6>
                                </div>
                            </div>
                        </div>
                            <div class="element-box">
                                <form action="" method="post" name="promocode">
                                <h5 class="form-header">Add New Promocode</h5>
                                <div class="content-i">
                                    <div class="col-lg-4">
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">Promocode</label><input class="form-control" name="promocode" placeholder="Enter Promocode" type="text" 
                                                           value="<?php 
                                                       if (!isset($success)&& set_value('promocode'))
                                                       {
                                                           echo set_value('promocode');
                                                       }
                                                            ?>" />
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('promocode');
                                            ?>
                                        </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">Amount</label><input class="form-control" name="amount" placeholder="Enter Amount" type="text" 
                                                 value="<?php 
                                                       if (!isset($success)&& set_value('amount'))
                                                       {
                                                           echo set_value('amount');
                                                       }
                                                            ?>"/>
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('amount');
                                            ?>
                                        </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">Minimume Bill Price</label><input class="form-control" name="mbp" placeholder="Enter Minimum Bill Price" type="text" 
                                                 value="<?php 
                                                   if (!isset($success)&& set_value('mbp'))
                                                    {
                                                        echo set_value('mbp');
                                                     }
                                                    ?>"/>
                                            <p class="err-msg">
                                            <?php
                                                echo form_error('mbp');
                                            ?>
                                        </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary" name="add" value="ADD" type="submit"> Add</button>
                                     <button class="btn btn-default" type="button">Clear</button>
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
                                </form>
                            </div>
                    
                    <div class="element-box">
                    <h5 class="form-header">View All Promocode</h5>
                    <div class="content-i">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Promocode</th>
                                                                <th>Amount</th>
                                                                <th>Minimum Bill Price</th>
                                                                <th>Status</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                    $no=0;
                                    foreach ($promocode as $data)
                                        {
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $data->code;?></td>
                                            <td><?php echo $data->amount;?></td>
                                            <td><?php echo $data->min_bill_price;?></td>
                                            <td><a href="#" style="text-decoration: none" class="active" data-toggle="tooltip" title="Active">
                                                <i class="pre-icon os-icon os-icon-toggle-left"></i></a></td> 
                                            <td><a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/promocode/<?php echo $data->promocode_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
                                                 <i data-target="#exampleModal1" data-toggle="modal" class="pre-icon os-icon os-icon-trash" style="color: red"></i>
                                                </a></td>
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
                                                                        <p style="text-transform: capitalize;">Are you sure want to delete Promocode ?</p>
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
        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>