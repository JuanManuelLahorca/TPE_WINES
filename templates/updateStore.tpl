{include file='templates/header.tpl'}

   <h2> {$titulo}</h2>

    <form action="updateStore" method="POST">
        <input type="hidden" value="{$id}" name="id_store" id="id_store">
        <input type="text" name="nameStore" id="nameStore" placeholder="Nombre bodega"> 
        <input type="submit" class="btn btn-primary" value="Editar">
    </form>

{include file='templates/footer.tpl'}