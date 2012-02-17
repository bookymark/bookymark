<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * bookmarks
 * 
 * Description
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		bookmarks.php
 * @version		1.0
 * @date		02/08/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------

/**
 * bookmarks class.
 * 
 * @extends CI_Controller
 */
class bookmarks extends CI_Controller
{
	// --------------------------------------------------------------------------
	
	/**
	 * _data
	 *
	 * holds all data for views
	 * 
	 * @var mixed
	 * @access private
	 */
	private $_data;
	
	// --------------------------------------------------------------------------
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		// load resources
		$this->load->add_package_path(FCPATH_U.APPPATH_U.'third_party/carabiner');
		$this->load->library('carabiner');
		$this->load->helper('authentication_helper');
		$this->output->enable_profiler(TRUE);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * _remap function.
	 * 
	 * @access public
	 * @param string $method
	 * @return void
	 */
	public function _remap($method)
	{
		$this->load->helper('url');
		$this->load->model('home_model');
		$this->load->library('session');
		$this->load->library('authentication');
		$this->authentication->restrict_access();
		$this->$method();
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index()
	{
		$this->list_bookmarks();
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * list_bookmarks function.
	 * 
	 * @access public
	 * @return void
	 */
	public function list_bookmarks()
	{	
		$this->load->database();
		$this->load->model('bookmarks_model');
		
		// pagination
		$this->load->library('pagination');
		$this->config->load('pagination');
		$opts = $this->input->get();
		unset($opts['page']);
		$q = $this->bookmarks_model->bookmarks_table($opts);
		$config['base_url'] = 'list_bookmarks?';
		$config['total_rows'] = $this->data['total_rows'] = $q->num_rows();
		$this->pagination->initialize($config);
		
		// get bookmarks
		$get = (is_array($this->input->get()) ? $this->input->get() : array());
		$opts = array_merge($get, array('limit' => $this->config->item('per_page')));
		$this->_data['bookmarks'] = $this->bookmarks_model->bookmarks_table($opts);
		
		// load view
		$this->_data['title'] = 'Your Bookymarks | Bookymark';
		$this->_data['header'] = $this->load->view('header_only_view', $this->_data, TRUE);
		$this->_data['content'] = $this->load->view('list_bookmarks_view', $this->_data, TRUE);
		$this->load->view('template_view', $this->_data);
	}
	
	// --------------------------------------------------------------------------
}
/* End of file bookmarks.php */
/* Location: ./bookymark/application/controllers/bookmarks.php */