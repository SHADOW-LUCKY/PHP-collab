
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


  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Obras</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($output as $row) {
                    $name = $row->ClienteObra-1;
                  ?>
                    <tr>
                      <td><?php echo $row->Obra_ID; ?></td>
                      <td><?php echo $row->Obra_nombre; ?></td>
                      <td><?php echo $names[$name];?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Obra</th>
                    <th>Empresa</th>
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
    <!-- /.content -->
  </div>
<script>

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
