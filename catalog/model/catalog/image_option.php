<?php
class ModelCatalogImageOption extends Model {

  public function getOptionsImagesByProductId($a25231f51421afab419d0e144e8927cbe) {
    
    $this->load->model('tool/image'); 
    $this->load->model('catalog/product');
    
    $af8f154f3310b3af0bbec971fbad2ebea = $this->model_catalog_product->getProductOptions($a25231f51421afab419d0e144e8927cbe);

    $afdbd7bd39955ab75e9e8349eb5e48ff4 = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image_option WHERE product_id = " . (int)$a25231f51421afab419d0e144e8927cbe);   

    $aa91a725681b2874714b6847d16f22c2a = array();  
    $a848a82aa8f051ac912295cbe90fdb01b = array();
    foreach ($afdbd7bd39955ab75e9e8349eb5e48ff4->rows as $a27545a5bafe2c862e6d179b853eb9515) {
        
        foreach ($af8f154f3310b3af0bbec971fbad2ebea as $a40324be3856b07b0b782cc1ac1eadc76) {
          if ($a40324be3856b07b0b782cc1ac1eadc76['type'] == 'select' || $a40324be3856b07b0b782cc1ac1eadc76['type'] == 'radio' || $a40324be3856b07b0b782cc1ac1eadc76['type'] == 'checkbox' || $a40324be3856b07b0b782cc1ac1eadc76['type'] == 'image') { 
            foreach ($a40324be3856b07b0b782cc1ac1eadc76['product_option_value'] as $a20b8f890e3d0795d2cec095f33149366) {
              if ($a20b8f890e3d0795d2cec095f33149366['option_value_id'] == $a27545a5bafe2c862e6d179b853eb9515['option_value_id']) {

                $a27545a5bafe2c862e6d179b853eb9515['product_option_value_id'] = $a20b8f890e3d0795d2cec095f33149366['product_option_value_id'];
                                                $a27545a5bafe2c862e6d179b853eb9515['image'] = $a27545a5bafe2c862e6d179b853eb9515['image'];
                $a27545a5bafe2c862e6d179b853eb9515['image_thumb'] = $this->model_tool_image->resize($a27545a5bafe2c862e6d179b853eb9515['image'], $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
                $a27545a5bafe2c862e6d179b853eb9515['image_popup'] = $this->model_tool_image->resize($a27545a5bafe2c862e6d179b853eb9515['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
                
                $aa91a725681b2874714b6847d16f22c2a[$a20b8f890e3d0795d2cec095f33149366['product_option_value_id']][] = $a27545a5bafe2c862e6d179b853eb9515;
                
                if (!isset($a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']]) || !in_array($a20b8f890e3d0795d2cec095f33149366['product_option_value_id'], $a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']])) {
                  $a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']][] = $a20b8f890e3d0795d2cec095f33149366['product_option_value_id'];
                }
                
                break 2;
                
              }
            }
          }  
        }
    }    

    $aa91a725681b2874714b6847d16f22c2a['images'] = $a848a82aa8f051ac912295cbe90fdb01b;
    
    return $aa91a725681b2874714b6847d16f22c2a; 
  }
  
  public function getProductImage ($a25231f51421afab419d0e144e8927cbe, $af8f154f3310b3af0bbec971fbad2ebea) {
    
        $aac3c64df2abf6af32d093214aaa79dfd = array();
    foreach ($af8f154f3310b3af0bbec971fbad2ebea as $a9cda2d4a78644cccc8f46341daec8a05 => $a9386cb42734f5ddc39e5df517b5c49a6) {
      if (is_array($a9386cb42734f5ddc39e5df517b5c49a6)) {
        foreach ($a9386cb42734f5ddc39e5df517b5c49a6 as $a01578a84bf5f4a578b5be7bb53a8b25b) {
          $aac3c64df2abf6af32d093214aaa79dfd[] = (int)$a01578a84bf5f4a578b5be7bb53a8b25b;
        }
      } else {      
        $aac3c64df2abf6af32d093214aaa79dfd[] = (int)$a9386cb42734f5ddc39e5df517b5c49a6;
      }
    }

    if ($aac3c64df2abf6af32d093214aaa79dfd) {
      
            $ada1d0a914cdf44dc2adb05f9388da76e = $this->db->query("SELECT pov.option_value_id 
        FROM " . DB_PREFIX . "product_option_value pov 
        WHERE pov.product_option_value_id IN (" .  implode(',', $aac3c64df2abf6af32d093214aaa79dfd) . ")" . " 
          AND pov.product_id = '" . (int)$a25231f51421afab419d0e144e8927cbe . "'");
      $a98c6a45e6acfb02f3fed4a9ce87b89b0 = array();
      foreach ($ada1d0a914cdf44dc2adb05f9388da76e->rows as $a27545a5bafe2c862e6d179b853eb9515) {
        $a98c6a45e6acfb02f3fed4a9ce87b89b0[] = $a27545a5bafe2c862e6d179b853eb9515['option_value_id'];
      }      

            $afdbd7bd39955ab75e9e8349eb5e48ff4 = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image_option WHERE product_id = " . (int)$a25231f51421afab419d0e144e8927cbe);   
      $a848a82aa8f051ac912295cbe90fdb01b = array();
      foreach ($afdbd7bd39955ab75e9e8349eb5e48ff4->rows as $a27545a5bafe2c862e6d179b853eb9515) {
        if (!isset($a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']]) || !in_array($a27545a5bafe2c862e6d179b853eb9515['option_value_id'], $a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']])) {
          $a848a82aa8f051ac912295cbe90fdb01b[$a27545a5bafe2c862e6d179b853eb9515['image']][] = $a27545a5bafe2c862e6d179b853eb9515['option_value_id'];
        }        
      }
      
            foreach ($a848a82aa8f051ac912295cbe90fdb01b as $a08dbd4c500de2b8a8fef23fa8d4b6077 => $a55c898041a0d8aa5e032a3a17a41923b) {
        $a15fa4c6f6bfcc6f6079e5d4ac6787b92 = true;
        foreach ($a55c898041a0d8aa5e032a3a17a41923b as $ae80bcd948add7eef8cfa6bb1634237ca) {
          if (!in_array($ae80bcd948add7eef8cfa6bb1634237ca, $a98c6a45e6acfb02f3fed4a9ce87b89b0)) {
            $a15fa4c6f6bfcc6f6079e5d4ac6787b92 = false;
          }
        }
        if ($a15fa4c6f6bfcc6f6079e5d4ac6787b92) {
          return $a08dbd4c500de2b8a8fef23fa8d4b6077;
        }
      }
    }
    return false;
  }
}
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for happydeath1 ( )
