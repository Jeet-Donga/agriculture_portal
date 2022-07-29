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
                                <li class="breadcrumb-item"><a href="#">Banner</a></li>
                            </ul>
                            <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                            <div class="content-i">
                            <div class="content-box">
                                <div class="row">
                               <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Manage Banner</h6>
                                </div>
                            </div>
                        </div>
                            <div class="element-box">
                                <form method="post" action="" name="bannere" enctype="multipart/form-data">
                                <h5 class="form-header">Add New Banner</h5>
                                <div class="content-i">
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                            
                                                <div class="form-group"><label for="">Title</label><input class="form-control" placeholder="Enter Title" type="text" name="title" value="<?php
                                                if (!isset($success)&& set_value('title'))
                                                       {
                                                           echo set_value('title');
                                                       }
                                                ?>">
                                        <p class="err-msg">
                                            <?php
                                                echo form_error('title');
                                            ?>
                                        </p></div>
                                                   
                                                <div class="form-group"><label for="">Subtitle</label><input class="form-control" placeholder="Enter Subtitle" type="text" name="subtitle" value="<?php
                                                if (!isset($success)&& set_value('subtitle'))
                                                       {
                                                           echo set_value('subtitle');
                                                       }
                                                ?>">
                                                    <p class="err-msg">
                                            <?php
                                                echo form_error('subtitle');
                                            ?>
                                        </p></div>
                                                    
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
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="element-wrapper">
                                                <div><label for="">Select Banner</div>
                                                <input type="file" name="banner" id="banner" style="display: none;" />
                                                <div >
                                                    <label for="banner" style="width: 100%;">
                                                    <div style="cursor: pointer; background: #ddd; width: 100%; padding:50px 20px; text-align: center">
                                                        <h4 id="preview-text">Click To Upload</h4>
                                                        <img id="preview-img" style="width: 250px"/>
                                                    </div>
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                    </div>
                                </form>
                 </div>
                    
                    <div class="element-box">
                    <h5 class="form-header">View All Banner</h5>
                    <div class="content-i">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                      <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Title</th>
                                                                <th>Subtitle</th>
                                                                <th>Banner</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $no = 0;
                                                            foreach ($banner as $data)
                                                              {
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no;?></td>
                                                                    <td><?php echo $data->title;?></td>
                                                                    <td><?php echo $data->subtitle;?></td>
                                                                    <td><img src="<?php echo base_url().$data->path; ?>" alt="" style="width: 100px;" ></td>
                                                                    <td>
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/banner/<?php echo $data->banner_id; ?>')" style="text-decoration: none" data-toggle="tooltip" title="Remove Data">
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
                                                                <p style="text-transform: capitalize;">Are you sure want to delete banner ?</p>
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
        <?php
        $this->load->view('admin/footerscript');
        ?>
            <script>
                  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
        
      $("#preview-text").html("");  
      $('#preview-img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#banner").change(function() {
  readURL(this);
});
            </script>
    </body>
</html>