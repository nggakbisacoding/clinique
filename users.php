<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Pendaftaran Pasien Baru</h2>
        <form id="registrationForm"  method="POST" action="/api_intero/?endpoint=auth&action=register">
            <div class="form-group">
                <label for="name">Nama</label>
                <input  name="name" type="text" class="form-control" id="name" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" class="form-control" id="gender">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input name="citizenship_number" type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
            </div>
            <div class="form-group">
                <label for="dob">Tanggal Lahir</label>
                <input name="date_of_birth" type="date" class="form-control" id="dob">
            </div>
            <div class="form-group">
                <label for="phone">No Telp</label>
                <input name="call_number" type="tel" class="form-control" id="phone" placeholder="Masukkan no telepon">
            </div>
            <div class="form-group">
                <label for="bloodType">Golongan Darah</label>
                <select name="blood_type" class="form-control" id="bloodType">
                    <option value="">Pilih golongan darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="submit">
        </form>
        <div class="form-group">
            <h3 id="resultMessage"></h3>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
document.getElementById('registrationForm').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);

    try {
        const response = await fetch('/api_intero/index.php?endpoint=auth&action=register', { // Updated endpoint URL
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        
        if (!response.ok) { // Check for HTTP errors
            const errorData = await response.json();
            throw new Error(errorData.error || 'Registration failed'); 
        }

        const result = await response.json();
        
        // Create a success message with both token and medical_record_id
        const successMessage = `Registration successful! Your Medical Record ID is: ${result.medical_record_id} and your token is: ${result.token}`;

        // Display the message
        const resultMessageDiv = document.getElementById('resultMessage');
        resultMessageDiv.textContent = successMessage;

    } catch (error) {
        // Handle errors and display error message
        console.error('Error:', error);
        const resultMessageDiv = document.getElementById('resultMessage');
        resultMessageDiv.textContent = `Error: ${error.message}`;
    }
});

</script>
</body>
</html>

