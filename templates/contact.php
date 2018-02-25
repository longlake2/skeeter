<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays a contact form.
 *
 * @package skeeter
 */
 



if(isset($_POST['submitted'])) {
    if(trim($_POST['contactName']) === '') {
        $nameError = true;
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
 
    if(trim($_POST['email']) === '')  {
        $emailError = true;
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = true;
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
 
    if(trim($_POST['comments']) === '') {
        $commentError = true;
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
 
 
    if(!isset($hasError)) {
        $emailTo = get_option('admin_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = __('From ','skeeter').$name;
        $body = __('Name: ','skeeter').$name."\n".__('Email: ','skeeter').$email."\n".__('Comments: ','skeeter').$comments;
        $headers = __('From: ','skeeter') .$name. ' <'.$emailTo.'>' . "\r\n" . __('Reply-To:','skeeter') .$name. '<'.$email.'>';
 
        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
 
}
 
get_header(); ?>

<?php if ( has_post_thumbnail() ) : ?>
        <div class="row justify-content-center post-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </div><!--  .post-thumbnail -->
    <?php endif; ?>
 
<?php
 ?>
 
    <div class="container">
        <main id="main" class="site-main" role="main">
 
            <?php while ( have_posts() ) : the_post(); ?>
 
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="row justify-content-center text-center">
                        <div class="col-md-6">
                            <header class="entry-header">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header><!-- .entry-header -->
         
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div><!-- .entry-content -->
                        </div><!--  .col-md-6 -->
                    </div><!--  .row -->

                    <div class="row justify-content-center">
                        <div class="col-md-8">
 
                            <?php if(isset($emailSent) && $emailSent == true) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php _e('Thanks, your email was sent successfully.', 'skeeter'); ?>
                                    </div>
                                <?php } else { ?>
     
                                    <?php if(isset($hasError) || isset($captchaError)) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong><?php _e('Error!', 'skeeter'); ?></strong> <?php _e('Please try again.', 'skeeter'); ?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                    <?php } ?>
     
                                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                                        <div class="form-group">
                                                <label class="control-label" for="contactName"><?php _e('Name', 'skeeter'); ?></label>
                                                <input class="form-control <?php if(isset($nameError)) { echo "is-invalid"; }?>" type="text" name="contactName" id="contactName" value="<?php echo isset($_POST["contactName"]) ? $_POST["contactName"] : ''; ?>" />
                                                <?php if(isset($nameError)) { ?>
                                                    <div class="invalid-feedback">
                                                        <?php _e('Please provide a valid name.', 'skeeter'); ?>
                                                      </div>
                                                <?php } ?>
                                          
                                           </div>
                                           <div class="form-group">
                                                <label class="control-label" for="email"><?php _e('Email', 'skeeter'); ?></label>
                                                <input class="form-control <?php if(isset($emailError)) { echo "is-invalid"; }?>" type="text" name="email" id="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" />
                                                <?php if(isset($emailError)) { ?>
                                                    <div class="invalid-feedback">
                                                        <?php _e('Please provide a valid email.', 'skeeter'); ?>
                                                      </div>
                                                <?php } ?>
                                           
                                           </div>
                                            <div class="form-group">
                                                <label class="control-label" for="commentsText"><?php _e('Message', 'skeeter'); ?></label>
                                           
                                                <textarea class="form-control <?php if(isset($commentError)) { echo "is-invalid"; }?>" name="comments" id="commentsText" rows="10" cols="20"><?php echo isset($_POST["comments"]) ? $_POST["comments"] : ''; ?></textarea>
                                                 <?php if(isset($commentError)) { ?>
                                                    <div class="invalid-feedback">
                                                        <?php _e('Please provide comments.', 'skeeter'); ?>
                                                      </div>
                                                <?php } ?>
                                            
                                           </div>
                                           <div class="form-actions">
                                                <button type="submit" class="btn btn-primary"><?php _e('Send Email', 'skeeter'); ?></button>
                                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                           </div>
                                    </form>
     
                            <?php } ?>


                           </div><!--  .col-md-8 -->          
                       </div><!--  .row -->
                  
                </article><!-- #post-## -->
 
 
            <?php endwhile; // end of the loop. ?>
 
        </main><!-- #main -->
    </div><!-- .container -->
 

<?php get_footer(); ?>