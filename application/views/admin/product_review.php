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
                        <li class="breadcrumb-item"><a href="#">Product Review</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Manage Product Review</h6>
                                        <div class="content-i">
                                            <div class="element-box" style="width: 100%;">
                                                <h5 class="form-header">View All Product Review</h5>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Product Image</th>
                                                                <th>Profile</th>
                                                                <th>Rating</th>
                                                                <th>Review</th>
                                                                <th>Status</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                            foreach ($review as $data) 
                                                                {
                                                                $no++;
                                                                $user = $this->md->my_select('tbl_register','*',array('register_id'=>$data->register_id))[0];
                                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                                $multipath = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->path;
                                                                $path = explode(",", $multipath);
                                                                
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td>
                                                                        <img src="<?php echo base_url().$path[0]; ?>" style="width: 60px; height: 60px;"  class="img-rectangel" title="<?php echo $product->name; ?>" >
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" style="text-decoration: none" class="active" data-toggle="tooltip" title="<?php echo $user->name; ?>">
                                                                        <?php 
                                                                            if(strlen($user->profile_pic)>0)
                                                                            {
                                                                            ?>
                                                                            <img src="<?php echo base_url().$user->profile_pic; ?>"  style="width: 50px; height: 50px; border-radius: 50%"  class="img-rectangel" >
                                                                    
                                                                            <?php
                                                                            }
                                                                            else 
                                                                            {
                                                                             ?>
                                                                            <img src="<?php echo base_url(); ?>member_assets/img/blankuser.png"  style="width: 50px; height: 50px; border-radius: 50%"  class="img-rectangel" >
                                                                    
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                        $rate  = $data->rating;
                                                                        
                                                                        for( $i=1 ; $i<=$rate ; $i++)
                                                                        {
                                                                        ?>
                                                                        <i class="pre-icon os-icon os-icon-star"></i>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $data->msg;?></td>
                                                                    
                                                                    <td>
                                                                        <?php 
                                                                        if($data->status == 0)
                                                                        {
                                                                          ?>
                                                                        <i id="review<?php echo $data->review_id;?>" onclick="change_status( 'review','<?php echo $data->review_id; ?>')" style="cursor: pointer" class="pre-icon os-icon os-icon-toggle-left" data-toggle="tooltip" title="Deactive" ></i>
                                                                        
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                          ?>
                                                                        <i id="review<?php echo $data->review_id;?>" onclick="change_status( 'review','<?php echo $data->review_id; ?>')" style="cursor: pointer;color: #c72727" class="pre-icon os-icon os-icon-toggle-right" data-toggle="tooltip" title="Active"></i>
                                                                        
                                                                        <?php  
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url() ?>delete/review/<?php echo $data->review_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
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
                                                                <p style="text-transform: capitalize;">Are you sure want to delete product review ?</p>
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
                </div>
            </div>
        </div>

        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>
</html>
