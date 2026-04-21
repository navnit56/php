<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);




if ($_SERVER["REQUEST_METHOD"] == "POST"){

$fnameErr = $lnameErr = $emailErr = "";
$ageErr = $genderErr = $courseErr = "";
$hobbiesErr = $skillErr = $agreeErr = "";

$fnameData = $lnameData = $emailData = "";
$ageData = $genderData = $courseData = "";
$hobbiesData = $skillData = $agreeData ="";
if (isset($_POST['fname'])) {
     $fname = trim($_POST["name"]);
    $fname = stripslashes($name);
    $fname = htmlspecialchars($name);
}

if (isset($_POST["lname"])) {
   

    $lname = trim($_POST["lname"]);
    $lname = stripslashes($lname);
    $lname = htmlspecialchars($lname);

}
if (isset($_POST["email"])) {
    $email = trim($_POST["email"]);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
}
if (isset($_POST["age"])) {
    $age = trim($_POST["age"]);
    $age = stripslashes($age);
    $age = htmlspecialchars($age);
}
if (isset($_POST["gender"])) {
$gender = $_POST['gender'];
}
if (isset($_POST['course'])) {
$course = $_POST['course'];
}
if (isset($_POST['hobbies'])) {
$hobbies = $_POST['hobbies'];
}
if (isset($_POST['skill'])) {
$skill = $_POST['skill'];
}
if (isset($_POST['agree'])) {
$agree = $_POST['agree'];
}
   
        if(empty($fname)){
        $fnameErr = "First Name is required";
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $fname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $fnameErr ="";
        $fnameData = htmlspecialchars($fname);
    }
    

   
        if(empty($lname)){
        $lnameErr = "Last Name is required";
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $lname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $lnameErr ="";
        $lnameData = htmlspecialchars($lname);
    }
    


        if(empty($email)){
        $emailErr = "Email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // !preg_match('/^[a-zA-z][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)
        
        $emailErr = "Email is not in right format";
    }else{
        $emailErr ="";
    }

    

 
        if(empty($age)){
        $ageErr = "Age is required";
    }
    elseif (!is_numeric($age)) {
    echo "Age must be a number.";
    }
           elseif($age < 5 || $age > 60){
        $fnameErr = "Age can only be within 5 to 60 years";
    }else{
        $ageErr = "";
    }
    


        if(!isset($agree)){
        $agreeErr = "Please Agree to terms and conditions";
    }else{
        $agreeErr = "";
    }
    

  
        if(!isset($gender)){
        $genderErr = "Please Select any Gender";
    }else{
        $genderErr = "";
    }


  
        if(!isset($course)){
        $courseErr = "Please select any course";
    }else{
        $courseErr = "";
    }
  

 
        if(!isset($skill)){
        $skillErr = "Please select your skill level";
    }else{
        $skillErr = "";
    }
    

  
        if(!isset($hobbies)){
        $hobbiesErr = "Please select at least one hobby";
    }else{
        $hobbiesErr = "";
    }
    


   



}

?>