<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Category;

/**
 * Class Product
 * @package Source\Models
 */
class Product extends DataLayer
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct("produtos", ["categoria_id","nome","preco"]);
    }

    /**
     * @return bool
     */
    public function save():bool
    {

        if(empty($this->nome) || !filter_var($this->nome,FILTER_DEFAULT)){
            $this->fail = new \Exception("Informe o nome do produto");
            return false;
        }

        $result = $this->find("nome = :n","n={$this->nome}")->count();

        if($result && !$this->id){
            $this->fail = new \Exception("Produto já existente ou com mesmo nome na base");
            return false;
        }

        if(!parent::save()){
            return false;
        }

        return true;
    }

    /**
     * @param $param
     * @return string
     */
    public function moneyDB($param):string
    {
        $source = ['.', ','];
        $replace = ['', '.'];
        $value = str_replace($source, $replace, $param);
        return $value; //retorna o valor formatado para gravar no banco
    }

    /**
     * @param $param
     * @return string
     */
    public function money($param):string
    {
        return number_format($param,'2',',','.');
    }

    /**
     * @return $this
     */
    public function getCategory(): Product
    {
        $this->categoria = (new Category())->findById($this->categoria_id)->data()->titulo;
        return $this;
    }

    /**
     * @return array
     */
    public function getProductsWithCategories(): array
    {
        $products = $this->find()->fetch(true);
        foreach ($products as &$p) {
            $p->categoria = (new Category())->findById($p->categoria_id)->titulo;
            $p->preco = $this->money( $p->preco );
        }
        return $products;
    }

    /**
     * @param int $page
     * @param int $itensPerPage
     * @return array
     */
    public function getPage(int $page = 1, int $itensPerPage = 3):array
    {
        $start = ($page - 1) * $itensPerPage;

        $result = $this->find()->limit($itensPerPage)->offset($start)->fetch(true);

        $resultTotal = $this->find()->count();

        return [
            'data' => $result,
            'total' =>  $resultTotal,
            'pages' => ceil( $resultTotal / $itensPerPage),
        ];
    }

}