<?php
namespace App\Controllers;

use Core\View;
use App\Models\Product;
use Core\Controller as Controller;

class Products extends Controller
{


    public function indexAction(){

        $products = Product::getAll();

        View::render('Products/index.php', [
            'products' => $products
        ]);



    }
    public function createAction(){




        if(isset($_POST['btn-add']))
        {
            $partNumber = $_POST['partNumber'];
            $imageURL =$_POST['imageURL'];
            $stock_quantity= $_POST['stock_quantity'];
            $cost_price= $_POST['cost_price'];
            $selling_price= $_POST['selling_price'];
            $vat_rate= $_POST['vat_rate'];
            $description= $_POST['description'];
            Product::insert( $partNumber, $imageURL, $stock_quantity, $cost_price, $selling_price, $vat_rate, $description);
            header("Location: http://$_SERVER[HTTP_HOST]/products/index/");

        }
        View::render('Products/create.php');

    }

    public function deleteAction(){
        $id =  $this->route_params['id'];

        Product::delete($id);
        header("Location: http://$_SERVER[HTTP_HOST]/products/index/");
    }

    public function editAction(){

        $id =  $this->route_params['id'];

        if(isset($_POST['btn-edit']))
        {
            $partNumber = $_POST['partNumber'];
            $imageURL =$_POST['imageURL'];
            $stock_quantity= $_POST['stock_quantity'];
            $cost_price= $_POST['cost_price'];
            $selling_price= $_POST['selling_price'];
            $vat_rate= $_POST['vat_rate'];
            $description= $_POST['description'];
            Product::update($id, $partNumber, $imageURL, $stock_quantity, $cost_price, $selling_price, $vat_rate, $description);
            header("Location: http://$_SERVER[HTTP_HOST]/products/index/");

        }

        $product = Product::getOne($id);

        View::render('Products/edit.php', [
            'product' => $product
        ]);


    } public function viewAction(){
    $id =  $this->route_params['id'];

    $product = Product::getOne($id);
    var_dump($product);

    View::render('Products/index.php', [
        'products' => $product
    ]);

}

    protected function before()
    {

    }

    protected function after()
    {
    }


}
