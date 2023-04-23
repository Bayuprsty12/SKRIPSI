<?php
     include("../config/connection.php");
    include("../asset/fuzzy/logic_fuzzy.php");
    ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Log Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Log Data</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content --> 
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
                  Log Data Penggunaan
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">                
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>                       
                        <th>Tegangan</th>
                        <th>Arus</th>                       
                        <th>Energi</th>
                        <th>Daya</th>
                        <th>Status Alat</th>
                        <th>Timestamp</th>
                        <!-- <th>Result Fuzzy</th>
                        <th>Status</th>-->
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($konek_db,"SELECT * FROM data_sensor");
                        while($row = mysqli_fetch_array($sql)){

                          //$result_fuzzy = fuzzydatabase($row['daya'], $row['waktu']);
                          
                          echo "<tr>";
                          echo "<td>".$no."</td>";                    
                          echo "<td>".$row['tegangan']."</td>";
                          echo "<td>".$row['arus']."</td>";
                          echo "<td>".$row['energi']."</td>";
                          echo "<td>".$row['daya']."</td>";                          
                          echo "<td>".$row['status']."</td>"; 
                          echo "<td>".$row['timestamp']."</td>";
                          /*echo "<td>".number_format($result_fuzzy, 3)."</td>";
                          echo "<td>".finalStatus($result_fuzzy)."</td>";*/                   
                          echo "</tr>";
                          $no++;

                        } ?>                                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>                       
                        <th>Tegangan</th>
                        <th>Arus</th>
                        <th>Energi</th>
                        <th>Daya</th>                       
                        <th>Status Alat</th>
                        <th>Timestamp</th>
                        <!-- <th>Result Fuzzy</th>
                        <th>Status</th>-->
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