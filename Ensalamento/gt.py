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
            current_class = extract_class(matrix[row][col])
            for dr, dc in directions:
                new_row, new_col = row + dr, col + dc
                if is_within_bounds(new_row, new_col):
                    adjacent_class = extract_class(matrix[new_row][new_col])
                    if current_class == adjacent_class:
                        print(f"Alunos da mesma turma encontrados nas posições ({row}, {col}) e ({new_row}, {new_col})")
                        return True  # Encontrou dois alunos da mesma turma adjacentes

    return False  # Nenhum aluno da mesma turma foi encontrado ao lado

# Exemplo de uso
sala = [
    ['2°B-N°24', '3°A-N°38', '1°B-N°12', '8°A-N°17', '3°A-N°27', '8°B-N°9', '3°A-N°33'],
    ['9°A-N°28', '8°A-N°3', '2°B-N°21', '9°B-N°5', '1°A-N°27', '2°B-N°9', '1°A-N°25'],
    ['1°A-N°21', '9°A-N°10', '1°A-N°33', '8°B-N°10', '9°B-N°10', '3°A-N°5'],
    ['8°A-N°15', '1°A-N°6', '8°A-N°14', '2°B-N°17', '8°B-N°19', '1°A-N°2', '8°B-N°28'],
    ['1°A-N°17', '2°B-N°8', '1°B-N°20', '8°B-N°29', '3°A-N°25', '2°A-N°19'],
    ['9°A-N°11', '1°A-N°31', '9°B-N°1', '3°A-N°12', '1°A-N°38', '9°A-N°15', '8°B-N°16'],
    ['8°A-N°21', '9°A-N°5', '8°B-N°23', '2°A-N°23', '8°A-N°18', '1°B-N°2'],
    ['9°A-N°1', '1°B-N°19', '9°B-N°23', '1°A-N°29', '3°A-N°41', '9°A-N°26', '2°A-N°10']
]

result = check_adjacent_same_class(sala)
print(f"Há alunos da mesma turma adjacentes? {result}")
