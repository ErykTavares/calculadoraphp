<?php

$output = "";

function cleanAll(){
    setcookie("num1", "", time()-300);
    setcookie("num2", "", time()-300);
    setcookie("operation", "", time()-300);
    setcookie("result", "", time()-300);
    $output = "";
    header("Refresh: 0");
}

function SetNum1(){
    if(!isset($_COOKIE["num1"])){
        setcookie("num1", $_POST["buttonNumber"], time()+300 );
        header("Refresh: 0");
    } 
    if(isset($_COOKIE["num1"]) && !isset($_COOKIE["operation"])){
        setcookie("num1", $_COOKIE["num1"].$_POST["buttonNumber"], time()+300 );
        header("Refresh: 0");
    }

}

function SetNum2(){
    if(!isset($_COOKIE["num2"])){
        setcookie("num2", $_POST["buttonNumber"], time()+300);
        header("Refresh: 0");
    }
    if(isset($_COOKIE["num2"])){
        setcookie("num2", $_COOKIE["num2"].$_POST["buttonNumber"], time()+300);
        header("Refresh: 0");
    }

}

function calculator(){
    $num1 = intval($_COOKIE["num1"]);
    $num2 = intval($_COOKIE["num2"]);

    switch($_COOKIE["operation"]){
        case "+":
            setcookie("result", $num1 + $num2, time()+300);
            header("Refresh: 0");
            break;
        case "-":
            setcookie("result", $num1 - $num2, time()+300);
            header("Refresh: 0");
            break;
        case "*":
            setcookie("result", $num1 * $num2, time()+300);
            header("Refresh: 0");
            break;
        case "/":
            setcookie("result", $num1 / $num2, time()+300);
            header("Refresh: 0");
            break;
        case "%":
            setcookie("result", ($num1 / 100) * $num2, time()+300);
            header("Refresh: 0");
            break;

    }
}

if(isset($_POST["clean"])){
    cleanAll();
}

if(!isset($_COOKIE["result"])){

    if(!isset($_COOKIE["operation"])){
        if(isset($_COOKIE["num1"])){

            $output = $_COOKIE["num1"];
        }
    }

    if(isset($_COOKIE["operation"])){
        if(isset($_COOKIE["num2"])){
            $output = $_COOKIE["num2"];
        }
    }
    
    if(!isset($_POST["buttonOperation"])){
        if(isset($_POST["buttonNumber"])){
            SetNum1();
        }
    }
    
    if(isset($_POST["buttonOperation"])){
        setcookie("operation", $_POST["buttonOperation"], time()+300);
        $output = "";
    }
    
    if(isset($_POST["buttonNumber"]) && isset($_COOKIE["operation"])){
        SetNum2();
    }
}

if(isset($_COOKIE["result"])){
    $output = $_COOKIE["result"];
}

if(isset($_POST["result"])){
    calculator();
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="icon" href="./img/calculator_icon.png">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Calculadora PHP</h1>
    </header>
    <main>
        <section class="calculadora">
            <form action="" method="post">
                <input class="output" type="number"  readonly  name="output" value="<?php echo($output)?>" placeholder="0"> 
                <div class="operations">
                    <button class="button buttonClean" type="submit" name="clean" value="clean" >CE</button>
                    <button class="button" type="submit" name="buttonOperation" value="%" >%</button>
                    <button class="button" type="submit" value="+" name="buttonOperation">+</button>
                    <div class="side">
                        <button class="button" type="submit" name="buttonOperation" value="-" >-</button>
                        <button class="button " type="submit" name="buttonOperation" value="/" >÷</button>
                        <button class="button" type="submit" name="buttonOperation" value="*" >x</button>
                        <button class="button buttonResult" type="submit" name="result" value="result" >=</button>
                    </div>
                </div>
                <div class="numbers">
                    <button class="button" type="submit" value="7" name="buttonNumber">7</button>
                    <button class="button" type="submit" value="8" name="buttonNumber">8</button>
                    <button class="button" type="submit" value="9" name="buttonNumber">9</button>
                    <button class="button" type="submit" value="4" name="buttonNumber">4</button>
                    <button class="button" type="submit" value="5" name="buttonNumber">5</button>
                    <button class="button" type="submit" value="6" name="buttonNumber">6</button>
                    <button class="button" type="submit" value="1" name="buttonNumber">1</button>
                    <button class="button" type="submit" value="2" name="buttonNumber">2</button>
                    <button class="button" type="submit" value="3" name="buttonNumber">3</button>
                    <button class="button buttonZero" type="submit" value="0" name="buttonNumber">0</button>
                    <button class="button buttonDot" type="submit" value="." name="buttonNumber">.</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <a href="https://eryktavares.github.io/instagram_biolinks/" target="_blank"><h6> &copy; Eryk Tavares 2021</h6></a>
        <ul>
            <li><a href="https://github.com/ErykTavares" target="_blank"><img src="./img/git-hub.png" alt="GitHub"></a></li>
            <li><a href="https://www.linkedin.com/in/eryktavares35/" target="_blank"><img src="./img/linkedin.png" alt="Linkedin"></a></li>
            <li><a href="https://www.instagram.com/lord_eryktavares/?hl=pt-br" target="_blank"><img src="./img/instagram.png" alt="Instagram"></a></li>
        </ul>
    </footer>

</body>
</html>