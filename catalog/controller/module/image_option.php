<?php
class ControllerModuleImageOption extends Controller {
	public function index($setting) {
 		
 		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			return false;
		}
 		
 		$this->load->model('catalog/image_option'); 
 		$data['product_options_images'] = $this->model_catalog_image_option->getOptionsImagesByProductId($product_id);
  		$data['images_product_options_values'] = $data['product_options_images']['images'];
 		unset($data['product_options_images']['images']);
    
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/image_option.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/image_option.tpl', $data);
		} else {
			return $this->load->view('default/template/module/image_option.tpl', $data);
		}
	}  	
}