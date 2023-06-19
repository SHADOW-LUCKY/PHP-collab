<?php
  $url="http://localhost/tests/PHP-collab/ApiRest/controllers/Empleados.php?op=GetAll";
  $curl=curl_init();
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  $result=json_decode(curl_exec($curl));
  ?>
<?php
#delete in curl
if (isset($_POST['Delete'])) {
  $ID = $_POST['Delete'];
  $url = "http://localhost/tests/PHP-collab/ApiRest/controllers/Empleados.php?op=Delete";
  $data = array(
      'Empleado_ID' => $ID
  );
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  $response = curl_exec($ch);
  curl_close($ch);
}
?>
<section class="content">

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Default box -->
        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabla De Empleados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Empresa</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) { ?>
              <tr>
                <td><?php echo $row->Empleado_ID; ?></td>
                <td><?php echo $row->Empleado_nombre; ?></td>
                <td><?php echo $row->Telefono; ?></td>
                <td><?php echo $row->Email; ?></td>
                <td>
                  <form action="view.php" method="post" >
                  <button type="submit" class="btn btn-danger" value="<?php echo $row->Empleado_ID; ?>" name="Delete">Eliminar</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            <tfoot>
          <tr>
              <th>ID</th>
              <th>Empresa</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Delete</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
        <!-- /.card-footer-->
      <!-- /.card -->
    </div>
  </div>
</div>
</section>