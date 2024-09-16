class Pessoa{
    
   String? _nome;
   String? _cpf;
   String? _endereco;
  
  Pessoa(this._nome, this._cpf, this._endereco);
   
   void setNome(String nome){
    _nome = nome;
  } 

  void setCpf(String cpf){
    _cpf = cpf;
  }
  
  void setEndereco(String endereco){
   _endereco = endereco;
  }
  
  String? getNome(){
    return _nome;
  } 

  String? getCpf(){
    return _cpf;
  }
  
  String? getEndereco(){
    return _endereco;
  }
  
  @override 
  String toString(){
    return{
      'nome':this.getNome(),
      'cpf':this.getCpf(),
      'endereco':this.getEndereco(),
    }.toString();
   }
  }

class PessoaF extends Pessoa{
    
   String? _ghost;
  
  PessoaF(String super._nome,String super._cpf,String super._endereco, this._ghost );
   
   void setGhost(String ghost){
    _ghost = ghost;
  } 
  
  String? getGhost(){
    return _ghost;
  } 
  
  @override 
  String toString(){
    return{
      'nome':super.getNome(),
      'cpf':super.getCpf(),
      'endereco':super.getEndereco(),
      'ghost': this.getGhost()
    }.toString();
   }
  }

Class Animal{
  String? _raca;
}

void main(){
  Pessoa p1 = Pessoa('Bruno','6542111','Rua 123');
  print(p1);

  PessoaF p1F = PessoaF('Paulo','1111111','Rua 1111', 'SIM');
  print(p1F);
  
  PessoaF likinhasmkt = PessoaF('Lucas', '213471327147214', 'PUTA QUE PARIU');
  print(likinhasmkt);

  
}