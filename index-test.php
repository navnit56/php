<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    


// get the data and validate
$fnameErr = $lnameErr = $emailErr = $ageErr = "";
$genderErr = $courseErr = $hobbiesErr = $skillErr = $agreeErr = "";
//fname
if (empty($_POST["fname"])){
    $fnameErr = "First Name is required";
}elseif(!preg_match('/^[a-zA-Z]{2,}$/', $_POST["fname"])){
    $fnameErr = "First Name is not valid";
}else{
    $fname = trim($_POST["fname"]);
}


//lname
if (empty($_POST["lname"])){
    $lnameErr = "Last Name is required";
}elseif(!preg_match('/^[a-zA-Z]{2,}$/', $_POST["lname"])){
    $lnameErr = "Last Name is not valid";
}else{
    $lname = trim($_POST["lname"]);
}

//email
if (empty($_POST["email"])){
    $emailErr = "Email is required";
}elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $emailErr = "Email is not valid";
}else{
    $email = trim($_POST["email"]);
}

//age
if (empty($_POST["age"])){
    $ageErr = "Age is required";
}elseif($_POST["age"] < 5 || $_POST["age"] > 60){
    $ageErr = "age is not valid";
}else{
    $age = trim($_POST["age"]);
}

//gender
if (!isset($_POST["gender"])) {

    $genderErr = "Please select gender";

} else {

    $gender = $_POST["gender"];

}

//course
if (!isset($_POST["course"]) || $_POST["course"] == ""){

    $courseErr = "Please select a course";

} else {

    $course = $_POST["course"];

}

//hobbies
if (!isset($_POST["hobbies"]) || empty($_POST["hobbies"])) {
    $hobbiesErr = "Please select at least one hobby";
}else {

    $hobbies = $_POST["hobbies"];

}
//skill
if (!isset($_POST["skill"])) {

    $skillErr = "Please select your skill level";

} else {

    $skill = $_POST["skill"];

}
//agree
if (!isset($_POST["agree"])){

    $agreeErr = "Please agree to our terms and condition";

} else {

    $agree = $_POST["agree"];

}

if (
    $fnameErr == "" &&
    $lnameErr == "" &&
    $emailErr == "" &&
    $ageErr == "" &&
    $genderErr == "" &&
    $courseErr == "" &&
    $hobbiesErr == "" &&
    $skillErr == "" &&
    $agreeErr == "") {
    echo "Form submitted successfully";

    $_SESSION["students"][] = [
    "fname" => $fname,
    "lname" => $lname,
    "email" => $email,
    "age" => $age,
    "gender" => $gender,
    "course" => $course,
    "hobbies" => implode(", ", $hobbies),
    "skill" => $skill,
    "agree" => $agree
];

header("Location: index.php");

exit();
}




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Submission Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="head">
    <h2>Student Submission Form</h2>
    <p>Fill all the details correctly</p>
    </div>
    <div class="line"></div>
    <form action="" method="POST" class="form">
        
            
        </div>
        <div class="fname">
        <label for="fname">First Name :</label>
        <input type="text" name="fname" id="fname" placeholder="Ente your first name" class="input" value="<?php echo $fname ?? ''; ?>" >
        <p style="color:red;"><?php echo $fnameErr ?? ""; ?></p>
        </div>

        <div class="lname">
        <label for="lname">Last Name :</label>
        <input type="text" name="lname" id="lname" placeholder="Ente your last name" class="input" value="<?php echo $lname ?? ''; ?>">
       <p style="color:red;"><?php echo $lnameErr ?? ""; ?></p>
        </div>

        <div class="email">
        <label for="email">Email Address :</label>
        <input type="text" name="email" id="email" placeholder="Ente your Email" class="input" value="<?php echo $email ?? ''; ?>">
        <p style="color:red;"><?php echo $emailErr ?? ""; ?></p>
        </div>

        <div class="age">
        <label for="age">Age :</label>
        <input type="number" name="age" id="age" placeholder="Ente your age" class="input"value="<?php echo $age ?? ''; ?>" >
        <p style="color:red;"><?php echo $ageErr ?? ""; ?></p>
        </div>

        <div class="gender">
        <fieldset class="fieldset">
            <legend>Gender:</legend>
  
                <input type="radio" name="gender" id="male" value="Male" class="input"<?php if(isset($gender) && $gender=="Male") echo "checked"; ?>>
                <label for="male">Male</label>
  
                <input type="radio" name="gender" id="female" value="Female" class="input"<?php if(isset($gender) && $gender=="Female") echo "checked"; ?>>
                 <label for="female">Female</label>
        </fieldset>

        <p style="color:red;"><?php echo $genderErr ?? ""; ?></p>
        </div>

        <div class="dropDown">
        <label for="course">Choose a course :</label>
        <select name="course" id="course" >
            <option value="">--Select--</option>
            <option value="webDevlopment" class="input">Web Devlopment</option>
            <option value="android" class="input">Android</option>
            <option value="uiux" class="input">UI and UX</option>
            <option value="dataScience" class="input">Data Science</option>
        </select> 
        
       <p style="color:red;"><?php echo $courseErr ?? ""; ?></p>
        </div>

        <div class="hobbies">
            <label for="hobbies">Hobbies :</label>
            <input type="checkbox" name="hobbies[]" id="reading" value="Reading" class="input">
            <label for="reading">Reading</label>

            <input type="checkbox" name="hobbies[]" id="sports" value="Sports" class="input">
            <label for="sports">Sports</label>

            <input type="checkbox" name="hobbies[]" id="music" value="Music" class="input">
            <label for="music">Music</label>

            <input type="checkbox" name="hobbies[]" id="coding" value="Coding" class="input">
            <label for="coding">Coding</label>

            <input type="checkbox" name="hobbies[]" id="traveling" value="Traveling" class="input">
            <label for="traveling">Traveling</label>

            <p style="color:red;"><?php echo $hobbiesErr ?? ""; ?></p>
        </div>

        <div class="skillLevel">
            <label for="skill">Skill Level :</label>
            
            <input type="radio" name="skill" id="beginner" value="Beginner" class="input"<?php if(isset($skill) && $skill=="beginner") echo "checked"; ?>>
            <label for="beginner">Beginner</label>

            <input type="radio" name="skill" id="intermediate" value="Intermediate" class="input">
            <label for="intermediate">Intermediate</label>

            <input type="radio" name="skill" id="advanced" value="Advanced" class="input">
            <label for="advanced">Advanced</label>

            <p style="color:red;"><?php echo $skillErr ?? ""; ?></p>
        </div>

        <div class="agreeTerms">
            <input type="checkbox" name="agree" id="agree" value="true" class="input">
            <label for="agree" class="agree">By clicking this box you agree to our terms and condition</label>

            <p style="color:red;"><?php echo $agreeErr ?? ""; ?></p>
        </div>

        <div class="submitOut">
            <input type="submit" value="Submit" class="submit">
        </div>
    </form>

    <div class="popup-overlay" id="popup" style="display: none;">
  <div class="popup-content">
    <h2>Thank You!</h2>
    <p>Your form has been successfully submitted.</p>
    <button id="closeBtn">Close</button>
  </div>
  </div>

  <div class="popup-overlay-empty" id="popup1" style="display: none;">
  <div class="popup-content">
    <h2>Please fill the form first</h2>
    <button id="closeBtn-empty">Close</button>
  </div>
</div>


                    <h2 class="mid-head">Student Data</h2>

    <table class="table">
       <thead class="th"> 
        <tr class="tr">
            <th class="thead">First Name</th>
            <th class="thead">Last Name</th>
            <th class="thead">Email Address</th>
            <th class="thead">&nbsp; Age &nbsp; &nbsp;</th>
            <th class="thead">&nbsp; Gender &nbsp; &nbsp;</th>
            <th class="thead">Course</th>
            <th class="thead">Hobbies</th>
            <th class="thead">Skill Level</th>
            <th class="thead">Agreement Of T&C</th>
        </tr>
       </thead> 
       <tbody id="tbody">
            <tbody>
<?php
if (isset($_SESSION["students"])) {
    foreach ($_SESSION["students"] as $student) {
        echo "<tr>";
        echo "<td>{$student['fname']}</td>";
        echo "<td>{$student['lname']}</td>";
        echo "<td>{$student['email']}</td>";
        echo "<td>{$student['age']}</td>";
        echo "<td>{$student['gender']}</td>";
        echo "<td>{$student['course']}</td>";
        echo "<td>{$student['hobbies']}</td>";
        echo "<td>{$student['skill']}</td>";
        echo "<td>{$student['agree']}</td>";
        echo "</tr>";
    }
}
?>
</tbody>
       </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

    <script src="test.jq.js"></script>
</body>
</html>