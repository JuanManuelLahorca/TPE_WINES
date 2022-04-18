{include file='templates/header.tpl'}

<h2>{$titulo}</h2>

<div class="container">
    <table class="table table-dark">
        <tr scope="col">
            <th>Nombre</th>
            <th>Estilo</th>
            <th>Bodega</th>
            <th>Precio</th>
        </tr>
                <tr>
                    {foreach from=$winesForStore item=$wine}
                        <tr>    
                            <td> {$wine->NameWine}</td>
                            <td> {$wine->Style} </td>
                            <td> {$wine->NameStore} </td>
                            <td> {$wine->Price} </td>
                        </tr>
                    {/foreach}
                
    </table>

    <a href="ListStore" class="btn btn-success">Volver a lista de bodegas</a>
</div>
{include file='templates/footer.tpl'}