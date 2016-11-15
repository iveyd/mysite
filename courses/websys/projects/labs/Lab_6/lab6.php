<?php 
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...
      if (!is_numeric($o1) || !is_numeric($o2)) {
        throw new Exception('Non-numeric operand.');
      }
      
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }


// Part 1 - Add subclasses for Subtraction, Multiplication and Division here

  class Subtraction extends Operation {
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

  class Multiplication extends Operation {
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

  class Division extends Operation {
    public function operate() {
      return $this->operand_1 / $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

  class Cube extends Operation {
    public function operate() {
      return $this->operand_1 * $this->operand_1 * $this->operand_1;
    }
    public function getEquation() {
      return $this->operand_1 . '^3 = ' . $this->operate();
    }
  }

  class Factorial extends Operation {
    public function operate() {
      $num = $this->operand_1;
      $value = $num;
      if ($num >= 0) {
        while ($num > 0) {
          $value *= $num;
          $num -= 1;
        }
        return $value;
      } else {
        while ($num < 0) {
          $value *= $num;
          $num += 1;
        }
        return $value;
      }
    }
    public function getEquation() {
      return $this->operand_1 . '! = ' . $this->operate();
    }
  }

// End Part 1




// Some debugs - un comment them to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";




// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }

// Put the code for Part 2 here  //

    if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }

    if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }

    if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }

    if (isset($_POST['cube']) && $_POST['cube'] == 'Cube') {
      if ($o1 == "" && $o2 != ""){$o1 = $o2;}
      $op = new Cube($o1, 0);
    }

    if (isset($_POST['fact']) && $_POST['fact'] == 'Factorial') {
      if ($o1 == "" && $o2 != ""){$o1 = $o2;}
      $op = new Factorial($o1, 0);
    }





// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
  <title>Lab 7</title>
  <style>
    pre {
      border: 2px solid black;
      height: 50px;
      width: 200px;
    }
    input {
      height: 25px;
      width: 100px;
    }
    #cont {
      margin: 25px 50px;
    }
    #op1, #op2 {
      width: 200px;
    }
    #opBox {
      width: 50px;
      margin: 0 75px;
    }
    #ops {
      display: block;
      width: 300px;
    }
    #nums {
      margin-top: 25px;
      display: block;
      width: 300px;
    }
    #result {
      background-color: white;
    }
    #calc {
      background-color: lightgrey;
      border: 5px solid black;
      width: 300px;
      height: 550px;
    }
    #neBut, #clBut {
      margin-top: 15px;
      width: 200px;
      height: 25px;
    }
    #explain {
      float: right;
      display: block;
      width: 600px;
      margin-right: 50px;
      text-align: justify;
    }
  </style>
</head>
<body>
  <div id="explain">
  <p>For this Calulator, type into the number pad. after you have typed your
  your first number, click "Next" and enter your second number. After you
  have your second number, select your operator.</p>
  <p><strong>Note:</strong> the "Cube" and "Factorial" operations only require one number.<p>
  </div>
  <div id="calc">
    <div id="cont">
      <pre id="result">
      <?php 
        if (isset($op)) {
          try {
            echo $op->getEquation();
          }
          catch (Exception $e) { 
            $err[] = $e->getMessage();
          }
        }
          
        foreach($err as $error) {
            echo $error . "\n";
        } 
      ?>
      </pre>
      <form method="post" action="lab6.php">
        <?php $num = '';$operation = '';$value = '';$op1 = '';$op2 = '';?>
        <input type="text" name="op1" id="op1" value="" /><br/>
        <input type="text" name="op2" id="op2" value="" />
        <br/><br/>
        <!-- Only one of these will be set with their respective value at a time -->
        <div id="ops">
          <input type="submit" name="add" value="Add"/>  
          <input type="submit" name="sub" value="Subtract"/> 
          <input type="submit" name="mult" value="Multiply"/> 
          <input type="submit" name="div" value="Divide"/> 
          <input type="submit" name="cube" value="Cube"/> 
          <input type="submit" name="fact" value="Factorial"/> 
        </div>
        <div id="nums">
          <input type="button" value="1"/>
          <input type="button" value="2"/>
          <input type="button" value="3"/>
          
          <input type="button" value="4"/>
          <input type="button" value="5"/>
          <input type="button" value="6"/>
      
          <input type="button" value="7"/>
          <input type="button" value="8"/>
          <input type="button" value="9"/>
           
          <input type="button" value="0"/>
          <input id="neBut" type="button" value="Next"/>
          <input id="clBut" type="button" value="Clear"/>
        </div>
      </form>
    </div>
  </div>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script>
    var num = "";
    var field = 1;
    $("input:button").click( function(e) {
      num += $(this).val();
      if (!($(this).val() == 'Next' || $(this).val() == 'Clear')) {
        if (field) {$("#op1").val(num);}
        else {$("#op2").val(num);}
      }
    });
    $("#neBut").click( function() {
      num = "";
      field = 0;
    });
    $("#clBut").click( function() {
      num = "";
      field = 1;
      $("#op1").val("");
      $("#op2").val("");
      $("pre").html("");
    });
  </script>
</body>
</html>

