<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Student data added successfully!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Student data failed to add!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Student Data | ISTQB PROJECT</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">ISTQB PROJECT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Add Student Data</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nis" class="form-label">CIN</label>
                        <input type="number" class="form-control w-50" id="nis" placeholder="CIN" min="1" name="nis" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Name" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tmpt_Lahir" class="form-label">Place of birth</label>
                        <input type="text" class="form-control w-50" id="tmpt_Lahir" placeholder="Place of birth" name="tmpt_Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_Lahir" class="form-label">Date of birth</label>
                        <input type="date" class="form-control w-50" id="tgl_Lahir" name="tgl_Lahir" max="01-01-2006" required>
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Laki - Laki" value="Male">
                            <label class="form-check-label" for="Laki - Laki">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Perempuan" value="Female">
                            <label class="form-check-label" for="Perempuan">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Education</label>
                        <select class="form-select w-50" id="jurusan" name="jurusan">
                            <option disabled selected value>--------------------------------------------Select your Education--------------------------------------------</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Embedded System">Embedded System</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Data Science">Data Science</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control w-50" id="email" placeholder="E-Mail" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Picture</label>
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Address</label>
                        <textarea class="form-control w-50" id="alamat" rows="5" name="alamat" placeholder="Adress" autocomplete="off" required></textarea>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



    <!-- Footer -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2">
                <h4 class="fw-bold text-uppercase">About</h4>
                <p>ACTIA ES is a subsidiary of ACTIA Group (a French multinational with 3800 employees operating in the automotive and telecom sectors) and is the group's R&D center.
Founded in 2005, ACTIA ES has 650 employees, mainly engineers from prestigious schools.
<br><br>
With more than 15 years of experience in the automotive field, ACTIA ES is now involved in high value-added projects.
<br><br>

Know-how :
<br>
 - Embedded software development 
<br>
 - Disembarked software development (Web, mobile and PC)
<br>
 - Mechanical and electronic development 
<br>
 - Test and validation
<br>
 - Product qualification and certification
<br>
 - Design and sale of test and production tools
<br>
<br>
<br>
Certifications: ISO9001, ISO17025, ISO27001, CMMI dev v1.2 
</p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Account Links</h4>
                <a href="https://www.facebook.com/ACTIAES" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="https://github.com/" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: red;"></i> by <a href="https://instagram.com/vikrysurya_" target="_blank" style="color: #fff;">OUSS2K</a></p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>