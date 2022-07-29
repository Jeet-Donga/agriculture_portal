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
                                <li class="breadcrumb-item"><a href="#">City</a></li>
                            </ul>
                            <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                            <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                               <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage City</h6>
                                </div>
                            </div>
                        </div>
                            <?php
                            if(isset($editcity))
                            {
                               ?>
                                
                                <div class="element-box">
                                <h5 class="form-header"> Edit City</h5>
                                <div class="content-i">
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                            <form action="" method="post" name="city">
                                                    <div class="form-group"><label for="">State</label>
                                                        <select class="form-control" name="state"type="dropdown">
                                                            <option selected="selected" value="">Select State</option>
                                                            <?php
                                                                                foreach ($state as $data)
                                                                                {
                                                            ?>
                                                            <option value="<?php echo $data->location_id;?>" <?php 
                                                                    if (!isset($success) && set_select('state',$data->location_id))
                                                                    {
                                                                        echo set_select('state',$data->location_id);
                                                                    }
                                                                    else
                                                                    {
                                                                        if($data->location_id == $editcity[0]->parent_id)
                                                                        {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                            ?> ><?php echo $data->name; ?></option>
                                                            <?php
                                                                                }
                                                            ?>
                                                    </select>
                                                        <p class="err-msg">
                                                            <?php
                                                                echo form_error('state');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary"  name="update" value="EDIT" type="submit">Update</button>
                                                        <button class="btn btn-default"  type="reset">Clear</button>
                                                        <a href="<?php echo base_url('manage-city');?>"class="btn btn-default" value="CLEAR" type="reset">Cancle</a>
                                        
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
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">City</label><input class="form-control"name="city" placeholder="Enter City" type="text" value="<?php
                                                if (!isset($success) && set_value('city'))
                                                {
                                                    echo set_value('city');
                                                }
                                                else
                                                {
                                                    echo $editcity[0]->name;
                                                }
                                                                                                             
                                            ?>" /></div>
                                                        <p class="err-msg">
                                                            <?php
                                                                echo form_error('city');
                                                            ?>
                                                        </p>  
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                
                                <?php
                            }
                            else
                            {
                                ?>
                                
                                <div class="element-box">
                                <h5 class="form-header">Add New City</h5>
                                <div class="content-i">
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                            <form action="" method="post" name="city">
                                                    <div class="form-group"><label for="">State</label>
                                                        <select class="form-control" name="state"type="dropdown">
                                                            <option selected="selected" value="">Select State</option>
                                                            <?php
                                                                                foreach ($state as $data)
                                                                                {
                                                            ?>
                                                            <option value="<?php echo $data->location_id;?>" <?php 
                                                                    if (!isset($success) && set_select('state',$data->location_id))
                                                                    {
                                                                        echo set_select('state',$data->location_id);
                                                                    }
                                                            ?> ><?php echo $data->name; ?></option>
                                                            <?php
                                                                                }
                                                            ?>
                                                    </select>
                                                        <p class="err-msg">
                                                            <?php
                                                                echo form_error('state');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary"  name="add" value="ADD" type="submit">Add</button>
                                                        <button class="btn btn-default"  type="reset">Clear</button>
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
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                            <div class="form-group"><label for="">City</label><input class="form-control"name="city" placeholder="Enter City" type="text" value="<?php
                                                if (!isset($success) && set_value('city'))
                                                {
                                                    echo set_value('city');
                                                }
                                                                                                             
                                            ?>" /></div>
                                                        <p class="err-msg">
                                                            <?php
                                                                echo form_error('city');
                                                            ?>
                                                        </p>  
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                
                                <?php
                            }
                            ?>
                    
                    <div class="element-box">
                    <h5 class="form-header">View All City</h5>
                    <div class="content-i">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                      <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Edit</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                                foreach ($city as $data)
                                                                {
                                                                    $no++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $no;?></td>
                                                                    <td><?php echo $data->state;?></td>
                                                                    <td><?php echo $data->name;?></td>
                                                                    <td><a href="<?php echo base_url();?>edit-city/<?php echo $data->location_id ?>" style="text-decoration: none" data-toggle="tooltip" title="Edit Data">
                                                                            <i class="pre-icon os-icon os-icon-pencil-1"></i>
                                                                        </a></td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/city/<?php echo $data->location_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
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
                                                                <p style="text-transform: capitalize;">Are you sure want to delete City ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                                                                <a id="delete-link" class="btn btn-danger" style="color: #fff;" type="button">Yes, Delete</a>
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