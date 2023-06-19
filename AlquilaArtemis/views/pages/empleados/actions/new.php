<?php
if (isset($_POST['Empleado'])) {
    $url = "http://localhost/tests/PHP-collab/ApiRest/controllers/Empleados.php?op=Insert";
    $data = array(
        'Empleado_nombre' => $_POST['Empleado_nombre'], 
        'Telefono' => $_POST['Telefono'], 
        'Email' => $_POST['Email']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
}
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nuevo Empleado
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="Empleado_nombre">
            </div>
            <div>
                <label for="">Telefono</label>
                <input class="form-control" type="text" name="Telefono">
            </div>
            <div>
                <label for="">Email</label>
                <input class="form-control" type="email" name="Email">
            </div>
             <input type="submit" value="Crear Empleado" name="Empleado" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>