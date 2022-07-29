<!DOCTYPE html>
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
                        <li class="breadcrumb-item"><a href="#">Bill</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    
                    <div class="content-i">
                    <div class="content-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                    <h6 class="element-header">View Bill</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="element-wrapper">
                                     <div class="element-box">
                                        <?php
                                        $wh['register_id'] = $this->session->userdata('user');
                                        ?>
                                             <h5 class="form-header">Search Bill</h5>
                                             <div class="row">
                                                 <div class="col-md-3">
                                                     <div class="form-group"><label for="">Bill No.</label>
                                                         <select onchange="member_viewbill('billno',this.value);" class="form-control" name="Bill"type="dropdown">
                                                                <option selected="selected" value="">Select Bill No.</option>
                                                                <?php 
                                                                
                                                                $bill = $this->md->my_select('tbl_bill','*',$wh);
                                                                foreach ($bill as $data)
                                                                {
                                                                ?>
                                                                <option><?php echo $data->bill_id;?></option>
                                                                <?php
                                                                }
                                                                        
                                                                ?>
                                                        </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                 <div class="form-group"><label for="">Date</label>
                                                <input onchange="member_viewbill('date',this.value);" class="form-control" name="" placeholder="Enter Date" type="date" value="" >
                                                </div>
                                                </div>
                                            
                                                <div class="col-md-3">
                                                     <div class="form-group"><label for="">Payment Type.</label>
                                                        <select onchange="member_viewbill('pay_type',this.value);" class="form-control" name=""type="dropdown">
                                                                <option selected="selected" value="">Select Payment Type.</option>
                                                                <option value="cod">Cash On Delivery</option>
                                                                <option value="card">Card</option>
                                                        </select>
                                                     </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label for="">Coupon.</label>
                                                       <select onchange="member_viewbill('promocode',this.value);" class="form-control" name=""type="dropdown">
                                                               <option selected="selected" value="">Select Coupon</option>
                                                               <?php
                                                               $promocode = $this->md->my_select('tbl_promocode');
                                                               foreach($promocode as $data)
                                                               {
                                                               ?>
                                                               <option value="<?php echo $data->promocode_id; ?>"><?php echo $data->code; ?></option>
                                                               <?php
                                                               }
                                                               ?>
                                                       </select>
                                                    </div>
                                                </div>
                                             </div>
                                         
                                     </div>
                                 </div>
                            </div>
                            
                            <div class="col-lg-12" id="search_memberbill">
                            
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
        <script type="text/javascript">
      function member_viewbill(action , id)
            
    {    
        
        
        var data = { action:action , id:id };
        var path = 'http://localhost/agriculture_portal/backend/member_viewbill/';

        $.post(path , data , function(output){
            
        $("#search_memberbill").html(output);
        });

    }
    </script>
    </body>
</html>
