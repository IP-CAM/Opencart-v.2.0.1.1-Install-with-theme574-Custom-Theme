<?php
class ControllerModuleImageOption extends Controller {
	private $error = array();
		
	public function index() {   
		$data = $this->load->language('module/image_option');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('image_option', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/image_option', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$data['action'] = $this->url->link('module/image_option', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['image_option_status'])) {
			$data['image_option_status'] = $this->request->post['image_option_status'];
		} else {
			$data['image_option_status'] = $this->config->get('image_option_status');
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/image_option.tpl', $data));		
		
	}
	
  public function install() {   
	$this->load->model('catalog/image_option');
    $this->model_catalog_image_option->install();	
  }

  public function uninstall() {
    $this->load->model('catalog/image_option');
    $this->model_catalog_image_option->uninstall();	
  }

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/image_option')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for happydeath1 ( )
