# Importa a função Tk
import tkinter as tk

# Função que faz a tabuada.


def tabuada():
    num = 1
    texto = ''
    while num <= 10:
        i = 0
        texto += '----------\n'
        while i <= 10:
            result = num * i
            texto += f'{num} X {i} = {result}\n'
            i += 1
        num += 1
    return texto;

def login():
    correct_user = 'Gordox';
    correct_password = 'coxinha123';

    user = user_widget.get("1.0", "end-1c");
    password = password_widget.get("1.0", "end-1c");

    if (user == correct_user and password == correct_password):
        message.config(text=f'Acesso liberado, {user}.', fg="Green");
        # ATribui valor do texto da tabuada na variavel texto.
        text_tabuada = tabuada()
        # Cria um conteiner.
        text = tk.Text(janela)
        # Insere o texto gerado
        text.insert(tk.END, text_tabuada)
        # Empacota as informaçoes e exibe-as
        text.pack()

    else:
        message.config(text=f'Não existe o login: {user}, tente novamente.', fg="Red");


# Cria uma janela
janela = tk.Tk();


user_widget = tk.Text(janela, height=1, width=100);
user_widget.pack();
password_widget = tk.Text(janela, height=1, width=100);
password_widget.pack();

message = tk.Label(janela, text='', font=100);
message.pack()

bnt_login = tk.Button(janela,text='Clique aqui para fazer login', command=login);
bnt_login.pack();


# Gera um loop para a janela permanecer aberta
janela.mainloop();


