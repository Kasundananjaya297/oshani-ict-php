<?php 
  $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age= $_POST["age"];
    $dob = $_POST["dob"];
    $telephone= $_POST["tel"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];
    $city=$_POST["city"]; 
    $course=$_POST["course"];

    //set courses as an array to save on database as a string
    $course = implode(",",$course);
    

    echo "First Name: ".$fname."<br>";
    echo "Last Name: ".$lname."<br>";
    echo "Email: ".$email."<br>";
    echo "Password: ".$password."<br>";
    echo "Age: ".$age."<br>";
    echo "Date of Birth: ".$dob."<br>";
    echo "Telephone: ".$telephone."<br>";
    echo "Address: ".$address."<br>";
    echo "Gender: ".$gender."<br>";
    echo "City: ".$city."<br>";
    echo "Course: ".$course."<br>";

    try{
        $connection = new mysqli("localhost","newuser","password","studentData");
        if($connection->connect_error){
            die("Connection failed: ".$connection->connect_error);
        }else{
            echo "!!!!!! Connected successfully !!!!!<br>";
            $sql = "INSERT INTO students(first_name, last_name, email, password, age, date_of_birth, telephone, address, gender, city, course) VALUES ('$fname','$lname','$email','$password','$age','$dob','$telephone','$address','$gender','$city','$course')";
           if($connection->query($sql) === TRUE){
               echo "New record created successfully";
            }else{
                echo "Error: ".$sql."<br>".$connection->error;
            }
        }
        $connection->close();
    }
    catch(Exception $e){echo $e->getMessage();}
    
?>
