-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 07:53 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gip`
--
CREATE DATABASE IF NOT EXISTS `gip` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gip`;

-- --------------------------------------------------------

--
-- Table structure for table `admintext`
--

CREATE TABLE IF NOT EXISTS `admintext` (
  `frontpage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintext`
--

INSERT INTO `admintext` (`frontpage`) VALUES
('Welkom bij TechPoint â€“ jouw ultieme bestemming voor de laatste technologische trends en innovaties! Bij TechPoint zijn we gepassioneerd door alles wat met technologie te maken heeft en streven we ernaar om jou te voorzien van de meest geavanceerde '),
('Welkom bij TechPoint â€“ jouw ultieme bestemming voor de laatste technologische trends en innovaties! Bij TechPoint zijn we gepassioneerd door alles wat met technologie te maken heeft en streven we ernaar om jou te voorzien van de meest geavanceerde '),
('Welkom bij TechPoint â€“ jouw ultieme bestemming voor de laatste technologische trends en innovaties! Bij TechPoint zijn we gepassioneerd door alles wat met technologie te maken heeft en streven we ernaar om jou te voorzien van de meest geavanceerde ');

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

CREATE TABLE IF NOT EXISTS `artikelen` (
  `referentieNummer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artikelNaam` varchar(255) NOT NULL,
  `artikelBeschrijving` mediumtext NOT NULL,
  `brand` varchar(255) NOT NULL,
  `prijs` varchar(255) NOT NULL,
  `prijsNieuw` varchar(20) DEFAULT NULL COMMENT 'nieuwe prijs',
  `beschikbaarheid` int(255) NOT NULL,
  `specialDeal` tinyint(1) NOT NULL,
  `discover` tinyint(1) NOT NULL,
  PRIMARY KEY (`referentieNummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `artikelen`
--

INSERT INTO `artikelen` (`referentieNummer`, `artikelNaam`, `artikelBeschrijving`, `brand`, `prijs`, `prijsNieuw`, `beschikbaarheid`, `specialDeal`, `discover`) VALUES
(84, 'AMD Ryzen 7 5800X', 'De AMD Ryzen 7 5800X processor, codenaam "Vermeer", beschikt over acht cores en is geschikt om op een moederbord met Socket AM4 te plaatsen. De processor werkt op een kloksnelheid van 3800 MHz en een turbo-modus tot maximaal 4700 MHz.\r\nDeze boxed processor wordt geleverd zonder koeler.\r\n\r\nDe AMD Ryzen 5000 serie is compatible met alle moederborden die een X570, B550 of A520 chipset hebben. Houd er wel rekening mee dat in sommige gevallen alsnog een bios update nodig kan zijn, dit is afhankelijk van de bios versie van het betreffende moederbord. Raadpleeg bij twijfel de website van de fabrikant van het moederbord.', 'AMD', '249', '219', 0, 0, 1),
(85, 'Intel® Core i5-13400F', 'De IntelÂ® Coreâ„¢ i5-13400F, Raptor Lake genaamd, brengt een nieuwe chiplay-out met verschillende CPU-kernen voor verschillende toepassingsscenario''s. De Performance Cores leveren prestaties voor rekenintensieve toepassingen, de Efficiency Cores voor energie-efficiÃ«ntie bij lichte belasting. De Raptor Lake processoren ondersteunen PCIe Gen 5.0 en 4.0, DDR5 en DDR4. De processor is compatibel met moederborden die zijn gebaseerd op de IntelÂ® 700 en 600 chipset. ', 'Intel', '229', '199', 50, 0, 1),
(86, 'AMD Ryzen 5 4500', 'De AMD Ryzen 5 4500 processor, codenaam "Vermeer", beschikt over zes cores en is geschikt om op een moederbord met Socket AM4 te plaatsen. De processor werkt op een kloksnelheid van 3600 MHz en een turbo-modus tot maximaal 4100 MHz.\r\nDeze boxed processor wordt geleverd met een Wraith Stealth koeler. ', 'AMD', '85', '', 50, 0, 1),
(87, 'IntelÂ® Core i7-13700K', 'De IntelÂ® i7-13700K, codenaam "Raptor Lake", beschikt over 8 Performance cores en 16 Efficiency cores en is geschikt om op een moederbord met Socket 1700 te plaatsen. De processor beschikt over 30 MB Smart cache en werkt op een snelheid van 3,5 GHz. De IntelÂ® Core i7-13700K beschikt over een interne geheugencontroller met twee geheugen kanalen. ', 'Intel', '469', '', 50, 0, 1),
(88, 'IntelÂ® Core i9-13900K', 'De IntelÂ® Core i9-13900K, codenaam "Raptor Lake", beschikt over 8 Performance cores en 16 Efficiency cores en is geschikt om op een moederbord met Socket 1700 te plaatsen. De processor beschikt over 36 MB Smart cache en werkt op een snelheid van 3,0 GHz. De IntelÂ® Core i9-13900K beschikt over een interne geheugencontroller met twee geheugen kanalen. ', 'Intel', '659', '', 50, 0, 1),
(89, 'ASUS DUAL GeForce RTX 3060 OC V2', 'De ASUS DUAL GeForce RTX 3060 OC V2 is een grafische kaart gebaseerd op de NVIDIA GeForce RTX 3060 Chip en beschikt over 12 GB GDDR6 geheugen dat via een 192 bit brede interface aangesproken wordt. De grafische kaart heeft een boostsnelheid (gaming) van 1837 MHz, een boostsnelheid (OC) van 1867 MHz en het geheugen heeft een snelheid van 15000 MHz. ', 'ASUS', '429', '369', 10, 1, 1),
(90, 'MSI GeForce GTX 1660 SUPER VENTUS XS OC 6G', 'De GeForce GTX 1660 SUPER VENTUS XS OC 6G van MSI is gebaseerd op de NVIDIA GeForce GTX 1660 SUPER Chip en beschikt over 6144 MB GDDR6 geheugen dat via een 192 bit brede interface aangesproken wordt. De GPU heeft een kloksnelheid van 1530 MHz, een boostsnelheid van 1815 MHz en het geheugen een snelheid van 14000 MHz. ', 'MSI', '279', '', 10, 0, 1),
(95, 'GIGABYTE GeForce RTX 3060 Eagle OC 12G', 'De GIGABYTE GeForce RTX 3060 Eagle OC 12G is gebaseerd op de NVIDIA GeForce RTX 3060 Chip en beschikt over 12 GB GDDR6 geheugen dat via een 192 bit brede interface aangesproken wordt. De GPU heeft een kloksnelheid van 1â€Ž807 MHz en het geheugen heeft een snelheid van 15000 MHz. ', 'GIGABYTE ', '399', '379', 10, 1, 1),
(96, 'ASUS Radeon RX 6750 XT DUAL OC', 'De ASUS Radeon RX 6750 XT DUAL OC GPU is gebaseerd op RDNA 2 architectuur en is ontworpen voor 4K en 1440p prestaties, energiezuinigheid en veeleisende gaming. Met 12 GB GDDR6 videogeheugen, ondersteuning voor PCIe 4.0 standaard en functies als Infinity Cache, leveren AMD RX 6700 XT GPU''s een soepele game-ervaring met geweldige visuals door gebruik te maken van RDNA2 technologie. Met maar liefst 40 nieuw ontworpen 7nm-verwerkingseenheden en functies als Radeon Image Sharpening, FidelityFX, TressFX, TrueAudio Next en VR-technologieÃ«n staat de ASUS Radeon RX 6750 XT DUAL OC-chip garant voor hoge IPC-scores. Verbeterde grafische effecten van de ASUS Radeon RX 6750 XT DUAL OC, zoals volumetrische belichting, onscherpte en scherptediepte, alsmede kortere latenties doen gamersharten sneller kloppen. ', 'ASUS', '529', '', 10, 0, 1),
(97, 'G.Skill 16 GB DDR4-2133 Kit', 'De opbouw van deze geheugenmodules is volledig identiek. Beide zijn voorzien van geheugenchips uit eenzelfde productie-serie, wat uiteraard een betere compatibiliteit oplevert dan twee losse modules. De capaciteit bedraagt in totaal 16 GB (twee modules van 8 GB) en ze zijn geschikt voor systemen met een DDR4 geheugenbus van 2133 MHz. ', 'G.SKILL', '37', '32', 30, 1, 1),
(98, 'G.Skill 32 GB DDR5-6000 Kit', 'De G.Skill F5-6000J3636F16GX2-FX5 is een kit bestaande uit twee 16 GB DDR5-6000 geheugenmodules (PC5-48000) uit de Flare X5 serie van G.Skill. De totale capaciteit is 32 GB. De 288-pins modules ondersteunen een latency van 36-36-36-96 bij 6000 MHz en heeft een spanning van 1,35 volt nodig. AMD EXPO wordt ondersteund. ', 'G.SKILL', '156', '', 30, 0, 1),
(99, 'Kingston FURY 32 GB DDR5-5200 Kit', 'De Kingston FURY KF552C36BBEK2-32 kit zijn 32 GB DDR5-5200 geheugenmodules (PC5-41600) uit de Beast serie. De 288-pins modules ondersteunen een latency van 36-40-40 bij 5200 MHz en heeft een spanning van 1,25 volt nodig. XMP versie 3.0 en AMD EXPO wordt ondersteund. ', 'KINGSTON', '135', '', 30, 0, 1),
(100, 'Corsair 32 GB DDR5-6000 Kit', 'De CMH32GX5M2D6000C36 geheugenmodules van Corsair zijn volledig identiek. Beide zijn voorzien van geheugenchips uit eenzelfde productie-serie, wat uiteraard een betere compatibiliteit oplevert dan twee losse modules. De capaciteit bedraagt in totaal 32 GB (twee modules van 16 GB) en ze zijn geschikt voor systemen met een DDR5 geheugenbus van 6000 MHz. ', 'CORSAIR', '170', '156', 30, 1, 1),
(101, 'Kingston FURY 32 GB DDR4-3600 Kit', 'De Kingston FURY Beast RGB DDR4 (KF436C18BBAK2/32) biedt een krachtige prestatieverbetering voor gaming, videobewerking en rendering. De capaciteit van de Kingston FURY 32 GB DDR4-3600 Kit, uit de Beast RGB serie bedraagt in totaal 32 GB (twee modules van 16 GB) met een DDR4 standaard van 3600. De 288-pins DIMM ondersteunt een latentie van 18 bij 3600 MHz en vereist een spanning van 1,2 volt. FURY Beast RGB DDR4 blijft koel dankzij de stijlvolle, low-profile heat spreader. ', 'KINGSTON', '104', '95', 30, 1, 1),
(102, 'Seagate BarraCuda 1 TB harde schijf', 'De BarraCuda combineert toonaangevende opslagcapaciteit met snelheden voor snelle prestaties en korte laadtijden tijdens het gamen of het uitvoeren van zware werkbelastingen. Van computers vol met foto''s en herinneringen tot gaming-pc''s die meer speelruimte nodig hebben - BarraCuda groeit met je mee.\r\nDe BarraCuda van Seagate heeft een opslagcapaciteit van 1 TB en een cache van 64 MB. De 3,5 inch SATA harddisk is voorzien van een Serial ATA/600 interface.', 'Seagate', '40', '36', 5, 1, 1),
(103, 'Seagate IronWolf 4 TB harde schijf', 'De IronWolf NAS is ontworpen voor alles wat met de NAS te maken heeft. Met IronWolf NAS kan je vertrouwen op hoge, altijd beschikbare, schaalbare prestaties in continue werking in omgevingen met meerdere schijven en een breed scala aan opslagcapaciteiten. AgileArray maakt tweelaagse balancering en RAID-optimalisatie mogelijk in multi-drive bay-omgevingen, samen met geavanceerd energiebeheer.\r\nDe IronWolf van Seagate heeft een opslagcapaciteit van 4 TB en een cache van 256 MB. De 3,5 inch SATA harddisk is voorzien van een Serial ATA/600 interface. ', 'Seagate', '88', '', 5, 0, 1),
(104, 'ADATA SX6000 Pro, 256 GB SSD', 'Start, laad en verplaats data sneller met de SX6000 Pro, 256 GB SDD van ADATA met PCIe Gen3x4 M.2 2280 interface. Met ondersteuning voor NVMe 1.3 en uitgerust met 3D NAND Flash, biedt het een hoge leessnelheid van 2100 MB/sec en een schrijfsnelheid van 1200 MB/sec. Daarnaast is de SX6000 Pro platter dan standaard M.2 2280 SSDs voor een hoger niveau van compatibiliteit dankzij het enkelzijdige design. ', 'ADATA ', '28', '25', 5, 1, 1),
(105, 'SAMSUNG 870 EVO, 2 TB SSD', 'De Samsung EVO 870 (MZ-77E2T0B/EU) SSD heeft een opslagcapaciteit van 2 TB en een 2,5â€ bouwvorm. Deze snelle en betrouwbare SSD met Samsung V-NAND 3bit MLC en een krachtige algoritmische controller is speciaal ontworpen voor gewone pcâ€™s en notebooks.\r\n\r\nConstante snelheid, zelfs met een zware workload en bij multitasking. De 870 EVO heeft een sequentiÃ«le schrijfsnelheid tot 560 MB/s met Intelligent TurboWrite-technologie en een sequentiÃ«le leessnelheid tot 530 MB/s. De SSD heeft een cache van 2 GB Low Power DDR4 SDRAM, zodat bestanden sneller overgezet worden en bewaar en render in alle veiligheid jouw zware 4K-videoâ€™s en 3D-data die gebruikt worden door de nieuwste applicaties.\r\n\r\nProfiteer van een snelle en vloeiende communicatie met jouw hostsysteem. Het verbeterde ECC-algoritme en de Samsung MKX Controller zorgen voor een grotere snelheid en de verbeterde queued trim garandeert een grotere compatibiliteit met Linux. De geavanceerde constructie van de EVO 870 EVO zorgt voor een grotere compatibiliteit met jouw computer. ', 'SAMSUNG ', '175', '', 5, 0, 1),
(106, 'SAMSUNG 980 PRO Heatsink, 2 TB SSD', 'De 980 PRO SSD met heatsink van Samsung heeft een opslagcapaciteit van 2 TB. Deze M.2 SSD heeft een leessnelheid van 7000 MB/sec en een schrijfsnelheid van 5100 MB/sec. De SSD is daarnaast voorzien van een M.2 (2280) bouwvorm met een PCIe Gen 4.0 x4, NVMe 1.3c interface. De 980 PRO serie M.2 SSD van Samsung combineert Samsung V-NAND 3-bit MLC met een Samsung controller voor verbluffende lees/schrijfsnelheden om zo een nieuwe standaard te creÃ«ren voor high-end gaming en 4K & 3D video editing, allemaal beschermd met AES 256-bit Encryptie. ', 'SAMSUNG', '199', '179', 5, 1, 1),
(107, 'Lian Li O11 Dynamic EVO Tower-behuizing', 'Houd het hoofd koel met de geheel nieuwe vormgeving van de O11 Dynamic serie en geef uitdrukking aan de gewenste configuratie. Met slechts een paar stappen kan de O11 Dynamic EVO in spiegelbeeld worden gekanteld om een naadloze showroomweergave van gehard glas aan de voor- en zijkant aan de rechterkant van de behuizing te ervaren. In de O11 Dynamic-serie zijn het klassieke getinte glas en het paneel van geborsteld aluminium opnieuw in de juiste verhouding gecombineerd. Aansluitend op de stijl van de O11 Dynamic serie zijn de aluminium panelen voorzien van een vernieuwd fijnmazig gaas dat zorgt voor een optimale verhouding tussen luchtstroom en stoffiltering.\r\n\r\nDe O11D EVO heeft een modulair ontwerp en biedt vele configuratiemogelijkheden door gebruik te maken van optionele kits, zowel voor luchtkoeling als voor waterkoeling.\r\n\r\nHoe directer de luchtstroom, hoe beter de koelprestaties. Dankzij de rechtopstaande GPU-kit en de front mesh kit, die de toevoeging van drie extra fans aan de voorkant mogelijk maakt, kan de O11D EVO een krachtige en directe luchtstroom naar de GPU en de CPU leveren.\r\n\r\nDe verbeterde verticale GPU-kit biedt meer ruimte voor aan de onderkant gemonteerde ventilatoren en radiatoren om het koelvermogen en de efficiÃ«ntie van de O11D EVO te verhogen. Gebruikers kunnen de GPU verticaal monteren op de onderste positie die 50 mm vrije ruimte biedt aan de onderkant van het chassis, of op de bovenste positie voor 90,5 mm vrije ruimte.\r\n\r\nMet de rechtopstaande GPU-kit kunnen gebruikers hun watergekoelde GPU naast het moederbord plaatsen. Hierdoor wordt de grote ruimte van de behuizing toegankelijker, waardoor de buizen eenvoudiger en efficiÃ«nter de componenten kunnen bereiken en er een ongehinderde luchtstroom ontstaat die de bovenste en onderste radiatoren in staat stelt effectiever te presteren.\r\n\r\nEr zijn meerdere, gemakkelijk toegankelijke opslagmontagepunten voor ondersteuning van maximaal negen SSD''s of zes HDD''s + drie SSD''s.\r\n\r\nDe O11D EVO houdt het frontpaneel zo strak mogelijk met een multi-directionele aan/uit knop die zowel vanaf de voorkant als de zijkant van het chassis kan worden ingedrukt. De LED-strip op het frontpaneel heeft zeven ingebouwde verlichtingseffecten die kunnen worden bediend via de M-toets. Een 8e modus is beschikbaar om synchronisatie met de moederbordsoftware of L-Connect-besturing mogelijk te maken. ', 'Lian Li', '179', '', 5, 0, 1),
(108, 'Sharkoon RGB Slider Tower-behuizing', 'De Sharkoon RGB Slider is een compacte, witte midi-ATX-behuizing met een strakke look. De pc-behuizing richt zich op de essentiÃ«le onderdelen maar heeft nog steeds voordelen die het onderscheiden van andere vergelijkbare behuizingen. Door de strakke afwerking en de simpele vormgeving is de behuizing aangenaam discreet en onopvallend. De behuizing heeft echter ook hoogtepunten zoals het zijpaneel dat gemaakt is van gehard glas, het I/O-paneel met twee USB 3.0 poorten en de RGB-ledstrook die in het voorpaneel is geÃ¯ntegreerd. Als de handmatige kleurbediening wordt gebruikt, kan de strook in 14 verschillende verlichtingsstanden worden gebruikt. Er kunnen ook extra lichtelementen worden toegevoegd en worden aangepast via de ingebouwde RGB-controller. Op het gebied van interne installatieopties biedt de RGB Slider ook meer dan je zou vermoeden. ', 'Sharkoon ', '55', '', 5, 0, 1),
(109, 'HYTE Y60 Tower-behuizing', 'De HYTE Y60 PC behuizing heeft een 3-delig panoramisch ontwerp gemaakt van gehard glas. Met een eenvoudige draaibeweging kan je het systeem bekijken zoals het moet worden gezien vanaf de linker- of rechterkant van het bureau. Alleen verticaal gemonteerde GPU''s: waarom zou je je grafische kaart op een andere manier willen zien? Een PCIE 4.0 riser kabel is inbegrepen. Een beschermende riser-kabelafdekking past mooi in de behuizing en maakt het mogelijk PCIE-kaarten op halve hoogte achter de troon van de verticale grafische kaart te plaatsen. De afschermkap is de eerste in zijn soort die speciaal voor de Y60 is ontworpen. Hotspots zijn geÃ«limineerd, met ventilatieopeningen aan de zijkant en fans smaakvol geplaatst aan de onderkant van de Y60. De drie voorgeÃ¯nstalleerde Flow FE12-fans met vloeistofdynamische lagers zorgen voor een fluisterstille werking. ', 'HYTE ', '219', '199', 6, 1, 1),
(110, 'NZXT H5 Elite All Black Tower-behuizing', 'De H5 Elite is voorzien van een gehard glazen frontpaneel en ingebouwde RGB-functionaliteit om de verschillende verlichtingscomponenten te tonen. Met betere thermische prestaties en intuÃ¯tief kabelbeheer is de H5 een ideale behuizing voor de meeste systemen. De speciale ventilator aan de onderkant van het binnenpaneel is haaks geplaatst om de GPU te koelen. Het intuÃ¯tief kabelbeheersysteem is voorzien van brede goten, haken en riempjes voor een nette en gemakkelijke installatie. De binnenkant van het systeem is eenvoudig en zonder gereedschap te bereiken via de voor en zijpanelen. ', 'NZXT ', '159', '', 5, 0, 1),
(111, 'Corsair 4000D AIRFLOW Tempered Glass Tower-behuizing', 'De zwarte Corsair 4000D AIRFLOW Tempered Glass is een karakteristieke behuizing met een uitzonderlijke koeling. Het duurzaam en massief stalen frontpaneel, voorzien van een modern front-I/O-paneel inclusief een USB-C-poort en de speciale ventilatiekanalen bieden samen een geweldige uitstraling en luchtstroom, wat gecombineerd met de twee meegeleverde 120 mm AirGuide fans, de koeling verbeteren. De behuizing biedt verder voldoende ruimte voor extra koeling, zoals extra 120 mm of 140 mm fans of radiatoren tot 360 mm en vier opbergruimtes voor opslag. Daarnaast maakt het CORSAIR RapidRoute-kabel managementsysteem het mogelijk om belangrijke kabels moeiteloos door Ã©Ã©n enkel kanaal te leiden, zodat het karakteristieke uiterlijk van de behuizing altijd behouden blijft. ', 'Corsair ', '119', '', 5, 0, 1),
(112, 'GIGABYTE B550 GAMING X V2, socket AM4', 'De GIGABYTE B550 GAMING X V2 is gebaseerd op de AMD B550 chipset en ondersteunt AMD processoren voor het AM4 socket. Het heeft vier DDR4-sloten voor maximaal 128 GB geheugen. De GIGABYTE B550 GAMING X V2 heeft ook twee PCIe 4.0 x16 slots en drie PCIe 3.0 x1 slots. De GIGABYTE B550 GAMING X V2 beschikt ook over 8-kanaals geluid, een Gigabit LAN-interface, vier SATA3-poorten, twee M.2-poorten, twee USB-A 2.0, drie USB-A 3.2 (5 Gbit/s) interfaces en Ã©Ã©n USB-A 3.2 (10 Gbit/s) interface. ', 'GIGABYTE ', '129', '', 4, 0, 1),
(113, 'MSI PRO Z790-P WIFI, socket 1700', 'Het MSI PRO Z790-P WIFI moederbord is gebaseerd op de Intel Z790 chipset en ondersteunt 12e en 13de generatie Intel processoren met een 1700 socket. Dit moederbord heeft vier dual-channel DDR5 DIMM-sleuven voor maximaal 128 GB RAM. Andere kenmerken van de MSI PRO Z790-P WIFI zijn Ã©Ã©n PCIe 5.0 x16 slot, Ã©Ã©n PCIe 4.0 x16 slot en twee PCIe 3.0 x1 slots. Daarnaast beschikt de MSI PRO Z790-P WIFI over 8-kanaals geluid, een 2,5 Gigabit LAN-interface, zes SATA3-poorten, vier M.2-poorten, WiFi 6E, Bluetooth, vier USB-A 2.0, twee USB-A 3.2 (5 Gbit/s) interfaces, Ã©Ã©n USB-A 3.2 (10 Gbit/s) en Ã©Ã©n USB-C 3.2 (20 Gbit/s) interface.', 'MSI ', '249', '229', 5, 1, 1),
(114, 'ASUS ROG STRIX B550-F GAMING, socket AM4', 'Het ASUS ROG STRIX B550-F GAMING is gebaseerd op de AMD B550 chipset en ondersteunt AMD-processoren voor de AM4-aansluiting. Het heeft vier DDR4-sloten voor maximaal 128 GB geheugen. Verdere kenmerken van de ASUS ROG STRIX B550-F GAMING zijn twee PCIe 4.0 x16 slots en drie PCIe 4.0 x1 slots. Daarnaast heeft de ASUS ROG STRIX B550-F GAMING 8-kanaals geluid, een 2,5 Gigabit LAN-interface, zes SATA3-poorten, twee M.2-poorten, twee USB-A 2.0, vier USB-A 3.2 (5 Gbit/s) interfaces, Ã©Ã©n USB-A 3.2 (10 Gbit/s) en Ã©Ã©n USB-C 3.2 (10 Gbit/s) interface. ', 'ASUS ', '169', '', 5, 0, 1),
(115, 'ASUS PRIME Z790-P, socket 1700 ', 'Het ASUS PRIME Z790-P moederbord is gebaseerd op de Intel Z790 chipset en ondersteunt 12e en 13de generatie Intel processoren met een 1700 socket. Dit moederbord heeft vier dual-channel DDR5 DIMM-sleuven voor maximaal 128 GB RAM. Andere kenmerken van de ASUS PRIME Z790-P zijn Ã©Ã©n PCIe 5.0 x16 slot, drie PCIe 5.0 x16 slots en Ã©Ã©n PCIe 3.0 x1 slot. Daarnaast beschikt de ASUS PRIME Z790-P over 8-kanaals geluid, een 2,5 Gigabit LAN-interface, vier SATA3-poorten, drie M.2-poorten, Ã©Ã©n M.2 WLAN-poort, vier USB-A 2.0, twee USB-A 3.2 (5 Gbit/s) interfaces, Ã©Ã©n USB-A 3.2 (10 Gbit/s), Ã©Ã©n USB-C 3.2 (10 Gbit/s) en Ã©Ã©n USB-C 3.2 (20 Gbit/s) interface. ', 'ASUS', '279', '', 5, 0, 1),
(116, 'ASUS PRIME B550-PLUS, socket AM4', 'De ASUS PRIME B550-PLUS is gebaseerd op de AMD B550 chipset en ondersteunt AMD-processoren voor de AM4-aansluiting. Het heeft vier DDR4-sloten voor maximaal 128 GB geheugen. De ASUS PRIME B550-PLUS heeft ook twee PCIe 4.0 x16 sloten en drie PCIe 4.0 x1 sloten. De ASUS PRIME B550-PLUS is tevens voorzien van 8-kanaals geluid, een Gigabit LAN-interface, zes SATA-poorten, twee M.2-poorten en een aantal USB-poorten. ', 'ASUS', '139', '', 5, 0, 1),
(117, 'Sharkoon WPM Gold ZERO 750W', 'De WPM Gold ZERO 750W van Sharkoon is een betrouwbare ATX voeding met optimale prestaties voor gaming-pcâ€™s en is voorzien van een 80 PLUS Gold certificering. Bovendien is een geluidloze werking mogelijk door de ZERO RPM-functie, die de fan laat stoppen met draaien als er geen actief koelvermogen nodig is. Het semi-modulaire ontwerp zorgt ook voor een nette installatie en uitstraling in een pc behuizing. Overtollige kabels kunnen in de meegeleverde kabeltas worden opgeborgen. ', 'Sharkoon', '90', '', 10, 0, 1),
(118, 'Delta GPS-1000EB A A22, 1000W', 'De GPS-1000EB A A22 voeding van Delta Electronics is een 1000W voeding met 80 PLUS Gold certificering. De volledige kabel-management garandeert een nette installatie en uitstraling.\r\nMet 50 jaar ervaring is Delta Electronics een van ''s werelds grootste fabrikanten van voedingen, ventilatoren en componenten. De Delta ATX-voedingen leveren prestaties van wereldklasse voor energiebesparing en milieuvriendelijke werking. Gebouwd met componenten van topkwaliteit en een robuust ontwerp, garandeert de GPS-serie product betrouwbaarheid, een stille ventilator werking en een lange levensduur. Extreem krachtig en stabiel, deze voedingen zijn ideaal voor toepassingen met veeleisende belastingen, zoals gaming en geavanceerde programmering. ', 'Delta ', '90', '76', 10, 1, 1),
(119, 'Corsair RM1000e, 1000W', 'De volledig modulaire en geluidsarme RM1000e voeding van 1000 Watt uit de CORSAIR RMe Serie levert een geluidsarme, betrouwbare stroomvoorziening met 80 PLUS Gold efficiÃ«ntie voor je pc. RMe-voedingseenheden beschikken over twee 8-pins EPS12V-kabels en een reeks PCIe 8-pins voedingsconnectoren en bieden daarmee alle aansluitingen die nodig zijn om de meest veeleisende pc-hardware van stroom te voorzien. IndustriÃ«le condensatoren met een rating tot 105Â°C staan voor superieure prestaties. Daarom geven we ook zeven jaar garantie. Start je computer sneller op en verbruik minder stroom, met ondersteuning voor de nieuwe Modern Standby-modus. Met de volledig modulaire kabels kun je jouw pc eenvoudig zelf bouwen, omdat je alleen de kabels aansluit die je systeem nodig heeft. Met een behuizing van 140 mm lang die geschikt is voor vrijwel elke computerkast biedt de CORSAIR RMe Series een constante voeding voor je pc. ', 'Corsair ', '160', '', 10, 0, 1),
(120, 'Corsair HX1200, 1200 Watt voeding', 'De HX1200 van Corsair is een ATX voeding en levert een vermogen van 1200 watt met een efficiÃ«ntie van 90%. Deze voeding heeft Ã©Ã©n 135 mm fan ingebouwd en is beveiligd tegen overspanning (OVP), tegen onderspanning (UVP), tegen overbelasting (OLP/OPP), tegen kortsluiting (SCP) en tegen oververhitting (OTP). Verder beschikt hij onder andere over 8x 5,25" molex, 8x SATA en 8x PCIe 6+2 pins aansluitingen.', 'Corsair ', '269', '', 10, 0, 1),
(121, 'Corsair RM1000x Shift 1000W', 'De volledig modulaire CORSAIR RM1000x Shift 1000W voeding is vervaardigd met de hoogste kwaliteit componenten en voorziet de pc van efficiÃ«nte 80 PLUS Gold prestaties met een vrijwel stille werking. De zeer efficiÃ«nte werking zorgt voor een laag stroomverbruik, minder lawaai en lagere temperaturen. Een speciaal geconfigureerde ventilatorcurve beperkt het geluid tot een minimum, zelfs bij vol vermogen. Bij kleine en middelgrote belastingen wordt de ventilator volledig uitgeschakeld, waardoor een vrijwel stille werking mogelijk is. Eersteklas interne componenten zorgen voor vlekkeloze prestaties en blijvende betrouwbaarheid. ', 'Corsair', '229', '209', 10, 1, 1),
(122, 'SAMSUNG LF24T350FHRXEN 24" Gaming Monitor', 'De Samsung LF24T350FHRXEN heeft een slank ontwerp dat de focus direct op de content legt en kan optimaal worden gebruikt in multi-monitor opstellingen. Het hoogwaardige IPS-paneel biedt fantastische kleuren vanuit elke hoek, en de LF24T350FHRXEN ondersteunt ook AMD''s Free-Sync-technologie voor een soepele gaming-ervaring. Met de refresh rate van 75 Hz ziet alle content er vlekkeloos uit. Of je nu een film bekijkt of een spelsessie start, alle inhoud wordt weergegeven zonder trillingen of ghosting-effecten. De speciale game-modus past de kleuren aan om ook in het donker fijne details te kunnen onderscheiden. De Flicker Free-technologie vermindert hinderlijk flikkeren van het scherm en de Eye Saver-modus minimaliseert de uitstoot van blauw licht om de ogen van de kijker te beschermen.', 'SAMSUNG ', '109', '', 20, 0, 1),
(123, 'AORUS FV43U 43" 4K Ultra HD Gaming Monitor', 'De AORUS FV43U Gaming montior is een 43" qled monitor met UHD-resolutie en uitgerust met twee HDMI 2.1 aansluitingen, 144 Hz refresh rate en 1 ms MPRT voor de meest vloeiende game-ervaring en ontzagwekkende beeldkwaliteit. De 10-bits kleuren en het super brede kleurengamma van 97% DCI-P3 / 150% sRGB bieden een uitstekende kleurnauwkeurigheid en consistentie. Het is DisplayHDR 1000-gecertificeerd voor een spectaculaire weergavekwaliteit en ultieme gaming- en entertainmentervaring. ', 'AORUS ', '1149', '1099', 5, 1, 1),
(124, 'LG 34WN750-B 34" UltraWide Gaming Monitor', 'De 34WN750-W van LG heeft een briljant beeld en een breed scala aan gemakskenmerken. Het 87 cm (34") diagonale display heeft een UWQHD (3440 x 1440 pixels) resolutie en biedt AH-IPS technologie met hoge kijkhoeken en levendige kleuren dankzij de HDR10 ondersteuning bij een helderheid van 300 cd/mÂ². Met AMD Free-Sync, Dynamic Action Sync, verschillende spelmodi en Black Stabilizer zijn spannende gamefuncties geÃ¯ntegreerd. Deze monitor kan worden aangesloten via 2x HDMI en Displayport. Met 4-Screen-Split kan het scherm in maximaal 4 segmenten worden verdeeld. Met OnScreen Control 2.0 kan je de monitor comfortabel met je muis bedienen. De 34WN750-W heeft een ergonomische standaard met hoogteverstelling en draaifunctie. ', 'LG', '399', '', 5, 0, 1),
(125, 'Apple Studio Display 27" 5K Ultra HD Monitor', 'Apple Studio Display is een groot, indrukwekkend venster op nieuwe werelden en fascineert vanaf het moment dat je het aanzet. Naast het elegante en slanke all-screen design is het Studio Display uitgerust met True Tone, dat de kleurtemperatuur altijd aanpast aan het omgevingslicht. Het 27" 5K Retina Display (5120 x 2880 pixels) met 14,7 miljoen pixels geeft fascinerend realistische en scherpe content weer. Een 12 MP ultra-groothoekcamera en een 6-kanaals geluidssysteem zijn geÃ¯ntegreerd in de Studio Display, zodat je altijd hoge kwaliteit videogesprekken en conferenties kan houden. 3D-audio biedt een echt thuisbioscoopgevoel voor de weergave van zelfs het meest complexe geluidsbeeld. De drie USB-C-poorten en de Thunderbolt-poort zorgen voor een snelle en eenvoudige aansluiting van alle apparaten, waaronder Mac, MacBook of iPad.\r\nDeze Studio Display wordt geleverd met een kantelbare standaard. ', 'Apple', '1779', '', 2, 0, 1),
(126, 'Dell UltraSharp U2723QE 27" 4K Ultra HD Monitor', 'Werk het meest productief op een UltraSharp U2723QE monitor van Dell met schitterende kleuren en contrast, voorzien van de eerste IPS Black-technologie in de branche en een connectiviteitshub. Ervaar ongelooflijke kleuren en superieure zwarte prestaties met een contrastverhouding van 2000:1 op een 27 inch 4K-monitor met IPS Black-technologie.\r\n\r\nComfortView Plus-een always-on, geÃ¯ntegreerde scherm met weinig blauw licht - vermindert potentieel schadelijke uitstoot van blauw licht zonder afbreuk te doen aan kleur. Bekijk fijne details op deze 4K-monitor en profiteer van levensechte kleuren met 98% DCI-P3 en VESA DisplayHDR 400.\r\n\r\nStroomlijn jouw werkruimte met uitgebreide aansluitpoorten, waaronder USB-C (tot 90 W voeding), RJ-45 (Ethernet), DisplayPort 1.4 en HDMI. Snel toegankelijke USB-C (tot 15 W opladen via stroom) en supersnelle USB 10 Gpbs-poorten maken eenvoudige verbindingen en snelle dataoverdracht mogelijk.\r\n\r\nUSB-C-connectiviteit met Ã©Ã©n kabel biedt de flexibiliteit om verbinding te maken met USB-C-systemen van meerdere leveranciers waardoor wirwar van kabels wordt verminderd en snelle overgangen vanaf het bureau mogelijk zijn.\r\nProfiteer van verbeterde beheerbaarheid met MAC Address Pass-Through, PXE Boot en Wake-on-LAN, eenvoudig geÃ¯ntegreerd.\r\n\r\nMaak verbinding met twee pc-bronnen en Auto KVM schakelt naadloos over naar de tweede aangesloten pc. Gebruik de KVM-functie (toetsenbord, video en muis) om beide pc''s met Ã©Ã©n muis en toetsenbord te bedienen.\r\n\r\nErvaar compromisloze beeldkwaliteit door twee 4K-monitoren door te lussen. U2723QE is ''s werelds eerste 27 inch 4K-monitor die het mogelijk maakt om een extra 4K-monitor met volledige resolutie door te lussen via USB-C, mogelijk gemaakt door Display Stream Compression (DSC). ', 'Dell ', '699', '', 5, 0, 1),
(127, 'Ducky One 2 Mini RGB, gaming toetsenbord', 'De Ducky One 2 Mini RGB met Cherry MX Silent Red switches is een stevig mechanisch toetsenbord, met instelbare RGB led verlichting en PBT Double Shot keycaps. De Cherry MX keys hebben een levensduur van 50 miljoen handelingen per toets en het toetsenbord biedt door de N-Key Rollover een sterke anti-ghosting, zodat geen enkele toetsaanslag overgeslagen wordt.\r\nHet toetsenbord heeft verschillende extra verlichting opties, waaronder twee led profielen, welke zelf ingesteld kunnen worden, zo kun je zelf bepalen welke toetsen wel of niet verlicht moeten worden. Met de DIP switches is het mogelijk om de functie van een aantal toetsen aan te passen en om te wisselen tussen N-Key en 6-Key Rollover.\r\nDe One 2 Mini RGB wordt geleverd met een extra setje van 10 speciale PBT keycaps. Deze set wordt willekeurig geleverd in de kleur rood, geel, blauw of groen. ', 'Ducky One', '109', '77', 10, 1, 1),
(128, 'Logitech G915 LIGHTSPEED Wireless RGB Mechanical Gaming Keyboard', 'G915 is een revolutionair draadloos mechanisch gaming toetsenbord met GL Tactile switches en professionele draadloze LIGHTSPEED-technologie (1 ms). Je kunt er 30 uur non-stop mee gamen bij volledige oplading.* De LIGHTSYNC RGB-technologie is volledig aanpasbaar per toets en reageert ook op acties, audio en schermkleur zoals jij het wilt. Met een strak, ongelooflijk dun maar duurzaam en stevig ontwerp, brengt G915 gamers naar nieuwe game dimensies. Met programmeerbare G-toetsen kun je complexe acties eenvoudig en intuÃ¯tief maken en uitvoeren, terwijl het volumewiel en mediaknoppen je snelle, eenvoudige controle over video, audio en streaming bieden.\r\n*Batterijlevensduur kan variÃ«ren, afhankelijk van gebruiks- en computer omstandigheden.\r\n\r\nKenmerken\r\nâ€“ Professionele draadloze prestaties met LIGHTSPEED\r\nâ€“ LIGHTSYNC RGB voor geavanceerde aanpassingen\r\nâ€“ Vlakke, hoogwaardige mechanische schakelaars, GL Tactile\r\n- Prachtig vormgegeven aluminium ontwerp voor duurzaamheid\r\nâ€“ Batterijlevensduur van 30 uur. Batterijlevensduur kan variÃ«ren, afhankelijk van gebruiks- en computer omstandigheden.\r\nâ€“ Vijf programmeerbare G-toetsen\r\nâ€“ Toegewezen mediaknoppen\r\nâ€“ Maak met meerdere apparaten verbinding via USB of Bluetooth', 'Logitech ', '189', '', 5, 0, 1),
(129, 'Ducky One 3 Fuji TKL, toetsenbord', 'De Ducky One 3 Fuji TKL met MX Silent Red switches is een mechanisch toetsenbord voorzien van Ducky''s volledig nieuwe QUACK Mechanics design filosofie in een strak design met PBT Double Shot keycaps. Het Ducky toetsenbord levert ook nog steeds de beste typ ervaring met N-Key Rollover ondersteuning voor een sterke anti-ghosting, zodat geen enkele toetsaanslag overgeslagen wordt. Dankzij de Q-Bounce Synthetische Stootkussens en de EVA geluidsdempende kussens wordt ongewenst geluid tijdens het typen voorkomen. De Ducky One 3 serie is hot-swappable, hierdoor zijn de meegeleverde switches eenvoudig om te wisselen met andere switches. Andere toevoegingen zijn de 3 niveau verstelbare voetjes, een verbeterd PCB ontwerp, een afneembare gevlochten USB Type-C kabel, een verbeterde Macro layout, en nog veel meer. ', 'Ducky  One', '129', '', 10, 0, 0),
(130, 'Apple Magic Keyboard voor 11â€‘inch iPad Pro (3e generatie) en iPad Air (4e generatie), toetsenbord', 'Het Magic Keyboard gaat geweldig samen met de 11-inch iPad Pro en iPad Air. Je typt er heel prettig mee, en met het geÃ¯ntegreerde trackpad kun je op een heel andere manier in iPadOS aan de slag. De USBâ€‘C-poort is bovendien geschikt voor opladen, en je iPad is van voor tot achter beschermd. Het Magic Keyboard heeft een zwevend design. Je klikt je iPad Pro of iPad Air magnetisch vast en zet â€™m daarna eenvoudig en traploos in de perfecte kijkhoek.\r\nGeschikt voor: 11-inch iPad Pro (1e, 2e of 3e generatie) of iPad Air (4e generatie) met iPadOS 14.5 of hoger. ', 'Apple', '369', '', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `soorten`
--

CREATE TABLE IF NOT EXISTS `soorten` (
  `soort` varchar(100) NOT NULL,
  `spec1` varchar(100) NOT NULL,
  `spec2` varchar(100) NOT NULL,
  `spec3` varchar(100) NOT NULL,
  `spec4` varchar(100) NOT NULL,
  `spec5` varchar(100) NOT NULL,
  PRIMARY KEY (`soort`),
  KEY `soort` (`soort`),
  KEY `soort_2` (`soort`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soorten`
--

INSERT INTO `soorten` (`soort`, `spec1`, `spec2`, `spec3`, `spec4`, `spec5`) VALUES
('case', 'Case form factor', 'Case size', '', '', ''),
('cpu', 'CPU core''s', 'CPU speed', 'CPU socket', 'CPU type', ''),
('gpu', 'GPU cores', 'GPU type', 'GPU Memory Type', 'GPU Memory', ''),
('headphones', 'Headphones type', 'Headphones mic', '', '', ''),
('keyboard', 'Keyboard type', 'Keyboard switch', '', '', ''),
('mobo', 'Moederbord socket', 'Moederbord form factor', 'Moederbord ram type', 'Moederbord ram slots', ''),
('monitor', 'Monitor size', 'Monitor refresh rate', 'Monitor resolution', '', ''),
('mouse', 'Mouse type', 'Mouse sensor', '', '', ''),
('psu', 'PSU power', 'PSU modular', '', '', ''),
('ram', 'RAM type', 'RAM speed', 'RAM size', '', ''),
('storage', 'Storage type', 'Storage size', 'Storage speed', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `specificaties`
--

CREATE TABLE IF NOT EXISTS `specificaties` (
  `referentieNummer` int(11) NOT NULL,
  `soort` varchar(100) NOT NULL,
  `val1` varchar(255) NOT NULL,
  `val2` varchar(255) NOT NULL,
  `val3` varchar(255) NOT NULL,
  `val4` varchar(255) NOT NULL,
  `val5` varchar(255) NOT NULL,
  PRIMARY KEY (`referentieNummer`),
  UNIQUE KEY `referentieNummer` (`referentieNummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specificaties`
--

INSERT INTO `specificaties` (`referentieNummer`, `soort`, `val1`, `val2`, `val3`, `val4`, `val5`) VALUES
(83, 'cpu', '4', '4', '3', '5', '0'),
(84, 'cpu', '8', '3800', 'AM4', 'Desktop', '0'),
(85, 'cpu', '4', '2500', '1700', 'Desktop', '0'),
(86, 'cpu', '6', '3600', 'AM4', 'Desktop', '0'),
(87, 'cpu', '8', '3400', '1700', 'Desktop', '0'),
(88, 'cpu', '8', '3000', '1700', 'Desktop', '0'),
(89, 'gpu', 'RTX', '3584', 'GDDR6', '12', '0'),
(90, 'gpu', 'GTX', '1408', 'GDDR6', '6', '0'),
(91, 'gpu', '', '', '', '', '0'),
(92, 'gpu', 'RTX', '1920', 'GDDR6', '6', '0'),
(93, 'cpu', '20', '20', '20', '20', '0'),
(94, 'cpu', '5', '5', '5', '5', '0'),
(95, 'gpu', 'RTX', '1807', 'GDDR6', '12', '0'),
(96, 'gpu', 'RX', '6750', 'GDDR6', '12', '0'),
(97, 'ram', 'DDR4', '2133', '16', '0', '0'),
(98, 'ram', 'DDR5', '6000', '32', '0', '0'),
(99, 'ram', 'DDR5', '5200', '32', '0', '0'),
(100, 'ram', 'DDR5', '6000', '32', '0', '0'),
(101, 'ram', 'DDR4', '3600', '32', '0', '0'),
(102, 'storage', 'HDD', '1TB', '7200', '0', '0'),
(103, 'storage', 'HDD', '4TB', '600', '0', '0'),
(104, 'storage', 'SSD', '256GB', '2100', '0', '0'),
(105, 'storage', 'SSD', '2TB', '530', '0', '0'),
(106, 'storage', 'SSD', '2TB', '7000', '0', '0'),
(107, 'case', 'ATX', '70x80', '0', '0', '0'),
(108, 'case', 'mini-ATX', '40x50', '0', '0', '0'),
(109, 'case', 'ATX', '70x80', '0', '0', '0'),
(110, 'case', 'ATX', '70x80', '0', '0', '0'),
(111, 'case', 'ATX', '70x80', '0', '0', '0'),
(112, 'mobo', 'AM4', 'ATX', 'DDR4', '4', '0'),
(113, 'mobo', '1700', 'ATX', 'DDR5', '4', '0'),
(114, 'mobo', 'AM4', 'ATX', 'DDR4', '4', '0'),
(115, 'mobo', '1700', 'ATX', 'DDR5', '4', '0'),
(116, 'mobo', 'AM4', 'ATX', 'DDR4', '4', '0'),
(117, 'psu', '750', 'Ja', '0', '0', '0'),
(118, 'psu', '1000', 'Ja', '0', '0', '0'),
(119, 'psu', '1000', 'Ja', '0', '0', '0'),
(120, 'psu', '1200', 'Ja', '0', '0', '0'),
(121, 'psu', '1000', 'Ja', '0', '0', '0'),
(122, 'monitor', '24', '75', '1920x1080', '0', '0'),
(123, 'monitor', '43', '144', '3840x2160', '0', '0'),
(124, 'monitor', '34', '75', '3440x1440', '0', '0'),
(125, 'monitor', '27', '60', '5120x2880', '0', '0'),
(126, 'monitor', '27', '60', '3840x2160', '0', '0'),
(127, 'keyboard', 'Mechanisch', '	Cherry MX Silent', '0', '0', '0'),
(128, 'keyboard', 'Mechanisch', '	GL Tactile', '0', '0', '0'),
(129, 'keyboard', 'Mechanical', 'Cherry MX Silent Red', '0', '0', '0'),
(130, 'keyboard', '', '', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `winkelwagen`
--

CREATE TABLE IF NOT EXISTS `winkelwagen` (
  `klantNummer` int(11) NOT NULL,
  `referentieNummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winkelwagen`
--

INSERT INTO `winkelwagen` (`klantNummer`, `referentieNummer`) VALUES
(22, 84);
--
-- Database: `loginsystem`
--
CREATE DATABASE IF NOT EXISTS `loginsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loginsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `admin`) VALUES
(20, 'Kenneth Heymans', 'kennethheymans@gmail.com', 'noob', '$6$rounds=5000$gipmanuenquinten$28yE3lMDtjEji7t25hoFZyTuzkP11Oz2qAsArWXT2bMe6jV/DvooUHhnW68cHX9vbsxZWSftrwp0D/kKbVUbA/', 0),
(22, 'gast', 'gast@gmail.com', 'gast', '$6$rounds=5000$gipmanuenquinten$F18CsIboae4oCSESnvkTDIxmmtCzbyzv9QE7fUf2adY1H/.mrbJb8r13QU2OKQnql6w.x8LNfrk56LhzCKLRN.', 0),
(23, 'beheerder', 'beheerder@gmail.com', 'beheerder', '$6$rounds=5000$gipmanuenquinten$T5g1.UsRth2vdYw7rM4dcbvMS.ANZHbkITWstsTgRxEHoon1yWWlq93uByab3kDCxiznuXuBeLX69Nf3GA.lA1', 1),
(24, 'admin', 'admin@gmail.com', 'admin', '$6$rounds=5000$gipmanuenquinten$WWEh6ADzkuCSbjsfMGRVJH3e.JJeSogPneo0LkzknsHUEQa1o8v7sHTM3GK/kl0WT188sEWI6MA/ikiffGkBO.', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
