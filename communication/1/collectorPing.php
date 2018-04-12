<?php
$link = mysql_connect("31.24.227.135", 'mcoban_mysqlusr', ';[U1&e_NN)8Z') or die ("There is a problem on server.Please try again later...");
mysql_select_db("mcoban_Truva_Dbm",$link) or die ("There is a problem on database.Please try again later...");


/// musluktan gelen son veri tarihini yaz, musluk status değiştir------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$imei = $_GET["imei"];
$YMD = $_GET["YMD"];
$H = $_GET["H"];
$MS = $_GET["MS"];
$GMT = $_GET["GMT"];
$Lat = $_GET["Lat"];
$Long = $_GET["Long"];

$GMTHour= 3-$GMT+$H;

$tapNum=0;

$HoldingID=0;
$CompanyID=0;
$BarGroupID=0;
$collector_id=0;

$tapHexID_1='aabbcc';
$tapID_1=0;
$TapName_1=0;
$AlcoholGroupID_1=0;
$AlcoholTypeID_1=0;
$AlcoholTypeName_1=0;
$AlcoholBrandID_1=0;
$ButtonID_1_1=1;
$buttonName_1_1=0;
$buttonClReal_1_1;
$buttonClShown_1_1;
$ButtonID_1_2=2;
$buttonName_1_2=0;
$buttonClReal_1_2;
$buttonClShown_1_2;
$ButtonID_1_3=3;
$buttonName_1_3=0;
$buttonClReal_1_3;
$buttonClShown_1_3;
$ButtonID_1_4=4;
$buttonName_1_4=0;
$buttonClReal_1_4;
$buttonClShown_1_4;
$NetPrice_1;
$SalePrice_1;

$tapHexID_2=0;
$tapID_2=0;
$TapName_2=0;
$AlcoholGroupID_2=0;
$AlcoholTypeID_2=0;
$AlcoholTypeName_2=0;
$AlcoholBrandID_2=0;
$ButtonID_2_1=1;
$buttonName_2_1=0;
$buttonClRea2_1_1;
$buttonClShown_2_1;
$ButtonID_2_2=2;
$buttonName_2_2=0;
$buttonClReal_2_2;
$buttonClShown_2_2;
$ButtonID_2_3=3;
$buttonName_2_3=0;
$buttonClReal_2_3;
$buttonClShown_2_3;
$ButtonID_2_4=4;
$buttonName_2_4=0;
$buttonClReal_2_4;
$buttonClShown_2_4;
$NetPrice_2;
$SalePrice_2;

$tapHexID_3=0;
$tapID_3=0;
$TapName_3=0;
$AlcoholGroupID_3=0;
$AlcoholTypeID_3=0;
$AlcoholTypeName_3=0;
$AlcoholBrandID_3=0;
$ButtonID_3_1=1;
$buttonName_3_1=0;
$buttonClReal_3_1=0;
$buttonClShown_3_1=0;
$ButtonID_3_2=2;
$buttonName_3_2=0;
$buttonClReal_3_2=0;
$buttonClShown_3_2=0;
$ButtonID_3_3=3;
$buttonName_3_3=0;
$buttonClReal_3_3=0;
$buttonClShown_3_3=0;
$ButtonID_3_4=4;
$buttonName_3_4=0;
$buttonClReal_3_4=0;
$buttonClShown_3_4=0;
$NetPrice_3=0;
$SalePrice_3=0;

$tapHexID_4=0;
$tapID_4=0;
$TapName_4=0;
$AlcoholGroupID_4=0;
$AlcoholTypeID_4=0;
$AlcoholTypeName_4=0;
$AlcoholBrandID_4=0;
$ButtonID_4_1=1;
$buttonName_4_1=0;
$buttonClReal_4_1=0;
$buttonClShown_4_1=0;
$ButtonID_4_2=2;
$buttonName_4_2=0;
$buttonClReal_4_2=0;
$buttonClShown_4_2=0;
$ButtonID_4_3=3;
$buttonName_4_3=0;
$buttonClReal_4_3=0;
$buttonClShown_4_3=0;
$ButtonID_4_4=4;
$buttonName_4_4=0;
$buttonClReal_4_4=0;
$buttonClShown_4_4=0;
$NetPrice_4=0;
$SalePrice_4=0;

$tapHexID_5=0;
$tapID_5=0;
$TapName_5=0;
$AlcoholGroupID_5=0;
$AlcoholTypeID_5=0;
$AlcoholTypeName_5=0;
$AlcoholBrandID_5=0;
$ButtonID_5_1=1;
$buttonName_5_1=0;
$buttonClReal_5_1=0;
$buttonClShown_5_1=0;
$ButtonID_5_2=2;
$buttonName_5_2=0;
$buttonClReal_5_2=0;
$buttonClShown_5_2=0;
$ButtonID_5_3=3;
$buttonName_5_3=0;
$buttonClReal_5_3=0;
$buttonClShown_5_3=0;
$ButtonID_5_4=4;
$buttonName_5_4=0;
$buttonClReal_5_4=0;
$buttonClShown_5_4=0;
$NetPrice_5=0;
$SalePrice_5=0;

$tapHexID_6=0;
$tapID_6=0;
$TapName_6=0;
$AlcoholGroupID_6=0;
$AlcoholTypeID_6=0;
$AlcoholTypeName_6=0;
$AlcoholBrandID_6=0;
$ButtonID_6_1=1;
$buttonName_6_1=0;
$buttonClReal_6_1=0;
$buttonClShown_6_1=0;
$ButtonID_6_2=2;
$buttonName_6_2=0;
$buttonClReal_6_2=0;
$buttonClShown_6_2=0;
$ButtonID_6_3=3;
$buttonName_6_3=0;
$buttonClReal_6_3=0;
$buttonClShown_6_3=0;
$ButtonID_6_4=4;
$buttonName_6_4=0;
$buttonClReal_6_4=0;
$buttonClShown_6_4=0;
$NetPrice_6=0;
$SalePrice_6=0;

$tapHexID_7=0;
$tapID_7=0;
$TapName_7=0;
$AlcoholGroupID_7=0;
$AlcoholTypeID_7=0;
$AlcoholTypeName_7=0;
$AlcoholBrandID_7=0;
$ButtonID_7_1=1;
$buttonName_7_1=0;
$buttonClReal_7_1=0;
$buttonClShown_7_1=0;
$ButtonID_7_2=2;
$buttonName_7_2=0;
$buttonClReal_7_2=0;
$buttonClShown_7_2=0;
$ButtonID_7_3=3;
$buttonName_7_3=0;
$buttonClReal_7_3=0;
$buttonClShown_7_3=0;
$ButtonID_7_4=4;
$buttonName_7_4=0;
$buttonClReal_7_4=0;
$buttonClShown_7_4=0;
$NetPrice_7=0;
$SalePrice_7=0;

$tapHexID_8=0;
$tapID_8=0;
$TapName_8=0;
$AlcoholGroupID_8=0;
$AlcoholTypeID_8=0;
$AlcoholTypeName_8=0;
$AlcoholBrandID_8=0;
$ButtonID_8_1=1;
$buttonName_8_1=0;
$buttonClReal_8_1=0;
$buttonClShown_8_1=0;
$ButtonID_8_2=2;
$buttonName_8_2=0;
$buttonClReal_8_2=0;
$buttonClShown_8_2=0;
$ButtonID_8_3=3;
$buttonName_8_3=0;
$buttonClReal_8_3=0;
$buttonClShown_8_3=0;
$ButtonID_8_4=4;
$buttonName_8_4=0;
$buttonClReal_8_4;
$buttonClShown_8_4;
$NetPrice_8;
$SalePrice_8;

if ($GMTHour <0)
{
    $GMTHour=$GMTHour+24;
}

$HMS=$H.':'.$MS;
$date=$YMD.' '.$HMS;
$Date_ = date($date);

$GMT_HMS=$GMTHour.':'.$MS;
$date_GMT=$YMD.' '.$GMT_HMS;
$GMT_Date_ = date($date_GMT);

$valid_device=0;

$result = mysql_query("Select * from collectorList ");

while ($row = mysql_fetch_array($result))
{
    if($row["imei"] == $imei )
    {
        $valid_device=1;
        $collector_id=$row["collector_id"];
    }
}
if ($valid_device == 1)
{

    $result = mysql_query("Select * from tap WHERE collector_id =$collector_id ");
    while ($row = mysql_fetch_array($result))
    {
        $valid_device=1;
        $tapID=$row["tapID"];
        $ID1=$row["ID1"];
    }
    
    if($Lat == 0 && $Long == 0)
    {
        mysql_query("UPDATE `collectorList` SET last_data_datetime = '$GMT_Date_' , collectorStatusID = 1 WHERE imei = $imei ")or die(mysql_error());
        
    }
    else
    {
        mysql_query("UPDATE `collectorList` SET last_data_datetime = '$GMT_Date_' , collectorStatusID = 1 , Latitude='$Lat' , Longitude='$Long' WHERE imei = $imei ")or die(mysql_error());
    }
}

  
$webControlCounter = 0;
$i = 0;


$webControl = mysql_query("Select * from connectionLog where collector_id = $collector_id ");
while ($row = mysql_fetch_array($webControl)) 
{
    $webControlCounter++;
}

if ($webControlCounter != 1 )
{
    $webControl = mysql_query("Select * from connectionLog where collector_id = $collector_id ");
    while ($row = mysql_fetch_array($webControl)) 
    {
        
        $dataConnectionLogID = $row["ConnectionLogID"];
        $i++;
        if($i < $webControlCounter)
        {
            mysql_query("DELETE FROM connectionLog WHERE collector_id = $collector_id AND ConnectionLogID = '$dataConnectionLogID'")or die(mysql_error());
        }
    }
}


$webControl = mysql_query("Select * from connectionLog where collector_id = $collector_id ");
while ($row = mysql_fetch_array($webControl)) 
{
    $dataConnectionLogID = $row["ConnectionLogID"];
    $i++;
    
    $ConnectionLogJson=$row["ConnectionLogJson"];
    
    $jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($ConnectionLogJson, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
    
    $array = json_decode($ConnectionLogJson,true);
    
    foreach ($jsonIterator as $key => $val) 
    {
        if ( $key == 'HoldingID' && is_array ($val)==0)
        {
            $HoldingID=$val;
        }
        if ( $key == 'CompanyID' && is_array ($val)==0)
        {
            $CompanyID=$val;
        }
        if ( $key == 'BarGroupID' && is_array ($val)==0)
        {
            $BarGroupID=$val;
        }
        if ( $key == 'collector_id' && is_array ($val)==0)
        {
            $collectorID=$val;
            
        }          
        if ( $key == 'tapId' && is_array ($val)==0)
        {
            $tapNum=$tapNum+1;
            $tapID=$val;
            switch ($tapNum)
            {
                case 1:
                    $tapID_1=$val;
                break;
                case 2:
                    $tapID_2=$val;
                break;
                case 3:
                    $tapID_3=$val;
                break;
                case 4:
                    $tapID_4=$val;
                break;
                case 5:
                    $tapID_5=$val;
                break;
                case 6:
                    $tapID_6=$val;
                break;
                case 7:
                    $tapID_7=$val;
                break;
                case 8:
                    $tapID_8=$val;
                break;
                default:
                break;
            }
            
        }
        if ( $key == 'TapName' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $TapName_1=$val;
                break;
                case 2:
                    $TapName_2=$val;
                break;
                case 3:
                    $TapName_3=$val;
                break;
                case 4:
                    $TapName_4=$val;
                break;
                case 5:
                    $TapName_5=$val;
                break;
                case 6:
                    $TapName_6=$val;
                break;
                case 7:
                    $TapName_7=$val;
                break;
                case 8:
                    $TapName_8=$val;
                break;
                default:
                break;
            }
        }
        if ( $key == 'AlcoholGroupID' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $AlcoholGroupID_1=$val;
                break;
                case 2:
                    $AlcoholGroupID_2=$val;
                break;
                case 3:
                    $AlcoholGroupID_3=$val;
                break;
                case 4:
                    $AlcoholGroupID_4=$val;
                break;
                case 5:
                    $AlcoholGroupID_5=$val;
                break;
                case 6:
                    $AlcoholGroupID_6=$val;
                break;
                case 7:
                    $AlcoholGroupID_7=$val;
                break;
                case 8:
                    $AlcoholGroupID_8=$val;
                break;
                default:
                break;
            }
        }
        if ( $key == 'AlcoholTypeID' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $AlcoholTypeID_1=$val;
                break;
                case 2:
                    $AlcoholTypeID_2=$val;
                break;
                case 3:
                    $AlcoholTypeID_3=$val;
                break;
                case 4:
                    $AlcoholTypeID_4=$val;
                break;
                case 5:
                    $AlcoholTypeID_5=$val;
                break;
                case 6:
                    $AlcoholTypeID_6=$val;
                break;
                case 7:
                    $AlcoholTypeID_7=$val;
                break;
                case 8:
                    $AlcoholTypeID_8=$val;
                break;
                default:
                break;
            }
        }
        if ( $key == 'AlcoholTypeName' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $AlcoholTypeName_1=$val;
                break;
                case 2:
                    $AlcoholTypeName_2=$val;
                break;
                case 3:
                    $AlcoholTypeName_3=$val;
                break;
                case 4:
                    $AlcoholTypeName_4=$val;
                break;
                case 5:
                    $AlcoholTypeName_5=$val;
                break;
                case 6:
                    $AlcoholTypeName_6=$val;
                break;
                case 7:
                    $AlcoholTypeName_7=$val;
                break;
                case 8:
                    $AlcoholTypeName_8=$val;
                break;
                default:
                break;
            }
        }
        if ( $key == 'AlcoholBrandID' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $AlcoholBrandID_1=$val;
                break;
                case 2:
                    $AlcoholBrandID_2=$val;
                break;
                case 3:
                    $AlcoholBrandID_3=$val;
                break;
                case 4:
                    $AlcoholBrandID_4=$val;
                break;
                case 5:
                    $AlcoholBrandID_5=$val;
                break;
                case 6:
                    $AlcoholBrandID_6=$val;
                break;
                case 7:
                    $AlcoholBrandID_7=$val;
                break;
                case 8:
                    $AlcoholBrandID_8=$val;
                break;
                default:
                break;
            }
        }
        if ( $key == 'ButtonID' && is_array ($val)==0)
        {
            $ButtonID=$val;
        }
        if ( $key == 'buttonName' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_1_1=$val;
                        break;
                        case 2:
                            $buttonName_1_2=$val;
                        break;
                        case 3:
                            $buttonName_1_3=$val;
                        break;
                        case 4:
                            $buttonName_1_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 2:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_2_1=$val;
                        break;
                        case 2:
                            $buttonName_2_2=$val;
                        break;
                        case 3:
                            $buttonName_2_3=$val;
                        break;
                        case 4:
                            $buttonName_2_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 3:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_3_1=$val;
                        break;
                        case 2:
                            $buttonName_3_2=$val;
                        break;
                        case 3:
                            $buttonName_3_3=$val;
                        break;
                        case 4:
                            $buttonName_3_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 4:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_4_1=$val;
                        break;
                        case 2:
                            $buttonName_4_2=$val;
                        break;
                        case 3:
                            $buttonName_4_3=$val;
                        break;
                        case 4:
                            $buttonName_4_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 5:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_5_1=$val;
                        break;
                        case 2:
                            $buttonName_5_2=$val;
                        break;
                        case 3:
                            $buttonName_5_3=$val;
                        break;
                        case 4:
                            $buttonName_5_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 6:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_6_1=$val;
                        break;
                        case 2:
                            $buttonName_6_2=$val;
                        break;
                        case 3:
                            $buttonName_6_3=$val;
                        break;
                        case 4:
                            $buttonName_6_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 7:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_7_1=$val;
                        break;
                        case 2:
                            $buttonName_7_2=$val;
                        break;
                        case 3:
                            $buttonName_7_3=$val;
                        break;
                        case 4:
                            $buttonName_7_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 8:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonName_8_1=$val;
                        break;
                        case 2:
                            $buttonName_8_2=$val;
                        break;
                        case 3:
                            $buttonName_8_3=$val;
                        break;
                        case 4:
                            $buttonName_8_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                default:
                break;
            }
            $buttonName=$val;
        }
        if ( $key == 'buttonClReal' && is_array ($val)==0)
        { 
            $buttonClReal_array=$val;
            for($_len=0;$_len<strlen($buttonClReal_array);$_len++)
            {
               if($buttonClReal_array[$_len] == ',')
               {
                   $buttonClReal_array[$_len] = '.';
               }
            }
            echo '<br>'.$buttonClReal_array.'<br>';
            switch ($tapNum)
            {
                case 1:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_1_1=$val;
                        break;
                        case 2:
                            $buttonClReal_1_2=$val;
                        break;
                        case 3:
                            $buttonClReal_1_3=$val;
                        break;
                        case 4:
                            $buttonClReal_1_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 2:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_2_1=$val;
                        break;
                        case 2:
                            $buttonClReal_2_2=$val;
                        break;
                        case 3:
                            $buttonClReal_2_3=$val;
                        break;
                        case 4:
                            $buttonClReal_2_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 3:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_3_1=$val;
                        break;
                        case 2:
                            $buttonClReal_3_2=$val;
                        break;
                        case 3:
                            $buttonClReal_3_3=$val;
                        break;
                        case 4:
                            $buttonClReal_3_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 4:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_4_1=$val;
                        break;
                        case 2:
                            $buttonClReal_4_2=$val;
                        break;
                        case 3:
                            $buttonClReal_4_3=$val;
                        break;
                        case 4:
                            $buttonClReal_4_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 5:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_5_1=$val;
                        break;
                        case 2:
                            $buttonClReal_5_2=$val;
                        break;
                        case 3:
                            $buttonClReal_5_3=$val;
                        break;
                        case 4:
                            $buttonClReal_5_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 6:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_6_1=$val;
                        break;
                        case 2:
                            $buttonClReal_6_2=$val;
                        break;
                        case 3:
                            $buttonClReal_6_3=$val;
                        break;
                        case 4:
                            $buttonClReal_6_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 7:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_7_1=$val;
                        break;
                        case 2:
                            $buttonClReal_7_2=$val;
                        break;
                        case 3:
                            $buttonClReal_7_3=$val;
                        break;
                        case 4:
                            $buttonClReal_7_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 8:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClReal_8_1=$val;
                        break;
                        case 2:
                            $buttonClReal_8_2=$val;
                        break;
                        case 3:
                            $buttonClReal_8_3=$val;
                        break;
                        case 4:
                            $buttonClReal_8_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                default:
                break;
            }
            $buttonClReal=$val;
        }
        if ( $key == 'buttonClShown' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_1_1=$val;
                        break;
                        case 2:
                            $buttonClShown_1_2=$val;
                        break;
                        case 3:
                            $buttonClShown_1_3=$val;
                        break;
                        case 4:
                            $buttonClShown_1_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 2:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_2_1=$val;
                        break;
                        case 2:
                            $buttonClShown_2_2=$val;
                        break;
                        case 3:
                            $buttonClShown_2_3=$val;
                        break;
                        case 4:
                            $buttonClShown_2_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 3:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_3_1=$val;
                        break;
                        case 2:
                            $buttonClShown_3_2=$val;
                        break;
                        case 3:
                            $buttonClShown_3_3=$val;
                        break;
                        case 4:
                            $buttonClShown_3_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 4:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_4_1=$val;
                        break;
                        case 2:
                            $buttonClShown_4_2=$val;
                        break;
                        case 3:
                            $buttonClShown_4_3=$val;
                        break;
                        case 4:
                            $buttonClShown_4_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 5:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_5_1=$val;
                        break;
                        case 2:
                            $buttonClShown_5_2=$val;
                        break;
                        case 3:
                            $buttonClShown_5_3=$val;
                        break;
                        case 4:
                            $buttonClShown_5_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 6:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_6_1=$val;
                        break;
                        case 2:
                            $buttonClShown_6_2=$val;
                        break;
                        case 3:
                            $buttonClShown_6_3=$val;
                        break;
                        case 4:
                            $buttonClShown_6_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 7:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_7_1=$val;
                        break;
                        case 2:
                            $buttonClShown_7_2=$val;
                        break;
                        case 3:
                            $buttonClShown_7_3=$val;
                        break;
                        case 4:
                            $buttonClShown_7_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                case 8:
                    switch($ButtonID)
                    {
                        case 1:
                            $buttonClShown_8_1=$val;
                        break;
                        case 2:
                            $buttonClShown_8_2=$val;
                        break;
                        case 3:
                            $buttonClShown_8_3=$val;
                        break;
                        case 4:
                            $buttonClShown_8_4=$val;
                        break;
                        default:
                        break;
                    }
                break;
                default:
                break;
            }
            $buttonClShown=$val;
        }
        if ( $key == 'NetPrice' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $NetPrice_1=$val;
                break;
                case 2:
                    $NetPrice_2=$val;
                break;
                case 3:
                    $NetPrice_3=$val;
                break;
                case 4:
                    $NetPrice_4=$val;
                break;
                case 5:
                    $NetPrice_5=$val;
                break;
                case 6:
                    $NetPrice_6=$val;
                break;
                case 7:
                    $NetPrice_7=$val;
                break;
                case 8:
                    $NetPrice_8=$val;
                break;
                default:
                break;
            }
            $NetPrice=$val;
        }
        if ( $key == 'SalePrice' && is_array ($val)==0)
        {
            switch ($tapNum)
            {
                case 1:
                    $SalePrice_1=$val;
                break;
                case 2:
                    $SalePrice_2=$val;
                break;
                case 3:
                    $SalePrice_3=$val;
                break;
                case 4:
                    $SalePrice_4=$val;
                break;
                case 5:
                    $SalePrice_5=$val;
                break;
                case 6:
                    $SalePrice_6=$val;
                break;
                case 7:
                    $SalePrice_7=$val;
                break;
                case 8:
                    $SalePrice_8=$val;
                break;
                default:
                break;
            }
            $SalePrice=$val;
        }
    }
}
$counter=0; 

echo $tapNum;
 
echo '<br>'.$buttonClReal_array.'<br>';
echo '<br>'.'samet'.'<br>';
for($counter=1 ; $counter<= $tapNum ; $counter++)
{
    switch($counter)
    {
        case 1:
        
            $buttonClReal_1_1=floatval($buttonClReal_1_1);
            $buttonClReal_1_2=floatval($buttonClReal_1_2);
            $buttonClReal_1_3=floatval($buttonClReal_1_3);
            $buttonClReal_1_4=floatval($buttonClReal_1_4);
            $buttonClShown_1_1=floatval($buttonClShown_1_1);
            $buttonClShown_1_2=floatval($buttonClShown_1_2);
            $buttonClShown_1_3=floatval($buttonClShown_1_3);
            $buttonClShown_1_4=floatval($buttonClShown_1_4);
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_1 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {       
                if(strlen($AlcoholTypeName_1) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_1_=dechex($ID1);
                    $tapHexID_1=hexdec($tapHexID_1_[0].$tapHexID_1_[1]).','.hexdec($tapHexID_1_[2].$tapHexID_1_[3]).','.hexdec($tapHexID_1_[4].$tapHexID_1_[5]);
                    echo $tapHexID_1.',';
                    $num_of_name_data=strlen($AlcoholTypeName_1)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_1);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_1[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_1_[0].$tapHexID_1_[1]);
                    $checksum = $checksum + hexdec($tapHexID_1_[2].$tapHexID_1_[3]);
                    $checksum = $checksum + hexdec($tapHexID_1_[4].$tapHexID_1_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_1 ")or die(mysql_error());
        
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_1','$tapID_1','$HoldingID','$CompanyID','$BarGroupID','$TapName_1','$AlcoholGroupID_1','$AlcoholTypeID_1','$AlcoholBrandID_1','$ButtonID_1_1','$buttonName_1_1','$buttonClReal_1_1','$buttonClShown_1_1','$NetPrice_1','$SalePrice_1')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_1','$tapID_1','$HoldingID','$CompanyID','$BarGroupID','$TapName_1','$AlcoholGroupID_1','$AlcoholTypeID_1','$AlcoholBrandID_1','$ButtonID_1_2','$buttonName_1_2','$buttonClReal_1_2','$buttonClShown_1_2','$NetPrice_1','$SalePrice_1')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_1','$tapID_1','$HoldingID','$CompanyID','$BarGroupID','$TapName_1','$AlcoholGroupID_1','$AlcoholTypeID_1','$AlcoholBrandID_1','$ButtonID_1_3','$buttonName_1_3','$buttonClReal_1_3','$buttonClShown_1_3','$NetPrice_1','$SalePrice_1')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_1','$tapID_1','$HoldingID','$CompanyID','$BarGroupID','$TapName_1','$AlcoholGroupID_1','$AlcoholTypeID_1','$AlcoholBrandID_1','$ButtonID_1_4','$buttonName_1_4','$buttonClReal_1_4','$buttonClShown_1_4','$NetPrice_1','$SalePrice_1')")
                or die(mysql_error());
        break;
        case 2:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_2 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_2) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_2_=dechex($ID1);
                    $tapHexID_2=hexdec($tapHexID_2_[0].$tapHexID_2_[1]).','.hexdec($tapHexID_2_[2].$tapHexID_2_[3]).','.hexdec($tapHexID_2_[4].$tapHexID_2_[5]);
                    echo $tapHexID_2.',';
                    $num_of_name_data=strlen($AlcoholTypeName_2)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_2);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_2[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_2_[0].$tapHexID_2_[1]);
                    $checksum = $checksum + hexdec($tapHexID_2_[2].$tapHexID_2_[3]);
                    $checksum = $checksum + hexdec($tapHexID_2_[4].$tapHexID_2_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_2 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_2','$tapID_2','$HoldingID','$CompanyID','$BarGroupID','$TapName_2','$AlcoholGroupID_2','$AlcoholTypeID_2','$AlcoholBrandID_2','$ButtonID_2_1','$buttonName_2_1','$buttonClReal_2_1','$buttonClShown_2_1','$NetPrice_2','$SalePrice_2')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_2','$tapID_2','$HoldingID','$CompanyID','$BarGroupID','$TapName_2','$AlcoholGroupID_2','$AlcoholTypeID_2','$AlcoholBrandID_2','$ButtonID_2_2','$buttonName_2_2','$buttonClReal_2_2','$buttonClShown_2_2','$NetPrice_2','$SalePrice_2')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_2','$tapID_2','$HoldingID','$CompanyID','$BarGroupID','$TapName_2','$AlcoholGroupID_2','$AlcoholTypeID_2','$AlcoholBrandID_2','$ButtonID_2_3','$buttonName_2_3','$buttonClReal_2_3','$buttonClShown_2_3','$NetPrice_2','$SalePrice_2')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_2','$tapID_2','$HoldingID','$CompanyID','$BarGroupID','$TapName_2','$AlcoholGroupID_2','$AlcoholTypeID_2','$AlcoholBrandID_2','$ButtonID_2_4','$buttonName_2_4','$buttonClReal_2_4','$buttonClShown_2_4','$NetPrice_2','$SalePrice_2')")
                or die(mysql_error());
        break;
        
        case 3:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_3 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_3) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_3_=dechex($ID1);
                    $tapHexID_3=hexdec($tapHexID_3_[0].$tapHexID_3_[1]).','.hexdec($tapHexID_3_[2].$tapHexID_3_[3]).','.hexdec($tapHexID_3_[4].$tapHexID_3_[5]);
                    echo $tapHexID_3.',';
                    $num_of_name_data=strlen($AlcoholTypeName_3)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_3);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_3[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_3_[0].$tapHexID_3_[1]);
                    $checksum = $checksum + hexdec($tapHexID_3_[2].$tapHexID_3_[3]);
                    $checksum = $checksum + hexdec($tapHexID_3_[4].$tapHexID_3_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_3 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_3','$tapID_3','$HoldingID','$CompanyID','$BarGroupID','$TapName_3','$AlcoholGroupID_3','$AlcoholTypeID_3','$AlcoholBrandID_3','$ButtonID_3_1','$buttonName_3_1','$buttonClReal_3_1','$buttonClShown_3_1','$NetPrice_3','$SalePrice_3')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_3','$tapID_3','$HoldingID','$CompanyID','$BarGroupID','$TapName_3','$AlcoholGroupID_3','$AlcoholTypeID_3','$AlcoholBrandID_3','$ButtonID_3_2','$buttonName_3_2','$buttonClReal_3_2','$buttonClShown_3_2','$NetPrice_3','$SalePrice_3')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_3','$tapID_3','$HoldingID','$CompanyID','$BarGroupID','$TapName_3','$AlcoholGroupID_3','$AlcoholTypeID_3','$AlcoholBrandID_3','$ButtonID_3_3','$buttonName_3_3','$buttonClReal_3_3','$buttonClShown_3_3','$NetPrice_3','$SalePrice_3')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_3','$tapID_3','$HoldingID','$CompanyID','$BarGroupID','$TapName_3','$AlcoholGroupID_3','$AlcoholTypeID_3','$AlcoholBrandID_3','$ButtonID_3_4','$buttonName_3_4','$buttonClReal_3_4','$buttonClShown_3_4','$NetPrice_3','$SalePrice_3')")
                or die(mysql_error());
        break;
        case 4:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_4 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_4) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_4_=dechex($ID1);
                    $tapHexID_4=hexdec($tapHexID_4_[0].$tapHexID_4_[1]).','.hexdec($tapHexID_4_[2].$tapHexID_4_[3]).','.hexdec($tapHexID_4_[4].$tapHexID_4_[5]);
                    echo $tapHexID_4.',';
                    $num_of_name_data=strlen($AlcoholTypeName_4)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_4);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_4[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_4_[0].$tapHexID_4_[1]);
                    $checksum = $checksum + hexdec($tapHexID_4_[2].$tapHexID_4_[3]);
                    $checksum = $checksum + hexdec($tapHexID_4_[4].$tapHexID_4_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_4 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_4','$tapID_4','$HoldingID','$CompanyID','$BarGroupID','$TapName_4','$AlcoholGroupID_4','$AlcoholTypeID_4','$AlcoholBrandID_4','$ButtonID_4_1','$buttonName_4_1','$buttonClReal_4_1','$buttonClShown_4_1','$NetPrice_4','$SalePrice_4')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_4','$tapID_4','$HoldingID','$CompanyID','$BarGroupID','$TapName_4','$AlcoholGroupID_4','$AlcoholTypeID_4','$AlcoholBrandID_4','$ButtonID_4_2','$buttonName_4_2','$buttonClReal_4_2','$buttonClShown_4_2','$NetPrice_4','$SalePrice_4')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_4','$tapID_4','$HoldingID','$CompanyID','$BarGroupID','$TapName_4','$AlcoholGroupID_4','$AlcoholTypeID_4','$AlcoholBrandID_4','$ButtonID_4_3','$buttonName_4_3','$buttonClReal_4_3','$buttonClShown_4_3','$NetPrice_4','$SalePrice_4')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_4','$tapID_4','$HoldingID','$CompanyID','$BarGroupID','$TapName_4','$AlcoholGroupID_4','$AlcoholTypeID_4','$AlcoholBrandID_4','$ButtonID_4_4','$buttonName_4_4','$buttonClReal_4_4','$buttonClShown_4_4','$NetPrice_4','$SalePrice_4')")
                or die(mysql_error());
        break;
        case 5:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_5 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_5) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_5_=dechex($ID1);
                    $tapHexID_5=hexdec($tapHexID_5_[0].$tapHexID_5_[1]).','.hexdec($tapHexID_5_[2].$tapHexID_5_[3]).','.hexdec($tapHexID_5_[4].$tapHexID_5_[5]);
                    echo $tapHexID_5.',';
                    $num_of_name_data=strlen($AlcoholTypeName_5)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_5);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_5[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_5_[0].$tapHexID_5_[1]);
                    $checksum = $checksum + hexdec($tapHexID_5_[2].$tapHexID_5_[3]);
                    $checksum = $checksum + hexdec($tapHexID_5_[4].$tapHexID_5_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_5 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_5','$tapID_5','$HoldingID','$CompanyID','$BarGroupID','$TapName_5','$AlcoholGroupID_5','$AlcoholTypeID_5','$AlcoholBrandID_5','$ButtonID_5_1','$buttonName_5_1','$buttonClReal_5_1','$buttonClShown_5_1','$NetPrice_5','$SalePrice_5')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_5','$tapID_5','$HoldingID','$CompanyID','$BarGroupID','$TapName_5','$AlcoholGroupID_5','$AlcoholTypeID_5','$AlcoholBrandID_5','$ButtonID_5_2','$buttonName_5_2','$buttonClReal_5_2','$buttonClShown_5_2','$NetPrice_5','$SalePrice_5')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_5','$tapID_5','$HoldingID','$CompanyID','$BarGroupID','$TapName_5','$AlcoholGroupID_5','$AlcoholTypeID_5','$AlcoholBrandID_5','$ButtonID_5_3','$buttonName_5_3','$buttonClReal_5_3','$buttonClShown_5_3','$NetPrice_5','$SalePrice_5')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_5','$tapID_5','$HoldingID','$CompanyID','$BarGroupID','$TapName_5','$AlcoholGroupID_5','$AlcoholTypeID_5','$AlcoholBrandID_5','$ButtonID_5_4','$buttonName_5_4','$buttonClReal_5_4','$buttonClShown_5_4','$NetPrice_5','$SalePrice_5')")
                or die(mysql_error());
        break;
        case 6:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_6 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_6) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_6_=dechex($ID1);
                    $tapHexID_6=hexdec($tapHexID_6_[0].$tapHexID_6_[1]).','.hexdec($tapHexID_6_[2].$tapHexID_6_[3]).','.hexdec($tapHexID_6_[4].$tapHexID_6_[5]);
                    echo $tapHexID_6.',';
                    $num_of_name_data=strlen($AlcoholTypeName_6)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_6);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_6[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_6_[0].$tapHexID_6_[1]);
                    $checksum = $checksum + hexdec($tapHexID_6_[2].$tapHexID_6_[3]);
                    $checksum = $checksum + hexdec($tapHexID_6_[4].$tapHexID_6_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_6 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_6','$tapID_6','$HoldingID','$CompanyID','$BarGroupID','$TapName_6','$AlcoholGroupID_6','$AlcoholTypeID_6','$AlcoholBrandID_6','$ButtonID_6_1','$buttonName_6_1','$buttonClReal_6_1','$buttonClShown_6_1','$NetPrice_1','$SalePrice_6')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_6','$tapID_6','$HoldingID','$CompanyID','$BarGroupID','$TapName_6','$AlcoholGroupID_6','$AlcoholTypeID_6','$AlcoholBrandID_6','$ButtonID_6_2','$buttonName_6_2','$buttonClReal_6_2','$buttonClShown_6_2','$NetPrice_1','$SalePrice_6')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_6','$tapID_6','$HoldingID','$CompanyID','$BarGroupID','$TapName_6','$AlcoholGroupID_6','$AlcoholTypeID_6','$AlcoholBrandID_6','$ButtonID_6_3','$buttonName_6_3','$buttonClReal_6_3','$buttonClShown_6_3','$NetPrice_1','$SalePrice_6')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_6','$tapID_6','$HoldingID','$CompanyID','$BarGroupID','$TapName_6','$AlcoholGroupID_6','$AlcoholTypeID_6','$AlcoholBrandID_6','$ButtonID_6_4','$buttonName_6_4','$buttonClReal_6_4','$buttonClShown_6_4','$NetPrice_1','$SalePrice_6')")
                or die(mysql_error());
        break;
        case 7:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_7 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_7) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_7_=dechex($ID1);
                    $tapHexID_7=hexdec($tapHexID_7_[0].$tapHexID_7_[1]).','.hexdec($tapHexID_7_[2].$tapHexID_7_[3]).','.hexdec($tapHexID_7_[4].$tapHexID_7_[5]);
                    echo $tapHexID_7.',';
                    $num_of_name_data=strlen($AlcoholTypeName_7)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_7);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_7[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum = 0;
                    $checksum = hexdec($tapHexID_7_[0].$tapHexID_7_[1]);
                    $checksum = $checksum + hexdec($tapHexID_7_[2].$tapHexID_7_[3]);
                    $checksum = $checksum + hexdec($tapHexID_7_[4].$tapHexID_7_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_7 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_7','$tapID_7','$HoldingID','$CompanyID','$BarGroupID','$TapName_7','$AlcoholGroupID_7','$AlcoholTypeID_7','$AlcoholBrandID_7','$ButtonID_7_1','$buttonName_7_1','$buttonClReal_7_1','$buttonClShown_7_1','$NetPrice_7','$SalePrice_7')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_7','$tapID_7','$HoldingID','$CompanyID','$BarGroupID','$TapName_7','$AlcoholGroupID_7','$AlcoholTypeID_7','$AlcoholBrandID_7','$ButtonID_7_2','$buttonName_7_2','$buttonClReal_7_2','$buttonClShown_7_2','$NetPrice_7','$SalePrice_7')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_7','$tapID_7','$HoldingID','$CompanyID','$BarGroupID','$TapName_7','$AlcoholGroupID_7','$AlcoholTypeID_7','$AlcoholBrandID_7','$ButtonID_7_3','$buttonName_7_3','$buttonClReal_7_3','$buttonClShown_7_3','$NetPrice_7','$SalePrice_7')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_7','$tapID_7','$HoldingID','$CompanyID','$BarGroupID','$TapName_7','$AlcoholGroupID_7','$AlcoholTypeID_7','$AlcoholBrandID_7','$ButtonID_7_4','$buttonName_7_4','$buttonClReal_7_4','$buttonClShown_7_4','$NetPrice_7','$SalePrice_7')")
                or die(mysql_error());
        break;
        case 8:
            $getTapID = mysql_query("Select * from tap where TapID = $tapID_8 ");
            while ($row = mysql_fetch_array($getTapID)) 
            {   
                if(strlen($AlcoholTypeName_8) < 25)
                {
                    echo '/';
                    $ID1=$row["ID1"];
                    $tapHexID_8_=dechex($ID1);
                    $tapHexID_8=hexdec($tapHexID_8_[0].$tapHexID_8_[1]).','.hexdec($tapHexID_8_[2].$tapHexID_8_[3]).','.hexdec($tapHexID_8_[4].$tapHexID_8_[5]);
                    echo $tapHexID_8.',';
                    $num_of_name_data=strlen($AlcoholTypeName_8)+8;
                    echo $num_of_name_data.',';
                    echo hexdec(F6).',';
                    $totNameLength=0;
                    for($name_len=0;$name_len<strlen($AlcoholTypeName_8);$name_len++)
                    {
                        $dec_Name= (bin2hex($AlcoholTypeName_8[$name_len]));
                        echo hexdec($dec_Name).',';
                        $totNameLength = $totNameLength + hexdec($dec_Name);
                    }    
                    
                    $checksum=0;
                    $checksum = hexdec($tapHexID_8_[0].$tapHexID_8_[1]);
                    $checksum = $checksum + hexdec($tapHexID_8_[2].$tapHexID_8_[3]);
                    $checksum = $checksum + hexdec($tapHexID_8_[4].$tapHexID_8_[5]);
                    $checksum = $checksum + $num_of_name_data+$totNameLength;
                    $checksum = $checksum + 255+254+246;
                    $checksum=$checksum%256;
                    echo $checksum.'&';
                }
            }
            
            mysql_query("DELETE FROM collectorCommunicationSettings WHERE collectorID = $collectorID  AND tapID = $tapID_8 ")or die(mysql_error());
            
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_8','$tapID_8','$HoldingID','$CompanyID','$BarGroupID','$TapName_8','$AlcoholGroupID_8','$AlcoholTypeID_8','$AlcoholBrandID_8','$ButtonID_8_1','$buttonName_8_1','$buttonClReal_8_1','$buttonClShown_8_1','$NetPrice_8','$SalePrice_8')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_8','$tapID_8','$HoldingID','$CompanyID','$BarGroupID','$TapName_8','$AlcoholGroupID_8','$AlcoholTypeID_8','$AlcoholBrandID_8','$ButtonID_8_2','$buttonName_8_2','$buttonClReal_8_2','$buttonClShown_8_2','$NetPrice_8','$SalePrice_8')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_8','$tapID_8','$HoldingID','$CompanyID','$BarGroupID','$TapName_8','$AlcoholGroupID_8','$AlcoholTypeID_8','$AlcoholBrandID_8','$ButtonID_8_3','$buttonName_8_3','$buttonClReal_8_3','$buttonClShown_8_3','$NetPrice_8','$SalePrice_8')")
                or die(mysql_error());
            mysql_query("INSERT INTO collectorCommunicationSettings (imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice)
                VALUES  ('$imei','$collectorID','$tapHexID_8','$tapID_8','$HoldingID','$CompanyID','$BarGroupID','$TapName_8','$AlcoholGroupID_8','$AlcoholTypeID_8','$AlcoholBrandID_8','$ButtonID_8_4','$buttonName_8_4','$buttonClReal_8_4','$buttonClShown_8_4','$NetPrice_8','$SalePrice_8')")
                or die(mysql_error());
        break;
        
        default:
        break;
    }
}





?>
