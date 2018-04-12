#include "RTClock.h"
#include "FUNCTIONS.h"
RTClock RTClock (RTCSEL_LSE); // initialise
uint32 tt; 

void setup() {

  pinMode(GSM_Reset_Pin, OUTPUT);
  pinMode(PA1,  INPUT);

  Serial.begin(115200);
  Serial.println("");
  Serial1.begin(115200);
  Serial1.println("");
  Serial2.begin(115200);
  Serial2.println("");

  GSM_Init();
  digitalWrite(GSM_Reset_Pin, HIGH);
  delay(500);
  digitalWrite(GSM_Reset_Pin, LOW);
  Serial.println("--------------------------------------------------------------------------");
  
      Serial2.write(170);
      Serial2.write(187);
      
      Serial2.write(26);
      Serial2.write(27);
      Serial2.write(153);
      
      Serial2.write(26);
      Serial2.write(27);
      Serial2.write(154);
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
       
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      
      Serial2.write("0");
      Serial2.write("0");
      Serial2.write("0");
      

    
      Serial2.write(13);
      Serial2.write(10);
}

/*
 * 
 * 
 * 
 at+gsn

868324020153933

OK

 * 
 * 
 * 
 * 
 * 
 * AT+CCLK?

+CCLK: "18/03/08,14:16:01+12"

OK

 * 
 * 
 * 
 * 
 * AT+QGSMLOC

+QGSMLOC: 0,32.768206,39.969705,2018/03/08,11:18:00

OK
39,969705
 * 
 * 
 * 
 * 
 * 

+CCLK: "18/03/09,11:04:26+12"

OK

+CCLK: "18/03/09,11:04:26+12"

 * 
 * 
 * 
 * 
 * 
 * 
http://truva.co/communication/tapDataInsert.php?imei=868324020153933&TapID_1=26&TapID_2=27&TapID_3=154&ButtonID=1&YMD=2018-03-09&H=11&MS=49:29&GMT=3


http://truva.co/communication/collectorPing.php?imei=868324020153933&YMD=2018-03-09&H=11&MS=49:29&GMT=3&Lat=39.969705&Long=32.768206

 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */



/*
 * 
 * 
255_FF_
254_FE_
26_1A_
27_1B_
154_9A_
9_9_
244_F4_
1_1_
202_CA_

 * 
 * 
 * 53-61-6d-65-74
 * 83,97,109,101,116
 */
char tapData[9]={};


void loop(void) 
{

  /*
  if (RTClock.getTime()!=(tt))
  {
    tt = RTClock.getTime();
    if(GSMSendDataFlag==1)
    {
      GSM_send(send_GSM_data);
    }
    else if(tt%60==0) 
    {

  Serial.println("***********************************************************************");
  Serial.print("tap_1_1=");Serial.println(tap_1_1);
  Serial.print("tap_1_2=");Serial.println(tap_1_2);
  Serial.print("tap_1_3=");Serial.println(tap_1_3);
  Serial.print("tap_1_4=");Serial.println(tap_1_4);
  Serial.print("tap_1_5=");Serial.println(tap_1_5);
  Serial.print("tap_1_6=");Serial.println(tap_1_6);
  Serial.print("tap_1_7=");Serial.println(tap_1_7);
  Serial.print("tap_1_8=");Serial.println(tap_1_8);
  Serial.print("tap_1_9=");Serial.println(tap_1_9);
  Serial.print("tap_1_10=");Serial.println(tap_1_10);
  Serial.print("tap_1_11=");Serial.println(tap_1_11);
  Serial.print("tap_1_12=");Serial.println(tap_1_12);
  Serial.print("tap_1_13=");Serial.println(tap_1_13);
  Serial.print("tap_1_14=");Serial.println(tap_1_14);
  Serial.print("tap_1_15=");Serial.println(tap_1_15);
  Serial.print("tap_1_16=");Serial.println(tap_1_16);
  Serial.print("tap_1_17=");Serial.println(tap_1_17);
  Serial.print("tap_1_18=");Serial.println(tap_1_18);
  Serial.print("tap_1_19=");Serial.println(tap_1_19);
  Serial.print("tap_2_1=");Serial.println(tap_2_1);
  Serial.print("tap_2_2=");Serial.println(tap_2_2);
  Serial.print("tap_2_3=");Serial.println(tap_2_3);
  Serial.print("tap_2_4=");Serial.println(tap_2_4);
  Serial.print("tap_2_5=");Serial.println(tap_2_5);
  Serial.print("tap_2_6=");Serial.println(tap_2_6);
  Serial.print("tap_2_7=");Serial.println(tap_2_7);
  Serial.print("tap_2_8=");Serial.println(tap_2_8);
  Serial.print("tap_2_9=");Serial.println(tap_2_9);
  Serial.print("tap_2_10=");Serial.println(tap_2_10);
  Serial.print("tap_2_11=");Serial.println(tap_2_11);
  Serial.print("tap_2_12=");Serial.println(tap_2_12);
  Serial.print("tap_2_13=");Serial.println(tap_2_13);
  Serial.print("tap_2_14=");Serial.println(tap_2_14);
  Serial.print("tap_2_15=");Serial.println(tap_2_15);
  Serial.print("tap_2_16=");Serial.println(tap_2_16);
  Serial.print("tap_2_17=");Serial.println(tap_2_17);
  Serial.print("tap_2_18=");Serial.println(tap_2_18);
  Serial.print("tap_2_19=");Serial.println(tap_2_19);
      
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =6;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
      

    }

    Serial.print("time is: ");
    Serial.println(tt);
  }
*/
  if(getGSMimei==0 && sendimei==0)
  {
    sendimei=1;
    delay(500);
    Serial1.println("AT+GSN");
  }
  else if(GSMGetLoc==0 && sendGSMGetLoc==0)
  {
    sendGSMGetLoc=1;
    delay(500);
    Serial1.println("AT+QGSMLOC");
  }
  else if(GSMgetDate_active==0 && sendGSMGetDate==0)
  {
    sendGSMGetDate=1;
    delay(500);
    Serial1.println("AT+CCLK?");
    delay(100);
    Serial1.println("AT+CCLK?");
    delay(100);
    Serial1.println("AT+CCLK?");
    delay(100);
    Serial1.println("AT+CCLK?"); 
  }

  if(GSMSendDataFlag==1 && GSMWaitDataFlag==0 && GSMgetDate_active==1 && GSMReady==1)
  {
    GSM_send(send_GSM_data);
    GSMWaitDataFlag=1;
  }
  if(GSMSendDataFlag==0 && backup_id>0)
  {
  Serial.print("backup_id=");
  Serial.println(backup_id);
  if(ButtonID_1_1 !=0 || ButtonID_2_1 !=0 || ButtonID_3_1 !=0 || ButtonID_4_1 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_1;
    TapID_2=TapID_2_1;
    TapID_3=TapID_3_1;
    ButtonID_1_=ButtonID_1_1;
    ButtonID_2_=ButtonID_2_1;
    ButtonID_3_=ButtonID_3_1;
    ButtonID_4_=ButtonID_4_1;
    ButtonID_0_1=0;
    ButtonID_1_1=0;
    ButtonID_2_1=0;
    ButtonID_3_1=0;
    ButtonID_4_1=0;
  }
  else if(ButtonID_1_2 !=0 || ButtonID_2_2 !=0 || ButtonID_3_2 !=0 || ButtonID_4_2 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_2;
    TapID_2=TapID_2_2;
    TapID_3=TapID_3_2;
    ButtonID_1_=ButtonID_1_2;
    ButtonID_2_=ButtonID_2_2;
    ButtonID_3_=ButtonID_3_2;
    ButtonID_4_=ButtonID_4_2;
    ButtonID_0_2=0;
    ButtonID_1_2=0;
    ButtonID_2_2=0;
    ButtonID_3_2=0;
    ButtonID_4_2=0;
  }
  else if(ButtonID_1_3 !=0 || ButtonID_2_3 !=0 || ButtonID_3_3 !=0 || ButtonID_4_3 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_3;
    TapID_2=TapID_2_3;
    TapID_3=TapID_3_3;
    ButtonID_1_=ButtonID_1_3;
    ButtonID_2_=ButtonID_2_3;
    ButtonID_3_=ButtonID_3_3;
    ButtonID_4_=ButtonID_4_3;
    ButtonID_0_3=0;
    ButtonID_1_3=0;
    ButtonID_2_3=0;
    ButtonID_3_3=0;
    ButtonID_4_3=0;
  }
  else if( ButtonID_1_4 !=0 || ButtonID_2_4 !=0 || ButtonID_3_4 !=0 || ButtonID_4_4 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_4;
    TapID_2=TapID_2_4;
    TapID_3=TapID_3_4;
    ButtonID_1_=ButtonID_1_4;
    ButtonID_2_=ButtonID_2_4;
    ButtonID_3_=ButtonID_3_4;
    ButtonID_4_=ButtonID_4_4;
    ButtonID_0_4=0;
    ButtonID_1_4=0;
    ButtonID_2_4=0;
    ButtonID_3_4=0;
    ButtonID_4_4=0;
  }
  else if(ButtonID_1_5 !=0 || ButtonID_2_5 !=0 || ButtonID_3_5 !=0 || ButtonID_4_5 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_5;
    TapID_2=TapID_2_5;
    TapID_3=TapID_3_5;
    ButtonID_1_=ButtonID_1_5;
    ButtonID_2_=ButtonID_2_5;
    ButtonID_3_=ButtonID_3_5;
    ButtonID_4_=ButtonID_4_5;
    ButtonID_0_5=0;
    ButtonID_1_5=0;
    ButtonID_2_5=0;
    ButtonID_3_5=0;
    ButtonID_4_5=0;
  }
  else if( ButtonID_1_6 !=0 || ButtonID_2_6 !=0 || ButtonID_3_6 !=0 || ButtonID_4_6 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_6;
    TapID_2=TapID_2_6;
    TapID_3=TapID_3_6;
    ButtonID_1_=ButtonID_1_6;
    ButtonID_2_=ButtonID_2_6;
    ButtonID_3_=ButtonID_3_6;
    ButtonID_4_=ButtonID_4_6;
    ButtonID_0_6=0;
    ButtonID_1_6=0;
    ButtonID_2_6=0;
    ButtonID_3_6=0;
    ButtonID_4_6=0;
  }
  else if( ButtonID_1_7 !=0 || ButtonID_2_7 !=0 || ButtonID_3_7 !=0 || ButtonID_4_7 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_7;
    TapID_2=TapID_2_7;
    TapID_3=TapID_3_7;
    ButtonID_1_=ButtonID_1_7;
    ButtonID_2_=ButtonID_2_7;
    ButtonID_3_=ButtonID_3_7;
    ButtonID_4_=ButtonID_4_7;
    ButtonID_0_7=0;
    ButtonID_1_7=0;
    ButtonID_2_7=0;
    ButtonID_3_7=0;
    ButtonID_4_7=0;
  }
  else if( ButtonID_1_8 !=0 || ButtonID_2_8 !=0 || ButtonID_3_8 !=0 || ButtonID_4_8 !=0 )
  {
    ButtonID_1_=0;
    ButtonID_2_=0;
    ButtonID_3_=0;
    ButtonID_4_=0;
      GSMSendDataFlag=1;
      GSMWaitDataFlag=1;
      send_GSM_data =11;
      GSMgetDate_active=0;
      sendGSMGetDate=0;
      HMS[7]={'-'};
    TapID_1=TapID_1_8;
    TapID_2=TapID_2_8;
    TapID_3=TapID_3_8;
    ButtonID_1_=ButtonID_1_8;
    ButtonID_2_=ButtonID_2_8;
    ButtonID_3_=ButtonID_3_8;
    ButtonID_4_=ButtonID_4_8;
    ButtonID_0_8=0;
    ButtonID_1_8=0;
    ButtonID_2_8=0;
    ButtonID_3_8=0;
    ButtonID_4_8=0;
  }
  else
  {
    backup_id=0;
  }
  /*
    TapID_1=TapID_1_1;
    TapID_2=TapID_2_1;
    TapID_3=TapID_3_1;
    ButtonID=ButtonID_1;

    TapID_1_1=TapID_1_2;
    TapID_2_1=TapID_2_2;
    TapID_3_1=TapID_3_2;
    ButtonID_1=ButtonID_2;

    TapID_1_2=TapID_1_3;
    TapID_2_2=TapID_2_3;
    TapID_3_2=TapID_3_3;
    ButtonID_2=ButtonID_3;

    TapID_1_3=TapID_1_4;
    TapID_2_3=TapID_2_4;
    TapID_3_3=TapID_3_4;
    ButtonID_3=ButtonID_4;

    TapID_1_4=TapID_1_5;
    TapID_2_4=TapID_2_5;
    TapID_3_4=TapID_3_5;
    ButtonID_4=ButtonID_5;

    TapID_1_5=TapID_1_6;
    TapID_2_5=TapID_2_6;
    TapID_3_5=TapID_3_6;
    ButtonID_5=ButtonID_6;

    TapID_1_6=TapID_1_7;
    TapID_2_6=TapID_2_7;
    TapID_3_6=TapID_3_7;
    ButtonID_6=ButtonID_7;

    TapID_1_7=TapID_1_8;
    TapID_2_7=TapID_2_8;
    TapID_3_7=TapID_3_8;
    ButtonID_7=ButtonID_8;

    TapID_1_8=TapID_1_9;
    TapID_2_8=TapID_2_9;
    TapID_3_8=TapID_3_9;
    ButtonID_8=ButtonID_9;

    TapID_1_9=TapID_1_10;
    TapID_2_9=TapID_1_10;
    TapID_3_9=TapID_1_10;
    ButtonID_9=ButtonID_10;

    TapID_1_10=TapID_1_11;
    TapID_2_10=TapID_1_11;
    TapID_3_10=TapID_1_11;
    ButtonID_10=ButtonID_11;

    TapID_1_11=TapID_1_12;
    TapID_2_11=TapID_1_12;
    TapID_3_11=TapID_1_12;
    ButtonID_11=ButtonID_12;

    TapID_1_12=TapID_1_13;
    TapID_2_12=TapID_1_13;
    TapID_3_12=TapID_1_13;
    ButtonID_12=ButtonID_13;

    TapID_1_13=TapID_1_14;
    TapID_2_13=TapID_1_14;
    TapID_3_13=TapID_1_14;
    ButtonID_13=ButtonID_14;

    TapID_1_14=TapID_1_15;
    TapID_2_14=TapID_1_15;
    TapID_3_14=TapID_1_15;
    ButtonID_14=ButtonID_15;

    TapID_1_15=TapID_1_16;
    TapID_2_15=TapID_1_16;
    TapID_3_15=TapID_1_16;
    ButtonID_15=ButtonID_16;

    TapID_1_16=TapID_1_17;
    TapID_2_16=TapID_1_17;
    TapID_3_16=TapID_1_17;
    ButtonID_16=ButtonID_17;

    TapID_1_17=TapID_1_18;
    TapID_2_17=TapID_1_18;
    TapID_3_17=TapID_1_18;
    ButtonID_17=ButtonID_18;

    TapID_1_18=TapID_1_19;
    TapID_2_18=TapID_1_19;
    TapID_3_18=TapID_1_19;
    ButtonID_18=ButtonID_19;
    
    backup_id=backup_id-1;

          
    GSMSendDataFlag=1;
    GSMWaitDataFlag=1;
    send_GSM_data =1;
    GSMgetDate_active=0;
    sendGSMGetDate=0;
    HMS[7]={'-'};
    */
  }
  if (Serial1.available() > 0) {
    GSMincomingByte_ = Serial1.readString();
    Serial.println(GSMincomingByte_);

    if(getGSMimei==0)
    {
      i=0;
      while((GSMincomingByte_[i+17]=='O' && GSMincomingByte_[i+18]=='K')==0 && i<199)
      {
        i++;
      }
      if(GSMincomingByte_[i+17]=='O' && GSMincomingByte_[i+18]=='K')
      {
        getGSMimei=1;
        imei[0]=GSMincomingByte_[i-2];
        imei[1]=GSMincomingByte_[i-1];
        imei[2]=GSMincomingByte_[i];
        imei[3]=GSMincomingByte_[i+1];
        imei[4]=GSMincomingByte_[i+2];
        imei[5]=GSMincomingByte_[i+3];
        imei[6]=GSMincomingByte_[i+4];
        imei[7]=GSMincomingByte_[i+5];
        imei[8]=GSMincomingByte_[i+6];
        imei[9]=GSMincomingByte_[i+7];
        imei[10]=GSMincomingByte_[i+8];
        imei[11]=GSMincomingByte_[i+9];
        imei[12]=GSMincomingByte_[i+10];
        imei[13]=GSMincomingByte_[i+11];
        imei[14]=GSMincomingByte_[i+12];
        Serial.println("IMEI= ");
        
        for(i=0;i<15;i++)
        {
        Serial.print(imei[i]);
        }
        for(i=0;i<15;i++)
        {
          if(imei[i]==' ' || imei[i]=='.')
          {
            getGSMimei=0;
            sendGSMGetLoc=0;
            sendimei=0;
          }
          else
          {
            GSMGetLoc=0;
          }
        }
        
      }
    }
    else if(GSMGetLoc==0)
    {
      i=0;
      while((GSMincomingByte_[i]=='L' && GSMincomingByte_[i+1]=='O' && GSMincomingByte_[i+2]=='C' && GSMincomingByte_[i+3]==':') == 0 &&i<160)
      {
        i++;
      }
      if(GSMincomingByte_[i+6]==',' && GSMincomingByte_[i+16]==',' && GSMincomingByte_[i+26]==',' )
      {
        GSMGetLoc=1;
        GSMLong[0]=GSMincomingByte_[i+7];
        GSMLong[1]=GSMincomingByte_[i+8];
        GSMLong[3]=GSMincomingByte_[i+10];
        GSMLong[4]=GSMincomingByte_[i+11];
        GSMLong[5]=GSMincomingByte_[i+12];
        GSMLong[6]=GSMincomingByte_[i+13];
        GSMLong[7]=GSMincomingByte_[i+14];
        GSMLong[8]=GSMincomingByte_[i+15];
        
        GSMLat[0]=GSMincomingByte_[i+17];
        GSMLat[1]=GSMincomingByte_[i+18];
        GSMLat[3]=GSMincomingByte_[i+20];
        GSMLat[4]=GSMincomingByte_[i+21];
        GSMLat[5]=GSMincomingByte_[i+22];
        GSMLat[6]=GSMincomingByte_[i+23];
        GSMLat[7]=GSMincomingByte_[i+24];
        GSMLat[8]=GSMincomingByte_[i+25];

        Serial.println("LAT= ");
        for(i=0;i<9;i++)
        {
        Serial.print(GSMLat[i]);
        }
        Serial.println("LONG= ");
        for(i=0;i<9;i++)
        {
        Serial.print(GSMLong[i]);
        }
        GSMgetDate_active=0;
        sendGSMGetDate=0;
      }
    }
    else if(GSMgetDate_active==0)
    {
      i=0;
      while((GSMincomingByte_[i] == '+' && GSMincomingByte_[i+1] == 'C' && GSMincomingByte_[i+2] == 'C' && GSMincomingByte_[i+3] == 'L' && GSMincomingByte_[i+4] == 'K' && GSMincomingByte_[i+5] == ':') == 0 && GSMincomingByte_.length()>(i+25))
      {
        i++;
      }
      
        Serial.print("             i=");
        Serial.println(i);
      YMD[2]=GSMincomingByte_[i+8];
      YMD[3]=GSMincomingByte_[i+9];
      YMD[5]=GSMincomingByte_[i+11];
      YMD[6]=GSMincomingByte_[i+12];
      YMD[8]=GSMincomingByte_[i+14];
      YMD[9]=GSMincomingByte_[i+15];
      
      HMS[0]=GSMincomingByte_[i+17];
      HMS[1]=GSMincomingByte_[i+18];
      HMS[3]=GSMincomingByte_[i+20];
      HMS[4]=GSMincomingByte_[i+21];
      HMS[6]=GSMincomingByte_[i+23];
      HMS[7]=GSMincomingByte_[i+24];

     // GMT_1=To_Integer(GSMincomingByte_[i+26]);
      //GMT_2=To_Integer(GSMincomingByte_[i+27]);
      
      switch(GSMincomingByte_[i+26])
      {
        case '0':
        GMT_1=0;
        break;
        case '1':
        GMT_1=1;
        break;
        case '2':
        GMT_1=2;
        break;
        case '3':
        GMT_1=3;
        break;
        case '4':
        GMT_1=4;
        break;
        case '5':
        GMT_1=5;
        break;
        case '6':
        GMT_1=6;
        break;
        case '7':
        GMT_1=7;
        break;
        case '8':
        GMT_1=8;
        break;
        case '9':
        GMT_1=9;
        break;
      }
      switch(GSMincomingByte_[i+27])
      {
        case '0':
        GMT_2=0;
        break;
        case '1':
        GMT_2=1;
        break;
        case '2':
        GMT_2=2;
        break;
        case '3':
        GMT_2=3;
        break;
        case '4':
        GMT_2=4;
        break;
        case '5':
        GMT_2=5;
        break;
        case '6':
        GMT_2=6;
        break;
        case '7':
        GMT_2=7;
        break;
        case '8':
        GMT_2=8;
        break;
        case '9':
        GMT_2=9;
        break;
      }
      GMT=GMT_1*10+GMT_2;
      GMT=GMT/4;
      if(HMS[7]=='0' || HMS[7]=='1' || HMS[7]=='2' || HMS[7]=='3' || HMS[7]=='4' || HMS[7]=='5' || HMS[7]=='6' || HMS[7]=='7' || HMS[7]=='8' || HMS[7]=='9')
      {
        GSMgetDate_active=1;
        GSMReady=1;
        
        Serial.println("GSMgetDate_active");
        Serial.print("GMT=");
        Serial.println(GMT);

        for(i=0;i<10;i++)
        {
          if(YMD[i]=='+' || YMD[i]==' ')
          {
            GSMgetDate_active=0;
            sendGSMGetDate=0;
        Serial.println("GSMgetDate_İPTAL1");
          }
        }
        for(i=0;i<8;i++)
        {
          if(HMS[i]=='+' || HMS[i]=='-')
          {
            GSMgetDate_active=0;
            sendGSMGetDate=0;
        Serial.println("GSMgetDate_İPTAL2");
          }
        }
      }
      else
      {
        GSMgetDate_active=0;
        sendGSMGetDate=0;
        Serial.println("GSMgetDate_İPTAL0");
      }

    }
    else if(GSMSendDataFlag == 1  && GSMReady==1)
    {
      Serial.print("send_GSM_data=");
      Serial.println(send_GSM_data);
      tap_num=1;
      if(send_GSM_data==10)
      {
        tap_1_1=0;
        tap_1_2=0;
        tap_1_3=0;
        tap_1_4=0;
        tap_1_5=0;
        tap_1_6=0;
        tap_1_7=0;
        tap_1_8=0;
        tap_1_9=0;
        tap_1_10=0;
        tap_1_11=0;
        tap_1_12=0;
        tap_1_13=0;
        tap_1_14=0;
        tap_1_15=0;
        tap_1_16=0;
        tap_1_17=0;
        tap_1_18=0;
        tap_1_19=0;
        tap_1_20=0;
        tap_1_21=0;
        tap_1_22=0;
        tap_1_23=0;
        tap_1_24=0;
        tap_1_25=0;
        tap_1_26=0;
        tap_1_27=0;
        tap_1_28=0;
        tap_1_29=0;

        tap_2_1=0;
        tap_2_2=0;
        tap_2_3=0;
        tap_2_4=0;
        tap_2_5=0;
        tap_2_6=0;
        tap_2_7=0;
        tap_2_8=0;
        tap_2_9=0;
        tap_2_10=0;
        tap_2_11=0;
        tap_2_12=0;
        tap_2_13=0;
        tap_2_14=0;
        tap_2_15=0;
        tap_2_16=0;
        tap_2_17=0;
        tap_2_18=0;
        tap_2_19=0;
        tap_2_20=0;
        tap_2_21=0;
        tap_2_22=0;
        tap_2_23=0;
        tap_2_24=0;
        tap_2_25=0;
        tap_2_26=0;
        tap_2_27=0;
        tap_2_28=0;
        tap_2_29=0;

        tap_3_1=0;
        tap_3_2=0;
        tap_3_3=0;
        tap_3_4=0;
        tap_3_5=0;
        tap_3_6=0;
        tap_3_7=0;
        tap_3_8=0;
        tap_3_9=0;
        tap_3_10=0;
        tap_3_11=0;
        tap_3_12=0;
        tap_3_13=0;
        tap_3_14=0;
        tap_3_15=0;
        tap_3_16=0;
        tap_3_17=0;
        tap_3_18=0;
        tap_3_19=0;
        tap_3_20=0;
        tap_3_21=0;
        tap_3_22=0;
        tap_3_23=0;
        tap_3_24=0;
        tap_3_25=0;
        tap_3_26=0;
        tap_3_27=0;
        tap_3_28=0;
        tap_3_29=0;

        tap_4_1=0;
        tap_4_2=0;
        tap_4_3=0;
        tap_4_4=0;
        tap_4_5=0;
        tap_4_6=0;
        tap_4_7=0;
        tap_4_8=0;
        tap_4_9=0;
        tap_4_10=0;
        tap_4_11=0;
        tap_4_12=0;
        tap_4_13=0;
        tap_4_14=0;
        tap_4_15=0;
        tap_4_16=0;
        tap_4_17=0;
        tap_4_18=0;
        tap_4_19=0;
        tap_4_20=0;
        tap_4_21=0;
        tap_4_22=0;
        tap_4_23=0;
        tap_4_24=0;
        tap_4_25=0;
        tap_4_26=0;
        tap_4_27=0;
        tap_4_28=0;
        tap_4_29=0;

        tap_5_1=0;
        tap_5_2=0;
        tap_5_3=0;
        tap_5_4=0;
        tap_5_5=0;
        tap_5_6=0;
        tap_5_7=0;
        tap_5_8=0;
        tap_5_9=0;
        tap_5_10=0;
        tap_5_11=0;
        tap_5_12=0;
        tap_5_13=0;
        tap_5_14=0;
        tap_5_15=0;
        tap_5_16=0;
        tap_5_17=0;
        tap_5_18=0;
        tap_5_19=0;
        tap_5_20=0;
        tap_5_21=0;
        tap_5_22=0;
        tap_5_23=0;
        tap_5_24=0;
        tap_5_25=0;
        tap_5_26=0;
        tap_5_27=0;
        tap_5_28=0;
        tap_5_29=0;

        tap_6_1=0;
        tap_6_2=0;
        tap_6_3=0;
        tap_6_4=0;
        tap_6_5=0;
        tap_6_6=0;
        tap_6_7=0;
        tap_6_8=0;
        tap_6_9=0;
        tap_6_10=0;
        tap_6_11=0;
        tap_6_12=0;
        tap_6_13=0;
        tap_6_14=0;
        tap_6_15=0;
        tap_6_16=0;
        tap_6_17=0;
        tap_6_18=0;
        tap_6_19=0;
        tap_6_20=0;
        tap_6_21=0;
        tap_6_22=0;
        tap_6_23=0;
        tap_6_24=0;
        tap_6_25=0;
        tap_6_26=0;
        tap_6_27=0;
        tap_6_28=0;
        tap_6_29=0;

        tap_7_1=0;
        tap_7_2=0;
        tap_7_3=0;
        tap_7_4=0;
        tap_7_5=0;
        tap_7_6=0;
        tap_7_7=0;
        tap_7_8=0;
        tap_7_9=0;
        tap_7_10=0;
        tap_7_11=0;
        tap_7_12=0;
        tap_7_13=0;
        tap_7_14=0;
        tap_7_15=0;
        tap_7_16=0;
        tap_7_17=0;
        tap_7_18=0;
        tap_7_19=0;
        tap_7_20=0;
        tap_7_21=0;
        tap_7_22=0;
        tap_7_23=0;
        tap_7_24=0;
        tap_7_25=0;
        tap_7_26=0;
        tap_7_27=0;
        tap_7_28=0;
        tap_7_29=0;

        tap_8_1=0;
        tap_8_2=0;
        tap_8_3=0;
        tap_8_4=0;
        tap_8_5=0;
        tap_8_6=0;
        tap_8_7=0;
        tap_8_8=0;
        tap_8_9=0;
        tap_8_10=0;
        tap_8_11=0;
        tap_8_12=0;
        tap_8_13=0;
        tap_8_14=0;
        tap_8_15=0;
        tap_8_16=0;
        tap_8_17=0;
        tap_8_18=0;
        tap_8_19=0;
        tap_8_20=0;
        tap_8_21=0;
        tap_8_22=0;
        tap_8_23=0;
        tap_8_24=0;
        tap_8_25=0;
        tap_8_26=0;
        tap_8_27=0;
        tap_8_28=0;
        tap_8_29=0;

        for (i=0;i<GSMincomingByte_.length();i++)
        {
          Serial.print("GSMincomingByte_ i=");
          Serial.print(i);
          Serial.println(GSMincomingByte_[i]);
        }
        Serial.println("______________________________________________________________________________________________");
        oldNumOfTaps=NumOfTaps;
        NumOfTaps=0;
        for (i=0;i<GSMincomingByte_.length();i++)
        {
          if(GSMincomingByte_[i]=='&')
          {
            NumOfTaps++;
          }
        }
        
          Serial.print("NumOfTaps =");
          Serial.print(NumOfTaps);
        i=2;
        l=0;
        for (j=0;j<NumOfTaps;j++)
        {
          
          packageDone=0;
          while((GSMincomingByte_[i-2]=='/' && GSMincomingByte_[i-1]=='*')==0 && i<(GSMincomingByte_.length()-10))
          {
            i++;
          }
          for (m=0;m<29;m++)
          {
   //         Serial.print("i++; =");
   //         Serial.println(i);
            k=0;
            tap_0[0]={'_'};
            tap_0[1]={'_'};
            tap_0[2]={'_'};

            while(GSMincomingByte_[i]!=','&& k<3 && packageDone==0)
            {
              if(GSMincomingByte_[i]!='&' && packageDone==0)
              {
                tap_0[k]=GSMincomingByte_[i];
                i++;
                k++;
              }
              else if(GSMincomingByte_[i]=='&')
              {
                packageDone=1;
                
     //           Serial.print("packageDone =");
    //            Serial.println(packageDone);
                l=0;
              }
            }
            if(GSMincomingByte_[i]==',')
            {
              i++;
            }
            if(tap_0[0]!='_' && tap_0[1]!='_' && tap_0[2]!='_' && packageDone==0)
            {
              
  //          Serial.print("tap_0[0] =");
  //          Serial.println(tap_0[0]);
   //         Serial.print("tap_0[1] =");
   //         Serial.println(tap_0[1]);
   //         Serial.print("tap_0[2] =");
  //          Serial.println(tap_0[2]);
              tap_data_value_1=To_Integer(tap_0[0]);
              
              tap_data_value_2=To_Integer(tap_0[1]);
              
              tap_data_value_3=To_Integer(tap_0[2]);
              tap_data_value=tap_data_value_1*100+tap_data_value_2*10+tap_data_value_3;
            }
            else if(tap_0[0]!='_' && tap_0[1]!='_' && packageDone==0)
            {
              
              tap_data_value_1=To_Integer(tap_0[0]);
              
              tap_data_value_2=To_Integer(tap_0[1]);
             
              tap_data_value=tap_data_value_1*10+tap_data_value_2;
            }
            else if(tap_0[0]!='_'  && packageDone==0)
            {
              
              tap_data_value_1=To_Integer(tap_0[0]);
             
              tap_data_value=tap_data_value_1;
            }
            
//            Serial.println("l=");
//            Serial.println(l);
//            Serial.println("i=");
//            Serial.println(i);
//            Serial.println("j=");
//            Serial.println(j);
            switch(l)
            {
              case 0:
                switch(j)
                {
                  case 0:
                    tap_1_1=tap_data_value;
                  break;
                  case 1:
                    tap_2_1=tap_data_value;
                  break;
                  case 2:
                    tap_3_1=tap_data_value;
                  break;
                  case 3:
                    tap_4_1=tap_data_value;
                  break;
                  case 4:
                    tap_5_1=tap_data_value;
                  break;
                  case 5:
                    tap_6_1=tap_data_value;
                  break;
                  case 6:
                    tap_7_1=tap_data_value;
                  break;
                  case 7:
                    tap_8_1=tap_data_value;
                  break;
                }
              break;
              case 1:
                switch(j)
                {
                  case 0:
                    tap_1_2=tap_data_value;
                  break;
                  case 1:
                    tap_2_2=tap_data_value;
                  break;
                  case 2:
                    tap_3_2=tap_data_value;
                  break;
                  case 3:
                    tap_4_2=tap_data_value;
                  break;
                  case 4:
                    tap_5_2=tap_data_value;
                  break;
                  case 5:
                    tap_6_2=tap_data_value;
                  break;
                  case 6:
                    tap_7_2=tap_data_value;
                  break;
                  case 7:
                    tap_8_2=tap_data_value;
                  break;
                }
              break;
              case 2:
                switch(j)
                {
                  case 0:
                    tap_1_3=tap_data_value;
                  break;
                  case 1:
                    tap_2_3=tap_data_value;
                  break;
                  case 2:
                    tap_3_3=tap_data_value;
                  break;
                  case 3:
                    tap_4_3=tap_data_value;
                  break;
                  case 4:
                    tap_5_3=tap_data_value;
                  break;
                  case 5:
                    tap_6_3=tap_data_value;
                  break;
                  case 6:
                    tap_7_3=tap_data_value;
                  break;
                  case 7:
                    tap_8_3=tap_data_value;
                  break;
                }
              break;
              case 3:
                switch(j)
                {
                  case 0:
                    tap_1_4=tap_data_value;
                  break;
                  case 1:
                    tap_2_4=tap_data_value;
                  break;
                  case 2:
                    tap_3_4=tap_data_value;
                  break;
                  case 3:
                    tap_4_4=tap_data_value;
                  break;
                  case 4:
                    tap_5_4=tap_data_value;
                  break;
                  case 5:
                    tap_6_4=tap_data_value;
                  break;
                  case 6:
                    tap_7_4=tap_data_value;
                  break;
                  case 7:
                    tap_8_4=tap_data_value;
                  break;
                }
              break;
              case 4:
                switch(j)
                {
                  case 0:
                    tap_1_5=tap_data_value;
                  break;
                  case 1:
                    tap_2_5=tap_data_value;
                  break;
                  case 2:
                    tap_3_5=tap_data_value;
                  break;
                  case 3:
                    tap_4_5=tap_data_value;
                  break;
                  case 4:
                    tap_5_5=tap_data_value;
                  break;
                  case 5:
                    tap_6_5=tap_data_value;
                  break;
                  case 6:
                    tap_7_5=tap_data_value;
                  break;
                  case 7:
                    tap_8_5=tap_data_value;
                  break;
                }
              break;
              case 5:
                switch(j)
                {
                  case 0:
                    tap_1_6=tap_data_value;
                  break;
                  case 1:
                    tap_2_6=tap_data_value;
                  break;
                  case 2:
                    tap_3_6=tap_data_value;
                  break;
                  case 3:
                    tap_4_6=tap_data_value;
                  break;
                  case 4:
                    tap_5_6=tap_data_value;
                  break;
                  case 5:
                    tap_6_6=tap_data_value;
                  break;
                  case 6:
                    tap_7_6=tap_data_value;
                  break;
                  case 7:
                    tap_8_6=tap_data_value;
                  break;
                }
              break;
              case 6:
                switch(j)
                {
                  case 0:
                    tap_1_7=tap_data_value;
                  break;
                  case 1:
                    tap_2_7=tap_data_value;
                  break;
                  case 2:
                    tap_3_7=tap_data_value;
                  break;
                  case 3:
                    tap_4_7=tap_data_value;
                  break;
                  case 4:
                    tap_5_7=tap_data_value;
                  break;
                  case 5:
                    tap_6_7=tap_data_value;
                  break;
                  case 6:
                    tap_7_7=tap_data_value;
                  break;
                  case 7:
                    tap_8_7=tap_data_value;
                  break;
                }
              break;
              case 7:
                switch(j)
                {
                  case 0:
                    tap_1_8=tap_data_value;
                  break;
                  case 1:
                    tap_2_8=tap_data_value;
                  break;
                  case 2:
                    tap_3_8=tap_data_value;
                  break;
                  case 3:
                    tap_4_8=tap_data_value;
                  break;
                  case 4:
                    tap_5_8=tap_data_value;
                  break;
                  case 5:
                    tap_6_8=tap_data_value;
                  break;
                  case 6:
                    tap_7_8=tap_data_value;
                  break;
                  case 7:
                    tap_8_8=tap_data_value;
                  break;
                }
              break;
              case 8:
                switch(j)
                {
                  case 0:
                    tap_1_9=tap_data_value;
                  break;
                  case 1:
                    tap_2_9=tap_data_value;
                  break;
                  case 2:
                    tap_3_9=tap_data_value;
                  break;
                  case 3:
                    tap_4_9=tap_data_value;
                  break;
                  case 4:
                    tap_5_9=tap_data_value;
                  break;
                  case 5:
                    tap_6_9=tap_data_value;
                  break;
                  case 6:
                    tap_7_9=tap_data_value;
                  break;
                  case 7:
                    tap_8_9=tap_data_value;
                  break;
                }
              break;
              case 9:
                switch(j)
                {
                  case 0:
                    tap_1_10=tap_data_value;
                  break;
                  case 1:
                    tap_2_10=tap_data_value;
                  break;
                  case 2:
                    tap_3_10=tap_data_value;
                  break;
                  case 3:
                    tap_4_10=tap_data_value;
                  break;
                  case 4:
                    tap_5_10=tap_data_value;
                  break;
                  case 5:
                    tap_6_10=tap_data_value;
                  break;
                  case 6:
                    tap_7_10=tap_data_value;
                  break;
                  case 7:
                    tap_8_10=tap_data_value;
                  break;
                }
              break;
              case 10:
                switch(j)
                {
                  case 0:
                    tap_1_11=tap_data_value;
                  break;
                  case 1:
                    tap_2_11=tap_data_value;
                  break;
                  case 2:
                    tap_3_11=tap_data_value;
                  break;
                  case 3:
                    tap_4_11=tap_data_value;
                  break;
                  case 4:
                    tap_5_11=tap_data_value;
                  break;
                  case 5:
                    tap_6_11=tap_data_value;
                  break;
                  case 6:
                    tap_7_11=tap_data_value;
                  break;
                  case 7:
                    tap_8_11=tap_data_value;
                  break;
                }
              break;
              case 11:
                switch(j)
                {
                  case 0:
                    tap_1_12=tap_data_value;
                  break;
                  case 1:
                    tap_2_12=tap_data_value;
                  break;
                  case 2:
                    tap_3_12=tap_data_value;
                  break;
                  case 3:
                    tap_4_12=tap_data_value;
                  break;
                  case 4:
                    tap_5_12=tap_data_value;
                  break;
                  case 5:
                    tap_6_12=tap_data_value;
                  break;
                  case 6:
                    tap_7_12=tap_data_value;
                  break;
                  case 7:
                    tap_8_12=tap_data_value;
                  break;
                }
              break;
              case 12:
                switch(j)
                {
                  case 0:
                    tap_1_13=tap_data_value;
                  break;
                  case 1:
                    tap_2_13=tap_data_value;
                  break;
                  case 2:
                    tap_3_13=tap_data_value;
                  break;
                  case 3:
                    tap_4_13=tap_data_value;
                  break;
                  case 4:
                    tap_5_13=tap_data_value;
                  break;
                  case 5:
                    tap_6_13=tap_data_value;
                  break;
                  case 6:
                    tap_7_13=tap_data_value;
                  break;
                  case 7:
                    tap_8_13=tap_data_value;
                  break;
                }
              break;
              case 13:
                switch(j)
                {
                  case 0:
                    tap_1_14=tap_data_value;
                  break;
                  case 1:
                    tap_2_14=tap_data_value;
                  break;
                  case 2:
                    tap_3_14=tap_data_value;
                  break;
                  case 3:
                    tap_4_14=tap_data_value;
                  break;
                  case 4:
                    tap_5_14=tap_data_value;
                  break;
                  case 5:
                    tap_6_14=tap_data_value;
                  break;
                  case 6:
                    tap_7_14=tap_data_value;
                  break;
                  case 7:
                    tap_8_14=tap_data_value;
                  break;
                }
              break;
              case 14:
                switch(j)
                {
                  case 0:
                    tap_1_15=tap_data_value;
                  break;
                  case 1:
                    tap_2_15=tap_data_value;
                  break;
                  case 2:
                    tap_3_15=tap_data_value;
                  break;
                  case 3:
                    tap_4_15=tap_data_value;
                  break;
                  case 4:
                    tap_5_15=tap_data_value;
                  break;
                  case 5:
                    tap_6_15=tap_data_value;
                  break;
                  case 6:
                    tap_7_15=tap_data_value;
                  break;
                  case 7:
                    tap_8_15=tap_data_value;
                  break;
                }
              break;
              case 15:
                switch(j)
                {
                  case 0:
                    tap_1_16=tap_data_value;
                  break;
                  case 1:
                    tap_2_16=tap_data_value;
                  break;
                  case 2:
                    tap_3_16=tap_data_value;
                  break;
                  case 3:
                    tap_4_16=tap_data_value;
                  break;
                  case 4:
                    tap_5_16=tap_data_value;
                  break;
                  case 5:
                    tap_6_16=tap_data_value;
                  break;
                  case 6:
                    tap_7_16=tap_data_value;
                  break;
                  case 7:
                    tap_8_16=tap_data_value;
                  break;
                }
              break;
              case 16:
                switch(j)
                {
                  case 0:
                    tap_1_17=tap_data_value;
                  break;
                  case 1:
                    tap_2_17=tap_data_value;
                  break;
                  case 2:
                    tap_3_17=tap_data_value;
                  break;
                  case 3:
                    tap_4_17=tap_data_value;
                  break;
                  case 4:
                    tap_5_17=tap_data_value;
                  break;
                  case 5:
                    tap_6_17=tap_data_value;
                  break;
                  case 6:
                    tap_7_17=tap_data_value;
                  break;
                  case 7:
                    tap_8_17=tap_data_value;
                  break;
                }
              break;
              case 17:
                switch(j)
                {
                  case 0:
                    tap_1_18=tap_data_value;
                  break;
                  case 1:
                    tap_2_18=tap_data_value;
                  break;
                  case 2:
                    tap_3_18=tap_data_value;
                  break;
                  case 3:
                    tap_4_18=tap_data_value;
                  break;
                  case 4:
                    tap_5_18=tap_data_value;
                  break;
                  case 5:
                    tap_6_18=tap_data_value;
                  break;
                  case 6:
                    tap_7_18=tap_data_value;
                  break;
                  case 7:
                    tap_8_18=tap_data_value;
                  break;
                }
              break;
              case 18:
                switch(j)
                {
                  case 0:
                    tap_1_19=tap_data_value;
                  break;
                  case 1:
                    tap_2_19=tap_data_value;
                  break;
                  case 2:
                    tap_3_19=tap_data_value;
                  break;
                  case 3:
                    tap_4_19=tap_data_value;
                  break;
                  case 4:
                    tap_5_19=tap_data_value;
                  break;
                  case 5:
                    tap_6_19=tap_data_value;
                  break;
                  case 6:
                    tap_7_19=tap_data_value;
                  break;
                  case 7:
                    tap_8_19=tap_data_value;
                  break;
                }
              break;
              case 19:
                switch(j)
                {
                  case 0:
                    tap_1_20=tap_data_value;
                  break;
                  case 1:
                    tap_2_20=tap_data_value;
                  break;
                  case 2:
                    tap_3_20=tap_data_value;
                  break;
                  case 3:
                    tap_4_20=tap_data_value;
                  break;
                  case 4:
                    tap_5_20=tap_data_value;
                  break;
                  case 5:
                    tap_6_20=tap_data_value;
                  break;
                  case 6:
                    tap_7_20=tap_data_value;
                  break;
                  case 7:
                    tap_8_20=tap_data_value;
                  break;
                }
              break;
              case 20:
                switch(j)
                {
                  case 0:
                    tap_1_21=tap_data_value;
                  break;
                  case 1:
                    tap_2_21=tap_data_value;
                  break;
                  case 2:
                    tap_3_21=tap_data_value;
                  break;
                  case 3:
                    tap_4_21=tap_data_value;
                  break;
                  case 4:
                    tap_5_21=tap_data_value;
                  break;
                  case 5:
                    tap_6_21=tap_data_value;
                  break;
                  case 6:
                    tap_7_21=tap_data_value;
                  break;
                  case 7:
                    tap_8_21=tap_data_value;
                  break;
                }
              break;
              case 21:
                switch(j)
                {
                  case 0:
                    tap_1_22=tap_data_value;
                  break;
                  case 1:
                    tap_2_22=tap_data_value;
                  break;
                  case 2:
                    tap_3_22=tap_data_value;
                  break;
                  case 3:
                    tap_4_22=tap_data_value;
                  break;
                  case 4:
                    tap_5_22=tap_data_value;
                  break;
                  case 5:
                    tap_6_22=tap_data_value;
                  break;
                  case 6:
                    tap_7_22=tap_data_value;
                  break;
                  case 7:
                    tap_8_22=tap_data_value;
                  break;
                }
              break;
              case 22:
                switch(j)
                {
                  case 0:
                    tap_1_23=tap_data_value;
                  break;
                  case 1:
                    tap_2_23=tap_data_value;
                  break;
                  case 2:
                    tap_3_23=tap_data_value;
                  break;
                  case 3:
                    tap_4_23=tap_data_value;
                  break;
                  case 4:
                    tap_5_23=tap_data_value;
                  break;
                  case 5:
                    tap_6_23=tap_data_value;
                  break;
                  case 6:
                    tap_7_23=tap_data_value;
                  break;
                  case 7:
                    tap_8_23=tap_data_value;
                  break;
                }
              break;
              case 23:
                switch(j)
                {
                  case 0:
                    tap_1_24=tap_data_value;
                  break;
                  case 1:
                    tap_2_24=tap_data_value;
                  break;
                  case 2:
                    tap_3_24=tap_data_value;
                  break;
                  case 3:
                    tap_4_24=tap_data_value;
                  break;
                  case 4:
                    tap_5_24=tap_data_value;
                  break;
                  case 5:
                    tap_6_24=tap_data_value;
                  break;
                  case 6:
                    tap_7_24=tap_data_value;
                  break;
                  case 7:
                    tap_8_24=tap_data_value;
                  break;
                }
              break;
              case 24:
                switch(j)
                {
                  case 0:
                    tap_1_25=tap_data_value;
                  break;
                  case 1:
                    tap_2_25=tap_data_value;
                  break;
                  case 2:
                    tap_3_25=tap_data_value;
                  break;
                  case 3:
                    tap_4_25=tap_data_value;
                  break;
                  case 4:
                    tap_5_25=tap_data_value;
                  break;
                  case 5:
                    tap_6_25=tap_data_value;
                  break;
                  case 6:
                    tap_7_25=tap_data_value;
                  break;
                  case 7:
                    tap_8_25=tap_data_value;
                  break;
                }
              break;
              case 25:
                switch(j)
                {
                  case 0:
                    tap_1_26=tap_data_value;
                  break;
                  case 1:
                    tap_2_26=tap_data_value;
                  break;
                  case 2:
                    tap_3_26=tap_data_value;
                  break;
                  case 3:
                    tap_4_26=tap_data_value;
                  break;
                  case 4:
                    tap_5_26=tap_data_value;
                  break;
                  case 5:
                    tap_6_26=tap_data_value;
                  break;
                  case 6:
                    tap_7_26=tap_data_value;
                  break;
                  case 7:
                    tap_8_26=tap_data_value;
                  break;
                }
              break;
              case 26:
                switch(j)
                {
                  case 0:
                    tap_1_27=tap_data_value;
                  break;
                  case 1:
                    tap_2_27=tap_data_value;
                  break;
                  case 2:
                    tap_3_27=tap_data_value;
                  break;
                  case 3:
                    tap_4_27=tap_data_value;
                  break;
                  case 4:
                    tap_5_27=tap_data_value;
                  break;
                  case 5:
                    tap_6_27=tap_data_value;
                  break;
                  case 6:
                    tap_7_27=tap_data_value;
                  break;
                  case 7:
                    tap_8_27=tap_data_value;
                  break;
                }
              break;
              case 27:
                switch(j)
                {
                  case 0:
                    tap_1_28=tap_data_value;
                  break;
                  case 1:
                    tap_2_28=tap_data_value;
                  break;
                  case 2:
                    tap_3_28=tap_data_value;
                  break;
                  case 3:
                    tap_4_28=tap_data_value;
                  break;
                  case 4:
                    tap_5_28=tap_data_value;
                  break;
                  case 5:
                    tap_6_28=tap_data_value;
                  break;
                  case 6:
                    tap_7_28=tap_data_value;
                  break;
                  case 7:
                    tap_8_28=tap_data_value;
                  break;
                }
              break;
              case 28:
                switch(j)
                {
                  case 0:
                    tap_1_29=tap_data_value;
                  break;
                  case 1:
                    tap_2_29=tap_data_value;
                  break;
                  case 2:
                    tap_3_29=tap_data_value;
                  break;
                  case 3:
                    tap_4_29=tap_data_value;
                  break;
                  case 4:
                    tap_5_29=tap_data_value;
                  break;
                  case 5:
                    tap_6_29=tap_data_value;
                  break;
                  case 6:
                    tap_7_29=tap_data_value;
                  break;
                  case 7:
                    tap_8_29=tap_data_value;
                  break;
                }
              break;
              case 29:
                switch(j)
                {
                  case 0:
                    tap_1_30=tap_data_value;
                  break;
                  case 1:
                    tap_2_30=tap_data_value;
                  break;
                  case 2:
                    tap_3_30=tap_data_value;
                  break;
                  case 3:
                    tap_4_30=tap_data_value;
                  break;
                  case 4:
                    tap_5_30=tap_data_value;
                  break;
                  case 5:
                    tap_6_30=tap_data_value;
                  break;
                  case 6:
                    tap_7_30=tap_data_value;
                  break;
                  case 7:
                    tap_8_30=tap_data_value;
                  break;
                }
              break;
              case 30:
                switch(j)
                {
                  case 0:
                    tap_1_31=tap_data_value;
                  break;
                  case 1:
                    tap_2_31=tap_data_value;
                  break;
                  case 2:
                    tap_3_31=tap_data_value;
                  break;
                  case 3:
                    tap_4_31=tap_data_value;
                  break;
                  case 4:
                    tap_5_31=tap_data_value;
                  break;
                  case 5:
                    tap_6_31=tap_data_value;
                  break;
                  case 6:
                    tap_7_31=tap_data_value;
                  break;
                  case 7:
                    tap_8_31=tap_data_value;
                  break;
                }
              break;
              case 31:
                switch(j)
                {
                  case 0:
                    tap_1_32=tap_data_value;
                  break;
                  case 1:
                    tap_2_32=tap_data_value;
                  break;
                  case 2:
                    tap_3_32=tap_data_value;
                  break;
                  case 3:
                    tap_4_32=tap_data_value;
                  break;
                  case 4:
                    tap_5_32=tap_data_value;
                  break;
                  case 5:
                    tap_6_32=tap_data_value;
                  break;
                  case 6:
                    tap_7_32=tap_data_value;
                  break;
                  case 7:
                    tap_8_32=tap_data_value;
                  break;
                }
              break;
              
            }
            
            if (packageDone==0)
            { 
//              Serial.print("tap_data_value");
//              Serial.println(tap_data_value);
              l++;
            }
          }
        }

        i=0;
        for (j=0;j<NumOfTaps;j++)
        {
          
          packageDone=0;
          while((GSMincomingByte_[i-2]=='+' && GSMincomingByte_[i-1]=='-')==0 && i<(GSMincomingByte_.length()-10))
          {
            i++;
          }
          for (m=0;m<32;m++)
          {
       //     Serial.print("i++; =");
        //    Serial.println(i);
            k=0;
            tap_0[0]={'_'};
            tap_0[1]={'_'};
            tap_0[2]={'_'};

            while(GSMincomingByte_[i]!=','&& k<3 && packageDone==0)
            {
              if(GSMincomingByte_[i]!='-' && packageDone==0)
              {
                tap_0[k]=GSMincomingByte_[i];
                i++;
                k++;
              }
              else if(GSMincomingByte_[i]=='-')
              {
                packageDone=1;
                
        //        Serial.print("packageDone =");
         //       Serial.println(packageDone);
                l=0;
              }
            }
            if(GSMincomingByte_[i]==',')
            {
              i++;
            }
            if(tap_0[0]!='_' && tap_0[1]!='_' && tap_0[2]!='_' && packageDone==0)
            {
              
     //       Serial.print("tap_0[0] =");
    // //       Serial.println(tap_0[0]);
    //        Serial.print("tap_0[1] =");
     //       Serial.println(tap_0[1]);
    //        Serial.print("tap_0[2] =");
    //        Serial.println(tap_0[2]);
              tap_data_value_1=To_Integer(tap_0[0]);
              
              tap_data_value_2=To_Integer(tap_0[1]);
              
              tap_data_value_3=To_Integer(tap_0[2]);
              tap_data_value=tap_data_value_1*100+tap_data_value_2*10+tap_data_value_3;
            }
            else if(tap_0[0]!='_' && tap_0[1]!='_' && packageDone==0)
            {
              
              tap_data_value_1=To_Integer(tap_0[0]);
              
              tap_data_value_2=To_Integer(tap_0[1]);
             
              tap_data_value=tap_data_value_1*10+tap_data_value_2;
            }
            else if(tap_0[0]!='_'  && packageDone==0)
            {
              
              tap_data_value_1=To_Integer(tap_0[0]);
             
              tap_data_value=tap_data_value_1;
            }
            
  //          Serial.println("l=");
  //          Serial.println(l);
  //          Serial.println("i=");
  //          Serial.println(i);
  //          Serial.println("j=");
  //          Serial.println(j);
            switch(l)
            {
              case 0:
                switch(j)
                {
                  case 0:
                    tapCl_1_1=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_1=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_1=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_1=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_1=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_1=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_1=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_1=tap_data_value;
                  break;
                }
              break;
              case 1:
                switch(j)
                {
                  case 0:
                    tapCl_1_2=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_2=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_2=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_2=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_2=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_2=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_2=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_2=tap_data_value;
                  break;
                }
              break;
              case 2:
                switch(j)
                {
                  case 0:
                    tapCl_1_3=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_3=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_3=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_3=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_3=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_3=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_3=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_3=tap_data_value;
                  break;
                }
              break;
              case 3:
                switch(j)
                {
                  case 0:
                    tapCl_1_4=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_4=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_4=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_4=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_4=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_4=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_4=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_4=tap_data_value;
                  break;
                }
              break;
              case 4:
                switch(j)
                {
                  case 0:
                    tapCl_1_5=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_5=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_5=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_5=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_5=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_5=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_5=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_5=tap_data_value;
                  break;
                }
              break;
              case 5:
                switch(j)
                {
                  case 0:
                    tapCl_1_6=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_6=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_6=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_6=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_6=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_6=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_6=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_6=tap_data_value;
                  break;
                }
              break;
              case 6:
                switch(j)
                {
                  case 0:
                    tapCl_1_7=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_7=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_7=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_7=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_7=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_7=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_7=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_7=tap_data_value;
                  break;
                }
              break;
              case 7:
                switch(j)
                {
                  case 0:
                    tapCl_1_8=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_8=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_8=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_8=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_8=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_8=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_8=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_8=tap_data_value;
                  break;
                }
              break;
              case 8:
                switch(j)
                {
                  case 0:
                    tapCl_1_9=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_9=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_9=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_9=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_9=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_9=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_9=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_9=tap_data_value;
                  break;
                }
              break;
              case 9:
                switch(j)
                {
                  case 0:
                    tapCl_1_10=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_10=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_10=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_10=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_10=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_10=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_10=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_10=tap_data_value;
                  break;
                }
              break;
              case 10:
                switch(j)
                {
                  case 0:
                    tapCl_1_11=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_11=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_11=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_11=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_11=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_11=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_11=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_11=tap_data_value;
                  break;
                }
              break;
              case 11:
                switch(j)
                {
                  case 0:
                    tapCl_1_12=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_12=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_12=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_12=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_12=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_12=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_12=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_12=tap_data_value;
                  break;
                }
              break;
              case 12:
                switch(j)
                {
                  case 0:
                    tapCl_1_13=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_13=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_13=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_13=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_13=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_13=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_13=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_13=tap_data_value;
                  break;
                }
              break;
              case 13:
                switch(j)
                {
                  case 0:
                    tapCl_1_14=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_14=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_14=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_14=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_14=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_14=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_14=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_14=tap_data_value;
                  break;
                }
              break;
              case 14:
                switch(j)
                {
                  case 0:
                    tapCl_1_15=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_15=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_15=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_15=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_15=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_15=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_15=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_15=tap_data_value;
                  break;
                }
              break;
              case 15:
                switch(j)
                {
                  case 0:
                    tapCl_1_16=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_16=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_16=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_16=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_16=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_16=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_16=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_16=tap_data_value;
                  break;
                }
              break;
              case 16:
                switch(j)
                {
                  case 0:
                    tapCl_1_17=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_17=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_17=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_17=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_17=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_17=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_17=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_17=tap_data_value;
                  break;
                }
              break;
              case 17:
                switch(j)
                {
                  case 0:
                    tapCl_1_18=tap_data_value;
                  break;
                  case 1:
                    tapCl_2_18=tap_data_value;
                  break;
                  case 2:
                    tapCl_3_18=tap_data_value;
                  break;
                  case 3:
                    tapCl_4_18=tap_data_value;
                  break;
                  case 4:
                    tapCl_5_18=tap_data_value;
                  break;
                  case 5:
                    tapCl_6_18=tap_data_value;
                  break;
                  case 6:
                    tapCl_7_18=tap_data_value;
                  break;
                  case 7:
                    tapCl_8_18=tap_data_value;
                  break;
                }
              break;

            }
            
            if (packageDone==0)
            { 
 //             Serial.print("tap_data_value");
 //             Serial.println(tap_data_value);
              l++;
            }
          }
        }
        
        send_tap_settings();
      }
      if (send_GSM_data == 2 || send_GSM_data == 7 || send_GSM_data == 12)
      {
        i=0;
        for(i=0;i<(GSMincomingByte_.length())-6;i++)
        {
          if(GSMincomingByte_[i] == 'C' && GSMincomingByte_[i+1] == 'O' && GSMincomingByte_[i+2] == 'N' && GSMincomingByte_[i+3] == 'N' && GSMincomingByte_[i+4] == 'E' && GSMincomingByte_[i+5] == 'C' && GSMincomingByte_[i+6] == 'T')
          {
            send_GSM_data++;
          }
          GSMWaitDataFlag=1;
        }
      }
      else if(send_GSM_data == 1 || send_GSM_data == 3 || send_GSM_data == 4 || send_GSM_data == 5 || send_GSM_data == 6 || send_GSM_data == 8 || send_GSM_data == 9 || send_GSM_data == 10 || send_GSM_data == 11 || send_GSM_data == 13 || send_GSM_data == 14 || send_GSM_data == 15)
      {
        i=0;
        for(i=0;i<(GSMincomingByte_.length())-2;i++)
        {
          if(GSMincomingByte_[i] == 'O' && GSMincomingByte_[i+1] == 'K' )
          {
            send_GSM_data++;
            if(send_GSM_data == 11 || send_GSM_data == 16)
            {
              GSMSendDataFlag=0;
              send_GSM_data=1;
              GSMWaitDataFlag=0;
            }
            else
            {
              GSMWaitDataFlag=1;
            }
          }
          else
          {
            GSMWaitDataFlag=1;
          }
        }
      }
    }
  
  
  }
  if (Serial2.available() > 0) {
    // read the incoming byte:
    byteRFread++;
    incomingByte_ = Serial2.read();
    Serial.print(incomingByte_);
    if(incomingByte_ == 255)
    {
      byteRFread=0;
    }
    incomingByte[byteRFread] = incomingByte_;
    if(incomingByte[6]==244)
    {
      if(incomingByte[7] == 0)
      {
        if(GSMSendDataFlag==0)
        {
          TapID_1=incomingByte[2];
          TapID_2=incomingByte[3];
          TapID_3=incomingByte[4];
          ButtonID=0;
          
          GSMSendDataFlag=1;
          GSMWaitDataFlag=1;
          send_GSM_data =1;
          GSMgetDate_active=0;
          sendGSMGetDate=0;
          HMS[7]={'-'};
        }
        else
        {
          if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
          {
            ButtonID_0_1=1;
          }
          else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
          {
            ButtonID_0_2=1;
          }
          else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
          {
            ButtonID_0_3=1;
          }
          else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
          {
            ButtonID_0_4=1;
          }
          else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
          {
            ButtonID_0_5=1;
          }
          else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
          {
            ButtonID_0_6=1;
          }
          else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
          {
            ButtonID_0_7=1;
          }
          else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
          {
            ButtonID_0_8=1;
          }
          backup_id=1;
        }
        Serial.println("PING");
        Serial.print(incomingByte[2]);
        Serial.print(",");
        Serial.print(incomingByte[3]);
        Serial.print(",");
        Serial.println(incomingByte[4]);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }
      }
      if(incomingByte[7] == 1)
      {
        if(GSMSendDataFlag==0)
        {
          TapID_1=incomingByte[2];
          TapID_2=incomingByte[3];
          TapID_3=incomingByte[4];
          ButtonID=1;
          
          GSMSendDataFlag=1;
          GSMWaitDataFlag=1;
          send_GSM_data =1;
          GSMgetDate_active=0;
          sendGSMGetDate=0;
          HMS[7]={'-'};
        }
        else
        {
          if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
          {
            ButtonID_1_1=ButtonID_1_1+1;
          }
          else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
          {
            ButtonID_1_2=ButtonID_1_2+1;
          }
          else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
          {
            ButtonID_1_3=ButtonID_1_3+1;
          }
          else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
          {
            ButtonID_1_4=ButtonID_1_4+1;
          }
          else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
          {
            ButtonID_1_5=ButtonID_1_5+1;
          }
          else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
          {
            ButtonID_1_6=ButtonID_1_6+1;
          }
          else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
          {
            ButtonID_1_7=ButtonID_1_7+1;
          }
          else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
          {
            ButtonID_1_8=ButtonID_1_8+1;
          }
          backup_id=1;
        }
        Serial.println("button 1 pressed");
        Serial.print(incomingByte[2]);
        Serial.print(",");
        Serial.print(incomingByte[3]);
        Serial.print(",");
        Serial.println(incomingByte[4]);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }
      }
      else if(incomingByte[7] == 2)
      {
        if(GSMSendDataFlag==0)
        {
          TapID_1=incomingByte[2];
          TapID_2=incomingByte[3];
          TapID_3=incomingByte[4];
          ButtonID=2;
          
          GSMSendDataFlag=1;
          GSMWaitDataFlag=1;
          send_GSM_data =1;
          GSMgetDate_active=0;
          sendGSMGetDate=0;
          HMS[7]={'-'};
        }
        else
        {
          if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
          {
            ButtonID_2_1=ButtonID_2_1+1;
          }
          else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
          {
            ButtonID_2_2=ButtonID_2_2+1;
          }
          else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
          {
            ButtonID_2_3=ButtonID_2_3+1;
          }
          else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
          {
            ButtonID_2_4=ButtonID_2_4+1;
          }
          else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
          {
            ButtonID_2_5=ButtonID_2_5+1;
          }
          else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
          {
            ButtonID_2_6=ButtonID_2_6+1;
          }
          else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
          {
            ButtonID_2_7=ButtonID_2_7+1;
          }
          else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
          {
            ButtonID_2_8=ButtonID_2_8+1;
          }
          backup_id=1;
        }
        Serial.println("button 2 pressed");
        Serial.print(incomingByte[2]);
        Serial.print(",");
        Serial.print(incomingByte[3]);
        Serial.print(",");
        Serial.println(incomingByte[4]);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }
      }
      if(incomingByte[7] == 3)
      {
        if(GSMSendDataFlag==0)
        {
          TapID_1=incomingByte[2];
          TapID_2=incomingByte[3];
          TapID_3=incomingByte[4];
          ButtonID=3;
          
          GSMSendDataFlag=1;
          GSMWaitDataFlag=1;
          send_GSM_data =1;
          GSMgetDate_active=0;
          sendGSMGetDate=0;
          HMS[7]={'-'};
        }
        else
        {
          if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
          {
            ButtonID_3_1=ButtonID_3_1+1;
          }
          else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
          {
            ButtonID_3_2=ButtonID_3_2+1;
          }
          else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
          {
            ButtonID_3_3=ButtonID_3_3+1;
          }
          else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
          {
            ButtonID_3_4=ButtonID_3_4+1;
          }
          else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
          {
            ButtonID_3_5=ButtonID_3_5+1;
          }
          else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
          {
            ButtonID_3_6=ButtonID_3_6+1;
          }
          else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
          {
            ButtonID_3_7=ButtonID_3_7+1;
          }
          else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
          {
            ButtonID_3_8=ButtonID_3_8+1;
          }
          backup_id=1;
        }
        Serial.println("button 3 pressed");
        Serial.print(incomingByte[2]);
        Serial.print(",");
        Serial.print(incomingByte[3]);
        Serial.print(",");
        Serial.println(incomingByte[4]);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }
      }
      if(incomingByte[7] == 4)
      {
        if(GSMSendDataFlag==0)
        {
          TapID_1=incomingByte[2];
          TapID_2=incomingByte[3];
          TapID_3=incomingByte[4];
          ButtonID=4;
          
          GSMSendDataFlag=1;
          GSMWaitDataFlag=1;
          send_GSM_data =1;
          GSMgetDate_active=0;
          sendGSMGetDate=0;
          HMS[7]={'-'};
        }
        else
        {
          if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
          {
            ButtonID_4_1=ButtonID_4_1+1;
          }
          else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
          {
            ButtonID_4_2=ButtonID_4_2+1;
          }
          else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
          {
            ButtonID_4_3=ButtonID_4_3+1;
          }
          else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
          {
            ButtonID_4_4=ButtonID_4_4+1;
          }
          else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
          {
            ButtonID_4_5=ButtonID_4_5+1;
          }
          else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
          {
            ButtonID_4_6=ButtonID_4_6+1;
          }
          else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
          {
            ButtonID_4_7=ButtonID_4_7+1;
          }
          else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
          {
            ButtonID_4_8=ButtonID_4_8+1;
          }
          backup_id=1;
        }
        Serial.println("button 4 pressed");
        Serial.print(incomingByte[2]);
        Serial.print(",");
        Serial.print(incomingByte[3]);
        Serial.print(",");
        Serial.println(incomingByte[4]);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }


        
        /*
        TapID_1=incomingByte[2];
        TapID_2=incomingByte[3];
        TapID_3=incomingByte[4];
        ButtonID=4;
        Serial.println("button 4 pressed");
        Serial.print(TapID_1);
        Serial.print(",");
        Serial.print(TapID_2);
        Serial.print(",");
        Serial.println(TapID_3);
        for(i=0;i<9;i++)
        {
        incomingByte[i] = 0;
        }
        ButtonID=4;
        GSMSendDataFlag=1;
        GSMWaitDataFlag=1;
        send_GSM_data =1;
        GSMgetDate_active=0;
        sendGSMGetDate=0;
        HMS[7]={'-'};
        */
      }
    
      for(i=0;i<9;i++)
      {
      incomingByte[i] = 0;
      }
    }
    else if(incomingByte[6]==247)
    { 

      if(TapID_1_1 == incomingByte[2] && TapID_2_1 == incomingByte[3] && TapID_3_1 == incomingByte[4])
      {
        ButtonID_1_1=ButtonID_1_1+incomingByte[7];
        ButtonID_2_1=ButtonID_2_1+incomingByte[8];
        ButtonID_3_1=ButtonID_3_1+incomingByte[9];
        ButtonID_4_1=ButtonID_4_1+incomingByte[10];
      }
      else if(TapID_1_2 == incomingByte[2] && TapID_2_2 == incomingByte[3] && TapID_3_2 == incomingByte[4])
      {
        ButtonID_1_2=ButtonID_1_2+incomingByte[7];
        ButtonID_2_2=ButtonID_2_2+incomingByte[8];
        ButtonID_3_2=ButtonID_3_2+incomingByte[9];
        ButtonID_4_2=ButtonID_4_2+incomingByte[10];
      }
      else if(TapID_1_3 == incomingByte[2] && TapID_2_3 == incomingByte[3] && TapID_3_3 == incomingByte[4])
      {
        ButtonID_1_3=ButtonID_1_3+incomingByte[7];
        ButtonID_2_3=ButtonID_2_3+incomingByte[8];
        ButtonID_3_3=ButtonID_3_3+incomingByte[9];
        ButtonID_4_3=ButtonID_4_3+incomingByte[10];
      }
      else if(TapID_1_4 == incomingByte[2] && TapID_2_4 == incomingByte[3] && TapID_3_4 == incomingByte[4])
      {
        ButtonID_1_4=ButtonID_1_4+incomingByte[7];
        ButtonID_2_4=ButtonID_2_4+incomingByte[8];
        ButtonID_3_4=ButtonID_3_4+incomingByte[9];
        ButtonID_4_4=ButtonID_4_4+incomingByte[10];
      }
      else if(TapID_1_5 == incomingByte[2] && TapID_2_5 == incomingByte[3] && TapID_3_5 == incomingByte[4])
      {
        ButtonID_1_5=ButtonID_1_5+incomingByte[7];
        ButtonID_2_5=ButtonID_2_5+incomingByte[8];
        ButtonID_3_5=ButtonID_3_5+incomingByte[9];
        ButtonID_4_5=ButtonID_4_5+incomingByte[10];
      }
      else if(TapID_1_6 == incomingByte[2] && TapID_2_6 == incomingByte[3] && TapID_3_6 == incomingByte[4])
      {
        ButtonID_1_6=ButtonID_1_6+incomingByte[7];
        ButtonID_2_6=ButtonID_2_6+incomingByte[8];
        ButtonID_3_6=ButtonID_3_6+incomingByte[9];
        ButtonID_4_6=ButtonID_4_6+incomingByte[10];
      }
      else if(TapID_1_7 == incomingByte[2] && TapID_2_7 == incomingByte[3] && TapID_3_7 == incomingByte[4])
      {
        ButtonID_1_7=ButtonID_1_7+incomingByte[7];
        ButtonID_2_7=ButtonID_2_7+incomingByte[8];
        ButtonID_3_7=ButtonID_3_7+incomingByte[9];
        ButtonID_4_7=ButtonID_4_7+incomingByte[10];
      }
      else if(TapID_1_8 == incomingByte[2] && TapID_2_8 == incomingByte[3] && TapID_3_8 == incomingByte[4])
      {
        ButtonID_1_8=ButtonID_1_8+incomingByte[7];
        ButtonID_2_8=ButtonID_2_8+incomingByte[8];
        ButtonID_3_8=ButtonID_3_8+incomingByte[9];
        ButtonID_4_8=ButtonID_4_8+incomingByte[10];
      }
      backup_id=1;
      for(i=0;i<9;i++)
      {
      incomingByte[i] = 0;
      }
    }
    
  }

}
