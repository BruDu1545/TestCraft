import random

def defineStudentsAllClasses():
    students8 = 63
    students9 = 59
    students1 = 64
    students2 = 47
    students3 = 44

    numStudents8nd = [f'8°{"A" if i <= 32 else "B"}-N°{i if i <= 32 else i-32}' for i in range(1, students8 + 1)]
    numStudents9nd = [f'9°{"A" if i <= 28 else "B"}-N°{i if i <= 28 else i-28}' for i in range(1, students9 + 1)]
    numStudents1nd = [f'1°{"A" if i <= 34 else "B"}-N°{i if i <= 34 else i-34}' for i in range(1, students1 + 1)]
    numStudents2nd = [f'2°{"A" if i <= 20 else "B"}-N°{i if i <= 20 else i-20}' for i in range(1, students2 + 1)]
    numStudents3ndA = [f'3°A-N°{i}' for i in range(1, students3 + 1)]

    return numStudents8nd, numStudents9nd, numStudents1nd, numStudents2nd, numStudents3ndA

def can_place_student(room, line, i, new_student_):
    if i != 0:
        if new_student_ == room[line][i-1].split('°')[0]:
            return False
    if line != 0:
        if i < len(room[line-1]):
            if new_student_ == room[line-1][i].split('°')[0]:
                return False
            if i > 0 and new_student_ == room[line-1][i-1].split('°')[0]:
                return False
            if i < len(room[line-1]) - 1 and new_student_ == room[line-1][i+1].split('°')[0]:
                return False
    return True

def defined_student(room, students):
    for line in range(len(room)):
        for i in range(len(room[line])):
            attempts = 0
            while attempts < 500:  # Aumentando o número de tentativas
                class_not_empty = [cls for cls in students if cls]
                if not class_not_empty:
                    return True  # Todos os alunos foram colocados
                new_class = random.choice(class_not_empty)
                new_student = random.choice(new_class)
                new_student_ = new_student.split('°')[0]
                if can_place_student(room, line, i, new_student_):
                    room[line][i] = new_student
                    new_class.remove(new_student)
                    break
                attempts += 1
            else:
                return False  # Não foi possível alocar o aluno, retorna False para backtracking
    return True

def attempt_allocation(AllRooms, students, max_attempts=10):
    for attempt in range(max_attempts):
        # Faz uma cópia das salas e dos alunos para tentar novamente
        temp_students = [lst.copy() for lst in students]
        temp_rooms = {name: [line.copy() for line in room] for name, room in AllRooms.items()}
        
        success = True
        for name, room in temp_rooms.items():
            if not defined_student(room, temp_students):
                success = False
                break

        if success:
            print(f"Alocação bem-sucedida na tentativa {attempt + 1}!")
            return temp_rooms, temp_students  # Retorna a alocação final e os alunos restantes
    
    print("Não foi possível alocar todos os alunos após várias tentativas.")
    return temp_rooms, temp_students  # Retorna a última tentativa de alocação

# Definindo os alunos e as salas
numStudents8nd, numStudents9nd, numStudents1nd, numStudents2nd, numStudents3ndA = defineStudentsAllClasses()
students = [numStudents8nd, numStudents9nd, numStudents1nd, numStudents2nd, numStudents3ndA]

# Definindo as salas
sala10 = [
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', '', ''],
]
sala25 = [
    ['', '', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala26 = [
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala31 = [
    ['', '', '', '', ''],
    ['', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', ''],
]
sala36 = [
    ['', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
]
sala103 = [
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', '', ''],
]
sala104 = [
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
]
OASE = [
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
    ['', '', '', '', '', ''],
    ['', '', '', '', '', '', ''],
]

# Mapeamento das salas
AllRooms = {
    "OASE": OASE,
    "sala10": sala10,
    "sala104": sala104,
    "sala25": sala25,
    "sala31": sala31,
    "sala103": sala103,
    "sala36": sala36,
    "sala26": sala26,
}

# Tentativa de alocação com backtracking
final_rooms, remaining_students = attempt_allocation(AllRooms, students, max_attempts=10)

# Exibe o resultado final
print("Distribuição final:")
for name, room in final_rooms.items():
    print(f"Distribuição final na {name}:")
    for line in room:
        print(line)
    print('------------------------------------------')

# Verifica e exibe os alunos restantes
alunos_nao_alocados = sum(len(lst) for lst in remaining_students)
if alunos_nao_alocados == 0:
    print("Todos os alunos foram alocados com sucesso!")
else:
    print(f"Atenção: {alunos_nao_alocados} alunos não foram alocados.")
    for i, turma in enumerate(remaining_students):
        if len(turma) > 0:
            print(f"Turma {i + 1}: {len(turma)} alunos não alocados:")
            for aluno in turma:
                print(aluno)
