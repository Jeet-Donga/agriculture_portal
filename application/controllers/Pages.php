<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
        //start offer
        $offer = $this->md->my_select('tbl_offer');
        foreach($offer as $single)
        {
            $today = date('Y-m-d');
            $start_date = $single->start_date;
            
            if($today >= $start_date)
            {
                //active offer 
                $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$single->offer_id));
                
                //applied to product
                $category = $single->label;
                $min_price = $single->min_price;
                $max_price = $single->max_price;
                $id = $single->offer_id;
                $category_id = $single->category_id;
                
                if($category == "main")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `main_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "sub")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `sub_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "peta")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `peta_id` = $category_id AND `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
                else if($category == "All")
                {
                    $this->md->my_sql("UPDATE `tbl_product` SET `offer_id` = $id WHERE `product_id` IN ( SELECT `product_id` FROM `tbl_product_image` WHERE `price` >= $min_price AND `price` <= $max_price )");                
                }
            }
        }
        
        //end offer
        $offer = $this->md->my_select('tbl_offer');
        foreach($offer as $single)
        {
            $today = date('Y-m-d');
            $end_date = $single->end_date;
            
            
            if($today > $end_date)
            {   
                $whhr['offer_id'] = $single->offer_id;
                
                //applied to product
                $this->md->my_update('tbl_product',array('offer_id'=>0),$whhr);
                
                //deactive offer
                $this->md->my_update('tbl_offer',array('status'=>0),$whhr);
                
            }
        }
    }
    
    public function index()
    {
        $this->load->view('index');
    }
    
    public function about()
    {
        $this->load->view('about_us');
    }
    
    public function contact()
    {
        $data = array();
        if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valide Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valide Email.'));
            $this->form_validation->set_rules('subject', '', 'required|max_length[25]|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Email.', 'regex_match' => 'Please Enter Valide Subject.', 'max_length' => 'Please Enter Maximum 25 Charactor Subject.'));
            $this->form_validation->set_rules('message', '', 'required|min_length[20]', array('required' => 'Please Enter Message.', 'min_length' => 'Please Enter Minimum 20 Charactor Message.'));

            if ($this->form_validation->run() == TRUE) 
            {
                    
                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['subject'] = $this->input->post('subject');
                $ins['message'] = $this->input->post('message');


                $result = $this->md->my_insert('tbl_contact_us', $ins);
                if ($result == 1) 
                {
                    $data['success'] = "Your Message Sent Successfully.";
                } 
                else 
                {
                    $data['error'] = "Something Went Wrong.";
                }

                     
            }
        }

        $this->load->view('contact_us', $data);
    }
    
    public function faq1()
    {
        $this->load->view('faq');
    }
    
    public function forgotpassword()
    {
        $this->load->view('forgot_password');
    }
    
    public function log()
    {
        $data = array();
        
        if ($this->input->post('login'))
        {
            //email verify
            $email = $this->input->post('email');
            
            $record = $this->md->my_select('tbl_register','*',array('email'=>$email));
            $count = count($record);
            
            if ($count == 1)
            {
                //password verify
                $pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('ps') == $pass)
                {
                    //status check
                    
                    if($record[0]->status == 1)
                    {
                       
                    //create cookie
                    if($this->input->post('svp'))
                    {
                        $expier = 60 * 60 * 24 * 2;
                        
                        set_cookie('user_email', $this->input->post('email'),$expier);
                        set_cookie('user_password', $this->input->post('ps'),$expier);
                    }
                    else
                    {
                        if ($this->input->cookie('user_email'))
                        {
                            set_cookie('user_email', '',-10);
                            set_cookie('user_password', '',-10);
                        }
                    }
                  //session
                  $this->session->set_userdata('user',$record[0]->register_id);
                  $this->session->set_userdata('user_lastlogin',date('Y-m-d h:i:s'));
                  
                  redirect('home');  
                    }
                    else 
                    {
                        $data['error'] = "Your Account Is Inactive. Please Contact Admin For Activation.";
                    }
                   
                }
                else
                {
                  $data['error'] = "Invelid Email or Password Try Again !";  
                }
            }
            else
            {
                $data['error'] = "Invelid Email or Password Try Again !";
            }
            
        }
        
        $this->load->view('login',$data);
    }
    
    public function privacy()
    {
        $this->load->view('privacy_policy');
    }
    
    public function reg()
    {
        $data = array();
        if($this->input->post('register'))
        {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valide Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[tbl_register.email]', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valide Email.','is_unique'=>'Email Already Exist.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}+$/]', array('required' => 'Please Enter Mobile No.', 'regex_match' => 'Please Enter Valide Mobile No.'));
            $this->form_validation->set_rules('ps','','required|min_length[8]|max_length[16]',array('required'=>'Please Enter Password ','min_length'=>'Please Enter Password Between 8-16 Charactor.','max_length'=>'Please Enter Password Between 8-16 Charactor.'));
            $this->form_validation->set_rules('cps','','required|matches[ps]',array('required'=>'Please Enter Confirm Password ','matches'=>'Password Does Not Match.'));
             
            
            if ($this->form_validation->run() == TRUE)
            {
               $ins['name'] = $this->input->post('name');
               $ins['email'] = $this->input->post('email');
               $ins['mobile'] = $this->input->post('mobile');
               $ins['password'] = $this->encryption->encrypt($this->input->post('ps'));
               $ins['join_date'] = date('Y-m-d');
               $ins['status'] = 1;
               
               $result = $this->md->my_insert('tbl_register',$ins);
               
               if($result == 1)
               {
                  $mx = $this->md->my_query("SELECT MAX(`register_id`) AS mx FROM `tbl_register`")[0]->mx;   
               
                  $this->session->set_userdata('user',$mx);
                  $this->session->set_userdata('user_lastlogin', date('Y-m-d h:i:s'));
                  
                  redirect('member-dashboard');
                  
               }
            }
            
        }
        
        $this->load->view('registration');
    }
    
    public function ret_ref()
    {
        $this->load->view('return_refund_policy');
    }
    
    public function suggest() 
    {
        $data = array();
        if ($this->input->post('add'))
        {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valide Name.'));
            $this->form_validation->set_rules('message', '', 'required|min_length[20]', array('required' => 'Please Enter Message.', 'min_length' => 'Please Enter Minimum 20 Charactor Message.'));

            if ($this->form_validation->run() == TRUE)
            {
                $ins['name'] = $this->input->post('name');
                $ins['message'] = $this->input->post('message');


                $result = $this->md->my_insert('tbl_feedback',$ins);
                if ($result == 1) 
                {
                    $data['success'] = "Your Message Sent Successfully.";
                } 
                else
                {
                    $data['error'] = "Something Went Wrong.";
                }

            }
        }

        $data['aa'] = "dvgfdfddh";
        $this->load->view('suggest_us',$data);
    }

    public function term()
    {
        $this->load->view('term_and_conditions');
    }
    
    public function fpwd()
    {
        $this->load->view('forgot_password');
    }
    
    public function product_list()
    {
        $this->load->view('product_list');
    }
    
    public function product_detail()
    {
     if($this->uri->segment(2) == "")
     {
         redirect('product-list');
     }
        
        $this->load->view('product_detail');
    }
    public function order_success()
    {
        $this->load->view('order_success');
    }

        public function view_cart()
    {
        if(!$this->session->userdata('user'))
        {
            redirect('login');
        }
        $this->load->view('view_cart');
    }
    
    public function checkout()
    {
               
        if(!$this->session->userdata('user'))
        {
            redirect('login');
        }
        $count = count($this->md->my_select('tbl_cart','*',array('register_id'=> $this->session->userdata('user'))));
        
        if($count == 0)
        {
            redirect('view-cart');
        }
        
        $data = array();
        if($this->input->post('checkout'))
        {
            if(!$this->input->post('pay_type') || !$this->session->userdata('shipment_id'))
            {
                $data['error'] = "Please Select Payment Information or Shipment Information.";
            }
            else 
            {
             //bill insert   
                $ins['register_id'] = $this->session->userdata('user');
                $ins['shipment_id'] = $this->session->userdata('shipment_id');
                
                $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
                
                if($this->session->userdata('promocode_id'))
                {
                    $ins['promocode_id'] = $this->session->userdata('promocode_id');
                    $codedetail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                    $amount = $codedetail->amount;
                    $ins['amount'] = $billprice - $amount;
                }    
                else
                {
                    $ins['promocode_id'] = 0;
                    $ins['amount'] = $billprice;
                }
                
                $ins['bill_date'] = date('Y-m-d');
                $ins['pay_type'] = $this->input->post('pay_type');
                
                $result = $this->md->my_insert('tbl_bill',$ins);
                
                if( $result == 1)
                {
                    //transection insert
                    
                    $billid = $this->md->my_query("SELECT MAX(`bill_id`) AS mx FROM `tbl_bill`")[0]->mx;
                    
                    $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=> $this->session->userdata('user')));
                    
                    foreach ($cartdata as $item)
                    {
                        $tr['bill_id'] = $billid;
                        $tr['product_id'] = $item->product_id;
                        $tr['image_id'] = $item->image_id;
                        $tr['gross_price'] = $item->gross_price;
                        $tr['discount'] = $item->discount;
                        $tr['net_price'] = $item->net_price;
                        $tr['qty'] = $item->qty;
                        $tr['total_price'] = $item->total_price;
                        
                        $this->md->my_insert('tbl_transaction',$tr);
                    }
                    
                    // cart data delete
                    $this->md->my_delete('tbl_cart',array('register_id'=> $this->session->userdata('user')));
                    $this->session->unset_userdata('shipment_id');
                    $this->session->unset_userdata('promocode_id');
                    
                    $pay_type = $this->input->post('pay_type');
                    
                    // transfer to route
                    if($pay_type == "cod")
                    {
                        redirect('order-success');
                    }
                    else
                    {
                        redirect('https://www.paypal.com/in/home');
                    }
                }
                
                
            }
        }
        $this->load->view('checkout',$data);
    }
}