<?php
class ModelCatalogImageOption extends Model {

  public function getImagesOptionsByProductId($a25231f51421afab419d0e144e8927cbe) {
     
    $afdbd7bd39955ab75e9e8349eb5e48ff4 = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image_option WHERE product_id = " . (int)$a25231f51421afab419d0e144e8927cbe);
     
    $aa91a725681b2874714b6847d16f22c2a = array();
    
    foreach ($afdbd7bd39955ab75e9e8349eb5e48ff4->rows as $a27545a5bafe2c862e6d179b853eb9515) {
        $aa91a725681b2874714b6847d16f22c2a[$a27545a5bafe2c862e6d179b853eb9515['image']][$a27545a5bafe2c862e6d179b853eb9515['option_value_id']] = $a27545a5bafe2c862e6d179b853eb9515;
    }
    
    return $aa91a725681b2874714b6847d16f22c2a; 
  }

  public function getAllOptions() {
    $this->load->model('catalog/option');
    
    $a994c4dcb7b0be934a2eb47ee3308b989 = array();
    
    $a4c7b25c2272f05314732f33ca08d9531 = $this->model_catalog_option->getOptions();
    foreach($a4c7b25c2272f05314732f33ca08d9531 as $a40324be3856b07b0b782cc1ac1eadc76) {
      
      $a7c4d584d6dfb697f984e6302b6a646d2 = $this->model_catalog_option->getOptionValues($a40324be3856b07b0b782cc1ac1eadc76['option_id']);
      if ($a7c4d584d6dfb697f984e6302b6a646d2) {
        $a40324be3856b07b0b782cc1ac1eadc76['values'] = $a7c4d584d6dfb697f984e6302b6a646d2;
        $a994c4dcb7b0be934a2eb47ee3308b989[] = $a40324be3856b07b0b782cc1ac1eadc76;
      }
    }
    return $a994c4dcb7b0be934a2eb47ee3308b989;
  }

  public function install() {
	  
	$this->load->model('setting/setting');
		
	$ac7888b03ad945a6b499b6271a236305e['image_option_status'] = 1;
	$ac7888b03ad945a6b499b6271a236305e['image_option_module'][0]['image_option'] = 1;
	$this->model_setting_setting->deleteSetting('image_option');
	$this->model_setting_setting->editSetting('image_option', $ac7888b03ad945a6b499b6271a236305e);

    $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "product_image_option (
      `product_id` INT( 11 ) NOT NULL ,
      `option_value_id` INT( 11 ) NOT NULL,
      `image` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)");
	
	$this->db->query("INSERT INTO " . DB_PREFIX . "layout_module SET layout_id = '2', code = 'image_option', position = 'content_top', sort_order = '0'");
  }
  

  public function uninstall() {
    $this->load->model('setting/setting');
    
    $this->model_setting_setting->deleteSetting('image_option');
    $this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "product_image_option");
  }    
}
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for happydeath1 ( )
