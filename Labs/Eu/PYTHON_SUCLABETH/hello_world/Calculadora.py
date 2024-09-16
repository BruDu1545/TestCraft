import tkinter as tk


def createButtons():

    bnt_num1 = tk.Button(text='1', command=lambda: addInDisplay)
    bnt_num1.pack()
    bnt_num2 = tk.Button(text='2', command=lambda: addInDisplay)
    bnt_num2.pack()
    bnt_num3 = tk.Button(text='3', command=lambda: addInDisplay)
    bnt_num3.pack()
    bnt_num4 = tk.Button(text='4', command=lambda: addInDisplay)
    bnt_num4.pack()
    bnt_num5 = tk.Button(text='5', command=lambda: addInDisplay)
    bnt_num5.pack()
    bnt_num6 = tk.Button(text='6', command=lambda: addInDisplay)
    bnt_num6.pack()
    bnt_num7 = tk.Button(text='7', command=lambda: addInDisplay)
    bnt_num7.pack()
    bnt_num8 = tk.Button(text='8', command=lambda: addInDisplay)
    bnt_num8.pack()
    bnt_num9 = tk.Button(text='9', command=lambda: addInDisplay)
    bnt_num9.pack()
    bnt_num0 = tk.Button(text='0', command=lambda: addInDisplay)
    bnt_num0.pack()
    bnt_opSum = tk.Button(text='+', command=lambda: addInDisplay)
    bnt_opSum.pack()
    bnt_opSub = tk.Button(text='-', command=lambda: addInDisplay)
    bnt_opSub.pack()
    bnt_opMult = tk.Button(text='*', command=lambda: addInDisplay)
    bnt_opMult.pack()
    bnt_opDiv = tk.Button(text='/', command=lambda: addInDisplay)
    bnt_opDiv.pack()


def addInDisplay():
    print('')



window = tk.Tk();


btn_start = tk.Button(window, text='Abrir calculadora.', command=createButtons)
btn_start.pack()


window.mainloop();