<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lessons</title>
  <link rel="stylesheet" href="css/style.css">
  <meta name="description" content="Description of your website">

  <!-- Add Open Graph meta tags if needed -->
  <meta property="og:title" content="Your Website Title">
  <meta property="og:type" content="website">
  <meta property="og:url" content="URL of your website">
  <meta property="og:image" content="URL of your website image">

  <!-- Add favicon and other icons -->
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" href="/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">

  <!-- Add web app manifest file and theme color -->
  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
</head>
<body>

<!-- Header -->
<header>
  <!-- Logo and Site Title -->
  <div class="logo">
    <a href="index.html"><img src="icon.png" alt="Your Website Logo"></a>
    <h1><a href="index.html">Aepp Fratzakis</a></h1>
  </div>

  <!-- Navigation Menu -->
  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="lessons.php">Lessons</a></li>
      <li><a href="exercises.html">Exercises</a></li>
      <li><a href="test_upload.html">Upload</a></li>
    </ul>
  </nav>
</header>

<main>
  <section class="lesson-list">
    <?php
    $dir = 'uploads/lesson'; // Adjust the path to your JSON files directory
    
    $jsonFiles = glob($dir . '/*.json');
    
    foreach ($jsonFiles as $file) {
        $jsonContent = file_get_contents($file);
        $lesson = json_decode($jsonContent, true); // Assuming each file contains a single lesson object
        
        echo '<div class="lesson">';
        echo '<img src="' . htmlspecialchars($lesson['imagePath']) . '" alt="' . htmlspecialchars($lesson['title']) . '">';
        echo '<div class="lesson-content">';
        echo '<h2 class="lesson-title">' . htmlspecialchars($lesson['title']) . '</h2>';
        echo '<p class="lesson-summary">' . htmlspecialchars($lesson['content']) . '</p>';
        echo '</div></div>';
    }
    ?>
  </section>
</main>

<!-- Footer -->
<footer>
  <p>© 2024 Aepp Fratzakis</p>
</footer>

</body>
</html>
