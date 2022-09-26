-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 01:54 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_web3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first name` varchar(225) NOT NULL,
  `last name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first name`, `last name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$QbaAVgueYohjGmSAsRrJuOZain8l2txDdzkn2h1g4CtLcwB5S257G');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemcat` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idCat` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idCat`, `name`) VALUES
(1, 'Laptops'),
(2, 'Laptops parts'),
(3, 'PCs'),
(4, 'PC parts'),
(5, 'Accessories'),
(6, 'Monitors');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `catname` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `catname` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `discountprice` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `catname`, `name`, `description`, `price`, `discountprice`, `stock`, `image`, `date`) VALUES
(1, 'Laptops', 'Lenovo V15 IGL 15.6\" Laptop - Intel Celeron N4020 - RAM 4GB - HDD 1TB | 82C3000GAK', 'Lenovo V15 IGL 15.6\" Laptop - Intel Celeron N4020 - RAM 4GB - HDD 1TB | 82C3000GAK  Processor: Intel Celeron N4020 (2C / 2T, 1.1 / 2.8GHz, 4MB) Memory: 4GB Soldered DDR4-2400 Storage: 1TB HDD 5400rpm 2.5\" Graphics Card: Integrated Intel UHD Graphics 600 Operating System: FreeDOS I/O Ports: 1x USB 2.0 | 2x USB 3.1 Gen 1 | 1x HDMI 1.4b | 1x Card reader | 1x Headphone / microphone combo jack (3.5mm) | 1x Power connector Wireless Connectivity: 11ac, 2x2 + BT5.0 Camera: 0.3MP Battery: Integrated 35Wh', 200, 0, 9, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MTAxMGxhcHRvcDEuanBn.jpg', 'September 22, 2022'),
(2, 'Laptops', 'Lenovo V15 IML 15.6\" Laptop - Intel Core i3-10110U - RAM 4GB - HDD 1TB | 82NB0015AK', 'Lenovo V15 IML 15.6\" Laptop - Intel Core i3-10110U - RAM 4GB - HDD 1TB | 82NB0015AK  Processor: Intel Core i3-10110U Memory: 4GB Soldered DDR4-2666 Storage: 1TB HDD 5400rpm 2.5\" Graphic Card: Integrated Intel UHD Graphics Display: 15.6\" HD (1366x768) TN 220nits Anti-glare Operating System: None I/O Ports: 1x USB 2.0 | 2x USB 3.2 Gen 1 | 1x HDMI 1.4b | 1x Card reader | 1x Headphone / microphone combo jack (3.5mm) | 1x Power connector Wireless Connectivity: 11ac, 2x2 + BT5.0 Camera: 0.3MP with Privacy Shutter Battery: Integrated 35Wh', 285, 250, 15, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MDYwNmxhcHRvcDIud2VicA==.webp', 'September 22, 2022'),
(3, 'Laptops', 'ACER Aspire A315-56-34W3 I3-1005G1 4GB 1TB HDD', ' PROCESSOR :INTEL CORE I3-1005G1 1.20GHZ    Memory   	4GB    Storage   	1TB HDD    Display   	15.6\" HD (1366 x 768)    Graphics   	Intel UHD Graphics    Ports   	HDMI     Yes     Number of HDMI Outputs     1     Number of USB 2.0 Ports     2     Number of USB 3.1 Gen 1 Type-A Ports     1     Total Number of USB Ports     3     Network (RJ-45)     Yes    OS   	DOS    Color   	Black   ', 400, 0, 15, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MDMwM2xhcHRvcDMud2VicA==.webp', 'September 22, 2022'),
(4, 'Laptops', 'Lenovo IdeaPad 3 14IIL05 14\" Laptop - Intel Core i5-1035G1 - RAM 4GB - HDD 1TB | 81WD00VMAK', ' Processor	 Intel Core i5-1035G1 (4C / 8T, 1.0 / 3.6GHz, 6MB) Graphics	 Integrated Intel UHD Graphics Chipset	 Intel SoC Platform Memory	 4GB Soldered DDR4-2666 Memory Slots	 One memory soldered to systemboard, one DDR4 SO-DIMM slot, dual-channel capable Max Memory	 Up to 12GB (4GB soldered + 8GB SO-DIMM) DDR4-2666 offering Storage	 1TB HDD 5400rpm 2.5\" Storage Support	 Model with 35Wh battery: up to two drives, 1x 2.5\" HDD + 1x M.2 SSD â€¢ 2.5\" HDD up to 1TB â€¢ M.2 2242 SSD up to 512GB â€¢ M.2 2280 SSD up to 1TB Card Reader	 4-in-1 Card Reader Optical	 None Audio Chip	 High Definition (HD) Audio Speakers	 Stereo speakers, 1.5W x2, Dolby Audio Camera	 0.3MP with Privacy Shutter Microphone	 2x, Array Battery	 Integrated 35Wh Max Battery Life	 MobileMark 2014: 7.5 hr (35Wh + integrated graphics) Power Adapter	 65W Round Tip (2-pin, Wall-mount)', 380, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MzEzMWxhcHRvcDQuanBn.jpg', 'September 22, 2022'),
(5, 'Laptops', 'ASUS VivoBook R410MA 14\" Laptop - Intel Celeron Dual-Core N4020 - RAM 4GB - SSD 128GB | R410MA-212.BK128', 'Processor: Intel Celeron N4020 1.1GHz 2-Core 4MB Cache Memory: 4GB DDR4-SDRAM Storage: 128GB eMMC Graphic Card: IntelÂ® UHD Graphics 600 Operating System: DOS Display: 14.0-inch, FHD (1920 x 1080) 16:9 aspect ratio I/O Ports: 1x USB 2.0; 1x USB 3.2 Gen 1 Type-A; 1x USB 3.2 Gen 1 Type-C; 1x HDMI; 1x Combo Headphone/Mic Wireless Connectivity: Wi-Fi 5, Bluetooth 4.1 Camera: 720p HD Webcam Battery: 42Wh Li-ion', 200, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NDc0N2xhcHRvcDUuanBn.jpg', 'September 22, 2022'),
(6, 'Laptops', 'Lenovo Flex 5 14\" 2-in-1 Laptop - Intel Core i5-1135G7 - RAM 8GB - SSD 256GB - Intel Iris Xe | 82HS00R3US', 'Processor: Intel Core i5-1135G7 (4C / 8T, 2.4 / 4.2GHz, 8MB) Memory: 8GB Soldered DDR4-3200 Storage: 256GB SSD M.2 2242 PCIe 3.0x4 NVMe Graphic Card: Integrated Intel Iris Xe Graphics Display: 14\" FHD (1920x1080) IPS 250nits Glossy, 45% NTSC, Touch Operating System: Windows 11 Home 64, English I/O Ports: 1x USB 3.2 Gen 1, 1x USB 3.2 Gen 1 (Always On), 1x USB-C 3.2 Gen 1 (support data transfer and Power Delivery), 1x HDMI 1.4b, 1x Card reader, 1x Headphone / microphone combo jack (3.5mm), 1x Power connector Wireless Connectivity: Wi-Fi 6 11ax, 2x2 + BT5.0 Camera: HD 720p with Privacy Shutter Battery: Integrated 52.5Wh', 600, 550, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MzQzNGxhcHRvcDYud2VicA==.webp', 'September 22, 2022'),
(7, 'Laptops', 'Microsoft Surface Go 10\" Laptop - Intel Pentium Dual-Core 4415Y - RAM 4GB - SSD 64GB | JSW-00052', 'Microsoft Surface Go 10\" Laptop - Intel Pentium Dual-Core 4415Y - RAM 4GB - SSD 64GB | JSW-00052', 200, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MzYzNmxhcHRvcDcuanBn.jpg', 'September 22, 2022'),
(8, 'Laptops', 'MSI GF65 Thin 10UE 15.6\" Laptop - Intel Core i7-10750H - RAM 8GB - SSD 512GB - RTX 3060 | GF65092', 'Processor: Intel Core i7 10th Gen 10750H (2.60 GHz) Memory: 8 GB Memory 512 GB NVMe SSD Storage: 512 GB NVMe SSD Graphic Card: NVIDIA GeForce RTX 3060 Laptop GPU 6 GB GDDR6 Display: 15.6\" 1920 x 1080 IPS-Level 144 Hz 45% NTSC Operating System: Windows 10 Home I/O Ports: 1 x HDMI (4K @ 60Hz), 2 x USB 3.2 Gen 1 Type-C, 2 x USB 3.2 Gen 1 Type-A Wireless Connectivity: Intel Wi-Fi 6 AX201(2*2 ax), BT 5.1 Camera: 720p HD Webcam Battery: 3 cell (51Whr)', 1050, 1000, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NDg0OGxhcHRvcDgud2VicA==.webp', 'September 22, 2022'),
(9, 'Laptops', 'Lenovo IdeaPad Flex 5 14ITL05 2-in-1 14\" Laptop - Intel Core i3-1115G4 - RAM 4GB - SSD 128GB | 82HS00R9US', 'Processor: 11th Generation IntelÂ® Coreâ„¢ i3-1135G7 Processor (2.40 GHz, up to 4.20 GHz with Turbo Boost, 4 Cores, 8 Threads, 8 MB Cache) Memory: 4GB DDR4 3200MHz Storage: 128GB NVMe SSD Graphic Card: Integrated Intel Iris Xe Graphics Display: 14.0\" FHD (1920 x 1080) IPS, Glossy,Touch-Screen, 250 nits Operating System: Microsoft Windows 11 Home I/O Ports: 2 x USB 3.2 Gen 1, USB Type-C 3.2 Gen 1 with Power Delivery, HDMI 1.4b, 4-in-1 card reader (SD, SDHC, SDXC, MMC), Headphone / mic combo Wireless Connectivity: 802.11AX (2 x 2) & BluetoothÂ® 5.0 Camera: 720p HD Webcam Battery: 3-cell, 51 Wh Li-ion', 380, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NTE1MWxhcHRvcDkuanBn.jpg', 'September 22, 2022'),
(10, 'Laptops', 'HP 15.6\' Full HD IPS Laptop, Intel Core i5-1135G7 Processor, 8GB DDR4, 256GB SSD, 802.11ac, Bluetooth 4.2, HDMI, Windows 10, W/ Valinor Accessories, HP15ddx', '11th Generation Intel Core i5-1135G7 Processor (up to 4.2 GHz with Intel Turbo Boost Technology, 8 MB L3 cache, 4 cores) 15.6-inch diagonal, FHD (1920 x 1080), micro-edge, anti-glare, 250 nits, 45% NTSC Display, Intel Iris Xáµ‰ Graphics 8 GB DDR4-2666 MHz RAM (2 x 4 GB); 256 GB PCIe NVMe M.2 SSD 1 multi-format SD media card reader, Realtek RTL8821CE-M 802.11a/b/g/n/ac (1x1) Wi-Fi and Bluetooth 4.2 combo, 1 SuperSpeed USB Type-C 5Gbps signaling rate; 2 SuperSpeed USB Type-A 5Gbps signaling rate; 1 HDMI 1.4b; 1 AC smart pin; 1 headphone/microphone combo Windows 11 Home operating system, 3-cell, 41 Wh Li-ion battery, Natural silver, Accessory: Valinor 32GB USB 3.0 Flash Drive', 700, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MDIwMmxhcHRvcDEwLmpwZw==.jpg', 'September 22, 2022'),
(11, 'Laptops parts', 'Crucial 8GB Laptop DDR4 2666 MHz SODIMM Memory Module (1 x 8GB)', 'Keep your laptop feeling fresh with the 8GB Laptop DDR4 2666 MHz SODIMM Memory Module from Crucial. Designed to provide responsive performance as well as smooth multitasking capabilities, this 1.2v memory module features 8GB of 2666 MHz unbuffered memory. A CL19 latency also delivers smooth performance for data-intensive tasks.', 32, 0, 17, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MjUyNWxhcHRvcFBhcnQxLmpwZw==.jpg', 'September 22, 2022'),
(12, 'Laptops parts', 'Replacement Battery Compatible with Toshiba Laptops', 'Replacement Battery Compatible with Toshiba Laptops | PA3534U-1BAS pa3535 3534 V000100760 PABAS098 PABAS099 pa3534-1brs pa3534u-1brs Satellite a305d a203', 22, 20, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NTE1MWxhcHRvcFBhcnQyLmpwZw==.jpg', 'September 22, 2022'),
(13, 'Laptops parts', 'Acer 5800 Compatible Keyboard for Laptop', 'Acer 5800 Compatible Keyboard for Laptop', 5, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MTExMWxhcHRvcFBhcnQzLmpwZw==.jpg', 'September 22, 2022'),
(14, 'Laptops parts', 'Replacement Battery Compatible with HP Laptops', 'Replacement Battery Compatible with HP Laptops | JC03 JC04 Laptop Battery Compatible with HP Notebook 919700-850 919701-850 HSTNN-LB7V TPN-C129, 15-BW 15-BS 17-BS 17Z, Pavilion 255 G6 250 G6, 15-BW011dx 15-BS015dx 17-BS011dx 17-BS049dx 17-BS019dx', 20, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MjIyMmxhcHRvcFBhcnQ0LmpwZw==.jpg', 'September 22, 2022'),
(15, 'Laptops parts', 'Kingston - 16GB 3200MHz DDR4 CL20 SODIMM 1Gx8 FURY Impact Laptop Memory | KF432S20IB1/16', 'Get your notebook or small form factor machine fully equipped with Kingston FURY Impact DDR4 SODIMM and minimize system lag. Ready for AMD Ryzen and Intel XMP-ready in capacities up to 64GB, Plug N Play FURY Impact DDR4 automatically overclocks to the highest frequency published, up to 3200MHz, to support Intel and AMDâ€™s latest CPU technologies. Slot in the sleek black PCB for a hassle-free boost, no need to tinker with the BIOS. Upgrade your systemâ€™s performance and still run cool, quiet, and efficiently, thanks to FURY Impact DDR4â€™s low 1.2 voltage.  Maximize your memory and get a boost to your gaming, multitasking, and rendering.  Plug N Play Automatic Overclocking Functionality - automatically overclocks to the highest published frequency.  Intel XMP-Ready Profiles  Ready for AMD Ryzen  Higher Performance with Low Power Consumption - Low 1.2V power draw to run your system efficiently.', 68, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MjMyM2xhcHRvcFBhcnQ1LmpwZw==.jpg', 'September 22, 2022'),
(16, 'Laptops parts', 'Acer AC4741 Compatible Battery | AC4741', 'AC4741 11.1v 5200mAh', 17, 15, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NDY0NmxhcHRvcFBhcnQ2LmpwZw==.jpg', 'September 22, 2022'),
(17, 'Laptops parts', 'Lenovo 20V 3.25A 4.0*1.7 Compatible Laptop Adapter | ADLX65NCT3A', 'Brand: Lenovo 20V 3.25A 4.0*1.7 Compatible Laptop Adapter', 8, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MzIzMmxhcHRvcFBhcnQ3LmpwZw==.jpg', 'September 22, 2022'),
(22, 'Laptops parts', 'Replacement Battery Compatible with SONY Laptops | BPS02', 'Category Laptop Battery ( Compatible For SONY)', 34, 0, 17, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MDEwMWxhcHRvcFBhcnQ5LmpwZw==.jpg', 'September 22, 2022'),
(23, 'Laptops parts', 'Replacement Battery Compatible with HP Laptops ', 'Replacement Battery Compatible with HP Laptops | CM03XL CM03 Laptop Battery for HP Elitebook 740 G2, 745 G2, 750 G2, 755 G2, 840 G1, 840 G2, 845 G2, 850 G1, 850 G2, 855 G2, Zbook 14 G2', 40, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6MDMwM2xhcHRvcFBhcnQxMC5qcGc=.jpg', 'September 22, 2022'),
(20, 'Laptops parts', 'HP Original Cells Grade A+ Battery | HT03xl', 'Original Cells Grade A Battery HP | HT03xl', 55, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NDA0MGxhcHRvcFBhcnQ4LmpwZw==.jpg', 'September 22, 2022'),
(24, 'PCs', 'Lenovo V50t-13IMB Intel Core i5-10400 (6C / 12T, 2.9 / 4.3GHz, 12MB) 1TB HDD 7200rpm 3.5\" + Keyboard and Mouse Desktop | 11HD0019AX', ' Processor	 Intel Core i5-10400 (6C / 12T, 2.9 / 4.3GHz, 12MB) Graphics	 Integrated Intel UHD Graphics 630 Chipset	 Intel B460 Memory	 1x 4GB UDIMM DDR4-2666 Memory Slots	 Two DDR4 UDIMM slots, dual-channel capable Max Memory	 Up to 32GB DDR4-2666 Storage	 1TB HDD 7200rpm 3.5\" Optane Memory	 None Storage Support	 Up to two drives, 1x 3.5\" HDD + 1x M.2 SSD â€¢ 3.5\" HDD up to 2TB â€¢ M.2 SSD up to 1TB Card Reader	 3-in-1 Card Reader Optical	 9.0mm DVDÂ±RW Audio Chip	 High Definition (HD) Audio, Realtek ALC623-CG codec Speakers	 2Wx1 Power Supply	 180W 85%', 450, 0, 17, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NTE1MXBjMS5qcGc=.jpg', 'September 22, 2022'),
(25, 'PCs', 'Lenovo IdeaCentre 3 Desktop - AMD Ryzen 3 3250U - RAM 4GB - HDD 1TB | 90MV00G3AK', 'Processor: AMD Ryzen 3 3250U | Speed: 2.6 GHz (Base) - 3.5 GHz (Max) | 2 Cores | 4MB Cache OS: This is a DOS based tower desktop. Requires separate purchase and installation of operating system software (like Windows), not included in the box. Memory: 4GB DDR4 RAM, expandable up to 16GB Storage: 1TB HDD Graphics: Integrated AMD Radeon Graphics Connectivity: WiFi 5 (11ac, 2x2) | Bluetooth 5.0 Ports: 2 USB 3.2, 6 USB 2.0, Headphone/Mic combo jack (3.5mm), Ethernet (RJ-45), HDMI, VGA, Line-out (3.5mm), Microphone | Without CD Drive', 300, 0, 17, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMjAyOjA5MDk6NDE0MXBjMi5qcGc=.jpg', 'September 22, 2022'),
(26, 'PCs', 'Lenovo Desktop V50t G2 Tower i7-10700 | 11QE003PEX', 'Lenovo Desktop V50t G2 Tower | i7-10700 (8C/16T,2.9/4.8GHz,16MB), Chipset B560, 4 GB DDR4-2933, 1 TB HDD 7200rpm 3.5\", Optical 9.0mm DVDÂ±RW, Integrated Intel UHD Graphics 630, 3-in-1 Card Reader, Serial Port, Parallel Port, Internal Speaker, USB Keyboard & Mouse, Ethernet Integrated 100/1000M, No OS', 635, 600, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjQyNHBjMy5qcGc=.jpg', 'September 22, 2022'),
(27, 'PCs', 'Lenovo ThinkCenter M70T Core i5-10400 Desktop | 11EV0036UM', 'ThinkCenter M70T Core i5-10400 Intel H470 1x4GB DDR4 2666 HDD 1TB Intel HD 630', 425, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NDc0N3BjNC53ZWJw.webp', 'September 22, 2022'),
(28, 'PCs', 'HP Pavilion Gaming Desktop â€“ TG01-0160xt', '8th generation Intel Core i5 Processor AMD Radeon RX 5500 Graphics 4GB 8 GB memory; 1 TB HDD storage', 995, 950, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTY1NnBjNS5qcGc=.jpg', 'September 22, 2022'),
(29, 'PCs', 'Dell Vostro 3888 Desktop Core i7-10700 | 210-AVNL-I7', 'CPU: Core i7-10700 RAM: 4 GB DDR4 HDD: 1TB OS: DOS More Specs: B460 Board ,Wi-Fi + BT, 2*DIMM,NVME,LAN,D-Sub, HDMI, 260W P.S', 603, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjAyMHBjNi5qcGc=.jpg', 'September 22, 2022'),
(32, 'PCs', 'Dell Optiplex 7090 Desktop | 30HK9', 'CPU: Core i7-11700 O.S.: Ubuntu 20.04 SSD NVMe Socket: Two Memory: 4GB Max. Memory: 128GB HDD: 1TB VGA: Intel UHD 750 DVDRW: Yes Keyboard-Mouse: USB, E/A LAN: Gigabit Display: 2DP Only Audio In-Out: 1R + 1 Combo F', 616, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MDYwNnBjNy5qcGc=.jpg', 'September 22, 2022'),
(33, 'PCs', 'Asus ExpertCenter D3 Core i7-10700 Tower Desktop | D300TA', 'CPU: Core i7-10700 O.S.: DOS SSD NVMe Socket: Yes Memory: 1x8GB Max. Memory: 64GB HDD: 1TB VGA: Intel IRIS XE DVDRW: None Keyboard-Mouse: ASUS English / USB LAN: Gigabit Display: HDMI + D-SUB Audio In-Out: Combo 7.1 Channel', 581, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MTMxM3BjOC53ZWJw.webp', 'September 22, 2022'),
(34, 'PC parts', 'PNY 32GB XLR8 Gaming 3200 MHz Desktop Memory Kit (2 x 16GB)', 'Boost performance with the 32GB XLR8 Gaming 3200 MHz Desktop Memory Kit from PNY Technologies. Designed for easy installation in a desktop computer, this memory kit features two 16GB 288-pin DIMMs. Utilizing a 3200 MHz clock speed, this DDR4 or PC4-21300 kit has a CAS latency of CL16 and power requirement of 135V. The PNY XLR8 Gaming Desktop Memory Kit also supports XMP 2.0 profiles for no-sweat overclocking, while integrated heat spreaders keep thermals low.', 89, 80, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NDA0MHBjUGFydDEuanBn.jpg', 'September 22, 2022'),
(35, 'PC parts', 'COUGAR Conquer Mid-Tower Case', 'The Conquer Mid-Tower Case from Cougar features a unique open-frame design, which provides it with plenty of room for airflow. It supports up to an ATX motherboard with plenty of room left over for storage drives as well as graphics cards up to 13.8\" long. For cooling, the Conquer has a total of five 120mm fan mounting spots, two located at the front and three at the top. You can even outfit it with liquid cooling for even better performance. Moreover, this case requires some assembly and is mod-friendly for users who wish to customize it to fit their needs.', 400, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjQyNHBjUGFydDIuanBn.jpg', 'September 22, 2022'),
(36, 'PC parts', 'MSI MPG Z490 GAMING PLUS LGA 1200 ATX Motherboard', 'Design a sleek, custom-built PC with the MPG Z490 GAMING PLUS LGA 1200 ATX Motherboard from MSI. this motherboard is ideal for the builder who wants to focus on gaming components, as well as multiple fan- or liquid-cooling systems and RGB headers for a unique and colorful style.  An LGA 1200 socket and Z490 chipset provide compatibility with various Intel Core 10th gen, 11th gen, Pentium Gold, and Celeron processors. Four dual-channel DDR4 memory slots are available, as well as six SATA III ports and two M.2 slots for storage devices. The MPG Z490 is also equipped with Intel Optane technology, which combines your storage drives and memory to speed up performance of your rig. Two PCIe 3.0 x16 and three PCIe x1 slots are available for the installation of a graphics and utility cards. This motherboard is only compatible with Windows 10 (64-bit) operating systems', 139, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTA1MHBjUGFydDMuanBn.jpg', 'September 22, 2022'),
(37, 'PC parts', 'ASUS NVIDIA GeForce RTX 3090Ti TUF Gaming Overclocked Triple Fan 24GB GDDR6X PCIe 4.0 Graphics Card | 90YV0HC1-M0AA00', 'NVIDIA Ampere Streaming Multiprocessors: The all-new Ampere SM brings 2X the FP32 throughput and improved power efficiency. 2nd Generation RT Cores: Experience 2X the throughput of 1st gen RT Cores, plus concurrent RT and shading for a whole new level of ray-tracing performance. 3rd Generation Tensor Cores: Get up to 2X the throughput with structural sparsity and advanced AI algorithms such as DLSS. These cores deliver a massive boost in game performance and all-new AI capabilities. G6X Memory: This is the worldâ€™s fastest graphics memory on the GeForce RTX 3090 Ti. 8K HDR Gaming GPU, Powered by AI: The GeForce RTX 3090 Ti lets you play, capture, and watch your games in brilliant 8K HDR. It features DLSS 8K gaming, GeForce Experience support for 8K HDR game capture, and AV1 decode for efficient playback of 8K HDR streamed video.', 1580, 0, 16, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjgyOHBjUGFydDQuanBn.jpg', 'September 22, 2022'),
(38, 'PC parts', 'MSI GeForce RTX 3050 GAMING X Graphics Card', 'Based on the Ampere architecture and designed to handle the graphical demands of Full HD 1080p gaming, the MSI GeForce RTX 3050 GAMING X Graphics Card brings the power of real-time ray tracing and AI to your PC games. The GPU features 8GB of GDDR6 VRAM and a 128-bit memory interface, offering improved performance and power efficiency over the previous Turing-based generation.', 314, 300, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTQ1NHBjUGFydDUuanBn.jpg', 'September 22, 2022'),
(39, 'PC parts', 'MSI H310M GAMING PLUS motherboard | 911-7B28-001', 'Brand	MSI CPU socket	LGA 1151 RAM memory technology	DDR4 Compatible processors	Intel Celeron, 8th Generation Intel Core, Intel Pentium Gold Chipset type	Intel H310 Memory clock speed	2666 MHz Series	H310M GAMING PLUS Number of USB 2.0 Ports	4 Total USB ports	5', 74, 0, 18, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MTgxOHBjUGFydDYuanBn.jpg', 'September 22, 2022'),
(40, 'PC parts', 'OEM ATX-500A Power Supply For Desktop | ATX-500A', 'OEM ATX-500A Power Supply For Desktop | ATX-500A', 8, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjkyOXBjUGFydDcuanBn.jpg', 'September 22, 2022'),
(41, 'PC parts', 'Thermaltake Case Commander G31 TG ARGB Mid-Tower Chassis | CA-1PI-00M1WN-00', 'MODEL	G31 TG ARGB CASE TYPE	Middle tower DIMENSION (H X W X D)	445.57 x 225 x 471 mm (17.6 x 8.85 x 18.58 inch) NET WEIGHT	7.7 kg / 16.97 lb SIDE PANEL	4mm Tempered Glass x1 COLOR	Exterior & Interior: Black MATERIAL	SPCC COOLING SYSTEM	Front (intake): 1 x 200 x 200 x 30mm Addressable RGB fan (600rpm, 24dBA) Rear (exhaust): 1 x 120 x 120 x 25 mm fan (1000rpm, 16 dBA) DRIVE BAYS -ACCESSIBLE -HIDDEN	 2 x 3.5â€œor 2.5â€ (HDD Rack); 2 x 2.5â€ (HDD Bracket) EXPANSION SLOTS	7 + 2 MOTHERBOARDS	6.7â€ x 6.7â€ (Mini ITX), 9.6â€ x 9.6â€ (Micro ATX), 12â€ x 9.6â€ (ATX) I/O PORT	1 x USB 3.0, 2 x USB 2.0, 1 x HD Audio, 1 x RGB Switch PSU	Standard PS2 PSU (optional) FAN SUPPORT	Front: 3 x 120mm, 2 x 140mm, 2 x 200mm Top: 2 x 120mm, 2 x 140mm Rear: 1 x 120mm, 1 x 140mm', 82, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NDk0OXBjUGFydDguanBn.jpg', 'September 22, 2022'),
(42, 'PC parts', 'ASUS PRIME B360M-A LGA1151 (300 Series) DDR4 HDMI DVI VGA M.2 mATX Motherboard', 'Designed exclusively for 8th generation Intel Core processors to maximize connectivity and speed with integrated dual M.2 slots with Intel Optane Memory compatibility and USB 3.1 Gen2 5X Protection III Hardware-level safeguards provide component longevity and reliability FanXpert 2+ delivers advanced fan control for dynamic cooling ASUS OptiMem improves memory stability and performance by improving trace isolation between PCB layers to maintain signal integrity even at higher frequencies On-board 8-Channel HD Audio provides warm, immersive crystal-clear surround sound', 98, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MzUzNXBjUGFydDkuanBn.jpg', 'September 22, 2022'),
(43, 'PC parts', 'Thermaltake Core P8 Tempered Glass Full Tower Chassis Case | CA-1Q2-00M1WN-00', 'CASE TYPE	Full Tower DIMENSION (H X W X D)	660 x 260 x 626 mm (26 x 10.24 x 24.65 inch) NET WEIGHT	22.6 kg / 49.8 lbs SIDE PANEL	Tempered Glass x 3 (4mm thickness) COLOR	Black MATERIAL	SPCC DRIVE BAYS -ACCESSIBLE -HIDDEN	 1 x 2.5â€™â€™ (with Pump Bracket) 3 x 3.5â€™â€™ or 6 x 2.5â€™â€™ (With HDD Bracket) EXPANSION SLOTS	8 MOTHERBOARDS	6.7â€ x 6.7â€ (Mini ITX), 9.6â€ x 9.6â€ (Micro ATX), 12â€ x 9.6â€ (ATX), 12â€ x 13â€(E-ATX) I/O PORT	1 x USB 3.1 (Gen 2) Type C, 2 x USB 3.0, x 2 USB 2.0, 1 x HD Audio PSU	Standard PS2 PSU (optional) FAN SUPPORT	Front: 4 x 120mm or 3 x 120mm or 2 x 120mm or 1 x 120mm 3 x 140mm or 2 x 140mm or 1 x 140mm Top: 4 x 120mm or 3 x 120mm or 2 x 120mm or 1 x 120mm 3 x 140mm or 2 x 140mm or 1 x 140mm Rear: 1 x 120mm or 2 x 120mm , Right: 4 x 120mm or 3 x 120mm or 2 x 120mm or 1 x 120mm 3 x 140mm or 2 x 140mm or 1 x 140mm Bottom: 4 x 120mm or 3 x 120mm or 2 x 120mm or 1 x 120mm 3 x 140mm or 2 x 140mm or 1 x 140mm', 189, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTY1NnBjUGFydDEwLmpwZw==.jpg', 'September 22, 2022'),
(44, 'Accessories', 'Razer DeathAdder Essential White Edition | RZ01-03850200-R3M1', 'Proven History of Performance Ergonomic Form Multi-Award Winning Tech', 30, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTQ1NGFjY2Vzc29yaWVzMS53ZWJw.webp', 'September 22, 2022'),
(47, 'Accessories', 'Razer Cynosa Lite - Essential Gaming Keyboard | RZ03-02740600-R3M1', 'Soft cushioned gaming-grade keys Single zone Razer Chromaâ„¢ backlighting with 16.8 million customizable color options Razer Synapse 3 enabled 10 key rollover Spill-resistant durable design Fully programmable keys with on-the-fly macro recording Gaming mode option 1000Hz Ultrapolling Approximate size: 457mm / 18 in x 174mm / 6.85 in x 33mm / 1.31 in Approximate weight: 904 g / 1.99 lb', 40, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTU1NWFjY2Vzc29yaWVzMi5qcGc=.jpg', 'September 22, 2022'),
(46, 'Accessories', 'UGreen USB 3.0 Cable Extension Male to Female | US175 | 20827', 'Speed up to 5Gbps * Soft PVC Resistant to Bending, * Multiple Shielding Cable With Robust Connection * Flexible & durable * Signal Booster Fast & Quality Data Transfer * Micro USB Power Port * Plug & Play * Universal Compatibility (Camera, Printer, Computer, Laptopâ€¦)', 35, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjEyMWFjY2Vzc29yaWVzMy5qcGc=.jpg', 'September 22, 2022'),
(48, 'Accessories', 'UGreen Foldable Laptop Lift Stand | LP388 | 90236', '* 3-level height lifting * Adjustable angle screen * Stable & Durable Structure * Hollow heat dissipation * 2 Slide phone Stands * Ergonomic Design * Folding Design * Totally Open Design Increase Airflow and Cool your Laptop * Skid and scratch protection design', 70, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTg1OGFjY2Vzc29yaWVzNC53ZWJw.webp', 'September 22, 2022'),
(49, 'Accessories', 'UGreen Multi-Angle Adjustable, Lifting Laptop Stand | LP339 | 40291', ' Compatible for 11\" to 17.3\" Laptops or Tablets * Maximum load-bearing weight up to 5KG. * Material: Full Aluminium Aloy & Rubber Pad * Easy to use and easy to store in the briefcase. * Slim Design, Non Slip , Collapsible , weight 1150gram * Secure & Stable structure * Ergonomic Design * Folding Design * Totally Open Design Increase Airflow and Cool your Laptop * Skid and scratch protection design', 60, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MDAwMGFjY2Vzc29yaWVzNS5qcGc=.jpg', 'September 22, 2022'),
(50, 'Accessories', 'Razer BlackWidow V3 Mini HyperSpeed - Phantom Edition - Green Switch | RZ03-03892000-R3M1', '65% Form Factor Razer HyperSpeed Wireless Technology Razer Mechanical Switches', 200, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjIyMmFjY2Vzc29yaWVzNi5qcGc=.jpg', 'September 22, 2022'),
(51, 'Accessories', 'Razer Mouse Bungee V3 Chroma | RC21-01520100-R3M1', 'Razer Chroma RGB Underglow Lighting Drag-free cord control Rust-resistant spring arm', 40, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjAyMGFjY2Vzc29yaWVzNy5qcGc=.jpg', 'September 22, 2022'),
(52, 'Accessories', 'UGreen USB 2.0 Hub 4 Ports | CR106 | 20270', '* Input: USB 3.0 A Male * Output: USB 3.0 A Female Ã— 4 * Speed up to 5Gbps * Support 10 TB hard drive * With Micro USB power port * LED light design * Plug & play *Note: HUB is useful for data transfer, not for Charging', 8, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NDE0MWFjY2Vzc29yaWVzOC5qcGc=.jpg', 'September 22, 2022'),
(53, 'Accessories', 'HP OMEN Transceptor 15 Rolltop Backpack | 7MT83AA', 'Protect whatâ€™s important Organization. Optimized. Look good on-the-go Peace-of-mind coverage', 130, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6NTA1MGFjY2Vzc29yaWVzOS53ZWJw.webp', 'September 22, 2022'),
(54, 'Accessories', 'Glowing Cool Professional Game Light Emitting Mouse Pad', '7 kinds of lighting colors: Blue, Red, Green, White, Purple, Cyan, Yellow Steady, rubber base USB powered, plug & play Detachable cable length 1.8M 14 lighting modes (7 colors) Good waterproof performance Soft microfiber surface optimized for both speed and control Pixelprecise targeting and tracking optimized for all mouse sensitivities and sensors', 12, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MDQwNGFjY2Vzc29yaWVzMTAud2VicA==.webp', 'September 22, 2022'),
(55, 'Monitors', 'Dell 34 Inch Ultrawide Curved Monitor | P3421W', 'Size: 34 Inch Resolution: 60 Hz|QHD CURVED Ports:1 Display port | 1 HDMI | USB', 969, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjQyNG1vbml0b3IxLmpwZw==.jpg', 'September 22, 2022'),
(56, 'Monitors', 'Dell Ultrasharp 34-Inch WQHD (3440x1440) Curved IPS USB-C Monitor | U3419W', 'Size: 34 Inch Resolution: 60 Hz|2K CURVED Ports:2 HDMI | 1 Display port |1 audio', 1020, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MjAyMG1vbml0b3IyLmpwZw==.jpg', 'September 22, 2022'),
(57, 'Monitors', 'Dell UltraSharp Curved 34 Inch Ultrawide Monitor | U3421WE', 'Size: 34 Inch Resolution: 60 Hz|QHD CURVED Ports:1 Display port | 1 HDMI | USB', 1260, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MTMxM21vbml0b3IzLndlYnA=.webp', 'September 22, 2022'),
(58, 'Monitors', 'HP EliteDisplay E230t 23-inch Touchscreen IPS Full HD Monitor | E230T', 'HP ELITEDISPLAY| IPS| Touch-Enabled Monitor| Pivot Rotation| LED backlighting  Size: 23\"Touch Resolution: 60 Hz|Full HD Ports: 1 VGA | 1 HDMI | 1 DISPLAY', 350, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwMzAzOjA5MDk6MDcwN21vbml0b3I0LndlYnA=.webp', 'September 22, 2022'),
(59, 'Monitors', 'LG 32\' UltraGear FHD 165Hz HDR10 Monitor | 32GN50T', 'Size:32 Inch  Resolution:165 Hz|Full HD Ports:2 HDMI | 1 Display port', 412, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6MDQwNG1vbml0b3I1LmpwZw==.jpg', 'September 22, 2022'),
(60, 'Monitors', 'LG 24\" Full HD IPS LED Monitor with AMD FreeSync | 24MK430H-B', '24\" FHD (1920x1080) IPS Display AMD FreeSyncâ„¢ Technology Dynamic Action Sync Black Stabilizer On Screen Control Smart Energy Saving', 125, 0, 20, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6MDEwMW1vbml0b3I2LndlYnA=.webp', 'September 22, 2022'),
(61, 'Monitors', 'MSI Optix MAG241C Full HD Non-Glare 1ms 1920 x 1080 144Hz Refresh Rate USB/DP/HDMI Smart Headset Hanger Free Sync 24â€Gaming Curved Monitor - Black | Optix MAG241C', '23.6\" (60cm) Curved Gaming display (1500R) â€“ The best gameplay immersion. FHD High Resolution - Game titles will even look better, displaying more details due to the FHD resolution. 144Hz Refresh Rate â€“ Real smooth gaming. 1ms response time - eliminate screen tearing and choppy frame rates. Gaming OSD App - Create the ultimate viewing settings for your game. True colors â€“ DCI-P3 90% & sRGB 115%. AMD FreeSyncâ„¢ Premium Technology - Tear free, stutter free, fluid gaming. Anti-Flicker and Less Blue Light â€“ game even longer and prevent eye strain and fatique. Frameless design â€“ Ultimate gameplay experience. 178Â° wide view angle', 221, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6NTM1M21vbml0b3I3LmpwZw==.jpg', 'September 22, 2022'),
(62, 'Monitors', 'MSI OPTIX MPG341CQR Non-Glare Ultra Wide 21: 9 Aspect ratio 3440 X 1440 (Uwqhd) 144Hz Refresh Rate 1ms HDR 400 3K Resolution 34\" Freesync Curved Gaming Monitor,Black | OPTIX MPG341CQR', 'Optix MPG341CQR: Curved Gaming display (1800R) â€“ The best gameplay immersion. UWQHD High Resolution - Game titles will even look better, displaying more details due to the UWQHD resolution. GameSense - Conductively enables external game alerts via RGB LED lighting with the hottest competitive online games. 144Hz Refresh Rate â€“ The real smooth gaming. 1ms response time - eliminate screen tearing and choppy frame rates. HDR 400 - Stunning Visuals with the Most Criterion Format. Mystic Light â€“ The ultimate gaming finish. Night Vision - Get the jump on enemies before they even notice you. Gaming OSD App - Create the ultimate viewing settings for your game. Best User Experience â€“ Camera Cradle and Mouse Bungee. Adaptive Sync â€“ prevent screen tearing. Frameless design â€“ Ultimate gameplay experience. 178Â° wide view angle.', 775, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6MzQzNG1vbml0b3I4LmpwZw==.jpg', 'September 22, 2022'),
(63, 'Monitors', 'Samsung 24 Inch Curved Monitor | LC24F390FHMXZN', 'Discover a truly immersive viewing experience with the Samsung monitor curved more deeply than any other. Wrapping around your field of vision like your local iMax theatre screen, the 1,800R screen â€” with its 1,800 mm radius of arc for greater curvature â€” creates a wider field of view, enhances depth perception, and minimises peripheral distractions to draw you deeper in to your content. So whether it is an online movie, a favourite TV show, or a pulse-racing game, Samsungâ€™s deeper screen curve will fully immerse you in all your multi-media content', 133, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6MjUyNW1vbml0b3I5LmpwZw==.jpg', 'September 22, 2022'),
(64, 'Monitors', 'Samsung 27\" LED Smart Monitor | LS27BM500EMXZN', '27\" LED Smart Monitor with Speaker, Wifi, Bluetooth and Remote Control  Screen Size (Class)27    Flat / CurvedFlat    Aspect Ratio16:9    Panel TypeVA    Brightness (Typical)250 cd/ãŽ¡    Brightness (Min)200 cd/ãŽ¡    Contrast Ratio Static3,000:1 (Typ.)    HDR(High Dynamic Range)HDR10    Resolution1,920 x 1,080    Response Time4ms (GTG)    Viewing Angle (H/V)178Â°/178Â°    Color SupportedMax 1B Refresh RateMax 60 Hz', 242, 0, 19, 'MjAyMjIwMjItU2VwU2VwLVRodVRodSAwNDA0OjA5MDk6MjcyN21vbml0b3IxMC53ZWJw.webp', 'September 22, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `adress` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemcat` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderitemarchive`
--

CREATE TABLE `orderitemarchive` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemcat` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `adress` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `adress`, `password`) VALUES
(1, 'joseph', 'awad', 'joseph', 'josephaawadd@gmail.com', 'daroun harissa keserouane', '$2y$10$zk0XIlwNzVIR1ezILViizuz0an03V6YP4d2jN6bRR/1VNAYxJdI/.');

-- --------------------------------------------------------

--
-- Table structure for table `welcomeimage`
--

CREATE TABLE `welcomeimage` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `welcomeimage`
--

INSERT INTO `welcomeimage` (`id`, `url`) VALUES
(1, 'MjAyMjIwMjItU2VwU2VwLU1vbk1vbiAxMTExOjA5MDk6MjgyOHdlbGNvbWVJbWFnZS5wbmc=.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitemarchive`
--
ALTER TABLE `orderitemarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcomeimage`
--
ALTER TABLE `welcomeimage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderitemarchive`
--
ALTER TABLE `orderitemarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `welcomeimage`
--
ALTER TABLE `welcomeimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
