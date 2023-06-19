
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
          <div class="col-sm-6 text-right">
            <?php include 'views/pages/obras/actions/new.php'; ?>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php include 'views/pages/obras/actions/view.php';?>
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
