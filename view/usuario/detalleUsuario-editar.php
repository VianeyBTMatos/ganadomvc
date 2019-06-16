<h1 class="page-header">
    <?php
    echo $usuario->idUsuario != null ? $pedido->idUsuario : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $usuario->idUsuario != null ? $usuario->idUsuario : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Usuario" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Id Usuario</label>
      <input type="text" name="idUsuario" value="<?php echo $usuario->idUsuario; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>Id Usuario</label>
        <input type="text" name="id_Usuario" value="<?php echo $usuario->idUsuario; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Id estab</label>
        <input type="text" name="id_estab" value="<?php echo $pedido->precio_unit_alim; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>hora solicitud</label>
        <input type="text" name="hora_solicitud" value="<?php echo $pedido->cantidad; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Status pedido</label>
        <input type="text" name="status_pedido" value="<?php echo $pedido->subtotal; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Forma de pago</label>
        <input type="text" name="forma_pago" value="<?php echo $pedido->lugar_entrega; ?>" class="form-control" disabled />
    </div>


    <hr />

    <div class="text-right">
        <button class="btn btn-success">Atras</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
