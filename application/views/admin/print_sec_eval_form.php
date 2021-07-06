
  
<div class="container">
<table border="1" width="80%" style="" align="center">
    <tr>
     
    <td colspan="3">
      <span><?=$evaluated_info->firstname.' '.$evaluated_info->lastname?></span>
    </td>
    </tr>
    
    <tr>
    </tr>
    
    <tr>
     
    <td>
      <span><?=$jp_evals->jp_evaluator?></span>
    </td>
    <td colspan="2">
      <span><?=$evaluated_info->ec_branch?></span>
    </td>
    </tr>
</table>

   <table width="70%" style="" align="center">
   <tr>
     <td width="10%"><br>
     <b>Rating Scale</b> 
     </td>
     <td><br>
      <b>5 Outstanding:</b> Performance is consistently far superior to what is normally expected.<br>
      <b>4 Exceeds Expectations:</b> Performance demonstrates increased profieciency expectations.<br>
      <b>3 Meets Expectation:</b> Performance meets expectatios and shows no significant problem.<br>
      <b>2 Below Expectations:</b> Performance is below expectations and significant problems exist.<br>
      <b>1 Unsatisfactory:</b> Performance is consistently unacceptable.<br>
      <b>0 Not Applicable</b>
     </td>
   </tr>
   </table>
</div>
<br>
<h4 style="text-align: center;">JOB PERFORMANCE</h4>

<div class="container">
   <br>
   
    <?php if ($evaluation): ?>
      <?php $question_number = 0; ?>
      <?php foreach ($evaluation as $category => $evaluation_value): ?>
        <table width="80%" border="1" style="text-align:center;" align="center">
        <p style="padding-left: 110px;"><b><?= $category ?></b></p>
        <tr>
          <td width="3%">0</td>
          <td width="3%">1</td>
          <td width="3%">2</td>
          <td width="3%">3</td>
          <td width="3%">4</td>
          <td width="3%">5</td>
          <td style="text-align:left;"></td>
        </tr>
        
            
        <?php foreach ($evaluation_value as $question_id => $question): ?>
          <?php $question_number++; ?>
          <?php  
          $r0 = $jp_offense["q".$question_id]["rate"] == "0" ? "checked" :  "";
          $r1 = $jp_offense["q".$question_id]["rate"] == "1" ? "checked" :  "";
          $r2 = $jp_offense["q".$question_id]["rate"] == "2" ? "checked" :  "";
          $r3 = $jp_offense["q".$question_id]["rate"] == "3" ? "checked" :  "";
          $r4 = $jp_offense["q".$question_id]["rate"] == "4" ? "checked" :  "";
          $r5 = $jp_offense["q".$question_id]["rate"] == "5" ? "checked" :  "";
          ?>
          <tr>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="0" <?= $r0 ?>>
            </td>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="1" <?= $r1 ?>>
            </td>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="2" <?= $r2 ?>>
            </td>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="3" <?= $r3 ?>>
            </td>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="4" <?= $r4 ?>>
            </td>
            <td width="3%">
              <input type="radio" name="q<?=$question_id?>" value="5" <?= $r5 ?>>
            </td>
            <td style="text-align:left;padding-left:5px;"><?= $question_number.". ".$question .form_error('q<?=$question_number?>')?></td>
            <?php
            if ($jp_offense["q".$question_id]["has_offense"]) {
            ?>
            <td>
              <ul>
              <?php
              $offense = json_decode($jp_offense["q".$question_id]["offense"]);

              foreach ($offense as $value) {
              ?>
              
                <li><?=$value?></li>
                
              <?php
              }
              ?>
              </ul>
            </td>
            <?php
            }
            ?>
          </tr>
        <?php endforeach ?>
        </table><br><br>
      <?php endforeach ?>
      
    <?php endif ?>
  

<br>
<br>
</form>
</div>

