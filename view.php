<?php
include('database.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted
    $email = test_input($_POST["email"]);
    $rv = test_input($_POST["rv"]);

    if (insertContent($email, $rv)) {
        // Content added successfully
        echo "Content added successfully.";
    } else {
        // Content submission failed
        echo "Content submission failed.";
    }
}
function test_input($data) {
    $data = trim($data);           // Remove leading and trailing spaces
    $data = stripslashes($data);   // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}


$content = getContent(); // Retrieve content from the database
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Content</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <header class="header">
    <div class="header-1">
        <a href="#" class="logo"> <em class="fas fa-book"></em> news</a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="icons">
            <!-- using icons from fontaewsome web -->
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <div id="order-btn" class="fas fa-shopping-cart"></div>
            <div id="login-btn" class="fas fa-user"></div>
        </div>
    </div>   
        <div class="header-2">
            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#featured">featured</a>
                <a href="#yourreview">reviews</a>
               
            </nav>
        </div>
    
  </header>

    

    <main>
        <div class="yourreview-container">
            <section class="yourreview" id="yourreview">
                <h3>Viewing Content</h3>

                <?php
                if (!empty($content)) {
                    foreach ($content as $row) {
                        echo "<p>Email: " . $row['email'] . "</p>";
                        echo "<p>Review: " . $row['rv'] . "</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "No content available.";
                }
                ?>

                <a href="index.html">Back to Add Content</a>
            </section>
        </div>
    </main>

    <footer>
        <!-- Your footer content -->
        <section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Toronto </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Calgary </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Vancouver </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Ottawa </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> jaycee@gmail.com </a>
            <img src="img/worldmap.png" class="map" alt="">
        </div>
        
    </div>

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit"> created by <span>Tran</span> | all rights reserved! </div>

</section>
    </footer>
</body>
</html>
