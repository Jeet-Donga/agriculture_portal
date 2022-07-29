<!DOCTYPE html>
<html>
    <?php
    $this->load->view('selleradmin/head');
    ?> 
  <style type="text/css">
    .err-msg + p
    {
        color: red;
        font-size: 13px;
    }
</style>

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
                        <li class="breadcrumb-item"><a href="<?php base_url()?>seller-add-new-product">Add New Product</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">Add New product</h6>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if($this->session->userdata('productform') == 1)
                        {
                            if($this->session->userdata('lastproduct'))
                            {
                                $wh['product_id'] = $this->session->userdata('lastproduct');
                                $setproduct = $this->md->my_select('tbl_product','*',$wh);
                            }
                        ?>
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="element-wrapper">
                                <div class="element-box">
                                 <h5 class="form-header">Add product Detail</h5>
                                 <form action="" method="post" name="form1">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group"><label for="">Main Category :</label>
                                            <select class="form-control" type="dropdown" name="maincategory" style="text-transform: capitalize" onchange="set_combo('subcategory',this.value)">
                                            <option value="">Select Main Category </option>
                                            <?php 
                                                foreach($main as $data)
                                                {
                                            ?>
                                            <option value="<?php echo $data->category_id;?>" <?php
                                            if(!isset($success) && set_select('maincategory',$data->category_id))
                                            {
                                                echo set_select('maincategory',$data->category_id);
                                            }
                                            else if(isset ($setproduct))
                                            {
                                                if($setproduct[0]->main_id == $data->category_id)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>><?php echo $data->name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                            <p class="err-msg">
                                                <?php 
                                                echo form_error('maincategory');
                                                ?>
                                            </p>
                                        </div> 
                                        <div class="form-group"><label for="">Sub Category :</label>
                                            <select class="form-control" type="dropdown" name="subcategory" id="subcategory" style="text-transform: capitalize" onchange="set_combo('petacategory',this.value)" >
                                            <option value="">Select Sub Category</option>
                                            <?php 
                                                if($this->input->post('maincategory'))
                                                {
                                                    $wh['parent_id'] = $this->input->post('maincategory');
                                                    $record = $this->md->my_select('tbl_category','*',$wh);
                                                    
                                                    foreach ( $record as $data)
                                                    {
                                            ?>
                                            <option value="<?php echo $data->category_id; ?>" <?php
                                            if(!isset($success) && set_select('subcategory',$data->category_id))
                                            {
                                                echo set_select('subcategory',$data->category_id);
                                            }
                                            ?>  ><?php echo $data->name;?></option>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                                    $whe['parent_id']=$setproduct[0]->main_id;
                                                    $record=$this->md->my_select('tbl_category','*',$whe);
                                                    
                                                    foreach ( $record as $data)
                                                    {
                                            ?>
                                            <option value="<?php echo $data->category_id; ?>" <?php
                                            if($data->category_id == $setproduct[0]->sub_id)
                                                
                                            {
                                                echo "selected";
                                            }
                                            ?>  ><?php echo $data->name;?></option>
                                            <?php
                                                    }
                                                }
                                                
                                            ?>
                                        </select>
                                            <p class="err-msg">
                                                <?php 
                                                echo form_error('subcategory');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group"><label for="">Peta Category :</label>
                                            <select class="form-control" type="dropdown" name="petacategory" style="text-transform: capitalize" id="petacategory" >
                                            <option value="">Select Peta Category</option>
                                            <?php
                                                if($this->input->post('subcategory'))
                                                {
                                                  $whh['parent_id'] = $this->input->post('subcategory');
                                                    $record = $this->md->my_select('tbl_category','*',$whh); 
                                                    
                                                    {
                                            ?>
                                            <option value="<?php echo $data->category_id; ?>" <?php
                                            if(!isset($success) && set_select('petacategory',$data->category_id))
                                            {
                                                echo set_select('petacategory',$data->category_id);
                                                
                                            }
                                            
                                            ?>  ><?php echo $data->name;?></option>
                                            <?php
                                                    }
                                                }
                                                else 
                                                {
                                                    $whr['parent_id']=$setproduct[0]->sub_id;
                                                    $record=$this->md->my_select('tbl_category','*',$whr);
                                                    
                                                    foreach ( $record as $data)
                                                    {
                                            ?>
                                            <option value="<?php echo $data->category_id; ?>" <?php
                                            if($data->category_id == $setproduct[0]->peta_id)
                                                
                                            {
                                                echo "selected";
                                            }
                                            ?>  ><?php echo $data->name;?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                            <p class="err-msg">
                                                <?php 
                                                echo form_error('petacategory');
                                                ?>
                                            </p>
                                        </div></br>
                                    <div class="form-group"><label for=""> Product Description :</label>
                                        <textarea class="form-control" name="description" id="editor2" type="text"><?php 
                                        if(!isset($success) && set_value('description'))
                                        {
                                            echo set_value('description');
                                        }
                                        else if(isset ($setproduct))
                                        {
                                            echo $setproduct[0]->description;
                                        }
                                        ?></textarea>
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('description');
                                        ?>
                                    </p>
                                    </div>    
                                    
                                    <div>
                                    <button class="btn btn-primary" name="add_product" value="Set Specification" type="submit">Set Specification</button>
                                    <button class="btn btn-default"  type="reset">Clear</button>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6"> 
                                    <div class="form-group"><label for="">Product Name :</label>
                                        <input class="form-control" name="name" placeholder="Product Name" type="text" value="<?php 
                                        if(!isset($success) && set_value('name'))
                                        {
                                            echo set_value('name');
                                        }else if(isset ($setproduct))
                                        {
                                            echo $setproduct[0]->name;
                                        }
                                        ?>" />
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('name');
                                        ?>
                                    </p>
                                        </div>
                                        <div class="form-group"><label for="">Product Code :</label>
                                            <input class="form-control" name="code" placeholder="Product Code" type="text" value="<?php 
                                        if(!isset($success) && set_value('code'))
                                        {
                                            echo set_value('code');
                                        }
                                        else if(isset ($setproduct))
                                        {
                                            echo $setproduct[0]->code;
                                        }
                                        ?>" />
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('code');
                                        ?>
                                    </p>
                                        </div>
                                        
                                    
                                    <div class="form-group"><label for=""> Product Specification :</label>
                                        <textarea class="form-control" name="specification" id="editor3" type="text"><?php 
                                        if(!isset($success) && set_value('specification'))
                                        {
                                            echo set_value('specification');
                                        }
                                        else if(isset ($setproduct))
                                        {
                                            echo $setproduct[0]->specification;
                                        }
                                        ?></textarea>
                                        <p class="err-msg">
                                        <?php 
                                        echo form_error('specification');
                                        ?>
                                    </p>
                                    </div>
                                </div>
                            </div>
                                 </form>
                                </div>
                           </div>
                        </div>        
                    </div>
                        <?php
                        }
                        elseif ($this->session->userdata('productform') == 2)
                        {
                            $wh['product_id'] = $this->session->userdata('lastproduct');
                            $detail = $this->md->my_select('tbl_product','*',$wh)[0];
                        ?>
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="element-wrapper">
                                <div class="element-box">
                                 <h5 class="form-header">Add Product Image</h5>
                                 <form action="" method="post" name="productform2" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group"><label for="">Product Name :</label>
                                            <input class="form-control"  placeholder="Product Name" readonly="" disabled="" value="<?php echo $detail->name; ?>" />
                                        </div>
                                        
                                        <div class="form-group"><label for="">Weight :</label>
                                        <select class="form-control" type="dropdown" name="weight" >
                                            <option value="">Select Weight</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','100 gm'))
                                                    {
                                                        echo set_select('weight','100 gm');
                                                    }
                                            ?>>100 gm</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','200 gm'))
                                                    {
                                                        echo set_select('weight','200 gm');
                                                    }
                                            ?>>200 gm</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','500 gm'))
                                                    {
                                                        echo set_select('weight','500 gm');
                                                    }
                                            ?>>500 gm</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','700 gm'))
                                                    {
                                                        echo set_select('weight','700 gm');
                                                    }
                                            ?>>700 gm</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','1 Kg'))
                                                    {
                                                        echo set_select('weight','1 Kg');
                                                    }
                                            ?>>1 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','2 Kg'))
                                                    {
                                                        echo set_select('weight','2 Kg');
                                                    }
                                            ?>>2 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','3 Kg'))
                                                    {
                                                        echo set_select('weight','3 Kg');
                                                    }
                                            ?>>3 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','4 Kg'))
                                                    {
                                                        echo set_select('weight','4 Kg');
                                                    }
                                            ?>>4 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','5 Kg'))
                                                    {
                                                        echo set_select('weight','5 Kg');
                                                    }
                                            ?>>5 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','8 Kg'))
                                                    {
                                                        echo set_select('weight','8 Kg');
                                                    }
                                            ?>>8 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','10 Kg'))
                                                    {
                                                        echo set_select('weight','10 Kg');
                                                    }
                                            ?>>10 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','12 Kg'))
                                                    {
                                                        echo set_select('weight','12 Kg');
                                                    }
                                            ?>>12 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','15 Kg'))
                                                    {
                                                        echo set_select('weight','15 Kg');
                                                    }
                                            ?>>15 Kg</option>
                                            <option <?php 
                                                if(!isset($success) && set_select('weight','20 Kg'))
                                                    {
                                                        echo set_select('weight','20 Kg');
                                                    }
                                            ?>>20 Kg</option>
                                        </select>
                                            <p class="err-msg">
                                        <?php 
                                        echo form_error('weight');
                                        ?>
                                        </p>
                                        
                                        </div>
                                    <div class="form-group"><label for="">Price :</label>
                                            <input class="form-control" name="price" placeholder="Price In Rs." type="text" value="<?php 
                                        if(!isset($success) && set_value('price'))
                                        {
                                            echo set_value('price');
                                        }
                                        ?>"/>
                                            <h6><b>NOTE: </b>Hear,price is gross price,profit of will be added in your above price</h6>
                                        </div>
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('price');
                                        ?>
                                    </p>
                                    
                                        <div class="form-group"><label for="">Stock</label>
                                            <input class="form-control" name="qty" placeholder="Stock" type="text" value="<?php 
                                            if(!isset($success) && set_value('qty'))
                                        {
                                            echo set_value('qty');
                                        }
                                            ?>"/>
                                            
                                        </div>
                                    <p class="err-msg">
                                        <?php 
                                        echo form_error('qty');
                                        ?>
                                    </p>
                                    <div>
                                    <button class="btn btn-primary" name="back" value="Back" type="submit">< Back</button>
                                    <button class="btn btn-primary" name="add_img" value="ADD" type="submit">Add</button>
                                    <button class="btn btn-primary" name="finish" value="FINISH" type="submit">Finish</button>
                                    <button class="btn btn-default"  value="CLEAR" type="reset">Clear</button>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <input type="file" name="product[]" id="gallery-photo-add" multiple="" style="display: none;" />
                                    <label for="gallery-photo-add" style="width: 100%;">
                                        <div class="gallery" style="cursor: pointer; background: #ddd; width: 100%; padding:80px;">
                                            <h4 id="preview-text">Click To Upload</h4>
                                            <img id="preview-img" style="width: 250px"/>
                                        </div>
                                    </label>
                                    <?php
                                if(isset($img_errorlist))
                                {
                                    $c=0;
                                    ?>
                                    
                                    <div class="alert alert-danger">
                                        <?php
                                            foreach( $img_errorlist as $single)
                                            {
                                                $c++; 
                                                    ?>
                                                        <strong><?php echo "<br/>$c.".$single; ?></strong> 
                                                    <?php
                                            } 
                                        ?>
                                    </div>
                                <?php  
                                }   
                                ?>
                                </div>
                                
                                
                            </div>
                                <div class="col-md-12">
                                    <?php
                                            if(isset($img_error))
                                            {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>Oops !</strong> <?php echo $img_error; ?>
                                            </div>
                                        <?php
                                            }
                                             if(isset($success))
                                            {
                                        ?>
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>Ok !</strong> <?php echo $success; ?>
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
                        <?php
                        }
                        ?>
                        
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <script src="<?php base_url()?>ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">
            CKEDITOR.replace("editor2");
        </script>
        <script type="text/javascript">
            CKEDITOR.replace("editor3");
        </script>
        
        <?php
        $this->load->view('selleradmin/footerscript');
        ?>
        
        <script>
                  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="width:100px;padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
        $("#preview-text").html('');
    });
});
            </script>
            <script src="<?php echo base_url();?>admin_assets/js/set.js" type="text/javascript"></script>
    </body>
</html>

