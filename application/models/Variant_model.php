<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Variant_model
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

class Variant_model extends CI_Model
{

  public function getColor($id)
  {
    $this->db->where('sub_variant_id', '3');
    $this->db->where('product_id', $id);
    return $this->db->get('tb_variant')->result_array();
  }

  public function getSize($id)
  {
    $this->db->where('sub_variant_id', '4');
    $this->db->where('product_id', $id);
    return $this->db->get('tb_variant')->result_array();
  }
}

/* End of file Variant_model.php */
/* Location: ./application/models/Variant_model.php */