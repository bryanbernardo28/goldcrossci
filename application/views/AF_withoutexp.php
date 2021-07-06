<html>
<head>
<title>Application Form</title>
<style>
h3
{
font-family: Verdana; 
font-size: 25pt; 
font-style: normal; 
font-weight: bold; 
color:red;
text-align: center; 
}
</style>
</head>
<body>
<h3>Application Form</h3>

<h2>Personal Data</h2>
<p>First Name: <?=$apd_info["first_name"]?></p>
<p>Maternal Name: <?=$apd_info["maternal_name"]?></p>
<p>Last Name: <?=$apd_info["family_name"]?></p>
<p>Gender: <?=$apd_info["gender"]?></p>
<p>Date of Birth: <?=$apd_info["date_of_birth"]?></p>
<p>Age: <?=$apd_info["age"]?></p>
<p>Civil Status: <?=$apd_info["civil_status"]?></p>
<p>Address: <?=$apd_info["city_address"]?></p>
<p>Date of Application: <?=$apd_info["date_of_application"]?></p>
<p>Security License No.: <?=$apd_info["security_license_no"]?></p>
<p>Military/Police Service Record: <br>
<?php
foreach ($apd_info["service_record[]"] as $val) {
	echo $val."<br>";
}
?>
</p>
<p>Applied Position: <?=$apd_info["category"]?></p>

<h2>Education</h2>
<p>Elementary: <?=$ae_info["elementary"]?></p>
<p>Date Graduated: <?=$ae_info["e_date_graduated"]?></p>
<p>Highschool: <?=$ae_info["highschool"]?></p>
<p>Date Graduated: <?=$ae_info["h_date_graduated"]?></p>
<p>College: <?=$ae_info["college"]?></p>
<p>Date Graduated: <?=$ae_info["c_date_graduated"]?></p>
<p>Post Grad: <?=$ae_info["post_grad"]?></p>
<p>Date Graduated: <?=$ae_info["pg_date_graduated"]?></p>
<p>Special Course: <?=$ae_info["special_course"]?></p>
<p>Date Graduated: <?=$ae_info["sc_date_graduated"]?></p>
<p>Licensure Exams Token: <?=$ae_info["licensure_exams_token"]?></p>
<p>Date Taken: <?=$ae_info["date_taken"]?></p>
<p>Rating: <?=$ae_info["rating"]?></p>
<p>OFFICE MACHINE/EQUIPMENT/VEHICLE OPERATED: <br> 

<?php
foreach ($ae_info["machine_operated[]"] as $val) {
	echo $val."<br>";

}
?>	
</p>



</body>
</html>