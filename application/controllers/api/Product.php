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
class Product extends CI_Controller
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
            $product = $this->product->getProduct();
        } else {
            $product = $this->product->getProduct($id);
        }
        // var_dump($product);

        if ($product) {
            $this->response(
                [
                    'status' => true,
                    'message' => 'Product Found',
                    'data' => $product,
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' =>  "Product Not Found",
                ],
                404,
            );
        }
    }

    public function category_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $this->response(
                [
                    'status' => FALSE,
                    'message' => 'ID Not Found',
                ],
                404
            );
        } else {
            $product = $this->product->getProductByCategory($id);
        }
        // var_dump($product);

        if ($product) {
            $this->response(
                [
                    'status' => true,
                    'message' => 'Product By Category Found',
                    'data' => $product,
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' =>  "Product By Category Not Found",
                ],
                404,
            );
        }
    }

    public function color_get()
    {
        $id = $this->get('id');
        $color = $this->variant->getColor($id);
        if ($color) {
            $this->response(
                [
                    'status' => true,
                    'message' => 'Color Found',
                    'data' => $color,
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' =>  "Color Not Found",
                ],
                404,
            );
        }
    }

    public function size_get()
    {
        $id = $this->get('id');
        $size = $this->variant->getSize($id);
        if ($size) {
            $this->response(
                [
                    'status' => true,
                    'message' => 'Size Found',
                    'data' => $size,
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' =>  "Size Not Found",
                ],
                404,
            );
        }
    }
}
