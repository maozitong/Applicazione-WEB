<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "agenziaimmobiliare";

// Connessione al database
$conn = new mysqli($host, $username, $password, $database);

// Alternativa alla connessione con mysqli_connect
//$conn = mysqli_connect($host, $username, $password, $database);


// Check connection
if (mysqli_connect_errno()) {
    echo "Errore di connessione";
    exit();
}
