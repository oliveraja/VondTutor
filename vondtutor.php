<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOND TUTOR</title>

    <!--Include Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--Include Font-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!--Include Css-->
    <link rel="stylesheet" href="vondtutor.css">

</head>

<body>

    <!--Header-->
    <nav class="navbar navbar-expand-lg fixed-top py-0">
        <div class="container-fluid justify-content-between">
            <!--Judul-->
            <p class="h1 navbar-brand mx-lg-4 fw-bolder">VOND<br>TUTOR</p>

            <!--Burger button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarScroll" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                <!--Search-->
                <div class="btn-group rounded-pill">
                    <span class="search ms-3 mt-3 d-none d-lg-block">Subjek apa yang ingin anda pelajari?</span>

                    <!--Search onclick-->
                    <div class="input-group ps-2 py-2 d-none">
                        <img src="Source SE/Book.png" alt="">
                        <select class="form-select-sm p-0 m-0" aria-label="Default select example">
                            <option selected>Subjek</option>
                            <option value="1">Bahasa Inggris</option>
                            <option value="2">Bahasa Jepang</option>
                            <option value="3">Bahasa Korea</option>
                            <option value="4">Geografi</option>
                        </select>
                        <img src="Source SE/Location.png" alt="">
                        <select class="form-select-sm p-0 m-0" aria-label="Default select example">
                            <option selected>Lokasi</option>
                            <option value="1">Di sekitar saya</option>
                            <option value="2">Online</option>
                        </select>
                    </div>

                    <!--Search button-->
                    <a href="#" class="btn mod-btn d-none d-lg-block">
                        <img src="Source SE/Search.png" alt="">
                    </a>
                </div>

                <!--Search (untuk tablet & mobile)-->
                <div class="btn-group rounded-pill d-lg-none">
                    <span class="navigation search ms-3 mt-3">Subjek apa yang ingin anda pelajari?</span>
                    <a href="#" class="btn mod-btn">
                        <img src="Source SE/Search.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <!--Upgrade Skill-->
    <div class="head-content">
        <div class="d-flex justify-content-center px-5 pb-5">
            <img class="pt-5 mt-5" src="Source SE/Student.png" alt="">
            <div class="text-header">
                <p class="display-3 fw-bolder">UPGRADE YOUR</p>
                <p class="display-3 fw-bolder">SKILL FOR BETTER</p>
                <p class="display-3 fw-bolder">FUTURE</p>
                <br>
                <br>
                <button class="btn btn-head-content mod-btn button rounded-pill text-center" data-bs-toggle="modal"
                    data-bs-target="#modalLoginRegisterForm">
                    Daftar
                </button>
                <div class="modal fade" id="modalLoginRegisterForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog register">
                        <div class="modal-content">
                            <div class="close-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body text-center mx-4">
                                <img src="Source SE/LOGO.png" alt="">
                                <br>
                                <p class="h2">Masuk ke akun anda</p>
                                <br>
                                <br>
                                <form>
                                    <div class="mb-3">
                                        <div class="d-flex border-bottom">
                                            <img src="Source SE/pngwing 5.png" alt="">
                                            <input type="text" placeholder="Email" id="inputemail">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex border-bottom">
                                            <img src="Source SE/pngwing 7.png" alt="">
                                            <input type="text" placeholder="Password" id="inputpassword">
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" id="checkbox" name="Biarkan saya masuk" value="">
                                        <label for="checkbox">Biarkan saya masuk</label>
                                    </div>
                                    <div>
                                        <p class="fw-bolder">Lupa kata sandi?</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn mod-btn login mx-4 mb-2 rounded-pill">Masuk</button>
                             <!-- Cek apakah email & pw sudah diisi -->
                           <script type="text/javascript">
                                function validasi() {
                                    var username = document.getElementById("inputemail").value;
                                    var password = document.getElementById("inputpassword").value;		
                                    if (username != "" && password!="") {
                                        return true;
                                    }else{
                                        alert('Username dan Password harus di isi !');
                                        return false;
                                    }
                                }
                            
                            </script> 
                           <?php
                                require_once "connection.php";

                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $inputemail = $_POST['email'];
                                    $inputpassword = $_POST['password'];

                                    // Create a new MySQLi connection
                                    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

                                    // Check if the connection was successful
                                    if (mysqli_connect_errno()) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    // Prepare the query using prepared statements to prevent SQL injection
                                    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
                                    $stmt->bind_param("ss", $inputemail, $inputpassword);
                                    $stmt->execute();

                                    // Get the result
                                    $result = $stmt->get_result();
                                    $cek = $result->num_rows;

                                    if ($cek > 0) {
                                        session_start();
                                        $_SESSION['email '] = $inputemail;
                                        $_SESSION['status'] = "login";
                                        header("location: vondtutor/home.php");
                                        exit(); // Add an exit() after the header() to stop further execution
                                    } else {
                                        $error = "Login failed. Invalid email or password.";// Add an exit() after the header() to stop further execution
                                    }

                                    // Close the statement and connection
                                    $stmt->close();
                                    $conn->close();
                                }
                                ?>

                            <?php 
                                if (isset($error)) { ?>
                                    <p><?php echo $error; ?></p>
                                <?php } ?>

                            <button class="btn mod-btn register mx-4 mb-2 rounded-pill">Daftar</button>
                            <p class="h6 mb-2 text-center">atau</p>
                            <div class="mx-3">
                                <button class="hover-btn">
                                    <img class="img-fluid mb-1 w-100" src="Source SE/Group 89.png" alt="">
                                </button>
                                <button class="hover-btn">
                                    <img class="img-fluid mb-1" src="Source SE/Group 90.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <!--Kenapa VOND TUTOR-->
        <div class="header-content-bg rounded-5">
            <p class="h2 fw-bolder px-5 pt-5">Kenapa <br> VOND TUTOR?</p>
            <div class="row">
                <div class="col pb-5">
                    <img class="header-img img-fluid px-5 pt-4" src="Source SE/Rectangle 55.png" alt="">
                </div>
                <div class="col-7 pb-5">
                    <p class="h3 pt-4 pe-5 mb-3">VOND TUTOR adalah tempat yang tepat untuk mencari guru privat yang
                        berkulitas.
                        Kami
                        memiliki guru yang berpengalaman dan berkualifikasi tinggi dalam berbagai mata pelajaran. </p>
                    <img class="mb-3" src="Source SE/Group 85.png" alt="">
                    <img class="mb-3" src="Source SE/Group 86.png" alt="">
                    <img class="mb-3" src="Source SE/Group 87.png" alt="">
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <!--Ulasan-->
    <div class="body-content">
        <p class="h4 fw-bolder pt-2">Ulasan Tentang VOND TUTOR</p>
        <div class="d-flex gap-2 mb-2">
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
        </div>
        <div class="d-flex gap-2 mb-2">
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
            <div class="g-col-4 card-bg rounded-3">
                <div class="d-flex align-items-center p-2">
                    <img class="rounded-circle" src="Source SE/Adrian.png" alt="">
                    <div class="px-3">
                        <p class="h6">Adrian</p>
                        <p class="h6">4.5/5</p>
                    </div>
                </div>
                <p class="h6 ps-2 pb-2">
                    Semenjak mendapatkan guru dari VOUND TUTOR saya jadi lebih memahami materi pembelajaran saya dan
                    saya
                    bisa mendapatkan nilai yang memuaskan sangat ujian
                </p>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!--Cara Kerja-->
    <div class="cara-kerja header-content-bg rounded-5">
        <p class="h4 fw-bolder px-5 pt-5">Cara Kerja</p>
        <img class="px-5 py-3" src="Source SE/1.png" alt="">
        <img class="px-5 py-3" src="Source SE/2.png" alt="">
        <img class="px-5 py-3" src="Source SE/3.png" alt="">
        <img class="px-5 py-3" src="Source SE/4.png" alt="">
        <br>
    </div>
    <br>
    <br>

    <!--Pelajaran-->
    <div class="container-fluid text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Inggris.jpg" alt="">
                    <p class="h5 p-2">Bahasa Inggris</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Indonesia.png" alt="">
                    <p class="h5 p-2">Pancasila dan Kewarganegaraan</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Mandarin.png" alt="">
                    <p class="h5 p-2">Bahasa Mandarin</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Matematika.png" alt="">
                    <p class="h5 p-2">Matematika</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Biologi.png" alt="">
                    <p class="h5 p-2">Biologi</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Kimia.png" alt="">
                    <p class="h5 p-2">Kimia</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Fisika.png" alt="">
                    <p class="h5 p-2">Fisika</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Komputer.png" alt="">
                    <p class="h5 p-2">Komputer</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Olahraga.png" alt="">
                    <p class="h5 p-2">Olahraga</p>
                </div>
            </div>
            <div class="col">
                <div class="course-bg rounded-5">
                    <img class="pt-3" src="Source SE/Sosiologi.png" alt="">
                    <p class="h5 p-2">Sosiologi</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <p class="h4 text-center">Banyak pelajaran yang dapat dipelajari</p>
        <div class="text-center">
            <button class="btn mod-btn button rounded-pill">
                <a class="nav-link" href="course.html">Jelajahi semua pelajaran</a>
            </button>
        </div>
    </div>
    <br>

    <!--Include Bootstrap-->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

</body>

</html>