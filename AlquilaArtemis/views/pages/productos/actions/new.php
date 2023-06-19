<?php
if (isset($_POST['Producto'])) {
    $url = "http://localhost/tests/PHP-collab/ApiRest/controllers/Productos.php?op=Insert";
    $data = array(
        'Producto_nombre' => $_POST['Producto_nombre'], 
        'Producto_descripcion' => $_POST['Producto_descripcion'],
        'Producto_precio' => $_POST['Producto_precio'],
        'Producto_stock' => $_POST['Producto_stock'],
        
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
}

$url="http://localhost/tests/PHP-collab/ApiRest/controllers/Clientes.php?op=GetAll";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$result=json_decode(curl_exec($curl));
 
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nuevo Producto
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="Producto_nombre">
            </div>
            <div>
                <label for="">Descripcion</label>
                <input class="form-control" type="text" name="Producto_descripcion">
            </div>
            <div>
                <label for="">Precio</label>
                <input class="form-control" type="number" step="0.01" name="Producto_precio">
            </div>
            <div>
                <label for="">Stock</label>
                <input class="form-control" type="number" name="Producto_stock">
            </div>
             <input type="submit" value="Crear Producto" name="Producto" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>