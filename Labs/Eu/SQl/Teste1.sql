CREATE SEQUENCE IDClientes;
CREATE TABLE Cliente(
    IDClientes int default nextval('IDClientes'::regclass) PRIMARY KEY,
    Cliente Varchar(50),
    Estado Varchar(2),
    Sexo Char(1),
    Status Varchar(50)
);

INSERT INTO Cliente(Cliente, Estado, Sexo, Status) VALUES ('Carlos','PR','M','Silver');
INSERT INTO Cliente(Cliente, Estado, Sexo, Status) VALUES ('Gisela','ES','F','Gold');
INSERT INTO Cliente(Cliente, Estado, Sexo, Status) VALUES ('Pedro','PR','M','Silver');
INSERT INTO Cliente(Cliente, Estado, Sexo, Status) VALUES ('Jefersom','PR','M','Platinaaa');


CREATE SEQUENCE IDVendedor;
CREATE TABLE Cliente(
    IDVendedor int default nextval('IDVendedor'::regclass) PRIMARY KEY,
    Nome Varchar(50),
);

INSERT INTO Vendedor(Nome) VALUES ('Bruno');
INSERT INTO Vendedor(Nome) VALUES ('Lukas');
INSERT INTO Vendedor(Nome) VALUES ('Fernando');


CREATE SEQUENCE IDProduto;
CREATE TABLE Produto(
    IDProduto int default nextval('IDProduto'::regclass) PRIMARY KEY,
    Nome Varchar(50),
    Marca Varchar(50),
    Valor Decimal(10,2)
);

INSERT INTO Produto(Nome, Marca, Valor) VALUES ('Notebook','ASUS','2499,99');
INSERT INTO Produto(Nome, Marca, Valor) VALUES ('Bicicleta','GTS','1500,00');
INSERT INTO Produto(Nome, Marca, Valor) VALUES ('Monitor','LG','599,00');


CREATE SEQUENCE IDVendas;
CREATE TABLE Vendas(
    Idvendas int default nextval('Idvendas'::regclass) PRIMARY KEY,
    IDCliente int REFERENCES Cliente(IDClientes),
    IDVendedor int REFERENCES Vendedor(IDVendedor),
    Data Date,
    ValorTotal Decimal(10,2)
);

INSERT INTO Vendas(IDCliente, IDVendedor, Data, ValorTotal) VALUES ('1','2','04/02/2024','2499,99');
INSERT INTO Vendas(IDCliente, IDVendedor, Data, ValorTotal) VALUES ('3','2','13/05/2024','3000,00');
INSERT INTO Vendas(IDCliente, IDVendedor, Data, ValorTotal) VALUES ('4','2','10/03/2024','599,00');


SELECT * FROM Vendas WHERE total


--{"Funcionarios":[
--    {"Nome":"Bruno", "Departamento":"TI"}
--   {"Nome":"Felipe", "Departamento":"TI"}
--    {"Nome":"Lucas", "Departamento":"MKT"}
--]}