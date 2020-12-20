<?php


namespace Source\Controllers;


use Source\Models\Category;

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
    public function products():void
    {

        $products = (new \Source\Models\Product());
        $result = $products->find()->fetch(true);

        foreach ($result as &$p) {
            $p->categoria = (new Category())->findById($p->categoria_id)->titulo;
            $p->preco = $products->money( $p->preco );
        }

        echo $this->view->render("theme/products",[
            "title"=>"Lista de Produtos",
            "products"=>$result
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