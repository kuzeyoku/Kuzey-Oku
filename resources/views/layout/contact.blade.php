<section class="contact-section pt-0 pb-0">
    <div class="auto-container">
        <div class="row">

            <div class="form-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">

                    <div class="contact-form wow fadeInLeft">
                        <div class="sec-title">
                            <span class="sub-title">Contact Now</span>
                            <h2>Get in touch with us</h2>
                        </div>

                        <form id="contact_form" name="contact_form" class=""
                            action="includes/sendmail.php" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <div class="">
                                        <input name="form_name" class="form-control required" type="text"
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <div class="">
                                        <input name="form_email" class="form-control required email"
                                            type="email" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <div class="">
                                        <input name="form_subject" class="form-control required"
                                            type="text" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <div class="">
                                        <input name="form_phone" class="form-control" type="text"
                                            placeholder="Enter Phone">
                                    </div>
                                </div>
                            </div>
                            <div class=" form-group">
                                <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="">
                                <input name="form_botcheck" class="form-control" type="hidden"
                                    value="">
                                <button type="submit" class="theme-btn btn-style-one"
                                    data-loading-text="Please wait..."><span class="btn-title">Send
                                        message</span></button>
                                <button type="reset" class="theme-btn btn-style-one"><span
                                        class="btn-title">Reset</span></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="image-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <figure class="image"><img src="images/resource/contact.jpg" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
