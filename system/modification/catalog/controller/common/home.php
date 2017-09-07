<?php
class ControllerCommonHome extends Controller {
	public function index() {

					$data['microdatapro_data']['meta_description'] = $this->config->get('config_meta_description');
					$data['description'] = $this->config->get('config_meta_description');
					$data['heading_title'] = $this->config->get('config_meta_title');
					$data['breadcrumbs'] = array(array("href" => $this->url->link('common/home')));
					$data['microdatapro_data']['image'] = is_file(DIR_IMAGE . $this->config->get('config_logo'))?$this->config->get('config_logo'):'';
					$this->document->setTc_og($this->load->controller('module/microdatapro/tc_og', $data));				
				
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');

			$data['header_top'] = $this->load->controller('common/header_top');
			
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
}