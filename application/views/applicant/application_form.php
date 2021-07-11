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
                    <!-- <li><a href="#tab6" class="steps" data-toggle="tab">General Information</a></li>
                    <li><a href="#tab7" class="steps" data-toggle="tab">Other Information</a></li> -->
                   <!--  <li><a href="#tab8" class="steps" data-toggle="tab">Instruction</a></li> -->
                </ul>
                <form method="POST" action="<?=base_url('applicant/application_form')?>" enctype="multipart/form-data">
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
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 <?php if(!empty(form_error('gender'))): ?> has-error <?php endif?>">
                                    <label for="city_contact_no" class="control-label">GENDER</label>
                                    <select class="form-control" name="gender" >
                                      <option value="1">Male</option>
                                      <option value="0">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 <?php if(!empty(form_error('contact_no'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">CONTACT NO.</label>
                                    <input type="text" class="form-control" name="contact_no" placeholder="Contact Number" value="<?=set_value('contact_no');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 <?php if(!empty(form_error('security_license_no'))): ?> has-error <?php endif?>">
                                    <label for="place_of_birth" class="control-label">SECURITY LICENSE NO.</label>
                                    <input type="text" class="form-control" name="security_license_no" placeholder="Security License No." value="<?=set_value('security_license_no');?>">
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
                                <div class="form-group col-lg-4 <?php if(!empty(form_error('name_of_company'))): ?> has-error <?php endif?>">
                                     <label class="radio-inline">
                                      <input type="radio" name="exp" id="inlineRadio1" value="1" checked> With Experience
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="exp" id="inlineRadio2" value="2"> Without Experience
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 <?php if(!empty(form_error('resume'))): ?> has-error <?php endif?>">
                                    <label class="control-label">Attach Resume</label>
                                    <input type="file" class="form-control" name="resume" value="<?=set_value('resume');?>" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        
                    </div>
                </div>

                   
    </div>
    </form>
</div>
</div></div></div>


<!-- blog_section end