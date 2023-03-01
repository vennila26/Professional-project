<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskform</title>
<style>
.error {
    color: #FF0000;
}
body{
  background-image:url("bg-2.jpg");
}

h2{
    font-size: 25px;
    font-weight: bolder;
    text-align: center;
    color: #9b59b6;
}
form{
    margin-left:auto;
    margin-right:auto;
    box-shadow: 0 5px 100px rgba(0, 0, 0, 0.15);
    max-width: 500px;
    padding: 20px 0 30px 20px;
    background: linear-gradient(135deg, #faf2b5, #fbd4d5);
}

 input  {
    border-radius: 15px;
    color: black;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid #ccc;
   }
   form input:focus,
        form input:valid {
            border-color: #9b59b6;
        }

select{
  width:60%;
  border-radius: 15px;
  color: black;
  font-size: 17px;
  font-weight: 450;
  letter-spacing: 1px;
  cursor: pointer;
}
form select:focus,
        form select:valid {
            border-color: #9b59b6;
        }
textarea{
  border-radius: 15px;
  color: black;
  letter-spacing: 1px;
  cursor: pointer;
  width:80%;
}
form textarea:focus,
        form textarea:valid {
            border-color: #9b59b6;
        }

form .submit {
    width:100%;
    color:white;
    background: green;
    }
h3{
    font-size: 25px;
    font-weight: bolder;
    color: #FBEEC1;
}
  div{
    color:#fff;
    margin-left:100px;
    font-weight: bolder;
  }
   
</style>
</head>
<body>

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = $nameErr = $addressErr = $countryErr = $zipErr = $emailErr = $genderErr = $languageErr = "";
$username = $password = $name = $address = $country = $zipcode = $email = $gender = $language = $about ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $userErr = "You Forgot to Enter Your Username!";
    } else {
        $username = test_input($_POST["username"]);
        }

    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
      } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (preg_match('/^[a-z0-9]{4,12}/', $password)) {
          $passwordErr = "Only contain letter and numbers";
        }
      }

      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["address"])) {
        $address = "";
      } else {
        $address = test_input($_POST["address"]);
      }

      if (empty($_POST["country"])) {
        $countryErr = "please select a country";
      } else {
        $country = test_input($_POST["country"]);
      }

      if (empty($_POST["zipcode"])) {
        $zipErr = "zipcode is required";
      } else {
        $zipcode = test_input($_POST["zipcode"]);
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }

      if (empty($_POST["language"])) {
        $languageErr = "language is required";
      } else {
        $language = test_input($_POST["language"]);
      }

      if (empty($_POST["about"])) {
        $about = "";
      } else {
        $about = test_input($_POST["about"]);
      }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<h2>Registration Form Validation</h2>
<table>
<tr>
  <td>UserName:</td>
  <td><input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span></td>
</tr>
<tr>
 <td>Password:</td>
 <td><input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
   <td>Name:</td> 
   <td><input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span></td>
  
</tr>
<tr>
  <td>Address:</td>
  <td><input type="text" name="address">
  <span class="error">* <?php echo $addressErr;?></span></td>
</tr>
  
<tr>
  <td>Country:</td>
  <td><select name="country">
    <option>Please select a country</option>
    <option>Denmark</option>
    <option>India</option>
    <option>Japan</option>
    <option>Pakistan</option>
    <span class="error">* <?php echo $countryErr;?></span>
  </select></td>
</tr>
    
<tr>
  <td>Zipcode:</td>
  <td><input type="text" name="zipcode">
  <span class="error">* <?php echo $zipErr;?></span></td>
</tr>
   
<tr>
  <td>E-mail:</td>
  <td><input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span><td>
</tr>
  
<tr>
  <td>Gender:</td>
  <td><input type="radio" name="gender" value="female" class="rad">Female
  <input type="radio" name="gender" value="male" class="rad">Male
  <span class="error">* <?php echo $genderErr;?></span></td>
  
</tr>
<tr>
  <td>Language:<td>
  <input type="checkbox" name="language" value="english">English
  <input type="checkbox" name="language" value="tamil">Tamil
  <input type="checkbox" name="language" value="hindi">Hindi
  <span class="error">* <?php echo $languageErr;?></span>
</tr>
  
<tr>
  <td>About:</td> 
  <td><textarea name="about" rows="5" cols="40"></textarea></td>
</tr>
  
<tr>
  <td><input type="submit" name="submit" value="Submit" class="submit"></td>
</tr>
</table>
</form>


<h3>Your Input:</h3>
<div>
<?php
echo "";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $name;
echo "<br>";
echo $address;
echo "<br>";
echo $country;
echo "<br>";
echo $zipcode;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $language;
echo "<br>";
echo $about;
echo "<br>";
?>
</div>
</body>
</html>