<div class="container">
  <div class="col-md-12">
    
  
<form action="<?=base_url('admin/p_evaluation/').$userinfo->user_id?>" method="POST">
<table border="1" width="80%" style="" align="center">
    <tr>
     
    <td>
      <input type="text" class="form-control"  placeholder="Name of Employee :" value="<?=$userinfo->firstname.' '.$userinfo->lastname?>"> 
    </td>
    <td colspan="2">
      <input type="text" class="form-control" placeholder="Period Covered :" value="<?=date('M j, Y',$userinfo->ec_date_hired)?>">
    </td>
    </tr>

    <td>
      <input type="text" class="form-control" id="inputEmail3" placeholder="Job Title :" value="<?=$userinfo->position?>">
      </td>
    <td>
      <input type="text" class="form-control" id="inputEmail3" placeholder="Date Evaluation :">
    </td>

    
    <tr>
     
    <td colspan="2">
      <input type="text" class="form-control"  placeholder="Department :">
    </td>
    <!-- <td colspan="2">
      <input type="text" class="form-control" placeholder="Total Points :">
    </td> -->
    </tr>
</table>

	 <br>
   <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('A'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
   	<p style="padding-left: 110px;"><b>A. Ability </b></p>
   <tr>
     <td width="5%"><input type="radio" name="A" value="4" <?=set_value('A') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Extremely capable. Excellent Ability.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="3" <?=set_value('A') == "3" ? "checked" : "" ?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Capable, high degree of skillsand knowledge.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="2" <?=set_value('A') == "2" ? "checked" : "" ?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Knows his/her job well; but does not always apply his/her job.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="1" <?=set_value('A') == "1" ? "checked" : "" ?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Fair, Rarely applies his/her ability.
     </td>
   </tr>
   
   </table>
   <center><?=form_error('A','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('B'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>B. Reliability</b></p>
   <tr>
     <td width="5%"><input type="radio" name="B" value="4" <?=set_value('B') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very relliable under the most difficult situations.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="3" <?=set_value('B') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Reliable and rarely makes mistakes, Rarely lets you down.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="2" <?=set_value('B') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Reliable most of the time but occasionally lets you down.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="1" <?=set_value('B') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Unreliable. Let you down too often.
     </td>
   </tr>
   </table>
   <center><?=form_error('B','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('C'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>C. Cooperation</b></p>
   <tr>
     <td width="5%"><input type="radio" name="C" value="3" <?=set_value('C') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Gives excellent cooperation and is very good in getting the job done.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="C" value="2" <?=set_value('C') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good. Gives and gets good cooperation. A good team.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="C" value="1" <?=set_value('C') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Cooperates most of the time but at times tends to be not cooperative.
     </td>
   </tr>
   </table>
   <center><?=form_error('C','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('D'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>D. Leadership</b></p>
   <tr>
     <td width="5%"><input type="radio" name="D" value="4" <?=set_value('D') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent Leader. Obtains the very best people.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="3" <?=set_value('D') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Dependable Leader. Good motivator
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="2" <?=set_value('D') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      A good leader but ocassioally requires guidance to be a leader.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="1" <?=set_value('D') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not a good leader. Has difficulty in getting the best of him/her.
     </td>
   </tr>
   </table>
   <center><?=form_error('D','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('E'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>E. Responsibility</b></p>
   <tr>
     <td width="5%"><input type="radio" name="E" value="4" <?=set_value('E') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Exceptionally responsible. willing to accept more responsibility.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="3" <?=set_value('E') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Accepts his/her present responsibilities willinglyand carries them out satisfactorily
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="2" <?=set_value('E') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not a good leader. Has difficulty in getting the best of him/her.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="1" <?=set_value('E') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">      
      Unwilling to accept responsibility if possible.
     </td>
   </tr>
   </table>
   <center><?=form_error('E','<span style="color:red;">','</span>')?></center>
   <br>


  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('F'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>F. Motivation</b></p>
   <tr>
     <td width="5%"><input type="radio" name="F" value="4" <?=set_value('F') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very Motivated and is excellent at motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="3" <?=set_value('F') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Well motivated and is able in motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="2" <?=set_value('F') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Motivate most of the time. Could motivate himself and others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="1" <?=set_value('F') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not very motivated. Is not good at motivating others as he/she should be.
     </td>
   </tr>
   </table>
   <center><?=form_error('F','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('G'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>G. Attendance</b></p>
   <tr>
     <td width="5%"><input type="radio" name="G" value="4" <?=set_value('G') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent Attendance. Rarely absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="3" <?=set_value('G') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good attendance. Not often absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="2" <?=set_value('G') == "2" ? "checked" :  ""?>> 2 
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Occasionally absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="1" <?=set_value('G') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Quite often absent. Quite often late.
     </td>
   </tr>
   </table>
   <center><?=form_error('G','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('H'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>H. General Behavior</b></p>
   <tr>
     <td width="5%"><input type="radio" name="H" value="4" <?=set_value('H') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent. Nevercauses touble. Gives full cooperation.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="3" <?=set_value('H') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good. Well behaved and cooperative.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="2" <?=set_value('H') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Behaves satisfactorily most of the time.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="1" <?=set_value('H') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Unsatisfactory. Falls short on required standard.
     </td>
   </tr>
   </table>
   <center><?=form_error('H','<span style="color:red;">','</span>')?></center>
   <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('I'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>I. Initiative</b></p>
   <tr>
     <td width="5%"><input type="radio" name="I" value="4" <?=set_value('I') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very Motivated and is excellent at motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="3" <?=set_value('I') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Well motivated and is able in motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="2" <?=set_value('I') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Motivate most of the time. Could motivate himself and others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="1" <?=set_value('I') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not very motivated. Is not good at motivating others as he/she should be.
     </td>
   </tr>
   </table>
   <center><?=form_error('I','<span style="color:red;">','</span>')?></center>
  <br>

  <table width="80%" border="1" bordercolor="<?php if(!empty(form_error('J'))): ?> #ff0000 <?php endif?>" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>J. Work Attitude</b></p>
   <tr>
     <td width="5%"><input type="radio" name="J" value="4" <?=set_value('J') == "4" ? "checked" :  ""?>> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Extraordinary enthusiastic about his job. Takes pride in all his/her assignments.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="3" <?=set_value('J') == "3" ? "checked" :  ""?>> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Has open mind of instruction and criticism. is very enthusiastic about his job.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="2" <?=set_value('J') == "2" ? "checked" :  ""?>> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Shows normal interest in his job. all that is ordinarily expected.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="1" <?=set_value('J') == "1" ? "checked" :  ""?>> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Is oftern indifferent to instructions and criticisms. Shows no willingness to improve.
     </td>
   </tr>
   
   </table>
   <center><?=form_error('J','<span style="color:red;">','</span>')?></center>
   <br>

    <input type="submit" class="btn btn-info float-right" value="Submit ">
  </form>
  </div>
  </div>