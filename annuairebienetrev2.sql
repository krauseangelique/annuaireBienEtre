-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 juil. 2024 à 18:07
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annuairebienetrev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `abus`
--

CREATE TABLE `abus` (
  `id` int(11) NOT NULL,
  `commentaire_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `encodage` datetime DEFAULT NULL,
  `internaute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

CREATE TABLE `bloc` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_services`
--

CREATE TABLE `categorie_services` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `en_avant` tinyint(1) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_services`
--

INSERT INTO `categorie_services` (`id`, `nom`, `description`, `en_avant`, `valide`, `image_id`) VALUES
(1, 'barbier', 'barbier description', NULL, NULL, NULL),
(2, 'coiffeur', 'coiffeur description', NULL, NULL, NULL),
(3, 'esthéticienne', 'description du travail d\'esthéticienne', NULL, NULL, NULL),
(4, 'pédicure', 'description du métier de pédicure', NULL, NULL, NULL),
(5, 'balnéothérapie', 'qu\'est ce qu\'une balnéothérapie ', NULL, NULL, NULL),
(6, 'médecines alternatives', 'quelles sont les médecines alternatives que vous trouver sur notre sites : \r\n- acuponcteur\r\n- fleurs de Bach', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_postal`
--

CREATE TABLE `code_postal` (
  `id` int(11) NOT NULL,
  `code_postal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_postal`
--

INSERT INTO `code_postal` (`id`, `code_postal`) VALUES
(1, 'codePostal'),
(2, '5300'),
(3, '5680'),
(4, '5590'),
(5, '6723'),
(6, '6851'),
(7, '1970'),
(8, '4263'),
(9, '4610'),
(10, '4190'),
(11, '4800'),
(12, '4260'),
(13, '7503'),
(14, '6534'),
(15, '7031'),
(16, '7333'),
(17, '6596'),
(18, '6463'),
(19, '6594'),
(20, '7030'),
(21, '1330'),
(22, '1476'),
(23, '5640'),
(24, '5575'),
(25, '6671'),
(26, '6698'),
(27, '6832'),
(28, '6838'),
(29, '6922'),
(30, '4877'),
(31, '4450'),
(32, '4790'),
(33, '4650'),
(34, '4100'),
(35, '7610'),
(36, '7131'),
(37, '7522'),
(38, '6280'),
(39, '7322'),
(40, '7803'),
(41, '6543'),
(42, '7601'),
(43, '6591'),
(44, '6560'),
(45, '1340'),
(46, '1474'),
(47, '5560'),
(48, '5646'),
(49, '5020'),
(50, '5573'),
(51, '5100'),
(52, '6672'),
(53, '6747'),
(54, '6767'),
(55, '6813'),
(56, '6830'),
(57, '6833'),
(58, '6870'),
(59, '1640'),
(60, '9600'),
(61, '4607'),
(62, '4730'),
(63, '4180'),
(64, '4351'),
(65, '4560'),
(66, '4431'),
(67, '4780'),
(68, '4654'),
(69, '7784'),
(70, '7624'),
(71, '7712'),
(72, '7301'),
(73, '6592'),
(74, '1404'),
(75, '1435'),
(76, '5621'),
(77, '5010'),
(78, '5503'),
(79, '5543'),
(80, '5336'),
(81, '6600'),
(82, '6921'),
(83, '6941'),
(84, '6951'),
(85, '6960'),
(86, '4860'),
(87, '4367'),
(88, '4102'),
(89, '4160'),
(90, '4721'),
(91, '4711'),
(92, '4672'),
(93, '4890'),
(94, '4042'),
(95, '4600'),
(96, '6060'),
(97, '6099'),
(98, '7050'),
(99, '7904'),
(100, '1300'),
(101, '5574'),
(102, '5081'),
(103, '6741'),
(104, '6800'),
(105, '6820'),
(106, '6953'),
(107, '4400'),
(108, '4602'),
(109, '4682'),
(110, '4837'),
(111, '4340'),
(112, '4601'),
(113, '4550'),
(114, '4000'),
(115, '4770'),
(116, '4621'),
(117, '7020'),
(118, '7300'),
(119, '7970'),
(120, '7110'),
(121, '6531'),
(122, '7780'),
(123, '7531'),
(124, '7520'),
(125, '1320'),
(126, '5376'),
(127, '5641'),
(128, '5340'),
(129, '6663'),
(130, '6666'),
(131, '6810'),
(132, '6887'),
(133, '4432'),
(134, '4120'),
(135, '4161'),
(136, '4783'),
(137, '4032'),
(138, '4257'),
(139, '4852'),
(140, '4470'),
(141, '7801'),
(142, '7850'),
(143, '6150'),
(144, '7331'),
(145, '7620'),
(146, '7060'),
(147, '7000'),
(148, '7870'),
(149, '7533'),
(150, '7062'),
(151, '7711'),
(152, '7190'),
(153, '7532'),
(154, '1410'),
(155, '1480'),
(156, '5333'),
(157, '5080'),
(158, '3790'),
(159, '6661'),
(160, '6680'),
(161, '6823'),
(162, '6824'),
(163, '6850'),
(164, '6852'),
(165, '4784'),
(166, '4980'),
(167, '4830'),
(168, '4053'),
(169, '4720'),
(170, '7510'),
(171, '7860'),
(172, '7782'),
(173, '6223'),
(174, '1367'),
(175, '1457'),
(176, '1461'),
(177, '5589'),
(178, '5537'),
(179, '5651'),
(180, '6660'),
(181, '6742'),
(182, '4253'),
(183, '4101'),
(184, '4960'),
(185, '4791'),
(186, '4420'),
(187, '6110'),
(188, '6210'),
(189, '6530'),
(190, '7643'),
(191, '6041'),
(192, '6542'),
(193, '7011'),
(194, '1370'),
(195, '1401'),
(196, '1430'),
(197, '5363'),
(198, '5555'),
(199, '5501'),
(200, '5024'),
(201, '5031'),
(202, '5377'),
(203, '3792'),
(204, '6670'),
(205, '6980'),
(206, '4141'),
(207, '4841'),
(208, '4350'),
(209, '4280'),
(210, '4623'),
(211, '4254'),
(212, '4317'),
(213, '4218'),
(214, '7160'),
(215, '7760'),
(216, '6061'),
(217, '7134'),
(218, '7941'),
(219, '7940'),
(220, '7021'),
(221, '6441'),
(222, '7621'),
(223, '1342'),
(224, '1440'),
(225, '1460'),
(226, '5372'),
(227, '5544'),
(228, '5330'),
(229, '5521'),
(230, '4590'),
(231, '4121'),
(232, '4900'),
(233, '4261'),
(234, '4653'),
(235, '7861'),
(236, '6044'),
(237, '6511'),
(238, '7642'),
(239, '6120'),
(240, '7070'),
(241, '1301'),
(242, '1470'),
(243, '1473'),
(244, '5502'),
(245, '5380'),
(246, '5563'),
(247, '5670'),
(248, '6686'),
(249, '6750'),
(250, '6760'),
(251, '6971'),
(252, '4577'),
(253, '4834'),
(254, '4162'),
(255, '4990'),
(256, '4050'),
(257, '4557'),
(258, '4681'),
(259, '6533'),
(260, '6221'),
(261, '7880'),
(262, '6593'),
(263, '7191'),
(264, '6500'),
(265, '6142'),
(266, '7862'),
(267, '7600'),
(268, '7504'),
(269, '6220'),
(270, '1341'),
(271, '5576'),
(272, '5540'),
(273, '5362'),
(274, '5570'),
(275, '5334'),
(276, '6790'),
(277, '6940'),
(278, '1950'),
(279, '4620'),
(280, '4171'),
(281, '4041'),
(282, '7320'),
(283, '7973'),
(284, '7100'),
(285, '7012'),
(286, '7380'),
(287, '5352'),
(288, '5022'),
(289, '5542'),
(290, '6662'),
(291, '6700'),
(292, '6724'),
(293, '6856'),
(294, '6972'),
(295, '4181'),
(296, '4700'),
(297, '4347'),
(298, '4652'),
(299, '7740'),
(300, '6200'),
(301, '6030'),
(302, '7618'),
(303, '7912'),
(304, '6590'),
(305, '6461'),
(306, '1332'),
(307, '1402'),
(308, '5620'),
(309, '6681'),
(310, '6717'),
(311, '6761'),
(312, '6840'),
(313, '4670'),
(314, '4500'),
(315, '4870'),
(316, '4970'),
(317, '4360'),
(318, '7512'),
(319, '6031'),
(320, '7911'),
(321, '7548'),
(322, '6111'),
(323, '7502'),
(324, '6222'),
(325, '1348'),
(326, '1472'),
(327, '5310'),
(328, '5032'),
(329, '5361'),
(330, '6781'),
(331, '4520'),
(332, '4030'),
(333, '4357'),
(334, '4845'),
(335, '4051'),
(336, '7140'),
(337, '7500'),
(338, '7370'),
(339, '7750'),
(340, '6182'),
(341, '7700'),
(342, '7506'),
(343, '7170'),
(344, '5140'),
(345, '5360'),
(346, '6692'),
(347, '6721'),
(348, '6780'),
(349, '6997'),
(350, '4840'),
(351, '4210'),
(352, '4130'),
(353, '4480'),
(354, '7823'),
(355, '7804'),
(356, '7330'),
(357, '6140'),
(358, '7334'),
(359, '7387'),
(360, '7041'),
(361, '7830'),
(362, '1360'),
(363, '5541'),
(364, '5644'),
(365, '5374'),
(366, '5504'),
(367, '5562'),
(368, '3717'),
(369, '6640'),
(370, '6929'),
(371, '1630'),
(372, '4760'),
(373, '4802'),
(374, '4631'),
(375, '4633'),
(376, '4630'),
(377, '6470'),
(378, '7971'),
(379, '7010'),
(380, '7181'),
(381, '7972'),
(382, '7641'),
(383, '5364'),
(384, '5520'),
(385, '6673'),
(386, '6834'),
(387, '6836'),
(388, '6920'),
(389, '6924'),
(390, '6986'),
(391, '1547'),
(392, '4761'),
(393, '4651'),
(394, '4570'),
(395, '4950'),
(396, '4701'),
(397, '7513'),
(398, '7603'),
(399, '6462'),
(400, '7024'),
(401, '7022'),
(402, '7890'),
(403, '7608'),
(404, '7133'),
(405, '5012'),
(406, '5351'),
(407, '5561'),
(408, '3791'),
(409, '6687'),
(410, '6688'),
(411, '6730'),
(412, '4801'),
(413, '4287'),
(414, '4983'),
(415, '4750'),
(416, '4342'),
(417, '4671'),
(418, '4460'),
(419, '4820'),
(420, '7622'),
(421, '6464'),
(422, '7811'),
(423, '7534'),
(424, '6141'),
(425, '7543'),
(426, '7611'),
(427, '7943'),
(428, '7090'),
(429, '6230'),
(430, '7063'),
(431, '6211'),
(432, '1325'),
(433, '1421'),
(434, '1490'),
(435, '5530'),
(436, '5150'),
(437, '6812'),
(438, '6890'),
(439, '6900'),
(440, '6950'),
(441, '6990'),
(442, '1780'),
(443, '4880'),
(444, '4031'),
(445, '4684'),
(446, '4910'),
(447, '7080'),
(448, '7332'),
(449, '6460'),
(450, '7742'),
(451, '7141'),
(452, '7061'),
(453, '5370'),
(454, '5350'),
(455, '5500'),
(456, '5572'),
(457, '5550'),
(458, '5522'),
(459, '5002'),
(460, '5524'),
(461, '3793'),
(462, '8957'),
(463, '6821'),
(464, '6983'),
(465, '4690'),
(466, '4731'),
(467, '4771'),
(468, '6532'),
(469, '7812'),
(470, '6250'),
(471, '6020'),
(472, '7910'),
(473, '7906'),
(474, '7866'),
(475, '1390'),
(476, '1471'),
(477, '5523'),
(478, '5190'),
(479, '5354'),
(480, '5630'),
(481, '5004'),
(482, '5170'),
(483, '6762'),
(484, '6792'),
(485, '6853'),
(486, '6970'),
(487, '4728'),
(488, '4452'),
(489, '4683'),
(490, '4530'),
(491, '4052'),
(492, '4451'),
(493, '7340'),
(494, '6180'),
(495, '7542'),
(496, '7501'),
(497, '6536'),
(498, '6440'),
(499, '7538'),
(500, '6240'),
(501, '7623'),
(502, '6075'),
(503, '7730'),
(504, '6183'),
(505, '7536'),
(506, '6032'),
(507, '7822'),
(508, '5001'),
(509, '5650'),
(510, '5332'),
(511, '5000'),
(512, '5580'),
(513, '6674'),
(514, '6720'),
(515, '6743'),
(516, '6927'),
(517, '6982'),
(518, '4140'),
(519, '4458'),
(520, '4680'),
(521, '7942'),
(522, '6001'),
(523, '6010'),
(524, '6238'),
(525, '7321'),
(526, '7810'),
(527, '7951'),
(528, '7950'),
(529, '1450'),
(530, '1495'),
(531, '5003'),
(532, '6630'),
(533, '6637'),
(534, '6690'),
(535, '6831'),
(536, '1620'),
(537, '4632'),
(538, '4821'),
(539, '4252'),
(540, '4099'),
(541, '4987'),
(542, '4250'),
(543, '4710'),
(544, '7900'),
(545, '7521'),
(546, '7743'),
(547, '6000'),
(548, '6224'),
(549, '7390'),
(550, '1380'),
(551, '1400'),
(552, '5070'),
(553, '5600'),
(554, '5660'),
(555, '3798'),
(556, '6704'),
(557, '6782'),
(558, '6791'),
(559, '6952'),
(560, '4540'),
(561, '4122'),
(562, '4782'),
(563, '4217'),
(564, '4300'),
(565, '7511'),
(566, '7033'),
(567, '7802'),
(568, '7040'),
(569, '7864'),
(570, '6181'),
(571, '6567'),
(572, '7382'),
(573, '7350'),
(574, '7130'),
(575, '7901'),
(576, '1310'),
(577, '1315'),
(578, '1331'),
(579, '5571'),
(580, '5564'),
(581, '8587'),
(582, '6706'),
(583, '6740'),
(584, '4170'),
(585, '4861'),
(586, '4850'),
(587, '4537'),
(588, '4606'),
(589, '4831'),
(590, '4219'),
(591, '4608'),
(592, '4453'),
(593, '7120'),
(594, '7540'),
(595, '7604'),
(596, '7530'),
(597, '7602'),
(598, '7180'),
(599, '6043'),
(600, '7903'),
(601, '1350'),
(602, '1357'),
(603, '5030'),
(604, '5021'),
(605, '6811'),
(606, '6860'),
(607, '6880'),
(608, '6984'),
(609, '6987'),
(610, '4163'),
(611, '4851'),
(612, '4020'),
(613, '4920'),
(614, '7034'),
(615, '7800'),
(616, '6540'),
(617, '7032'),
(618, '6042'),
(619, '6040'),
(620, '7783'),
(621, '5060'),
(622, '5101'),
(623, '5353'),
(624, '6769'),
(625, '4624'),
(626, '4040'),
(627, '4430'),
(628, '7863'),
(629, '7640'),
(630, '7781'),
(631, '1420'),
(632, '1428');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` longtext DEFAULT NULL,
  `cote` int(11) DEFAULT NULL,
  `encodage` datetime DEFAULT NULL,
  `internaute_id` int(11) DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `commune` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `commune`) VALUES
(1, 'ville'),
(2, 'Andenne'),
(3, 'Doische'),
(4, 'Ciney'),
(5, 'Habay'),
(6, 'Paliseul'),
(7, 'Wezembeek-Oppem'),
(8, 'Braives'),
(9, 'Beyne-Heusay'),
(10, 'Ferrières'),
(11, 'Verviers'),
(12, 'Tournai'),
(13, 'Thuin'),
(14, 'Mons'),
(15, 'Saint-Ghislain'),
(16, 'Momignies'),
(17, 'Chimay'),
(18, 'Rixensart'),
(19, 'Genappe'),
(20, 'Mettet'),
(21, 'Gedinne'),
(22, 'Gouvy'),
(23, 'Vielsalm'),
(24, 'Bouillon'),
(25, 'Wellin'),
(26, 'Olne'),
(27, 'Juprelle'),
(28, 'Burg-Reuland'),
(29, 'Herve'),
(30, 'Seraing'),
(31, 'Rumes'),
(32, 'Binche'),
(33, 'Gerpinnes'),
(34, 'Bernissart'),
(35, 'Ath'),
(36, 'Lobbes'),
(37, 'Péruwelz'),
(38, 'Erquelinnes'),
(39, 'Ottignies-Louvain-la-Neuve'),
(40, 'Houyet'),
(41, 'Namur'),
(42, 'Beauraing'),
(43, 'Saint-Léger'),
(44, 'Rouvroy'),
(45, 'Chiny'),
(46, 'Saint-Hubert'),
(47, 'Rhode-Saint-Genèse'),
(48, 'Renaix'),
(49, 'Dalhem'),
(50, 'Raeren'),
(51, 'Hamoir'),
(52, 'Remicourt'),
(53, 'Clavier'),
(54, 'Ans'),
(55, 'Saint-Vith'),
(56, 'Comines-Warneton'),
(57, 'Brunehaut'),
(58, 'Mouscron'),
(59, 'Boussu'),
(60, 'Nivelles'),
(61, 'Mont-Saint-Guibert'),
(62, 'Florennes'),
(63, 'Dinant'),
(64, 'Hastière'),
(65, 'Assesse'),
(66, 'Bastogne'),
(67, 'Durbuy'),
(68, 'Nassogne'),
(69, 'Manhay'),
(70, 'Pepinster'),
(71, 'Crisnée'),
(72, 'Anthisnes'),
(73, 'La Calamine'),
(74, 'Lontzen'),
(75, 'Blegny'),
(76, 'Thimister-Clermont'),
(77, 'Herstal'),
(78, 'Visé'),
(79, 'Charleroi'),
(80, 'Fleurus'),
(81, 'Jurbise'),
(82, 'Leuze-en-Hainaut'),
(83, 'Wavre'),
(84, 'La Bruyère'),
(85, 'Étalle'),
(86, 'Libramont-Chevigny'),
(87, 'Florenville'),
(88, 'Flémalle'),
(89, 'Oupeye'),
(90, 'Baelen'),
(91, 'Awans'),
(92, 'Nandrin'),
(93, 'Liège'),
(94, 'Amblève'),
(95, 'Fléron'),
(96, 'Belœil'),
(97, 'La Louvière'),
(98, 'Beauvechain'),
(99, 'Havelange'),
(100, 'Gesves'),
(101, 'Houffalize'),
(102, 'Herbeumont'),
(103, 'Neupré'),
(104, 'Berloz'),
(105, 'Plombières'),
(106, 'Saint-Georges-sur-Meuse'),
(107, 'Silly'),
(108, 'Anderlues'),
(109, 'Soignies'),
(110, 'Lens'),
(111, 'Écaussinnes'),
(112, 'Waterloo'),
(113, 'Tubize'),
(114, 'Fourons'),
(115, 'Sainte-Ode'),
(116, 'Trois-Ponts'),
(117, 'Limbourg'),
(118, 'Chaudfontaine'),
(119, 'Lessines'),
(120, 'Ramillies'),
(121, 'Walhain'),
(122, 'Ittre'),
(123, 'Rochefort'),
(124, 'Anhée'),
(125, 'Walcourt'),
(126, 'Geer'),
(127, 'Malmedy'),
(128, 'Saint-Nicolas'),
(129, 'Montigny-le-Tilleul'),
(130, 'Les Bons Villers'),
(131, 'Antoing'),
(132, 'Jodoigne'),
(133, 'Rebecq'),
(134, 'Hamois'),
(135, 'Bièvre'),
(136, 'Gembloux'),
(137, 'Somme-Leuze'),
(138, 'La Roche-en-Ardenne'),
(139, 'Sprimont'),
(140, 'Welkenraedt'),
(141, 'Hannut'),
(142, 'Faimes'),
(143, 'Héron'),
(144, 'Chapelle-lez-Herlaimont'),
(145, 'Celles'),
(146, 'Brugelette'),
(147, 'Froidchapelle'),
(148, 'Braine-le-Château'),
(149, 'Onhaye'),
(150, 'Ouffet'),
(151, 'Spa'),
(152, 'Beaumont'),
(153, 'Ham-sur-Heure-Nalinnes'),
(154, 'Le Rœulx'),
(155, 'Fernelmont'),
(156, 'Viroinval'),
(157, 'Bertogne'),
(158, 'Musson'),
(159, 'Virton'),
(160, 'Tenneville'),
(161, 'Modave'),
(162, 'Lierneux'),
(163, 'Tinlot'),
(164, 'Flobecq'),
(165, 'Fontaine-l\'Évêque'),
(166, 'Aubange'),
(167, 'Kraainem'),
(168, 'Comblain-au-Pont'),
(169, 'Quiévrain'),
(170, 'Ohey'),
(171, 'Arlon'),
(172, 'Eupen'),
(173, 'Fexhe-le-Haut-Clocher'),
(174, 'Pecq'),
(175, 'Châtelet'),
(176, 'Frasnes-lez-Anvaing'),
(177, 'Attert'),
(178, 'Neufchâteau'),
(179, 'Huy'),
(180, 'Stavelot'),
(181, 'Oreye'),
(182, 'Éghezée'),
(183, 'Messancy'),
(184, 'Wanze'),
(185, 'Donceel'),
(186, 'Jalhay'),
(187, 'Morlanwelz'),
(188, 'Dour'),
(189, 'Mont-de-l\'Enclus'),
(190, 'Courcelles'),
(191, 'Manage'),
(192, 'Sombreffe'),
(193, 'Érezée'),
(194, 'Burdinne'),
(195, 'Esneux'),
(196, 'Engis'),
(197, 'Honnelles'),
(198, 'Quévy'),
(199, 'Perwez'),
(200, 'Herstappe'),
(201, 'Vaux-sur-Sûre'),
(202, 'Daverdisse'),
(203, 'Linkebeek'),
(204, 'Bullange'),
(205, 'Soumagne'),
(206, 'Sivry-Rance'),
(207, 'Seneffe'),
(208, 'Biévène'),
(209, 'Marchin'),
(210, 'Waimes'),
(211, 'Ellezelles'),
(212, 'Tintigny'),
(213, 'Lincent'),
(214, 'Butgenbach'),
(215, 'Grâce-Hollogne'),
(216, 'Dison'),
(217, 'Braine-le-Comte'),
(218, 'Pont-à-Celles'),
(219, 'Chaumont-Gistoux'),
(220, 'Braine-l\'Alleud'),
(221, 'Court-Saint-Étienne'),
(222, 'Yvoir'),
(223, 'Floreffe'),
(224, 'Libin'),
(225, 'Marche-en-Famenne'),
(226, 'Hotton'),
(227, 'Wemmel'),
(228, 'Aubel'),
(229, 'Theux'),
(230, 'Frameries'),
(231, 'Vresse-sur-Semois'),
(232, 'Messines'),
(233, 'Bassenge'),
(234, 'Aiseau-Presles'),
(235, 'Grez-Doiceau'),
(236, 'Jemeppe-sur-Sambre'),
(237, 'Cerfontaine'),
(238, 'Profondeville'),
(239, 'Villers-le-Bouillet'),
(240, 'Colfontaine'),
(241, 'Farciennes'),
(242, 'Estaimpuis'),
(243, 'Tellin'),
(244, 'Chièvres'),
(245, 'Chastre'),
(246, 'Villers-la-Ville'),
(247, 'Martelange'),
(248, 'Fauvillers'),
(249, 'Drogenbos'),
(250, 'Stoumont'),
(251, 'Quaregnon'),
(252, 'Lasne'),
(253, 'Fosses-la-Ville'),
(254, 'Philippeville'),
(255, 'Couvin'),
(256, 'Amay'),
(257, 'Waremme'),
(258, 'Merbes-le-Château'),
(259, 'Hensies'),
(260, 'La Hulpe'),
(261, 'Incourt'),
(262, 'Espierres-Helchin'),
(263, 'Verlaine'),
(264, 'Wasseiges'),
(265, 'Estinnes'),
(266, 'Orp-Jauche'),
(267, 'Hélécine'),
(268, 'Léglise'),
(269, 'Bertrix'),
(270, 'Rendeux'),
(271, 'Aywaille'),
(272, 'Sambreville'),
(273, 'Meix-devant-Virton');

-- --------------------------------------------------------

--
-- Structure de la table `communepro`
--

CREATE TABLE `communepro` (
  `province` varchar(19) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `commune` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `communepro`
--

INSERT INTO `communepro` (`province`, `code_postal`, `commune`) VALUES
('region', 'codePostal', 'ville'),
('Namur', '5300', 'Andenne'),
('Namur', '5680', 'Doische'),
('Namur', '5590', 'Ciney'),
('Luxembourg', '6723', 'Habay'),
('Luxembourg', '6851', 'Paliseul'),
('Brabant flamand', '1970', 'Wezembeek-Oppem'),
('Liège', '4263', 'Braives'),
('Liège', '4610', 'Beyne-Heusay'),
('Liège', '4190', 'Ferrières'),
('Liège', '4800', 'Verviers'),
('Liège', '4260', 'Braives'),
('Hainaut', '7503', 'Tournai'),
('Hainaut', '6534', 'Thuin'),
('Hainaut', '7031', 'Mons'),
('Hainaut', '7333', 'Saint-Ghislain'),
('Hainaut', '6596', 'Momignies'),
('Hainaut', '6463', 'Chimay'),
('Hainaut', '6594', 'Momignies'),
('Hainaut', '7030', 'Mons'),
('Brabant wallon', '1330', 'Rixensart'),
('Brabant wallon', '1476', 'Genappe'),
('Namur', '5640', 'Mettet'),
('Namur', '5575', 'Gedinne'),
('Luxembourg', '6671', 'Gouvy'),
('Luxembourg', '6698', 'Vielsalm'),
('Luxembourg', '6832', 'Bouillon'),
('Luxembourg', '6838', 'Bouillon'),
('Luxembourg', '6922', 'Wellin'),
('Liège', '4877', 'Olne'),
('Liège', '4450', 'Juprelle'),
('Liège', '4790', 'Burg-Reuland'),
('Liège', '4650', 'Herve'),
('Liège', '4100', 'Seraing'),
('Hainaut', '7610', 'Rumes'),
('Hainaut', '7131', 'Binche'),
('Hainaut', '7522', 'Tournai'),
('Hainaut', '6280', 'Gerpinnes'),
('Hainaut', '7322', 'Bernissart'),
('Hainaut', '7803', 'Ath'),
('Hainaut', '6543', 'Lobbes'),
('Hainaut', '7601', 'Péruwelz'),
('Hainaut', '6591', 'Momignies'),
('Hainaut', '6560', 'Erquelinnes'),
('Brabant wallon', '1340', 'Ottignies-Louvain-la-Neuve'),
('Brabant wallon', '1474', 'Genappe'),
('Namur', '5560', 'Houyet'),
('Namur', '5646', 'Mettet'),
('Namur', '5020', 'Namur'),
('Namur', '5573', 'Beauraing'),
('Namur', '5100', 'Namur'),
('Luxembourg', '6672', 'Gouvy'),
('Luxembourg', '6747', 'Saint-Léger'),
('Luxembourg', '6767', 'Rouvroy'),
('Luxembourg', '6813', 'Chiny'),
('Luxembourg', '6830', 'Bouillon'),
('Luxembourg', '6833', 'Bouillon'),
('Luxembourg', '6870', 'Saint-Hubert'),
('Brabant flamand', '1640', 'Rhode-Saint-Genèse'),
('Flandre orientale', '9600', 'Renaix'),
('Liège', '4607', 'Dalhem'),
('Liège', '4730', 'Raeren'),
('Liège', '4180', 'Hamoir'),
('Liège', '4351', 'Remicourt'),
('Liège', '4560', 'Clavier'),
('Liège', '4431', 'Ans'),
('Liège', '4780', 'Saint-Vith'),
('Liège', '4654', 'Herve'),
('Hainaut', '7784', 'Comines-Warneton'),
('Hainaut', '7624', 'Brunehaut'),
('Hainaut', '7712', 'Mouscron'),
('Hainaut', '7803', 'Ath'),
('Hainaut', '7301', 'Boussu'),
('Hainaut', '6592', 'Momignies'),
('Brabant wallon', '1404', 'Nivelles'),
('Brabant wallon', '1435', 'Mont-Saint-Guibert'),
('Namur', '5621', 'Florennes'),
('Namur', '5010', 'Namur'),
('Namur', '5503', 'Dinant'),
('Namur', '5543', 'Hastière'),
('Namur', '5336', 'Assesse'),
('Luxembourg', '6600', 'Bastogne'),
('Luxembourg', '6921', 'Wellin'),
('Luxembourg', '6941', 'Durbuy'),
('Luxembourg', '6951', 'Nassogne'),
('Luxembourg', '6960', 'Manhay'),
('Liège', '4860', 'Pepinster'),
('Liège', '4367', 'Crisnée'),
('Liège', '4102', 'Seraing'),
('Liège', '4160', 'Anthisnes'),
('Liège', '4721', 'La Calamine'),
('Liège', '4711', 'Lontzen'),
('Liège', '4672', 'Blegny'),
('Liège', '4890', 'Thimister-Clermont'),
('Liège', '4042', 'Herstal'),
('Liège', '4600', 'Visé'),
('Hainaut', '6060', 'Charleroi'),
('Hainaut', '6099', 'Fleurus'),
('Hainaut', '7050', 'Jurbise'),
('Hainaut', '7904', 'Leuze-en-Hainaut'),
('Brabant wallon', '1300', 'Wavre'),
('Namur', '5574', 'Beauraing'),
('Namur', '5081', 'La Bruyère'),
('Luxembourg', '6741', 'Étalle'),
('Luxembourg', '6800', 'Libramont-Chevigny'),
('Luxembourg', '6820', 'Florenville'),
('Luxembourg', '6953', 'Nassogne'),
('Liège', '4400', 'Flémalle'),
('Liège', '4602', 'Visé'),
('Liège', '4682', 'Oupeye'),
('Liège', '4837', 'Baelen'),
('Liège', '4340', 'Awans'),
('Liège', '4601', 'Visé'),
('Liège', '4550', 'Nandrin'),
('Liège', '4000', 'Liège'),
('Liège', '4770', 'Amblève'),
('Liège', '4621', 'Fléron'),
('Hainaut', '7020', 'Mons'),
('Hainaut', '7300', 'Boussu'),
('Hainaut', '7970', 'Belœil'),
('Hainaut', '7110', 'La Louvière'),
('Hainaut', '6531', 'Thuin'),
('Hainaut', '7780', 'Comines-Warneton'),
('Hainaut', '7531', 'Tournai'),
('Hainaut', '7520', 'Tournai'),
('Brabant wallon', '1320', 'Beauvechain'),
('Namur', '5376', 'Havelange'),
('Namur', '5641', 'Mettet'),
('Namur', '5340', 'Gesves'),
('Luxembourg', '6663', 'Houffalize'),
('Luxembourg', '6666', 'Houffalize'),
('Luxembourg', '6810', 'Chiny'),
('Luxembourg', '6887', 'Herbeumont'),
('Liège', '4432', 'Ans'),
('Liège', '4120', 'Neupré'),
('Liège', '4000', 'Liège'),
('Liège', '4161', 'Anthisnes'),
('Liège', '4783', 'Saint-Vith'),
('Liège', '4032', 'Liège'),
('Liège', '4257', 'Berloz'),
('Liège', '4852', 'Plombières'),
('Liège', '4470', 'Saint-Georges-sur-Meuse'),
('Hainaut', '7801', 'Ath'),
('Hainaut', '7850', 'Silly'),
('Hainaut', '6150', 'Anderlues'),
('Hainaut', '7331', 'Saint-Ghislain'),
('Hainaut', '7620', 'Brunehaut'),
('Hainaut', '7060', 'Soignies'),
('Hainaut', '7000', 'Mons'),
('Hainaut', '7870', 'Lens'),
('Hainaut', '7533', 'Tournai'),
('Hainaut', '7062', 'Soignies'),
('Hainaut', '7711', 'Mouscron'),
('Hainaut', '7190', 'Écaussinnes'),
('Hainaut', '7532', 'Tournai'),
('Brabant wallon', '1410', 'Waterloo'),
('Brabant wallon', '1480', 'Tubize'),
('Namur', '5333', 'Assesse'),
('Namur', '5080', 'La Bruyère'),
('Limbourg', '3790', 'Fourons'),
('Luxembourg', '6661', 'Houffalize'),
('Luxembourg', '6680', 'Sainte-Ode'),
('Luxembourg', '6823', 'Florenville'),
('Luxembourg', '6824', 'Florenville'),
('Luxembourg', '6850', 'Paliseul'),
('Luxembourg', '6852', 'Paliseul'),
('Liège', '4784', 'Saint-Vith'),
('Liège', '4980', 'Trois-Ponts'),
('Liège', '4830', 'Limbourg'),
('Liège', '4053', 'Chaudfontaine'),
('Liège', '4720', 'La Calamine'),
('Hainaut', '7510', 'Tournai'),
('Hainaut', '7860', 'Lessines'),
('Hainaut', '7782', 'Comines-Warneton'),
('Hainaut', '6223', 'Fleurus'),
('Brabant wallon', '1367', 'Ramillies'),
('Brabant wallon', '1457', 'Walhain'),
('Brabant wallon', '1461', 'Ittre'),
('Namur', '5589', 'Rochefort'),
('Namur', '5537', 'Anhée'),
('Namur', '5651', 'Walcourt'),
('Luxembourg', '6660', 'Houffalize'),
('Luxembourg', '6742', 'Étalle'),
('Liège', '4253', 'Geer'),
('Liège', '4101', 'Seraing'),
('Liège', '4960', 'Malmedy'),
('Liège', '4791', 'Burg-Reuland'),
('Liège', '4420', 'Saint-Nicolas'),
('Hainaut', '6110', 'Montigny-le-Tilleul'),
('Hainaut', '6210', 'Les Bons Villers'),
('Hainaut', '6530', 'Thuin'),
('Hainaut', '7643', 'Antoing'),
('Hainaut', '6041', 'Charleroi'),
('Hainaut', '6542', 'Lobbes'),
('Hainaut', '7011', 'Mons'),
('Brabant wallon', '1370', 'Jodoigne'),
('Brabant wallon', '1401', 'Nivelles'),
('Brabant wallon', '1430', 'Rebecq'),
('Namur', '5363', 'Hamois'),
('Namur', '5555', 'Bièvre'),
('Namur', '5501', 'Dinant'),
('Namur', '5024', 'Namur'),
('Namur', '5031', 'Gembloux'),
('Namur', '5377', 'Somme-Leuze'),
('Limbourg', '3792', 'Fourons'),
('Luxembourg', '6670', 'Gouvy'),
('Luxembourg', '6980', 'La Roche-en-Ardenne'),
('Liège', '4141', 'Sprimont'),
('Liège', '4841', 'Welkenraedt'),
('Liège', '4350', 'Remicourt'),
('Liège', '4280', 'Hannut'),
('Liège', '4623', 'Fléron'),
('Liège', '4254', 'Geer'),
('Liège', '4317', 'Faimes'),
('Liège', '4218', 'Héron'),
('Hainaut', '7160', 'Chapelle-lez-Herlaimont'),
('Hainaut', '7760', 'Celles'),
('Hainaut', '6061', 'Charleroi'),
('Hainaut', '7134', 'Binche'),
('Hainaut', '7941', 'Brugelette'),
('Hainaut', '7940', 'Brugelette'),
('Hainaut', '7021', 'Mons'),
('Hainaut', '6441', 'Froidchapelle'),
('Hainaut', '7621', 'Brunehaut'),
('Brabant wallon', '1342', 'Ottignies-Louvain-la-Neuve'),
('Brabant wallon', '1440', 'Braine-le-Château'),
('Brabant wallon', '1460', 'Ittre'),
('Namur', '5372', 'Havelange'),
('Namur', '5544', 'Hastière'),
('Namur', '5330', 'Assesse'),
('Namur', '5521', 'Onhaye'),
('Liège', '4590', 'Ouffet'),
('Liège', '4650', 'Herve'),
('Liège', '4121', 'Neupré'),
('Liège', '4900', 'Spa'),
('Liège', '4261', 'Braives'),
('Liège', '4653', 'Herve'),
('Hainaut', '7861', 'Lessines'),
('Hainaut', '6044', 'Charleroi'),
('Hainaut', '6511', 'Beaumont'),
('Hainaut', '7642', 'Antoing'),
('Hainaut', '6120', 'Ham-sur-Heure-Nalinnes'),
('Hainaut', '7070', 'Le Rœulx'),
('Brabant wallon', '1301', 'Wavre'),
('Brabant wallon', '1470', 'Genappe'),
('Brabant wallon', '1473', 'Genappe'),
('Namur', '5502', 'Dinant'),
('Namur', '5380', 'Fernelmont'),
('Namur', '5563', 'Houyet'),
('Namur', '5670', 'Viroinval'),
('Luxembourg', '6686', 'Bertogne'),
('Luxembourg', '6750', 'Musson'),
('Luxembourg', '6760', 'Virton'),
('Luxembourg', '6971', 'Tenneville'),
('Liège', '4780', 'Saint-Vith'),
('Liège', '4577', 'Modave'),
('Liège', '4834', 'Limbourg'),
('Liège', '4162', 'Anthisnes'),
('Liège', '4990', 'Lierneux'),
('Liège', '4050', 'Chaudfontaine'),
('Liège', '4557', 'Tinlot'),
('Liège', '4650', 'Herve'),
('Liège', '4681', 'Oupeye'),
('Hainaut', '6533', 'Thuin'),
('Hainaut', '6221', 'Fleurus'),
('Hainaut', '7880', 'Flobecq'),
('Hainaut', '6593', 'Momignies'),
('Hainaut', '7191', 'Écaussinnes'),
('Hainaut', '6500', 'Beaumont'),
('Hainaut', '6142', 'Fontaine-l\'Évêque'),
('Hainaut', '7862', 'Lessines'),
('Hainaut', '7600', 'Péruwelz'),
('Hainaut', '7504', 'Tournai'),
('Hainaut', '6220', 'Fleurus'),
('Brabant wallon', '1341', 'Ottignies-Louvain-la-Neuve'),
('Namur', '5576', 'Beauraing'),
('Namur', '5540', 'Hastière'),
('Namur', '5362', 'Hamois'),
('Namur', '5570', 'Beauraing'),
('Namur', '5334', 'Assesse'),
('Luxembourg', '6660', 'Houffalize'),
('Luxembourg', '6790', 'Aubange'),
('Luxembourg', '6940', 'Durbuy'),
('Brabant flamand', '1950', 'Kraainem'),
('Liège', '4620', 'Fléron'),
('Liège', '4171', 'Comblain-au-Pont'),
('Liège', '4041', 'Herstal'),
('Hainaut', '7320', 'Bernissart'),
('Hainaut', '7973', 'Belœil'),
('Hainaut', '7100', 'La Louvière'),
('Hainaut', '7012', 'Mons'),
('Hainaut', '7380', 'Quiévrain'),
('Namur', '5352', 'Ohey'),
('Namur', '5022', 'Namur'),
('Namur', '5542', 'Hastière'),
('Luxembourg', '6662', 'Houffalize'),
('Luxembourg', '6700', 'Arlon'),
('Luxembourg', '6724', 'Habay'),
('Luxembourg', '6856', 'Paliseul'),
('Luxembourg', '6972', 'Tenneville'),
('Liège', '4260', 'Braives'),
('Liège', '4181', 'Hamoir'),
('Liège', '4700', 'Eupen'),
('Liège', '4347', 'Fexhe-le-Haut-Clocher'),
('Liège', '4652', 'Herve'),
('Hainaut', '7740', 'Pecq'),
('Hainaut', '6200', 'Châtelet'),
('Hainaut', '6030', 'Charleroi'),
('Hainaut', '7618', 'Rumes'),
('Hainaut', '7912', 'Frasnes-lez-Anvaing'),
('Hainaut', '6590', 'Momignies'),
('Hainaut', '6461', 'Chimay'),
('Brabant wallon', '1332', 'Rixensart'),
('Brabant wallon', '1402', 'Nivelles'),
('Namur', '5620', 'Florennes'),
('Luxembourg', '6681', 'Sainte-Ode'),
('Luxembourg', '6717', 'Attert'),
('Luxembourg', '6761', 'Virton'),
('Luxembourg', '6840', 'Neufchâteau'),
('Liège', '4670', 'Blegny'),
('Liège', '4500', 'Huy'),
('Liège', '4870', 'Olne'),
('Liège', '4970', 'Stavelot'),
('Liège', '4360', 'Oreye'),
('Hainaut', '7512', 'Tournai'),
('Hainaut', '6031', 'Charleroi'),
('Hainaut', '7911', 'Frasnes-lez-Anvaing'),
('Hainaut', '7548', 'Tournai'),
('Hainaut', '6111', 'Montigny-le-Tilleul'),
('Hainaut', '7502', 'Tournai'),
('Hainaut', '6222', 'Fleurus'),
('Brabant wallon', '1300', 'Wavre'),
('Brabant wallon', '1348', 'Mont-Saint-Guibert'),
('Brabant wallon', '1472', 'Genappe'),
('Namur', '5310', 'Éghezée'),
('Namur', '5032', 'Gembloux'),
('Namur', '5361', 'Hamois'),
('Luxembourg', '6781', 'Messancy'),
('Luxembourg', '6830', 'Bouillon'),
('Liège', '4520', 'Wanze'),
('Liège', '4030', 'Liège'),
('Liège', '4357', 'Donceel'),
('Liège', '4845', 'Jalhay'),
('Liège', '4051', 'Chaudfontaine'),
('Hainaut', '7140', 'Morlanwelz'),
('Hainaut', '7500', 'Tournai'),
('Hainaut', '7370', 'Dour'),
('Hainaut', '7750', 'Mont-de-l\'Enclus'),
('Hainaut', '6182', 'Courcelles'),
('Hainaut', '7700', 'Mouscron'),
('Hainaut', '7506', 'Tournai'),
('Hainaut', '7170', 'Manage'),
('Namur', '5140', 'Sombreffe'),
('Namur', '5360', 'Hamois'),
('Luxembourg', '6692', 'Vielsalm'),
('Luxembourg', '6721', 'Habay'),
('Luxembourg', '6780', 'Messancy'),
('Luxembourg', '6997', 'Érezée'),
('Liège', '4840', 'Welkenraedt'),
('Liège', '4210', 'Burdinne'),
('Liège', '4130', 'Esneux'),
('Liège', '4480', 'Engis'),
('Hainaut', '7823', 'Ath'),
('Hainaut', '7804', 'Ath'),
('Hainaut', '7330', 'Saint-Ghislain'),
('Hainaut', '6140', 'Fontaine-l\'Évêque'),
('Hainaut', '7334', 'Saint-Ghislain'),
('Hainaut', '7387', 'Honnelles'),
('Hainaut', '7041', 'Quévy'),
('Hainaut', '7830', 'Silly'),
('Brabant wallon', '1360', 'Perwez'),
('Namur', '5541', 'Hastière'),
('Namur', '5644', 'Mettet'),
('Namur', '5374', 'Havelange'),
('Namur', '5504', 'Dinant'),
('Namur', '5562', 'Houyet'),
('Limbourg', '3717', 'Herstappe'),
('Luxembourg', '6640', 'Vaux-sur-Sûre'),
('Luxembourg', '6929', 'Daverdisse'),
('Brabant flamand', '1630', 'Linkebeek'),
('Liège', '4760', 'Bullange'),
('Liège', '4802', 'Verviers'),
('Liège', '4631', 'Soumagne'),
('Liège', '4633', 'Soumagne'),
('Liège', '4630', 'Soumagne'),
('Hainaut', '6470', 'Sivry-Rance'),
('Hainaut', '7971', 'Belœil'),
('Hainaut', '7010', 'Mons'),
('Hainaut', '7181', 'Seneffe'),
('Hainaut', '7972', 'Belœil'),
('Hainaut', '7641', 'Antoing'),
('Namur', '5364', 'Hamois'),
('Namur', '5520', 'Onhaye'),
('Luxembourg', '6673', 'Gouvy'),
('Luxembourg', '6820', 'Florenville'),
('Luxembourg', '6834', 'Bouillon'),
('Luxembourg', '6836', 'Bouillon'),
('Luxembourg', '6920', 'Wellin'),
('Luxembourg', '6924', 'Wellin'),
('Luxembourg', '6986', 'La Roche-en-Ardenne'),
('Brabant flamand', '1547', 'Biévène'),
('Liège', '4761', 'Bullange'),
('Liège', '4651', 'Herve'),
('Liège', '4570', 'Marchin'),
('Liège', '4950', 'Waimes'),
('Liège', '4701', 'Eupen'),
('Hainaut', '7513', 'Tournai'),
('Hainaut', '7603', 'Péruwelz'),
('Hainaut', '6462', 'Chimay'),
('Hainaut', '7024', 'Mons'),
('Hainaut', '7022', 'Mons'),
('Hainaut', '7890', 'Ellezelles'),
('Hainaut', '7608', 'Péruwelz'),
('Hainaut', '7133', 'Binche'),
('Namur', '5012', 'Namur'),
('Namur', '5351', 'Ohey'),
('Namur', '5561', 'Houyet'),
('Limbourg', '3791', 'Fourons'),
('Luxembourg', '6687', 'Bertogne'),
('Luxembourg', '6688', 'Bertogne'),
('Luxembourg', '6730', 'Tintigny'),
('Liège', '4801', 'Verviers'),
('Liège', '4287', 'Lincent'),
('Liège', '4983', 'Trois-Ponts'),
('Liège', '4730', 'Raeren'),
('Liège', '4750', 'Butgenbach'),
('Liège', '4342', 'Awans'),
('Liège', '4671', 'Blegny'),
('Liège', '4460', 'Grâce-Hollogne'),
('Liège', '4820', 'Dison'),
('Hainaut', '7622', 'Brunehaut'),
('Hainaut', '6464', 'Chimay'),
('Hainaut', '7811', 'Ath'),
('Hainaut', '7534', 'Tournai'),
('Hainaut', '6141', 'Fontaine-l\'Évêque'),
('Hainaut', '7543', 'Tournai'),
('Hainaut', '7611', 'Rumes'),
('Hainaut', '7943', 'Brugelette'),
('Hainaut', '7090', 'Braine-le-Comte'),
('Hainaut', '6230', 'Pont-à-Celles'),
('Hainaut', '7063', 'Soignies'),
('Hainaut', '6211', 'Les Bons Villers'),
('Brabant wallon', '1325', 'Chaumont-Gistoux'),
('Brabant wallon', '1421', 'Braine-l\'Alleud'),
('Brabant wallon', '1490', 'Court-Saint-Étienne'),
('Namur', '5530', 'Yvoir'),
('Namur', '5150', 'Floreffe'),
('Luxembourg', '6812', 'Chiny'),
('Luxembourg', '6890', 'Libin'),
('Luxembourg', '6900', 'Marche-en-Famenne'),
('Luxembourg', '6950', 'Nassogne'),
('Luxembourg', '6990', 'Hotton'),
('Brabant flamand', '1780', 'Wemmel'),
('Liège', '4880', 'Aubel'),
('Liège', '4031', 'Liège'),
('Liège', '4800', 'Verviers'),
('Liège', '4684', 'Oupeye'),
('Liège', '4910', 'Theux'),
('Hainaut', '7080', 'Frameries'),
('Hainaut', '7332', 'Saint-Ghislain'),
('Hainaut', '6460', 'Chimay'),
('Hainaut', '7742', 'Pecq'),
('Hainaut', '7141', 'Morlanwelz'),
('Hainaut', '7061', 'Soignies'),
('Namur', '5370', 'Havelange'),
('Namur', '5350', 'Ohey'),
('Namur', '5500', 'Dinant'),
('Namur', '5020', 'Namur'),
('Namur', '5572', 'Beauraing'),
('Namur', '5550', 'Vresse-sur-Semois'),
('Namur', '5522', 'Onhaye'),
('Namur', '5002', 'Namur'),
('Namur', '5524', 'Onhaye'),
('Limbourg', '3793', 'Fourons'),
('Flandre occidentale', '8957', 'Messines'),
('Luxembourg', '6821', 'Florenville'),
('Luxembourg', '6983', 'La Roche-en-Ardenne'),
('Liège', '4690', 'Bassenge'),
('Liège', '4731', 'Raeren'),
('Liège', '4771', 'Amblève'),
('Hainaut', '6532', 'Thuin'),
('Hainaut', '7812', 'Ath'),
('Hainaut', '6250', 'Aiseau-Presles'),
('Hainaut', '6020', 'Charleroi'),
('Hainaut', '7910', 'Frasnes-lez-Anvaing'),
('Hainaut', '7906', 'Leuze-en-Hainaut'),
('Hainaut', '7866', 'Lessines'),
('Brabant wallon', '1390', 'Grez-Doiceau'),
('Brabant wallon', '1471', 'Genappe'),
('Namur', '5523', 'Onhaye'),
('Namur', '5360', 'Hamois'),
('Namur', '5190', 'Jemeppe-sur-Sambre'),
('Namur', '5354', 'Ohey'),
('Namur', '5630', 'Cerfontaine'),
('Namur', '5004', 'Namur'),
('Namur', '5170', 'Profondeville'),
('Luxembourg', '6762', 'Virton'),
('Luxembourg', '6792', 'Aubange'),
('Luxembourg', '6853', 'Paliseul'),
('Luxembourg', '6970', 'Tenneville'),
('Liège', '4728', 'La Calamine'),
('Liège', '4650', 'Herve'),
('Liège', '4452', 'Juprelle'),
('Liège', '4683', 'Oupeye'),
('Liège', '4530', 'Villers-le-Bouillet'),
('Liège', '4052', 'Chaudfontaine'),
('Liège', '4451', 'Juprelle'),
('Hainaut', '7340', 'Colfontaine'),
('Hainaut', '6180', 'Courcelles'),
('Hainaut', '7542', 'Tournai'),
('Hainaut', '7501', 'Tournai'),
('Hainaut', '6536', 'Thuin'),
('Hainaut', '6440', 'Froidchapelle'),
('Hainaut', '7538', 'Tournai'),
('Hainaut', '6240', 'Farciennes'),
('Hainaut', '7623', 'Brunehaut'),
('Hainaut', '6030', 'Charleroi'),
('Hainaut', '6075', 'Fleurus'),
('Hainaut', '7730', 'Estaimpuis'),
('Hainaut', '6183', 'Courcelles'),
('Hainaut', '7536', 'Tournai'),
('Hainaut', '6032', 'Charleroi'),
('Hainaut', '7822', 'Ath'),
('Namur', '5001', 'Namur'),
('Namur', '5650', 'Walcourt'),
('Namur', '5332', 'Assesse'),
('Namur', '5000', 'Namur'),
('Namur', '5580', 'Rochefort'),
('Luxembourg', '6674', 'Gouvy'),
('Luxembourg', '6720', 'Habay'),
('Luxembourg', '6743', 'Étalle'),
('Luxembourg', '6927', 'Tellin'),
('Luxembourg', '6982', 'La Roche-en-Ardenne'),
('Liège', '4140', 'Sprimont'),
('Liège', '4458', 'Juprelle'),
('Liège', '4680', 'Oupeye'),
('Hainaut', '7942', 'Brugelette'),
('Hainaut', '6001', 'Charleroi'),
('Hainaut', '6010', 'Charleroi'),
('Hainaut', '6238', 'Pont-à-Celles'),
('Hainaut', '7321', 'Bernissart'),
('Hainaut', '7810', 'Ath'),
('Hainaut', '7951', 'Chièvres'),
('Hainaut', '7950', 'Chièvres'),
('Brabant wallon', '1450', 'Chastre'),
('Brabant wallon', '1495', 'Villers-la-Ville'),
('Namur', '5003', 'Namur'),
('Luxembourg', '6630', 'Martelange'),
('Luxembourg', '6637', 'Fauvillers'),
('Luxembourg', '6690', 'Vielsalm'),
('Luxembourg', '6831', 'Bouillon'),
('Brabant flamand', '1620', 'Drogenbos'),
('Liège', '4632', 'Soumagne'),
('Liège', '4821', 'Dison'),
('Liège', '4252', 'Geer'),
('Liège', '4099', 'Awans'),
('Liège', '4987', 'Stoumont'),
('Liège', '4250', 'Geer'),
('Liège', '4710', 'Lontzen'),
('Hainaut', '7900', 'Leuze-en-Hainaut'),
('Hainaut', '6530', 'Thuin'),
('Hainaut', '7521', 'Tournai'),
('Hainaut', '7743', 'Pecq'),
('Hainaut', '6000', 'Charleroi'),
('Hainaut', '6224', 'Fleurus'),
('Hainaut', '7390', 'Quaregnon'),
('Brabant wallon', '1380', 'Lasne'),
('Brabant wallon', '1400', 'Nivelles'),
('Namur', '5330', 'Assesse'),
('Namur', '5070', 'Fosses-la-Ville'),
('Namur', '5600', 'Philippeville'),
('Namur', '5660', 'Couvin'),
('Limbourg', '3798', 'Fourons'),
('Luxembourg', '6690', 'Vielsalm'),
('Luxembourg', '6704', 'Arlon'),
('Luxembourg', '6782', 'Messancy'),
('Luxembourg', '6791', 'Aubange'),
('Luxembourg', '6952', 'Nassogne'),
('Liège', '4540', 'Amay'),
('Liège', '4122', 'Neupré'),
('Liège', '4782', 'Saint-Vith'),
('Liège', '4217', 'Héron'),
('Liège', '4300', 'Waremme'),
('Hainaut', '7511', 'Tournai'),
('Hainaut', '7033', 'Mons'),
('Hainaut', '7802', 'Ath'),
('Hainaut', '7040', 'Quévy'),
('Hainaut', '7864', 'Lessines'),
('Hainaut', '6181', 'Courcelles'),
('Hainaut', '6567', 'Merbes-le-Château'),
('Hainaut', '7382', 'Quiévrain'),
('Hainaut', '7350', 'Hensies'),
('Hainaut', '7130', 'Binche'),
('Hainaut', '7901', 'Leuze-en-Hainaut'),
('Hainaut', '6210', 'Les Bons Villers'),
('Brabant wallon', '1310', 'La Hulpe'),
('Brabant wallon', '1315', 'Incourt'),
('Brabant wallon', '1331', 'Rixensart'),
('Namur', '5571', 'Beauraing'),
('Namur', '5564', 'Houyet'),
('Flandre occidentale', '8587', 'Espierres-Helchin'),
('Luxembourg', '6706', 'Arlon'),
('Luxembourg', '6740', 'Étalle'),
('Luxembourg', '6920', 'Wellin'),
('Liège', '4170', 'Comblain-au-Pont'),
('Liège', '4861', 'Pepinster'),
('Liège', '4850', 'Plombières'),
('Liège', '4630', 'Soumagne'),
('Liège', '4537', 'Verlaine'),
('Liège', '4606', 'Dalhem'),
('Liège', '4831', 'Limbourg'),
('Liège', '4219', 'Wasseiges'),
('Liège', '4608', 'Dalhem'),
('Liège', '4453', 'Juprelle'),
('Hainaut', '7130', 'Binche'),
('Hainaut', '7120', 'Estinnes'),
('Hainaut', '7540', 'Tournai'),
('Hainaut', '7604', 'Péruwelz'),
('Hainaut', '7530', 'Tournai'),
('Hainaut', '7602', 'Péruwelz'),
('Hainaut', '7180', 'Seneffe'),
('Hainaut', '6043', 'Charleroi'),
('Hainaut', '7903', 'Leuze-en-Hainaut'),
('Brabant wallon', '1350', 'Orp-Jauche'),
('Brabant wallon', '1357', 'Hélécine'),
('Namur', '5520', 'Onhaye'),
('Namur', '5030', 'Gembloux'),
('Namur', '5021', 'Namur'),
('Limbourg', '3790', 'Fourons'),
('Luxembourg', '6811', 'Chiny'),
('Luxembourg', '6860', 'Léglise'),
('Luxembourg', '6880', 'Bertrix'),
('Luxembourg', '6984', 'La Roche-en-Ardenne'),
('Luxembourg', '6987', 'Rendeux'),
('Liège', '4163', 'Anthisnes'),
('Liège', '4851', 'Plombières'),
('Liège', '4020', 'Liège'),
('Liège', '4920', 'Aywaille'),
('Hainaut', '7034', 'Mons'),
('Hainaut', '7800', 'Ath'),
('Hainaut', '6540', 'Lobbes'),
('Hainaut', '7032', 'Mons'),
('Hainaut', '6042', 'Charleroi'),
('Hainaut', '6040', 'Charleroi'),
('Hainaut', '7783', 'Comines-Warneton'),
('Brabant wallon', '1348', 'Ottignies-Louvain-la-Neuve'),
('Namur', '5560', 'Houyet'),
('Namur', '5060', 'Sambreville'),
('Namur', '5570', 'Beauraing'),
('Namur', '5101', 'Namur'),
('Namur', '5353', 'Ohey'),
('Luxembourg', '6769', 'Meix-devant-Virton'),
('Liège', '4624', 'Fléron'),
('Liège', '4040', 'Herstal'),
('Liège', '4430', 'Ans'),
('Hainaut', '7863', 'Lessines'),
('Hainaut', '7640', 'Antoing'),
('Hainaut', '7781', 'Comines-Warneton'),
('Brabant wallon', '1420', 'Braine-l\'Alleud'),
('Brabant wallon', '1428', 'Braine-l\'Alleud'),
('Brabant wallon', '1470', 'Genappe');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231217162034', '2024-03-26 17:49:41', 5009),
('DoctrineMigrations\\Version20231217164354', '2024-03-26 17:49:46', 1828),
('DoctrineMigrations\\Version20231217170251', '2024-03-26 17:49:48', 2447),
('DoctrineMigrations\\Version20231217173703', '2024-03-26 17:49:51', 3966),
('DoctrineMigrations\\Version20231217182858', '2024-03-26 17:49:55', 13188),
('DoctrineMigrations\\Version20231217185842', '2024-03-26 17:50:08', 105),
('DoctrineMigrations\\Version20231218115728', '2024-03-26 17:50:08', 23149),
('DoctrineMigrations\\Version20231218155132', '2024-03-26 17:50:32', 6830),
('DoctrineMigrations\\Version20231221150457', '2024-03-26 17:50:39', 7159),
('DoctrineMigrations\\Version20231221173511', '2024-03-26 17:50:46', 1111),
('DoctrineMigrations\\Version20231221174939', '2024-03-26 17:50:47', 3483),
('DoctrineMigrations\\Version20231221175822', '2024-03-26 17:50:51', 2889),
('DoctrineMigrations\\Version20231221182153', '2024-03-26 17:50:54', 5045),
('DoctrineMigrations\\Version20231224135323', '2024-03-26 17:50:59', 5233),
('DoctrineMigrations\\Version20240118172311', '2024-03-26 17:51:05', 634),
('DoctrineMigrations\\Version20240121200826', '2024-03-26 17:51:05', 1021),
('DoctrineMigrations\\Version20240314173913', '2024-03-26 17:56:03', 1249);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `ordre` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL,
  `prestataire_photo_id` int(11) DEFAULT NULL,
  `photo_prestataire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `ordre`, `image`, `prestataire_id`, `prestataire_photo_id`, `photo_prestataire_id`) VALUES
(1, NULL, 'pedi-logo-3-663d3aefe49c1.jpg', 40, NULL, NULL),
(2, NULL, 'medec-logo-1-663d3d5314ba4.jpg', 41, NULL, NULL),
(3, NULL, 'medec-logo-2-663e597d2e8ed.jpg', 44, NULL, NULL),
(4, NULL, 'balneo-logo-3-66432c8fe9a98.jpg', 46, NULL, NULL),
(5, NULL, 'pedi-logo-2-6643819755ba2.jpg', 47, NULL, NULL),
(6, NULL, 'pexels-alexandru-cojanu-828538450-19388385_spa2.jpg', NULL, NULL, NULL),
(7, NULL, 'pexels-arina-krasnikova-6663566_ped.jpg', NULL, NULL, NULL),
(8, NULL, 'pexels-enginakyurt-3065209_coif3.jpg', NULL, NULL, NULL),
(9, NULL, 'pexels-olly-3767397_commerce_internautes.jpg', NULL, NULL, NULL),
(12, NULL, 'balneo-logo-2-6643b2020195f.jpg', 48, NULL, NULL),
(13, NULL, 'pedi-logo-1-66463c4eea1c1.jpg', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`id`, `image_id`, `nom`, `prenom`, `newsletter`) VALUES
(1, NULL, NULL, NULL, NULL),
(9, NULL, 'KRAUSE', 'Angelique', 1),
(13, NULL, 'KRAUSE', 'Angelique', 1),
(14, NULL, 'internaute14', 'Angelique', 1),
(15, NULL, 'internaute15', '15', 1),
(17, NULL, 'Baltazar', 'Romain', 1),
(18, NULL, 'Bizzare', 'Ange', 1),
(19, NULL, 'Berranger', 'Alphonse', 0),
(27, NULL, 'KRAUSE', 'Angelique', 1),
(29, NULL, 'KRAUSE', 'Angelique', 1),
(51, 1, 'internaute50', 'monprenom', 0);

-- --------------------------------------------------------

--
-- Structure de la table `internaute_prestataire`
--

CREATE TABLE `internaute_prestataire` (
  `internaute_id` int(11) NOT NULL,
  `prestataire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `publication` datetime DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `document_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `ordre` int(11) DEFAULT NULL,
  `internaute_id` int(11) DEFAULT NULL,
  `bloc_position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `site_internet` varchar(255) DEFAULT NULL,
  `num_tel` varchar(255) DEFAULT NULL,
  `num_tva` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id`, `nom`, `site_internet`, `num_tel`, `num_tva`) VALUES
(2, NULL, NULL, NULL, NULL),
(3, 'trois', 'http://monsite3.com', '0472650511', '548.230.200'),
(4, 'quatre', 'http://monsite4.com', '0472650511', '203.203.203'),
(5, 'cinq', 'http://leliegeois.com', '0472650511', '666.222.333'),
(6, 'six', 'http://monsite6.com', '0472650511', '203.203.203'),
(7, 'sept', 'http://monsite40.com', '0472650511', '203.203.203'),
(10, 'prestataire10', 'http://monsite10.com', '0472650511', '548.230.200'),
(11, 'prestataire11', 'http://monsite11.com', '0472650511', '203.203.203'),
(12, 'prestataire12', 'http://monsite12.com', '0472650511', '548.230.200'),
(20, 'barbabapa', 'http://monsite20.com', '0472650511', '56'),
(21, 'Barberousse', 'http://monsite21.com', '0472650511', '203.203.203'),
(22, 'Coifasur', 'http://monsite22.com', '0472650511', '203.203.203'),
(23, 'Coifacile', 'http://monsite23.com', '0472650511', '203.203.203'),
(24, 'Décoif', 'http://monsote24.com', '0472650511', '203.203.203'),
(25, 'BarbeBleu', 'http://monsite25.com', '0472650511', '203.203.203'),
(26, 'PRESTA26', 'http://monsite.com', '0472650511', '203.203.203'),
(28, 'presta28', 'http://monsite28.com', '0472650511', '203.203.203'),
(30, 'prestataire30', 'http://monsite.com', '0472650511', '203.203.203'),
(31, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, 'prestataire35', 'http://monsite35.com', '0472650511', '548.230.200'),
(36, 'prestataire36', 'http://monsite36.com', '012548796', '564.231.203'),
(37, 'prestataire37', 'http://monsite50.com', '0472650511', '203.203.203'),
(38, 'prestataire38', 'http://monsite38.com', '0472650511', '548.230.200'),
(39, 'prestataire39', 'http://monsite39.com', '0472650511', '203.203.203'),
(40, 'prestataire40', 'http://monsite40.com', '0472650511', '564.231.203'),
(41, 'prestataire41', 'http://monsite41.com', '0472650511', '203.203.203'),
(42, 'prestataire42', 'http://monsite42.com', '0472650511', '564.231.203'),
(43, 'prestataire43', 'http://monsite43.com', '0472650511', '203.203.203'),
(44, 'prestataire44', 'http://monsite44.com', '0472650511', '564.231.203'),
(45, 'prestataire45', 'http://monsite45.com', '0472650511', '203.203.203'),
(46, 'prestataire46', 'http://monsite46.com', '0472650511', '666.222.333'),
(47, 'prestataire47', 'http://monsite47.com', '0472650511', '203.203.203'),
(48, 'prestataire48', 'http://monsite48.com', '0472650511', '203.203.203'),
(50, 'prestataire49', 'http://monsite.com', '0472650511', '564.231.203');

-- --------------------------------------------------------

--
-- Structure de la table `prestataire_categorie_services`
--

CREATE TABLE `prestataire_categorie_services` (
  `prestataire_id` int(11) NOT NULL,
  `categorie_services_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestataire_categorie_services`
--

INSERT INTO `prestataire_categorie_services` (`prestataire_id`, `categorie_services_id`) VALUES
(3, 2),
(4, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(21, 1),
(22, 2),
(23, 2),
(24, 2),
(25, 1),
(25, 2),
(26, 2),
(28, 2),
(30, 1),
(35, 1),
(36, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(40, 4),
(40, 5),
(41, 6),
(42, 3),
(43, 5),
(44, 6),
(45, 4),
(46, 5),
(47, 4),
(48, 3),
(48, 5),
(50, 4),
(50, 6);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `categorie_services_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `document_pdf` varchar(255) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `affichage_de` datetime DEFAULT NULL,
  `affichage_jusqua` datetime DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `categorie_services_id`, `nom`, `description`, `document_pdf`, `debut`, `fin`, `affichage_de`, `affichage_jusqua`, `prestataire_id`) VALUES
(1, 5, 'promo sur les soins à base d\'aloe vera : 20% durant le mois de mai 2014', 'Les produits à l\'aloe vera vous apportent confort et douceur. Leurs propriétés permettent même aux peaux les plus délicates de profiter de leurs vertus.', NULL, '2024-05-01 14:25:24', '2024-05-31 14:25:24', '2024-04-25 14:25:24', '2024-05-31 19:30:24', 47),
(2, 6, 'promo pentecôte : bon cadeau de 50 € à l\'achat de min 150 € en huiles essentielles  et accessoires associés.', 'Les huiles essentielles vous permettent de vous détendre et vous soignent. Vous retrouverez tout le matériel nécessaire à la confection et l\'embouteillage de vos distillat. Si vous préférez le tout préparé, nos huiles essentielles sont là pour répondre à vos attentes. ', NULL, '2024-05-17 08:25:24', '2024-05-21 19:25:24', '2024-05-12 19:25:24', '2024-05-21 19:25:24', 41),
(3, 3, 'promo soin visage : à l\'achat de 2 produits de la gamme Liserelle, un soin visage d\'une valeur de 60€ vous sera offert pour préparer dignement l\'arrivée du soleil ! ', 'Les produits de la gamme Liserelle contiennent des produits actifs à base de millepertuis qui permettent en plus de soulager les douleurs articulaires de soigner des problèmes cutanés comme la peau sèches. \r\nAssocié à un soin de visage gommant, c\'est le combo gagnant pour accueillir généreusement ce soleil qui pointe à l\'horizon.', NULL, '2024-06-01 08:25:22', '2024-06-30 19:25:22', '2024-05-17 14:52:22', '2024-06-30 14:52:22', 48),
(4, 3, 'promo maillot : recevez une crème de soin anti-repousse après votre épilation.', 'La crème de soin VanHoof permet de reporter votre épilation de 2 à 3 semaines par rapport à votre délais habituel et ce sans mettre en danger votre peau. ', NULL, '2024-06-05 08:06:57', '2024-06-30 21:06:57', '2024-05-23 16:06:57', '2024-06-30 16:06:57', 42),
(5, 3, 'promo du mois de juin :20% sur la gamme soleil pré-traitement', 'Grâce à la gamme soleil pré-traitement votre peau sera mieux protégée contre les rayons du soleil en UVA et UVAB', NULL, '2024-06-01 08:39:22', '2024-05-31 19:39:22', '2024-06-30 18:39:22', '2024-05-23 08:39:22', 42);

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `province`
--

INSERT INTO `province` (`id`, `province`) VALUES
(1, 'region'),
(2, 'Namur'),
(3, 'Luxembourg'),
(4, 'Brabant flamand'),
(5, 'Liège'),
(6, 'Hainaut'),
(7, 'Brabant wallon'),
(8, 'Flandre orientale'),
(9, 'Limbourg'),
(10, 'Flandre occidentale');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `tarif` double DEFAULT NULL,
  `info_complementaire` varchar(255) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `affichage_de` datetime DEFAULT NULL,
  `affichage_jusque` datetime DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `adresse_cp_id` int(11) DEFAULT NULL,
  `adresse_province_id` int(11) DEFAULT NULL,
  `commune_id` int(11) DEFAULT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) DEFAULT NULL,
  `adresse_num` varchar(255) DEFAULT NULL,
  `adresse_rue` varchar(255) DEFAULT NULL,
  `inscription` datetime DEFAULT NULL,
  `type_utilisateur` varchar(255) DEFAULT NULL,
  `nb_essais_infructueux` int(11) DEFAULT NULL,
  `banni` tinyint(1) DEFAULT NULL,
  `inscript_confirmee` tinyint(1) DEFAULT NULL,
  `discr` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `adresse_cp_id`, `adresse_province_id`, `commune_id`, `email`, `roles`, `password`, `adresse_num`, `adresse_rue`, `inscription`, `type_utilisateur`, `nb_essais_infructueux`, `banni`, `inscript_confirmee`, `discr`, `is_verified`) VALUES
(1, NULL, NULL, NULL, 'internaute1@test.com', '[\"ROLE_INTERNAUTE\"]', NULL, NULL, NULL, '2024-03-26 19:27:23', 'internaute', NULL, NULL, NULL, 'internaute', 1),
(2, NULL, NULL, NULL, 'prestataire2@test.com', '[\"ROLE_PRESTATAIRE\"]', NULL, NULL, NULL, '2024-03-26 19:52:40', 'prestataire', NULL, NULL, NULL, 'prestataire', 1),
(3, 12, 5, 2, 'prestataire3@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$m6cNTU2O4vpOe5CEL/idqeUMKZ8E4jStiuacis/2NS4FQ9gSzzHby', '03', 'RUE PIRON', '2024-03-27 17:05:52', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(4, 18, 6, 20, 'prestataire4@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$9hR.CaKZmWx6x94K/AoFZegUT9Epp5mNx6vv83UG1bTo0HG5vIeQu', '03', 'RUE PIRON', '2024-03-27 20:16:02', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(5, 9, 5, 11, 'prestataire5@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$3WEZ6.tu3XxMRp5Z5flgXuwK7qqEJyCKC2IFnxjt8KJd6V78A.5FG', '03', 'RUE PIRON', '2024-03-27 21:40:03', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(6, 19, 2, 18, 'prestataire6@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$7NmaRIUOKEXLrFTa3bW6EuNlzwTohKte8yL73xUnVp3Ki9ReJzRWC', '03', 'RUE PIRON', '2024-03-28 08:57:31', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(7, 14, 2, 19, 'prestataire7@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$oy3kGlEdFkK2D/VPcN272eHDvik5zBlXDNq8aawOtjZ0W9qWraRtu', '03', 'RUE PIRON', '2024-03-28 17:27:05', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(9, 17, 4, 123, 'internaute8@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$6MVr0GSkHknROPWlDXjn2.M6vbBLGHwq5.LzViPoEahNMn1fZ55ka', 'RUE PIRON', '03', '2024-03-28 17:30:20', 'internaute', NULL, NULL, 1, 'internaute', 1),
(10, 232, 5, 19, 'prestataire14@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$7.L0Ybyq573vDMiFb/1IuufrlMgqmUS3OuxbRkE1dAl/cFthqByrK', '03', 'RUE PIRON', '2024-04-13 13:03:27', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(11, 20, 2, 20, 'prestataire11@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$wGCAosVGj1mSO6FHntI3fexwMDn34P.OqXShMh6wm/mmu6MQKYdSC', '03', 'RUE PIRON', '2024-04-13 13:36:34', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(12, 17, 3, 18, 'prestataire12@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$jhCGHQkeJOQom1hgqaYOCeROqtDOMw8nT7yt3t2Ji.k5Mlw6BdLba', '03', 'RUE PIRON', '2024-04-13 13:40:46', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(13, 5, 2, 115, 'internaute13@rtf', '[\"ROLE_INTERNAUTE\"]', '$2y$13$DBXIztbs8A.LlVwYM2Pu6.wGCFqO8WhiR1Mj1g.DzDR/0hoFNM1GK', 'RUE PIRON', '03', '2024-04-14 07:33:12', 'internaute', NULL, NULL, 1, 'internaute', 1),
(14, 14, 4, 121, 'internaute14@test.be', '[\"ROLE_INTERNAUTE\"]', '$2y$13$t4RNiKXP6yN1YaA1bcIi/OSJSJbVcIMhznaIinkWbGYcjsuMy1Ztq', 'RUE PIRON', '03', '2024-04-14 12:08:17', 'internaute', NULL, NULL, 1, 'internaute', 1),
(15, 18, 2, 126, 'internaute15@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$W0kpKx8NY3iM4.3PfgiZ0uLXYIP5ANo7iYpolNiZQrqF2Rq5Cfetu', 'RUE PIRON', '03', '2024-04-14 12:41:39', 'internaute', NULL, NULL, 1, 'internaute', 1),
(17, 15, 6, 12, 'internaute16@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$qcGRXioCAKx5rnzJfKb8auoq7ZvsuA7tIRW3ZV9OMR4jZllnHHcs2', 'rue de la paix', '2', '2024-04-14 12:54:26', 'internaute', NULL, NULL, 1, 'internaute', 1),
(18, 18, 2, 80, 'internaut16@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$Ianc7j0h69fB6rJcGNoGzulhJ29G/rSi/SZv0NfXoCihsHEdSRnbe', 'RUE PIRON', '03', '2024-04-14 13:15:20', 'internaute', NULL, NULL, 1, 'internaute', 1),
(19, 17, 6, 19, 'internaute19@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$nqGgljohinOvhxGqvr2Bruq3ufXrbq724bT4AIY0QAIxCx2efEwmK', '2', 'de la Paix', '2024-04-14 13:23:28', 'internaute', NULL, NULL, 1, 'internaute', 1),
(20, NULL, 1, NULL, 'prestataire20@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$S.wBSM.ugcO.8233wAtJyOeOdi9UweolGHGm7SdA8dAcoXkjUrNZC', NULL, NULL, '2024-04-14 16:03:54', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(21, 2, 2, 41, 'prestataire21@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$L7ueyRw5kRDe0FriZVXh9ePdJFdPN5sUzHy.02vdoQ0GdWAQW3hxS', '56', 'rue de Fer', '2024-04-14 16:40:51', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(22, 15, 3, 20, 'prestataire22@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$rGjzHs.MOwXi.i62omTdBe1RhIQDcr9UXgRQZTiO4IJl8eb8hHYmq', '03', 'RUE PIRON', '2024-04-14 17:33:24', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(23, 20, 4, 20, 'prestataire23@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$BOKktsa4tkKuVIaHMZbDFO4CAARFn1XzM8hTAZvD1zUJuHTv/A9Ze', '03', 'RUE PIRON', '2024-04-14 17:47:08', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(24, 12, 5, 19, 'prestataire24@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$ePM75DeX6o9DYz2JWwALge9wJ68MspBYBMf1iFeGId4IYX6CvTDZy', '03', 'RUE PIRON', '2024-04-14 18:04:25', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(25, 26, 2, 19, 'prestataire25@site.be', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$s9oRbmfj12Vooaz4oA3rteE5dcbOL0Wzrkm/nOk09sKzVBIx3LZO.', '03', 'RUE PIRON', '2024-04-14 18:07:41', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(26, 9, 5, 17, 'prestataire26@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$IepfUD6ZfXxNoT94f2pGCOipeVNZ6qS.ZglYBSMkNmAGpaQ75MwOa', '03', 'RUE PIRON', '2024-04-16 14:51:44', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(27, 18, 2, 111, 'internaute27@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$b0SKsifVEGCO3jR1htIfLOcONiIjWHtGo2QVR9p6iSE7lNW2fYI9W', 'RUE PIRON', '03', '2024-04-19 18:52:20', 'internaute', NULL, NULL, 1, 'internaute', 1),
(28, 94, 8, 115, 'prestataire28@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$TLzSdxdQ9RFi18xE00XZx.FxOLWyRPsSuepNnDuEsiKkr4Msq9Zue', '03', 'RUE PIRON', '2024-04-21 13:55:50', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(29, 18, 2, 120, 'internaute29@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$lqQwMv6DkH2LtjZLqk15MOfs7IOLpBQtq7Q4r2tK935H9OnKV8wNW', '03', 'Pirrrron', '2024-04-21 15:05:33', 'internaute', NULL, NULL, 1, 'internaute', 1),
(30, 20, 9, 128, 'prestataire30@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$3hsbTyKQpyZJXZT65.Wdsu5/cqud9hxZNr46ZA0.3R/aq7T5YF6Pi', '03', 'RUE PIRON', '2024-04-21 15:56:40', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(31, NULL, NULL, NULL, 'prestataire31@test.com', '[\"ROLE_PRESTATAIRE\"]', NULL, NULL, NULL, '2024-04-21 17:27:18', 'prestataire', NULL, NULL, NULL, 'prestataire', 1),
(32, NULL, NULL, NULL, 'prestataire32@test.com', '[\"ROLE_PRESTATAIRE\"]', NULL, NULL, NULL, '2024-04-24 18:14:05', 'prestataire', NULL, NULL, NULL, 'prestataire', 1),
(33, NULL, NULL, NULL, 'prestataire33@test.com', '[\"ROLE_PRESTATAIRE\"]', NULL, NULL, NULL, '2024-04-24 18:50:49', 'prestataire', NULL, NULL, NULL, 'prestataire', 1),
(34, NULL, NULL, NULL, 'prestataire34@test.com', '[\"ROLE_PRESTATAIRE\"]', NULL, NULL, NULL, '2024-04-24 19:25:09', 'prestataire', NULL, NULL, NULL, 'prestataire', 1),
(35, 16, 6, 121, 'prestataire35@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$iHAXXqHpbnjIQgfW1L1upeL4ELbk.VeUd/GPpBKMkw6yPRgR518na', '3', 'rue du Village', '2024-04-27 11:40:22', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(36, 3, 2, 41, 'prestataire36@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$rQeNS6.HNGVF13S94Q/zYe9ZwblDsxJdjCzivOXHR.fIScrHV7Roy', '69', 'rue de la Cité', '2024-04-27 12:24:00', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(37, 19, 2, 158, 'prestataire37@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$FA08K//IIg8qakMLBk2KJeuyElSqhxiY5CinAt8/97T2ATVxbU.lu', '78', 'RUE PIRON', '2024-04-27 13:51:33', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(38, 12, 5, 128, 'prestataire38@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$tae5kLW1A6rVwMDxtGYFKuI1mA93X8mflnA5J3kMr24PoE1kRsy7a', '56', 'RUE PIRON', '2024-04-28 11:42:46', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(39, 19, 2, 121, 'prestataire39@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$xN1yUMnZTcdURK2JdIEzUOm5VE5G9wbQmAaXg3YqBnmj.F2OsoGOu', '23', 'RUE PIRON', '2024-04-28 18:53:30', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(40, NULL, 1, 128, 'prestataire40@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$0bdqdDG15z2rp6GjasS14OyxANAmVvVt.PgnhpS6qeDQ0eUR48JlO', NULL, 'RUE PIRON', '2024-05-09 20:57:36', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(41, 7, 7, 115, 'prestataire41@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$HmHePt5KLzB4HOE3OpMYHeCzTgGDXDAgBeqyHUwhBFwLiQjHm.IxS', '03', 'RUE de la station', '2024-05-09 21:14:41', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(42, 16, 6, 143, 'prestataire42@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$0W1QsTF2BCYUgKLWpxiBoeKJfiNgQNCW87ygsNGvWPEVTlbngX8DW', '23', 'rue du village', '2024-05-10 15:54:24', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(43, 203, 8, 7, 'prestataire43@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$pIhPZLOBucg5WxhKQUiahuE0e1x7RuOS.YxwWOtQa6g1zZZuOBT.i', '21', 'RUE PIRON', '2024-05-10 16:08:28', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(44, 9, 5, 127, 'prestataire44@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$eRLxNpfVq8V3.lBT9QKnBeFLj0o0abxMbPu0evv3tvqx8S/h91qu.', '56', 'RUE PIRON', '2024-05-10 17:24:22', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(45, 20, 6, 119, 'prestataire45@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$X94vz/iU.UIWqdPph60/FeJgSql7CSXu43IIi3tmT6kwY5zuTBoUm', 'RUE PIRON', 'RUE PIRON', '2024-05-12 18:50:52', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(46, 18, 5, 128, 'prestataire46@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$irSZr/KOAuf3wnfBwFEaJeL7GsgnOlAJFKsOVLMwF36G3/uyhLPUe', '21', 'RUE PIRON', '2024-05-14 09:16:46', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(47, 15, 1, 121, 'prestataire47@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$OO6wqRtYbwMFO8SAoAxwZOVJGmewjMjxGKrzX.riAp9tGDdrKdsIq', '37', 'RUE PIRON', '2024-05-14 14:52:06', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(48, 19, 3, 116, 'prestataire48@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$pZQZRj7JRYdABfYzQ47bHO9uh62JPZS14icdYcL6UtTxJL44mVnv2', '56', 'RUE PIRON', '2024-05-14 18:45:47', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(49, NULL, NULL, NULL, 'contact_admin@bienetre.com', '[\"ROLE_ADMIN\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', 1),
(50, 19, 3, 125, 'prestataire49@test.com', '[\"ROLE_PRESTATAIRE\"]', '$2y$13$k6CjG6peMYFcYm3NNF3OCePsK0pssQ2q5U.DhH2QhyolNz8MwSUTW', '21', 'RUE PIRON', '2024-05-16 17:01:53', 'prestataire', NULL, NULL, 1, 'prestataire', 1),
(51, 15, 2, 17, 'internaute50@test.com', '[\"ROLE_INTERNAUTE\"]', '$2y$13$degJWQWUcmFMeQYDJLTO3uV3cVIqD7jqdnCe7EiQSQhoOLK4XzCZa', '6', 'Pirrrron', '2024-05-16 17:05:57', 'internaute', NULL, NULL, 1, 'internaute', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abus`
--
ALTER TABLE `abus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72C9FD01BA9CD190` (`commentaire_id`),
  ADD KEY `IDX_72C9FD01CAF41882` (`internaute_id`);

--
-- Index pour la table `bloc`
--
ALTER TABLE `bloc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_services`
--
ALTER TABLE `categorie_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4BB5A0033DA5256D` (`image_id`);

--
-- Index pour la table `code_postal`
--
ALTER TABLE `code_postal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_67F068BCCAF41882` (`internaute_id`),
  ADD KEY `IDX_67F068BCBE3DB2B7` (`prestataire_id`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045FBE3DB2B7` (`prestataire_id`),
  ADD KEY `IDX_C53D045FBA6A6AFF` (`prestataire_photo_id`),
  ADD KEY `IDX_C53D045FA60EC4EA` (`photo_prestataire_id`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6C8E97CC3DA5256D` (`image_id`);

--
-- Index pour la table `internaute_prestataire`
--
ALTER TABLE `internaute_prestataire`
  ADD PRIMARY KEY (`internaute_id`,`prestataire_id`),
  ADD KEY `IDX_D906EC3ACAF41882` (`internaute_id`),
  ADD KEY `IDX_D906EC3ABE3DB2B7` (`prestataire_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_462CE4F5CAF41882` (`internaute_id`),
  ADD KEY `IDX_462CE4F5C40DD82E` (`bloc_position_id`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestataire_categorie_services`
--
ALTER TABLE `prestataire_categorie_services`
  ADD PRIMARY KEY (`prestataire_id`,`categorie_services_id`),
  ADD KEY `IDX_E453C499BE3DB2B7` (`prestataire_id`),
  ADD KEY `IDX_E453C499710B80C8` (`categorie_services_id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C11D7DD1710B80C8` (`categorie_services_id`),
  ADD KEY `IDX_C11D7DD1BE3DB2B7` (`prestataire_id`);

--
-- Index pour la table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C27C9369BE3DB2B7` (`prestataire_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D64985CF3708` (`adresse_cp_id`),
  ADD KEY `IDX_8D93D6492748E8A5` (`adresse_province_id`),
  ADD KEY `IDX_8D93D649131A4F72` (`commune_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abus`
--
ALTER TABLE `abus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bloc`
--
ALTER TABLE `bloc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_services`
--
ALTER TABLE `categorie_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `code_postal`
--
ALTER TABLE `code_postal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abus`
--
ALTER TABLE `abus`
  ADD CONSTRAINT `FK_72C9FD01BA9CD190` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire` (`id`),
  ADD CONSTRAINT `FK_72C9FD01CAF41882` FOREIGN KEY (`internaute_id`) REFERENCES `internaute` (`id`);

--
-- Contraintes pour la table `categorie_services`
--
ALTER TABLE `categorie_services`
  ADD CONSTRAINT `FK_4BB5A0033DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BCBE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`),
  ADD CONSTRAINT `FK_67F068BCCAF41882` FOREIGN KEY (`internaute_id`) REFERENCES `internaute` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FA60EC4EA` FOREIGN KEY (`photo_prestataire_id`) REFERENCES `prestataire` (`id`),
  ADD CONSTRAINT `FK_C53D045FBA6A6AFF` FOREIGN KEY (`prestataire_photo_id`) REFERENCES `prestataire` (`id`),
  ADD CONSTRAINT `FK_C53D045FBE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`);

--
-- Contraintes pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD CONSTRAINT `FK_6C8E97CC3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_6C8E97CCBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `internaute_prestataire`
--
ALTER TABLE `internaute_prestataire`
  ADD CONSTRAINT `FK_D906EC3ABE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D906EC3ACAF41882` FOREIGN KEY (`internaute_id`) REFERENCES `internaute` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `FK_462CE4F5C40DD82E` FOREIGN KEY (`bloc_position_id`) REFERENCES `bloc` (`id`),
  ADD CONSTRAINT `FK_462CE4F5CAF41882` FOREIGN KEY (`internaute_id`) REFERENCES `internaute` (`id`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `FK_60A26480BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prestataire_categorie_services`
--
ALTER TABLE `prestataire_categorie_services`
  ADD CONSTRAINT `FK_E453C499710B80C8` FOREIGN KEY (`categorie_services_id`) REFERENCES `categorie_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E453C499BE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_C11D7DD1710B80C8` FOREIGN KEY (`categorie_services_id`) REFERENCES `categorie_services` (`id`),
  ADD CONSTRAINT `FK_C11D7DD1BE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `FK_C27C9369BE3DB2B7` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataire` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649131A4F72` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`id`),
  ADD CONSTRAINT `FK_8D93D6492748E8A5` FOREIGN KEY (`adresse_province_id`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `FK_8D93D64985CF3708` FOREIGN KEY (`adresse_cp_id`) REFERENCES `code_postal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
