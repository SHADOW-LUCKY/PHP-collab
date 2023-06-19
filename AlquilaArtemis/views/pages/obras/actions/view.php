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