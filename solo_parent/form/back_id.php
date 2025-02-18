<?php
require_once "dbhelper.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "No ID provided.";
    exit(); 
}

// Fetch results
$results = Joiningtables($id);

// Ensure we have a valid row before accessing its properties
$row = !empty($results) ? $results[0] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            border: 2px solid black;
            padding: 20px;
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        .contact-info {
            margin: 10px 0;
        }
        .bullet {
            margin: 10px 0;
            list-style-type: disc;
        }
        .signature {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="contact-info">
        <strong>In Case of Emergency</strong><br>
        <?php echo htmlspecialchars($row->icoe ?? "No emergency contact available"); ?><br>
        <?php echo htmlspecialchars($row->icoecontact_no ?? "No emergency contact available"); ?><br><br>

        <ul>
            <li class="bullet">This card is issued by <strong>FAMILY & COMMUNITY WELFARE UNIT</strong> Program under the Cebu City Government Department of Social Welfare Services for official use of the person designated herein.</li>
            <li class="bullet">This ID card is non-transferable</li>
            <li class="bullet">This ID card is valid until 2025</li>
        </ul>
        <p>In case of loss of this card, please notify The Department of Social Welfare Services FAMILY & COMMUNITY WELFARE UNIT program, and apply for a replacement.</p>
    </div>

    <div class="signature">
        <br>_____________________________<br>
        HON. RAYMOND CALVIN N. GARCIA<br>
        City Mayor
    </div>
    
</body>

</html>
