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
    for i in range(1, students8 + 1):
        if i <= 29:
            numStudents8nd.append(f'8°A-N°{i}')
        else:
            j = i - 29 
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
numStudents8nd, numStudents9nd, numStudents1nd, numStudents2nd, numStudents3ndA = defineStudentsAllClasses()

#-----------------------------------------------

# Mapa salas disponiveis para a realização do SAS
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

# Variavel (Lista) com todos os alunos
Students = numStudents8nd + numStudents9nd + numStudents1nd + numStudents2nd + numStudents3ndA
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
                if not Students:
                    raise ValueError("Não há alunos suficientes para preencher a sala.")
                # Escolhe um aluno aleatório
                new_student = rdm.choice(Students)
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
                    # Remove o aluno da lista Students
                    Students.remove(new_student)
                    # Quebra o loop
                    break

def extract_class(student):
    # Extrai a turma do aluno, por exemplo, '8°A' de '8°A-N°17'
    return student.split('-')[0]

def check_adjacent_same_class(matrix):
    rows = len(matrix)
    cols = len(matrix[0]) if rows > 0 else 0
    
    def is_within_bounds(r, c):
        return 0 <= r < rows and 0 <= c < cols

    # Define as direções: horizontal, vertical e diagonal
    directions = [
        (-1, 0),  # Cima
        (1, 0),   # Baixo
        (0, -1),  # Esquerda
        (0, 1),   # Direita
        (-1, -1), # Diagonal superior esquerda
        (-1, 1),  # Diagonal superior direita
        (1, -1),  # Diagonal inferior esquerda
        (1, 1)    # Diagonal inferior direita
    ]
    
    # Percorre cada posição na matriz
    for row in range(rows):
        for col in range(cols):
            if matrix[row][col]:  # Certifica-se de que não está vazio
                current_class = extract_class(matrix[row][col])
                for dr, dc in directions:
                    new_row, new_col = row + dr, col + dc
                    if is_within_bounds(new_row, new_col) and matrix[new_row][new_col]:
                        adjacent_class = extract_class(matrix[new_row][new_col])
                        if current_class == adjacent_class:
                            print(f"Alunos da mesma turma encontrados nas posições ({row}, {col}) e ({new_row}, {new_col})")
                            return True  # Encontrou dois alunos da mesma turma adjacentes

    return False  # Nenhum aluno da mesma turma foi encontrado ao lado

for name, room in AllRooms.items():
    defined_student(room)  # Preenche a sala com alunos aleatoriamente
    if check_adjacent_same_class(room) :
        print(f"Em {name}, há alunos da mesma turma sentados próximos uns dos outros:")
        for line in room:
            print(line)
        print('------------------------------------------')
