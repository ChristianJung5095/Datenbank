<?php
$conn = new mysqli("localhost", "root", "", "Personendaten");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Code zum einfügen der Daten
if (isset($_POST['vorname'])) {
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $adresse = $_POST['adresse'];
    $plz = $_POST['plz'];
    if ($vorname != "" || $nachname != "") {
        $sql = "INSERT INTO daten (Vorname, Nachname, Strasse, PLZ) VALUES ('$vorname', '$nachname', '$adresse', '$plz')";
        $eintragen = mysqli_query($conn, $sql);
    } else {
        echo '<p class="error">ERROR: Could not able to execute the Request. Please enter a Name and a Last Name</p>';
    }
}

//Code zum löschen der Daten
if (isset($_POST['click'])) {
    $vorname2 = $_POST['vorname2'];
    $nachname2 = $_POST['nachname2'];
    $adresse2 = $_POST['adresse2'];
    $plz2 = $_POST['plz2'];

    $query = "DELETE FROM Daten Where Vorname='$vorname2' AND Nachname='$nachname2' AND Strasse='$adresse2' AND PLZ='$plz2'";
    $eingetragen = mysqli_query($conn, $query);
}

//Code zum updaten der Daten
if (isset($_POST['click2'])) {
    $vorname3 = $_POST['vorname3'];
    $nachname3 = $_POST['nachname3'];
    $adresse3 = $_POST['adresse3'];
    $plz3 = $_POST['plz3'];
    $ID = $_POST['ID'];

    $query2 = "UPDATE DATEN SET Vorname='$vorname3', Nachname='$nachname3', Strasse='$adresse3', PLZ='$plz3' WHERE ID=$ID";
    $eingetragen2 = mysqli_query($conn, $query2);

    //echo $query2;
}
