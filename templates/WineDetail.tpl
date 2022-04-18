{include file='templates/header.tpl'}
<div class="container">
    <h2> Titulo : {$wine->NameWine}</h2>
        <h2> Estilo : {$wine->Style}</h2>
        <h2> Bodega : {$wine->NameStore}</h2>
        <h2> Descripción: {$descripcion} </h2>
        
    <a href="wines" class="btn btn-success"> Volver a lista de vinos</a>
</div>

<h2>Deje aqui su calificaion del vino</h2>

<form action="createComments" method="POST">
    
    <input type="textarea" name="content" id="content" required>
    <select name="qualification" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>     
    </select>
    <input type="hidden" name="id_user" id="id_user" value="{$user->id_user}" required>
    <input type="hidden" name="id_Wine" id="id_Wine" value="{$wine->id_Wine}" required>
    
    <input type="submit" class="btn btn-primary" value="Save">
</form>


<h2>Lista de comentarios</h2>


<ul id="list-comments">
</ul>

<script src="./js/app.js"></script>
{include file='templates/footer.tpl'}