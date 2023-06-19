<?php
  $url="http://localhost/tests/PHP-collab/ApiRest/controllers/Obras.php?op=GetAll";
  $curl=curl_init();
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  $output=json_decode(curl_exec($curl));
  #Datos InnerJoin
  function INNERObras() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=alquilercollab", "root", "");
        $sql = "SELECT Obras.Obra_nombre, Cliente.CompanyName FROM Obras INNER JOIN Cliente ON Obras.ClienteObra = Cliente.Cliente_ID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conn = null; // Close the database connection
        return $result;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
    INNERObras();
}
#delete in Obras
if (isset($_POST['Delete'])) {
  $ID = $_POST['Delete'];
  $url = "http://localhost/tests/PHP-collab/ApiRest/controllers/Obras.php?op=Delete";
  $data = array(
      'Obra_ID' => $ID
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
          <h3 class="card-title">Tabla De Obras</h3>
          <?php
          $results = INNERObras();
          $names = array();
          foreach ($results as $row) {
              array_push($names, $row['CompanyName']);
          }
          $x=1;
          ?>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Obra</th>
              <th>Empresa</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($output as $row) {
              $name = $x-1;
              $x++;

            ?>
              <tr>
                <td><?php echo $row->Obra_ID; ?></td>
                <td><?php echo $row->Obra_nombre; ?></td>
                <td><?php echo $names[$name];?></td>
                <td>
                  <form action="view.php" method="post">
                  <button type="submit" class="btn btn-danger" value="<?php echo $row->Obra_ID; ?>" name="Delete">Eliminar</button>
                  </form>
              </tr>
            <?php } ?>
            </tbody>
            <tfoot>
          <tr>
              <th>ID</th>
              <th>Obra</th>
              <th>Empresa</th>
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