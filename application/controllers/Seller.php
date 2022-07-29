<?php

class Seller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function seller_panel() {
        $data = array();
        // seller login code
        if ($this->input->post('login')) {

            //email verify
            $email = $this->input->post('selleremail');

            $record = $this->md->my_select('tbl_seller', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                //password verify
                $ops = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('sellerps') == $ops) {


                    //session
                    $this->session->set_userdata('seller', $record[0]->seller_id);
                    $this->session->set_userdata('seller_lastlogin', date('Y-m-d h:i:s'));

                    redirect('seller-dashboard');
                } else {
                    $data['error'] = "Invelid Email or Password Try Again !";
                }
            } else {
                $data['error'] = "Invelid Email or Password Try Again !";
            }
        }

        //insert code
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('company_name', '', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Please Enter Company Name', 'regex_match' => 'Please Enter Valid Company Name.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[tbl_seller.email]', array('required' => 'Please Enter Email ', 'valid_email' => 'Please Enter Valid Email.', 'is_unique' => ' Email Already Registered.'));
            $this->form_validation->set_rules('password', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter Password ', 'min_length' => 'Please Enter Password Between 8-16 Charactor.', 'max_length' => 'Please Enter Password Between 8-16 Charactor.'));
            $this->form_validation->set_rules('cpassword', '', 'required|matches[password]', array('required' => 'Please Enter Confirm Password ', 'matches' => 'Password Does Not Match.'));
            $this->form_validation->set_rules('mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Mobile Number.', 'numeric' => 'Please Enter Valid Mobile Number', 'exact_length' => 'Please Enter Valid Mobile Number'));
            $this->form_validation->set_rules('pan_no', '', 'required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]', array('required' => 'Please Enter PAN No', 'regex_match' => 'Please Enter Valid PAN No.'));
            $this->form_validation->set_rules('gst_no', '', 'required|regex_match[/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/]', array('required' => 'Please Enter GST No', 'regex_match' => 'Please Enter Valid GST No.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('company_name', $this->input->post('company_name'));
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_userdata('password', $this->input->post('password'));
                $this->session->set_userdata('mobile', $this->input->post('mobile'));
                $this->session->set_userdata('pan_no', $this->input->post('pan_no'));
                $this->session->set_userdata('gst_no', $this->input->post('gst_no'));

                redirect('seller-registration-2');
            }
        }
        $this->load->view('seller/seller_panel', $data);
    }

    public function seller_panel2() {
        $data = array();

        if (!$this->session->userdata('company_name')) {
            redirect('seller-registration-1');
        }

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State Name.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Enter City Name.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required' => 'Please Enter Address.', 'min_length' => 'Please Enter Minimunm 20 Charector'));
            $this->form_validation->set_rules('pincode', '', 'required|regex_match[/^[0-9]{6}$/]', array('required' => 'Please Enter Pincode Number.', 'regex_match' => 'Please Enter Valid Pincoad.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('state', $this->input->post('state'));
                $this->session->set_userdata('city', $this->input->post('city'));
                $this->session->set_userdata('address', $this->input->post('address'));
                $this->session->set_userdata('pincode', $this->input->post('pincode'));

                redirect('seller-registration-3');
            }
        }



        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $this->load->view('seller/seller_panel_2', $data);
    }

    public function seller_panel3() {
        $data = array();

        if (!$this->session->userdata('company_name') && !$this->session->userdata('state')) {
            redirect('seller-registration-1');
        } elseif ($this->session->userdata('company_name') && !$this->session->userdata('state')) {
            redirect('seller-registration-2');
        }

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('bank_benificial_name', '', 'required', array('required' => 'Please Enter Bank Benificial Name.'));
            $this->form_validation->set_rules('bank_name', '', 'required', array('required' => 'Please Select Bank Name.'));
            $this->form_validation->set_rules('branch_name', '', 'required', array('required' => 'Please Select Branch Name.'));
            $this->form_validation->set_rules('ifsc_code', '', 'required|regex_match[/^[A-Za-z]{4}\d{7}$/]', array('required' => 'Please Enter IFSC Code.', 'regex_match' => 'Please Enter Valid IFSC Code'));
            $this->form_validation->set_rules('ac_no', '', 'required|regex_match[/^[0-9]{8,12}$/]', array('required' => 'Please Enter Account No.', 'regex_match' => 'Please Enter Valid Account Number'));
            $this->form_validation->set_rules('cac_no', '', 'required|matches[ac_no]', array('required' => 'Please Enter Confirm Account No.', 'matches' => 'Account Number Does Not Match'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('bank_benificial_name', $this->input->post('bank_benificial_name'));
                $this->session->set_userdata('bank_name', $this->input->post('bank_name'));
                $this->session->set_userdata('branch_name', $this->input->post('branch_name'));
                $this->session->set_userdata('ifsc_code', $this->input->post('ifsc_code'));
                $this->session->set_userdata('ac_no', $this->input->post('ac_no'));

                redirect('seller-registration-4');
            }
        }


        $this->load->view('seller/seller_panel_3');
    }

    public function seller_panel4() {
        $data = array();


        if (!$this->session->userdata('company_name') && !$this->session->userdata('state') && !$this->session->userdata('bank_name')) {
            redirect('seller-registration-1');
        } else if ($this->session->userdata('company_name') && !$this->session->userdata('state') && !$this->session->userdata('bank_name')) {
            redirect('seller-registration-2');
        } else if ($this->session->userdata('company_name') && $this->session->userdata('state') && !$this->session->userdata('bank_name')) {
            redirect('seller-registration-3');
        }

        if ($this->input->post('add')) {

            $config['upload_path'] = './sellerassets/profile/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = "profile_" . time();
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile')) {

                //ins array
                $ins['company_name'] = $this->session->userdata('company_name');
                $ins['email'] = $this->session->userdata('email');
                $ins['password'] = $this->encryption->encrypt($this->session->userdata('password'));
                $ins['mobile'] = $this->session->userdata('mobile');
                $ins['pan_no'] = $this->session->userdata('pan_no');
                $ins['gst_no'] = $this->session->userdata('gst_no');
                $ins['location_id'] = $this->session->userdata('city');
                $ins['email'] = $this->session->userdata('email');
                $ins['address'] = $this->session->userdata('address');
                $ins['pincode'] = $this->session->userdata('pincode');
                $ins['bank_benificial_name'] = $this->session->userdata('bank_benificial_name');
                $ins['bank_name'] = $this->session->userdata('bank_name');
                $ins['branch_name'] = $this->session->userdata('branch_name');
                $ins['ifsc_code'] = $this->session->userdata('ifsc_code');
                $ins['ac_no'] = $this->session->userdata('ac_no');
                $ins['profil_pic'] = "sellerassets/profile/" . $this->upload->data('file_name');
                $ins['join_date'] = date('Y-m-d');
                $ins['status'] = 0;



                $result = $this->md->my_insert('tbl_seller', $ins);

                if ($result == 1) {
                    $this->session->unset_userdata('company_name');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('password');
                    $this->session->unset_userdata('mobile');
                    $this->session->unset_userdata('pan_no');
                    $this->session->unset_userdata('gst_no');
                    $this->session->unset_userdata('state');
                    $this->session->unset_userdata('city');
                    $this->session->unset_userdata('address');
                    $this->session->unset_userdata('pincode');
                    $this->session->unset_userdata('bank_benificial_name');
                    $this->session->unset_userdata('bank_name');
                    $this->session->unset_userdata('branch_name');
                    $this->session->unset_userdata('ifsc_code');
                    $this->session->unset_userdata('ac_no');

                    $id = $this->md->my_query("SELECT MAX(`seller_id`) AS mx FROM `tbl_seller`")[0]->mx;

                    $this->session->set_userdata('seller', $id);
                    $this->session->set_userdata('seller_lastlogin', date('Y-m-d h:i:s'));

                    redirect('seller-dashboard');
                }
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }

        $this->load->view('seller/seller_panel_4', $data);
    }

    public function seller_forgetpassword() {
        $data = array();

        $this->load->view('seller/seller_forgetpassword', $data);
    }

}
