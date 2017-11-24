#include <UnoWiFiDevEd.h>     // Header file for Arduino
#include "cactus_io_AM2302.h" //Header file for (DHT22/AM2302) temperature sensor

#include <Wire.h>
//
#define CONNECTOR     "rest"                  
#define SERVER_ADDR   "grocerywatch.000webhostapp.com" //For hosted site connectivity



String uri;


//second ultra sonic
const int trigPin2 = 11;  //Trigger pin sends ultrasonic waves
const int echoPin2 = 12;  //Echo pin recives back the ultrasonic waves
long duration2;
int distanceCm2;




#define AM2302_PIN 2
AM2302 dht(AM2302_PIN);   //Initializes the DHT sensor for normal 16mhz Arduino.
#define fan 3 //Cooling fan 

int maxHum = 60;          //Maximum humidity level to activate fan
int maxTemp = 25;         //Maximum temperature level to activate the fan
//

void setup() {
  Serial.begin(9600);
  Ciao.begin();

  

 //SETUP ULTRA SONIC SENSOR2
   pinMode(trigPin2, OUTPUT);
   pinMode(echoPin2, INPUT);


//DHT22 start
  dht.begin();
  pinMode(fan, OUTPUT);


}


void sketch_Ultrasonic_can(){

  digitalWrite(trigPin2, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin2, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin2, LOW);
  duration2 = pulseIn(echoPin2, HIGH);
  distanceCm2= duration2 * 0.034/2;
    
  uri = "/webpages/add_data2.php?";
  uri += "&&Water=";
  uri += distanceCm2;
  
  CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);

   if (!data.isEmpty()){
    Serial.println( "State: " + String (data.get(1)) );
    Serial.println( "Response: " + String (data.get(2)) );
  }
  else{
    Serial.println("Write Error");
  }

}

//Temperature sensor to activate on given condition
void sketch_DHT22(){
   dht.readHumidity();
   dht.readTemperature();  
  if( dht.humidity > maxHum || dht.temperature_C > maxTemp )  //Condition for humidity control fan activation
  {
     digitalWrite(fan, HIGH); 
  }else{
     digitalWrite(fan, LOW);
  }
  
}


void loop() {
     
    sketch_DHT22();
    sketch_Ultrasonic_can();
    
}
