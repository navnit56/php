<?php
error_reporting(E_ALL);
if(isset($_POST['submit'])){

// error messsage variable

$fnameErr = $lnameErr = $emailErr = "";
$ageErr = $genderErr = $courseErr = "";
$hobbiesErr = $skillErr = $agreeErr = "";

//input data
$fnameData = $lnameData = $emailData = "";
$ageData = $genderData = $courseData = "";
$hobbiesData = $skillData = $agreeData ="";
    // value variables


$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$age = trim($_POST['age']);
$gender = $_POST['gender'];
$course = $_POST['course'];
$hobbies = $_POST['hobbies'];
$skill = $_POST['skill'];
$agree = $_POST['agree'];


    //fname
    if(empty($fname)){
        $fnameErr = "First Name is required";
        
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $fname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $fnameData = htmlspecialchars($fname);
    }
    //lname
    if(empty($lname)){
        $lnameErr = "Last Name is required";
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $lname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $lnameData = htmlspecialchars($lname);
    }
    //email
    if(empty($email)){
        $emailErr = "Email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // !preg_match('/^[a-zA-z][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)
        
        $emailErr = "Email is not in right format";
    }else{
        $emailData = htmlspecialchars($email);
    }

    //age
    if(empty($age)){
        $ageErr = "Age is required";
    }
    elseif (!is_numeric($age)) {
    echo "Age must be a number.";
    }
           elseif($age < 5 || $age > 60){
        $fnameErr = "Age can only be within 5 to 60 years";
    }else{
        $ageData = htmlspecialchars($age);
    }

    //gender
    if(!isset($gender)){
        $genderErr = "Please Select any Gender";
    }else{
        $genderData = htmlspecialchars($gender);
    }

    //course
    if(!isset($course)){
        $courseErr = "Please select any course";
    }else{
        $courseData = htmlspecialchars($course);
    }

    //hobbies
    if(!isset($hobbies)){
        $hobbiesErr = "Please select at least one hobby";
    }else{
        $hobbiesData = htmlspecialchars($hobbies);
    }

    //skill
    if(!isset($skill)){
        $skillErr = "Please select your skill level";
    }else{
        $skillData = htmlspecialchars($skill);
    }

    //agree
    if(!isset($agree)){
        $agreeErr = "Please Agree to terms and conditions";
    }
    else{
        $agreeData = htmlspecialchars($agree);
    }
    
}

?>