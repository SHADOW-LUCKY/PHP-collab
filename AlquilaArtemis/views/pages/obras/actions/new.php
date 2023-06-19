<?php
if (isset($_POST['Obra'])) {
    $url = "http://localhost/tests/PHP-collab/ApiRest/controllers/Obras.php?op=Insert";
    $data = array(
        'Obra_nombre' => $_POST['Obra_nombre'], 
        'ClienteObra' => $_POST['ClienteObra'], 
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
  Nuevo Obra
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Obra</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body text-left">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="Obra_nombre">
            </div>
            <div>
                <label for="">Cliente Encargado</label>
                <select name="ClienteObra" class="form-control">
                    <?php foreach ($result as $key => $value) { ?>
                        <option value="<?php echo $value->Cliente_ID; ?>"><?php echo $value->CompanyName; ?></option>
                    <?php } ?>
                </select>
            </div>
             <input type="submit" value="Crear Obra" name="Obra" class="btn btn-dark mt-3">
        </form>
      </div>
    </div>
  </div>
</div>