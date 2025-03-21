<?php
require_once "dbhelper.php";

if (!isset($_GET["id"])) {
    echo "No ID provided.";
    exit(); 
}
$id = $_GET["id"];

// Fetch results
$results = Joiningtables($id);
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .id-card {
    width: 88.9mm;
    height: 63.5mm;
    border: 2px solid #000;
    border-radius: 8px;
    padding: 6px;
    background-color: white;
    position: relative;
    display: inline-block;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    font-size: 10px;
}

        .header {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .contact-info, .bullet {
            font-size: 9px;
            margin: 5px 0;
            text-align: left;
        }
        .signature {
            text-align: center;
            font-size: 9px;
            margin-top: 10px;
        }
        .signature .line {
            display: block;
            width: 70%;
            border-top: 1px solid black;
            margin: 4px auto;
        }
        .print-button {
            padding: 8px 12px;
            font-size: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .print-button:hover {
            background-color: #0056b3;
        }
        .view-front-button {
    display: inline-block;
    padding: 8px 12px;
    font-size: 12px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: center;
}

.view-front-button:hover {
    background-color: #218838;
}
    </style>
    <script>
        function printCard() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="id-card">
        <div class="header">Family & Community Welfare Unit</div>
        <div class="contact-info">
            <strong>In Case of Emergency</strong><br>
            <?php echo htmlspecialchars($row->icoe ?? "No emergency contact available"); ?><br>
            <?php echo htmlspecialchars($row->icoecontact_no ?? "No emergency contact available"); ?>
        </div>
        <ul>
            <li class="bullet">Issued by <strong>FAMILY & COMMUNITY WELFARE UNIT</strong> under Cebu City Government.</li>
            <li class="bullet">This ID card is non-transferable.</li>
            <li class="bullet">Valid until 2025.</li>
        </ul>
        <p style="font-size: 9px; text-align: center;">In case of loss, notify The Department of Social Welfare Services.</p>
        <div class="signature">
            <span class="line"></span><br>
            HON. RAYMOND CALVIN N. GARCIA<br>
            City Mayor
        </div>
        
    </div>
    <a href="generate_id.php?id=<?php echo $id; ?>" class="view-front-button">View Front of ID</a>
    </a>
    
    <button class="print-button" onclick="printCard()">Print ID Card</button>
</body>
</html>
