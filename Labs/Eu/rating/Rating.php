<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include("includes/conn.php");?>
    <title>ViewRating</title>
</head>
<!--JavaScript-->
<script>
    function calcularRating() {
        let checkbox1 = document.getElementById("brancas").checked;
        let checkbox2 = document.getElementById("negras").checked;
        let checkbox3 = document.getElementById("empate").checked;
        let rating1 = parseInt(document.getElementById("rating01").value);
        let rating2 = parseInt(document.getElementById("rating02").value);
        let nome1 = document.getElementById("Nome1").value;
        let nome2 = document.getElementById("Nome2").value;
        let diferenca = rating1 - rating2;
        if (checkbox1 && checkbox2 || checkbox1 && checkbox3 || checkbox3 && checkbox2 || checkbox1 && checkbox2 && checkbox3) {
            alert("ERRO");
        } else if (checkbox1) {
            if (diferenca <= 0 && diferenca < 20) {
                rating1 = rating1 + 6;
                rating2 = rating2 - 6;
            } else if (diferenca >= 20 && diferenca < 40) {
                if (rating1 > rating2) {
                    rating1 = rating1 + 5;
                    rating2 = rating2 - 5;
                } else {
                    rating1 = rating1 + 8;
                    rating2 = rating2 - 8;
                }
            } else if (diferenca >= 40 && diferenca < 60) {
                if (rating1 > rating2) {
                    rating1 = rating1 + 3.5;
                    rating2 = rating2 - 3.5;
                } else {
                    rating1 = rating1 + 10;
                    rating2 = rating2 - 10;
                }
            } else if (diferenca >= 60 && diferenca < 80) {
                if (rating1 > rating2) {
                    rating1 = rating1 + 2;
                    rating2 = rating2 - 2;
                } else {
                    rating1 = rating1 + 15;
                    rating2 = rating2 - 15;
                }
            } else if (diferenca >= 80 && diferenca < 100) {
                if (rating1 > rating2) {
                    rating1 = rating1 + 1.5;
                    rating2 = rating2 - 1.5;
                } else {
                    rating1 = rating1 + 18;
                    rating2 = rating2 - 18;
                }
            } else if (diferenca >= 100) {
                if (rating1 > rating2) {
                    rating1 = rating1 + 1;
                    rating2 = rating2 - 1;
                } else {
                    rating1 = rating1 + 20;
                    rating2 = rating2 - 20;
                }
            }
            alert(nome1 + " seu rating após a vitória é " + rating1);
            alert(nome2 + " seu rating após a derrota é " + rating2);
        } else if (checkbox2) {
            if (diferenca <= 0 && diferenca < 20) {
                rating2 = rating2 + 6;
                rating1 = rating1 - 6;
            } else if (diferenca >= 20 && diferenca < 40) {
                if (rating1 > rating2) {
                    rating2 = rating2 + 5;
                    rating1 = rating1 - 5;
                } else {
                    rating2 = rating2 + 8;
                    rating1 = rating1 - 8;
                }
            } else if (diferenca >= 40 && diferenca < 60) {
                if (rating1 > rating2) {
                    rating2 = rating2 + 3.5;
                    rating1 = rating1 - 3.5;
                } else {
                    rating2 = rating2 + 10;
                    rating1 = rating1 - 10;
                }
            } else if (diferenca >= 60 && diferenca < 80) {
                if (rating1 > rating2) {
                    rating2 = rating2 + 2;
                    rating1 = rating1 - 2;
                } else {
                    rating2 = rating2 + 15;
                    rating1 = rating1 - 15;
                }
            } else if (diferenca >= 80 && diferenca < 100) {
                if (rating1 > rating2) {
                    rating2 = rating2 + 1.5;
                    rating1 = rating1 - 1.5;
                } else {
                    rating2 = rating2 + 18;
                    rating1 = rating1 - 18;
                }
            } else if (diferenca >= 100) {
                if (rating1 > rating2) {
                    rating2 = rating2 + 1;
                    rating1 = rating1 - 1;
                } else {
                    rating2 = rating2 + 20;
                    rating1 = rating1 - 20;
                }
            }
            alert(nome2 + " seu rating após a vitória é " + rating2);
            alert(nome1 + " seu rating após a derrota é " + rating1);
        }
        else if (checkbox3) {
            rating1 = rating1 + 2
            rating2 = rating2 + 2
            alert("Vcs empataram, seu rating Brancas " + rating1 + ", Negras  " + rating2);
        } 
    }
</script>
<!--CSS-->
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: linear-gradient(#1c1c1c, rgb(80, 92, 77), #1c1c1c);
        margin: 0;
    }

    h1 {
        text-align: center;
        font-size: 45px;
        color: #000;
    }

    .Meio {
        display: grid;
        place-items: center;
        max-width: 300px;
        border-radius: 25px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .Campo1,
    .Campo2 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    select,
    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border-radius: 15px;
    }

    .Campo-checkbox {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .check {
        margin-right: 5px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        text-align: center;
        padding: 10px 80px;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }

    /* Estilo para as checkboxes */
    .check {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #4caf50;
        border-radius: 4px;
        cursor: pointer;
        outline: none;
    }

    .check:checked {
        background-color: #4caf50;
        border: 2px solid #4caf50;
    }

    .check:active {
        background-color: #45a049;
        border: 2px solid #45a049;
    }
</style>
<!--HTML-->
<body>
    <h1>Insira o resultado</h1>
    <div class="Meio">
        <div class="Campo1">
            <label>Selecione o Nome:</label>
            <select id="Nome1">
                <option></option>
                <option>Bruno</option>
                <option>Julia</option>
                <option>Scarton</option>
                <option>Samuel</option>
                <option>Jhuan</option>
                <option>Yasmin</option>
                <option>Caio</option>
                <option>Arthur</option>
            </select>
            <label for="Rating01">Rating:
                <input type="number" id="rating01" name="Rating01" placeholder="0000" />
            </label>
        </div>
        <h2>VS</h2>
        <div class="Campo2">
            <label>Selecione o Nome:</label>
            <select id="Nome2">
                <option></option>
                <option>Bruno</option>
                <option>Julia</option>
                <option>Scarton</option>
                <option>Samuel</option>
                <option>Jhuan</option>
                <option>Yasmin</option>
                <option>Caio</option>
                <option>Arthur</option>
            </select>
            <label for="Rating02">Rating:
                <input type="number" id="rating02" name="Rating02" placeholder="0000" />
            </label>
        </div>
        <div class="Campo-checkbox">
            <label for="Brancas">
                <input type="checkbox" class="check" id="brancas" value="Brancas" />
                Brancas Ganhou</label>
            <label for="Negras">
                <input type="checkbox" class="check" id="negras" value="Negras" />
                Negras Ganhou</label>
            <label for="empate">
                <input type="checkbox" class="check" id="empate" value="empate" />
                Empatou</label>
        </div>
        <button id="myButton" onclick="calcularRating()">Calcular</button>
</body>
</html>