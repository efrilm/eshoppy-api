<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Category extends CI_Controller
{

  use REST_Controller {
    REST_Controller::__construct as private __resTraitConstruct;
  }

  function __construct()
  {
    parent::__construct();
    $this->__resTraitConstruct();
  }

  public function index_get()
  {
    $id = $this->get('id');

    if ($id === null) {
      $category = $this->category->getCategory();
    } else {
      $category = $this->category->getCategory($id);
    }
    // var_dump($category);

    if ($category) {
      $this->response(
        [
          'status' => true,
          'message' => 'Category Found',
          'data' => $category,
        ],
        200
      );
    } else {
      $this->response(
        [
          'status' => false,
          'message' =>  "Category Not Found",
        ],
        404,
      );
    }
  }
}
