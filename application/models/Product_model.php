<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Product_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Product_model extends CI_Model
{
  public function getProduct($id = null)
  {
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    if ($id == null) {
      return $this->db->get('tb_product')->result_array();
    } else {
      return $this->db->get_where('tb_product', ['id_product' =>  $id])->result_array();
    }
  }

  public function getProductByCategory($id = null)
  {
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where('category_id', $id);
    return $this->db->get('tb_product')->result_array();
  }
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */