<?php
$curl= curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.38:8080/api_intero/?endpoint=allappointments');
$res = curl_exec($curl);
$json = json_decode($res, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Queue Schedule</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Jadwal Antrian Pasien</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <input class="form-control" id="searchInput" type="text" placeholder="Cari dengan nomor rekam medis...">
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor Rekam Medis</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal dan Waktu Reservasi</th>
                        <th>Status Antrian</th>
                    </tr>
                </thead>
                <tbody id="queueTable">
                    <?php
                    for ($i = 0; $i < count($json); $i++){
                        echo "<tr>";
                            echo "<td> {$json[$i]["medical_record_number"]} </td>";
                            echo "<td> {$json[$i]["patient_name"]} </td>";
                            echo "<td> {$json[$i]["doctor_name"]} </td>";
                            echo "<td> {$json[$i]["reservation_time"]} </td>";
                            echo "<td> {$json[$i]["queue_status"]} </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
