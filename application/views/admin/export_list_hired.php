<!DOCTYPE html>
<?php date_default_timezone_set("Asia/Manila"); ?>
<html>
<head>
  <title></title>
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap4/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div class="container-fluid" id="chart_datas">
    <img src="D:\xampp\htdocs\goldcross\assets\images\header.jfif" width="1000px" height="129">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <center><h3>List of Hired Applicants</h3></center>
      </div>
    </div>
    <div class="row justify-content-center mt-4" id="table_datas">
      <div class="col-md-10">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Applied Position</th>
            <th>Date Hired</th>
          </tr>
          </thead>

          <tbody>
            <?php
              if ($remarks) {
                foreach ($remarks as $remarks_value) {
                  $apdata = json_decode($remarks_value->applicant_personal_data,true);
            ?>
            <tr>
              <td><?=$apdata["first_name"]?></td>
              <td><?=$apdata["family_name"]?></td>
              <td><?=$apdata["gender"]?></td>
              <td><?=$apdata["category"]?></td>
              <td><?=date("M d, Y",$remarks_value->date_hired)?></td>
            </tr>
           

               
         
            <?php
              }}
            ?>
            
          </tbody>
        </table>
      </div>
    </div>
    
  </div>


  <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

  <script src="<?=base_url()?>/assets/bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>