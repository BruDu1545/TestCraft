// numero confirmados de alunos matriculado no 8°A
let numStudents8ndA = []
for (let i = 1; i <= 29; i++) {
    numStudents8ndA.push('BRANCO-8°A-N°' + i);
}

// numero confirmados de alunos matriculado no 8°B
let numStudents8ndB = [];
for (let i = 1; i <= 31; i++) {
    numStudents8ndB.push('BRANCO-8°B-N°' + i);
}

// numero confirmados de alunos matriculado no 9°A 
let numStudents9ndA = [];
for (let i = 1; i <= 28; i++) {
    numStudents9ndA.push('AMARELO-9°A-N°' + i);
}

// numero confirmados de alunos matriculado no 9°B 
let numStudents9ndB = [];
for (let i = 1; i <= 31; i++) {
    numStudents9ndB.push('AMARELO-9°B-N°' + i);
}

// numero confirmados de alunos matriculado no 1°A 
let numStudents1ndA = [];
for (let i = 1; i <= 38; i++) {
    numStudents1ndA.push('ROSA-1°A-N°' + i);
}

// numero confirmados de alunos matriculado no 1°B 
let numStudents1ndB = [];
for (let i = 1; i <= 26; i++) {
    numStudents1ndB.push('ROSA-1°B-N°' + i);
}

// numero confirmados de alunos matriculado no 2°A 
let numStudents2ndA = [];
for (let i = 1; i <= 26; i++) {
    numStudents2ndA.push('VERDE-2°A-N°' + i);
}

// numero confirmados de alunos matriculado no 2°B 
let numStudents2ndB = [];
for (let i = 1; i <= 27; i++) {
    numStudents2ndB.push('VERDE-2°B-N°' + i);
}

// numero confirmados de alunos matriculado no 3°A 
let numStudents3ndA = [];
for (let i = 1; i <= 46; i++) {
    numStudents3ndA.push('AZUL-3°A-N°' + i);
}

//indice dos alunos
let index1 = 0;
let index2 = 0;
let index3 = 0;
let index4 = 0;
let index5 = 0;
let index6 = 0;
let index7 = 0;
let index8 = 0;
let index9 = 0;

//indice dos alunos
let indexClass = 0;

//total de alunos 282
let allStudentInSchool = 0;

/*-----------------------------------------------*/


//salas disponiveis para a realização do SAS
let sala10 = [//46 lugares
           ['', '', '', '', '', '', '', '', ''],
           ['', '', '', '', '', '', '', '', '', ''],
/*quadro*/ ['', '', '', '', '', '', '', '', ''],
           ['', '', '', '', '', '', '', '', ''],
           ['', '', '', '', '', '', '', '', ''],
]
let sala25 = [//29 lugares
           ['', '', '', '', '', ''],
           ['', '', '', '', ''],
/*quadro*/ ['', '', '', '', '', ''],
           ['', '', '', '', '', ''],
           ['', '', '', '', '', ''],
]
let sala26 = [//31 lugares
           ['', '', '', '', '', ''],
           ['', '', '', '', '', ''],
/*quadro*/ ['', '', '', '', '', '', ''],
           ['', '', '', '', '', ''],
           ['', '', '', '', '', ''],
]
let sala31 = [//28 lugares
           ['', '', '', '', ''],
           ['', '', '', ''],
/*quadro*/ ['', '', '', '', ''],
           ['', '', '', '', ''],
           ['', '', '', '', ''],
           ['', '', '', ''],
]
let sala36 = [//31 lugares
           ['', '', '', '', ''],
           ['', '', '', '', '',''],
/*quadro*/ ['', '', '', '', ''],
           ['', '', '', '', ''],
           ['', '', '', '', ''],
           ['', '', '', '', ''],
]
let sala103 = [//26 lugares
           ['', '', '', '', ''],
           ['', '', '', '', ''],
/*quadro*/ ['', '', '', '', ''],
           ['', '', '', '', ''],
           ['', '', '', '', '', ''],
]
let sala104 = [//38 lugares
                ['', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
/*quadro*/      ['', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
]
let OASE = [//53 lugares
                ['', '', '', '', '', '', ''],
                ['', '', '', '', '', '', ''],
                ['', '', '', '', '', ''],
/*quadro*/      ['', '', '', '', '', '', ''],
                ['', '', '', '', '', ''],
                ['', '', '', '', '', '', ''],
                ['', '', '', '', '', ''],
                ['', '', '', '', '', '', ''],
]


function embaralharFilas() {
    // Função para embaralhar um array
    const shuffleArray = (array) => {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    };

    // Função para embaralhar os alunos de uma turma
    const shuffleStudents = (students) => {
        return shuffleArray(students);
    };

    // Embaralhar as turmas
    let turmas = [
        numStudents8ndA,
        numStudents8ndB,
        numStudents9ndA,
        numStudents9ndB,
        numStudents1ndA,
        numStudents1ndB,
        numStudents2ndA,
        numStudents2ndB,
        numStudents3ndA
    ];

    turmas.forEach(turma => shuffleStudents(turma));

    // Salas de aula
    let salas = [sala10, sala25, sala26, sala31, sala36, sala103, sala104, OASE];

    // Embaralhar as salas
    salas = shuffleArray(salas);

    // Iterar sobre as salas
    salas.forEach(sala => {
        // Iterar sobre as linhas da sala
        for (let i = 0; i < sala.length; i++) {
            // Iterar sobre as colunas da sala
            for (let j = 0; j < sala[i].length; j++) {
                let turmaIndex = 0;
                let alunos = turmas[turmaIndex];
                
                // Encontrar uma turma com alunos disponíveis
                while (alunos.length === 0) {
                    turmaIndex = (turmaIndex + 1) % turmas.length;
                    alunos = turmas[turmaIndex];
                }

                // Embaralhar os alunos na turma
                alunos = shuffleStudents(alunos);

                // Verificar cor na célula adjacente à esquerda
                let leftColor = j > 0 ? sala[i][j - 1] : null;

                // Verificar cor na célula adjacente acima
                let aboveColor = i > 0 ? sala[i - 1][j] : null;

                // Filtrar alunos para evitar repetição de cores nas células adjacentes
                let availableStudents = alunos.filter(student => student !== leftColor && student !== aboveColor);

                // Selecionar um aluno aleatório entre os disponíveis
                let randomIndex = Math.floor(Math.random() * availableStudents.length);
                let selectedStudent = availableStudents[randomIndex];

                // Atribuir o aluno à célula atual
                sala[i][j] = selectedStudent;
            }
        }
        console.log(sala);
    });
}



function testes() {
    let indexRandomClass = [0, 1, 2, 3, 4, 5, 6, 7, 8];
    indexRandomClass = surfArray(indexRandomClass);
    let RandomClass1 = [numStudents8ndA, numStudents8ndB, numStudents9ndA, numStudents9ndB];
    let RandomClass2 = [numStudents1ndA, numStudents1ndB, numStudents2ndA, numStudents2ndB, numStudents3ndA];
    RandomClass1 = surfArray(RandomClass1);
    RandomClass2 = surfArray(RandomClass2);
    let definedClass1;
    let definedClass2;
    let definedClass3;
    let definedClass4;
    let definedClass5;
    let definedClass6;
    let definedClass7;
    let definedClass8;
    let definedClass9;

    for (let y = 0; y < 9; y++) {
        switch (indexRandomClass[y]) {
            case 0:
                definedClass1 = RandomClass1[0];
                break;
            case 1:
                definedClass2 = RandomClass1[1];
                break;
            case 2:
                definedClass3 = RandomClass1[2];
                break;
            case 3:
                definedClass4 = RandomClass1[3];
                break;
            case 4:
                definedClass5 = RandomClass2[0];
                break;
            case 5:
                definedClass6 = RandomClass2[1];
                break;
            case 6:
                definedClass7 = RandomClass2[2];
                break;
            case 7:
                definedClass8 = RandomClass2[3];
                break;
            case 8:
                definedClass9 = RandomClass2[4];
                break;
            }
    }
    console.log(definedClass1);
    console.log(definedClass2);
    console.log(definedClass3);
    console.log(definedClass4);
    console.log(definedClass5);
    console.log(definedClass6);
    console.log(definedClass7);
    console.log(definedClass8);
    console.log(definedClass9);
}

/*
    for (let j = 0; j < roomDefined.length; j++) { // percorre as linhas
            for (let i = 0; i < roomDefined[j].length; i++) { // percorre as colunas
                if (j % 2 !== 0) {
                    roomDefined[j][i] = definedClass1[indexClass][index++];
                } else {
                    roomDefined[j][i] = RandomClass2[indexClass][index++];
                }
                if (definedClass1.length + definedClass1[indexClass] < index){
                    indexClass++;
                    index = 0;
                }
            }
        }
        console.log(roomDefined);
    }
///////////////////////////////////////////
function embaralharFilas() {

    let controlRandom = 0;
    numStudents8ndA = surfArray(numStudents8ndA);
    numStudents8ndB = surfArray(numStudents8ndB);
    numStudents9ndA = surfArray(numStudents9ndA);
    numStudents9ndB = surfArray(numStudents9ndB);
    numStudents1ndA = surfArray(numStudents1ndA);
    numStudents1ndB = surfArray(numStudents1ndB);
    numStudents2ndA = surfArray(numStudents2ndA);
    numStudents2ndB = surfArray(numStudents2ndB);
    numStudents3ndA = surfArray(numStudents3ndA);
    let random8nd = [numStudents8ndA,numStudents8ndB];
    let random9nd = [numStudents9ndA,numStudents9ndB];
    let random1nd = [numStudents1ndA,numStudents1ndB];
    let random2nd = [numStudents2ndA,numStudents2ndB];

    // define a sala escolhida como 0
    let roomDefined = 0;
    for (let rE = 1; rE <= 8; rE++) { // repete em todas as salas o ensalamento dos alunos
        switch (rE) {
            case 1:
                roomDefined = sala10;
                break;
            case 2:
                roomDefined = sala25;
                break;
            case 3:
                roomDefined = sala26;
                break;
            case 4:
                roomDefined = sala31;
                break;
            case 5:
                roomDefined = sala36;
                break;
            case 6:
                roomDefined = sala103;
                break;
            case 7:
                roomDefined = sala104;
                break;
            case 8:
                roomDefined = OASE;
                break;
        }
        for (let j = 0; j < roomDefined.length; j++) {//repete na linha
            for (let i = 0; i < roomDefined[j].length; i++) {//repete na coluna
                controlRandom++
                if (rE == 1 || rE == 3 || rE == 5 || rE == 7) {
                    if (j % 2 !== 0) {
                        if (i == 1 || i == 5) {
                            if(random8nd[0].length >= controlRandom){
                            roomDefined[j][i] = (random8nd[0][controlRandom])
                            }else{
                            roomDefined[j][i] = (random8nd[1][controlRandom])
                            }
                        } else if (i == 3 || i == 7) {
                            roomDefined[j][i] = (numStudents9ndB[index9ndB++])
                        } else if (i == 2 || i == 4 || i == 6 || i == 8) {
                            roomDefined[j][i] = (numStudents3ndA[index3ndA++])
                        }
                    } else {
                        if (i == 1 || i == 3 || i == 5 || i == 7) {
                            roomDefined[j][i] = (numStudents1ndA[index1ndA++])
                        } else if (i == 0 || i == 2 || i == 4 || i == 6 || i == 8) {
                            roomDefined[j][i] = (numStudents2ndB[index2ndB++])
                        }
                    }
                }else {
                }
            }
        }
        console.log(roomDefined);
    }
}
-------------------------------------------------
                if (rE == 1 ||rE == 3 ||rE == 5 ||rE == 7 ) {
                    if (j % 2 !== 0) {
                        if (i % 2 !== 0) {
                            roomDefined[j][i] = (numStudents9ndA[0])
                        } else {
                            roomDefined[j][i] = (numStudents1ndA[StudentB])
                        }
                    } else {
                        if (i % 2 !== 0) {
                            roomDefined[j][i] = (numStudents8ndA[StudentA])
                        } else {
                            roomDefined[j][i] = (numStudents2ndA[StudentB])
                        }
                    }
                } else {
                    if (j % 2 !== 0) {
                        if (i % 2 !== 0) {
                            roomDefined[j][i] = (numStudents9ndB[i])
                        } else {
                            roomDefined[j][i] = (numStudents1ndB[i])
                        }
                    } else {
                        if (i % 2 !== 0) {
                            roomDefined[j][i] = (numStudents8ndB[i])
                        } else {
                            roomDefined[j][i] = (numStudents2ndB[i])
                        }
                    }
                }
------------------------------------
  while (true) {
      for (let i = 0; i < OASE[0].length; i++) {
          if (i < OASE[0].length) {
              if (i % 2 !== 0) {
                  for (let o = 0; o; o++)
                      OASE[0][i] = (numStudents1ndA[o])
              } else {
                  OASE[0][i] = (numStudents2ndA[i])
              }
          } else {
              break
          }
      }
  }
-------------------------------
  for (let i = 0; i < OASE.length; i++){
      if(i % 2 !== 0){
          OASE[i][2] = (numStudents8ndB[i])
      }else{
          OASE[i][2] = (numStudents9ndA[i])
      }
  }*/