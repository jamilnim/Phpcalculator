<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Calculator</title>
  <style>
    body { font-family: Arial; display: flex; justify-content: center; margin-top: 50px; }
    .calculator { width: 220px; }
    .display {
      height: 50px; background: #222; color: white;
      font-size: 24px; text-align: right; padding: 10px;
    }
    .buttons {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 5px;
      margin-top: 10px;
    }
    button {
      height: 50px; font-size: 18px;
      background: #f1f1f1; border: none; cursor: pointer;
    }
    button.operator { background: #ffa500; color: white; }
    button.equal { background: #4CAF50; color: white; grid-column: span 2; }
    button.clear { background: #f44336; color: white; }
  </style>
</head>
<body>

<div class="calculator">
  <form method="post">
    <div class="display"><?php echo $_POST['display'] ?? '0'; ?></div>
    <input type="hidden" name="display" value="<?php echo $_POST['display'] ?? ''; ?>">
    <div class="buttons">
      <?php
      $buttons = [
        '7', '8', '9', '+',
        '4', '5', '6', '-',
        '1', '2', '3', '*',
        '0', '.', '=', '/',
        'C'
      ];
      foreach ($buttons as $btn) {
        $class = '';
        if (in_array($btn, ['+', '-', '*', '/'])) $class = 'operator';
        if ($btn == '=') $class = 'equal';
        if ($btn == 'C') $class = 'clear';
        echo "<button type='submit' name='btn' value='$btn' class='$class'>$btn</button>";
      }
      ?>
    </div>
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $display = $_POST['display'] ?? '';
  $btn = $_POST['btn'] ?? '';

  if ($btn == 'C') {
    $display = '';
  } elseif ($btn == '=') {
    // Security: allow only numbers and math symbols
    if (preg_match('/^[0-9+\-*/.() ]+$/', $display)) {
      eval("\$display = $display;");
    } else {
      $display = 'Error';
    }
  } else {
    $display .= $btn;
  }

  // Redisplay form with updated display
  echo "<script>
    document.querySelector('input[name=\"display\"]').value = \"$display\";
    document.querySelector('.display').innerText = \"$display\";
  </script>";
}
?>

</body>
</html>
