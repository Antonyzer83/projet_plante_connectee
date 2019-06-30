// Modules
#include "MyDebug.h"
#include "MySPIFFS.h"
#include "MyWiFiManager.h"
// Récupérer WIFI ET MDP depuis MyWiFiManager
#include "MyWiFi.h"
#include "MyDHT.h"
#include "MySoilSensor.h"
#include "MyTicker.h"
#include "MyAdafruitIO.h"

// ESP.getChipId()
int cardid = ESP.getChipId();
void setup()
{
  Serial.begin(115200);
  MYDEBUG_PRINTLN("------------------- SETUP");
  MYDEBUG_PRINTLN("Numéro de carte : ");
  MYDEBUG_PRINTLN(cardid);
  setupSPIFFS();
  setupWiFiManager();
  setupDhtSensor();
  setupSoilSensor();
  setupAdafruitIO();
}

void loop()
{
  MYDEBUG_PRINTLN("------------------- LOOP");
  getDhtData();
  getSoilData();
  loopAdafruitIO();
}
