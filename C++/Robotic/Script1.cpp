int b1 = 2;
int b2 = 3;
int b3 = 4;
int led_red = 10;
int led_yellow = 11;
int led_green = 12;
int e1, e2, e3;

void setup(){
  pinMode(b1, INPUT);
  pinMode(b2, INPUT);P
  pinMode(b3, INPUT);
  pinMode(led_red, OUTPUT);
  pinMode(led_yellow, OUTPUT);
  pinMode(led_green, OUTPUT);
}

void loop(){
  e1 = digitalRead(b1);
  e2 = digitalRead(b2);
  e3 = digitalRead(b3);
  
  if(e1 == 0){
  	digitalWrite(led_red, 1);
    digitalWrite(led_yellow, 0);
  	digitalWrite(led_green, 0);
  }
  if(e2 == 0){
    digitalWrite(led_red, 0);
    digitalWrite(led_yellow, 1);
  	digitalWrite(led_green, 0);
  } 
  if(e3== 0){
    digitalWrite(led_red, 0);
    digitalWrite(led_yellow, 0);
  	digitalWrite(led_green, 1);
  };
}