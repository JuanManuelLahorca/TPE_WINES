{include file='templates/header.tpl'}

<h2>{$titulo}</h2>

<form action="createWine" method="POST">
    <input type="text" name="nameWines" id="nameWines" placeholder="Nombre Vino" required>
    <input type="text" name="style" id="style" placeholder="Estilo" required>
    <select name="id_store" required>
        {foreach from=$stores item=$store}
            <option value="{$store->id_store}">{$store->NameStore}</option>
        {/foreach}  
    </select>
    <input type="number" name="price" id="price" placeholder="Precio" required>
    <input type="submit" class="btn btn-primary" value="Save">
</form>

{include file='templates/footer.tpl'}