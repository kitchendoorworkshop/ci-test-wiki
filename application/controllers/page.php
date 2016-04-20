<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load up access page info
		$this->load->model('page_model');
	}

	// function to view all pages
	public function index() {
		$data['pages'] = $this->page_model->get_all_pages();

		$data['head_title'] = 'All Pages';
		$data['page_title'] = 'All Pages';

		// output page
    	$this->load->view('header', $data);
    	$this->load->view('pages', $data);
		$this->load->view('footer', $data);
	}

  // function to view a given static page eg. about pages
	public function view($slug = 'home')
	{

	    //set data variables

		// fetch the page data
		$data['page'] = $this->page_model->get_page($slug);

		if (!$data['page']) {
			if ($slug == 'home') {
				$data['page']['title'] = 'No home page defined';
				$data['page']['content'] = '<p>Please <a href="page/add/home">create a home page</a>!</p>';
				$data['show_edit_links'] = FALSE;
			} else {
				show_404();
			}
		} else {
			$data['show_edit_links'];
		}

	    if ($slug == 'home') {
	      $data['head_title'] = NULL;
	    } else {
	      $data['head_title'] = ucfirst($data['page']['title']);
	    }
		$data['page_title'] = $data['page']['title'];

	    // output page
	    $this->load->view('header', $data);
	    $this->load->view('page', $data);
		$this->load->view('footer', $data);
	}

	public function add($slug = NULL) {

		$data['slug'] = $slug;

		// load codeigntiter form helpers
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['head_title'] = 'Add Page';
		$data['page_title'] = 'Add a new page';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			// output page
	    	$this->load->view('header', $data);
	    	$this->load->view('forms/page_create', $data);
			$this->load->view('footer', $data);

		}
		else
		{
			$page_data = $this->page_model->add_page();
			redirect($page_data['slug'], 'location');
		}
	}

	public function edit($slug) {

		$data['page'] = $this->page_model->get_page($slug);

		if (!$data['page']) {
			show_404();
		}

		// load codeigntiter form helpers
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['head_title'] = 'Edit '.ucfirst($data['page']['title']);
		$data['page_title'] = 'Editing '.$data['page']['title'];

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			// output page
	    	$this->load->view('header', $data);
	    	$this->load->view('forms/page_edit', $data);
			$this->load->view('footer', $data);
		}
		else
		{
			if ($slug != $this->input->post('slug')) {
				$page_data = $this->page_model->update_page($data['page']['id'], TRUE);
			} else {
				$page_data = $this->page_model->update_page($data['page']['id']);
			}
			redirect($page_data['slug'], 'location');
		}

	}

	public function delete($slug) {

		$data['page'] = $this->page_model->get_page($slug);

		if (!$data['page']) {
			show_404();
		}

		// load codeigntiter form helpers
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['head_title'] = 'Delete '.ucfirst($data['page']['title']);
		$data['page_title'] = 'Deleting '.$data['page']['title'];

		if (!isset($_POST['delete']))
		{
			// output page
			$this->load->view('header', $data);
	    	$this->load->view('forms/page_delete', $data);
			$this->load->view('footer', $data);
		} else {
			$this->page_model->delete_page($data['page']['id']);
			redirect('home', 'location');
		}

	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
