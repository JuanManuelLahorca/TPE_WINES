{include file='templates/header.tpl'}

<h2>Seleccione que quiere administrar</h2>

<div id="secciones">
    <section class="sectionadmin">
        <img src="images\adminvino.jpg" class="img-admin" alt="">
        <a href="wines">Vinos</a>
    </section>

    <section class="sectionadmin">
        <img src="images\adminbodega.jpg" class="img-admin" alt="">
        <a href="ListStore">Bodegas</a>
    </section>
    {if $admin}
    <section class="sectionadmin">
        <img src="images\usuario.jpg" class="img-admin" alt="">
        <a href="adminUser">Usuarios</a>
    </section>
    {/if}

</div>
{include file='templates/footer.tpl'}