<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">No. of Employees</span>
              <span class="info-box-number"><?= $emp_cnt ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">No. of Applicants</span>
              <span class="info-box-number"><?= $client_cnt ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
        <div class="col-md-12">
         
           
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Top 5 Performing Applicants</h3>

              <!-- <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class='table table-bordered table-hover'>
                  <thead>
                    <tr>
                      <th>Rank</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Position</th>
                      <th>Grade (Total Points)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($top): ?>
                      <?php foreach ($top as $rank => $top_value): $rank++; ?>
                        <tr>
                          <td><?= $rank ?></td>
                          <td><?= $top_value->firstname ?></td>
                          <td><?= $top_value->lastname ?></td>
                          <td><?= $top_value->position ?></td>
                          <td><?= $top_value->total_points ?></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->