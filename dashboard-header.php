<?php include 'session.php';
session_start();
if(isSession()== false){
    header('Location: login.php');
}
if(isset($_GET["logout"])){
    destroySession();
}
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     destroySession();
// }
?>
<header class="position-fixed width100 m-0 p-0 z-index-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand font-weight-bold" href="#">Razor</a>
                <a class="nav-link deco-none text-secondary" href="index.php">Home <span class="sr-only">(current)</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav width100 justify-content-end">
                    <li class="nav-item nav-link">
                        <?php echo $_SESSION["email"]?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                        <form action="" method="get">
                            <button type="submit" class="btn button-design rounded width100" name="logout">
                            <i class="fas fa-sign-out-alt"></i>Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>