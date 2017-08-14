# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: truva.co (MySQL 5.7.19-0ubuntu0.16.04.1)
# Database: truva_System_DbM2_db
# Generation Time: 2017-08-14 20:44:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



--
-- Dumping routines (PROCEDURE) for database 'truva_System_DbM2_db'
--
DELIMITER ;;

# Dump of PROCEDURE ADD_COMPANY_BAR_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_COMPANY_BAR_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_COMPANY_BAR_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int, in P_BAR_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BAR_GROUP_ID);

IF @barGroupExist = 0 THEN

CALL SYSTEM_MESSAGE(60);

ELSE

INSERT INTO 
`barGroupToCompany` 
(
`BarGroupID`, 
`CompanyID`
)
VALUES
(
P_BAR_GROUP_ID, 
P_COMPANY_ID
);

CALL SYSTEM_MESSAGE(66);


END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_ALCOHOL_BRAND
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_ALCOHOL_BRAND` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_ALCOHOL_BRAND`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AlcoholBrandID int,  in P_Code varchar(30), in P_Name varchar(100), in P_AlcoholTypeID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholTypeExist = (select count(AlcoholTypeID) from alcoholType where AlcoholTypeID = P_AlcoholTypeID);

IF @alcoholTypeExist = 0 AND P_AlcoholTypeID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(43);

ELSE

SET @alcoholBrandExist = (select count(AlcoholBrandID) from alcoholBrand where AlcoholBrandID = P_AlcoholBrandID);

IF @alcoholBrandExist = 0 AND P_AlcoholBrandID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(51);

ELSE

IF P_AlcoholBrandID IS NULL THEN

SET @sameAlcoholBrandExist = (select count(*) from alcoholBrand where `Code` = P_Code and `Name` = P_Name and `AlcoholTypeID` = P_AlcoholTypeID);

if @sameAlcoholBrandExist > 0 THEN

CALL SYSTEM_MESSAGE(54);

ELSE

INSERT INTO 
`alcoholBrand` 
(
`Code`, 
`Name`,
`AlcoholTypeID`
)
VALUES
(
P_Code,
P_Name,
P_AlcoholTypeID
);

CALL SYSTEM_MESSAGE(52);

END IF;

ELSE

UPDATE 
`alcoholBrand` 
SET 
`Code` = P_Code, 
`Name` = P_Name,
`AlcoholTypeID` = P_AlcoholTypeID
WHERE `AlcoholBrandID` = P_AlcoholBrandID;

CALL SYSTEM_MESSAGE(53);

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_ALCOHOL_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_ALCOHOL_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_ALCOHOL_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AlcoholGroupID int,  in P_Code varchar(30), in P_Name varchar(100))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholGroupExist = (select count(AlcoholGroupID) from alcoholGroup where AlcoholGroupID = P_AlcoholGroupID);

IF @alcoholGroupExist = 0 AND P_AlcoholGroupID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(38);

ELSE

IF P_AlcoholGroupID IS NULL THEN

SET @sameAlcoholGroupExist = (select count(*) from alcoholGroup where `Code` = P_Code and `Name` = P_Name);

if @sameAlcoholGroupExist > 0 THEN

CALL SYSTEM_MESSAGE(41);

ELSE

INSERT INTO 
`alcoholGroup` 
(
`Code`, 
`Name`
)
VALUES
(
P_Code,
P_Name
);

CALL SYSTEM_MESSAGE(39);

END IF;

ELSE

UPDATE 
`alcoholGroup` 
SET 
`Code` = P_Code, 
`Name` = P_Name
WHERE `AlcoholGroupID` = P_AlcoholGroupID;

CALL SYSTEM_MESSAGE(40);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_ALCOHOL_TYPE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_ALCOHOL_TYPE` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_ALCOHOL_TYPE`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AlcoholTypeID int,  in P_Code varchar(30), in P_Name varchar(100), in P_AlcoholGroupID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholGroupExist = (select count(AlcoholGroupID) from alcoholGroup where AlcoholGroupID = P_AlcoholGroupID);

IF @alcoholGroupExist = 0 AND P_AlcoholGroupID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(38);

ELSE

SET @alcoholTypeExist = (select count(AlcoholTypeID) from alcoholType where AlcoholTypeID = P_AlcoholTypeID);

IF @alcoholTypeExist = 0 AND P_AlcoholTypeID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(43);

ELSE

IF P_AlcoholTypeID IS NULL THEN

SET @sameAlcoholTypeExist = (select count(*) from alcoholType where `Code` = P_Code and `Name` = P_Name and `AlcoholGroupID` = P_AlcoholGroupID);

if @sameAlcoholTypeExist > 0 THEN

CALL SYSTEM_MESSAGE(46);

ELSE

INSERT INTO 
`alcoholType` 
(
`Code`, 
`Name`,
`AlcoholGroupID`
)
VALUES
(
P_Code,
P_Name,
P_AlcoholGroupID
);

CALL SYSTEM_MESSAGE(44);

END IF;

ELSE

UPDATE 
`alcoholType` 
SET 
`Code` = P_Code, 
`Name` = P_Name,
`AlcoholGroupID` = P_AlcoholGroupID
WHERE `AlcoholTypeID` = P_AlcoholTypeID;

CALL SYSTEM_MESSAGE(45);

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_AREAS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_AREAS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_AREAS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AREA_ID int, in P_COUNTY_ID int, in P_Area_Name varchar(50))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @areaExist = (select count(AreaID) from area where AreaID = P_AREA_ID);

IF @areaExist = 0 AND P_Area_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(10);

ELSE

SET @countiesExist = (select count(CountyID) from counties where CountyID = P_COUNTY_ID);

IF @countiesExist = 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(9);

ELSE

IF P_AREA_ID IS NULL THEN

INSERT INTO `area` 
(
`CountyID`, 
`AreaName`
)
VALUES
(
P_COUNTY_ID, 
P_Area_Name
);

CALL SYSTEM_MESSAGE(35);

ELSE

UPDATE 
`area` 
SET 
`CountyID` = P_COUNTY_ID, 
`AreaName` = P_Area_Name
 
 WHERE `AreaID` = P_AREA_ID;

CALL SYSTEM_MESSAGE(36);

END IF;

END IF;

END IF;

END IF;


END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_BAR_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_BAR_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_BAR_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_BarGroupID int,  in P_Code varchar(30), in P_Name varchar(100))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BarGroupID);

IF @barGroupExist = 0 AND P_BarGroupID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(60);

ELSE

IF P_BarGroupID IS NULL THEN

SET @sameBarGroupExist = (select count(*) from barGroup where `Code` = P_Code and `Name` = P_Name);

if @sameBarGroupExist > 0 THEN

CALL SYSTEM_MESSAGE(61);

ELSE

INSERT INTO 
`barGroup` 
(
`Code`, 
`Name`
)
VALUES
(
P_Code,
P_Name
);

CALL SYSTEM_MESSAGE(62);

END IF;

ELSE

UPDATE 
`barGroup` 
SET 
`Code` = P_Code, 
`Name` = P_Name
WHERE `BarGroupID` = P_BarGroupID;

CALL SYSTEM_MESSAGE(63);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_CITIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_CITIES` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_CITIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int, in P_COUNTRY_ID int , in P_CityName varchar(100), in P_PlateNo varchar(2), in P_PhoneCode varchar(5))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 AND P_CITY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(8);

ELSE

Set @countryExist = (select count(CountryID) from countries where CountryID = P_COUNTRY_ID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

IF P_CITY_ID IS NULL THEN

INSERT INTO `cities` 
(
`CountryID`, 
`CityName`, 
`PlateNo`, 
`PhoneCode`
)
VALUES
(
P_COUNTRY_ID, 
P_CityName, 
P_PlateNo, 
P_PhoneCode
);

CALL SYSTEM_MESSAGE(26);

ELSE

UPDATE 
`cities` 
SET 
`CountryID` = P_COUNTRY_ID, 
`CityName` = P_CityName, 
`PlateNo` = P_PlateNo, 
`PhoneCode` = P_PhoneCode 
 
 WHERE `CityID` = P_CITY_ID;

CALL SYSTEM_MESSAGE(27);

END IF;

END IF;

END IF;

END IF;


END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_COLLECTORS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_COLLECTORS` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_COLLECTORS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_collector_id int, in P_notification_email varchar(100),  in P_eth_mac_address varchar(50), in P_wifi_mac_address varchar(100), in P_Barcode varchar(50), in P_Latitude varchar(50), in P_Longitude varchar(50))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @collectorExist = (select count(collector_id) from collectorList where collector_id = P_collector_id);

IF @alcoholTypeExist = 0 AND P_collector_id IS NOT NULL THEN

CALL SYSTEM_MESSAGE(71);

ELSE

IF P_collector_id IS NULL THEN

INSERT INTO `collectorList` 
(
`notification_email`, 
`created_at`, 
`active`, 
`Barcode`, 
`Latitude`, 
`Longitude`)
VALUES
(
P_notification_email, 
NOW(), 
0, 
P_Barcode, 
P_Latitude, 
P_Longitude);

select collector_id from collectorList order by collector_id desc limit 1;

ELSE

UPDATE 
`collectorList` 
SET 
`notification_email` = P_notification_email, 
`Barcode` = P_Barcode,
`Latitude` = P_Latitude,
`Longitude` = P_Longitude
WHERE `collector_id` = P_collector_id;

CALL SYSTEM_MESSAGE(53);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_COMPANY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_COMPANY` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_COMPANY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int, in P_CompanyName varchar(100), in P_CompanyAdress varchar(255), in P_InvoiceAddress varchar(100), in P_TaxNo varchar(255), in P_TaxAdministrationName varchar(100), in P_InvoiceTelephone varchar(100), in P_InvoiceMobile varchar(100), in P_InvoiceEmail varchar(100), in P_CompanyTelephone varchar(100), in P_CompanyMobile varchar(100), in P_CompanyFax varchar(100), in P_CompanyEmail varchar(100), in P_CompanySign varchar(100), in P_CountryID int,in P_CityID int,in P_CountyID int,in P_AreaID int, in P_HoldingID int, in P_CompanyTypeID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 AND P_COMPANY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HoldingID);

IF @holdingExist = 0 THEN

CALL SYSTEM_MESSAGE(11);

ELSE

SET @companyTypeExist = (select count(CompanyTypeID) from companyType where CompanyTypeID = P_CompanyTypeID);

IF @companyTypeExist = 0 THEN

CALL SYSTEM_MESSAGE(20);

ELSE

Set @countryExist = (select count(CountryID) from countries where CountryID = P_CountryID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

Set @cityExist = (select count(CityID) from cities where CityID = P_CityID);

IF @cityExist = 0 THEN

CALL SYSTEM_MESSAGE(8);

ELSE

Set @countyExist = (select count(CountyID) from counties where CountyID = P_CountyID);

IF @countyExist = 0 THEN

CALL SYSTEM_MESSAGE(9);

ELSE

Set @areaExist = (select count(AreaID) from area where AreaID = P_AreaID);

IF @areaExist = 0 THEN

CALL SYSTEM_MESSAGE(10);

ELSE

IF P_COMPANY_ID IS NULL THEN

INSERT INTO `company` 
(
`CreateDate`, 
`UpdateDate`, 
`CompanyName`, 
`CompanyAdress`, 
`InvoiceAddress`, 
`TaxNo`, 
`TaxAdministrationName`, 
`InvoiceTelephone`, 
`InvoiceMobile`, 
`InvoiceEmail`, 
`CompanyTelephone`, 
`CompanyMobile`, 
`CompanyFax`, 
`CompanyEmail`, 
`CompanySign`, 
`CountryID`, 
`CityID`, 
`CountyID`, 
`AreaID`,
`HoldingID`,
`CompanyTypeID`
)
VALUES
(
NOW(), 
NULL, 
P_CompanyName, 
P_CompanyAdress, 
P_InvoiceAddress, 
P_TaxNo, 
P_TaxAdministrationName, 
P_InvoiceTelephone, 
P_InvoiceMobile, 
P_InvoiceEmail, 
P_CompanyTelephone, 
P_CompanyMobile, 
P_CompanyFax, 
P_CompanyEmail, 
P_CompanySign, 
P_CountryID, 
P_CityID, 
P_CountyID, 
P_AreaID,
P_HoldingID,
P_CompanyTypeID
);

CALL SYSTEM_MESSAGE(18);

ELSE

UPDATE 
`company` 
SET 
`UpdateDate` = NOW(), 
`CompanyName` = P_CompanyName, 
`CompanyAdress` = P_CompanyAdress, 
`InvoiceAddress` = P_InvoiceAddress, 
`TaxNo` = P_TaxNo, 
`TaxAdministrationName` = P_TaxAdministrationName, 
`InvoiceTelephone` = P_InvoiceTelephone, 
`InvoiceMobile` = P_InvoiceMobile, 
`InvoiceEmail` = P_InvoiceEmail, 
`CompanyTelephone` = P_CompanyTelephone, 
`CompanyMobile` = P_CompanyMobile, 
`CompanyFax` = P_CompanyFax, 
`CompanyEmail` = P_CompanyEmail, 
`CompanySign` = P_CompanySign, 
`CountryID` = P_CountryID, 
`CityID` = P_CityID, 
`CountyID` = P_CountyID, 
`AreaID` = P_AreaID,
`HoldingID` = P_HoldingID,
`CompanyTypeID` = P_CompanyTypeID 
 
WHERE `CompanyID` = P_COMPANY_ID;

CALL SYSTEM_MESSAGE(19);

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_COUNTIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_COUNTIES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_COUNTIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_County_ID int, in P_City_ID int, in P_County_Name varchar(50))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countiesExist = (select count(CountyID) from counties where CountyID = P_County_ID);

IF @countiesExist = 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(9);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 AND P_CITY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(8);

ELSE

IF P_County_ID IS NULL THEN

INSERT INTO `counties` 
(
`CityID`, 
`CountyName`
)
VALUES
(
P_City_ID, 
P_County_Name
);

CALL SYSTEM_MESSAGE(31);

ELSE

UPDATE 
`counties` 
SET 
`CityID` = P_City_ID, 
`CountyName` = P_County_Name
 
 WHERE `CountyID` = P_County_ID;

CALL SYSTEM_MESSAGE(32);

END IF;

END IF;

END IF;

END IF;


END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_COUNTRIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_COUNTRIES` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_COUNTRIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_Country_ID int, in P_BinaryCode varchar(2), in P_TripleCode varchar(3), in P_CountryName varchar(100), in P_PhoneCode varchar(6))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_Country_ID);

IF @countryExist = 0 AND P_Country_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(7);

ELSE

IF P_Country_ID IS NULL THEN

SET @sameCountryExist = (select count(*) from countries where BinaryCode collate utf8_general_ci = P_BinaryCode and TripleCode collate utf8_general_ci = P_TripleCode and CountryName collate utf8_general_ci = P_CountryName and PhoneCode collate utf8_general_ci = P_PhoneCode);

IF @sameCountryExist > 0 THEN

CALL SYSTEM_MESSAGE(68);

ELSE

INSERT INTO `countries` 
(
`BinaryCode`, 
`TripleCode`, 
`CountryName`, 
`PhoneCode`
)
VALUES
(
P_BinaryCode, 
P_TripleCode, 
P_CountryName, 
P_PhoneCode
);

CALL SYSTEM_MESSAGE(23);

END IF;

ELSE

UPDATE 
`countries` 
SET 
`BinaryCode` = P_BinaryCode, 
`TripleCode` = P_TripleCode, 
`CountryName` = P_CountryName, 
`PhoneCode` = P_PhoneCode 
WHERE `CountryID` = P_Country_ID;

CALL SYSTEM_MESSAGE(24);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_HOLDING
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_HOLDING` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_HOLDING`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int, in P_HoldingName varchar(100), in P_HoldingAdress varchar(255), in P_InvoiceAddress varchar(100), in P_TaxNo varchar(255), in P_TaxAdministrationName varchar(100), in P_InvoiceTelephone varchar(100), in P_InvoiceMobile varchar(100), in P_InvoiceEmail varchar(100), in P_HoldingTelephone varchar(100), in P_HoldingMobile varchar(100), in P_HoldingFax varchar(100), in P_HoldingEmail varchar(100), in P_HoldingSign varchar(100), in P_CountryID int,in P_CityID int,in P_CountyID int,in P_AreaID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 AND P_HOLDING_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(11);

ELSE

Set @countryExist = (select count(CountryID) from countries where CountryID = P_CountryID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

Set @cityExist = (select count(CityID) from cities where CityID = P_CityID);

IF @cityExist = 0 THEN

CALL SYSTEM_MESSAGE(8);

ELSE

Set @countyExist = (select count(CountyID) from counties where CountyID = P_CountyID);

IF @countyExist = 0 THEN

CALL SYSTEM_MESSAGE(9);

ELSE

Set @areaExist = (select count(AreaID) from area where AreaID = P_AreaID);

IF @areaExist = 0 THEN

CALL SYSTEM_MESSAGE(10);

ELSE

IF P_HOLDING_ID IS NULL THEN

INSERT INTO `holding` 
(
`CreateDate`, 
`UpdateDate`, 
`HoldingName`, 
`HoldingAdress`, 
`InvoiceAddress`, 
`TaxNo`, 
`TaxAdministrationName`, 
`InvoiceTelephone`, 
`InvoiceMobile`, 
`InvoiceEmail`, 
`HoldingTelephone`, 
`HoldingMobile`, 
`HoldingFax`, 
`HoldingEmail`, 
`HoldingSign`, 
`CountryID`, 
`CityID`, 
`CountyID`, 
`AreaID`
)
VALUES
(
NOW(), 
NULL, 
P_HoldingName, 
P_HoldingAdress, 
P_InvoiceAddress, 
P_TaxNo, 
P_TaxAdministrationName, 
P_InvoiceTelephone, 
P_InvoiceMobile, 
P_InvoiceEmail, 
P_HoldingTelephone, 
P_HoldingMobile, 
P_HoldingFax, 
P_HoldingEmail, 
P_HoldingSign, 
P_CountryID, 
P_CityID, 
P_CountyID, 
P_AreaID
);

CALL SYSTEM_MESSAGE(12);

ELSE

UPDATE 
`holding` 
SET 
`UpdateDate` = NOW(), 
`HoldingName` = P_HoldingName, 
`HoldingAdress` = P_HoldingAdress, 
`InvoiceAddress` = P_InvoiceAddress, 
`TaxNo` = P_TaxNo, 
`TaxAdministrationName` = P_TaxAdministrationName, 
`InvoiceTelephone` = P_InvoiceTelephone, 
`InvoiceMobile` = P_InvoiceMobile, 
`InvoiceEmail` = P_InvoiceEmail, 
`HoldingTelephone` = P_HoldingTelephone, 
`HoldingMobile` = P_HoldingMobile, 
`HoldingFax` = P_HoldingFax, 
`HoldingEmail` = P_HoldingEmail, 
`HoldingSign` = P_HoldingSign, 
`CountryID` = P_CountryID, 
`CityID` = P_CityID, 
`CountyID` = P_CountyID, 
`AreaID` = P_AreaID 
 
WHERE `HoldingID` = P_HOLDING_ID;

CALL SYSTEM_MESSAGE(13);

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE ADD_OR_UPDATE_TOTAL_DAILY_GUEST
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `ADD_OR_UPDATE_TOTAL_DAILY_GUEST` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `ADD_OR_UPDATE_TOTAL_DAILY_GUEST`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_TotalDailyGuestID int, in P_Date varchar(30), in P_TotalGuest int, in P_CompanyID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_CompanyID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @totalDailyGuestExist = (select count(TotalDailyGuestID) from totalDailyGuest where TotalDailyGuestID = P_TotalDailyGuestID);

IF @totalDailyGuestExist = 0 AND P_TotalDailyGuestID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(57);

ELSE

IF P_TotalDailyGuestID IS NULL THEN

INSERT INTO 
`totalDailyGuest` 
(
`Date`, 
`TotalGuest`, 
`CompanyID`)
VALUES
(
P_Date, 
P_TotalGuest, 
P_CompanyID
);


CALL SYSTEM_MESSAGE(58);

ELSE

UPDATE 
`totalDailyGuest` 
SET 
`Date` = P_Date, 
`TotalGuest` = P_TotalGuest, 
`CompanyID` = P_CompanyID
WHERE `TotalDailyGuestID` = P_TotalDailyGuestID;

CALL SYSTEM_MESSAGE(59);

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE CHECK_USER
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `CHECK_USER` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `CHECK_USER`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, OUT CHECK_USER int, in IS_ADMIN int)
BEGIN

SET @userExist = (select count(id) from users where id = P_USER_ID);

IF @userExist = 0 THEN

SELECT 4 into CHECK_USER;

ELSE

SET @userId = (select id from users where accessToken = P_ACCESS_TOKEN);

IF @userId IS NULL THEN

SELECT 5 into CHECK_USER;

ELSE

IF @userId != P_USER_ID THEN

SELECT 6 into CHECK_USER;

ELSE

IF IS_ADMIN = 0 THEN

SELECT 0 into CHECK_USER;

ELSE

SET @isAdmin = (select group_id from users where id = P_USER_ID);

IF @isAdmin != 1 THEN

SELECT 15 into CHECK_USER;

ELSE

SELECT 0 into CHECK_USER;

END IF;

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE CREATE_COLLECTOR_AUTHENTICATION
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `CREATE_COLLECTOR_AUTHENTICATION` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `CREATE_COLLECTOR_AUTHENTICATION`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_collector_id int, in P_device_key varchar(45), in P_auth_key varchar(100), in P_eth_mac_address varchar(18), in P_wifi_mac_address varchar(18))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

INSERT INTO 
`collectorAuthentication` 
(
`collector_id`, 
`device_key`, 
`auth_key`, 
`eth_mac_address`, 
`wifi_mac_address`
)
VALUES
(
P_collector_id, 
P_device_key, 
P_auth_key, 
P_eth_mac_address, 
P_wifi_mac_address
);

CALL SYSTEM_MESSAGE(72);

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_ALCOHOL_BRAND
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_ALCOHOL_BRAND` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_ALCOHOL_BRAND`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_BRAND_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholBrandExist = (select count(AlcoholBrandID) from alcoholBrand where AlcoholBrandID = P_ALCOHOL_BRAND_ID);

IF @alcoholBrandExist = 0 AND P_ALCOHOL_BRAND_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(51);

ELSE

DELETE from alcoholBrand where AlcoholBrandID = P_ALCOHOL_BRAND_ID;

CALL SYSTEM_MESSAGE(55);

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_ALCOHOL_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_ALCOHOL_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_ALCOHOL_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholGroupExist = (select count(AlcoholGroupID) from alcoholGroup where AlcoholGroupID = P_ALCOHOL_GROUP_ID);

IF @alcoholGroupExist = 0 AND P_ALCOHOL_GROUP_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(38);

ELSE

SET @hasAlcoholTypesWithThisGroup = (select count(*) from alcoholType where AlcoholGroupID = P_ALCOHOL_GROUP_ID);

IF @hasAlcoholTypesWithThisGroup > 0 THEN

CALL SYSTEM_MESSAGE(48);

ELSE

DELETE from alcoholGroup where AlcoholGroupID = P_ALCOHOL_GROUP_ID;

CALL SYSTEM_MESSAGE(42);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_ALCOHOL_TYPE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_ALCOHOL_TYPE` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_ALCOHOL_TYPE`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_TYPE_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholTypeExist = (select count(AlcoholTypeID) from alcoholType where AlcoholTypeID = P_ALCOHOL_TYPE_ID);

IF @alcoholTypeExist = 0 AND P_ALCOHOL_TYPE_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(43);

ELSE

SET @hasAlcoholBrandsWithThisType = (select count(*) from alcoholBrand where AlcoholTypeID = P_ALCOHOL_TYPE_ID);

IF @hasAlcoholBrandsWithThisType > 0 THEN

CALL SYSTEM_MESSAGE(49);

ELSE

DELETE from alcoholType where AlcoholTypeID = P_ALCOHOL_TYPE_ID;

CALL SYSTEM_MESSAGE(47);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_AREAS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_AREAS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_AREAS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_Area_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @areaExist = (select count(AreaID) from area where AreaID = P_Area_ID);

IF @areaExist = 0 AND P_Area_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(10);

ELSE

DELETE from area where AreaID = P_Area_ID;

CALL SYSTEM_MESSAGE(37);

END IF;

END IF;


END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_BAR_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_BAR_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_BAR_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_BAR_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BAR_GROUP_ID);

IF @barGroupExist = 0 AND P_BAR_GROUP_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(60);

ELSE

SET @hasCompaniesWithThisBarGroup = (select count(*) from barGroupToCompany where BarGroupID = P_BAR_GROUP_ID);

IF @hasCompaniesWithThisBarGroup > 0 THEN

CALL SYSTEM_MESSAGE(64);

ELSE

DELETE from barGroup where BarGroupID = P_BAR_GROUP_ID;

CALL SYSTEM_MESSAGE(65);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_CITY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_CITY` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_CITY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 AND P_CITY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(8);

ELSE

SET @countyExist = (select count(CountyID) from counties where CityID = P_CITY_ID);

IF @countyExist <> 0 AND P_CITY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(29);

ELSE

DELETE from cities where CityID = P_CITY_ID;

CALL SYSTEM_MESSAGE(28);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_COMPANY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_COMPANY` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_COMPANY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

DELETE from company where CompanyID = P_COMPANY_ID;

CALL SYSTEM_MESSAGE(21);

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_COUNTIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_COUNTIES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_COUNTIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_County_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countiesExist = (select count(CountyID) from counties where CountyID = P_County_ID);

IF @countiesExist = 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(9);

ELSE

SET @areaExist = (select count(AreaID) from area where CountyID = P_County_ID);

IF @areaExist <> 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(33);

ELSE

DELETE from counties where CountyID = P_County_ID;

CALL SYSTEM_MESSAGE(34);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_COUNTRY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_COUNTRY` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_COUNTRY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_Country_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_Country_ID);

IF @countryExist = 0 AND P_Country_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(7);

ELSE

SET @cityExist = (select count(CityID) from cities where CountryID = P_Country_ID);

IF @cityExist <> 0 AND P_Country_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(30);

ELSE

DELETE from countries where CountryID = P_Country_ID;

CALL SYSTEM_MESSAGE(25);

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE DELETE_HOLDING
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `DELETE_HOLDING` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `DELETE_HOLDING`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,1);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 AND P_HOLDING_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(11);

ELSE

DELETE from holding where HoldingID = P_HOLDING_ID;

CALL SYSTEM_MESSAGE(14);

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_BRANDS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_BRANDS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_BRANDS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_BRAND_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholBrandExist = (select count(AlcoholBrandID) from alcoholBrand where AlcoholBrandID = P_ALCOHOL_BRAND_ID);

IF @alcoholBrandExist = 0 AND P_ALCOHOL_BRAND_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(51);

ELSE

IF P_ALCOHOL_BRAND_ID IS NOT NULL THEN

select * from alcoholBrand where AlcoholBrandID = P_ALCOHOL_BRAND_ID;

ELSE

select * from alcoholBrand;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_BRANDS_BY_ALCOHOL_TYPE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_BRANDS_BY_ALCOHOL_TYPE` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_BRANDS_BY_ALCOHOL_TYPE`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_TYPE_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholTypeExist = (select count(AlcoholTypeID) from alcoholType where AlcoholTypeID = P_ALCOHOL_TYPE_ID);

IF @alcoholTypeExist = 0 AND P_ALCOHOL_TYPE_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(43);

ELSE

select * from alcoholBrand where AlcoholTypeID = P_ALCOHOL_TYPE_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_GROUPS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_GROUPS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_GROUPS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholGroupExist = (select count(AlcoholGroupID) from alcoholGroup where AlcoholGroupID = P_ALCOHOL_GROUP_ID);

IF @alcoholGroupExist = 0 AND P_ALCOHOL_GROUP_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(38);

ELSE

IF P_ALCOHOL_GROUP_ID IS NOT NULL THEN

select * from alcoholGroup where AlcoholGroupID = P_ALCOHOL_GROUP_ID;

ELSE

select * from alcoholGroup;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_TYPES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_TYPES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_TYPES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_TYPE_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholTypeExist = (select count(AlcoholTypeID) from alcoholType where AlcoholTypeID = P_ALCOHOL_TYPE_ID);

IF @alcoholTypeExist = 0 AND P_ALCOHOL_TYPE_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(43);

ELSE

IF P_ALCOHOL_TYPE_ID IS NOT NULL THEN

select * from alcoholType where AlcoholTypeID = P_ALCOHOL_TYPE_ID;

ELSE

select * from alcoholType;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_TYPES_BY_ALCOHOL_GROUP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_TYPES_BY_ALCOHOL_GROUP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_TYPES_BY_ALCOHOL_GROUP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_ALCOHOL_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @alcoholGroupExist = (select count(AlcoholGroupID) from alcoholGroup where AlcoholGroupID = P_ALCOHOL_GROUP_ID);

IF @alcoholGroupExist = 0 AND P_ALCOHOL_GROUP_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(38);

ELSE

select * from alcoholType where AlcoholGroupID = P_ALCOHOL_GROUP_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_ALCOHOL_TYPE_PERCENTAGE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_ALCOHOL_TYPE_PERCENTAGE` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_ALCOHOL_TYPE_PERCENTAGE`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SELECT  
AlcoholTypeID,
(Select Name from alcoholType where AlcoholTypeID = tapData.AlcoholTypeID) as AlcoholName ,
count(AlcoholTypeID) as alcoholTypeCount,
count(AlcoholTypeID) / (SELECT count(AlcoholTypeID) FROM tapData)*100 as alcoholTypePercent 
FROM tapData
GROUP BY AlcoholTypeID;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_AREA
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_AREA` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_AREA`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_Area_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @areaExist = (select count(AreaID) from area where AreaID = P_Area_ID);

IF @areaExist = 0 AND P_Area_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(10);

ELSE

IF P_Area_ID IS NOT NULL THEN

select a.*, c.CountyName from area a,counties c where a.CountyID=c.CountyID and a.AreaID = P_Area_ID;

ELSE

select a.*, c.CountyName from area a,counties c where a.CountyID=c.CountyID;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_AREA_BY_COUNTY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_AREA_BY_COUNTY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_AREA_BY_COUNTY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countiesExist = (select count(CountyID) from counties where CountyID = P_COUNTY_ID);

IF @countiesExist = 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(9);

ELSE

select a.*, c.CountyName from area a,counties c where a.CountyID=c.CountyID and a.CountyID = P_COUNTY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_BAR_GROUPS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_BAR_GROUPS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_BAR_GROUPS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_BAR_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BAR_GROUP_ID);

IF @barGroupExist = 0 AND P_BAR_GROUP_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(60);

ELSE

IF P_BAR_GROUP_ID IS NOT NULL THEN

select * from barGroup where BarGroupID = P_BAR_GROUP_ID;

ELSE

select * from barGroup;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_BAR_GROUPS_BY_COMPANY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_BAR_GROUPS_BY_COMPANY` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_BAR_GROUPS_BY_COMPANY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 AND P_COMPANY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(16);

ELSE

select * from barGroup b, barGroupToCompany bc where b.BarGroupID = bc.BarGroupID and bc.CompanyID = P_COMPANY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_CITIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_CITIES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_CITIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 AND P_CITY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(8);

ELSE

IF P_CITY_ID IS NOT NULL THEN

select c.*, co.CountryName from cities c,countries co where c.CountryID=co.CountryID and c.CityID = P_CITY_ID;

ELSE

select c.*, co.CountryName from cities c,countries co where c.CountryID=co.CountryID;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_CITY_BY_COUNTRY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_CITY_BY_COUNTRY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_CITY_BY_COUNTRY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTRY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_COUNTRY_ID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

select c.*, co.CountryName from cities c,countries co where c.CountryID=co.CountryID and c.CountryID = P_COUNTRY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COLLECTORS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COLLECTORS` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COLLECTORS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COLLECTOR_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @collectorExist = (select count(collector_id) from collectorList where collector_id = P_COLLECTOR_ID);

IF @collectorExist = 0 AND P_COLLECTOR_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(71);

ELSE

IF P_COLLECTOR_ID IS NOT NULL THEN

select
c.*,
ca.device_key
from collectorList c, collectorAuthentication ca
where c.collector_id = ca.collector_id and c.collector_id = P_COLLECTOR_ID;

ELSE

select
c.*,
ca.device_key
from collectorList c, collectorAuthentication ca
where c.collector_id = ca.collector_id;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANIES` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 AND P_COMPANY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(16);

ELSE

IF P_COMPANY_ID IS NOT NULL THEN

select 
h.*,
c.CountryName,
ci.CityName,
co.CountyName,
a.AreaName,
ct.Name as CompanyType,
(select count(barGroupToCompany.BarGroupToCompanyID) from barGroupToCompany where barGroupToCompany.CompanyID=h.CompanyID )  as TotalBar,
(select count(tap.TapID) from tap where tap.CompanyID=h.CompanyID )  as TotalTap
from 
company h, 
countries c, 
cities ci, 
counties co,
area a,
companyType ct
where 
a.AreaID = h.AreaID 
and h.CompanyTypeID = ct.CompanyTypeID
and co.CountyID = h.CountyID 
and ci.CityID = h.CityID 
and h.CountryID = c.CountryID
and h.CompanyID = P_COMPANY_ID;

ELSE

select 
h.*,
c.CountryName,
ci.CityName,
co.CountyName,
a.AreaName,
ct.Name as CompanyType,
(select count(barGroupToCompany.BarGroupToCompanyID) from barGroupToCompany where barGroupToCompany.CompanyID=h.CompanyID )  as TotalBar,
(select count(tap.TapID) from tap where tap.CompanyID=h.CompanyID )  as TotalTap
from 
company h, 
countries c, 
cities ci, 
counties co,
area a,
companyType ct
where 
a.AreaID = h.AreaID 
and h.CompanyTypeID = ct.CompanyTypeID
and co.CountyID = h.CountyID 
and ci.CityID = h.CityID 
and h.CountryID = c.CountryID;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BAR_GROUPS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BAR_GROUPS` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BAR_GROUPS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 AND P_COMPANY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @statement = "";

IF P_COMPANY_ID IS NOT NULL THEN

SET @statement = CONCAT("where c.CompanyID = ",P_COMPANY_ID,"");

END IF;

SET @queryStatement = CONCAT("select
c.CompanyID, 
c.CompanyName,
count(bc.`BarGroupToCompanyID`) as ToplamBar,
GROUP_CONCAT(bc.`BarGroupID`) as barGroups
from 
`company` c
left join `barGroupToCompany` bc on c.`CompanyID` = bc.`CompanyID` ",@statement," group by c.`CompanyID` order by ToplamBar desc");

PREPARE stmt FROM @queryStatement;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BY_AREA_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BY_AREA_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BY_AREA_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AREA_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @areaExist = (select count(AreaID) from area where AreaID = P_AREA_ID);

IF @areaExist = 0 THEN

CALL SYSTEM_MESSAGE(10);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from company h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.AreaID = P_AREA_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BY_CITY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BY_CITY_ID` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BY_CITY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 THEN

CALL SYSTEM_MESSAGE(8);

ELSE

select 
h.*,
c.CountryName,
ci.CityName,
co.CountyName,
a.AreaName,
ct.Name as CompanyType,
(select count(barGroupToCompany.BarGroupToCompanyID) from barGroupToCompany where barGroupToCompany.CompanyID=h.CompanyID )  as TotalBar,
(select count(tap.TapID) from tap where tap.CompanyID=h.CompanyID )  as TotalTap
from 
company h, 
countries c, 
cities ci, 
counties co,
area a,
companyType ct
where 
a.AreaID = h.AreaID 
and h.CompanyTypeID = ct.CompanyTypeID
and co.CountyID = h.CountyID 
and ci.CityID = h.CityID 
and h.CountryID = c.CountryID
and h.CityID = P_CITY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BY_COUNTRY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BY_COUNTRY_ID` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BY_COUNTRY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTRY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_COUNTRY_ID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

select 
h.*,
c.CountryName,
ci.CityName,
co.CountyName,
a.AreaName,
ct.Name as CompanyType,
(select count(barGroupToCompany.BarGroupToCompanyID) from barGroupToCompany where barGroupToCompany.CompanyID=h.CompanyID )  as TotalBar,
(select count(tap.TapID) from tap where tap.CompanyID=h.CompanyID )  as TotalTap
from 
company h, 
countries c, 
cities ci, 
counties co,
area a,
companyType ct
where 
a.AreaID = h.AreaID 
and h.CompanyTypeID = ct.CompanyTypeID
and co.CountyID = h.CountyID 
and ci.CityID = h.CityID 
and h.CountryID = c.CountryID
and h.CountryID = P_COUNTRY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BY_COUNTY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BY_COUNTY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BY_COUNTY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countyExist = (select count(CountyID) from counties where CountyID = P_COUNTY_ID);

IF @countyExist = 0 THEN

CALL SYSTEM_MESSAGE(9);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from company h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.CountyID = P_COUNTY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COMPANY_BY_HOLDING_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COMPANY_BY_HOLDING_ID` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COMPANY_BY_HOLDING_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 THEN

CALL SYSTEM_MESSAGE(11);

ELSE

select 
h.*,
c.CountryName,
ci.CityName,
co.CountyName,
a.AreaName,
ct.Name as CompanyType,
(select count(barGroupToCompany.BarGroupToCompanyID) from barGroupToCompany where barGroupToCompany.CompanyID=h.CompanyID )  as TotalBar,
(select count(tap.TapID) from tap where tap.CompanyID=h.CompanyID )  as TotalTap
from 
company h, 
countries c, 
cities ci, 
counties co,
area a,
companyType ct
where 
a.AreaID = h.AreaID 
and h.CompanyTypeID = ct.CompanyTypeID
and co.CountyID = h.CountyID 
and ci.CityID = h.CityID 
and h.CountryID = c.CountryID 
and h.HoldingID = P_HOLDING_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COUNTIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COUNTIES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COUNTIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_County_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countiesExist = (select count(CountyID) from counties where CountyID = P_County_ID);

IF @countiesExist = 0 AND P_County_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(9);

ELSE

IF P_County_ID IS NOT NULL THEN

select c.*, ci.CityName from counties c,cities ci where c.CityID=ci.CityID and c.CountyID = P_County_ID;

ELSE

select c.*, ci.CityName from counties c,cities ci where c.CityID=ci.CityID;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COUNTIES_BY_CITY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COUNTIES_BY_CITY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COUNTIES_BY_CITY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CountyID) from counties where CityID = P_CITY_ID);

IF @cityExist = 0 THEN

CALL SYSTEM_MESSAGE(9);

ELSE

select c.*, ci.CityName from counties c,cities ci where c.CityID=ci.CityID and c.CityID = P_CITY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_COUNTRIES
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_COUNTRIES` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_COUNTRIES`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTRY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_COUNTRY_ID);

IF @countryExist = 0 AND P_COUNTRY_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(7);

ELSE

IF P_COUNTRY_ID IS NOT NULL THEN

select c.* from countries c where c.CountryID = P_COUNTRY_ID;

ELSE

select c.* from countries c;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_HOLDINGS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_HOLDINGS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_HOLDINGS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 AND P_HOLDING_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(11);

ELSE

IF P_HOLDING_ID IS NOT NULL THEN

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.HoldingID = P_HOLDING_ID;

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_HOLDING_BY_AREA_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_HOLDING_BY_AREA_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_HOLDING_BY_AREA_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_AREA_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countyExist = (select count(AreaID) from area where AreaID = P_AREA_ID);

IF @countyExist = 0 THEN

CALL SYSTEM_MESSAGE(10);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.AreaID = P_AREA_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_HOLDING_BY_CITY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_HOLDING_BY_CITY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_HOLDING_BY_CITY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_CITY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @cityExist = (select count(CityID) from cities where CityID = P_CITY_ID);

IF @cityExist = 0 THEN

CALL SYSTEM_MESSAGE(8);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.CityID = P_CITY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_HOLDING_BY_COUNTRY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_HOLDING_BY_COUNTRY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_HOLDING_BY_COUNTRY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTRY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countryExist = (select count(CountryID) from countries where CountryID = P_COUNTRY_ID);

IF @countryExist = 0 THEN

CALL SYSTEM_MESSAGE(7);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.CountryID = P_COUNTRY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_HOLDING_BY_COUNTY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_HOLDING_BY_COUNTY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_HOLDING_BY_COUNTY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COUNTY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @countyExist = (select count(CountyID) from counties where CountyID = P_COUNTY_ID);

IF @countyExist = 0 THEN

CALL SYSTEM_MESSAGE(9);

ELSE

select h.*,c.CountryName,ci.CityName,co.CountyName,a.AreaName from holding h, countries c, cities ci, counties co,area a where a.AreaID = h.AreaID and co.CountyID = h.CountyID and ci.CityID = h.CityID and h.CountryID = c.CountryID and h.CountyID = P_COUNTY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_LAST_TAP_DATA
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_LAST_TAP_DATA` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_LAST_TAP_DATA`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

Select t.Name,td.ButtonClShown,td.Date from tapData td join tap t on t.TapID = td.TapID ORDER BY TapDataID desc LIMIT 5;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_LEFT_SIDE_MENU
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_LEFT_SIDE_MENU` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_LEFT_SIDE_MENU`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SELECT MenuID, Name, ParentId, Module, Function, URI FROM leftSideMenu;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_ACTIVE_TAP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_ACTIVE_TAP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_ACTIVE_TAP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

select count(TapID) as total from tap where TapStatusID = 1;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_ACTIVE_TAP_BY_BAR_GROUP_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_ACTIVE_TAP_BY_BAR_GROUP_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_ACTIVE_TAP_BY_BAR_GROUP_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_BAR_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BAR_GROUP_ID);

IF @barGroupExist = 0 THEN

CALL SYSTEM_MESSAGE(60);

ELSE

select count(TapID) as total from tap where TapStatusID = 1 and BarGroupID = P_BAR_GROUP_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_ACTIVE_TAP_BY_COMPANY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_ACTIVE_TAP_BY_COMPANY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_ACTIVE_TAP_BY_COMPANY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

select count(TapID) as total from tap where TapStatusID = 1 and CompanyID = P_COMPANY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_ACTIVE_TAP_BY_HOLDING_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_ACTIVE_TAP_BY_HOLDING_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_ACTIVE_TAP_BY_HOLDING_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 THEN

CALL SYSTEM_MESSAGE(11);

ELSE

select count(TapID) as total from tap where TapStatusID = 1 and HoldingID = P_HOLDING_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_ACTIVE_TAP_BY_TAP_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_ACTIVE_TAP_BY_TAP_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_ACTIVE_TAP_BY_TAP_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_TAP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @tapExist = (select count(TapID) as total from tap where TapID = P_TAP_ID);

IF @tapExist = 0 THEN

CALL SYSTEM_MESSAGE(67);

ELSE

select count(TapID) as total from tap where TapStatusID = 1 and TapID = P_TAP_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_BAR_GROUP_BY_BAR_GROUP_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_BAR_GROUP_BY_BAR_GROUP_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_BAR_GROUP_BY_BAR_GROUP_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_BAR_GROUP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = P_BAR_GROUP_ID);

IF @barGroupExist = 0 THEN

CALL SYSTEM_MESSAGE(60);

ELSE

select count(BarGroupID) as total from `barGroupToCompany` where `BarGroupID` = P_BAR_GROUP_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_BAR_GROUP_BY_COMPANY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_BAR_GROUP_BY_COMPANY_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_BAR_GROUP_BY_COMPANY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

select count(BarGroupID) as total from `barGroupToCompany` where `CompanyID` = P_COMPANY_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_BAR_GROUP_BY_HOLDING_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_BAR_GROUP_BY_HOLDING_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_BAR_GROUP_BY_HOLDING_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 THEN

CALL SYSTEM_MESSAGE(11);

ELSE

select count(BarGroupID) as total from `barGroupToCompany` where `CompanyID` in (select CompanyID from `company` where HoldingID = P_HOLDING_ID);

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_BAR_GROUP_BY_TAP_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_BAR_GROUP_BY_TAP_ID` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_BAR_GROUP_BY_TAP_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_TAP_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @tapExist = (select count(TapID) as total from tap where TapID = P_TAP_ID);

IF @tapExist = 0 THEN

CALL SYSTEM_MESSAGE(67);

ELSE

select count(BarGroupID) as total from tap where TapID = P_TAP_ID;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_COMPANY
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_COMPANY` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_COMPANY`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

IF P_HOLDING_ID IS NOT NULL THEN

select count(CompanyID) as total from company where HoldingID = P_HOLDING_ID;

ELSE

select count(CompanyID) as total from company;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_CONSUMED_CL
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_CONSUMED_CL` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_CONSUMED_CL`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in COLUMN_VALUE int, in COLUMN_NAME varchar(30))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = COLUMN_VALUE);

IF @holdingExist = 0 AND COLUMN_NAME = "HoldingID" THEN

CALL SYSTEM_MESSAGE(11);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = COLUMN_VALUE);

IF @companyExist = 0 AND COLUMN_NAME = "CompanyID" THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = COLUMN_VALUE);

IF @barGroupExist = 0 AND COLUMN_NAME = "BarGroupID" THEN

CALL SYSTEM_MESSAGE(60);

ELSE

SET @tapExist = (select count(TapID) as total from tap where TapID = COLUMN_VALUE);

IF @tapExist = 0 AND COLUMN_NAME = "TapID" THEN

CALL SYSTEM_MESSAGE(67);

ELSE

IF COLUMN_NAME IS NULL AND COLUMN_VALUE IS NULL THEN

SET @statement = "";

ELSE

SET @statement = CONCAT("t.",COLUMN_NAME," = ",COLUMN_VALUE," AND ");

END IF;

SET @queryStatement = CONCAT("
select 
IFNULL(SUM(CAST(ButtonClReal AS DECIMAL(10,2))),0) 
Consumed 
from tapData td,tap t where ",@statement," t.TapID = td.TapID");

-- select @queryStatement;

PREPARE statement FROM @queryStatement;
EXECUTE statement;
DEALLOCATE PREPARE statement;

END IF;

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_START_DATE varchar(40), in P_END_DATE varchar(40), in COLUMN_VALUE int, in COLUMN_NAME varchar(30))
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = COLUMN_VALUE);

IF @holdingExist = 0 AND COLUMN_NAME = "HoldingID" THEN

CALL SYSTEM_MESSAGE(11);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = COLUMN_VALUE);

IF @companyExist = 0 AND COLUMN_NAME = "CompanyID" THEN

CALL SYSTEM_MESSAGE(16);

ELSE

SET @barGroupExist = (select count(BarGroupID) from barGroup where BarGroupID = COLUMN_VALUE);

IF @barGroupExist = 0 AND COLUMN_NAME = "BarGroupID" THEN

CALL SYSTEM_MESSAGE(60);

ELSE

SET @tapExist = (select count(TapID) as total from tap where TapID = COLUMN_VALUE);

IF @tapExist = 0 AND COLUMN_NAME = "TapID" THEN

CALL SYSTEM_MESSAGE(67);

ELSE

IF COLUMN_NAME IS NULL AND COLUMN_VALUE IS NULL THEN

SET @statement = "";

ELSE

SET @statement = CONCAT("AND t.",COLUMN_NAME," = ",COLUMN_VALUE);

END IF;

SET @queryStatement = CONCAT("
SELECT
	SUM(
		CAST(
			td.ButtonClReal AS DECIMAL (10, 2)
		)
	) AS ConsumedAlcohol,
	DATE(td.Date) AS Date,
	a. NAME as Name,
	td.AlcoholTypeID
FROM
	tap t,
	tapData td
LEFT JOIN alcoholType a ON td.AlcoholTypeID = a.AlcoholTypeID
WHERE
	td.Date >= '",P_START_DATE,"'
AND td.Date <= '",P_END_DATE,"'
",@statement,"
AND t.TapID = td.TapID
GROUP BY
	DATE(td.Date),
	td.AlcoholTypeID
ORDER BY
	Date");

-- select @queryStatement;

PREPARE statement FROM @queryStatement;
EXECUTE statement;
DEALLOCATE PREPARE statement;

END IF;

END IF;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_DAILY_COST_BY_COMPANY_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_DAILY_COST_BY_COMPANY_ID` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_DAILY_COST_BY_COMPANY_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_COMPANY_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @companyExist = (select count(CompanyID) from company where CompanyID = P_COMPANY_ID);

IF @companyExist = 0 THEN

CALL SYSTEM_MESSAGE(16);

ELSE

select date(td.Date) as Date,ROUND(SUM(SalePrice),2) as Cost from tap t, tapData td where t.`TapID` = td.`TapID` and t.`CompanyID` = P_COMPANY_ID group by date(td.Date) order by Date;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_DAILY_COST_BY_HOLDING_ID
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_DAILY_COST_BY_HOLDING_ID` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_DAILY_COST_BY_HOLDING_ID`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_HOLDING_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @holdingExist = (select count(HoldingID) from holding where HoldingID = P_HOLDING_ID);

IF @holdingExist = 0 THEN

CALL SYSTEM_MESSAGE(11);

ELSE

select date(td.Date) as Date,ROUND(SUM(SalePrice),2) as Cost from tap t, tapData td where t.`TapID` = td.`TapID` and t.`HoldingID` = P_HOLDING_ID group by date(td.Date) order by Date;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_DAILY_GUESTS
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_DAILY_GUESTS` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_DAILY_GUESTS`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int, in P_TOTAL_DAILY_GUEST_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

SET @totalDailyGuestExist = (select count(TotalDailyGuestID) from totalDailyGuest where TotalDailyGuestID = P_TOTAL_DAILY_GUEST_ID);

IF @totalDailyGuestExist = 0 AND P_TOTAL_DAILY_GUEST_ID IS NOT NULL THEN

CALL SYSTEM_MESSAGE(57);

ELSE

IF P_TOTAL_DAILY_GUEST_ID IS NOT NULL THEN

select t.*,c.CompanyName from `totalDailyGuest` t, `company` c where c.`CompanyID` = t.`CompanyID` and TotalDailyGuestID = P_TOTAL_DAILY_GUEST_ID;

ELSE

select t.*,c.CompanyName from `totalDailyGuest` t, `company` c where c.`CompanyID` = t.`CompanyID`;

END IF;

END IF;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE GET_TOTAL_TAP
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GET_TOTAL_TAP` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `GET_TOTAL_TAP`(in P_ACCESS_TOKEN varchar(100), in P_USER_ID int)
BEGIN

CALL CHECK_USER(P_ACCESS_TOKEN,P_USER_ID,@checkUser,0);

IF @checkUser > 0 THEN

CALL SYSTEM_MESSAGE(@checkUser);

ELSE

select count(TapID) as total from tap;

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE INSERT_LOG
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `INSERT_LOG` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `INSERT_LOG`(in P_GTID varchar(100), in P_CLIENT_IP varchar(20), in P_REQUEST text(1000), in P_RESPONSE text(100000), in P_METHOD varchar(255), in P_USER_ID int, in P_REQUEST_TIME varchar(30), in P_RESPONSE_TIME varchar(30))
BEGIN

INSERT INTO api_incoming
(GTID,CLIENT_IP,REQUEST,RESPONSE,CREATE_TS,CREATE_USER,REQUEST_TYPE,SERVICE_NAME,USER_ID,REQUEST_TIME,RESPONSE_TIME) 
VALUES(UPPER(UUID()),P_CLIENT_IP, P_REQUEST, P_RESPONSE,NOW(),"Truva.co front-end",1,P_METHOD,P_USER_ID,P_REQUEST_TIME,P_RESPONSE_TIME);

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE spAddCompanyBarGroup
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `spAddCompanyBarGroup` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `spAddCompanyBarGroup`(IN `pBarGroupID` int ,IN `pCompanyID` int )
BEGIN
DECLARE IsError INT DEFAULT 35;
DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET IsError=36;
INSERT INTO barGroupToCompany (BarGroupID,CompanyID) VALUES (pBarGroupID,pCompanyID);
SELECT ErrorMessage from errorCodeList where ErorCodeListID = IsError;
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE spCompanyBarGroup
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `spCompanyBarGroup` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `spCompanyBarGroup`(IN `pCompanyID` int)
BEGIN
 
 Select 
 company.CompanyID ,
 company.CompanyName AS CompanyName ,
 count(barGroupToCompany.CompanyID) AS ToplamBar  

 from company 
 inner join barGroupToCompany  ON barGroupToCompany.CompanyID = company.CompanyID
 where 
 pCompanyID is null or company.CompanyID = pCompanyID
 GROUP BY company.CompanyID, company.CompanyName;
		
		
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE spDeleteCompanyBarGroup
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `spDeleteCompanyBarGroup` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `spDeleteCompanyBarGroup`(IN `pBarGroupToCompanyID` int )
BEGIN
DECLARE count int default -1;
delete from barGroupToCompany where BarGroupToCompanyID = pBarGroupToCompanyID;
SELECT ROW_COUNT() into count ;
IF (count  = 0) THEN
  SELECT ErrorMessage from errorCodeList where ErorCodeListID = 41; /*Failed*/
 ELSE
  SELECT ErrorMessage from errorCodeList where ErorCodeListID = 40; /*Success*/
END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE spUpdateCompanyBarGroup
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `spUpdateCompanyBarGroup` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `spUpdateCompanyBarGroup`(IN `pBarGroupID` int ,IN `pCompanyID` int,IN `pBarGroupToCompanyID` int )
BEGIN
DECLARE IsError INT DEFAULT 37;
DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET IsError=38;

UPDATE barGroupToCompany SET BarGroupID=pBarGroupID, CompanyID=pCompanyID WHERE BarGroupToCompanyID=pBarGroupToCompanyID;

SELECT ErrorMessage from errorCodeList where ErorCodeListID = IsError;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE SYSTEM_MESSAGE
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `SYSTEM_MESSAGE` */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `SYSTEM_MESSAGE`(in message_code int)
BEGIN

SELECT 
	`code` 		AS responseCode, 
	message  		AS responseMessage,
	isError    AS isError
FROM
	systemMessages
WHERE
	`code` = message_code;
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE USER_LOGIN
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `USER_LOGIN` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`%`*/ /*!50003 PROCEDURE `USER_LOGIN`(in USER_EMAIL varchar(255), in USER_PASSWORD varchar(255))
BEGIN

SET @count = (SELECT COUNT(ID) FROM users WHERE email = USER_EMAIL);

IF @count > 0 THEN

SET @dbPassword = (SELECT `password` FROM users WHERE email = USER_EMAIL);

SET @salt = (select SUBSTR(@dbPassword,1,10));

SET @user_password = CONCAT(@salt,"",substr(sha1(CONCAT(@salt,"",USER_PASSWORD)), 1, 30));

IF @dbpassword != @user_password THEN

CALL SYSTEM_MESSAGE(3);

ELSE

UPDATE users SET last_login = UNIX_TIMESTAMP(NOW()) WHERE email = USER_EMAIL;
SELECT 
	U.ID as responseCode, 
	"Giriş başarılı." as responseMessage, 
	CONCAT(m.first_name ," ",m.last_name) as userfullname,
	m.first_name as firstName,
	m.last_name as lastName,
	U.id as userId, 
	0 as isError, 
	U.group_id as userType, 
	U.accessToken as accessToken
FROM 
	users U,
	meta m
WHERE 
	U.email = USER_EMAIL
AND
	U.id = m.user_id;

END IF;

ELSE

CALL SYSTEM_MESSAGE(2);

END IF;

END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
