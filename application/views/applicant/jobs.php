<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php
                if (!$jobs) {
                    echo "No Job post";
                }
                else{
                    foreach ($jobs as $index => $job):
                ?>

                <div class="lest_news_box_wrapper <?= $index == 0 ? '' : ' sc_toppadder60' ?>">
                    <div class="lest_news_cont_wrapper2">
                        <h5><strong><?=$job->job_name?>.</strong></h5>
                        <p><?=str_replace(array(";",","),"<br>",$job->job_requirements)?></p>
                    </div>
                    <div class="lest_news_cont_bottom">
                        <div class="lest_news_cont_bottom_left sc_left_btm  sc_btn">
                            <p><i class="fa fa-users"></i>No. of vacancy: <?=$job->job_vacancy?></p>
                        </div>
                        <div class="lest_news_cont_bottom_center sc_center_btm sc_btn pull-right">
                            <p><a href="<?=base_url('applicant/application_form')?>">Apply now</a></p>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                }
                ?>

                <!-- <div class="lest_news_box_wrapper">
                    <div class="lest_news_cont_wrapper2">
                        <h5><strong>We Hard Security your sefty.</strong></h5>
                        <p>It is a long established fact that a reader will be distracted by thee reale content of a page when looking at its layout. ar et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut pealiquip ex ea commodo consequat. Duis The point of usingc Lorem Ipsum is that it has a more-or-less normal</p>
                    </div>
                    <div class="lest_news_cont_bottom">
                        <div class="lest_news_cont_bottom_left sc_left_btm  sc_btn">
                            <p><i class="fa fa-users"></i>No. of vacancy: 24</p>
                        </div>
                        <div class="lest_news_cont_bottom_center sc_center_btm sc_btn pull-right">
                            <p><a href="#">Apply now</a></p>
                        </div>
                    </div>
                </div>

                <div class="lest_news_box_wrapper sc_toppadder60">
                    <div class="lest_news_cont_wrapper2">
                        <h5><strong>We Hard Security your sefty.</strong></h5>
                        <p>It is a long established fact that a reader will be distracted by thee reale content of a page when looking at its layout. ar et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut pealiquip ex ea commodo consequat. Duis The point of usingc Lorem Ipsum is that it has a more-or-less normal</p>
                    </div>
                    <div class="lest_news_cont_bottom">
                        <div class="lest_news_cont_bottom_left sc_left_btm  sc_btn">
                            <p><i class="fa fa-users"></i>No. of vacancy : 24</p>
                        </div>
                        <div class="lest_news_cont_bottom_center sc_center_btm sc_btn pull-right">
                            <p><a href="#">Apply now</a></p>
                        </div>
                    </div>
                </div>  -->              

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- blog_pagination_section start -->
                    <div class="blog_pagination_section blog_page_category">
                        <ul>
                            <li>
                                <a href="#" class="prev"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#">01</a>
                            </li>
                            <li><a href="#">02</a>
                            </li>
                            <li><a href="#">...</a>
                            </li>
                            <li><a href="#">09</a>
                            </li>
                            <li><a href="#">10</a>
                            </li>
                            <li><a href="#" class="next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- blog_pagination_section end -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- blog_section end