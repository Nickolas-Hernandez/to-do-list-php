<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List PHP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>To Do List&colon;</h1>
  <form action="../api/todos.php" method="POST" class="new-to-do-form">
      <input type="text" name="to_do" class="new-to-do-input" maxlength="40">
      <button class="fas fa-plus-square plus-icon"></button>
  </form>
  <div>
    <?php echo $_SERVER['REQUEST_URI']; ?>
  </div>
  <!-- <script src="main.js"></script> -->
</body>
</html>