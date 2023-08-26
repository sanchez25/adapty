<?php 
    /* Template Name: Form */
     session_start();
    get_header('form')
?>

<div class="content_form">
    <?php
        $companies = array(
            'Solo' => '1',
            '2-10' => '2-10',
            '11-50' => '11-50',
            '51-200' => '51-200',
            '201-500' => '201-500',
            '501-1000' => '501-1000',
            '1001+' => '1001+',
        );
    ?>
    <div id="form-messages"><?=$_SESSION['success_mail']?></div>
    <form id="contact-form" method="post" action="<?php echo get_template_directory_uri() ?>/contact-form.php">
        <div class="form-title">Request your demo</div>
        <div class="form-item">
            <input id="first_name" class="form-input" name="first_name" type="text" placeholder="">
            <label class="label-input" for="first_name">First name*</label>
            <span class="error-form"><?=$_SESSION['error_first_name']?></span>
        </div>
        <div class="form-item">
            <input id="last_name" class="form-input" name="last_name" type="text" placeholder="">
            <label class="label-input" for="last_name">Last name*</label>
            <span class="error-form"><?=$_SESSION['error_last_name']?></span>
        </div>
        <div class="form-item">
            <input id="email" class="form-input" name="email" type="email" placeholder="">
            <label class="label-input" for="email">Work email*</label>
            <span class="error-form"><?=$_SESSION['error_email']?></span>
        </div>
        <div class="form-item phone-field">
            <input id="phone" class="form-phone" name="phone" type="tel" onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
            <label class="phone-label" for="phone">Phone number*</label>
            <span class="error-form"><?=$_SESSION['error_phone']?></span>
            <span id="error-phone" class="error-form"></span>
        </div>
        <!--<div class="form-item phone-field">
            <div class="list-phones">
                <input id="phone" type="text" class="form-phone">
                <div class="select-countries">
                    <?php
                        include get_template_directory() . '/countires.php';
                    ?>
                    <select id="country" class="form-control">
                    </select>
                        <div class="form-control">
                            <div class="flag"></div>
                            <div class="arrow"></div>
                            <div class="menu-flags">
                                <?php
                                    foreach($countries as $key => $country) {
                                        echo "<div value='$country' class='flag $country'> $key</div>";
                                    }
                                ?>
                            </div>
                        </div>
                </div>
            </div>
            <span class="error-form"><?=$_SESSION['error_phone']?></span>
            <span id="error-phone" class="error-form"></span>
            <label class="phone-label" for="phone">Phone number*</label>
        </div>-->
        <div class="form-item">
            <input id="company_name" class="form-input" name="company_name" type="text" placeholder="">
            <label class="label-input" for="company_name">Company name*</label>
            <span class="error-form"><?=$_SESSION['error_company_name']?></span>
        </div>
        <div class="form-item">
            <select id="company_size" class="form-select" name="company_size">
                <option value="" selected="" hidden=""></option>
                <?php
                    foreach($companies as $key => $company) {
                        echo "<option value='$company'>$key</option>";
                    }
                ?>
            </select>
            <label class="label-select" for="company_size">Company size*</label>
            <span class="error-form"><?=$_SESSION['error_company_size']?></span>
        </div>
        <button id="btn-submit" type="submit" class="button-form">Schedule your demo</button>
        <div class="form-text">
            By submitting this form, I agree that the 
            <a href="#" target="_blank" rel="noreferrer">Terms of Service</a>
            and
            <a href="#" target="_blank" rel="noreferrer">Privacy Notice</a>
            will govern the use of services I receive and personal data I provide respectively.
        </div>
    </form>
</div>

<?php get_footer('form')?>





