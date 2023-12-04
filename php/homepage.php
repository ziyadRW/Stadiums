<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["account_type"])) {
    include("connection.php");
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
            rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
        </script>
        <style>
            .item {
                transition: 0.5s ease-in-out;
            }

            .item:hover {
                filter: brightness(80%);
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand mainBG fixed-top">
            <div class="container">
                <a class="navbar-brand mb-0 h1 rounded-3 shadow p-2 bg-light bg-opacity-25" href="#">
                    <img src="../images/411766_1c2bb3d0f20c4b209b5b9b5cba70b462~mv2.webp" style="width: 45px" />
                    Stadiums
                </a>

                <div id="navbarNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="#" class="nav-link active ml-2 position-relative current">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="mymsg.php" class="nav-link position-relative">Help</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                    </ul>
                        <form action="" method="POST" class="search-bar" id="searchform">
                            <input id="searchtxt" name="search" pattern=".*\S.*" placeholder="Search.." required>
                             <button class="search-btn" name="submit-search" type="submit">
                                <span class="material-symbols-outlined"> search </span>
                            </button>
                        </form>

                </div>
                <div class="justify-end">
                    <button id="logout-btn" class="btn btn-danger h1 shadow  ">Logout</button>
                    <script>
                        let loggedBtn = document.querySelector('#logout-btn');
                        loggedBtn.addEventListener(`click`, () => {
                            location.href = "logged-out.php"

                        });

                    </script>
                </div>
            </div>
        </nav>

        <div class="container mt-6">
            <div data-mdb-animation="fade-in-down" class="row justify-content-center text-center mb-3  ">
                <h1 class="w-25 bg-light shadow rounded-4  p-4">
                    <?php
                    echo 'Hi ' . $_SESSION["first_name"];
                    ?>
                </h1>
            </div>

            <div id="addStadium" class="row d-flex justify-content-end mb-5 rounded-3 d-none">
                <div class="col-2 d-flex">
                    <button class="btn btn-primary p-3" data-bs-toggle="modal" data-bs-target="#addingStadium">
                        + Add A New Stadium
                    </button>
                </div>
            </div>
            <?php
            if ($_SESSION["account_type"] === "owner") {

                echo "
                <script>
                const tmp = document.querySelector('#addStadium');
                if(tmp.classList.contains('d-none')){
                    tmp.classList.remove('d-none');
                }
                
                </script>
                ";

            } else {
                echo "
                <script>
                const tmp = document.querySelector('#addStadium');
                if(! tmp.classList.contains('d-none')){
                    tmp.classList.add('d-none');
                }
                
                </script>
                ";
            }

            ?>
            <div class="modal fade" id="addingStadium">
                <div class="moadal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 rounded-4 ">
                        <div class="modal-header h2 justify-content-center">Adding a new Stadium</div>
                        <div class="modal-body">
                            <form action="addStadium.php" method="post" novalidate enctype="multipart/form-data">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="stadiumName" placeholder=""
                                        name="stadiumName" required />
                                    <label for="stadiumName">Stadium name</label>
                                </div>
                                <hr class="hr">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="stadiumDescription" name="stadiumDescription"
                                        placeholder="" style="height:150px;" required></textarea>
                                    <label for="stadiumDescription">Stadium Description</label>
                                </div>
                                <hr class="hr">
                                <h5>Stadium's location:</h5>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Country</span>
                                    <input type="text" class="form-control" name="countryName" required>
                                    <span class="input-group-text">City</span>
                                    <input type="text" class="form-control" name="cityName" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Street address</span>
                                    <input type="text" class="form-control" name="street" required>
                                </div>
                                <hr class="hr">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Number of seats:</span>
                                    <input type="number" id="numOfSeats" class="form-control" min="0" max="100000"
                                        name="numOfSeats" required>
                                    <span class="input-group-text">seats</span>
                                </div>
                                <div id='reachMaxMinSeats' class="mb-3 alert alert-warning d-none">
                                    <p class="d-none" id="pp1">Sorry, you've reached the minmumm number of seats</p>
                                    <p class="d-none" id="pp2">Sorry, you've reached the maxiumum number of seats</p>
                                </div>
                                <script>
                                    let numOfSeats = document.getElementById(`numOfSeats`);

                                    numOfSeats.addEventListener(`input`, () => {

                                        if (numOfSeats.value == numOfSeats.getAttribute(`max`)) {
                                            ;
                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }

                                            tmp = document.getElementById(`pp2`);
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp1`);
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                        else if (numOfSeats.value == numOfSeats.getAttribute(`min`)) {

                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp1`);
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp2`);
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                        else {
                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                    })
                                </script>

                                <div class=" mb-3">
                                    <hr class="hr">
                                    <label for="stadiumImages" class="form-label">Please insert stadium's
                                        images:</label>
                                    <input type="file" id="stadiumImages" class="form-control" name="stadiumImages[]"
                                        accept=".png, .jpg, .jpeg" required multiple>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="submit" class="form-control btn-primary btn  ">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($_SESSION["account_type"] === "owner") {
                    $query = "SELECT * FROM staduim_info WHERE stadium_owner='$_SESSION[first_name]'";
                } else {
                    $query = "SELECT * FROM staduim_info";
                }
                $result = mysqli_query($conn, $query);

                if (isset($_POST['submit-search'])){
                    $search= mysqli_real_escape_string($conn, $_POST['search']);
                    $sql= "SELECT * FROM staduim_info WHERE stadium_name LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                     $queryResult = mysqli_num_rows($result); 
                    
                }
                
                foreach ($result as $row) {
                    ?>
                    <div class="col-4 mb-5 ">
                        <div class="card shadow" style="cursor:pointer;" data-hello=<?php echo $row['id']; ?>>
                            <img src="uploads/<?php $jsony = json_decode($row['stadium_img_url']);
                            echo $jsony[0]; ?>" class="card-img-top " data-hello=<?php echo $row['id']; ?> alt="" />
                            <div class="card-body " data-hello=<?php echo $row['id']; ?>>
                                <h2 class="card-title text-center " data-hello=<?php echo $row['id']; ?>>
                                    <?php echo $row['stadium_name']; ?>
                                </h2>
                                <div class="card-text " data-hello=<?php echo $row['id']; ?>>
                                    <?php echo $row['stadium_description']; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                } ?>
            </div>
            <div class="modal fade" id="previewStadium">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 rounded-4 ">
                        <div class="modal-header h3 justify-content-center">Preview stadium info</div>
                        <div class="modal-body">
                            <?php
                            $query = "SELECT * FROM staduim_info WHERE id='$_GET[stadiumId]'";
                            $result = mysqli_query($conn, $query);

                            $row = mysqli_fetch_assoc($result);

                            ?>
                            <div class="row mb-3  align-items-center justify-content-evenly">
                                <?php
                                foreach (json_decode($row['stadium_img_url']) as $img): ?>
                                    <div class="item  mb-3 d-flex align-items-center bg-light rounded-4 shadow justify-content-center "
                                        style="width:180px; height:180px;">
                                        <a href="uploads/<?php echo $img; ?>" data-fancybox="gallery1" class="fancybox">
                                            <img src="uploads/<?php echo $img; ?>" alt="" width="150px" height="150px"
                                                class="p-2 ">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Stadium name:
                                </span>
                                <input type="text" class="form-control" disabled
                                    value='<?php echo $row['stadium_name']; ?>' />

                            </div>
                            <hr class="hr">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="stadiumDescription" name="stadiumDescription"
                                    placeholder="" style="height:150px;"
                                    disabled><?php echo $row['stadium_description']; ?></textarea>

                            </div>
                            <hr class="hr">
                            <h5>Stadium's location:</h5>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Country</span>
                                <input type="text" class="form-control" name="countryName"
                                    value="<?php echo $row['stadium_country'] ?>" disabled>
                                <span class="input-group-text">City</span>
                                <input type="text" class="form-control" name="cityName"
                                    value="<?php echo $row['stadium_city'] ?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Street address</span>
                                <input type="text" class="form-control" name="street"
                                    value="<?php echo $row['stadium_street'] ?>" disabled>
                            </div>
                            <hr class="hr">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Number of seats:</span>
                                <input type="number" id="numOfSeats" class="form-control" disabled
                                    value="<?php echo $row['stadium_seats']; ?>">
                                <span class="input-group-text">seats</span>
                            </div>



                            <form action="#" method="post">
                                <div class="row mt-4 g-2 text-center ">
                                    <div class="col ">
                                        <input type="checkbox" class="btn-check " id="btn-check1" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check1">
                                            <h1 id="a1"></h1>
                                            <p id="b1"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check2">
                                            <h1 id="a2"></h1>
                                            <p id="b2"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="btn-check3" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check3">
                                            <h1 id="a3"></h1>
                                            <p id="b3"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="btn-check4" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check4">
                                            <h1 id="a4"></h1>
                                            <p id="b4"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="btn-check5" name="stadium_date[]"
                                            autocomplete="off">
                                        <label class="btn btn-primary" for="btn-check5">
                                            <h1 id="a5"></h1>
                                            <p id="b5"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check " id="btn-check6" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check6">
                                            <h1 id="a6"></h1>
                                            <p id="b6"></p>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="btn-check7" autocomplete="off"
                                            name="stadium_date[]">
                                        <label class="btn btn-primary" for="btn-check7">
                                            <h1 id="a7"></h1>
                                            <p id="b7"></p>
                                        </label>
                                    </div>
                                    <script>

                                        let date = new Date();
                                        let day = date.getDay() + 1;
                                        let getDate = date.getDate() + 1;
                                        let month = date.getMonth() + 1;
                                        let year = date.getFullYear();
                                        let Days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                                        if (day == 7)
                                            day = 0;
                                        if (getDate == 31) {
                                            getDate = 1;
                                            month++;
                                        }
                                        for (let i = 1; i <= 7; i++) {
                                            let dateTmp = getDate++ + "/" + month + "/" + year;
                                            document.getElementById('btn-check' + i).setAttribute('value', dateTmp)
                                            document.getElementById('a' + i).append(Days[day++]);
                                            document.getElementById('b' + i).append(dateTmp);

                                            <?php
                                            if ($_SESSION["account_type"] === "owner") {
                                                ?>
                                                document.getElementById('btn-check' + i).setAttribute("disabled", "");
                                            <?php } ?>

                                        }
                                    </script>
                                    <script>
                                        let temppp;
                                        <?php
                                        $conect = mysqli_connect('localhost', 'root', 'mysql', '381Project');
                                        $tempQuery1 = "SELECT * FROM temp_table WHERE stadium_id='$_GET[stadiumId]'";
                                        $tempResult1 = mysqli_query($conect, $tempQuery1);
                                        if (mysqli_num_rows($tempResult1) > 0) {
                                            foreach ($tempResult1 as $value) {
                                                foreach (json_decode($value['tmpVal']) as $keyTmp) {
                                                    ?>
                                                    <?php
                                                    ?>
                                                    temppp = document.querySelector("input[value='<?php echo $keyTmp ?>']");
                                                    temppp.setAttribute("disabled", "");
                                                    temppp = document.querySelector(`label[for=${temppp.id}]`);
                                                    <?php
                                                    if ($value['stadium_renter'] === $_SESSION["username"] || $_SESSION["account_type"] === "owner") { ?>
                                                        if (temppp.classList.contains('btn-primary')) {
                                                            temppp.classList.remove('btn-primary');
                                                            temppp.classList.add('btn-success');
                                                        }
                                                    <?php } else { ?>
                                                        if (temppp.classList.contains('btn-primary')) {
                                                            temppp.classList.remove('btn-primary');
                                                            temppp.classList.add('btn-danger');
                                                        }
                                                    <?php } ?>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        let temppp1;
                                    </script>
                                    <div class="mb-3 mt-3">
                                        <input type="submit" name="submit" id="submitDate"
                                            class="form-control btn-primary btn  ">
                                    </div>
                            </form>
                            <?php
                            if ($_SESSION["account_type"] === "owner") {
                                ?>
                                <script>
                                    document.getElementById('submitDate').setAttribute("class", "d-none");
                                </script>
                            <?php } ?>
                            <?php
                            if (isset($_POST['stadium_date'])) {
                                $counter = count($_POST['stadium_date']);
                                for ($i = 0; $i < $counter; $i++) {
                                    $tmpValue = $_POST['stadium_date'][$i];
                                    $filesArray[] = $tmpValue;
                                    ?>
                                    <script>
                                        temppp1 = document.querySelector("input[value='<?php echo $tmpValue ?>']");
                                        temppp1.setAttribute("disabled", "");
                                        temppp1 = document.querySelector(`label[for=${temppp1.id}]`);
                                        if (temppp1.classList.contains('btn-primary')) {
                                            temppp1.classList.remove('btn-primary');
                                            temppp1.classList.add('btn-success');
                                        }
                                    </script>

                                    <?php

                                }
                                $filesArray = json_encode($filesArray);
                                $tempQuery = "INSERT INTO temp_table(tmpVal ,stadium_renter	, stadium_id) VALUES('$filesArray' , '$_SESSION[username]' , '$row[id]')";
                                $tempResult = mysqli_query($conect, $tempQuery);
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            function sendDataGet(tmp) {
                let tmppp = document.getElementById("subTemp");

                tmppp.setAttribute("value", tmp);
                document.getElementById("subTemp").click();

            }
        </script>
        <form action="" method="get">
            <input type="submit" id="subTemp" name="stadiumId" hidden value="">
        </form>

        <script>

            document.addEventListener('click', (e) => {

                if (e.target.dataset.hello != null) {

                    let ajaxTmp = e.target.dataset.hello;
                    console.log(ajaxTmp);
                    sendDataGet(ajaxTmp);

                    $('#previewStadium').modal('toggle');

                }
            })

        </script>

        <script>
            let form = document.querySelector(`form`);
            form.addEventListener(`submit`, (e) => {
                if (!form.checkValidity()) e.preventDefault();
                form.classList.add(`was-validated`);
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

        <?php if (isset($_GET['stadiumId'])) { ?>
            <script>
                $(window).load(function () {
                    $('#previewStadium').modal('toggle');
                });
            </script>
        <?php } ?>
    </body>

    </html>
    <?php

} else {
    header("location:index.php?error=Please login first!");
    exit();
}
?>