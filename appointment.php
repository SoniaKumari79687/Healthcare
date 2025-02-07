<?php
    include("header.php"); ?>

<?php
include('connection.php');

// Define variables and set to empty values
$department = $doctor = $name = $email = $date = $number = "";
$departmentErr = $doctorErr = $nameErr = $emailErr = $dateErr = $numberErr = "";
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Validate department
    if (empty($_POST["department"])) {
        $departmentErr = "Department is required";
    } else {
        $department = test_input($_POST["department"]);
    }

    // Validate doctor
    if (empty($_POST["doctor"])) {
        $doctorErr = "Doctor is required";
    } else {
        $doctor = test_input($_POST["doctor"]);
    }

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate number
    if (empty($_POST["number"])) {
        $numberErr = "Number is required";
    } else {
        $number = test_input($_POST["number"]);
    }

    // Validate date
    if (empty($_POST["date"])) {
        $dateErr = "Date is required";
    } else {
        $date = test_input($_POST["date"]);
        // Additional date validation can be added if needed
    }

    // If all fields are validated, insert into database
    if (empty($departmentErr) && empty($doctorErr) && empty($nameErr) && empty($emailErr) && empty($numberErr) && empty($dateErr)) {
        // Prepare and bind the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO appointment (department, doctor, name, email, number, date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $department, $doctor, $name, $email, $number, $date);

        // Execute the statement
        if ($stmt->execute()) {
            $output = "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <!-- Appointment Start -->
   
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Appointment</h5>
                        <h1 class="display-4">Make An Appointment For Your Family</h1>
                    </div>
                    <p class="mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                    <a class="btn btn-outline-primary rounded-pill py-3 px-5" href="">Read More</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-white border-0" style="height: 55px;" name="department">
                                        <option selected>Choose Department</option>
                                        <option value="Cardiologists">Cardiologists</option>
                                        <option value="Nephrologist">Nephrologist</option>
                                        <option value="Vascular Surgeon">Vascular Surgeon</option>
                                    </select>
                                    <span class="error">*<?php echo $departmentErr;?></span>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-white border-0" style="height: 55px;" name="doctor">
                                        <option selected>Select Doctor</option>
                                        <option value="Dr.Varun Bansal">Dr.Varun Bansal</option>
                                        <option value="DR.S.K.GUPTA">DR.S.K.GUPTA</option>
                                        <option value="Dr.Smita Bhatia">Dr.Smita Bhatia</option>
                                    </select>
                                    <span class="error">*<?php echo $doctorErr;?></span>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;" name="name">
                                    <span class="error">*<?php echo $nameErr;?></span>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;" name="email">
                                    <span class="error">*<?php echo $emailErr;?></span>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-white border-0 datetimepicker-input"
                                            placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" name="date">
                                            <span class="error">*<?php echo $dateErr;?></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control bg-white border-0" placeholder="Your Number" style="height: 55px;" name="number">
                                    <span class="error">*<?php echo $numberErr;?></span>
                                </div>
                                <!--
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-white border-0 datetimepicker-input"
                                            placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>-->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Make An Appointment</button>
                                </div>
                            </div>
                        </form>
                        <div>
                            <?php
                            if(isset($output)){
                                echo $output;
                            }
                            ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    
    <?php
    include("footer.php");
    ?>