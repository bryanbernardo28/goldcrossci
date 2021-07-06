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
        <center><h3>List of Current Employees</h3></center>
      </div>
    </div>
    <div class="row justify-content-center mt-4" id="table_datas">
      <div class="col-md-10">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Gender</th>
         
          </tr>
          </thead>
          <tbody>
          <?php if ($employees): ?>
            <?php foreach ($employees as $employees_value): ?>
              <tr>
                <td><?= $employees_value->firstname ?></td>
                <td><?= $employees_value->lastname ?></td>
                <td><?= $employees_value->address ?></td>
                <td><?= $employees_value->gender == 1 ? "Male" : "Female" ?></td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>


  <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

  <script src="<?=base_url()?>/assets/bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>