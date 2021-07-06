<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
                <!-- <?php
                if (validation_errors()) {
                    echo validation_errors();
                }
                ?>  -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs">
                 <li class="active">
                    <a href="#tab1" class="steps" data-toggle="tab">Personal Data</a></li>
                    <!-- <li><a href="#tab2" class="steps" data-toggle="tab">Additional Data</a></li> -->
                    <li><a href="#tab3" class="steps" data-toggle="tab">Education</a></li>
                    <li><a href="#tab4" class="steps" data-toggle="tab">Employment Record</a></li>
                    <li><a href="#tab5" class="steps" data-toggle="tab">Seminars / Training Attended</a></li>
                    <!-- <li><a href="#tab6" class="steps" data-toggle="tab">General Information</a></li>
                    <li><a href="#tab7" class="steps" data-toggle="tab">Other Information</a></li> -->
                   <!--  <li><a href="#tab8" class="steps" data-toggle="tab">Instruction</a></li> -->
                </ul>
                <form method="POST" action="<?=base_url('applicant/application_form')?>">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-md-3 <?php if(!empty(form_error('family_name'))): ?> has-error <?php endif?>">
                                    <label for="family_name" class="control-label" style="font-size: 14px;">FAMILY NAME</label>
                                    <div>
                                        <input class="form-control"  name="family_name" placeholder="Family Name" value="<?=set_value('family_name');?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('first_name'))): ?> has-error <?php endif?>">
                                    <label for="first_name" class="control-label" style="font-size: 14px;">FIRST NAME</label>
                                    <div>
                                        <input class="form-control" name="first_name" placeholder="First Name" value="<?=set_value('first_name');?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('qualifier'))): ?> has-error <?php endif?>">
                                    <label for="qualifier" class="control-label" style="font-size: 14px;">QUALIFIER</label>
                                    <div>
                                        <input class="form-control" name="qualifier" placeholder="Qualifier" value="<?=set_value('qualifier');?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('maternal_name'))): ?> has-error <?php endif?>">
                                    <label for="maternal_name" class="control-label" style="font-size: 14px;">MATERNAL NAME</label>
                                    <div>
                                        <input class="form-control" name="maternal_name" placeholder="Maternal Name" value="<?=set_value('maternal_name');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 <?php if(!empty(form_error('date_of_application'))): ?> has-error <?php endif?>">
                                    <label for="city_address" class="control-label">Date Of Application</label>
                                    <div class="form-group">
                                        <div class='input-group date' id='date_of_application'>
                                            <input type='text' class="form-control" name="date_of_application" >
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('gender'))): ?> has-error <?php endif?>">
                                    <label for="city_contact_no" class="control-label">GENDER</label>
                                    <select class="form-control" name="gender" >
                                      <option>Male</option>
                                      <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('civil_status'))): ?> has-error <?php endif?>">
                                    <label for="city_contact_no" class="control-label">CIVIL STATUS</label>
                                    <select class="form-control" name="civil_status">
                                      <option>SINGLE</option>
                                      <option>MARRIED</option>
                                      <option>SEPARATED</option>
                                      <option>OTHERS</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('religion'))): ?> has-error <?php endif?>">
                                    <label for="city_contact_no" class="control-label">RELIGION</label>
                                    <input type="text" class="form-control" name="religion" placeholder="Religion" value="<?=set_value('religion');?>">
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('citizenship'))): ?> has-error <?php endif?>">
                                    <label for="city_contact_no" class="control-label">CITIZENSHIP</label>
                                    <input type="text" class="form-control" name="citizenship" placeholder="Citizenship" value="<?=set_value('citizenship');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 <?php if(!empty(form_error('date_of_birth'))): ?> has-error <?php endif?>">
                                    <label for="provincial_address" class="control-label">DATE OF BIRTH</label>
                                    <div class="form-group">
                                        <div class='input-group date' id='date_of_birth'>
                                            <input type='text' class="form-control" name="date_of_birth">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('place_of_birth'))): ?> has-error <?php endif?>">
                                    <label for="provincial_contact_no" class="control-label">PLACE OF BIRTH</label>
                                    <input type="text" class="form-control" name="place_of_birth" placeholder="Place of birth" value="<?=set_value('place_of_birth');?>">
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('age'))): ?> has-error <?php endif?>">
                                    <label for="provincial_contact_no" class="control-label">AGE</label>
                                    <input type="text" class="form-control" name="age" placeholder="Age" value="<?=set_value('age');?>">
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('height'))): ?> has-error <?php endif?>">
                                    <label for="provincial_contact_no" class="control-label">HEIGHT</label>
                                    <input type="text" class="form-control" name="height" placeholder="Height" value="<?=set_value('height');?>">
                                </div>
                                <div class="form-group col-md-2 <?php if(!empty(form_error('weight'))): ?> has-error <?php endif?>">
                                    <label for="provincial_contact_no" class="control-label">WEIGHT</label>
                                    <input type="text" class="form-control" name="weight" placeholder="Weight" value="<?=set_value('weight');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9 <?php if(!empty(form_error('city_address'))): ?> has-error <?php endif?>">
                                    <label for="birthday" class="control-label">CITY ADDRESS</label>
                                    <input type="text" class="form-control" name="city_address" placeholder="City address" value="<?=set_value('city_address');?>">
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('contact_no'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">CONTACT NO.</label>
                                    <input type="text" class="form-control" name="contact_no" placeholder="Contact Number" value="<?=set_value('contact_no');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9 <?php if(!empty(form_error('provincial_address'))): ?> has-error <?php endif?>">
                                    <label for="birthday" class="control-label">PROVINCIAL ADDRESS</label>
                                    <input type="text" class="form-control" name="provincial_address" placeholder="Provincial address" value="<?=set_value('provincial_address');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>FOR SECURITY PERSONNEL APPLICANTS ONLY</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 <?php if(!empty(form_error('security_license_no'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">SECURITY LICENSE NO.</label>
                                    <input type="text" class="form-control" name="security_license_no" placeholder="Security License No." value="<?=set_value('security_license_no');?>">
                                </div>
                                <div class="form-group col-md-4 <?php if(!empty(form_error('expiration_date'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">EXPIRATION DATE</label>
                                    <div class="form-group">
                                        <div class='input-group date' id='expiration_date'>
                                            <input type='text' class="form-control" name="expiration_date"value="<?=set_value('expiration_date');?>">
                                            <span class="input-group-addon" >
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 <?php if(!empty(form_error('provincial_address'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">CATEGORY</label>
                                    <select class="form-control" name="category">
                                      <option>SECURITY GUARD</option>
                                      <option>SECURITY OFFICER</option>
                                      <option>PRIVATE DETECTIVE</option>
                                      <option>CONSULTANT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <p><strong>MILITARY/POLICE SERVICE RECORD [CHECK BOX IF ANY]</strong></p>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="MILITARY OFFICER">MILITARY OFFICER</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="PNP-OFFICER">PNP-OFFICER</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="ROTC-BASIC">ROTC-BASIC</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="MILITARY-ENLISTED">MILITARY-ENLISTED</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="PNP-ENLISTED">PNP-ENLISTED</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="service_record[]" value="ROTC ADVANCE">ROTC ADVANCE</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3 <?php if(!empty(form_error('security_training'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">SECURITY TRAINING<br>TRAINING SCHOOL/ADDRESS</label>
                                    <input type="text" class="form-control" name="security_training" placeholder="SECURITY TRAINING" value="<?=set_value('security_training');?>">
                                </div>

                                <!-- <div class="form-group col-md-4">
                                    <label for="place_of_birth" class="control-label">COURSE TAKEN<br> PERIOD COVERED</label>
                                    <input type="text" class="form-control" name="period_covered" placeholder="PERIOD COVERED">
                                </div> -->
                            </div>
                        </div>
                        <a class="btn btn-primary btnNext" >Next</a>
                        
                    </div>

                    
                    <div class="tab-pane" id="tab3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-md-3 <?php if(!empty(form_error('elementary'))): ?> has-error <?php endif?>" >
                                     <label for="School_Address" class="control-label" style="font-size: 16px;">SCHOOL/ADDRESS</label>
                                        <div>
                                            <input class="form-control"  name="elementary" placeholder="Elementary" value="<?=set_value('elementary');?>">
                                        </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('e_course_major'))): ?> has-error <?php endif?>">
                                    <label for="Course_Major" class="control-label" style="font-size: 16px;">COURSE/MAJOR</label>
                                    <div>
                                        <input class="form-control" name="e_course_major" placeholder="Grade School" value="<?=set_value('e_course_major');?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Honor/Awards" class="control-label" style="font-size: 16px;">HONOR/AWARDS</label>
                                    <div>
                                        <input class="form-control" name="e_honor_awards" placeholder="Honor/Awards" value="<?=set_value('e_honor_awards');?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('e_date_graduated'))): ?> has-error <?php endif?>">
                                    <label for="city_address" class="control-label">DATE GRADUATED</label>
                                    <div class="form-group">
                                        <div class='input-group date' id='e_date_graduated'>
                                            <input type='text' class="form-control" name="e_date_graduated" placeholder="Date graduated">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-md-3 <?php if(!empty(form_error('highschool'))): ?> has-error <?php endif?>">
                                            <label for="School_Address" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control"  name="highschool" placeholder="High School" value="<?=set_value('highschool');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 <?php if(!empty(form_error('h_course_major'))): ?> has-error <?php endif?>">
                                            <label for="Course_Major" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="h_course_major" placeholder="Highschool" value="<?=set_value('h_course_major');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="h_honor_awards" placeholder="Honor/Awards" value="<?=set_value('h_honor_awards');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 <?php if(!empty(form_error('h_date_graduated'))): ?> has-error <?php endif?>">  
                                            <div class="form-group">
                                                <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                                <div class='input-group date' id='h_date_graduated'>
                                                    <input type='text' class="form-control" name="h_date_graduated" placeholder="Date graduated">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group col-md-3 <?php if(!empty(form_error('college'))): ?> has-error <?php endif?>">
                                        <label for="School_Address" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control"  name="college" placeholder="College" value="<?=set_value('college');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 <?php if(!empty(form_error('c_course_major'))): ?> has-error <?php endif?>">
                                            <label for="Course_Major" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="c_course_major" placeholder="Course/Major" value="<?=set_value('c_course_major');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="c_honor_awards" placeholder="Honor/Awards" value="<?=set_value('c_honor_awards');?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 <?php if(!empty(form_error('c_date_graduated'))): ?> has-error <?php endif?>">  
                                            <div class="form-group">
                                                <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                                <div class='input-group date' id='c_date_graduated'>
                                                    <input type='text' class="form-control" name="c_date_graduated" placeholder="Date graduated">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="School_Address" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control"  name="post_grad" placeholder="Post Grad" value="<?=set_value('post_grad');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Course_Major" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="pg_course_major" placeholder="Course/Major" value="<?=set_value('pg_course_major');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                            <div>
                                                <input class="form-control" name="pg_honor_awards" placeholder="Honor/Awards" value="<?=set_value('pg_honor_awards');?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 <?php if(!empty(form_error('pg_date_graduated'))): ?> has-error <?php endif?>">  
                                            <div class="form-group">
                                                <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                                <div class='input-group date' id='pg_date_graduated'>
                                                    <input type='text' class="form-control" name="pg_date_graduated" placeholder="Date graduated">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                    <div class="form-group col-md-3">
                                                     <label for="School_Address" class="control-label" style="font-size: 16px;"></label>
                                                    <div>
                                                        <input class="form-control"  name="special_course" placeholder="Special Course" value="<?=set_value('special_course');?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="Course_Major" class="control-label" style="font-size: 16px;"></label>
                                                    <div>
                                                        <input class="form-control" name="sc_course_major" placeholder="Course/Major" value="<?=set_value('sc_course_major');?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                                    <div>
                                                        <input class="form-control" name="sc_honor_awards" placeholder="Honor/Awards" value="<?=set_value('sc_honor_awards');?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 <?php if(!empty(form_error('sc_date_graduated'))): ?> has-error <?php endif?>">  
                                                    <div class="form-group">
                                                        <label for="Honor/Awards" class="control-label" style="font-size: 16px;"></label>
                                                        <div class='input-group date' id='sc_date_graduated'>
                                                            <input type='text' class="form-control" name="sc_date_graduated" placeholder="Date graduated">
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <!--Scholarship-->
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                         <label for="School_Address" class="control-label" style="font-size: 16px;">Commendations Received</label>
                                            <div>
                                                <input class="form-control"  
                                                name="commendations_received" placeholder="Scholarship/Fellowship">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Course_Major" class="control-label" style="font-size: 16px;">Nature</label>
                                            <div>
                                                <input class="form-control"  name="nature" placeholder="Full/Partial">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Honor/Awards" class="control-label" style="font-size: 16px;">Granted by:</label>
                                            <div>
                                                <input class="form-control" name="granted_by"  placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="Date_Graduate" class="control-label" style="font-size: 16px;">Year</label>
                                            <div>
                                                <input class="form-control" name="year"  placeholder="Year">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Government/Exam Taken-->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                         <label for="School_Address" class="control-label" style="font-size: 16px;">Licensure Exams Token</label>
                                        <div>
                                            <input class="form-control"  name="licensure_exams_token" placeholder="Government/Licensure Exams">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="Course_Major" class="control-label" style="font-size: 16px;">Date Taken:</label>
                                        <div>
                                            <input class="form-control"  name="date_taken" placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Honor/Awards" class="control-label" style="font-size: 16px;">Rating:</label>
                                        <div>
                                            <input class="form-control" name="rating"  placeholder="Rating">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--Language-->
                            <div class="container-fluid">
                                <div class="row">
                                        <div class="form-group col-md-4">
                                         <label for="School_Address" class="control-label" style="font-size: 16px;">Language/Dialects</label>
                                        <div>
                                            <input class="form-control" name="reading"  placeholder="Reading" value="<?=set_value('reading');?>">
                                        </div>
                                        <div>
                                            <input class="form-control" name="speaking"  placeholder="Speaking" value="<?=set_value('speaking');?>">
                                        </div>
                                        <div>
                                            <input class="form-control" name="writing"  placeholder="Writing" value="<?=set_value('writing');?>">
                                        </div>
                                    </div>
                                     <div class="form-group col-md-5">
                                        <p><strong>OFFICE MACHINE/EQUIPMENT/VEHICLE OPERATED</strong></p>
                                    
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="checkbox">
                                                  <label><input type="checkbox" value="FAX MACHINE" name="machine_operated[]">FAX MACHINE</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" value="COPYING MACHINE" name="machine_operated[]">COPYING MACHINE</label>
                                                </div>
                                                <div class="checkbox">
                                                  <label><input type="checkbox" value="ROTC-BASIC" name="machine_operated[]">ROTC-BASIC</label>
                                                </div>
                                            </div>
                                             <div class="col-sm-4">
                                            <div class="checkbox">
                                              <label><input type="checkbox" value="Type Writer" name="machine_operated[]">Type Writer</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" value="PABX" name="machine_operated[]">PABX</label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" value="2-WAY RADIO" name="machine_operated[]">2-WAY RADIO</label>
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                        <div class="checkbox">
                                          <label><input type="checkbox" value="VEHICLE/CAR/VAN/ETC." name="machine_operated[]">VEHICLE/CAR/VAN/ETC.</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" value="MOTORCYCLE" name="machine_operated[]">MOTORCYCLE</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" value="OTHERS" name="machine_operated[]">OTHERS</label>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        
                       <!--  <input type="submit" name="submit" value="Submit"> -->
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                        <a class="btn btn-primary btnNext" >Next</a>
                    </div>
                       
                    <div class="tab-pane" id="tab4">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-lg-4 <?php if(!empty(form_error('name_of_company'))): ?> has-error <?php endif?>">
                                     <label class="radio-inline">
                                      <input type="radio" name="exp" id="inlineRadio1" value="1" checked> With Experience
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="exp" id="inlineRadio2" value="2"> Without Experience
                                    </label>
                                </div>
                                
                            </div>
                            <div class="row experience">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" id="add_record_btn">Add Record</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-3 <?php if(!empty(form_error('name_of_company[]'))): ?> has-error <?php endif?>">
                                         <label for="Name_of_Company" class="control-label" style="font-size: 16px;">NAME OF COMPANY/ADDRESS</label>
                                        <div>
                                            <input class="form-control"  id="Name_of_Company" name="name_of_company[]" placeholder="Name of Company/Agency Address" value="<?=set_value('name_of_company');?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 <?php if(!empty(form_error('period_from[]','period_to'))): ?> has-error <?php endif?>">
                                        <label for="Period" class="control-label" style="font-size: 16px;">PERIOD</label>
                                        <div>
                                            <input class="form-control" id="Period" name="period_from[]" placeholder="From:" value="<?=set_value('period_from');?>">
                                        </div>
                                        <div>
                                            <input class="form-control" id="Period" name="period_to[]" placeholder="To:" value="<?=set_value('period_to');?>">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 <?php if(!empty(form_error('salary[]'))): ?> has-error <?php endif?>">
                                        <label for="SALARY" class="control-label" style="font-size: 16px;">SALARY</label>
                                        <div>
                                            <input class="form-control" id="SALARY" name="salary[]" placeholder="Salary" value="<?=set_value('salary');?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 <?php if(!empty(form_error('position[]'))): ?> has-error <?php endif?>">
                                        <label for="POSITION" class="control-label">POSITION</label>
                                        <input type="text" class="form-control" id="POSITION" name="position[]" placeholder="Positon" value="<?=set_value('position');?>">
                                    </div>
                                    <div class="form-group col-md-3 <?php if(!empty(form_error('rfl[]'))): ?> has-error <?php endif?>">
                                        <label for="Reason_For_Leaving" class="control-label">RFL</label>
                                        <input type="text" class="form-control"  id="Reason_For_Leaving" name="rfl[]" placeholder="Reason for leaving" value="<?=set_value('rfl');?>">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                       
                        <a class="btn btn-primary btnPrevious" >Previous</a>
                         <a class="btn btn-primary btnNext" >Next</a>
                    </div>

                    <div class="tab-pane" id="tab5">
                        <div class="container-fluid row-tab5">
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-12 ">
                                    <button class="btn btn-primary pull-right" id="add_tab5">Add record</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 <?php if(!empty(form_error('topic'))): ?> has-error <?php endif?>">
                                        <label for="TOPIC_TITLE<" class="control-label" style="font-size: 16px;">TOPIC/TITLE</label>
                                        <div>
                                            <input class="form-control"  id="TOPIC_TITLE" name="topic" placeholder="TOPIC/TITLE">
                                        </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('sponsor'))): ?> has-error <?php endif?>">
                                    <label for="SPONSOR" class="control-label" style="font-size: 16px;">SPONSOR</label>
                                    <div>
                                        <input class="form-control" id="SPONSOR" name="sponsor" placeholder="SPONSOR">
                                    </div>
                                </div>
                                <div class="form-group col-md-2  <?php if(!empty(form_error('inclusive_dates'))): ?> has-error <?php endif?>">
                                    <label for="INCLUSIVE_DATES" class="control-label" style="font-size: 16px;">INCLUSIVE DATES</label>
                                    <div>
                                        <input class="form-control" id="INCLUSIVE_DATES" name="inclusive_dates" placeholder="INCLUSIVE DATES">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 <?php if(!empty(form_error('speaker'))): ?> has-error <?php endif?>">
                                    <label for="SPEAKER" class="control-label" style="font-size: 16px;">SPEAKER</label>
                                    <div>
                                        <input class="form-control" id="SPEAKER" name="speaker" placeholder="SPEAKER">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                         <!--  <input type="submit" name="submit" value="Submit"> -->
                       </div>
                        <a class="btn btn-warning Previous" >Previous</a>
                        <div align="right">
                         <a> <input class="btn btn-success" type="submit" name="submit" value="Submit" ></a>
                         </div>
                    </div>
                     </div>

                   
    </div>
    </form>
</div>
</div></div></div>


<!-- blog_section end