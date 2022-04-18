{include file='templates/header.tpl'}
    
    {if $admin}
        <h2> {$tituloAdmin}</h2> 
    {else}
        <h2> {$tituloUser}</h2>    
    {/if}

    
<div class="container"> 
    {if $admin}
    <a href="showCreateStore" class="btn btn-warning">Cargar una bodega</a>
    <a href="adminHome" class="btn btn-success">administrar vinos/bodegas</a>
    <a class="btn btn-secondary" href="logout">Log Out</a>
    {/if}
    <table class="table table-dark">
        <tr scope="col">
            <th>Nombre</th>
            {if $admin}
            <th>Borrar</th>
            <th>Modificar</th>
            {/if}
        </tr>
                <tr>
                    {foreach from=$stores item=$store}
                        <tr>    
                            <td> <a href="winesForStore/{$store->NameStore}">{$store->NameStore}</a> </td>                                                                                                            
                            {if $admin}
                            <td> <a class="btn btn-danger" href="deleteStore/{$store->id_store}">Borrar</a></td>                
                            <td> <a class="btn btn-success" href="goUpdateStore/{$store->id_store}">Modificar</a></td>                                       
                            {/if}
                        </tr>
                    {/foreach}
                
    </table>
    
</div>
{include file='templates/footer.tpl'}