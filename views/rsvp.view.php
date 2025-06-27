<?php require('partials/header.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <section class="main-content" style="background-image: url('assets/images/bg-about-couple.png');">
        <div class="container">
            <div class="inner-wrapper">
                <img src="\assets\images\logo-dp.svg" alt="Deric & Paulyn" class="logo-rsvp"/>
                <h3 class="heading">Kindly Reply</h3>
                <p class="description">Please respond by september 18</p>
                <div class="form-wrapper">

                    <?php 
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
                            isset($_POST['first_name']) && 
                            isset($_POST['last_name']) && 
                            isset($_POST['phone_number']) && 
                            isset($_POST['email_address'])) {
                            // Here you would typically process the form data, e.g., save it to a database.
                            // For this example, we'll just redirect to a thank you page.
                            header('Location: /thank-you?success=true');
                            exit;
                        }
                    ?>

                    <form method="POST" action="/thank-you">
                        <div class="form-group">
                            <label for="fname">First Name: </label>
                            <input type="text" id="fname" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name: </label>
                            <input type="text" id="lname" name="last_name" placeholder="Last name" required>
                        </div>
                        <div class="form-group">
                            <label for="pnum">Phone: </label>
                            <input type="text" id="pnum" name="phone_number" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Email: </label>
                            <input type="text" id="email" name="email_address" placeholder="Email" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="companion">Select your companion: </label>
                            <select id="companion" name="companion" required>
                                <option value="" disabled selected>Select a companion</option>
                                <option value="self">Self</option>
                                <option value="spouse">Spouse</option>
                                <option value="family">Family</option>
                                <option value="friend">Friend</option>
                                <option value="colleague">Colleague</option>
                            </select>
                        </div> -->
                        <button class="btn-pill" type="submit" style="margin-top: 1em;">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>
