<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Category_model
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

class Category_model extends CI_Model
{

  public function getCategory($id = null)
  {
    if ($id != null) {
      $this->db->where('id', $id);
      return $this->db->get('tb_category')->result_array();
    } else {
      return $this->db->get('tb_category')->result_array();
    }
  }
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */