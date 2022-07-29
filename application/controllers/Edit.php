<?php

class Edit extends CI_Controller
{
    public function state()
    {
        $wh ['location_id'] = $this->uri->segment(2);
        
        $data['editstate'] = $this->md->my_select('tbl_location','*',$wh);
        
        if ( $this->input->post('edit'))
        {
            $this->form_validation->set_rules('state', 'State Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required'=>'Please Enter State Name.','regex_match'=>'Please Enter  Valide State Name.')); 
			
            if ($this->form_validation->run() == TRUE)
            {
                //unique validation
                $old = $data['editstate'][0]->name;
                $new = $this->input->post('state');
                
                    $sql = "SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` != '".$old."' AND `name` = '".$new."' AND `label` = 'state'";
                    $count = $this->md->my_query($sql) [0]->cc;
                    
                     if($count == 0)
                     {
                         $ins['name'] = $this->input->post('state');
                         

                         $result = $this->md->my_update('tbl_location',$ins,$wh);
                          if($result == 1)
                            {
                              redirect('manage-state');
                            }
                            else
                            {
                                $data['error'] = "Something Went Wrong.";
                            }

                     }
                     else
                     {
                         $data['error'] = "State Already Exist.";
                     }
            }
        }
        
         $data['state'] = $this->md->my_select('tbl_location','*',array('label'=>'state'));
       
        $this->load->view('admin/manage_state',$data);
    }
    
    public function city()
    {
        $wh['location_id'] = $this->uri->segment(2);
        $data['editcity'] = $this->md->my_select('tbl_location','*',$wh);
        
        if($this->input->post('update'))
       {
         $this->form_validation->set_rules('state', 'State Name', 'required', array('required'=>'Please Select State Name.'));
         $this->form_validation->set_rules('city', 'City Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required'=>'Please Enter City Name.','regex_match'=>'Please Enter  Valide City Name.')); 
			
            if ($this->form_validation->run() == TRUE)  
            {
               $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_location` WHERE `name` = '".$this->input->post('city')."' AND `parent_id` = '".$this->input->post('state')."'")[0]->cc;

             if($count == 0)
                     {
                         $ins['name'] = $this->input->post('city');
                         $ins['parent_id'] = $this->input->post('state');
                         

                         $result = $this->md->my_update('tbl_location',$ins,$wh);
                          if($result == 1)
                            {
                              redirect('manage-city');
                            }
                            else
                            {
                                $data['error'] = "Something Went Wrong.";
                            }

                     } 
            else {
                   $data['error'] = "City Already Exist.";
                 }
            }
       }
        
        
        $data['state'] = $this->md->my_select('tbl_location','*',array('label'=>'state')); 
      
       $data['city'] = $this->md->my_query("SELECT s.`name` AS state , c.* FROM `tbl_location` AS s , `tbl_location` AS c WHERE s. `location_id` = c. `parent_id` AND c.`label` = 'city'");
       
        
        $this->load->view('admin/manage_city',$data);
              
    }

    

    public function maincategory()
    {
        $wh ['category_id'] = $this->uri->segment(2);
        
        $data['editmaincategory'] = $this->md->my_select('tbl_category','*',$wh);
        
        if ( $this->input->post('edit'))
        {
            $this->form_validation->set_rules('maincategory', 'Maincategory Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required'=>'Please Enter Maincategory Name.','regex_match'=>'Please Enter  Valide Maincategory Name.')); 
			
            if ($this->form_validation->run() == TRUE)
            {
                //unique validation
                $old = $data['editmaincategory'][0]->name;
                $new = $this->input->post('maincategory');
                
                    $sql = "SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` != '".$old."' AND `name` = '".$new."' AND `label` = 'maincategory'";
                    $count = $this->md->my_query($sql) [0]->cc;
                    
                     if($count == 0)
                     {
                         $ins['name'] = $this->input->post('maincategory');
                         

                         $result = $this->md->my_update('tbl_category',$ins,$wh);
                          if($result == 1)
                            {
                              redirect('manage-main-category');
                            }
                            else
                            {
                                $data['error'] = "Something Went Wrong.";
                            }

                     }
                     else
                     {
                         $data['error'] = "State Already Exist.";
                     }
            }
        }
        
         $data['maincategory'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
       
        $this->load->view('admin/main_category',$data);
    }
    
    public function subcategory()
    {
        $wh['category_id'] = $this->uri->segment(2);
        $data['editsubcategory'] = $this->md->my_select('tbl_category','*',$wh);
        
        if($this->input->post('update'))
       {
       
         $this->form_validation->set_rules('maincategory', '', 'required', array('required'=>'Please Select Maincategory Name.'));
         $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required'=>'Please Enter Subcategory Name.','regex_match'=>'Please Enter  Valide Subcategory Name.')); 
			
            if ($this->form_validation->run() == TRUE)  
            {
               
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '".$this->input->post('subcategory')."' AND `parent_id` = '".$this->input->post('maincategory')."'")[0]->cc;

             if($count == 0)
                     {
                         $ins['name'] = $this->input->post('subcategory');
                         $ins['parent_id'] = $this->input->post('maincategory');
                         

                         $result = $this->md->my_update('tbl_category',$ins,$wh);
                          if($result == 1)
                            {
                              redirect('manage-sub-category');
                            }
                            else
                            {
                                $data['error'] = "Something Went Wrong.";
                            }
                     } 
            else {
                   $data['error'] = "Subcategory Already Exist.";
                 }  
                
            }
       } 
        
        
        $data['maincategory'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));  
       
       $data['subcategory'] = $this->md->my_query("SELECT m.`name` AS maincategory , s.* FROM `tbl_category` AS m , `tbl_category` AS s WHERE m. `category_id` = s. `parent_id` AND s.`label` = 'subcategory'");
       
        $this->load->view('admin/sub_category',$data);
              
    }
    
    public function petacategory()
    {
        $wh['category_id'] = $this->uri->segment(2);
        if($this->input->post('update'))
       {
       
         $this->form_validation->set_rules('maincategory', '', 'required', array('required'=>'Please Select Maincategory Name.'));
         $this->form_validation->set_rules('subcategory', '', 'required', array('required'=>'Please Select Subcategory Name.'));
         $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required'=>'Please Enter Petacategory Name.','regex_match'=>'Please Enter  Valide Petacategory Name.')); 
			
            if ($this->form_validation->run() == TRUE)  
            {
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_category` WHERE `name` = '".$this->input->post('petacategory')."' AND `parent_id` = '".$this->input->post('subcategory')."'")[0]->cc;

             if($count == 0)
                     {
                         $ins['name'] = $this->input->post('petacategory');
                         $ins['parent_id'] = $this->input->post('subcategory');
                         
                         $result = $this->md->my_update('tbl_category',$ins,$wh);
                          if($result == 1)
                            {
                              redirect('manage-peta-category');
                            }
                            
                     } 
            else {
                   $data['error'] = "Petacategory Already Exist.";
                 }  
                
            }
       }
        
        
        
        $data['editpetacategory'] = $this->md->my_select('tbl_category','*',$wh);
        $data['subcategory'] = $this->md->my_select('tbl_category','*',array('category_id'=>$data['editpetacategory'][0]->parent_id));
        $data['maincategory'] = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
        $data['petacategory'] = $this->md->my_query("SELECT m.`name` AS maincategory , s.`name` AS subcategory , p.* FROM `tbl_category` AS m , `tbl_category` AS s , `tbl_category` AS p WHERE m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id`");
       
        $this->load->view('admin/peta_category',$data);
    }
}

