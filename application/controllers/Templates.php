<?php
use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class Templates extends CI_Controller
{

	public function home(){
		$data['tempaltes']= $this->Template_model->get_templates();
		$this->load->view('templates/header');
		$this->load->view('pages/home',$data);	
	}

	public function payment(){
		$token=$this->input->post('stripeToken');
		$tempalte=$this->input->post('tempalte[]');
		if (isset($token)) {
	    	try{
	    		require_once('vendor/autoload.php');
	    		Stripe::setApiKey('sk_test_7NBbh4jchkilEWARAzhh7X7H001Wkodtfj');
	    		//die("".$_POST['stripeamount']);
	    		$amount="".$tempalte[1]."00";
	    		$charge = Charge::create(
	    			array(
	    				"amount"=>$amount,
	    				"currency"=>"EUR",
	    				"source"=>$token,
	    				"description"=>"Payment"
	    			)
	    		);
	    		$this->Template_model->pay();

	    		$temple = $this->Template_model->getSingleTemplate($tempalte[0]);

	    		$this->load->helper('download');

	    		$file = 'assets/templates/'.$temple['file'];
	    		force_download($file,NULL);
	    		

		    	}catch(\Stripe\Error\Card $e){
		    		$error=$e->getMessage();
		    		echo $error;
		    	}
	    	}
	}

	public function addTemplate(){

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('price','Price','required');

		if ($this->form_validation->run()==FALSE) {         	
				$this->load->view('templates/header');
				$this->load->view('pages/addTemplate');	        	

	        }else{
	        	$config = array(
			        'upload_path'     => "./assets/images",
			        'allowed_types' => "gif|jpg|png|jpeg|pdf",
			        'overwrite' => false,
			        'encrypt_name' => TRUE,
			        'max_size' => "5120000",
			        'max_height' => "5000",
			        'max_width' => "5000"
			        );

	        	$this->load->library('upload');
	        	$this->upload->initialize($config);

	        	if (!$this->upload->do_upload('userfile')) {
	        		$errors=array('error'=>$this->upload->display_errors());
	        		$post_image='noimage.jpg';
	        		$this->session->set_flashdata('image_error','The image was to large');
	        		redirect('Templates/addTemplate');
	        	}else{
	        		$data=array('upload_data'=> $this->upload->data());
	        		$file_info=$this->upload->data();
	        		$post_image=$file_info['file_name'];

			        	$config2 = array(
					        'upload_path'     => "./assets/templates",
					        'allowed_types' => "gif|jpg|png|jpeg|pdf|zip",
					        'overwrite' => false,
					        'encrypt_name' => TRUE,
					        'max_size' => "5120000",
					        'max_height' => "5000",
					        'max_width' => "5000"
					        );

			        	$this->upload->initialize($config2);

				        if (!$this->upload->do_upload('document')) {
			        		$this->session->set_flashdata('document_error','The document was to large');
			        		redirect('Templates/addTemplate');
			        	}else{
			        		$data=array('upload_data'=> $this->upload->data());
			        		$file_info=$this->upload->data();
			        		$post_dokument=$file_info['file_name'];

			        		$this->Template_model->addTemplate($post_image,$post_dokument);
			        		$this->session->set_flashdata('template_insertet','The Template was Added');
			        		redirect('Templates/addTemplate');

			        		}
	        	}

			}


	}

}
?>