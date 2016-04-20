<?php

class Page_model extends CI_Model {

	public function __construct()
	{
    // load db
		$this->load->database();
	}

	// function to get all pages from DB
	public function get_all_pages() {
		$query = $this->db->get('page');
		return $query->result_array();
	}

  // function to get a page from the DB
  public function get_page($slug = FALSE)
	{

    if (!$slug) {
      // if no url, then send false
      return FALSE;
    } else {
      // else load up and send data back
      $query = $this->db->get_where('page', array('slug' => $slug));
      return $query->row_array();
    }

  }

	// function to add a page to the DB
	public function add_page()
	{
		$this->load->helper('url');

		// for checking url slugs are unique
		$extra_slug = 0;
		do {
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			if ($extra_slug > 0) {
				$slug .= '-'.$extra_slug;
			}
			$extra_slug++;
		} while ($this->get_page($slug));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'content' => $this->input->post('content')
		);

		// add a page record to the DB
		$result = $this->db->insert('page', $data);
		if ($result) {
			return $data;
		}
		return;
	}

	//function to change a page in the DB
	public function update_page($id, $slug_changed = FALSE) {

		$this->load->helper('url');

		if ($slug_changed) {
			/* @TODO: could move to single function */
			$extra_slug = 0;
			do {
				$slug = url_title($this->input->post('slug'), 'dash', TRUE);
				if ($extra_slug > 0) {
					$slug .= '-'.$extra_slug;
				}
				$extra_slug++;
			} while ($this->get_page($slug));
			/* end move to single function */
		} else {
			$slug = $this->input->post('slug');
		}

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'content' => $this->input->post('content')
		);

		// update the record in the DB
		$this->db->where('id', $id);
		$result = $this->db->update('page', $data);
		if ($result) {
			return $data;
		}
		return;
	}

	//function to remove a page from the DB
	public function delete_page($id) {

		$this->db->where('id', $id);
		$this->db->delete('page');
		return;

	}

}
