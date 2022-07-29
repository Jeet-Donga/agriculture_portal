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
                        <li class="breadcrumb-item"><a href="<?php base_url() ?>admin-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Offers</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Manage Offers</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="element-box">
                                <form action="" method="post" name="offer">
                                    <h5 class="form-header">Add New Offer</h5>

                                    <div class="content-i">
                                        <div class="col-lg-6">
                                            <div class="element-wrapper">
                                                <div class="form-group"><label for="">Offer Name</label>
                                                    <input class="form-control" name="name" placeholder="Enter Offer Name" type="text" value="<?php
                                                    if (!isset($success) && set_value('name')) {
                                                        echo set_value('name');
                                                    }
                                                    ?>" >
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('name');
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="element-wrapper">
                                                <div class="form-group"><label for="">Offer Rate(%)</label>
                                                    <input class="form-control" name="rate" placeholder="Enter Offer Rate" type="text" value="<?php
                                                    if (!isset($success) && set_value('rate')) {
                                                        echo set_value('rate');
                                                    }
                                                    ?>" >
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('rate');
                                                    ?>
                                                </p>
                                            </div> 
                                            <div class="row">        
                                                <div class="col-lg-6">
                                                    <div class="element-wrapper">
                                                        <div class="form-group"><label for="">Minimum Price</label>
                                                            <input class="form-control" name="min_price" placeholder="Enter Minimum price" type="text" value="<?php
                                                            if (!isset($success) && set_value('min_price')) {
                                                                echo set_value('min_price');
                                                            }
                                                            ?>" >
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('min_price');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="element-wrapper">
                                                        <div class="form-group"><label for="">Start Date</label>
                                                            <input class="form-control" name="start_date" placeholder="Enter Start Date" type="date" value="<?php
                                                            if (!isset($success) && set_value('start_date')) {
                                                                echo set_value('start_date');
                                                            }
                                                            ?>" >
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('start_date');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>    
                                                <div class="col-lg-6">
                                                    <div class="element-wrapper">
                                                        <div class="form-group"><label for="">Maximum Price</label>
                                                            <input class="form-control" name="max_price" placeholder="Enter Minimum price" type="text" value="<?php
                                                            if (!isset($success) && set_value('max_price')) {
                                                                echo set_value('max_price');
                                                            }
                                                            ?>" >
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('max_price');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="element-wrapper">
                                                        <div class="form-group"><label for="">End Date</label>
                                                            <input class="form-control" name="end_date" placeholder="Enter End Date" type="date" value="<?php
                                                            if (!isset($success) && set_value('end_date')) {
                                                                echo set_value('end_date');
                                                            }
                                                            ?>" >
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('end_date');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="element-wrapper">

                                                <div class="form-group">                                           
                                                    <label for="subject">Main Catagory</label>
                                                    <select class="form-control" name="main" id="maincategory" onchange="set_combo('subcategory', this.value)" >
                                                        <option value="">Select Main Catagory</option>
                                                        <?php
                                                        foreach ($main as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->category_id; ?>" <?php
                                                            if (!isset($success) && set_select('main', $data->category_id)) {
                                                                echo set_select('main', $data->category_id);
                                                            }
                                                            ?> ><?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                                ?>

                                                    </select>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('main');
                                                        ?>
                                                    </p>
                                                </div>

                                                <div class="form-group">                                           
                                                    <label for="subject">Sub Catagory</label>
                                                    <select id="subcategory" class="form-control" name="sub" onchange="set_combo('petacategory', this.value)" >
                                                        <option value="">Select Sub Catagory</option>
                                                        <?php
                                                        if ($this->input->post('main')) {
                                                            $wh['parent_id'] = $this->input->post('main');
                                                            $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                            foreach ($sub as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                    echo set_select('sub', $data->category_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                    </select>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('sub');
                                                        ?>
                                                    </p>
                                                </div>

                                                <div class="form-group" >                                           
                                                    <label for="subject">Peta Catagory</label>
                                                    <select id="petacategory" class="form-control" name="peta" >
                                                        <option value="">Select Peta Catagory</option>
                                                        <?php
                                                        if ($this->input->post('sub')) {
                                                            $wh['parent_id'] = $this->input->post('sub');
                                                            $peta = $this->md->my_select('tbl_category', '*', $wh);

                                                            foreach ($peta as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                    echo set_select('peta', $data->category_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                    </select>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('peta');
                                                        ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" name="add" value="Add" type="submit"> Add</button>
                                        <button class="btn btn-default" value="clear" type="reset">Clear</button>
                                    </div>
                                    <?php
                                    if (isset($success)) {
                                        ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Ok !</strong> <?php echo $success; ?>
                                        </div>
                                        <?php
                                    }
                                    if (isset($error)) {
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
                                <h5 class="form-header">View All Offer</h5>
                                <div class="content-i">
                                    <div class="col-lg-12">
                                        <div class="element-wrapper">
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead style="text-align: center;vertical-align: middle">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Offer Name</th>
                                                            <th>Rate</th>
                                                            <th>Minimum Price</th>
                                                            <th>Maximum Price</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Main Category</th>
                                                            <th>Sub Category</th>
                                                            <th>Peta Category</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center;vertical-align: middle">
                                                        <?php
                                    $no=0;
                                    foreach($offer as $data)
                                    {
                                        $no++;
                                        ?>
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $data->name; ?></td>
                                                                <td><?php echo $data->rate; ?></td>
                                                                <td><?php echo $data->min_price; ?></td>
                                                                <td><?php echo $data->max_price; ?></td>
                                                                <td><?php echo date('d-m-Y',strtotime($data->start_date)) ?></td>
                                                                <td><?php echo date('d-m-Y',strtotime($data->end_date)) ?></td>
                                                                <td><?php
                                                                        if($data->label == "All")
                                                                        {
                                                                            echo "All";
                                                                        }
                                                                        else if($data->label == "main")
                                                                        {
                                                                            $wh['category_id'] = $data->category_id;
                                                                            $name = $this->md->my_select('tbl_category','*',$wh)[0]->name;
                                                                            echo $name;
                                                                        }else if($data->label == "sub")
                                                                        {
                                                                            $name = $this->md->my_query("SELECT m.name as main , s.name as sub FROM `tbl_category`as m , `tbl_category` as s where m.`category_id` = s.`parent_id` AND s.`category_id`=".$data->category_id.";")[0]->main;
                                                                            echo $name;
                                                                        }
                                                                        else if($data->label == "peta")
                                                                        {
                                                                            $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->main;
                                                                            echo $name;
                                                                        }                                            
                                                                        ?></td>
                                                                <td><?php
                                                                        if($data->label == "All")
                                                                        {
                                                                            echo "All";
                                                                        }
                                                                        else if($data->label == "main")
                                                                        {
                                                                            echo "-";
                                                                        }else if($data->label == "sub")
                                                                        {
                                                                            $name = $this->md->my_query("SELECT m.name as main , s.name as sub FROM `tbl_category`as m , `tbl_category` as s where m.`category_id` = s.`parent_id` AND s.`category_id`=".$data->category_id.";")[0]->sub;
                                                                            echo $name;
                                                                        }
                                                                        else if($data->label == "peta")
                                                                        {
                                                                            $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->sub;
                                                                            echo $name;
                                                                        }                                            
                                                                        ?></td>
                                                                <td><?php
                                                                        if($data->label == "All")
                                                                        {
                                                                            echo "All";
                                                                        }
                                                                        else if($data->label == "main")
                                                                        {
                                                                            echo "-";
                                                                        }else if($data->label == "sub")
                                                                        {
                                                                            echo "-";
                                                                        }
                                                                        else if($data->label == "peta")
                                                                        {
                                                                            $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->peta;
                                                                            echo $name;
                                                                        }                                            
                                                                        ?></td>
                                                                <td><?php 
                                                                        if($data->status == 1)
                                                                        {
                                                                        ?>
                                                                        <span style="color: green;">Active</span>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                        ?>
                                                                        <span style="color: red;">Deactive</span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
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