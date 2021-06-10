<?php

require_once "../src/get-todos.php";

?>
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
  <form action="" method="POST" class="new-to-do-form">
      <input type="text" name="task" class="new-to-do-input" maxlength="40">
      <button class="fas fa-plus-square plus-icon"></button>
  </form>
  <div class="to-dos-container">
    <?php
      while($row = mysqli_fetch_assoc($result)){
        $className = $row['isCompleted'] === "false" ? "task" : "task completed";
        ?>
        <div class="<?php echo  $className ?>" id="<?php echo $row['id'] ?>">
          <p><?php echo $row['task'] ?></p>
          <i class="fas fa-check-square check-icon"></i>
          <i class="fas fa-minus-square delete-icon"></i>
        </div>
        <?php
      }
    ?>
  </div>
  <style>
    /* task styles */
      .check-icon,
      .delete-icon {
        margin-left: auto;
        font-size: 20px;
        cursor: pointer;
        color: #008952;
      }

      .delete-icon {
        color: #BC5D5D;
        margin: 0 .2rem;
      }

      .check-icon:hover,
      .delete-icon:hover {
        transform: scale(1.1);
      }

      .task.completed {
        opacity: 60%;
      }

      .task.completed > p {
        text-decoration: line-through;
      }

      @media only screen and ( min-width: 768px){
        .check-icon,
        .delete-icon {
          font-size: 24px;
        }
      }
  </style>
  <script src="main.js"></script>
</body>
</html>
