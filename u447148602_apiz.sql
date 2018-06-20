-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-06-2018 a las 12:19:43
-- Versión del servidor: 10.2.15-MariaDB
-- Versión de PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u447148602_apiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparicion_fusion`
--

CREATE TABLE `aparicion_fusion` (
  `id_saga` int(255) NOT NULL,
  `id_fusion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aparicion_fusion`
--

INSERT INTO `aparicion_fusion` (`id_saga`, `id_fusion`) VALUES
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparicion_personaje`
--

CREATE TABLE `aparicion_personaje` (
  `id_saga` int(255) NOT NULL,
  `id_personaje` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aparicion_personaje`
--

INSERT INTO `aparicion_personaje` (`id_saga`, `id_personaje`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 2),
(10, 4),
(11, 4),
(12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparicion_raza`
--

CREATE TABLE `aparicion_raza` (
  `id_saga` int(255) NOT NULL,
  `id_raza` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aparicion_raza`
--

INSERT INTO `aparicion_raza` (`id_saga`, `id_raza`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparicion_transformacion`
--

CREATE TABLE `aparicion_transformacion` (
  `id_saga` int(255) NOT NULL,
  `id_transformacion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aparicion_transformacion`
--

INSERT INTO `aparicion_transformacion` (`id_saga`, `id_transformacion`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 4),
(4, 5),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `correo`, `asunto`, `mensaje`) VALUES
(1, 'admin@admin.com', 'hola', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fusion`
--

CREATE TABLE `fusion` (
  `id_fusion` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `id_personaje1` int(255) NOT NULL,
  `id_personaje2` int(255) NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `metodo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fusion`
--

INSERT INTO `fusion` (`id_fusion`, `nombre`, `imagen`, `id_personaje1`, `id_personaje2`, `descripcion`, `metodo`) VALUES
(1, 'Gogeta', 'https://vignette.wikia.nocookie.net/dragonball/images/a/ab/400025.jpg/revision/latest/scale-to-width-down/350?cb=20160721212813', 1, 2, 'Gogeta is the resulting fusion of two highly powerful Saiyans, Goku and Vegeta, when they perform the Fusion Dance properly. His voice is a dual voice that contains both Goku\'s and Vegeta\'s voices. Gogeta is famous for his amazing power and speed, and is regarded as one of the most powerful characters in the Dragon Ball Z and Dragon Ball GT series. His Potara Fusion counterpart is Vegito.', 'Fusion Dance'),
(2, 'Vegetto', 'https://vignette.wikia.nocookie.net/dragonball/images/3/3e/VegitoDBZEp268.png/revision/latest/scale-to-width-down/350?cb=20101018162914', 1, 2, 'Vegetto, called Vegerot in the Viz English manga, is the immensely powerful result of the fusion between Goku and Vegeta by the use of the Potara Earrings. Vegito is the most powerful character in the Dragon Ball manga. His Fusion Dance counterpart is Gogeta. He was absorbed by Super Buu in the Fusion Saga, and defused back into Vegeta and Goku. In the \"Future\" Trunks Saga of Dragon Ball Super, Goku and Vegeta re-fuse into Vegito in the climax of their battle with Fused Zamasu.', 'Potara Earrings');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `id_personaje` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_raza` int(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `peso` int(255) DEFAULT NULL,
  `altura` int(255) DEFAULT NULL,
  `nacimiento` varchar(255) NOT NULL,
  `muerte` varchar(255) DEFAULT NULL,
  `resurreccion` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `alianzas` varchar(255) NOT NULL,
  `descripcion` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id_personaje`, `nombre`, `id_raza`, `genero`, `imagen`, `peso`, `altura`, `nacimiento`, `muerte`, `resurreccion`, `ocupacion`, `alianzas`, `descripcion`) VALUES
(1, 'Son Goku', 1, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/5/5b/Gokusteppingoutofaspaceship.jpg/revision/latest/scale-to-width-down/224?cb=20150325220848', 62, 175, 'Age 736, Age 737', 'October 12, Age 761, May 26, Age 767, Age 779, Age 780', 'November 2 Age 762, May 8 Age 774)\r\nAge 779, Age 780 (revived anime only)', 'Martial Artist, Firefighter (Goku\'s Fire Brigade), Farmer, Security Guard', 'Dragon Team, Turtle School, Team Universe 7, Time Patrol', 'Son Goku, born Kakarot, is a male Saiyan and the main protagonist of the Dragon Ball meta-series created by Akira Toriyama. Goku is a Saiyan originally sent to Earth as an infant with the mission to destroy it, an accident alters his memory, allowing him to grow up to become Earth\'s greatest defender, as well as the informal leader of the Dragon Team. Throughout his life, he constantly strives and trains to be the greatest warrior possible and to fight stronger opponents, which has kept the Earth and the universe safe from destruction many times.'),
(2, 'Vegeta', 1, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/2/25/Vegeta_DBZ_Ep_222_002.png/revision/latest/scale-to-width-down/212?cb=20170921025547', 56, 164, 'Age 732', 'December 24 Age 762, May 7 Age 774, June Age 779', 'December 24 Age 762, May 8 Age 774,', 'Prince of Planet Vegeta (formerly), High-class Warrior', 'Frieza Force (formerly), Dragon Team, Team Universe 7, Team Universe 6 (baseball only)', 'Vegeta is the prince of the fallen Saiyan race and the deuteragonist of the Dragon Ball series. He is the eldest son of King Vegeta, the older brother of Tarble, the husband of Bulma, the father of Trunks and Bulla, and the ancestor of Vegeta Jr. Alongside Goku, Gohan, Krillin, and Piccolo, he is easily one of the most prominent characters in the series, receiving more character development after being introduced than a number of other characters.\r\n\r\nRegal, egotistical, and full of pride, Vegeta was once a ruthless, cold-blooded warrior and outright killer, but later abandons his role in the Frieza Force, instead opting to remain and live on Earth, fighting alongside the universe\'s most powerful warrior, specifically with the mission to defeat and surpass Goku in power. His character evolves from villain, to anti-hero, to a hero through the course of the series.'),
(3, 'Krillin', 2, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/0/01/KrillinBU01.png/revision/latest?cb=20100515144143', 48, 153, 'October 29, Age 736', 'May 7 Age 753, December 24 Age 762, Age 790, Age 821-889', 'May 9 Age 753, May 3 Age 763, May 8 Age 774, Age 790', 'Martial artist, Police officer, Martial arts teacher', 'Orin Temple (Age 740 - 749), Turtle School (Age 749 - 753), Z Fighters (Age 761 - 790), Team Universe 7, New Turtle School (Age 821)', 'Krillin is a supporting protagonist in the Dragon Ball manga, and the anime series Dragon Ball, Dragon Ball Z, Dragon Ball GT and Dragon Ball Super.\r\n\r\nKrillin had a brief rivalry with Goku when they first met and trained under Master Roshi, but they quickly became lifelong best friends. One of the most powerful and talented martial artists on Earth, Krillin is courageous, a faithful ally and good-natured. He is a prominent Z Fighter, despite usually being overpowered by the major enemies. His short stature and baldness (with the exception of when he grows out his hair in the Majin Buu Saga onwards) aid him in his ability to provide comic relief during tense moments. During the latter half of Dragon Ball Z, he largely retires from fighting, opting to settle down with his family instead, becoming the husband of Android 18 and the father of Marron. However, he returns to his lifestyle as a warrior later on in Dragon Ball Super.'),
(4, 'Piccolo', 3, '?', 'https://vignette.wikia.nocookie.net/dragonball/images/8/84/Piccolo_DBZ_Ep_148_001v2.png/revision/latest/scale-to-width-down/180?cb=20170924030621', 116, 226, 'May 9th, Age 753', 'November 3 Age 762, May 8 Age 774, Age 779, Age 789', 'December 24 Age 762,  May 8 Age 774, Age 779', 'Martial artist, Babysitter (only for Pan), Instructor/Partner', 'Z Fighters, Team Universe 7, Patroller Academy', 'Piccolo Jr., usually just called Piccolo also known as Ma Junior, is a Namekian and also the final child and reincarnation of the Demon King Piccolo, later becoming the reunification of the Nameless Namekian after fusing with Kami. According to Grand Elder Guru, Piccolo, along with Kami and King Piccolo, are part of the Dragon Clan, who were the original creators of the Dragon Balls.\r\n\r\nA wise and cunning warrior who was originally a ruthless enemy of Goku, Piccolo later becomes a permanent member of the Dragon Team, largely due to forming a mutual respect to Goku and even more from forming a close bond with Goku\'s first-born son Gohan.'),
(10, 'Beerus', 4, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/7/7d/BeerusWikia_%283%29.jpg/revision/latest/scale-to-width-down/281?cb=20170626180040', NULL, NULL, 'Over 75 million years before Age 778', NULL, NULL, 'God of Destruction of Universe 7, Instructor/Partner', 'Team Universe 7, Time Patrol ', 'Beerus is the God of Destruction of Universe 7. He is accompanied by his martial arts teacher and attendant, Whis. Beerus\' twin brother is Champa, the God of Destruction of Universe 6.\r\n\r\nBeerus is the main antagonist of the God of Destruction Beerus Saga but becomes a supporting character in later sagas.'),
(11, 'Whis', 5, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/d/da/WhisU7.png/revision/latest/scale-to-width-down/296?cb=20170629161500', NULL, NULL, '??', NULL, NULL, 'Attendant, Martial arts teacher', 'Team Universe 7', 'Whis is the angelic attendant of Universe 7\'s God of Destruction, Beerus, as well as his martial arts teacher. Along with his siblings, he is a child of the Grand Minister. Like all attendants, he is bound to the service of his deity and usually does not leave Beerus unaccompanied.'),
(12, 'Shin', 6, 'Male', 'https://vignette.wikia.nocookie.net/dragonball/images/1/17/KaiSupremeNV.png/revision/latest/scale-to-width-down/350?cb=20120111094205', NULL, NULL, '??', NULL, NULL, 'Supreme Kai of Universe 7', 'Team Universe 7', 'Shin the East Supreme Kai (\"Eastern God of the Kings of the Worlds\"), primarily known just as Supreme Kai (\"God of the Kings of the Worlds\"), is the ruler of the eastern area of both the living and the other worlds in the universe and the Supreme Kai of Universe 7.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planeta`
--

CREATE TABLE `planeta` (
  `id_planeta` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `id_universo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `planeta`
--

INSERT INTO `planeta` (`id_planeta`, `nombre`, `imagen`, `descripcion`, `id_universo`) VALUES
(1, 'Planet Vegeta', 'https://vignette.wikia.nocookie.net/dragonball/images/d/d6/PlanetVegetaBeforeItWasD.png/revision/latest/scale-to-width-down/350?cb=20091127173530', 'Planet Vegeta, formerly known as Planet Plant, is the home planet of Goku, Vegeta, and all other native Saiyans, Tuffles and Plants in the Dragon Ball franchise.\r\n\r\nIn Dragon Ball GT, Baby wishes to Ultimate Shenron for Planet Vegeta to be restored in Earth\'s Solar System. Upon being restored Baby renames the planet to Planet Tuffle, also called New Planet Plant or the Tuffle Planet.\r\n\r\nPlanet Vegeta was not the native planet of the Saiyans, but was in fact Planet Sadala and that they only relocated to Planet Vegeta after Sadala\'s destruction.', 1),
(2, 'Earth', 'https://vignette.wikia.nocookie.net/dragonball/images/e/e2/Earth_DBZ_Ep_26_001.png/revision/latest/scale-to-width-down/323?cb=20170910171630', 'Earth, also called the Dragon World, is a planet inhabited by mainly Earthlings but other races and species also reside on this planet. It is the home of the Z Fighters and the main setting for the entire Dragon Ball series. It is also the main setting to Akira Toriyama\'s two series, Dr. Slump and Nekomajin, as well as Jaco the Galactic Patrolman.\r\n\r\nAccording to Whis, Earth is designated as \"Planet 4032-877\"', 1),
(3, 'Unknown', '', '', 13),
(4, 'Namek', 'https://vignette.wikia.nocookie.net/dragonball/images/4/43/NamekGreenPlanet.png/revision/latest/scale-to-width-down/350?cb=20100731172310', 'Namek is a planet in a trinary star system located at coordinates 9045XY within the Universe 7. It is the home planet of the Nameless Namekian, and Dende, along with other Namekians.\r\n\r\nThe planet was destroyed by the wrath of Frieza on December 24, Age 762. The Namekian people were relocated to New Namek after being refugees on Earth for roughly a year.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id_raza` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `id_planeta` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id_raza`, `nombre`, `imagen`, `descripcion`, `id_planeta`) VALUES
(1, 'Saiyan', 'https://vignette.wikia.nocookie.net/dragonball/images/0/09/Saiyans_DBZ_Ep_20_001.png/revision/latest/scale-to-width-down/350?cb=20170918021139', 'Saiyans (\"People of the Saiya\") are a race of extraterrestrials in the anime and manga Dragon Ball and its adaptive sequels, Dragon Ball Z, Dragon Ball GT and Dragon Ball Super. In the series, the Saiyans from Universe 7 are a naturally aggressive warrior race who were supposedly striving to be the strongest warriors in the universe, while the Saiyans from universe 6 are protectors. Nearly all of the Saiyans from Universe 7 were obliterated by Frieza before the start of the Dragon Ball series.\r\n\r\nThe Saiyans play a central role in the series once it is revealed that the protagonist, Goku, is actually a Saiyan sent to destroy Earth.', 1),
(2, 'Human', 'https://vignette.wikia.nocookie.net/dragonball/images/d/d8/SatanFan%28Jmp%29.png/revision/latest/scale-to-width-down/350?cb=20110222143410', 'Human or Mortal is a general term used in the Dragon Ball series to refer to any being who is not a god, or does not possess god-like ki. Mortals occupy the living world in each universe. Upon death, they proceed to the Other World and are confined either to Hell or Heaven, depending on their actions while alive.\r\n\r\nMortals can however attain the rank of a god such as in those who attain the position of Guardian or even God of Destruction if they are a sufficiently powerful individual. Mortals can also hold the position of Attendant Supreme Kai as shown by Future Trunks who became Future Shin\'s apprentice in the Dragon Ball Super manga and Xeno Trunks who became the assistant to the Supreme Kai of Time Chronoa. Some mortal beings can even obtain the ability to use Godly ki through either transformations or through training under the supervision of an Angel. Saiyans for example can gain it via the Super Saiyan God or Broly God form. A God-like Saiyan can transform into a Super Saiyan God Super Saiyan, with mortal Saiyans taking on the Super Saiyan Blue form, unlike Saiyans who are actual Gods, who take on the Super Saiyan Rosé form. Even with the power of a god, mortal Saiyans are generally still viewed as mortals by proper deities, with some deities even showing fear that mortals could even acquire such power.', 2),
(3, 'Namekian', 'https://vignette.wikia.nocookie.net/dragonball/images/f/f1/Namekians03.png/revision/latest/scale-to-width-down/350?cb=20091121162018', 'Namekians (\"People of Planet Namek\"), also commonly known as Nameks, are a race from Namek. They exist in both Universe 6 and Universe 7. Namekians are able to make their own set of Dragon Balls. They are humanoid with plant and slug-like characteristics, including green skin and antennae. The name \"Namek\" is taken from the word namekuji, which means \"slug\" in Japanese. In the original Japanese versions of the King Piccolo and Piccolo Jr. Sagas of Dragon Ball, the Namekians in the series were known as a Demon Clan and thought of more earthly origin.', 4),
(4, 'Beerus\' Race', 'https://vignette.wikia.nocookie.net/dragonball/images/b/b4/Dragon-ball-super-champa-arc-1.jpg/revision/latest/scale-to-width-down/350?cb=20160919193315', 'Beerus\' race are a species of purple feline humanoids that inhabit the universes. They resemble Sphynx cats, which is Akira Toriyama\'s cat\'s breed. Virtually nothing else is known about them. In Dragon Ball Fusions, they are considered part of the Offworlder race.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saga`
--

CREATE TABLE `saga` (
  `id_saga` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `inicio` varchar(255) NOT NULL,
  `fin` varchar(255) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `episodios` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `saga`
--

INSERT INTO `saga` (`id_saga`, `nombre`, `imagen`, `inicio`, `fin`, `descripcion`, `episodios`) VALUES
(1, 'Dragon Ball', 'https://vignette.wikia.nocookie.net/dragonball/images/1/19/DragonBallAnime.png/revision/latest/scale-to-width-down/180?cb=20130629114117', '26 Febrary 1986', '16 April 1989', 'Dragon Ball is an adaptation of the first portion of Akira Toriyama\'s Dragon Ball manga. It is composed of 153 episodes around 20-minutes long and ran on Fuji TV from February 26, 1986 to April 12, 1989. The series average rating was 21.2%, with its maximum being 29.5% (Episode 47) and its minimum being 13.7% (Episode 110). Despite its success, Dragon Ball was overshadowed by its more action-oriented sequel series, Dragon Ball Z. Dragon Ball depicted Goku\'s childhood, while Dragon Ball Z depicted his adulthood. Both are adapted from the same manga.', 153),
(2, 'Dragon Ball Z', 'https://vignette.wikia.nocookie.net/dragonball/images/7/7a/DragonBallZ.png/revision/latest/scale-to-width-down/180?cb=20100302114734', '26 April 1989', '31 January 1996', 'Dragon Ball Z is the long-running sequel to the anime Dragon Ball. The series is a close adaptation of the second portion of the Dragon Ball manga written and drawn by Akira Toriyama. In the United States, the manga\'s second portion is also titled Dragon Ball Z to prevent confusion for younger readers.', 291),
(3, 'Dragon Ball GT', 'https://vignette.wikia.nocookie.net/dragonball/images/9/92/DBGTLogo.png/revision/latest/scale-to-width-down/180?cb=20091208152739', '7 Febrary 1996', '19 November 1997', 'Dragon Ball GT is the sequel to Dragon Ball Z, whose material is produced only by Toei Animation. The Dragon Ball GT series is the shortest of the Dragon Ball series, consisting of only 64 episodes; as opposed to its predecessor, Dragon Ball Z, which consisted of 291 episodes, Dragon Ball, which consisted of 153, and its successor series Dragon Ball Super, with 131 episodes. Originally intended to span 40 episodes (ending after the Baby Saga), the series continued for another 24 episodes, and is concluded by the TV special Dragon Ball GT: A Hero\'s Legacy.', 64),
(4, 'Dragon Ball Super', 'https://vignette.wikia.nocookie.net/dragonball/images/b/b6/Doragon_s_logo_with_with_outline.png/revision/latest/scale-to-width-down/180?cb=20161106014621', '5 June 2015', '25 March 2018', 'Dragon Ball Super is the fourth anime installment in the Dragon Ball franchise, which ran from July 5th, 2015 to March 25th, 2018 . It is set between Dragon Ball Z episodes 288 and 289 and is the first Dragon Ball television series featuring a new storyline in 18 years since the final episode of Dragon Ball GT in 1997.\r\n\r\nA Dragon Ball Super manga is being produced alongside the anime. The series is developed by Toei, in a similar process to the Dragon Ball, Dragon Ball Z, Dragon Ball GT animes and Dragon Ball Z: Battle of Gods and Dragon Ball Z: Resurrection ‘F’ films. The series plot takes place after the Kid Buu Saga, in between the ten-year gap towards the 28th World Martial Arts Tournament.', 131);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformacion`
--

CREATE TABLE `transformacion` (
  `id_transformacion` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transformacion`
--

INSERT INTO `transformacion` (`id_transformacion`, `nombre`, `imagen`, `descripcion`, `color`) VALUES
(1, 'Super Saiyan 1', 'https://vignette.wikia.nocookie.net/dragonball/images/5/58/GokuSuperSaiyanTransformedAtLast.png/revision/latest/scale-to-width-down/193?cb=20100702081945', 'Super Saiyan is an advanced transformation assumed by members and hybrids of the Saiyan race with sufficient amounts of S-Cells in the Dragon Ball franchise, though there have also been occurrences of other races or individuals taking on their own versions of the form. Earthlings (of Saiyan heritage) in Dragon Ball Online can also assume the transformation by wishing to have their dormant Saiyan powers unlocked.\r\n\r\nThe Super Saiyan form first premiered in April 1991, within chapter 317 of the Dragon Ball manga, entitled \"Life or Death\". It also made its anime debut in 1991, first appearing in Dragon Ball Z episode 95, \"Transformed at Last\". Within Dragon Ball Z and Dragon Ball Super, three further powered up transformations: the second and third forms succeed Super Saiyan, while the premier form also has two additional graded states that focus on power, and also the final form which is superior to the graded forms. The original Super Saiyan form can also be mastered to improve some of its traits and remove some flaws.', '#FCE265'),
(2, 'Super Saiyan 2', 'https://vignette.wikia.nocookie.net/dragonball/images/5/5e/GohanSuperSaiyanIINV.png/revision/latest/scale-to-width-down/280?cb=20100506144945', 'Super Saiyan 2, initially referred to in-universe as Ascended Super Saiyan and at the time of its debut also known as Super Saiyan Fifth Grade, is the direct successor to the first Super Saiyan transformation. It is very similar to the original form in appearance and attainment; however, the power output is far greater, as speed, strength, and energy output all drastically increase.\r\n\r\nGohan is the first person to attain the form in the manga and the anime, and he uses it while fighting against Cell in the Cell Games. Goku, Vegeta and Future Trunks soon follow. Goku trains to achieve it in the Other World, while both Vegeta and Future Trunks reach the form by training on Earth. Caulifla attains this form right after becoming a Super Saiyan and is the first female Super Saiyan 2.', '#D99304'),
(3, 'Super Saiyan 3', 'https://vignette.wikia.nocookie.net/dragonball/images/c/cf/Lol%C2%B2.jpg/revision/latest/scale-to-width-down/350?cb=20160721035942', 'Super Saiyan 3 is the third form of Super Saiyan and the successor to the second transformation. This form extracts every drop of potential from a Saiyan\'s blood. Goku was the first to achieve the form and was able to do so after several years of vigorous training in Other World. Gotenks later achieves this form through the power of Trunks and Goten\'s fusion and Goku\'s example.', '#F1DF4F'),
(4, 'Super Saiyan 4', 'https://vignette.wikia.nocookie.net/dragonball/images/2/21/Goku_DBGT_Ep_54_006.png/revision/latest/scale-to-width-down/250?cb=20171021005415', 'Super Saiyan 4 is a Saiyan transformation which first appeared in Dragon Ball GT. The form is a different branch of transformation from the earlier Super Saiyan forms, such as Super Saiyan, 2 and 3.', '#302E2D'),
(5, 'Super Saiyan Blue', 'https://vignette.wikia.nocookie.net/dragonball/images/7/7b/SSGSS_Goku_DBZ-_Resurrection_F.png/revision/latest/scale-to-width-down/281?cb=20160312024740', 'Super Saiyan Blue, also known as Super Saiyan God Super Saiyan, is a form that combines the power of Super Saiyan God with the first Super Saiyan form.\r\n\r\nThis form can be accessed by absorbing the powers of a god, activating them and then transforming into a Super Saiyan, or through vigorous ki control training with a deity with godly ki and then obtaining that Godly ki for oneself, as seen with Vegeta in the Super anime. This form exceedingly surpasses its predecessor, Super Saiyan God.\r\n\r\nGoku Black\'s version of the form is called Super Saiyan Rosé, which possesses a different hair color due to him being an actual god with natural godly ki.', '#57EDF1'),
(6, 'Super Saiyan God', 'https://vignette.wikia.nocookie.net/dragonball/images/6/68/SSG_profile1.png/revision/latest/scale-to-width-down/350?cb=20170207135550', 'Super Saiyan God is a Saiyan transformation that grants the user godly ki, providing them with a power boost beyond Super Saiyan 3 and its predecessors. It is initially obtained through a ritual involving six righteous Saiyans or special divine training.\r\n\r\nDespite its name, this form is separate from the Super Saiyan transformation line. Trained users can further combine this form with the first Super Saiyan transformation, attaining the more powerful Super Saiyan Blue or Super Saiyan Rosé form (depending on the user\'s status and ki).', '#E33744'),
(7, 'Ultra Instinct', 'https://vignette.wikia.nocookie.net/dragonball/images/b/b9/Ultra_Instinct_Goku.png/revision/latest/scale-to-width-down/350?cb=20180304035118', 'Ultra Instinct (Migatte no Gokui, lit. \"Key of Egoism\") is an extremely powerful transformation that is obtained through the completion of Ultra Instinct, far surpassing the Ultra Instinct -Sign- form.\r\n\r\nThis form is essentially identical to the initial state of Ultra Instinct -Sign-, albeit with the user\'s hair becoming silver in color. The hairstyle is slightly wilder and more solid than normal, having no loose strands. The eyes take on a more stern, defined shape, sporting silver-colored irises and visible pupils. The user gains a complex silver and blue aura consisting of rippling, fire-like energy, complete with sparkling particles of a magenta color. The user\'s muscles seemingly become more defined and slightly grow in size. Upon the user\'s first successful transformation into Ultra Instinct, a \"shell\" of black and bright white covers the body before crumbling away as the hair fades from glowing white to gray. A similar effect has been seen in Super Saiyan Blue. The transformation also rips Goku\'s shirt apart, revealing his slightly swollen and toned-more muscles. In Toriyama\'s artwork and Dragon Ball Heroes, the form possesses base Goku\'s normal hair albeit silver.', '#F0F6F3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformacion_fusion`
--

CREATE TABLE `transformacion_fusion` (
  `id_transformacion` int(255) NOT NULL,
  `id_fusion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transformacion_fusion`
--

INSERT INTO `transformacion_fusion` (`id_transformacion`, `id_fusion`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformacion_personaje`
--

CREATE TABLE `transformacion_personaje` (
  `id_transformacion` int(255) NOT NULL,
  `id_personaje` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transformacion_personaje`
--

INSERT INTO `transformacion_personaje` (`id_transformacion`, `id_personaje`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universo`
--

CREATE TABLE `universo` (
  `id_universo` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `dios` int(255) DEFAULT NULL,
  `angel` int(255) DEFAULT NULL,
  `kaioshin` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universo`
--

INSERT INTO `universo` (`id_universo`, `nombre`, `imagen`, `descripcion`, `dios`, `angel`, `kaioshin`) VALUES
(1, 'Universe 7', 'https://vignette.wikia.nocookie.net/dragonball/images/1/1a/7-0.png/revision/latest/scale-to-width-down/350?cb=20170920125020', 'Universe 7, is the seventh of twelve universes in the Dragon Ball series. It includes planets, stars, a large amount of galaxies , the contents of intergalactic space, and all matter and energy. Universe 7 is linked with Universe 6, creating a twin universe. This universe is where the entirety of the Dragon Ball series takes place, except for the Universe 6 Saga in Dragon Ball Super, when Goku and the others go to a neutral area between Universe 7 and Universe 6, the \"Future\" Trunks Saga taking place between Universe 7 and Universe 10, and the Universe Survival Saga taking place in Zeno\'s Palace for the Zen Exhibition Match and the World of Void for the Tournament of Power between eight of the twelve universes. Universe 7 also ranks as the second from the bottom on the mortal level scale as a 3.18 according to Zeno and Future Zeno.\r\n\r\nThe God of Destruction of Universe 7 is Beerus, the Supreme Kai is Shin, and the Angel is Whis.', 10, 11, 12),
(13, '??', 'https://vignette.wikia.nocookie.net/dragonball/images/6/61/Universe.jpg/revision/latest/scale-to-width-down/180?cb=20160501025407', NULL, 0, 0, 0),
(14, 'Zeno\'s Palace', 'https://vignette.wikia.nocookie.net/dragonball/images/4/48/Zen-Oh%27s_Palace_DBS_Ep_55_001.png/revision/latest/scale-to-width-down/350?cb=20171022200925', 'Zeno\'s Palace exact location is unknown but it resides above a huge jellyfish that is located in between golden clouds and what appears to be outer space. It is also a separate location from the universes and very far away from them, with even the Angels, as stated by Whis, taking two whole days at full speed to do a one-way trip and four entire days for a single roundtrip, and being more reachable through teleportation, such as the Kai Kai used by the Supreme Kais.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contrasena`, `apikey`, `rol`) VALUES
(1, 'admin', 'admin@admin.com', 'xbi564bqxnOUXu8zLe+DIC5Q5c5oeXd+UtQ9M4n6BIU=', '55d2nZkJrfC5G2x9ZlTv1Q2ugeGSWx', 'admin'),
(2, 'antonio', 'antonioalvarezmalagon@gmail.com', 'uZRoSeBi8hcyc7KGC1XP61sBk41HPO8GC9juv7zdx+o=', 'l8RiISv5oBisY1MHySku9MYqcsj0Ru', 'client');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aparicion_fusion`
--
ALTER TABLE `aparicion_fusion`
  ADD PRIMARY KEY (`id_saga`,`id_fusion`);

--
-- Indices de la tabla `aparicion_personaje`
--
ALTER TABLE `aparicion_personaje`
  ADD PRIMARY KEY (`id_saga`,`id_personaje`);

--
-- Indices de la tabla `aparicion_raza`
--
ALTER TABLE `aparicion_raza`
  ADD PRIMARY KEY (`id_saga`,`id_raza`);

--
-- Indices de la tabla `aparicion_transformacion`
--
ALTER TABLE `aparicion_transformacion`
  ADD PRIMARY KEY (`id_saga`,`id_transformacion`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `fusion`
--
ALTER TABLE `fusion`
  ADD PRIMARY KEY (`id_fusion`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id_personaje`);

--
-- Indices de la tabla `planeta`
--
ALTER TABLE `planeta`
  ADD PRIMARY KEY (`id_planeta`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id_raza`);

--
-- Indices de la tabla `saga`
--
ALTER TABLE `saga`
  ADD PRIMARY KEY (`id_saga`);

--
-- Indices de la tabla `transformacion`
--
ALTER TABLE `transformacion`
  ADD PRIMARY KEY (`id_transformacion`);

--
-- Indices de la tabla `transformacion_fusion`
--
ALTER TABLE `transformacion_fusion`
  ADD PRIMARY KEY (`id_transformacion`,`id_fusion`);

--
-- Indices de la tabla `transformacion_personaje`
--
ALTER TABLE `transformacion_personaje`
  ADD PRIMARY KEY (`id_transformacion`,`id_personaje`);

--
-- Indices de la tabla `universo`
--
ALTER TABLE `universo`
  ADD PRIMARY KEY (`id_universo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fusion`
--
ALTER TABLE `fusion`
  MODIFY `id_fusion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id_personaje` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `planeta`
--
ALTER TABLE `planeta`
  MODIFY `id_planeta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
