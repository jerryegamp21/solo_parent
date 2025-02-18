<?php
require_once "dbhelper.php";

// Check if 'id' is provided via GET request
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = (int) $_GET["id"]; // Ensure it's an integer
} else {
    echo "No valid ID provided.";
    exit();
}

// Call Joiningtables function (do NOT pass $conn)
$results = Joiningtables($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERPAT ID Card</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .id-card {
            width: 85.6mm;
            height: 54mm;
            border: 2px solid #000;
            border-radius: 5px;
            padding: 8px;
            font-family: Arial, sans-serif;
            background-color: white;
            position: relative;
            text-align: left;
        }
        .header {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
        }
        .erp-title {
            text-align: center;
            color: red;
            font-size: 16px;
            font-weight: bold;
        }
        .photo-box {
            width: 20mm;
            height: 25mm;
            border: 2px solid black;
            position: absolute;
            left: 45px;
            top: 65px;
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            color: black;
            font-weight: bold;
        }
        .id-info {
            position: absolute;
            left: 45mm;
            top: 45px;
            font-size: 12px;
        }
        .id-info p {
            margin: 3px 0;
        }
        .barcode {
            position: absolute;
            bottom: 2px;
            left: 1px;
            width: 100%;
            text-align: right;
        }
        .signature {
            position: absolute;
            bottom: 5px;
            left: 8px;
            font-size: 10px;
        }
        .line {
            display: block;
            width: 50mm;
            border-top: 1px solid black;
            margin-top: 5px;
        }
        .logo {
            position: absolute;
            top: 5px;
            left: 8px;
            width: 20mm;
        }
        .right-logo {
            position: absolute;
            top: 5px;
            right: 8px;
            width: 20mm;
        }
    </style>
</head>
<body>

    <?php if (!empty($results)): ?>
        <?php foreach ($results as $row): ?>
            <div class="id-card">
                <img src="http://localhost/form/img/logo3.png" alt="Left Logo" class="left-logo">
                <img src="http://localhost/form/img/right_logo.jpg" alt="Right Logo" class="right-logo">
                <div class="header">
                    REPUBLIC OF THE PHILIPPINES<br>
                    CITY OF CEBU<br>
                    DEPARTMENT OF SOCIAL WELFARE SERVICES
                </div>
                <div class="erp-title">ERPAT</div>
                
                <br><br>
                <div class="photo-box">PHOTO</div>

                <div class="id-info"><br><br>
                    <strong>ID No:</strong> <?php echo htmlspecialchars($row->idno); ?><br>
                    <strong>Name:</strong> <?php echo htmlspecialchars($row->name); ?><br>
                    <strong>Age:</strong> <?php echo htmlspecialchars($row->age); ?><br>
                    <strong>Sex:</strong> <?php echo htmlspecialchars($row->sex); ?><br>
                    <strong>Status:</strong> Active<br>
                </div>
                <div class="barcode">
                    <img src="http://localhost/form/img/barcode.jpg" alt="Barcode" width="100">
                </div>
                <div class="signature">SIGNATURE:<br><span class="line"></span></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <a href="back_id.php?id=<?php echo $id; ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> View Back of ID
    </a>

</body>
</html>
