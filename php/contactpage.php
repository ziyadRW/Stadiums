<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["account_type"])) {
    include("connection.php");
    // تصميم اولي جدا يحتاج تعديل 
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
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
                            <a href="homepage.php" class="nav-link active ml-2 position-relative current">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative">Help</a>
                        </li>
                        <li class="nav-item active">
                            <a href="contactpage.php" class="nav-link position-relative">Contact</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                    </ul>
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
                <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            echo "";
          }
        ?>
        
        <div class="details">
          <span><?php echo $row['first_name']. " " . $row['last_name'] ?></span>
          <p><?php echo $row['id']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
                </h1>
            </div>
            <script src="javascript/chat.js"></script>

</body>
</html>
<?php 
}
?>