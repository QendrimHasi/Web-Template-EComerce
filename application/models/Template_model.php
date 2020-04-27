<?php 
	class Template_model extends CI_Model
	{
		public function __construct()
	    {
	        $this->load->database();
	    }

	    public function addTemplate($image,$dokument){
	    	$data=array(
	        	'title' =>$this->input->post('title'),
	        	'description' =>$this->input->post('description'),
	        	'price' =>$this->input->post('price'),
	        	'img' =>$image,
	        	'file' =>$dokument,
	        );
	        return $this->db->insert('templates',$data);
	    }

	    public function get_templates(){ 
	    	$query =$this->db->get_where('templates',array('paid'=>0));
	    	return $query->result_array();
	    }

	   	public function getSingleTemplate($id){ 
	    	$query =$this->db->get_where('templates',array('templeId'=>$id));
	    	return $query->row_array();
	    }

	    public function pay(){
	    	$tempalte=$this->input->post('tempalte[]');
	    	$this->db->set('paid', 1); 
			$this->db->where('templeid',$tempalte[0]); 
			$this->db->update('templates');
	    }
	}

 ?>