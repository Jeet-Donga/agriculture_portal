
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
                        <li class="breadcrumb-item"><a href="<?php base_url()?>member-wishlist">My Wishlist</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">My Wishlist</h6>
                                </div>
                            </div>
                        </div>
                        <div class="content-i">
                            <div class="element-box" style="width: 100%;">
                                <h5 class="form-header">View My Wishlist</h5>
                                    <div class="table-responsive">
                                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                            <thead style="text-align: center;vertical-align: middle">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>product Image</th>
                                                    <th>Product </th>
                                                    <th> View Detail</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                                <tbody style="text-align: center;vertical-align: middle">
                                                    <?php
                                                    
                                                    $wish = $this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user')));
                                                    
                                                    $no=0;
                                                    foreach ($wish as $data) 
                                                    {
                                                        $no++;
                                                        
                                                        $name = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0]->name;
                                                        $multipath = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->path;
                                                        $path = explode(",", $multipath);
                                                        
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url().$path[0]; ?>" title="<?php echo $name; ?>" style="width: 100px"  class="img-rectangel" >
                                                            </td>
                                                            <td><?php echo $name; ?></td>
                                                            <td><a href="<?php echo base_url()?>product-detail/<?php echo $data->product_id; ?>" target="_new">View Details</a></td>
                                                            <td>
                                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url() ?>delete/wishlist/<?php echo $data->wish_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
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
                                                        <p style="text-transform: capitalize;">Are you sure want to delete Wishlist ?</p>
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





