//int b1 = 4;
//int b2 =3;
//int b3 = 2;
int engine = 3; 
int e1 = 0;
int e2 = 0;
int e3 = 0;
int led1 = 12;
int led2 = 10;
int led3 = 8;

void setup (){
//pinMode (b1,INPUT);
//pinMode (b2,INPUT);
//pinMode (b3,INPUT);
pinMode (led1, OUTPUT);
pinMode (led2, OUTPUT);
pinMode (led3, OUTPUT);
pinMode (engine, OUTPUT);
}

void sinal(){
  digitalWrite(led3, 1);
  delay(1000);
  digitalWrite(led3, 0);
  digitalWrite(led2,1);
  delay(1000);
  digitalWrite(led2, 0);
  digitalWrite(led1, 1);
  delay(1000);
  digitalWrite(led1,0);
}

void loop (){
  sinal();
  if(digitalRead(led1) == 1){
    digitalWrite(engine, 1);
  }else{
  	digitalWrite(engine, 0);
  }
}
 //e1 = digitalRead (b1);
 //e2 = digitalRead (b2);
 //e3 = digitalRead (b3);
/*
if (e1 == 1){
    digitalWrite (led1, 1);
    delay(1000);
  	digitalWrite (led1,0) ;
}
 
if (e2 == 1){
    digitalWrite (led2, 1);
    delay(1000);
    digitalWrite (led2, 0);
}
 
if (e3 == 1){
    digitalWrite (led1,1) ;
    digitalWrite (led2,1);
    delay(1000);
  	digitalWrite (led1,0) ;
    digitalWrite (led2,0);
    }
}*/
