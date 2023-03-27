    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->    
    <section class="content">
      <div class="container-fluid">

          <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white bg-navy">
            <h1 class="widget-user-desc">Monitoring Penggunaan Listrik</h1>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="dist/img/energi.png" alt="logo Avatar">
          </div>

          <div class="card-footer bg-navy">
            <div class="row">
              <div class="col-sm-6 border-right">
                <div class="description-block">
                  <h3 class="description-header">Informatika</h3>
                </div>
                <!-- /.description-block -->
              </div>

              <div class="col-sm-6 border-right">
                <div class="description-block">
                    <h3 class="description-header">Udayana</h3>
                  </div>
                  <!-- /.description-block -->
                </div>            
              </div>        
          </div>      
        </div>

        
        <div class="row">
          <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                  Stop Kontak Penggunaan
              </h3>
            </div>

          
          <div class="card-body pb-0">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p> TEGANGAN</p>

                  <h3 id="info-tegangan">--<sup style="font-size: 20px"> </sup></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-flash"></i>
                </div>             
              </div>
            </div>
            

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>ARUS</p>

                  <h3 id="info-arus">--<sup style="font-size: 20px"> </sup></h3>                  
                </div>
                <div class="icon">
                  <i class="ion ion-ios-pulse-strong"></i>
                </div>              
              </div>
            </div>            

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>DAYA</p>

                  <h3 id="info-daya">--</h3>                  
                </div>
                <div class="icon">
                  <i class="ion ion-ios-lightbulb"></i>
                </div>              
              </div>
            </div>            

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>ENERGI</p>

                  <h3 id="info-energi">--</h3>                  
                </div>
                <div class="icon">
                  <i class="ion ion-battery-charging"></i> 
                </div>              
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>WAKTU PAKAI</p>

                  <h3 id="info-waktu">--</h3>                  
                </div>
                <div class="icon">
                  <i class="ion ion-ios-timer"></i> 
                </div>              
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <p>STATUS</p>

                  <h3 id="info-status">--</h3>                  
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i> 
                </div>              
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- START DISINI ISI CONTENT BAGIAN KIRI -->

              <!-- /.card --> 
            </section>
            <!-- /.Left col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              <!-- START DISINI ISI CONTENT BAGIAN KANAN -->

              <!-- /.card -->
            </section>
            <!-- right col -->
          </div>
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->