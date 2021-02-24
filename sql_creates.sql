
CREATE TABLE `produkt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Namn` varchar(45) DEFAULT NULL,
  `Bild` varchar(45) DEFAULT NULL,
  `Beskrivning` varchar(45) DEFAULT NULL,
  `Pris` varchar(45) DEFAULT NULL,
  `LagerAntal` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `produktId` int(11) NOT NULL,
  `Namn` varchar(45) DEFAULT NULL,
  `Telefonnummer` varchar(45) DEFAULT NULL,
  `Epost` varchar(45) DEFAULT NULL,
  `LeveransAdress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `kontakt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meddelande` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `produkt` VALUES(1,"Mobil","/img/1.jpg","Apple iPhone 8 64GB Då telefonens hölje är vatten- och dammtåligt (IP 67) så klarar den lite hårdare tag. Ta bilder med dubbla kameror i upp till 12 Mp upplösning och filma i hela 2160p (4K). Denna Apple smartphone bjuder på 1821 mAh batterikapacitet. ","7999 kr",10);
INSERT INTO `produkt` VALUES(2,"ipad","/img/2.jpg","iPad (2018) 32 GB WiFi (rymdgrå)","3479 kr",5);
INSERT INTO `produkt` VALUES(3,"pc-case","/img/3.jpg","PC-Case Thermaltake View 21 TG Midi Tower black retail","871 kr",3);
INSERT INTO `produkt` VALUES(4,"keyboard","/img/4.jpg","Razer Cynosa Chroma tangentbord gaming","699 kr",10);
INSERT INTO `produkt` VALUES(5,"mouse","/img/5.jpg","Logitech M705 , Laser 1000dpi Mus Silver Imponerande batteritid på 3 år","449 kr",5);

