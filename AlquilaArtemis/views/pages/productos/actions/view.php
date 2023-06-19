<?php
  $url="http://localhost/tests/PHP-collab/ApiRest/controllers/Productos.php?op=GetAll";
  $curl=curl_init();
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  $result=json_decode(curl_exec($curl));
  ?>
<section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla De Productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($result as $row) { ?>
                    <tr>
                      <td><?php echo $row->Producto_ID; ?></td>
                      <td><?php echo $row->Producto_nombre; ?></td>
                      <td><?php echo $row->Producto_descripcion; ?></td>
                      <td><?php echo $row->Producto_precio; ?>$</td>
                      <td><?php echo $row->Producto_stock; ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
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