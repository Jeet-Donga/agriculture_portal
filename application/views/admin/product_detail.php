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
                        <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Manage Product Details</h6>
                                        <div class="content-i">
                                            <div class="element-box" style="width: 100%;">
                                                <h5 class="form-header">View All Product</h5>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Seller Name</th>
                                                                <th>Product Image</th>
                                                                <th>Seller Name</th>
                                                                <th>Price</th>
                                                                <th>View Detail</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                            foreach ($product as $data) {
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no;?></td>
                                                                    <td><?php echo $data->name;?></td>
                                                                    <td data-toggle="tooltip" title="<?php echo $data->name;?>" >
                                                                        <?php 
                                                                        $wh['product_id'] = $data->product_id;
                                                                $multipath = $this->md->my_select('tbl_product_image','*',$wh)[0]->path;
                                                                
                                                                $path = explode(",", $multipath);
                                                                        ?>
                                                                        <img src="<?php echo base_url().$path[0]; ?>" style="width: 60px; height: 60px;"  class="img-rectangel" >
                                                                    </td>
                                                                    <td><?php
                                                                        $name = $this->md->my_select('tbl_seller','*',array('seller_id'=>$data->seller_id))[0]->company_name;
                                                                        echo $name;
                                                                        ?></td>
                                                                    <?php 
                                                                        $wh['product_id']=$data->product_id;
                                                                        $price = $this->md->my_select('tbl_product_image','*',$wh)[0]->price;
                                                                    ?>
                                                                    <td> Rs.<?php echo $price;?> /-</td>
                                                                    <td><a href="<?php echo base_url()?>product-detail/<?php echo $data->product_id; ?>" target="_new">View Details</a></td>
                                                                    <td>
                                                                        <?php 
                                                                        if($data->status == 0)
                                                                        {
                                                                          ?>
                                                                        <i id="product<?php echo $data->product_id;?>" onclick="change_status( 'product','<?php echo $data->product_id; ?>')" style="cursor: pointer" class="pre-icon os-icon os-icon-toggle-left" data-toggle="tooltip" title="Deactive" ></i>
                                                                        
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                          ?>
                                                                        <i id="product<?php echo $data->product_id;?>" onclick="change_status( 'product','<?php echo $data->product_id; ?>')" style="cursor: pointer;color: #c72727" class="pre-icon os-icon os-icon-toggle-right" data-toggle="tooltip" title="Active"></i>
                                                                        
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
            </div>
        </div>

        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>
