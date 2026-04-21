<?php
// Initialize error variable
$nameErr = "";
$name = "";

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input to prevent XSS (Cross-Site Scripting)
    $name = trim($_POST["name"]);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);

    // Validation Rules
    if (empty($name)) {
        $nameErr = "Name is required";
    } else {
        // Regular expression: Must only contain letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Success Message
    if ($nameErr == "") {
        echo "<p style='color:green;'>Success: Name is valid!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Name Validation Form</h2>
    <!-- Use htmlspecialchars($_SERVER["PHP_SELF"]) for security -->
    <form method="post" action="<?php echo htmlspecialchars("validation.php");?>">  
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span style="color:red;"> <?php echo $nameErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>
</body>
</html>
