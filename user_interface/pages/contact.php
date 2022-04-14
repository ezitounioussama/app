<?php 
require_once("inc_contact/header.php");
require_once("inc_contact/navbar.php");
?>

<?php 
if(isset($_POST['submit'])){
    $to = "zitounioussama95@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
   
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
    echo '<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Mail Sent.",
            text: "Thank you sir, we will contact you shortly.",
            icon: "success",
            button: "Ok",
            timer: 5000
        });
    });
</script>';
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>



<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signin.jpg'); background-size: cover;" loading="lazy"></div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Contact us</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                  welcome sir , feel free and contact us if you see any bug or if you want to ask question about something!
                </p>
                <form id="contact-form" action="" method="post">
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Full Name</label>
                          
                          <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                          
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Email</label>
                          
                          <input type="email" name="email" class="form-control" placeholder="example@gmail.com" >
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group mb-0 mt-md-0 mt-4">
                      <div class="input-group input-group-static mb-4">
                        <label>How can we help you?</label>
                        
                        <textarea  name="message" class="form-control" id="message" rows="6" placeholder="Describe your problem in at least 250 characters"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        
                      	<input type="submit" value="send message" name="submit" class="btn bg-gradient-primary mt-3 mb-0">
                        

                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
require_once("inc_contact/footer.php");
?>