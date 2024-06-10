<?php
$curl= curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($curl, CURLOPT_URL, 'http://10.33.35.38:8080/api_intero/?endpoint=allschedules');
$res = curl_exec($curl);
$json = json_decode($res, true);
$x= curl_init();
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($x, CURLOPT_URL, 'http://10.33.35.38:8080/api_intero/?endpoint=doctors');
$xs = curl_exec($x);
$dokter = json_decode($xs, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment Reservation Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Reservasi Dokter</h2>
        <form id="reservationForm" method="post">
            <div class="form-group">
                <label for="medicalRecordNumber">Nomor Rekam Medis</label>
                <input name="medic_record" type="text" class="form-control" id="medicalRecordNumber" placeholder="Masukkan nomor rekam medis" required>
            </div>
            <div class="form-group">
                <label for="dob">Tanggal Lahir</label>
                <input name="birth_date" type="date" class="form-control" id="dob" required>
            </div>
            <div class="form-group">
                <label for="doctor">Dokter</label>
                <select name="dokter" class="form-control" id="doctor" required>
                    <option value="">Pilih dokter</option>
                    <?php
                    for ($i = 0; $i < count($dokter); $i++){
                            echo "<option value='{$dokter[$i]["id"]}'> {$dokter[$i]["name"]} </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="spesialis">Poliklinik</label>
                <select name="specialist" class="form-control" id="spesialis" readonly>
                    <option value="">Pilih Poliklinik</option>
                    <?php
                    for ($i = 0; $i < count($dokter); $i++){
                            echo "<option value='{$dokter[$i]["specialization"]}'> {$dokter[$i]["specialization"]} </option>";
                    }
                    ?>
                </select>
            <div class="form-group">
                <label for="date">Tanggal Reservasi</label>
                <select name="date" class="form-control" id="date" required>
                    <option value="">Pilih jadwal</option>
                    <?php
                    for ($i = 0; $i < count($json); $i++){
                            echo "<option value='{$json[$i]["id"]}'> {$json[$i]["upcoming_available"]} </option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Reservasi</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['submit']))
{    
$medic_record= $_POST['medic_record'];
$birth_date = $_POST['birth_date'];
$specialist = $_POST['spesialis'];
$doctor = $_POST['dokter'];
$date = $_POST['date'];

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://10.33.35.38:8080/api_intero/?endpoint=appointments';
$ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
$jsonData = array(
    'medical_record_id' =>  $medic_record,
    'date_of_birth' =>  $birth_date,
    'doctor_id' => $doctor,
    'schedule_id' => $date,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//pastikan mengirim dengan method POST
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
echo "<br>Pendaftaran berhasil !";
echo "<br><a href=queue.php> OK </a>";
}
?>