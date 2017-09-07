<?php
class ControllerModulePDQO extends Controller {
    
    const MODULE_NAME 	 = 'Premium Dev Quick Order';
	const MODULE_AUTHOR  = 'premium-dev.ru';
	const MODULE_VERSION = '1.7.2';
    
	private $error = array(); 

	public function index() {
        $this->document->addStyle('view/stylesheet/pdqo/toggle-switch.css');
        $this->document->addStyle('view/stylesheet/pdqo/vendor/colorpicker/colorpicker.css');
        $this->document->addStyle('view/stylesheet/pdqo/vendor/ion-rangeslider/ion.rangeSlider.css');
        $this->document->addStyle('view/stylesheet/pdqo/vendor/ion-rangeslider/ion.rangeSlider.skinModern.css');
        $this->document->addScript('view/javascript/pdqo/vendor/ion-rangeslider/ion.rangeSlider.min.js');
        $this->document->addScript('view/javascript/pdqo/vendor/colorpicker/colorpicker.js');

        $data = array();
        
        $data = array_merge($data, $this->language->load('module/pdqo'));
        
		$this->document->setTitle($this->language->get('title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('pdqo', $this->request->post);		

			$data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('module/pdqo', 'token=' . $this->session->data['token'], 'SSL'));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
        

		if (!isset($data['success'])) {
			$data['success'] = '';
		}
        
        $data['layout_id'] = 0;
        
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
			'href'      => $this->url->link('module/pdqo', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$data['action'] = $this->url->link('module/pdqo', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$data['token'] = $this->session->data['token'];

		$data['pdqo_module'] = array();

		if (isset($this->request->post['pdqo_module'])) {
			$data['pdqo_module'] = $this->request->post['pdqo_module'];
		} elseif ($this->config->get('pdqo_module')) { 
			$data['pdqo_module'] = $this->config->get('pdqo_module');
		}
        
        $data = array_merge($data, $this->settings());
                
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/pdqo/index.tpl', $data));
	}

    protected function settings() {
        $settings = $this->model_setting_setting->getSetting('pdqo');
		
        // settings-general-module-status
		if(isset($this->request->post['pdqo_module']['settings']['window']['width'])) {
			$data['settings_window_width'] = $this->request->post['pdqo_module']['settings']['window']['width'];
		}elseif(isset($settings['pdqo_module']['settings']['window']['width'])) {
            $data['settings_window_width'] = $settings['pdqo_module']['settings']['window']['width'];
		}else{
            $data['settings_window_width'] = 400;
        }
        // settings-window-width
		if(isset($this->request->post['pdqo_module']['settings']['window']['width'])) {
			$data['settings_width_width'] = $this->request->post['pdqo_module']['settings']['window']['width'];
		}elseif(isset($settings['pdqo_module']['settings']['general']['module_status'])) {
            $data['settings_general_module_status'] = $settings['pdqo_module']['settings']['general']['module_status'];
		}else{
            $data['settings_general_module_status'] = 0;
        }
        // settings-extra-livecart-status
		if(isset($this->request->post['pdqo_module']['settings']['extra']['livecart']['status'])) {
			$data['settings_extra_livecart_status'] = $this->request->post['pdqo_module']['settings']['extra']['livecart']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['livecart']['status'])) {
            $data['settings_extra_livecart_status'] = $settings['pdqo_module']['settings']['extra']['livecart']['status'];
		}else{
            $data['settings_extra_livecart_status'] = 0;
        }
        // settings-extra-close-on-bg-status
		if(isset($this->request->post['pdqo_module']['settings']['extra']['close_on_bg']['status'])) {
			$data['settings_extra_close_on_bg_status'] = $this->request->post['pdqo_module']['settings']['extra']['close_on_bg']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['close_on_bg']['status'])) {
            $data['settings_extra_close_on_bg_status'] = $settings['pdqo_module']['settings']['extra']['close_on_bg']['status'];
		}else{
            $data['settings_extra_close_on_bg_status'] = 0;
        }
        // settings-extra-close-on-esc-status
		if(isset($this->request->post['pdqo_module']['settings']['extra']['close_on_esc']['status'])) {
			$data['settings_extra_close_on_esc_status'] = $this->request->post['pdqo_module']['settings']['extra']['close_on_esc']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['close_on_esc']['status'])) {
            $data['settings_extra_close_on_esc_status'] = $settings['pdqo_module']['settings']['extra']['close_on_esc']['status'];
		}else{
            $data['settings_extra_close_on_esc_status'] = 0;
        }
        // settings-extra-close-btn-status
		if(isset($this->request->post['pdqo_module']['settings']['extra']['close_btn']['status'])) {
			$data['settings_extra_close_btn_status'] = $this->request->post['pdqo_module']['settings']['extra']['close_btn']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['close_btn']['status'])) {
            $data['settings_extra_close_btn_status'] = $settings['pdqo_module']['settings']['extra']['close_btn']['status'];
		}else{
            $data['settings_extra_close_btn_status'] = 0;
        }
        // settings-extra-close-btn-inside
		if(isset($this->request->post['pdqo_module']['settings']['extra']['close_btn']['inside'])) {
			$data['settings_extra_close_btn_inside'] = $this->request->post['pdqo_module']['settings']['extra']['close_btn']['inside'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['close_btn']['inside'])) {
            $data['settings_extra_close_btn_inside'] = $settings['pdqo_module']['settings']['extra']['close_btn']['inside'];
		}else{
            $data['settings_extra_close_btn_inside'] = 0;
        }
        // settings-extra-align-top-status
		if(isset($this->request->post['pdqo_module']['settings']['extra']['align_top']['status'])) {
			$data['settings_extra_align_top_status'] = $this->request->post['pdqo_module']['settings']['extra']['align_top']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['extra']['align_top']['status'])) {
            $data['settings_extra_align_top_status'] = $settings['pdqo_module']['settings']['extra']['align_top']['status'];
		}else{
            $data['settings_extra_align_top_status'] = 0;
        }
        // settings-fields-name-status
		if(isset($this->request->post['pdqo_module']['settings']['fields']['name']['status'])) {
			$data['settings_fields_name_status'] = $this->request->post['pdqo_module']['settings']['fields']['name']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['name']['status'])) {
            $data['settings_fields_name_status'] = $settings['pdqo_module']['settings']['fields']['name']['status'];
		}else{
            $data['settings_fields_name_status'] = 0;
        }
        // settings-fields-name-required
		if(isset($this->request->post['pdqo_module']['settings']['fields']['name']['required'])) {
			$data['settings_fields_name_required'] = $this->request->post['pdqo_module']['settings']['fields']['name']['required'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['name']['required'])) {
            $data['settings_fields_name_required'] = $settings['pdqo_module']['settings']['fields']['name']['required'];
		}else{
            $data['settings_fields_name_required'] = 0;
        }
        // settings-fields-name-placeholder
		if(isset($this->request->post['pdqo_module']['settings']['fields']['name']['placeholder'])) {
			$data['settings_fields_name_placeholder'] = $this->request->post['pdqo_module']['settings']['fields']['name']['placeholder'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['name']['placeholder'])) {
            $data['settings_fields_name_placeholder'] = $settings['pdqo_module']['settings']['fields']['name']['placeholder'];
		}else{
            $data['settings_fields_name_placeholder'] = '';
        }
        // settings-fields-phone-status
		if(isset($this->request->post['pdqo_module']['settings']['fields']['phone']['status'])) {
			$data['settings_fields_phone_status'] = $this->request->post['pdqo_module']['settings']['fields']['phone']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['phone']['status'])) {
            $data['settings_fields_phone_status'] = $settings['pdqo_module']['settings']['fields']['phone']['status'];
		}else{
            $data['settings_fields_phone_status'] = 0;
        }
        // settings-fields-phone-required
		if(isset($this->request->post['pdqo_module']['settings']['fields']['phone']['required'])) {
			$data['settings_fields_phone_required'] = $this->request->post['pdqo_module']['settings']['fields']['phone']['required'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['phone']['required'])) {
            $data['settings_fields_phone_required'] = $settings['pdqo_module']['settings']['fields']['phone']['required'];
		}else{
            $data['settings_fields_phone_required'] = 0;
        }
        // settings-fields-phone-placeholder
		if(isset($this->request->post['pdqo_module']['settings']['fields']['phone']['placeholder'])) {
			$data['settings_fields_phone_placeholder'] = $this->request->post['pdqo_module']['settings']['fields']['phone']['placeholder'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['phone']['placeholder'])) {
            $data['settings_fields_phone_placeholder'] = $settings['pdqo_module']['settings']['fields']['phone']['placeholder'];
		}else{
            $data['settings_fields_phone_placeholder'] = '';
        }
        // settings-fields-phone-mask
		if(isset($this->request->post['pdqo_module']['settings']['fields']['phone']['mask'])) {
			$data['settings_fields_phone_mask'] = $this->request->post['pdqo_module']['settings']['fields']['phone']['mask'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['phone']['mask'])) {
            $data['settings_fields_phone_mask'] = $settings['pdqo_module']['settings']['fields']['phone']['mask'];
		}else{
            $data['settings_fields_phone_mask'] = '+7-(000)-000-00-00';
        }
        // settings-fields-email-status
		if(isset($this->request->post['pdqo_module']['settings']['fields']['email']['status'])) {
			$data['settings_fields_email_status'] = $this->request->post['pdqo_module']['settings']['fields']['email']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['email']['status'])) {
            $data['settings_fields_email_status'] = $settings['pdqo_module']['settings']['fields']['email']['status'];
		}else{
            $data['settings_fields_email_status'] = 0;
        }
        // settings-fields-email-required
		if(isset($this->request->post['pdqo_module']['settings']['fields']['email']['required'])) {
			$data['settings_fields_email_required'] = $this->request->post['pdqo_module']['settings']['fields']['email']['required'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['email']['required'])) {
            $data['settings_fields_email_required'] = $settings['pdqo_module']['settings']['fields']['email']['required'];
		}else{
            $data['settings_fields_email_required'] = 0;
        }
        // settings-fields-email-placeholder
		if(isset($this->request->post['pdqo_module']['settings']['fields']['email']['placeholder'])) {
			$data['settings_fields_email_placeholder'] = $this->request->post['pdqo_module']['settings']['fields']['email']['placeholder'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['email']['placeholder'])) {
            $data['settings_fields_email_placeholder'] = $settings['pdqo_module']['settings']['fields']['email']['placeholder'];
		}else{
            $data['settings_fields_email_placeholder'] = '';
        }
        // settings-fields-comment-status
		if(isset($this->request->post['pdqo_module']['settings']['fields']['comment']['status'])) {
			$data['settings_fields_comment_status'] = $this->request->post['pdqo_module']['settings']['fields']['comment']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['comment']['status'])) {
            $data['settings_fields_comment_status'] = $settings['pdqo_module']['settings']['fields']['comment']['status'];
		}else{
            $data['settings_fields_comment_status'] = 0;
        }
        // settings-fields-comment-required
		if(isset($this->request->post['pdqo_module']['settings']['fields']['comment']['required'])) {
			$data['settings_fields_comment_required'] = $this->request->post['pdqo_module']['settings']['fields']['comment']['required'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['comment']['required'])) {
            $data['settings_fields_comment_required'] = $settings['pdqo_module']['settings']['fields']['comment']['required'];
		}else{
            $data['settings_fields_comment_required'] = 0;
        }
        // settings-fields-comment-placeholder
		if(isset($this->request->post['pdqo_module']['settings']['fields']['comment']['placeholder'])) {
			$data['settings_fields_comment_placeholder'] = $this->request->post['pdqo_module']['settings']['fields']['comment']['placeholder'];
		}elseif(isset($settings['pdqo_module']['settings']['fields']['comment']['placeholder'])) {
            $data['settings_fields_comment_placeholder'] = $settings['pdqo_module']['settings']['fields']['comment']['placeholder'];
		}else{
            $data['settings_fields_comment_placeholder'] = '';
        }
        // settings-overlay-opacity-status
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['opacity']['status'])) {
			$data['settings_overlay_opacity_status'] = $this->request->post['pdqo_module']['settings']['overlay']['opacity']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['opacity']['status'])) {
            $data['settings_overlay_opacity_status'] = $settings['pdqo_module']['settings']['overlay']['opacity']['status'];
		}else{
            $data['settings_overlay_opacity_status'] = 0;
        }
        // settings-overlay-opacity-deep
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['opacity']['deep'])) {
			$data['settings_overlay_opacity_deep'] = $this->request->post['pdqo_module']['settings']['overlay']['opacity']['deep'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['opacity']['deep'])) {
            $data['settings_overlay_opacity_deep'] = $settings['pdqo_module']['settings']['overlay']['opacity']['deep'];
		}else{
            $data['settings_overlay_opacity_deep'] = 0;
        }
        // settings-overlay-color
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['color'])) {
			$data['settings_overlay_color'] = $this->request->post['pdqo_module']['settings']['overlay']['color'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['color'])) {
            $data['settings_overlay_color'] = $settings['pdqo_module']['settings']['overlay']['color'];
		}else{
            $data['settings_overlay_color'] = '#dbdbdb';
        }
        // settings-overlay-blur-status
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['blur']['status'])) {
			$data['settings_overlay_blur_status'] = $this->request->post['pdqo_module']['settings']['overlay']['blur']['status'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['blur']['status'])) {
            $data['settings_overlay_blur_status'] = $settings['pdqo_module']['settings']['overlay']['blur']['status'];
		}else{
            $data['settings_overlay_blur_status'] = 0;
        }
        // settings-overlay-blur-deep
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['blur']['deep'])) {
			$data['settings_overlay_blur_deep'] = $this->request->post['pdqo_module']['settings']['overlay']['blur']['deep'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['blur']['deep'])) {
            $data['settings_overlay_blur_deep'] = $settings['pdqo_module']['settings']['overlay']['blur']['deep'];
		}else{
            $data['settings_overlay_blur_deep'] = 0;
        }
        // settings-window-animation-in
		if(isset($this->request->post['pdqo_module']['settings']['window']['animation']['in'])) {
			$data['settings_window_animation_in'] = $this->request->post['pdqo_module']['settings']['window']['animation']['in'];
		}elseif(isset($settings['pdqo_module']['settings']['window']['animation']['in'])) {
            $data['settings_window_animation_in'] = $settings['pdqo_module']['settings']['window']['animation']['in'];
		}else{
            $data['settings_window_animation_in'] = 0;
        }
        // settings-window-animation-out
		if(isset($this->request->post['pdqo_module']['settings']['window']['animation']['out'])) {
			$data['settings_window_animation_out'] = $this->request->post['pdqo_module']['settings']['window']['animation']['out'];
		}elseif(isset($settings['pdqo_module']['settings']['window']['animation']['out'])) {
            $data['settings_window_animation_out'] = $settings['pdqo_module']['settings']['window']['animation']['out'];
		}else{
            $data['settings_window_animation_out'] = 0;
        }
        // settings-window-animation-duration
		if(isset($this->request->post['pdqo_module']['settings']['window']['animation']['duration_out'])) {
			$data['settings_window_animation_duration_out'] = $this->request->post['pdqo_module']['settings']['window']['animation']['duration_out'];
		}elseif(isset($settings['pdqo_module']['settings']['window']['animation']['duration_out'])) {
            $data['settings_window_animation_duration_out'] = $settings['pdqo_module']['settings']['window']['animation']['duration_out'];
		}else{
            $data['settings_window_animation_duration_out'] = 0;
        }
        // settings-overlay-blur-element
		if(isset($this->request->post['pdqo_module']['settings']['overlay']['blur']['element'])) {
			$data['settings_overlay_blur_element'] = $this->request->post['pdqo_module']['settings']['overlay']['blur']['element'];
		}elseif(isset($settings['pdqo_module']['settings']['overlay']['blur']['element'])) {
            $data['settings_overlay_blur_element'] = $settings['pdqo_module']['settings']['overlay']['blur']['element'];
		}else{
            $data['settings_overlay_blur_element'] = '#container';
        }
        
        return $data;
    }
    
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/pdqo')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>