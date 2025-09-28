<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Página Escolar</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
            margin-top: 30px;
        }
        .calc-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            max-width: 400px;
        }
        label, input, button, select {
            display: block;
            margin: 5px 0;
        }
        input, select {
            padding: 5px;
            width: 95%;
        }
        button {
            padding: 8px;
            margin-top: 10px;
        }
        .resultado {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
  <h1>Mi Página Personal</h1>
  
  <p><strong>Nombre:</strong> Maldonado Dominguez Dinkey Jason</p>
  <p><strong>Grado y Grupo:</strong> 5AVPR</p>
  <p><strong>Turno:</strong> Vespertino</p>
  <p><strong>Escuela:</strong> CBTIS 111</p>

  <h1>Calculadoras Escolares</h1>

  <!-- Formulario único -->
  <form method="post">

      <!-- Cuadrado -->
      <div class="calc-box">
          <h2>Área de un Cuadrado</h2>
          <label>Lado:</label>
          <input type="number" step="any" name="lado">
          <button type="submit" name="calc" value="cuadrado">Calcular</button>
      </div>

      <!-- Círculo -->
      <div class="calc-box">
          <h2>Área de un Círculo</h2>
          <label>Radio:</label>
          <input type="number" step="any" name="radio">
          <button type="submit" name="calc" value="circulo">Calcular</button>
      </div>

      <!-- Rectángulo -->
      <div class="calc-box">
          <h2>Área de un Rectángulo</h2>
          <label>Base:</label>
          <input type="number" step="any" name="baseRect">
          <label>Altura:</label>
          <input type="number" step="any" name="alturaRect">
          <button type="submit" name="calc" value="rectangulo">Calcular</button>
      </div>

      <!-- Trapecio -->
      <div class="calc-box">
          <h2>Área de un Trapecio</h2>
          <label>Base mayor:</label>
          <input type="number" step="any" name="baseMayor">
          <label>Base menor:</label>
          <input type="number" step="any" name="baseMenor">
          <label>Altura:</label>
          <input type="number" step="any" name="alturaTrap">
          <button type="submit" name="calc" value="trapecio">Calcular</button>
      </div>

      <!-- Triángulo -->
      <div class="calc-box">
          <h2>Área de un Triángulo</h2>
          <label>Base:</label>
          <input type="number" step="any" name="baseTri">
          <label>Altura:</label>
          <input type="number" step="any" name="alturaTri">
          <button type="submit" name="calc" value="triangulo">Calcular</button>
      </div>

      <!-- Rombo -->
      <div class="calc-box">
          <h2>Área de un Rombo</h2>
          <label>Diagonal mayor:</label>
          <input type="number" step="any" name="diagMayor">
          <label>Diagonal menor:</label>
          <input type="number" step="any" name="diagMenor">
          <button type="submit" name="calc" value="rombo">Calcular</button>
      </div>

      <!-- Conversor -->
      <div class="calc-box">
          <h2>Conversor de Monedas</h2>
          <label>Cantidad:</label>
          <input type="number" step="any" name="cantidadMoneda">

          <label>Conversión:</label>
          <select name="conversion">
              <option value="mxn-usd">Pesos → Dólares</option>
              <option value="usd-mxn">Dólares → Pesos</option>
              <option value="usd-eur">Dólares → Euros</option>
              <option value="eur-usd">Euros → Dólares</option>
              <option value="mxn-eur">Pesos → Euros</option>
              <option value="eur-mxn">Euros → Pesos</option>
          </select>

          <button type="submit" name="calc" value="moneda">Convertir</button>
      </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calc"])) {
      $op = $_POST["calc"];
      echo "<div class='resultado'>";

      switch($op) {
          case "cuadrado":
              $lado = $_POST["lado"];
              echo "Área del cuadrado = " . ($lado * $lado);
              break;

          case "circulo":
              $radio = $_POST["radio"];
              echo "Área del círculo = " . round(pi() * $radio * $radio, 2);
              break;

          case "rectangulo":
              $base = $_POST["baseRect"];
              $altura = $_POST["alturaRect"];
              echo "Área del rectángulo = " . ($base * $altura);
              break;

          case "trapecio":
              $B = $_POST["baseMayor"];
              $b = $_POST["baseMenor"];
              $h = $_POST["alturaTrap"];
              echo "Área del trapecio = " . ((($B + $b) * $h) / 2);
              break;

          case "triangulo":
              $base = $_POST["baseTri"];
              $altura = $_POST["alturaTri"];
              echo "Área del triángulo = " . (($base * $altura) / 2);
              break;

          case "rombo":
              $D = $_POST["diagMayor"];
              $d = $_POST["diagMenor"];
              echo "Área del rombo = " . (($D * $d) / 2);
              break;

          case "moneda":
              $cantidad = $_POST["cantidadMoneda"];
              $tipo = $_POST["conversion"];
              $tasas = [
                  "mxn-usd" => 0.055,
                  "usd-mxn" => 18.2,
                  "usd-eur" => 0.93,
                  "eur-usd" => 1.07,
                  "mxn-eur" => 0.051,
                  "eur-mxn" => 19.5
              ];
              $resultado = $cantidad * $tasas[$tipo];
              echo "Resultado de la conversión = " . round($resultado, 2);
              break;
      }

      echo "</div>";
  }
  ?>

</body>
</html>

