<?php

class Selleradmin extends CI_Controller
{
    public function verified_seller()
    {
        $wh['seller_id'] = $this->session->userdata('seller');
        $status = $this->md->my_select('tbl_seller','*',$wh)[0]->status;
        
        if($status == 0)
        {
            redirect('seller-dashboard');
        }
    }
    
    public function security()
    {
        if (!$this->session->userdata('seller'))
        {
            redirect('seller-registration-1');
        }
        
    }
    
    public function logout()
    {
        $wh['seller_id'] = $this->session->userdata('seller');
        
        $data['last_login'] = $this->session->userdata('seller_lastlogin');
        
        $this->md->my_update('tbl_seller',$data,$wh);
        
        $this->session->unset_userdata('seller');
        $this->session->unset_userdata('seller_lastlogin');
        
        redirect('seller-registration-1');
        
        
    }
    
    public function seller_dashboard()
    {
        $this->security();
        
        $this->load->view('selleradmin/seller_dashboard');
    }
    
    public function sellerprofile()
    {
        $this->security();
        
        $this->load->view('selleradmin/seller_profile');
    }
    
    public function seller_updateprofile()
    {
        $this->security();
        $data = array();
        $wh['seller_id'] = $this->session->userdata('seller');
        $data['record'] = $this->md->my_select('tbl_seller','*',$wh);
        
        if($this->input->post('edit'))
        {
            $this->form_validation->set_rules('company_name','','required|regex_match[/^[a-zA-Z0-9 ]+$/]',array('required'=>'Please Enter Company Name','regex_match'=>'Please Enter Valid Company Name.'));
            $this->form_validation->set_rules('email','','required|valid_email',array('required'=>'Please Enter Email ','valid_email'=>'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile','','required|numeric|exact_length[10]',array('required'=>'Please Enter Mobile Number.','numeric'=>'Please Enter Valid Mobile Number','exact_length'=>'Please Enter Valid Mobile Number'));
            $this->form_validation->set_rules('pan','','required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]',array('required'=>'Please Enter PAN No','regex_match'=>'Please Enter Valid PAN No.'));
            $this->form_validation->set_rules('gst','','required|regex_match[/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/]',array('required'=>'Please Enter GST No','regex_match'=>'Please Enter Valid GST No.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required'=>'Please Enter Address.','min_length'=>'Please Enter Minimunm 20 Charector'));
	    $this->form_validation->set_rules('pincode', '', 'required|regex_match[/^[0-9]{6}$/]', array('required'=>'Please Enter Pincode Number.','regex_match'=>'Please Enter Valid Pincoad.')); 
            $this->form_validation->set_rules('bname', '', 'required', array('required'=>'Please Enter Bank Benificial Name.'));
            $this->form_validation->set_rules('branchname', '', 'required', array('required'=>'Please Select Branch Name.'));
            $this->form_validation->set_rules('ifsc', '', 'required|regex_match[/^[A-Za-z]{4}\d{7}$/]', array('required'=>'Please Enter IFSC Code.','regex_match'=>'Please Enter Valid IFSC Code'));
            $this->form_validation->set_rules('ac_no', '', 'required|regex_match[/^[0-9]{8,12}$/]', array('required'=>'Please Enter Account No.','regex_match'=>'Please Enter Valid Account Number'));

            if($this->form_validation->run() == TRUE)
            {
                $old_email = $data['record'][0]->email;
                $new_email = $this->input->post('email');
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_seller` WHERE `email` !='".$old_email."' AND `email` = '".$new_email."' ")[0]->cc;
            
                if($count == 0)
                {
                    //profile
                    if(strlen($_FILES['profile']['name'])>0)
                    {
                        $config['upload_path']          = './selleradmin_assets/profile/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['max_size']             = 1024*4;
                        $config['file_name']            = "user_".time();
                        $config['encrypt_name']         = TRUE;

                        $this->load->library('upload',$config);

                        if (  $this->upload->do_upload('profile'))
                        {
                            //new photo update
                            $ins['profil_pic'] = "selleradmin_assets/profile/".$this->upload->data('file_name');
                           }
                        else
                        {
                            $data['error'] = $this->upload->display_errors();
                        } 
                    }
                    
                    $ins['company_name'] = $this->input->post('company_name');
                    $ins['mobile'] = $this->input->post('mobile');
                    $ins['email'] = $this->input->post('email');
                    $ins['pan_no'] = $this->input->post('pan');
                    $ins['gst_no'] = $this->input->post('gst');
                    $ins['address'] = $this->input->post('address');
                    $ins['pincode'] = $this->input->post('pincode');
                    $ins['bank_benificial_name'] = $this->input->post('bname');
                    $ins['branch_name'] = $this->input->post('branchname');
                    $ins['ifsc_code'] = $this->input->post('ifsc');
                    $ins['ac_no'] = $this->input->post('ac_no');
                    
                    $result = $this->md->my_update('tbl_seller',$ins,$wh);
                    
                    if($result == 1)
                    {
                        redirect('seller-profile');
                    }
                    
                }
                else 
                {
                    $data['email_error'] = "Email Already Exist";
                }
            }
        }
        
        $this->load->view('selleradmin/seller_updateprofile',$data);
    }
    
    public function seller_add_newproduct()
    {
        $this->security();
        $this->verified_seller();
        
        $data = array();
        
        if($this->input->post('add_product'))
        {
            $this->form_validation->set_rules('maincategory','','required',array('required'=>'Please Select Main Category.'));
            $this->form_validation->set_rules('subcategory','','required',array('required'=>'Please Select Sub Category.'));
            $this->form_validation->set_rules('petacategory','','required',array('required'=>'Please Select Peta Category.'));
            $this->form_validation->set_rules('description','','required|min_length[50]',array('required'=>'Please Enter Description.','min_length'=>'Please Enter Minimum 20 Charctor Description.'));
            $this->form_validation->set_rules('name','','required',array('required'=>'Please Enter Product Name.'));
            $this->form_validation->set_rules('code','','required',array('required'=>'Please Enter Required Code.'));
            $this->form_validation->set_rules('specification','','required|min_length[50]',array('required'=>'Please Enter Specification.','min_length'=>'Please Enter Minimum 20 Charctor Specification.'));
            
            
            
            if($this->form_validation->run() == TRUE)
            {
                $ins['seller_id'] = $this->session->userdata('seller');
                $ins['main_id'] = $this->input->post('maincategory');
                $ins['sub_id'] = $this->input->post('subcategory');
                $ins['peta_id'] = $this->input->post('petacategory');
                $ins['name'] = $this->input->post('name');
                $ins['code'] = $this->input->post('code');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 0;
                $ins['offer_id'] = 0;
                
                if($this->session->userdata('lastproduct'))
                {
                   $result = $this->md->my_update('tbl_product',$ins,array('product_id'=>$this->session->userdata('lastproduct'))); 
                }
                else 
                {
                    $result = $this->md->my_insert('tbl_product',$ins);
                }
                
                if($result == 1)
                {
                    $mx = $this->md->my_query('SELECT MAX(`product_id`) AS mx FROM `tbl_product`')[0]->mx;
                    
                    $this->session->set_userdata('lastproduct',$mx);
                    $this->session->set_userdata('productform',2);
                }
            }
        }
        
        if($this->input->post('back'))
        {
            $this->session->set_userdata('productform',1);
        }
        
        if($this->input->post('finish'))
        {
          $wh['product_id']=$this->session->userdata('lastproduct');
          $record = $this->md->my_select('tbl_product_image','*',$wh);
          $count = count($record);
          if( $count>0)
          {
              $this->session->unset_userdata('lastproduct');
              $this->session->unset_userdata('productform');
          }
         else 
         {
             $data['img_error'] = "Please Atleast One Image.";
         }
          
        }
        
        if($this->input->post('add_img'))
        {
            $this->form_validation->set_rules('weight','','required',array('required'=>'Please Select product Weight'));
            $this->form_validation->set_rules('qty','','required',array('required'=>'Please Select product Weight'));
            $this->form_validation->set_rules('price','','required|numeric',array('required'=>'Please Enter Price.','numeric'=>'Please Enter Valid Price.'));
            $this->form_validation->set_rules('qty','','required|numeric',array('required'=>'Please Enter Quentity.','numeric'=>'Please Enter Valid Quentity.'));
            
            if($this->form_validation->run() == TRUE)
            {
                // blank velidation
                if(strlen($_FILES['product']['name'][0]) > 0)
                {
                    $multi_path = "";
                    
                    //count
                    $count = count($_FILES['product']['name']);
                    
                    for($i=0;$i<$count;$i++)
                    {
                        //array
                        $_FILES['single']['name'] = $_FILES['product']['name'][$i];
                        $_FILES['single']['type'] = $_FILES['product']['type'][$i];
                        $_FILES['single']['size'] = $_FILES['product']['size'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['product']['tmp_name'][$i];
                        $_FILES['single']['error'] = $_FILES['product']['error'][$i];
                        
                        //upload arry
                        $config['upload_path']          = './assets/product/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['max_size']             = 1024*4;
                        $config['file_name']            = "product_". time()."_$i";
                        $config['encrypt_name']         = TRUE;

                        $this->load->library('upload',$config);
                        
                        if (  $this->upload->do_upload('single'))
                        {
                            $path = "assets/product/".$this->upload->data('file_name');
                            
                            $multi_path .= $path.",";
                               
                            $photo_success = 1;
                            
                            $data['img_errorlist'][$i] = " Product Photo Upload Successfully.";
                        }
                        else
                        {
                            $data['img_errorlist'][$i] = "Please Select Valid Product Photo";
                        }
                             
                    }
                    
                    if(isset($photo_success) && $photo_success == 1)
                    {
                       $multi_path = rtrim($multi_path,",");
                       
                       $ins['product_id'] = $this->session->userdata('lastproduct');
                       $ins['price'] = $this->input->post('price');
                       $ins['weight'] = $this->input->post('weight');
                       $ins['path'] = $multi_path;
                       $ins['qty'] = $this->input->post('qty');
                       
                       $result = $this->md->my_insert('tbl_product_image',$ins);
                       
                       if($result == 1)
                       {
                           $data['success'] = "Product Image Upload Successfully.";
                       }
                       
                    }
                    
                }
                else 
                {
                    $data['img_error'] = "Please Atleast One Product image.";
                }
            }
        }
        
        if(!$this->session->userdata('productform'))
        {
            $this->session->set_userdata('productform',1);
        }
        
        $data['main'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
        
        $this->load->view('selleradmin/seller_add_newproduct',$data);
    }
    
    public function seller_viewproduct()
    {
        $this->security();
        $this->verified_seller();
        $data = array();
        
        $wh['seller_id'] = $this->session->userdata('seller');
        $data['product'] = $this->md->my_select('tbl_product','*',$wh);
        
        $this->load->view('selleradmin/seller_viewproduct',$data);
    }
    public function seller_changepassword()
    {
        $this->security();
        $data = array();
        
        if($this->input->post('btn_ps'))
     {
         $cps = $this->input->post('cps');
         $wh['seller_id'] = $this->session->userdata('seller');
         $ps = $this->encryption->decrypt($this->md->my_select('tbl_seller','*',$wh)[0]->password);
         
         // current password
         if($cps == $ps)
         { 
             // new password and confirm new password
             $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required'=>'Please Enter New Password.','min_length'=>'Please Enter Minimum 8 Charcter.','max_length'=>'Please Enter Maximummum 16 Charcter.'));
             $this->form_validation->set_rules('cnps','','required|matches[nps]',array('required'=>'Please Enter Confirm New Password.','matches'=>'Password Doesnot Match'));
             
             if($this->form_validation->run() == TRUE)
             {
                 
                 $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                 
                 $result = $this->md->my_update('tbl_seller',$ins,$wh);
                 
                 if($result == 1)
                 {
                     redirect('seller-logout');
                 }
                 
             }
         }
         else
         {
             $data['error'] = "Current Password Does Not Match";
         }
         
     }
        
        $this->load->view('selleradmin/seller_changepassword',$data);
    }
    
    
}


