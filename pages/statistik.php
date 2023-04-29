    <?php
    include("../config/connection.php");
    // include("../assets/fuzzy_logic/fuzzy-logic.php");
    ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Statistik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Statistik</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Bar Chart</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="nav-icon fas fa-table"></i>
                  Harga Total Penggunaan
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">                
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>                       
                        <th>Tanggal Penggunaan</th>
                        <th>Total KWH</th>
                        <th>Harga Rp.</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($konek_db,"SELECT tanggal_penggunaan, SUM(energi) as total_kwh FROM log_penggunaan GROUP BY tanggal_penggunaan LIMIT 10");
                        while($row = mysqli_fetch_array($sql)){
                          
                            $bayar = ($row['total_kwh'] * 415);
                          
                          echo "<tr>";
                          echo "<td>".$no."</td>";                                             
                          echo "<td>".$row['tanggal_penggunaan']."</td>"; 
                          echo "<td>".$row['total_kwh']."</td>";  
                          echo "<td>".number_format($bayar, 3)."</td>";                
                          echo "</tr>";
                          $no++;

                        } ?>                                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>                       
                        <th>Tanggal Penggunaan</th>
                        <th>Total KWH</th>
                        <th>Harga Rp.</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

