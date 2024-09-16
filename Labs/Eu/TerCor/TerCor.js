let indexConfirm = 6;
let indexForFuctions = 0;
let index = 0;
let win = false;

function confirmColorON() {
    if (chanceColorsAndCreateGame == false) {
        // Decrementa o índice de confirmações
        indexConfirm--;

        // Seleciona os valores selecionados pelo usuário
        let firstColor = document.getElementById("select-color1").value;
        let secondColor = document.getElementById("select-color2").value;
        let thirdColor = document.getElementById("select-color3").value;
        let fourthColor = document.getElementById("select-color4").value;
        let fifthColor = document.getElementById("select-color5").value;

        // Armazena os valores selecionados em um array
        let allColors = [
            firstColor,
            secondColor,
            thirdColor,
            fourthColor,
            fifthColor,
        ];

        // Seleciona os div's para a mudança de cor
        let color1 = document.querySelector("div.color1");
        let color2 = document.querySelector("div.color2");
        let color3 = document.querySelector("div.color3");
        let color4 = document.querySelector("div.color4");
        let color5 = document.querySelector("div.color5");

        // Muda a cor de fundo dos divs que já foram escolhidos
        color1.style.backgroundColor = firstColor;
        color2.style.backgroundColor = secondColor;
        color3.style.backgroundColor = thirdColor;
        color4.style.backgroundColor = fourthColor;
        color5.style.backgroundColor = fifthColor;

        let confirmButton = document.querySelector("button.confirm-color");
        confirmButton.textContent = 'Confirmar'

        if (indexConfirm !== 0) {
            // Exibe uma mensagem de alerta informando o número restante de escolhas
            alert("Você ainda tem " + indexConfirm + " escolhas. Faça brilhantemente cada uma.");
        } else {
            tananaGame()
        }
    } else {
        // Lógica para o jogo funcionar
        // Seleciona os valores selecionados pelo usuário
        let colorFirst = document.getElementById("select-color1").value;
        let colorSecond = document.getElementById("select-color2").value;
        let colorThird = document.getElementById("select-color3").value;
        let colorFourth = document.getElementById("select-color4").value;
        let colorFifth = document.getElementById("select-color5").value;

        // Coloca os valores selecionados em um array
        let colors = [colorFirst, colorSecond, colorThird, colorFourth, colorFifth];

        // Seleciona a div onde os balls serão exibidos na interface do usuário
        let displayForGame = document.querySelector("div.answer-client");

        // Itera sobre cada cor selecionada pelo usuário
        for (let j = 0; j < colors.length; j++) {
            // Verifica se a cor está presente no array 'allColors'
            if (allColors.includes(colors[j])) {
                // Se a cor estiver presente, cria uma div para representá-la
                let ballOfTentativa = document.createElement("div");
                // Atribui uma classe à div com base no índice do loop
                ballOfTentativa.className = ("color" + indexForFuctions);
                // Adiciona a bola à interface do usuário
                displayForGame.appendChild(ballOfTentativa);
                // Define a cor da bola como cinza
                ballOfTentativa.style.backgroundColor = colors[index++];

                // Cria uma quebra de linha após adicionar a bola
                let brForBalls = document.createElement("br");
                displayForGame.appendChild(brForBalls);
            }
        }

    }
}


function chanceColorsAndCreateGame() {
    // Seleciona os botões inicias
    let startButton = document.querySelector("button.start-the-game");
    //confirmButton.remove();
    startButton.remove();

    // Seleciona os id's para removelos
    let firstColor = document.getElementById("select-color1");
    let secondColor = document.getElementById("select-color2");
    let thirdColor = document.getElementById("select-color3");
    let fourthColor = document.getElementById("select-color4");
    let fifthColor = document.getElementById("select-color5");

    // Remover os elementos de seleção
    //firstColor.remove();
    //secondColor.remove();
    //thirdColor.remove();
    //fourthColor.remove();
    //fifthColor.remove();

    // Seleciona os div's color de 1 a 5
    let color1 = document.querySelector("div.color1");
    let color2 = document.querySelector("div.color2");
    let color3 = document.querySelector("div.color3");
    let color4 = document.querySelector("div.color4");
    let color5 = document.querySelector("div.color5");

    // Remove a combinação correta
    color1.remove();
    color2.remove();
    color3.remove();
    color4.remove();
    color5.remove();

    tananaGame();

    // Cria um botao para ser usado para o funcionamento do jogo
    //let ballsClientAnswer = document.createElement('button');
    // Atribui um texto no botão
    //ballsClientAnswer.innerText = 'Confirmar';
    // Seleciona a div especifica que o botão irá aparecer
    //let displayGame = document.querySelector('div.display-game');
    // Adiciona na div
    //displayGame.appendChild(ballsClientAnswer);
    // Adiciona o atributo onclick="tananaGame()" no botão
    //ballsClientAnswer.setAttribute('onclick', 'tananaGame()')
}
function tananaGame(allColor) {
    indexForFuctions++;

    let firstText = document.getElementById("textInitial");
    // Limpar o conteúdo do texto explicativo
    firstText.textContent = "Selecione 5 cores e o computador irá verificar, você tem 5 chances.";

    if (indexForFuctions !== 6 && win === false) {
        // Seleciona a div onde as bolas do usuário serão exibidas
        let displayForGame = document.querySelector("div.answer-client");
        
        // Loop para criar e adicionar as bolas do usuário
        for (let i = 0; i < 5; i++) {
            // Cria uma div para representar a bola do usuário
            let ballOfUser = document.createElement("div");
            // Atribui uma classe à div com base no índice do loop
            ballOfUser.className = "ball-user color" + (i + 1) + indexForFuctions;
            // Define a cor da bola com base nas cores selecionadas
            ballOfUser.style.backgroundColor = allColor[i];
            // Adiciona a bola à interface do usuário
            displayForGame.appendChild(ballOfUser);

            // Cria uma quebra de linha após adicionar 5 bolas
            if ((i + 1) % 5 === 0) {
                let brForBalls = document.createElement("br");
                displayForGame.appendChild(brForBalls);
            }
        }
    } else {
        alert("Lamento, mas você não conseguiu acertar dentro das 5 chances. Tente novamente.");
    }
}


function testes() {
    tananaGame();
}