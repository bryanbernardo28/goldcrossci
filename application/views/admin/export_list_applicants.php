<!DOCTYPE html>
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
        <center><h3>List of Applicants</h3></center>
      </div>
    </div>
    <div class="row justify-content-center mt-4" id="table_datas">
      <div class="col-md-10">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <!-- <th>Address</th> -->
            <th>Gender</th>
            <th>Position Applied</th>
          </tr>
          </thead>
          <tbody>
            <?php
            if ($applicant) {
            foreach($applicant as $exp_acc):
            ?>
            <tr>
              <td><?=$exp_acc["firstname"]?></td>
              <td><?=$exp_acc["lastname"]?></td>
              <!-- <td><?=$exp_acc["address"]?></td> -->
              <td><?=$exp_acc["gender"] == "Male" ? "Male" : "Female"?></td>
              <td><?=$exp_acc["category"]?></td>
            </tr>
            
            <?php
            endforeach;
            }
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