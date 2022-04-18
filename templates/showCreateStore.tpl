{include file='templates/header.tpl'}

<h2>{$titulo}</h2>

<form action="createStore" method="POST">
        <input type="text" name="nameStore" id="nameStore" placeholder="Nombre bodega">            
        <input type="submit" class="btn btn-primary" value="Save">
</form>

{include file='templates/footer.tpl'}
