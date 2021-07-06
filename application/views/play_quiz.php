<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gold Cross Assessment Exam</title>

</head>
<body>

<div id="container" align="center">
    <h1>Start the exam!</h1>
    
    <form method="post" action="<?php echo base_url();?>/Questions/resultdisplay">
       
    
    <?php foreach($questions as $row) { ?>
    
    <?php $ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->choice4, $row->answer);
    // shuffle($ans_array); ?>
    
    <p><?=$row->quiz_id?>.<?=$row->question?></p>
    
    <input type="radio" name="quizid<?=$row->quiz_id?>" value="<?=$ans_array[0]?>" required> <?=$ans_array[0]?><br>
    <input type="radio" name="quizid<?=$row->quiz_id?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
    <input type="radio" name="quizid<?=$row->quiz_id?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
    <input type="radio" name="quizid<?=$row->quiz_id?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>

    
    <?php } ?>
    
    <br><br>
    <input type="submit" value="Submit!">
    
    </form>
    
</div>

</body>
</html>