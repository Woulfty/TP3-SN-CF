  const int Trig = 8;
  const int Echo = 9;
  const int VITESSE = 340 ;

  void setup() 
  {
    pinMode(Trig, OUTPUT);
    pinMode(Echo, INPUT);
    digitalWrite(Trig, LOW);
    Serial.begin(9600);
  }

void loop()
{
  digitalWrite(Trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(Trig, LOW);
  unsigned long duree = pulseIn(Echo, HIGH);
  
  if(duree > 30000)
  {
    Serial.println("Onde perdue, mesure échouée !");
  } 
  
  else
  {
    duree = duree/2; // durée allez-retour / 2
    float temps = duree/1000000.0; // [µs] en [s]
    float distance = (temps*VITESSE)*100; // [cm]
    Serial.print("Durée [µs] = ");
    Serial.println(duree); // Durée onde allez-retour [µs]
    Serial.print("Distance [cm] = ");
    Serial.println(distance); // Distance Sondeur - Obstacle [cm]
    Serial.print("Célérité [m.s] = ");
    Serial.println((distance/100)/temps); // célérité pour air = 15°C
    Serial.print("\n ---------------------------------------- \n");
  }
  
  delay(250);
}
