<div class="container">
  <div class="col-md-12">
<form action="<?=base_url('admin/p_evaluation/'.$userinfo->user_id)?>" method="POST">
  <table border="1" width="80%" style="" align="center" class="mb-3">
    <tr>
     
    <td>
      <input type="text" class="form-control"  placeholder="Name of Employee :" value="<?=$userinfo->firstname.' '.$userinfo->lastname?>"> 
    </td>
    <!-- <td colspan="2">
      <input type="text" class="form-control" placeholder="Period Covered :" value="<?=date('M j, Y',$userinfo->ec_date_hired)?>">
    </td> -->
    <td>
      <input type="text" class="form-control" id="inputEmail3" placeholder="Job Title :" value="<?=$userinfo->position?>">
      </td>
    </tr>

    
    <td>
      <input type="text" class="form-control" id="inputEmail3" placeholder="Date Evaluation :">
    </td>
<td colspan="2">
      <input type="text" class="form-control"  placeholder="Department :">
    </td>
    
    <tr>
     
    
    <!-- <td colspan="2">
      <input type="text" class="form-control" placeholder="Total Points :">
    </td> -->
    </tr>
</table>
<?php if ($category_question): ?>
  <?php $i = 1; ?>
  <?php foreach ($category_question as $category_question_key => $category_question_value): ?>
    <?php $input_name = preg_replace('/\s+/', '|', strtolower($category_question_key)); ?>
    <div class="row mb-3">
      <div class="col-md-12">
        <table width="80%" border="1" bordercolor="<?php if(!empty(form_error("$input_name"))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">

            <p style="padding-left: 110px;">
              <b><?=$i.".".$category_question_key?></b> 
              <?=form_error("$input_name","<span style='color:red;'>(",")</span>")?>
            </p>
            <?php foreach ($category_question_value as $question_number_points => $question): ?>
              <?php  
              $number = explode("|",$question_number_points)[0];
              $points = explode("|",$question_number_points)[1];
              $is_checked = set_value($input_name) == $points ? "checked" : "";
              ?>
              <tr>
                <td width="5%"><input type="radio" name="<?=$input_name?>" value="<?=$points?>" <?= $is_checked ?>> <?=$number?></td>
                <td style="text-align:left;padding-left:5px;">
                  <?= $question?>
                </td>
              </tr>
            <?php endforeach ?>
        </table>
      </div>
    </div>
    <br>
    <?php $i++; ?>
  <?php endforeach ?>
<?php endif ?>
  
    <button type="submit" class="btn btn-info float-right">Submit</button>
  </form>
  </div>
  </div>