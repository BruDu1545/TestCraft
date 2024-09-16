import tkinter as tk;
import random as rdm;

root = tk.Tk();

#  Cria os layout do escolhido anteriomente.
def create_layout(layout):
    btn_create_password.destroy();
    btn_encryption.destroy();
    if layout == 'password_layout':
        print ("Password")
        btn_pass_easy.pack();
        btn_pass_average.pack();
        btn_pass_hard.pack();
    else:
        print ("Encryption")
        btn_create_encryption.pack();
        btn_encryption.pack();
        
     

def create_password(dificult):
    caracters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y','z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9']
    index_pass = 0;
    password = '';
    if dificult == 'easy':
        while index_pass < 5:
            index_pass = index_pass + 1;
            rdm_password = rdm.randint(0, 35)
            password += caracters[rdm_password]
        completed_password.config(text=password)
    elif dificult == 'average':
        while index_pass < 10:
            index_pass = index_pass + 1;
            rdm_password = rdm.randint(0, 35)
            password += caracters[rdm_password]
        completed_password.config(text=password)
    elif dificult == 'hard':
        while index_pass < 15:
            index_pass = index_pass + 1;
            rdm_password = rdm.randint(0, 35)
            password += caracters[rdm_password]
        completed_password.config(text=password)
    
    
def encryption():
    # nao sei como vou fazer hehe
    
    pass

# layout inicial
btn_create_password = tk.Button(root, text='Create Password', command=lambda: create_layout('password_layout'));
btn_encryption = tk.Button(root, text='Start Encryption', command=lambda: create_layout('encryption_layout'));
btn_create_password.pack();
btn_encryption.pack();

# layout Password
btn_pass_easy = tk.Button(root, text='Password easy', command=lambda: create_password('easy'));
btn_pass_average = tk.Button(root, text='Password average', command=lambda: create_password('average'))
btn_pass_hard = tk.Button(root, text='Password hard', command=lambda: create_password('hard'))
completed_password = tk.Label(root, text='')
completed_password.pack();

# layout Encryption
btn_create_encryption = tk.Button(root, text='Create Encryption', command=lambda: encryption())
btn_destroy_encryption = tk.Button(root, text='Destroy Encryption', command= lambda: encryption())
#text_sucesses = tk.Text(root, text='Sucesses', fg='green')
#text_errors = tk.Text(root, text='Errors', fg='red')



root.mainloop();