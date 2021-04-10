<?php $v->layout("theme/_theme"); ?>
        <!--Aproveitando o mesmo formulário de criar para editar -->
        <?php if (isset($product->id)) : ?>

            <form class="form-signin" action="<?= site() . "/update/" . $product->id  ?>" method="post" autocomplete="off">
            <input type="hidden" name="id" id="id" value="<?= $product->id ?>">

        <?php else : ?>

            <form class="form-signin" action="<?= site() . "/register" ?>" method="post" autocomplete="off">

        <?php endif; ?>

        <div class="login_form_callback"> <?= flash(); ?></div>

        <h3><?= $title ?></h3>

        <div class="form-group">
            <input value="<?= isset($product->nome) ? $product->nome : "" ?>" type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Produto">
        </div>

        <div class="form-group">
            <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="">SELECIONE</option>
                <?php foreach ($categories as $category) : ?>
                    <option <?= ($category->id == @$product->categoria_id) ? "selected" : null ?> value="<?= $category->id ?>"> <?= $category->titulo ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <input value="<?= isset($product->preco) ? $product->preco : "" ?>" type="text" name="preco" id="preco" class="form-control money" placeholder="Preço">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Salvar</button>
        </div>
        </form>

        <?php $v->start("scripts"); ?>
        <script src="<?= asset("/js/form.js"); ?>"></script>
        <?php $v->end(); ?>