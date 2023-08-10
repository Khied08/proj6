<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library(['form_validation']);
        $this->load->model('Users_model');
	}

	public function index()
	{
		if(isset($_SESSION['user'])){
            redirect(base_url('index.php/dashboard'));
        }

		if (isset($_POST['login_btn'])) {
			$email= $this->input->post('user_email');
			$pw= $this->input->post('user_password');

			$user_data=$this->Users_model->authenticate($email,$pw);

			if($user_data!==0){

                $user_info = [
                    'user_id'=>$user_data[0]->id,
                    'fullname'=>$user_data[0]->fullname,
                ];

                $this->session->set_userdata('user',$user_info);
                redirect('dashboard');

			}else {
				$this->session->set_flashdata('msg_login','Account not found. Please try again.');
				// code...
			}
		}
$this->load->view('backend/page/login');
    }

    
    public function action()
{
    // Process the form data
    $name = $this->input->post('name');
    $email = $this->input->post('email');

    // Perform necessary actions with the form data

    // Redirect or display a success message
}
		
public function register()
{
    $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('repeatpass', 'Confirm Password', 'trim|required|matches[password]');
    $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('backend/page/register');
    }else {
        $admin_data = [
            'firstname' => $this->input->post('firstname', TRUE),
            'lastname' => $this->input->post('lastname', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => $this->input->post('password', TRUE),
            'repeatpass' => $this->input->post('repeatpass', TRUE),
        ];

    
        $insert = $this->db->insert('admin', $admin_data);

        if ($insert) {
           /* echo $jsCode;*/
            $this->load->view('backend/page/login');
        }
    }
}
	
	public function dashboard()

	{ 
        if(!isset($_SESSION['user'])){

            $this->session->set_flashdata('msg_login','Please Login');
            redirect(base_url('index.php/admin'));
        }
    
		
		$this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/dashboard');
		$this->load->view('backend/include/footer');
	}

	public function logout(){
		$this->session->unset_userdata('user');
        redirect(base_url('index.php/admin'));
	}


    public function addofficials(){
         
        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('start_term','start term','trim|required');
        $this->form_validation->set_rules('end_term','end term','trim|required');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){

            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/addofficials');
            $this->load->view('backend/include/footer');

        }else{

            $officials_data = [
                'position'=>$this->input->post('position',TRUE),
                'name'=>$this->input->post('name',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'address'=>$this->input->post('address',TRUE),
                'start_term'=>$this->input->post('start_term',TRUE),
                'end_term'=>$this->input->post('end_term',TRUE),
                
            ];


            $insert = $this->db->insert('addofficials', $officials_data);

            $insert_id = $this->db->insert_id();

            if( is_int($insert_id) ){
                redirect(base_url('index.php/dashboard/view-officials'));
            }


        }
    }

    public function viewofficials(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $officials_list = $this->db->get('addofficials')->result();

        $data = ['officials_list'=>$officials_list];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/viewofficials',$data);
        $this->load->view('backend/include/footer');
    }

    public function updateofficials($id) {
        if (!isset($_SESSION['user'])) {
            $this->session
            >set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
    
        $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('start_term','start term','trim|required');
        $this->form_validation->set_rules('end_term','end term','trim|required');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');
    
        if ($this->form_validation->run() == FALSE) {
            // Load the resident data based on the resident_id
            $officials_data = $this->db->get_where('addofficials', array('id' => $id))->row();
    
            $data = [
                'officials_data' => $officials_data
            ];
            
    
            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/updateofficials', $data);
            $this->load->view('backend/include/footer');
        } else {
            // Update the resident data
            $officials_data = [
                'position'=>$this->input->post('position',TRUE),
                'name'=>$this->input->post('name',TRUE),

                'contact'=>$this->input->post('contact',TRUE),
                'address'=>$this->input->post('address',TRUE),
                'start_term'=>$this->input->post('start_term',TRUE),
                'end_term'=>$this->input->post('end_term',TRUE),
        
            ];
            $this->db->where('id', $id);
            $update = $this->db->update('addofficials', $officials_data);
    
            if ($update) {
                redirect(base_url('index.php/dashboard/view-officials'));
            }
        }

    }

    public function deleteofficials($id){
        $this->db->db_debug = TRUE;
        $this->db->where('id', $id);
        $this->db->delete('addofficials');
        redirect(base_url('index.php/dashboard/view-officials'));
    }




	public function add_resident(){
        
        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }

        $this->form_validation->set_rules('image','Image','validate_image_upload');
        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('extension','Name Extension','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('height','Height','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('weight','Weight','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('bloodType','Blood Type','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('birthplace','Birthplace','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('nationality','Nationality','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('purok','Purok','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('barangay','Barangay','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('province','Province','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('civil','Civil Status','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('educational','Educational Attainment','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('occupation','Occupation','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('monthlyIncome','Monthly Income','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('householdmember','Total Household Member','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('landown','Land Ownership Status','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('houseownership','House Ownership','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){

            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/add_resident');
            $this->load->view('backend/include/footer');

        }else{

            $config['upload_path'] = './uploads/'; // Specify the path where the image will be uploaded
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Allowed image file types
            $config['max_size'] = 2048; // Maximum file size in kilobytes (2MB)

            $this->load->library('upload', $config);

            
            if($_FILES['image']['name']==''){

                $this->session->set_flashdata('error','Please select an image');
    
                //  redirect(base_url('demo'));	
            }

            if(!$this->upload->do_upload('image')){
        
                $this->session->set_flashdata('error',$this->upload->display_errors());
     
                   //redirect(base_url('demo'));
             }
             else{

                $this->session->set_flashdata('success','Image successfully uploaded');

                $image_data = $this->upload->data();
               // $image_path = 'uploads/'. $image_data['file_name'];
              $image_path ='./uploads/'. $image_data['file_name'];


            $resident_data = [
                'image' => $image_path,
                'first_name'=>$this->input->post('firstname',TRUE),
                'middlename'=>$this->input->post('middlename',TRUE),
                'last_name'=>$this->input->post('lastname',TRUE),
                'extension'=>$this->input->post('extension',TRUE),
                'sex'=>$this->input->post('sex',TRUE),
                'height'=>$this->input->post('height',TRUE),
                'weight'=>$this->input->post('weight',TRUE),
                'bloodType'=>$this->input->post('bloodType',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'birthplace'=>$this->input->post('birthplace',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'barangay'=>$this->input->post('barangay',TRUE),
                'municipality'=>$this->input->post('municipality',TRUE),
                'province'=>$this->input->post('province',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'email'=>$this->input->post('email',TRUE),
                'civil'=>$this->input->post('civil',TRUE),
                'religion'=>$this->input->post('religion',TRUE),
                'educational'=>$this->input->post('educational',TRUE),
                'occupation'=>$this->input->post('occupation',TRUE),
                'monthlyIncome'=>$this->input->post('monthlyIncome',TRUE),
                'householdmember'=>$this->input->post('householdmember',TRUE),
                'landown'=>$this->input->post('landown',TRUE),
                'houseownership'=>$this->input->post('houseownership',TRUE),
            ];

            $insert = $this->db->insert('resident',$resident_data);

            $insert_id = $this->db->insert_id();

            if( is_int($insert_id) ){

                
             
                $insert_id_another_table = $this->db->insert_id();

                // Handle image upload
                ;

                if (is_int($insert_id_another_table)) {
                    // Both insertions were successful
              
                redirect(base_url('index.php/dashboard/view-residents'));
            }

            redirect(base_url('index.php/dashboard/view-residents'));

        }
        
    }
}
    }
public function validate_image_upload()
{
    if (!empty($_FILES['image']['name'])) {
        return true;
    } else {
        $this->form_validation->set_message('validate_image_upload', 'Please select an image to upload.');
        return false;
    }
}

    public function view_resident(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $resident_list = $this->db->get('resident')->result();

        $data = ['resident_list'=>$resident_list];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/view_resident',$data);
        $this->load->view('backend/include/footer');
    }

    
 
	  
	public function delete_resident($id)
	{
        $this->db->db_debug = TRUE;
		$this->db->where('resident_id', $id);
		$this->db->delete('resident');
		redirect('dashboard/view-residents');

	}

    public function search()
    {
        $search_query = $this->input->get('search_query');
        // Perform search query using the provided input
        
        // Pass the search results to your view
        $data['search_results'] = $search_results;
        $this->load->view('index.php/dashboard/view-residents', $data);
    }
        

	public function edit_resident($resident_id)
	{
        if (!isset($_SESSION['user'])) {
            $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
        
        $this->form_validation->set_rules('image','Image','validate_image_upload');
        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('extension','Name Extension','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('height','Height','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('weight','Weight','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('bloodType','Blood Type','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('birthplace','Birthplace','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('nationality','Nationality','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('purok','Purok','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('barangay','Barangay','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('province','Province','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('civil','Civil Status','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('educational','Educational Attainment','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('occupation','Occupation','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('monthlyIncome','Monthly Income','trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('householdmember','Total Household Member','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('landown','Land Ownership Status','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('houseownership','House Ownership','trim|min_length[1]|max_length[50]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');
        
        if ($this->form_validation->run() == FALSE) {
            // Load the resident data based on the resident_id
            $resident_data = $this->db->get_where('resident', array('resident_id' => $resident_id))->row();
    // Get the options for the sex dropdown
    $sex_options = array(
        'Male' => 'Male',
        'Female' => 'Female',
        // Add more options if needed
         );

         $purok_options = array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            // Add more options if needed
             );
        
        $data = [
            'resident_data' => $resident_data,
            'sex_options' => $sex_options,
            'purok_options' => $purok_options
        ];
            
    
            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/updateresident', $data);
            $this->load->view('backend/include/footer');
        } else {
             
            if($_FILES['image']['name']!=''){

                $config['upload_path'] = './uploads/'; // Specify the path where the image will be uploaded
                $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Allowed image file types
                $config['max_size'] = 2048; // Maximum file size in kilobytes (2MB)
    
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    // Redirect or show an error message as needed.
                    // redirect(base_url('demo'));
                    return;
                } else {
                    $this->session->set_flashdata('success', 'Image successfully uploaded');
                    $image_data = $this->upload->data();
                    $image_path = './uploads/' . $image_data['file_name'];
                    $resident_data['image'] = $image_path; // Update the 'image' field only when a new image is uploaded.
                }
            }
            $resident_data ['first_name']=$this->input->post('firstname',TRUE);
            $resident_data ['middlename'] =$this->input->post('middlename',TRUE);
            $resident_data ['last_name'] =$this->input->post('lastname',TRUE);
            $resident_data ['extension'] =$this->input->post('extension',TRUE);
            $resident_data ['sex']  =$this->input->post('sex',TRUE);
            $resident_data ['height'] =$this->input->post('height',TRUE);
            $resident_data ['weight']=$this->input->post('weight',TRUE);
            $resident_data ['bloodType']=$this->input->post('bloodType',TRUE);
            $resident_data ['birth_date']=$this->input->post('birth_date',TRUE);
            $resident_data ['birthplace']=$this->input->post('birthplace',TRUE);
            $resident_data ['nationality']=$this->input->post('nationality',TRUE);
            $resident_data ['purok']=$this->input->post('purok',TRUE);
            $resident_data  ['barangay']=$this->input->post('barangay',TRUE);
            $resident_data  [ 'municipality']=$this->input->post('municipality',TRUE);
            $resident_data  ['province'] =$this->input->post('province',TRUE);
            $resident_data [ 'contact']=$this->input->post('contact',TRUE);
            $resident_data  [ 'email']=$this->input->post('email',TRUE);
            $resident_data  ['civil']=$this->input->post('civil',TRUE);
            $resident_data ['religion']=$this->input->post('religion',TRUE);
            $resident_data['educational'] =$this->input->post('educational',TRUE);
            $resident_data  ['occupation']=$this->input->post('occupation',TRUE);
            $resident_data ['monthlyIncome'] =$this->input->post('monthlyIncome',TRUE);
            $resident_data  ['householdmember']=$this->input->post('householdmember',TRUE);
            $resident_data ['landown'] =$this->input->post('landown',TRUE);
            $resident_data ['houseownership']=$this->input->post('houseownership',TRUE);
        
            $this->db->where('resident_id', $resident_id);
            $update = $this->db->update('resident', $resident_data);
    
            if ($update) {
                redirect(base_url('index.php/dashboard/view-residents'));
            } else {
                echo("Error");
            }
        }

    }
        
    
        /***$resident_data = $this->db->get_where('resident', array('resident_id' => $resident_id))->row();
        $data = [
            'resident_data' => $resident_data
        ];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/updateresident', $data);
        $this->load->view('backend/include/footer');
    }
}***/

public function call_validate_image_upload()
{
    if (!empty($_FILES['image']['name'])) {
        return true;
    } else {
        $this->form_validation->set_message('validate_image_upload', 'Please select an image to upload.');
        return false;
    }
}

public function blotter_info(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $blotter_list = $this->db->get('blotter')->result();

    $data = ['blotter_list'=>$blotter_list];

    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/page/blotter_info',$data);
    $this->load->view('backend/include/footer');
}
public function addblotter(){
    
    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $this->form_validation->set_rules('complainant','Name of Complainant','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('age1','Age','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('number','Contact Number','trim|required');
    $this->form_validation->set_rules('complainee','Name of Complainee','trim|required');
    $this->form_validation->set_rules('age2','Age','trim|required');
    $this->form_validation->set_rules('add_complainee','Address','trim|required');
    $this->form_validation->set_rules('num_complainee','Contact Number','trim|required');
    $this->form_validation->set_rules('complaint','Complaint','trim|required');
    $this->form_validation->set_rules('action','Action','trim|required');
    $this->form_validation->set_rules('status','Status','trim|required');
    $this->form_validation->set_rules('incidence','Incidence','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');


    if($this->form_validation->run()==FALSE){

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/addblotter');
        $this->load->view('backend/include/footer');

    }else{

        $blotter_data = [
            'complainant'=>$this->input->post('complainant',TRUE),
            'age1'=>$this->input->post('age1',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'number'=>$this->input->post('number',TRUE),
            'complainee'=>$this->input->post('complainee',TRUE),
            'age2'=>$this->input->post('age2',TRUE),
            'add_complainee'=>$this->input->post('add_complainee',TRUE),
            'num_complainee'=>$this->input->post('num_complainee',TRUE),
            'complaint'=>$this->input->post('complaint',TRUE),
            'action'=>$this->input->post('action',TRUE),
            'status'=>$this->input->post('status',TRUE),
            'incidence'=>$this->input->post('incidence',TRUE),
            
        ];


        $insert = $this->db->insert('blotter', $blotter_data);

        $insert_id = $this->db->insert_id();

        if( is_int($insert_id) ){
            redirect(base_url('index.php/dashboard/view-blotter'));
        }


    }
    


}

public function updateblotter($blotter_id)
	{
        if (!isset($_SESSION['user'])) {
            $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
        $this->form_validation->set_rules('complainant','Name of Complainant','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('age1','Age','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('number','Contact Number','trim|required');
    $this->form_validation->set_rules('complainee','Name of Complainee','trim|required');
    $this->form_validation->set_rules('age2','Age','trim|required');
    $this->form_validation->set_rules('add_complainee','Address','trim|required');
    $this->form_validation->set_rules('num_complainee','Contact Number','trim|required');
    $this->form_validation->set_rules('complaint','Complaint','trim|required');
    $this->form_validation->set_rules('action','Action','trim|required');
    $this->form_validation->set_rules('status','Status','trim|required');
    $this->form_validation->set_rules('incidence','Incidence','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');
      
      
        if ($this->form_validation->run() == FALSE) {
            // Load the resident data based on the resident_id
            $blotter_data = $this->db->get_where('blotter', array('blotter_id' => $blotter_id))->row();
    
            $data = [
                'blotter_data' => $blotter_data
            ];
            
    
            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/edit_blotter', $data);
            $this->load->view('backend/include/footer');
        } else {
            
            $blotter_data = [
                'complainant'=>$this->input->post('complainant',TRUE),
                'age1'=>$this->input->post('age1',TRUE),
                'address'=>$this->input->post('address',TRUE),
                'number'=>$this->input->post('number',TRUE),
                'complainee'=>$this->input->post('complainee',TRUE),
                'age2'=>$this->input->post('age2',TRUE),
                'add_complainee'=>$this->input->post('add_complainee',TRUE),
                'num_complainee'=>$this->input->post('num_complainee',TRUE),
                'complaint'=>$this->input->post('complaint',TRUE),
                'action'=>$this->input->post('action',TRUE),
                'status'=>$this->input->post('status',TRUE),
                'incidence'=>$this->input->post('incidence',TRUE),
                
            ];
    

            $this->db->where('blotter_id', $blotter_id);
            $update = $this->db->update('blotter', $blotter_data);
    
            if ($update) {
                redirect(base_url('index.php/dashboard/view-blotter'));

        }

    }
}
public function delete_blotter($id){
    $this->db->db_debug = TRUE;
    $this->db->where('blotter_id', $id);
    $this->db->delete('blotter');
    redirect(base_url('index.php/dashboard/view-blotter'));
}


 /* AJAX  */
 public function ajax_update_official_form(){

    $official_id = $this->input->post('official_id',true);

    $officials_data  =  $this->db->where('id',$official_id)->get('addofficials')->row();
    
    $data = ['officials_data'=>$officials_data];

    $this->load->view('backend/page/popup/edit-official',$data);
}

/* AJAX  */
public function ajax_update_blotter_form(){

    $blotter_id = $this->input->post('blotter_id',true);

    $blotter_data  =  $this->db->where('blotter_id',$blotter_id)->get('blotter')->row();
    
    $data = ['blotter_data'=>$blotter_data];

    $this->load->view('backend/page/popup/edit-blotter',$data);
}



    /* AJAX  */
    public function ajax_update_resident_form(){

        $resident_id = $this->input->post('resident_id',true);

        $resident_data  =  $this->db->where('resident_id',$resident_id)->get('resident')->row();
        
        $data = ['resident_data'=>$resident_data];

        $this->load->view('backend/page/popup/edit-resident',$data);
    }
    

}





   