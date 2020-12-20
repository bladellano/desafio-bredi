<?php


namespace Source\Controllers;


/**
 * Class Product
 * @package Source\Controllers
 */
class Product extends Controller
{

    /**
     * Product constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * @param $data
     */
    public function register($data):void
    {
        $data = filter_var_array($data,FILTER_SANITIZE_STRIPPED);

        if(in_array("",$data)){
            echo $this->ajaxResponse("message",[
                "type"=>"error",
                "message"=>"Preencha todos os campos"
            ]);
            return;
        }

        $product = new \Source\Models\Product();
        $product->nome = $data['nome'];
        $product->categoria_id = $data['categoria_id'];
        $product->preco = $product->moneyDB( $data['preco'] );

        if(!$product->save()){
            echo $this->ajaxResponse("message",[
                "type"=>"error",
                "message"=>$product->fail()->getMessage()
            ]);
            return;
        }

        flash("success","Produto cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect",[
            "url"=>$this->router->route("web.create")
        ]);
        return;
    }

    /**
     * @param $data
     */
    public function update($data):void
    {
        $product = (new \Source\Models\Product())->findById($data['id']);

        $product->nome = $data['nome'];
        $product->categoria_id = $data['categoria_id'];
        $product->preco = $product->moneyDB( $data['preco'] );

        if(!$product->save()){
            echo $this->ajaxResponse("message",[
                "type"=>"error",
                "message"=>$product->fail()->getMessage()
            ]);
            return;
        }

        flash("success","Produto alterado com sucesso!");

        echo $this->ajaxResponse("redirect",[
            "url"=>site()."/editar/{$product->id}"
        ]);

        return;
    }

    /**
     * @param $data
     */
    public function delete($data):void
    {
        $product = (new \Source\Models\Product())->findById($data['id']);

        if(!$product->destroy()){
            echo $this->ajaxResponse("message",[
                "type"=>"error",
                "message"=>$product->fail()->getMessage()
            ]);
            return;
        }

        flash("success","Produto excluído com sucesso!");

        $this->router->redirect("web.products");

        return;
    }

}