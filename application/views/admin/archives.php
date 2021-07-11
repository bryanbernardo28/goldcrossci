
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Archives
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Archives</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Archives</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Applied</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($applicants){
                                    foreach($applicants as $applicantIndex => $applicant){
                                        
                            ?>
                            <tr>
                                <td><?=$applicant['firstname']?></td>
                                <td><?=$applicant['lastname']?></td>
                                <td><?=(strtolower($applicant['gender']) == "m" ? "Male" : "Female")?></td>
                                <td><?=$applicant['category']?></td>
                            </tr>
                            <?php
                                }}
                            ?>
                                
                            </tbody>
                        </table>
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