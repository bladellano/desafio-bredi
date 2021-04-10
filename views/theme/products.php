<?php $v->layout("theme/_theme"); ?>

<div class="login_form_callback">
    <?= flash(); ?>
</div>

<h3>Lista de Produtos</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Preço</th>
            <th scope="col" style="width: 20%"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $p) :

            echo '<tr>
			<th scope="row">' . $p->id . '</th>
			<td>' . $p->nome . '</td>
			<td>' . $p->categoria . '</td>
			<td>R$ ' . $p->preco . '</td>
			<td>
			    <a href="' . site() . '/editar/' . $p->id . '" class="btn btn-sm btn-warning" >Editar</a> 
			    <a onclick="return confirm(\'Deseja realmente excluir este registro?\')" href="' . site() . '/deletar/' . $p->id . '" class="btn btn-sm btn-danger" >Excluir</a> 
			</td>
			</tr>';

        endforeach;
        ?>
    </tbody>
</table>

<p>

    <?= paginate($pages) ?>

</p>