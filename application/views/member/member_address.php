
<html>
    <?php
    $this->load->view('member/head');
    ?> 
  
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
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-address">My Address</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">My Address</h6>
                                </div>
                            </div>
                        </div>
                        
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="element-wrapper">
                                <div class="element-box">
                                 <h5 class="form-header">Add My Address</h5>
                                 <form action="" method="post" name="add">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group"><label for="">State :</label>
                                            <select name="state" onchange="set_combo('city', this.value)" class="form-control" >
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($state as $data) 
                                            {
                                                ?>
                                                <option value="<?php echo $data->location_id ?>" <?php
                                                if(!isset($success) &&set_select('state', $data->location_id))
                                                {
                                                        echo set_select('state',$data->location_id);
                                                    
                                                }
                                                        
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        </div> 
                                     <p class="err-msg">
                                        <?php
                                            echo form_error('state');
                                        ?>
                                    </p>
                                </div>
                                <div class="col-lg-6"> 
                                   <div class="form-group"><label for="">City :</label>
                                       <select class="form-control" name="city" type="dropdown" id="city" >
                                            <option value="">City </option>
                                            <?php
                                                if($this->input->post('state'))
                                                {
                                                    $wh['parent_id']= $this->input->post('state');
                                                    $city=$this->md->my_select('tbl_location','*',$wh);
                                                    
                                                    foreach($city as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                    if(!isset($success) && set_select('city',$data->location_id))
                                                    {
                                                        echo set_select('city',$data->location_id);
                                                    }
                                                        
                                                    ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div> 
                                    <p class="err-msg">
                                        <?php
                                            echo form_error('city');
                                        ?>
                                    </p>
                                </div>
                                <div class="col-lg-12"> 
                                   <div class="form-group"><label for="">Address Details :</label>
                                        <textarea rows="3" style="resize: none" class="form-control"  name="address"  placeholder="Write Address"><?php

                                        if(!isset($success) && set_value('address',$this->input->post))
                                                    {
                                                        echo set_value('address',$this->input->post);
                                                    }
                                                        
                                                ?></textarea>
                                    </div>
                                    <p class="err-msg">
                                        <?php
                                            echo form_error('address');
                                        ?>
                                    </p>
                                </div>
                               <div class="col-md-12">
                                   
                                    <label>Address Type :</label>
                                    
                                    <label><input style="margin-left: 10px;" type="radio" name="gender" value="home" <?php
                                                    if(!isset($success) && set_radio('gender','home'))
                                                    {
                                                        echo set_radio('gender','home');
                                                    }
                                                    ?>> Home</label>
                                   
                                    <label> <input style="margin-left: 10px;" type="radio" name="gender" value="office" <?php
                                                    if(!isset($success) && set_radio('gender','office'))
                                                    {
                                                        echo set_radio('gender','office');
                                                    }
                                                    ?>> Office</label>
                                     <p class="err-msg">
                                        <?php
                                            echo form_error('gender');
                                        ?>
                                    </p>
                                 </div>
                                <br/>
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
                            </div>
                                 </form>
                                </div>
                           </div>
                        </div>        
                    </div>      
                  
                    <div class="content-i">
                        <div class="element-box" style="width: 100%;">
                                                <h5 class="form-header">View All Address</h5>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Address</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                                $no=0;
                                                                foreach ($address as $data) 
                                                                    {
                                                                        $wh['location_id'] = $data->location_id;
                                                                        $city = $this->md->my_select('tbl_location','*',$wh)[0];

                                                                        $where['location_id'] = $city->parent_id;
                                                                        $state = $this->md->my_select('tbl_location','*',$where)[0];

                                                                        $no++;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $state->name; ?></td>
                                                                    <td><?php echo $city->name; ?></td>
                                                                    <td><?php echo $data->address;?></td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/address/<?php echo $data->shipment_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
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
                                                                <p style="text-transform: capitalize;">Are you sure want to delete Address ?</p>
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
                </div>
            </div>
        </div>
        <?php
        $this->load->view('member/footerscript');
        ?>
    </body>
</html>



