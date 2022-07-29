<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-authentication');
        }
    }

    public function forget_password() {
        $record = $this->md->my_select('tbl_admin_login', '*');
        $ps = $this->encryption->decrypt($record[0]->password);
        $email = $record[0]->email;

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'jeetdonga46@gmail.com', // change it to yours email id wrong c
            'smtp_pass' => 'Ramvatik1234', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('jeetdonga46@gmail.com'); // change it to yours
        $this->email->to($email); // change it to yours
        $this->email->subject('Password Recover');

        $msg = '<b>Your Password Is : </b> ' . $ps;

        $this->email->message($msg);

        if ($this->email->send()) {
            redirect('admin-authentication/1');
        }
    }

    public function index() {
        $data = array();



        if ($this->input->post('login')) {
            //email verify
            $email = $this->input->post('email');

            $record = $this->md->my_select('tbl_admin_login', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                //password verify
                $ops = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('ps') == $ops) {
                    //create cookie
                    if ($this->input->post('svp')) {
                        $expier = 60 * 60 * 24 * 2;

                        set_cookie('admin_email', $this->input->post('email'), $expier);
                        set_cookie('admin_password', $this->input->post('ps'), $expier);
                    } else {
                        if ($this->input->cookie('admin_email')) {
                            set_cookie('admin_email', '', -10);
                            set_cookie('admin_password', '', -10);
                        }
                    }
                    //session
                    $this->session->set_userdata('admin', $record[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('Y-m-d h:i:s'));

                    redirect('admin-dashboard');
                } else {
                    $data['error'] = "Invelid Email or Password Try Again !";
                }
            } else {
                $data['error'] = "Invelid Email or Password Try Again !";
            }
        }

        $this->load->view('admin/index', $data);
    }

    public function logout() {
        $this->security();

        $wh['admin_id'] = $this->session->userdata('admin');

        $data['last_login'] = $this->session->userdata('admin_lastlogin');

        $this->md->my_update('tbl_admin_login', $data, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-authentication');
    }

    public function manage_dashboard() {
        $this->security();

        $this->load->view('admin/dashboard');
    }

    public function manage_contact() {
        $this->security();

        $data = array();

        $data['contact'] = $this->md->my_select('tbl_contact_us', '*');
        $this->load->view('admin/manage_contact_us', $data);
    }

    public function manage_bann() {
        $this->security();

        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Please Enter Title.'));
            $this->form_validation->set_rules('subtitle', '', 'required', array('required' => 'Please Enter Subtitle.'));

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/banner/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = "admin";
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('banner')) {

                    //new photo update
                    $ins['path'] = "assets/banner/" . $this->upload->data('file_name');
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');

                    $result = $this->md->my_insert('tbl_banner', $ins);

                    if ($result == 1) {
                        $data['success'] = "Banner Added Successfully.";
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }

        $data['banner'] = $this->md->my_select('tbl_banner', '*');


        $this->load->view('admin/banner', $data);
    }

    public function manage_emailsub() {
        $this->security();

        $data = array();

        if ($this->input->post('send')) {
            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Please Enter Email Subject.'));
            $this->form_validation->set_rules('msg', '', 'required', array('required' => 'Please Enter Email Message.'));

            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('email')) {
                    $title = $this->input->post('title');
                    $msg = $this->input->post('msg');

                    $email = $this->input->post('email');
                    foreach ($email as $single) {
                        $result = $this->md->my_mailer($single, $title, $msg);
                    }

                    if ($result == 1) {
                        $data['success'] = "Email Send Successfully.";
                    }
                } else {
                    $data['error'] = "Please Select Atleast one Receiver.";
                }
            }
        }

        $data['subscriber'] = $this->md->my_select('tbl_email_subscriber');

        $this->load->view('admin/email_subscriber', $data);
    }

    public function manage_feedback() {
        $this->security();

        $data = array();
        $data['feedback'] = $this->md->my_select('tbl_feedback', '*');
        $this->load->view('admin/feedback', $data);
    }

    public function manage_member() {
        $this->security();
        $data = array();

        $data['member'] = $this->md->my_select('tbl_register');
        $this->load->view('admin/manage_member', $data);
    }

    public function manage_seller() {
        $this->security();
        $data = array();

        $data['seller'] = $this->md->my_select('tbl_seller');

        $this->load->view('admin/manage_seller', $data);
    }

    public function manage_state() {
        $this->security();

        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', 'State Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Please Enter  Valide State Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique validation
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` = '" . $this->input->post('state') . "' AND `label` = 'state'";

                $count = $this->md->my_query($sql) [0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('state');
                    $ins['location_id'] = 0;
                    $ins['label'] = 'state';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = "State Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "State Already Exist.";
                }
            }
        }

        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));

        $this->load->view('admin/manage_state', $data);
    }

    public function manage_city() {
        $this->security();

        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', 'State Name', 'required', array('required' => 'Please Select State Name.'));
            $this->form_validation->set_rules('city', 'City Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter City Name.', 'regex_match' => 'Please Enter  Valide City Name.'));

            if ($this->form_validation->run() == TRUE) {
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` = '" . $this->input->post('city') . "' AND `parent_id` = '" . $this->input->post('state') . "'")[0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('city');
                    $ins['parent_id'] = $this->input->post('state');
                    $ins['label'] = 'city';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = "City Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "City Already Exist.";
                }
            }
        }




        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));

        $data['city'] = $this->md->my_query("SELECT s.`name` AS state , c.* FROM `tbl_location` AS s , `tbl_location` AS c WHERE s. `location_id` = c. `parent_id` AND c.`label` = 'city'");

        $this->load->view('admin/manage_city', $data);
    }

    public function manage_main() {
        $this->security();

        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('maincategory', 'Main Category Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Main Category Name.', 'regex_match' => 'Please Enter  Valide Main Category Name.'));

            if ($this->form_validation->run() == TRUE) {
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '" . $this->input->post('maincategory') . "' AND `label` = 'maincategory'";

                $count = $this->md->my_query($sql) [0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('maincategory');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'maincategory';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = "Main Category Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Main Category Already Exist.";
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));

        $this->load->view('admin/main_category', $data);
    }

    public function manage_sub() {
        $this->security();

        $data = array();

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Please Select Maincategory Name.'));
            $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Please Enter Subcategory Name.', 'regex_match' => 'Please Enter  Valide Subcategory Name.'));

            if ($this->form_validation->run() == TRUE) {

                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '" . $this->input->post('subcategory') . "' AND `parent_id` = '" . $this->input->post('maincategory') . "'")[0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('subcategory');
                    $ins['parent_id'] = $this->input->post('maincategory');
                    $ins['label'] = 'subcategory';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = "Subcategory Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Subcategory Already Exist.";
                }
            }
        }


        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));

        $data['subcategory'] = $this->md->my_query("SELECT m.`name` AS maincategory , s.* FROM `tbl_category` AS m , `tbl_category` AS s WHERE m. `category_id` = s. `parent_id` AND s.`label` = 'subcategory'");

        $this->load->view('admin/sub_category', $data);
    }

    public function manage_peta() {
        $this->security();

        $data = array();
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Please Select Maincategory Name.'));
            $this->form_validation->set_rules('subcategory', '', 'required', array('required' => 'Please Select Subcategory Name.'));
            $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Petacategory Name.', 'regex_match' => 'Please Enter  Valide Petacategory Name.'));

            if ($this->form_validation->run() == TRUE) {


                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '" . $this->input->post('petacategory') . "' AND `parent_id` = '" . $this->input->post('subcategory') . "'")[0]->cc;

                if ($count == 0) {
                    $ins['name'] = $this->input->post('petacategory');
                    $ins['parent_id'] = $this->input->post('subcategory');
                    $ins['label'] = 'petacategory';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = "Petacategory Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Petacategory Already Exist.";
                }
            }
        }



        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['petacategory'] = $this->md->my_query("SELECT m.`name` AS maincategory , s.`name` AS subcategory , p.* FROM `tbl_category` AS m , `tbl_category` AS s , `tbl_category` AS p WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id`");

        $this->load->view('admin/peta_category', $data);
    }

    public function manage_pdetail() {
        $this->security();

        $data['product'] = $this->md->my_select('tbl_product');

        $this->load->view('admin/product_detail', $data);
    }

    public function manage_preview() {
        $this->security();

        $data['review'] = $this->md->my_select('tbl_review');

        $this->load->view('admin/product_review', $data);
    }

    public function manage_offer() {
        $this->security();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please Enter Offer Name.'));
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Please Enter Offer Rate.', 'numeric' => 'Please Enter Valid Offer Rate.'));
            $this->form_validation->set_rules('min_price', '', 'required|numeric', array('required' => 'Please Enter Minimum Price.', 'numeric' => 'Please Enter Valid Minimum Price.'));
            $this->form_validation->set_rules('max_price', '', 'required|numeric', array('required' => 'Please Enter Maximum Price.', 'numeric' => 'Please Enter Valid Maximum Price.'));
            $this->form_validation->set_rules('start_date', '', 'required', array('required' => 'Please Enter Offer Start Date.'));
            $this->form_validation->set_rules('end_date', '', 'required', array('required' => 'Please Enter Offer End Date.'));

            if ($this->form_validation->run() == TRUE) {
                $ins['name'] = $this->input->post('name');
                $ins['rate'] = $this->input->post('rate');
                $ins['min_price'] = $this->input->post('min_price');
                $ins['max_price'] = $this->input->post('max_price');
                $ins['start_date'] = $this->input->post('start_date');
                $ins['end_date'] = $this->input->post('end_date');
                $ins['status'] = 0;

                if ($this->input->post('main') == "" && $this->input->post('sub') == "" && $this->input->post('peta') == "") {
                    $ins['category_id'] = 0;
                    $ins['label'] = "All";
                } elseif ($this->input->post('main') != "" && $this->input->post('sub') == "" && $this->input->post('peta') == "") {
                    $ins['category_id'] = $this->input->post('main');
                    $ins['label'] = "main";
                } else if ($this->input->post('main') != "" && $this->input->post('sub') != "" && $this->input->post('peta') == "") {
                    $ins['category_id'] = $this->input->post('sub');
                    $ins['label'] = "sub";
                } else if ($this->input->post('main') != "" && $this->input->post('sub') != "" && $this->input->post('peta') != "") {
                    $ins['category_id'] = $this->input->post('peta');
                    $ins['label'] = "peta";
                }

                $result = $this->md->my_insert('tbl_offer', $ins);

                if ($result == 1) {
                    $data['success'] = "Offer Added Successfully.";
                } else {
                    $data['error'] = "Somthing Went Wrong.Try Letter.";
                }
            }
        }
        $data['main'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['offer'] = $this->md->my_select('tbl_offer');
        $this->load->view('admin/offer', $data);
    }

    public function manage_promocode() {
        $this->security();

        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('promocode', '', 'required|alpha_numeric', array('required' => 'Please Enter Promocode Name.', 'alpha_numeric' => 'Please Enter Valide Promocode Name.'));
            $this->form_validation->set_rules('amount', '', 'required|numeric', array('required' => 'Please Enter Amount.', 'numeric' => 'Please Enter Valide Amount.'));
            $this->form_validation->set_rules('mbp', '', 'required|numeric', array('required' => 'Please Enter Minimum Bill Price.', 'numeric' => 'Please Enter Valide Minimum Bill Price.'));


            if ($this->form_validation->run() == TRUE) {
                $sql = "SELECT COUNT(*) AS cc FROM `tbl_promocode` WHERE `code` = '" . $this->input->post('promocode') . "' ";

                $count = $this->md->my_query($sql) [0]->cc;

                if ($count == 0) {
                    $ins['code'] = $this->input->post('promocode');
                    $ins['amount'] = $this->input->post('amount');
                    $ins['min_bill_price'] = $this->input->post('mbp');

                    $result = $this->md->my_insert('tbl_promocode', $ins);
                    if ($result == 1) {
                        $data['success'] = "Promocode Added Successfully.";
                    } else {
                        $data['error'] = "Something Went Wrong.";
                    }
                } else {
                    $data['error'] = "Promocode Already Exist.";
                }
            }
        }

        $data['promocode'] = $this->md->my_select('tbl_promocode', '*');


        $this->load->view('admin/promocode', $data);
    }

    public function manage_profit() {
        $this->security();

        if ($this->input->post('update')) {
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Please Enter Profit Rate.', 'numeric' => 'Please Enter Valid Profit Rate.'));

            if ($this->form_validation->run() == TRUE) {
                $ins['rate'] = $this->input->post('rate');
                $wh['commssion_id'] = 1;

                $result = $this->md->my_update('tbl_commission', $ins, $wh);
                if ($result == 1) {
                    $success = 1;
                }
            }
        }

        $data['rate'] = $this->md->my_select('tbl_commission');
        $this->load->view('admin/profit_rate', $data);
    }

    public function manage_setting() {
        $this->security();

        $data = array();

        if ($this->input->post('btn_ps')) {
            $cps = $this->input->post('cps');
            $wh['admin_id'] = $this->session->userdata('admin');
            $ps = $this->encryption->decrypt($this->md->my_select('tbl_admin_login', '*', $wh)[0]->password);

            // current password
            if ($cps == $ps) {
                // new password and confirm new password
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Please Enter Minimum 8 Charcter.', 'max_length' => 'Please Enter Maximummum 16 Charcter.'));
                $this->form_validation->set_rules('cnps', '', 'required|matches[nps]', array('required' => 'Please Enter Confirm New Password.', 'matches' => 'Password Doesnot Match'));

                if ($this->form_validation->run() == TRUE) {

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        // delete cookie
                        if ($this->input->cookie('admin_email')) {
                            set_cookie('admin_email', '', -10);
                            set_cookie('admin_password', '', -10);
                        }

                        redirect('admin-logout');
                    }
                }
            } else {
                $data['error'] = "Current Password Does Not Match";
            }
        }

        if ($this->input->post('btn_profile')) {
            $config['upload_path'] = './admin_assets/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = "admin";
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                //old photo remove
                $path = $this->md->my_select('tbl_admin_login', 'profile_pic', array('admin_id' => $this->session->userdata('admin')))[0]->profile_pic;
                unlink("./" . $path);

                //new photo update
                $ins['profile_pic'] = "admin_assets/img/" . $this->upload->data('file_name');
                $wh['admin_id'] = $this->session->userdata('admin');
                $result = $this->md->my_update('tbl_admin_login', $ins, $wh);


                if ($result == 1) {
                    $data['success'] = "Profile Change Successfully.";
                }
            } else {
                $data['photo_err'] = $this->upload->display_errors();
            }
        }

        $this->load->view('admin/setting', $data);
    }

    public function view_bill() {
        $this->security();

        $this->load->view('admin/view_bill');
    }

    public function delete() {
        $this->security();

        $table = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        if ($table == "state") {
            $wh['location_id'] = $id;
            $this->md->my_delete('tbl_location', $wh);
            redirect('manage-state');
        } else if ($table == "maincategory") {
            $wh['category_id'] = $id;
            $this->md->my_delete('tbl_category', $wh);
            redirect('manage-main-category');
        } else if ($table == "contact") {
            $wh['contact_id'] = $id;
            $this->md->my_delete('tbl_contact_us', $wh);
            redirect('manage-contact-us');
        } else if ($table == "feedback") {
            $wh['feedback_id'] = $id;
            $this->md->my_delete('tbl_feedback', $wh);
            redirect('manage-feedback');
        } else if ($table == "promocode") {
            $wh['promocode_id'] = $id;
            $this->md->my_delete('tbl_promocode', $wh);
            redirect('manage-promocode');
        } else if ($table == "subcategory") {
            $wh['category_id'] = $id;
            $this->md->my_delete('tbl_category', $wh);
            redirect('manage-sub-category');
        } else if ($table == "petacategory") {
            $wh['category_id'] = $id;
            $this->md->my_delete('tbl_category', $wh);
            redirect('manage-peta-category');
        } else if ($table == "city") {
            $wh['location_id'] = $id;
            $this->md->my_delete('tbl_location', $wh);
            redirect('manage-city');
        } else if ($table == "banner") {
            $wh['banner_id'] = $id;
            $path = $this->md->my_select('tbl_banner', 'path', $wh)[0]->path;
            unlink("./" . $path);

            $this->md->my_delete('tbl_banner', $wh);
            redirect('manage-banner');
        } else if ($table == "subscriber") {
            $wh['subscriber_id'] = $id;
            $this->md->my_delete('tbl_email_subscriber', $wh);
            redirect('manage-email-subscriber');
        } else if ($table == "seller") {
            $wh['seller_id'] = $id;
            $this->md->my_delete('tbl_seller', $wh);
            redirect('manage-seller');
        } else if ($table == "member") {
            $wh['register_id'] = $id;
            $this->md->my_delete('tbl_register', $wh);
            redirect('manage-member');
        } else if ($table == "wishlist") {
            $wh['wish_id'] = $id;
            $this->md->my_delete('tbl_wishlist', $wh);
            redirect('member-wishlist');
        } elseif ($table == "address") {
            $wh['shipment_id'] = $id;
            $this->md->my_delete('tbl_shipment', $wh);
            redirect('member-address');
        } elseif ($table == "review") {
            $wh['review_id'] = $id;
            $this->md->my_delete('tbl_review', $wh);
            redirect('manage-product-review');
        } elseif ($table == "memberreview") {
            $wh['review_id'] = $id;
            $this->md->my_delete('tbl_review', $wh);
            redirect('member-review');
        }
    }

}
