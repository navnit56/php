<?php


$fnameErr = $lnameErr = $emailErr = "";
$ageErr = $genderErr = $courseErr = "";
$hobbiesErr = $skillErr = $agreeErr = "";

$fnameData = $lnameData = $emailData = "";
$ageData = $genderData = $courseData = "";
$hobbiesData = $skillData = $agreeData ="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

 $fname = trim($_POST["name"]);
    $fname = stripslashes($name);
    $fname = htmlspecialchars($name);

    $lname = trim($_POST["name"]);
    $lname = stripslashes($name);
    $lname = htmlspecialchars($name);

    $email = trim($_POST["name"]);
    $email = stripslashes($name);
    $email = htmlspecialchars($name);

    $age = trim($_POST["name"]);
    $age = stripslashes($name);
    $age = htmlspecialchars($name);

    //fname

    if(empty($fname)){
        $fnameErr = "First Name is required";
        
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $fname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $fnameData = htmlspecialchars($fname);
    }

    if ($fnameErr == "") {
        echo "<p style='color:green;'>Success:First Name is valid!</p>";
    }

    //lname

    if(empty($lname)){
        $lnameErr = "Last Name is required";
        
    }elseif(!preg_match("/^[a-zA-Z-' ]{2,}$/", $fname)){
        $fnameErr = "Only letters and white space allowed";
    }else{
        $lnameData = htmlspecialchars($fname);
    }

    if ($lnameErr == "") {
        echo "<p style='color:green;'>Success:Last Name is valid!</p>";
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
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        
            
        </div>
        <div class="fname">
        <label for="fname">First Name :</label>
        <input type="text" name="fname" id="fname" placeholder="Ente your first name" class="input" value="<?php echo $fnameData;?>" >
        <p id="errorfName"> <?php echo $fnameErr; ?></p>
        </div>

        <div class="lname">
        <label for="lname">Last Name :</label>
        <input type="text" name="lname" id="lname" placeholder="Ente your last name" class="input" value="<?php echo $lnameData;?>">
        <p id="errorlName"> <?php if(!empty($lnameErr)){ echo $lnameErr; } ?></p>
        </div>

        <div class="email">
        <label for="email">Email Address :</label>
        <input type="text" name="email" id="email" placeholder="Ente your Email" class="input" value="<?php echo $emailData;?>">
        <p id="errorEmail"> <?php if(!empty($emailErr)){ echo $emailErr; } ?></p>
        </div>

        <div class="age">
        <label for="age">Age :</label>
        <input type="number" name="age" id="age" placeholder="Ente your age" class="input" value="<?php echo $ageData;?>">
        <p id="errorAge"> <?php if(!empty($ageErr)){ echo $ageErr; } ?></p> 
        </div>

        <div class="gender">
        <fieldset class="fieldset">
            <legend>Gender:</legend>
  
                <input type="radio" name="gender" id="male" value="Male"<?php echo ($genderData == 'male') ? 'checked' : ''; ?> class="input">
                <label for="male">Male</label>
  
                <input type="radio" name="gender" id="female" value="Female"<?php echo ($genderData == 'female') ? 'checked' : ''; ?> class="input">
                 <label for="female">Female</label>
        </fieldset>

        <p id="errorGender"> <?php if(!empty($genderErr)){ echo $genderErr; } ?></p>
        </div>

        <div class="dropDown">
        <label for="course">Choose a course :</label>
        <select name="course" id="course" >
            <option value="" selected disabled hidden class="input">Please choose an option &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
            <option value="webDevlopment" class="input">Web Devlopment</option>
            <option value="android" class="input">Android</option>
            <option value="uiux" class="input">UI and UX</option>
            <option value="dataScience" class="input">Data Science</option>
        </select> 
        
        <p id="errorCourse"> <?php if(!empty($courseErr)){ echo $courseErr; } ?></p>
        </div>

        <div class="hobbies">
            <label for="hobbies">Hobbies :</label>
            <input type="checkbox" name="hobbies" id="reading" value="Reading" class="input">
            <label for="reading">Reading</label>

            <input type="checkbox" name="hobbies" id="sports" value="Sports" class="input">
            <label for="sports">Sports</label>

            <input type="checkbox" name="hobbies" id="music" value="Music" class="input">
            <label for="music">Music</label>

            <input type="checkbox" name="hobbies" id="coding" value="Coding" class="input">
            <label for="coding">Coding</label>

            <input type="checkbox" name="hobbies" id="traveling" value="Traveling" class="input">
            <label for="traveling">Traveling</label>

            <p id="errorHobbies"> <?php if(!empty($hobbiesErr)){ echo $hobbiesErr; } ?></p>
        </div>

        <div class="skillLevel">
            <label for="skill">Skill Level :</label>
            
            <input type="radio" name="skill" id="beginner" value="Beginner"<?php echo ($skillData == 'beginner') ? 'checked' : ''; ?> class="input">
            <label for="beginner">Beginner</label>

            <input type="radio" name="skill" id="intermediate" value="Intermediate"<?php echo ($skillData == 'intermediate') ? 'checked' : ''; ?> class="input">
            <label for="intermediate">Intermediate</label>

            <input type="radio" name="skill" id="advanced" value="Advanced"<?php echo ($skillData == 'advanced') ? 'checked' : ''; ?> class="input">
            <label for="advanced">Advanced</label>

            <p id="errorSkill">
          
                <?php if(!empty($skillErr)){ echo $skillErr; } ?>
              
            </p>
        </div>

        <div class="agreeTerms">
            <input type="checkbox" name="agree" id="agree" value="true" class="input">
            <label for="agree" class="agree">By clicking this box you agree to our terms and condition</label>

            <p id="errorAgree"> <?php if(!empty($agreeErr)){ echo $agreeErr; } ?></p>
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

       </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

    <script src="test1.js"></script>
</body>
</html>