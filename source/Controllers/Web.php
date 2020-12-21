<?php


namespace Source\Controllers;


use Source\Models\Category;

use CoffeeCode\Paginator\Paginator;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{

    /**
     * Web constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     *
     */
    public function home():void
    {
        echo $this->view->render("theme/home",[
            "title"=>"Home",
        ]);
    }

    /**
     *
     */
    public function create():void
    {
        $categories = (new Category())->find()->fetch(true);

        echo $this->view->render("theme/create", [
            "title" => "Cadastro de Produto",
            "categories" => $categories
        ]);
    }

    /**
     * @param $data
     */
    public function edit($data):void
    {
        $categories = (new Category())->find()->fetch(true);

        $product = (new \Source\Models\Product())->findById($data['id']);

        echo $this->view->render("theme/create",[
            "title"=>"Edição de Produtos",
            "product"=>$product,
            "categories"=>$categories
        ]);
    }

    /**
     *
     */
    public function products($data):void
    {
        $products = (new \Source\Models\Product());

        $page = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRIPPED);

        if($page == null) $page = 1;

        $pagination = $products->getPage( $page );

        $pages = [];

        for ($x = 0; $x <  $pagination['pages']; $x++) {
            array_push($pages, [
                'href' => site().'/produtos?' . http_build_query(['page' => $x + 1,]),
                'text' => $x + 1
            ]);
        }

        echo $this->view->render("theme/products",[
            "title"=>"Lista de Produtos",
            "products"=>$pagination['data'],
            "pages"=>$pages
        ]);

    }
    /**
     * @param $data
     */
    public function error($data):void
    {
        $error = filter_var($data["errcode"],FILTER_VALIDATE_INT);

        echo $this->view->render("theme/error",[
            "title"=>"Erro {$error}",
            "error"=>$error
        ]);
    }


}