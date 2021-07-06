<!DOCTYPE html>
<?php date_default_timezone_set("Asia/Manila"); ?>
<html>
<head>
  <title>Graph</title>
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap4/css/bootstrap.min.css')?>">
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center mt-2">
      <div class="col-md-7" align="center">
        <img src="D:\xampp\htdocs\goldcross\assets\images\header.jfif" width="900px" height="129">
        <!-- <img src="<?='data:image/png;base64,'.base64_encode(base_url('assets/images/header.jfif'))?>" width="900px" height="129px"> -->
        <br>
        <table class="table table-bordered">
          <tr>
            <td><strong>Name: </strong><?=$user->firstname." ".$user->lastname?></td>
            <td><strong>Evaluation Date: </strong><?=date('F j, Y',$user->evaluation_date)?></td>
          </tr>
          <tr>
            <td><strong>Company:</strong><?=$user->cc_name?></td>
            <td><strong>Print Date: </strong><?=date('F j, Y h:i A',time())?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row justify-content-center mb-2 mt-4">
      <div class="col-md-12">
        <center>
          <img src="<?=$graph_name?>" width="1100">
        </center>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4 col-centered">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Total Points: </td>
              <td><?=$user->total_points?></td>
            </tr>
            <tr>
              <td>Adjective Rating:</td>
              <td><?=$user->rating_adjective?></td>
            </tr>
            <tr>
              <td>Descriptive Rating:</td>
              <td><?=$user->rating_descriptive?></td>
            </tr>
            <tr>
              <td>Salary Increase:</td>
              <td><?=$user->increase?>%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>