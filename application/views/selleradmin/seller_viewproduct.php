<!DOCTYPE html>
<html>
    <?php
    $this->load->view('selleradmin/head');
    ?> 
    <body class="menu-position-side menu-side-left full-screen with-content-panel" style="min-height: 0px">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">
                <?php
                $this->load->view('selleradmin/menu');
                ?>
                <div class="content-w">
                    <?php
                   $this->load->view('selleradmin/header');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-view-product">View Product</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">view Product</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="content-i">
                                <div class="element-box" style="width: 100%;">
                                                <h5 class="form-header">View All Product</h5>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Code</th>
                                                                <th>Name</th>
                                                                <th>Product</th>
                                                                <th>Price(Rs.)</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no=0;
                                                            foreach ($product as $data)
                                                                {
                                                                $wh['product_id'] = $data->product_id;
                                                                $multipath = $this->md->my_select('tbl_product_image','*',$wh)[0]->path;
                                                                
                                                                $path = explode(",", $multipath);
                                                                
                                                                
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no;?></td>
                                                                    <td><?php echo $data->code;?></td>
                                                                    <td><?php echo $data->name; ?></td>
                                                                    <td>
                                                                        <a href="#" style="text-decoration: none" class="active" data-toggle="tooltip" title="<?php echo $data->name;?>">
                                                                            <img src="<?php echo base_url().$path[0]; ?>"  style="width: 60px; height: 60px;"  class="img-rectangel" >
                                                                        </a>    
                                                                    </td>
                                                                    <td>Rs. <?php
                                                                        $price = $this->md->my_select('tbl_product_image','*')[0]->price;
                                                                        echo $price;
                                                                        ?> /-</td>
                                                                    <td>
                                                                        <?php 
                                                                        if($data->status == 0)
                                                                        {
                                                                          ?>
                                                                        <span style="color: red">Pending/Block</span>
                                                                        <?php
                                                                        }
                                                                        else 
                                                                        {
                                                                          ?>
                                                                        <span style="color: green">Active</span>
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
            <?php
        $this->load->view('selleradmin/footerscript');
        ?>
    </body>
</html>