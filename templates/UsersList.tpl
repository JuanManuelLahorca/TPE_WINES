{include file='templates/header.tpl'}



    <h2>{$titulo}</h2>

    <div class="container">
        <table class="table table-dark">
            <tr scope="col">
                <th>Nombre</th>
                {if $admin}
                <th>Condicion</th>
                <th></th>
                <th>Borrar</th>
                {/if}
            </tr>
                    <tr>
                        {foreach from=$usuarios item=$u}
                            <tr>    
                                <td> {$u->NameUser} </td>
                                {if $admin}
                                <td> {if $u->admin == "1"} Administrador {else} Usuario {/if}</td>
                                <td><a href="cambiarCondicion/{$u->id_user}"><button class="btn btn-outline-secondary">Cambiar</button></a> </td>
                                <td> <a href="borrarUser/{$u->id_user}"><button class="btn btn-outline-primary">Borrar</button></a> </td>
                                {/if}
                            </tr>
                        {/foreach}
                    
        </table>

    </div>


{include file='templates/footer.tpl'}