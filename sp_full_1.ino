#include <AuthClient.h>
#include <MicroGear.h>
#include <MQTTClient.h>
#include <SHA1.h>
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <EEPROM.h>

const char* ssid     = "TAI";
const char* password = "11111111";

#define APPID       "testPrj"
#define GEARKEY     "nbsQSyoKJEf6Zsu"
#define GEARSECRET  "VROlSCXbWzfh2XbSG8OjVNGLg"
#define SCOPE       "Wemos01"

//REST API : https://api.netpie.io/topic/testPrj/gearname/Wemos01?auth=nbsQSyoKJEf6Zsu:VROlSCXbWzfh2XbSG8OjVNGLg

WiFiClient client;
AuthClient *authclient;

int relayPin1 = D3;
int SLED = D4;

MicroGear microgear(client);

void onMsghandler(char *topic, uint8_t* msg, unsigned int msglen) {
  Serial.print("Incoming message --> ");
  Serial.print(topic);
  Serial.print(" : ");
  char strState[msglen];
  for (int i = 0; i < msglen; i++) {
    strState[i] = (char)msg[i];
    Serial.print((char)msg[i]);
  }
  Serial.println();

  String stateStr = String(strState).substring(0, msglen);
  if (stateStr == "SW1") {
    digitalWrite(relayPin1, !digitalRead(relayPin1));
  }
  else if (stateStr == "ON1"){
    digitalWrite(relayPin1, LOW);
  }
  else if (stateStr == "OFF1"){
    digitalWrite(relayPin1, HIGH);
  }
}

void onConnected(char *attribute, uint8_t* msg, unsigned int msglen) {
  Serial.println("Connected to NETPIE...");
  microgear.setName("Wemos01");
}

void setup() {
  Serial.begin(115200);

  Serial.println("Starting...");

  pinMode(SLED, OUTPUT);
  pinMode(relayPin1, OUTPUT);
  digitalWrite(relayPin1, HIGH);
  digitalWrite(SLED, HIGH);


  microgear.on(MESSAGE,onMsghandler);
  microgear.on(CONNECTED,onConnected);

  if (WiFi.begin(ssid, password)) {

    while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
      digitalWrite(SLED,!digitalRead(SLED));
    }

    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());

    //uncomment the line below if you want to reset token -->
    microgear.resetToken();
    microgear.init(GEARKEY, GEARSECRET, SCOPE);
    microgear.connect(APPID);
  }
}


void loop() {
  if (microgear.connected()) {
    microgear.loop();
    Serial.println("connect...");
    digitalWrite(SLED,HIGH);
  } else {
    Serial.println("connection lost, reconnect...");
    microgear.connect(APPID);
    digitalWrite(SLED,LOW);
  }
  delay(1000);
}
