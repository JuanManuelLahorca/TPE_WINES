{include file='templates/header.tpl'}

    <div class="cabecera">
        <h2> {$titulo}</h2>    
    </div>
        
    <div class="container">
        {if $admin}
        <a href="showCreateWine"class="btn btn-warning">Cargar un vino</a>
        <a href="adminHome" class="btn btn-success">Administrar vinos/bodegas</a>
        <a class="btn btn-secondary" href="logout">Log Out</a>
        {/if}
        <table class="table table-dark">
            <tr scope="col">
                <th>Nombre</th>
                <th>Estilo</th>
                <th>Bodega</th>
                <th>Precio</th>
                <th>Info</th>
                {if $admin}
                <th>Borrar</th>
                <th>Modificar</th>
                {/if}
            </tr>
            <tr>
                {foreach from=$wines item=$wine}
                    <tr>    
                        <td> {$wine->NameWine} </td>
                        <td> {$wine->Style} </td>                           
                        <td> {$wine->NameStore} </td>                           
                        <td> {$wine->Price} </td>
                        <td> <a href="viewWine/{$wine->NameWine}"><button class="btn btn-outline-secondary">+</button></a> </td>
                        {if $admin}
                        <td> <a class="btn btn-danger" href="deleteWine/{$wine->id_Wine}">Borrar</a></td>                
                        <td> <a class="btn btn-success" href="goUpdateWine/{$wine->id_Wine}">Modificar</a></td>                                     
                        {/if}
                        
                    </tr>
                {/foreach}
            </tr> 
        </table>            
    </div>

{include file='templates/footer.tpl'}


