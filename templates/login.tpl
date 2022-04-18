{include file='templates/header.tpl'}

<div >
    <h2>Ingresar usuario</h2>    
    <form action="verify" method="POST" class="container-login">
        <input type="text" name="name" id="name" placeholder="Nombre de Usuario" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="submit" class="btn btn-primary" value="Login">
    </form>
</div>
<h4>{$error} </h4>

{include file='templates/footer.tpl'}