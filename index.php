<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>

</head>
<body>
<style> @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

body{
  background: rgb(238,174,202);
  background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(169,184,226,1) 77%, rgba(148,187,233,1) 100%);
}


.con{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 200px;




}


form{
  height: 400px;
  width: 600px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;


}

input{
border: #000000 solid;
height: 25px;
}

h1{
  font-family: 'Roboto', sans-serif;
  margin-bottom: 50px;
}

label{
  font-family: 'Roboto';
  font-weight: 400;
 color: black;
}



button {
  align-items: center;
  background-color: rgba(240, 240, 240, 0.26);
  border: 1px solid #DFDFDF;
  border-radius: 16px;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: flex;
  font-family: Inter, sans-serif;
  font-size: 18px;
  justify-content: center;
  line-height: 28px;
  max-width: 100%;
  padding: 14px 22px;
  text-decoration: none;
  transition: all .2s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
 
}



 </style>


<div class="con">
<form method="post">
    <h1>Logowanie</h1>
    <label for="username">Login:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Zaloguj</button>
</form>
</div>


<?php
$conn = new mysqli("127.0.0.1","admin","test","baza");

if ($conn->connect_error) {
    die("Błąd połączenia bazy: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST["username"]);
    $pass = $conn->real_escape_string($_POST["password"]);


    $query = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Zalogowano";
    } else {
        echo "Błąd logowania";
    }

    $conn->close();
}
?>

</body>
</html>