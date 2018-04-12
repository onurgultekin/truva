#define GSM_Reset_Pin PA4
int ButtonID =1;
char ButtonClReal[3] = {'2','.','8'};
char ButtonClShown[3] =  {'3','.','0'};
int AlcoholTypeID =1;

int incomingByte[9] = {0};
int incomingByte_;
String GSMincomingByte_;
String GSMincomingDate_;
int GSMincomingDate_Index=0;
//char ButtonClShown[3] =  {'3','.','0'};YMD=2018-02-25&HMS=21:45:20
char YMD[10]={'2','0','0','0','-','0','0','-','0','0'};
char HMS[8]={'0','0',':','0','0',':','0','-'};
int byteRFread=-1;
int checksum=0;
int send_GSM_data =0;
int tapID = 53;


int i=0;
int j=0;
int k=0;
int l=0;
int m=0;
int s=0;
int r=0;
//////////////////////////////////////////////////////////////////////////////////////////

int TapID_1=0;
int TapID_2=0;
int TapID_3=0;

int GSMGetLoc=1;
int getGSMimei=0;

char GSMLat[9]={'0','0','.','0','0','0','0','0','0'};
char GSMLong[9]={'0','0','.','0','0','0','0','0','0'};
char imei[15]={'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'};
char GSMBuffer[200]={'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'};
int GSMBufferCounter=0;


int GMT_1=0;
int GMT_2=0;
int GMT=0;
int sendimei=0;
int sendGSMGetLoc=0;
int sendGSMGetDate=0;
int GSMgetDate_active=1;


//////////////////////////////////////////////////////////////////////////////////////////////

char Connect[7] ={'C','O','N','N','E','C','T'};
char OK[2]={'O','K'};


int GSMSendDataFlag=0;
int GSMWaitDataFlag=0;

int GSMReady=0;

//////////////////////////////////////////////////////////////////////////////////////////////////
int NumOfTaps=0;
int oldNumOfTaps=0;
int packageDone=0;
int tap_data_value=0;
int tap_data_value_1=0;
int tap_data_value_2=0;
int tap_data_value_3=0;

int tap_num=1;

char tap_0[3]={'_','_','_'};
char tap_1[3]={'_','_','_'};
char tap_2[3]={'_','_','_'};
char tap_3[3]={'_','_','_'};
char tap_4[3]={'_','_','_'};
char tap_5[3]={'_','_','_'};
char tap_6[3]={'_','_','_'};
char tap_7[3]={'_','_','_'};
char tap_8[3]={'_','_','_'};
char tap_9[3]={'_','_','_'};
char tap_10[3]={'_','_','_'};
char tap_11[3]={'_','_','_'};
char tap_12[3]={'_','_','_'};
char tap_13[3]={'_','_','_'};
char tap_14[3]={'_','_','_'};
char tap_15[3]={'_','_','_'};
char tap_16[3]={'_','_','_'};
char tap_17[3]={'_','_','_'};
char tap_18[3]={'_','_','_'};
char tap_19[3]={'_','_','_'};
char tap_20[3]={'_','_','_'};
char tap_21[3]={'_','_','_'};
char tap_22[3]={'_','_','_'};
char tap_23[3]={'_','_','_'};
char tap_24[3]={'_','_','_'};
char tap_25[3]={'_','_','_'};
char tap_26[3]={'_','_','_'};
char tap_27[3]={'_','_','_'};
char tap_28[3]={'_','_','_'};
char tap_29[3]={'_','_','_'};



int tap_1_1=0;
int tap_1_2=0;
int tap_1_3=0;
int tap_1_4=0;
int tap_1_5=0;
int tap_1_6=0;
int tap_1_7=0;
int tap_1_8=0;
int tap_1_9=0;
int tap_1_10=0;
int tap_1_11=0;
int tap_1_12=0;
int tap_1_13=0;
int tap_1_14=0;
int tap_1_15=0;
int tap_1_16=0;
int tap_1_17=0;
int tap_1_18=0;
int tap_1_19=0;
int tap_1_20=0;
int tap_1_21=0;
int tap_1_22=0;
int tap_1_23=0;
int tap_1_24=0;
int tap_1_25=0;
int tap_1_26=0;
int tap_1_27=0;
int tap_1_28=0;
int tap_1_29=0;
int tap_1_30=0;
int tap_1_31=0;
int tap_1_32=0;

int tapCl_1_1=0;
int tapCl_1_2=0;
int tapCl_1_3=0;
int tapCl_1_4=0;
int tapCl_1_5=0;
int tapCl_1_6=0;
int tapCl_1_7=0;
int tapCl_1_8=0;
int tapCl_1_9=0;
int tapCl_1_10=0;
int tapCl_1_11=0;
int tapCl_1_12=0;
int tapCl_1_13=0;
int tapCl_1_14=0;
int tapCl_1_15=0;
int tapCl_1_16=0;
int tapCl_1_17=0;
int tapCl_1_18=0;



int tap_2_1=0;
int tap_2_2=0;
int tap_2_3=0;
int tap_2_4=0;
int tap_2_5=0;
int tap_2_6=0;
int tap_2_7=0;
int tap_2_8=0;
int tap_2_9=0;
int tap_2_10=0;
int tap_2_11=0;
int tap_2_12=0;
int tap_2_13=0;
int tap_2_14=0;
int tap_2_15=0;
int tap_2_16=0;
int tap_2_17=0;
int tap_2_18=0;
int tap_2_19=0;
int tap_2_20=0;
int tap_2_21=0;
int tap_2_22=0;
int tap_2_23=0;
int tap_2_24=0;
int tap_2_25=0;
int tap_2_26=0;
int tap_2_27=0;
int tap_2_28=0;
int tap_2_29=0;
int tap_2_30=0;
int tap_2_31=0;
int tap_2_32=0;


int tapCl_2_1=0;
int tapCl_2_2=0;
int tapCl_2_3=0;
int tapCl_2_4=0;
int tapCl_2_5=0;
int tapCl_2_6=0;
int tapCl_2_7=0;
int tapCl_2_8=0;
int tapCl_2_9=0;
int tapCl_2_10=0;
int tapCl_2_11=0;
int tapCl_2_12=0;
int tapCl_2_13=0;
int tapCl_2_14=0;
int tapCl_2_15=0;
int tapCl_2_16=0;
int tapCl_2_17=0;
int tapCl_2_18=0;




int tap_3_1=0;
int tap_3_2=0;
int tap_3_3=0;
int tap_3_4=0;
int tap_3_5=0;
int tap_3_6=0;
int tap_3_7=0;
int tap_3_8=0;
int tap_3_9=0;
int tap_3_10=0;
int tap_3_11=0;
int tap_3_12=0;
int tap_3_13=0;
int tap_3_14=0;
int tap_3_15=0;
int tap_3_16=0;
int tap_3_17=0;
int tap_3_18=0;
int tap_3_19=0;
int tap_3_20=0;
int tap_3_21=0;
int tap_3_22=0;
int tap_3_23=0;
int tap_3_24=0;
int tap_3_25=0;
int tap_3_26=0;
int tap_3_27=0;
int tap_3_28=0;
int tap_3_29=0;
int tap_3_30=0;
int tap_3_31=0;
int tap_3_32=0;


int tapCl_3_1=0;
int tapCl_3_2=0;
int tapCl_3_3=0;
int tapCl_3_4=0;
int tapCl_3_5=0;
int tapCl_3_6=0;
int tapCl_3_7=0;
int tapCl_3_8=0;
int tapCl_3_9=0;
int tapCl_3_10=0;
int tapCl_3_11=0;
int tapCl_3_12=0;
int tapCl_3_13=0;
int tapCl_3_14=0;
int tapCl_3_15=0;
int tapCl_3_16=0;
int tapCl_3_17=0;
int tapCl_3_18=0;




int tap_4_1=0;
int tap_4_2=0;
int tap_4_3=0;
int tap_4_4=0;
int tap_4_5=0;
int tap_4_6=0;
int tap_4_7=0;
int tap_4_8=0;
int tap_4_9=0;
int tap_4_10=0;
int tap_4_11=0;
int tap_4_12=0;
int tap_4_13=0;
int tap_4_14=0;
int tap_4_15=0;
int tap_4_16=0;
int tap_4_17=0;
int tap_4_18=0;
int tap_4_19=0;
int tap_4_20=0;
int tap_4_21=0;
int tap_4_22=0;
int tap_4_23=0;
int tap_4_24=0;
int tap_4_25=0;
int tap_4_26=0;
int tap_4_27=0;
int tap_4_28=0;
int tap_4_29=0;
int tap_4_30=0;
int tap_4_31=0;
int tap_4_32=0;


int tapCl_4_1=0;
int tapCl_4_2=0;
int tapCl_4_3=0;
int tapCl_4_4=0;
int tapCl_4_5=0;
int tapCl_4_6=0;
int tapCl_4_7=0;
int tapCl_4_8=0;
int tapCl_4_9=0;
int tapCl_4_10=0;
int tapCl_4_11=0;
int tapCl_4_12=0;
int tapCl_4_13=0;
int tapCl_4_14=0;
int tapCl_4_15=0;
int tapCl_4_16=0;
int tapCl_4_17=0;
int tapCl_4_18=0;




int tap_5_1=0;
int tap_5_2=0;
int tap_5_3=0;
int tap_5_4=0;
int tap_5_5=0;
int tap_5_6=0;
int tap_5_7=0;
int tap_5_8=0;
int tap_5_9=0;
int tap_5_10=0;
int tap_5_11=0;
int tap_5_12=0;
int tap_5_13=0;
int tap_5_14=0;
int tap_5_15=0;
int tap_5_16=0;
int tap_5_17=0;
int tap_5_18=0;
int tap_5_19=0;
int tap_5_20=0;
int tap_5_21=0;
int tap_5_22=0;
int tap_5_23=0;
int tap_5_24=0;
int tap_5_25=0;
int tap_5_26=0;
int tap_5_27=0;
int tap_5_28=0;
int tap_5_29=0;
int tap_5_30=0;
int tap_5_31=0;
int tap_5_32=0;


int tapCl_5_1=0;
int tapCl_5_2=0;
int tapCl_5_3=0;
int tapCl_5_4=0;
int tapCl_5_5=0;
int tapCl_5_6=0;
int tapCl_5_7=0;
int tapCl_5_8=0;
int tapCl_5_9=0;
int tapCl_5_10=0;
int tapCl_5_11=0;
int tapCl_5_12=0;
int tapCl_5_13=0;
int tapCl_5_14=0;
int tapCl_5_15=0;
int tapCl_5_16=0;
int tapCl_5_17=0;
int tapCl_5_18=0;




int tap_6_1=0;
int tap_6_2=0;
int tap_6_3=0;
int tap_6_4=0;
int tap_6_5=0;
int tap_6_6=0;
int tap_6_7=0;
int tap_6_8=0;
int tap_6_9=0;
int tap_6_10=0;
int tap_6_11=0;
int tap_6_12=0;
int tap_6_13=0;
int tap_6_14=0;
int tap_6_15=0;
int tap_6_16=0;
int tap_6_17=0;
int tap_6_18=0;
int tap_6_19=0;
int tap_6_20=0;
int tap_6_21=0;
int tap_6_22=0;
int tap_6_23=0;
int tap_6_24=0;
int tap_6_25=0;
int tap_6_26=0;
int tap_6_27=0;
int tap_6_28=0;
int tap_6_29=0;
int tap_6_30=0;
int tap_6_31=0;
int tap_6_32=0;


int tapCl_6_1=0;
int tapCl_6_2=0;
int tapCl_6_3=0;
int tapCl_6_4=0;
int tapCl_6_5=0;
int tapCl_6_6=0;
int tapCl_6_7=0;
int tapCl_6_8=0;
int tapCl_6_9=0;
int tapCl_6_10=0;
int tapCl_6_11=0;
int tapCl_6_12=0;
int tapCl_6_13=0;
int tapCl_6_14=0;
int tapCl_6_15=0;
int tapCl_6_16=0;
int tapCl_6_17=0;
int tapCl_6_18=0;




int tap_7_1=0;
int tap_7_2=0;
int tap_7_3=0;
int tap_7_4=0;
int tap_7_5=0;
int tap_7_6=0;
int tap_7_7=0;
int tap_7_8=0;
int tap_7_9=0;
int tap_7_10=0;
int tap_7_11=0;
int tap_7_12=0;
int tap_7_13=0;
int tap_7_14=0;
int tap_7_15=0;
int tap_7_16=0;
int tap_7_17=0;
int tap_7_18=0;
int tap_7_19=0;
int tap_7_20=0;
int tap_7_21=0;
int tap_7_22=0;
int tap_7_23=0;
int tap_7_24=0;
int tap_7_25=0;
int tap_7_26=0;
int tap_7_27=0;
int tap_7_28=0;
int tap_7_29=0;
int tap_7_30=0;
int tap_7_31=0;
int tap_7_32=0;


int tapCl_7_1=0;
int tapCl_7_2=0;
int tapCl_7_3=0;
int tapCl_7_4=0;
int tapCl_7_5=0;
int tapCl_7_6=0;
int tapCl_7_7=0;
int tapCl_7_8=0;
int tapCl_7_9=0;
int tapCl_7_10=0;
int tapCl_7_11=0;
int tapCl_7_12=0;
int tapCl_7_13=0;
int tapCl_7_14=0;
int tapCl_7_15=0;
int tapCl_7_16=0;
int tapCl_7_17=0;
int tapCl_7_18=0;




int tap_8_1=0;
int tap_8_2=0;
int tap_8_3=0;
int tap_8_4=0;
int tap_8_5=0;
int tap_8_6=0;
int tap_8_7=0;
int tap_8_8=0;
int tap_8_9=0;
int tap_8_10=0;
int tap_8_11=0;
int tap_8_12=0;
int tap_8_13=0;
int tap_8_14=0;
int tap_8_15=0;
int tap_8_16=0;
int tap_8_17=0;
int tap_8_18=0;
int tap_8_19=0;
int tap_8_20=0;
int tap_8_21=0;
int tap_8_22=0;
int tap_8_23=0;
int tap_8_24=0;
int tap_8_25=0;
int tap_8_26=0;
int tap_8_27=0;
int tap_8_28=0;
int tap_8_29=0;
int tap_8_30=0;
int tap_8_31=0;
int tap_8_32=0;


int tapCl_8_1=0;
int tapCl_8_2=0;
int tapCl_8_3=0;
int tapCl_8_4=0;
int tapCl_8_5=0;
int tapCl_8_6=0;
int tapCl_8_7=0;
int tapCl_8_8=0;
int tapCl_8_9=0;
int tapCl_8_10=0;
int tapCl_8_11=0;
int tapCl_8_12=0;
int tapCl_8_13=0;
int tapCl_8_14=0;
int tapCl_8_15=0;
int tapCl_8_16=0;
int tapCl_8_17=0;
int tapCl_8_18=0;



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

int backup_id=0; 
int ButtonID_counter =0;
 
int ButtonID_1_=0;
int ButtonID_2_=0;
int ButtonID_3_=0;
int ButtonID_4_=0;
int TapID_1_1=0;
int TapID_2_1=0;
int TapID_3_1=0;
int ButtonID_0_1=0;
int ButtonID_1_1=0;
int ButtonID_2_1=0;
int ButtonID_3_1=0;
int ButtonID_4_1=0;

int TapID_1_2=0;
int TapID_2_2=0;
int TapID_3_2=0;
int ButtonID_0_2=0;
int ButtonID_1_2=0;
int ButtonID_2_2=0;
int ButtonID_3_2=0;
int ButtonID_4_2=0;

int TapID_1_3=0;
int TapID_2_3=0;
int TapID_3_3=0;
int ButtonID_0_3=0;
int ButtonID_1_3=0;
int ButtonID_2_3=0;
int ButtonID_3_3=0;
int ButtonID_4_3=0;

int TapID_1_4=0;
int TapID_2_4=0;
int TapID_3_4=0;
int ButtonID_0_4=0;
int ButtonID_1_4=0;
int ButtonID_2_4=0;
int ButtonID_3_4=0;
int ButtonID_4_4=0;

int TapID_1_5=0;
int TapID_2_5=0;
int TapID_3_5=0;
int ButtonID_0_5=0;
int ButtonID_1_5=0;
int ButtonID_2_5=0;
int ButtonID_3_5=0;
int ButtonID_4_5=0;

int TapID_1_6=0;
int TapID_2_6=0;
int TapID_3_6=0;
int ButtonID_0_6=0;
int ButtonID_1_6=0;
int ButtonID_2_6=0;
int ButtonID_3_6=0;
int ButtonID_4_6=0;

int TapID_1_7=0;
int TapID_2_7=0;
int TapID_3_7=0;
int ButtonID_0_7=0;
int ButtonID_1_7=0;
int ButtonID_2_7=0;
int ButtonID_3_7=0;
int ButtonID_4_7=0;

int TapID_1_8=0;
int TapID_2_8=0;
int TapID_3_8=0;
int ButtonID_0_8=0;
int ButtonID_1_8=0;
int ButtonID_2_8=0;
int ButtonID_3_8=0;
int ButtonID_4_8=0;




