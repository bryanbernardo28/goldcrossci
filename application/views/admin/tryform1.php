<!DOCTYPE html>
<html lang="en">
<head>
  <title>Performance Evaluation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap-4.3/css/bootstrap.min.css')?>" >
 
</head>
<body>

  <div class="container justify-content-center" style="margin-bottom:0">
  <div class="media">
  <div class="media-body">
   <center><img src="gc.jpg" class="img-fluid" alt="Responsive image"></center> 
   <center><p>Unit D - Colorado Apartments, 1334 Felipe Agoncillo Street, Ermita, Manila </p></center>  <h3 style="text-align: center;"><b>Performance Evaluation</b></h3>
  </div>
</div>
</div>
<br>

  <div class="container">
<form action="<?=base_url('admin/submit_eval/').$userinfo->user_id?>" method="POST">
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
   <table width="80%" border="1" style="text-align:center;" align="center">
   	<p style="padding-left: 110px;"><b>A. Ability</b></p>
   <tr>
     <td width="5%"><input type="radio" name="A" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Extremely capable. Excellent Ability.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Capable, high degree of skillsand knowledge.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Knows his/her job well; but does not always apply his/her job.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="A" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Fair, Rarely applies his/her ability.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

  <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>B. Reliability</b></p>
   <tr>
     <td width="5%"><input type="radio" name="B" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very relliable under the most difficult situations.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Reliable and rarely makes mistakes, Rarely lets you down.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Reliable most of the time but occasionally lets you down.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="B" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Unreliable. Let you down too often.
     </td>
   </tr>

   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>C. Cooperation</b></p>
   <tr>
     <td width="5%"><input type="radio" name="C" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Gives excellent cooperation and is very good in getting the job done.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="C" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good. Gives and gets good cooperation. A good team.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="C" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Cooperates most of the time but at times tends to be not cooperative.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>


    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>D. Leadership</b></p>
   <tr>
     <td width="5%"><input type="radio" name="D" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent Leader. Obtains the very best people.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Dependable Leader. Good motivator
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      A good leader but ocassioally requires guidance to be a leader.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="D" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not a good leader. Has difficulty in getting the best of him/her.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>
  

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>E. Responsibility</b></p>
   <tr>
     <td width="5%"><input type="radio" name="E" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Exceptionally responsible. willing to accept more responsibility.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Accepts his/her present responsibilities willinglyand carries them out satisfactorily
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not a good leader. Has difficulty in getting the best of him/her.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="E" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">      
      Unwilling to accept responsibility if possible.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>F. Motivation</b></p>
   <tr>
     <td width="5%"><input type="radio" name="F" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very Motivated and is excellent at motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Well motivated and is able in motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Motivate most of the time. Could motivate himself and others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="F" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not very motivated. Is not good at motivating others as he/she should be.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>G. Attendance</b></p>
   <tr>
     <td width="5%"><input type="radio" name="G" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent Attendance. Rarely absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good attendance. Not often absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="2"> 2 
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Occasionally absent or late.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="G" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Quite often absent. Quite often late.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>H. General Behavior</b></p>
   <tr>
     <td width="5%"><input type="radio" name="H" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Excellent. Nevercauses touble. Gives full cooperation.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Good. Well behaved and cooperative.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Behaves satisfactorily most of the time.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="H" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Unsatisfactory. Falls short on required standard.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>I. Initiative</b></p>
   <tr>
     <td width="5%"><input type="radio" name="I" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Very Motivated and is excellent at motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Well motivated and is able in motivating others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Motivate most of the time. Could motivate himself and others.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="I" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Not very motivated. Is not good at motivating others as he/she should be.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea>

    <br>
  <table width="80%" border="1" style="text-align:center;" align="center">
    <p style="padding-left: 110px;"><b>J. Work Attitude</b></p>
   <tr>
     <td width="5%"><input type="radio" name="J" value="4"> 4
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Extraordinary enthusiastic about his job. Takes pride in all his/her assignments.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="3"> 3
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Has open mind of instruction and criticism. is very enthusiastic about his job.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="2"> 2
     </td>
     
     <td style="text-align:left;padding-left:5px;">
       Shows normal interest in his job. all that is ordinarily expected.
     </td>
   </tr>

   <tr>
     <td width="5%"><input type="radio" name="J" value="1"> 1
     </td>
     
     <td style="text-align:left;padding-left:5px;">
      Is oftern indifferent to instructions and criticisms. Shows no willingness to improve.
     </td>
   </tr>
   
   </table><br>

    <label>Remarks</label>
    <textarea  input type="text" class="form-control"  placeholder="Type your remarks here" ></textarea><br>

    <div class="container">
    <input type="submit" style="border-bottom-right-radius: 5px"  class="btn btn-info" value="Submit ">
  </div>

</div>

<br>
<br>
  <script src="<?=base_url('assets/bootstrap-4.3/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/bootstrap-4.3/js/popper.min.js')?>"></script>
  <script src="<?=base_url('assets/bootstrap-4.3/js/bootstrap.min.js')?>"></script>
</body>
</html>





