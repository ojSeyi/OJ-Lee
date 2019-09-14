<?php
/**
 * Created by PhpStorm.
 * User: DOC
 * Date: 9/14/2019
 * Time: 2:22 PM
 */


/** HMO MVP **/

include 'db_conn.php';

$firstname == $_POST['firstname'];

$lastname == $_POST['lastname'];

$phone == $_POST['phone'];

$tel == $_POST['tel'];

$email == $_POST['email'];

$HMO == $_POST['HMO'];

$HMO_Number == $_POST['HMOno'];

$Address == $_POST['address'];

$Gender == $_POST['Gender'];

$DOB == $_POST['DOB'];


/** SQL to insert records $sql */
$sql = "INSERT INTO Patients (firstname, lastname, phone, tel, email, HMO, HMOno,Gender, DOB,Address)
VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/** GET Patient ID */
$patID = 0;
$noresult = 0;

$sql = "SELECT PatID FROM Patients WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $patID = $row["id"];
    }
} else {
    $noresult = 1;
}


/** sql to create diagnosis table */
$sql = "CREATE TABLE '$patID' (
diagid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
symptoms VARCHAR(255) NOT NULL,
diagnosis VARCHAR(255) NOT NULL,
diagdate DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

/** sql to create treatment table */
$sql = "CREATE TABLE '$patID'_treat (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->close();



?>
