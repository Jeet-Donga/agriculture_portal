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
                        <li class="breadcrumb-item"><a href="#">Main Category</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage Main Category</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php
                                if (isset($editmaincategory))
                                {
                        ?>
                            <!---update--->
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="maincategory">
                                        <h5 class="form-header">Adit Main Category</h5>
                                        <div class="form-group"><label for="">Main Category</label>
                                            <input class="form-control" name="maincategory" placeholder="Enter Main Category" type="text" 
                                                   value="<?php 
                                                       if (!isset($success)&& set_value('maincategory'))
                                                       {
                                                           echo set_value('maincategory');
                                                       }
                                                       else 
                                                       {
                                                           echo $editmaincategory[0]->name;
                                                       }
                                            ?>" />
                                        <p class="err-msg">
                                            <?php
                                                echo form_error('maincategory');
                                            ?>
                                        </p>
                                        </div>
                                        
                                            <button class="btn btn-primary" name="edit" value="Edit" type="submit">Edit</button>
                                            <button class="btn btn-default" name="clear" value="CLEAR" type="reset">Clear</button>
                                            <a href="<?php echo base_url('manage-main-category');?>"class="btn btn-default" value="CLEAR" type="reset">Cancle</a>
                                        
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
                            </div>
                        </div>    
                        <?php    
                                }
                                 else
                                {
                                
                                ?>
                        <div class="col-lg-6">
                           <div class="element-wrapper">
                                <div class="element-box">
                                    <form action="" method="post" name="maincategory">
                                        <h5 class="form-header">Add New Main Category</h5>
                                        <div class="form-group"><label for="">Main Category</label>
                                            <input class="form-control" name="maincategory" placeholder="Enter Main Category" type="text" 
                                                   value="<?php 
                                                       if (!isset($success)&& set_value('maincategory'))
                                                       {
                                                           echo set_value('maincategory');
                                                       }
                                            ?>" />
                                        <p class="err-msg">
                                            <?php
                                                echo form_error('maincategory');
                                            ?>
                                        </p>
                                        </div>
                                        
                                            <button class="btn btn-primary" name="add" value="ADD" type="submit">Add</button>
                                            <button class="btn btn-default" name="clear" value="CLEAR" type="reset">Clear</button>
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
                            </div>
                        </div> 
                                <?php
                                }
                                ?>
                         
                        <div class="col-lg-6">
                            <div class="element-wrapper">
                                    <div class="element-box">
                                        <form>
                                            <h5 class="form-header">View All Main Category</h5>
                                            <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Main Category</th>
                                                                <th>Edit</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                                foreach ($maincategory as $data)  
                                                                    {
                                                                    $no++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $data->name; ?></td>
                                                                    <td><a href="<?php echo base_url(); ?>edit-maincategory/<?php echo $data->category_id; ?>" style="text-decoration: none" data-toggle="tooltip" title="Edit Data">
                                                                            <i class="pre-icon os-icon os-icon-pencil-1"></i>
                                                                        </a></td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/maincategory/<?php echo $data->category_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
                                                                            <i data-target="#exampleModal1" data-toggle="modal" class="pre-icon os-icon os-icon-trash" style="color: red"></i>
                                                                        </a>
                                                                    </td>
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Conformation</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button></div>
                                                            <div class="modal-body">
                                                                <p style="text-transform: capitalize;">Are you sure want to delete main category ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-dismiss="modal" > Close</button>
                                                                <a class="btn btn-danger" id="delete-link" style="color: #fff;" type="button">Yes, Delete</a>
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
            </div>
                    
                </div>
            </div>
        </div>
        
        
        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>