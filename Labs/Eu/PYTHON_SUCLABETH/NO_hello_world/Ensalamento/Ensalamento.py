import random as rdm

# Numero total de alunos para o SAS
numTotalStudents = 282;

''' Implementar a captação automatica dos alunos '''
# Função que define os estudantes em cada turma em variavel
def defineStudentsAllClasses():
    # Quantidade de pessoas em cada turma
    students8 = 62
    students9 = 60
    students1 = 63
    students2 = 51
    students3 = 46

    # Define as variaveis das turmas 
    numStudents8nd = []
    numStudents9nd = []
    numStudents1nd = []
    numStudents2nd = []
    numStudents3ndA = []
    
    # Define os alunos do 8 ano
    # Verefica o numero total de alunos e divide ele em A e B de acordo com o numero de alunos de cada turma
    for i in range(1, students8 + 1):
        # Se a variavel (i) for menor ou igual ao valor total da turma A ele troca para a a turma B
        if i <= 29:
            # Insere o aluno da serie e turma A
            numStudents8nd.append(f'8°A-N°{i}')
        else:
            # Faz o calculo do numero de chamada dos alunos da turma B
            j = i - 29 
            # Insere o aluno da serie e turma B
            numStudents8nd.append(f'8°B-N°{j}')

    # Define os alunos do 9 ano
    for i in range(1, students9 + 1):
        if i <= 29:
            numStudents9nd.append(f'9°A-N°{i}')
        else:
            j = i - 29
            numStudents9nd.append(f'9°B-N°{j}')

    # Define os alunos do 1 ano
    for i in range(1, students1 + 1):
        if i <= 38:
            numStudents1nd.append(f'1°A-N°{i}')
        else:
            j = i - 38
            numStudents1nd.append(f'1°B-N°{j}')

    # Define os alunos do 2 ano
    for i in range(1, students2 + 1):
        if i <= 24:
            numStudents2nd.append(f'2°A-N°{i}')
        else:
            j = i - 24
            numStudents2nd.append(f'2°B-N°{j}')

    # Define os alunos do 3 ano
    for i in range(1, students3 + 1):
        numStudents3ndA.append(f'3°A-N°{i}')
    
    # Retorna as listas dos alunos
    return numStudents8nd, numStudents9nd, numStudents1nd, numStudents2nd, numStudents3ndA


# Define os alunos nas listas respectivas
numStudents1nd, numStudents2nd, numStudents3ndA, numStudents8nd, numStudents9nd = defineStudentsAllClasses()


#-----------------------------------------------


# Mapa salas disponiveis para a realização do SAS
''' Implementar uma parte grafica para o usuario inserir e modificar as salas'''
sala10 = [#  46 lugares disponiveis
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
]
sala25 = [# 29 lugares disponiveis
    ['', '', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala26 = [# 31 lugares disponiveis
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala31 = [# 28 lugares disponiveis
    ['', '', '', '', ''],
    ['', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', ''],
]
sala36 = [# 31 lugares disponiveis
    ['', '', '', '', ''],
    ['', '', '', '', '',''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
]
sala103 = [# 26 lugares disponiveis
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala104 = [# 38 lugares disponiveis
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
]
OASE = [# 53 lugares disponiveis
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
]


''' Criar os mapas de sala ja no Objeto '''
# Cria um objeto de todas as salas
AllRooms = {
            "sala10": sala10,
            "sala103": sala103,
            "sala104": sala104,
            "sala25": sala25,
            "sala26": sala26,
            "sala31": sala31,
            "sala36": sala36,
            "OASE":  OASE
            }


''' Implementar a interação com os alunos personalizados '''
# Variavel (Lista) com todos os alunos
Students = [numStudents8nd+numStudents9nd+numStudents1nd+numStudents2nd+numStudents3ndA]
# Embaralha a lista anterior
rdm.shuffle(Students)


# Função que define os lugares dos estudantes de forma totalmente aleatória
def defined_student(room):
    # Para cada linha da sala
    for line in range(len(room)):
        # Para cada coluna da linha da sala
        for i in range(len(room[line])):
            # Executa enquanto a turma do aluno seguinte seja igual ao anterior
            while True:
                # Verifica se há alunos restantes
                class_not_empty = [cls for cls in Students if cls]
                # Se não houver alunos restantes
                if not class_not_empty:
                    raise ValueError("Não há alunos suficientes para preencher a sala.")
                # Escolhe uma turma aleatória
                new_class = rdm.choice(class_not_empty)
                # Escolhe um aluno aleatório
                new_student = rdm.choice(new_class)
                # Pega como ponto de referência o (°) da variável e o transforma em variável
                new_student_ = new_student.split('°')[0]
                # Logica se o aluno pode ser alocado no lugar
                can_place = True
                # Verifica se o (i) representa o primeiro lugar da fila 
                if i != 0:
                    # Verefica se o aluno anterior é igual ao atual, usando como ponto de referência o (°) da variável
                    if new_student_ == room[line][i-1].split('°')[0]:
                        # Não pode
                        can_place = False
                # Verefica se o (line) representa o primeiro lugar
                if line != 0: 
                    # Verefica se o aluno anterior é igual ao da fila anterior na mesma coluna, usando como ponto de referência o (°) da variável
                    if i < len(room[line-1]) and new_student_ == room[line-1][i].split('°')[0]:
                        # Não pode
                            can_place = False
                if can_place:
                    # Passa o valor do aluno aleatório para o lugar da fila
                    room[line][i] = new_student
                    # Remove o aluno da turma
                    new_class.remove(new_student)
                    # Quebra o loop
                    break


''' Implementar para a saida da função ser pdf pronto (FPDF) '''
# Executa a função (defined_student) em todas as salas exibindo seu nome, apos a sala em si
# Pega as informações do objeto (AllRooms), como nome e o mapa da sala
for name, room in AllRooms.items():
    # Imprimi o nome
    print(name)
    # Chama a função (defined_student) em todas as salas
    defined_student(room)
    # Imprimi o mapa da sala, linha por linha
    for line in room:
        # Imprime a linha da sala
        print(line)
        # Divisao entre as salas
    print('------------------------------------------')