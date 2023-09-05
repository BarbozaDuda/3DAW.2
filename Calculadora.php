<html>
  <head>
    <title>CalculadoraPHP</title>
  </head>
  <body>
    <h1>CALCULADORA PHP</h1>
    <br>
    
    <form method="post" action="indexCalc.php"> 
      
    <input type="number" name="num1" placeholder="Digite o primeiro número"><br><br>
		<input type="number" name="num2" placeholder="Digite o segundo número"><br><br>
      
    <input type="submit" name="add" value="+">
		<input type="submit" name="sub" value="-">
		<input type="submit" name="mult" value="x">
		<input type="submit" name="div" value="/">
    </form>

  <?php
		if(isset($_POST['add']))
    {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$resultado = $num1 + $num2;
			echo "O resultado da soma é: " . $resultado;
		}

		if(isset($_POST['sub']))
    {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$resultado = $num1 - $num2;
			echo "O resultado da subtração é: " . $resultado;
		}

		if(isset($_POST['mult']))
    {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$resultado = $num1 * $num2;
			echo "O resultado da multiplicação é: " . $resultado;
		}

		if(isset($_POST['div']))
    {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];

			if($num2 == 0)
      {
				echo "Não é possível dividir por zero!";
			}
      else 
      {
				$resultado = $num1 / $num2;
				echo "O resultado da divisão é: " . $resultado;
			}
		}
	?>
  
 </body>
</html>