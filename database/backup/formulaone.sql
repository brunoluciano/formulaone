-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2019 às 17:48
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulaone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bacen` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `nome`, `nome_pt`, `sigla`, `bacen`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Brazil', 'Brasil', 'BR', 1058, '/image/paises/Brasil.png', NULL, NULL),
(2, 'Afghanistan', 'Afeganistão', 'AF', 132, '/image/paises/Afeganistão.png', NULL, NULL),
(3, 'Albania', 'Albânia', 'AL', 175, '/image/paises/Albânia.png', NULL, NULL),
(4, 'Algeria', 'Argélia', 'DZ', 590, '/image/paises/Argélia.png', NULL, NULL),
(5, 'American Samoa', 'Samoa Americana', 'AS', 6912, '/image/paises/Samoa Americana.png', NULL, NULL),
(6, 'Andorra', 'Andorra', 'AD', 370, '/image/paises/Andorra.png', NULL, NULL),
(7, 'Angola', 'Angola', 'AO', 400, '/image/paises/Angola.png', NULL, NULL),
(8, 'Anguilla', 'Anguilla', 'AI', 418, '/image/paises/Anguilla.png', NULL, NULL),
(9, 'Antarctica', 'Antártida', 'AQ', 3596, '/image/paises/Antártida.png', NULL, NULL),
(10, 'Antigua and Barbuda', 'Antigua e Barbuda', 'AG', 434, '/image/paises/Antigua e Barbuda.png', NULL, NULL),
(11, 'Argentina', 'Argentina', 'AR', 639, '/image/paises/Argentina.png', NULL, NULL),
(12, 'Armenia', 'Armênia, Republica da', 'AM', 647, '/image/paises/Armênia, Republica da.png', NULL, NULL),
(13, 'Aruba', 'Aruba', 'AW', 655, '/image/paises/Aruba.png', NULL, NULL),
(14, 'Australia', 'Austrália', 'AU', 698, '/image/paises/Austrália.png', NULL, NULL),
(15, 'Austria', 'Áustria', 'AT', 728, '/image/paises/Áustria.png', NULL, NULL),
(16, 'Azerbaijan', 'Azerbaijão', 'AZ', 736, '/image/paises/Azerbaijão.png', NULL, NULL),
(17, 'Bahamas', 'Bahamas, Ilhas', 'BS', 779, '/image/paises/Bahamas, Ilhas.png', NULL, NULL),
(18, 'Bahrain', 'Bahrein', 'BH', 809, '/image/paises/Bahrein.png', NULL, NULL),
(19, 'Bangladesh', 'Bangladesh', 'BD', 817, '/image/paises/Bangladesh.png', NULL, NULL),
(20, 'Barbados', 'Barbados', 'BB', 833, '/image/paises/Barbados.png', NULL, NULL),
(21, 'Belarus', 'Belarus, Republica da', 'BY', 850, '/image/paises/Belarus, Republica da.png', NULL, NULL),
(22, 'Belgium', 'Bélgica', 'BE', 876, '/image/paises/Bélgica.png', NULL, NULL),
(23, 'Belize', 'Belize', 'BZ', 884, '/image/paises/Belize.png', NULL, NULL),
(24, 'Benin', 'Benin', 'BJ', 2291, '/image/paises/Benin.png', NULL, NULL),
(25, 'Bermuda', 'Bermudas', 'BM', 906, '/image/paises/Bermudas.png', NULL, NULL),
(26, 'Bhutan', 'Butão', 'BT', 1198, '/image/paises/Butão.png', NULL, NULL),
(27, 'Bolivia', 'Bolívia', 'BO', 973, '/image/paises/Bolívia.png', NULL, NULL),
(28, 'Bosnia and Herzegowina', 'Bósnia-herzegovina (Republica da)', 'BA', 981, '/image/paises/Bósnia-herzegovina (Republica da).png', NULL, NULL),
(29, 'Botswana', 'Botsuana', 'BW', 1015, '/image/paises/Botsuana.png', NULL, NULL),
(30, 'Bouvet Island', 'Bouvet, Ilha', 'BV', 1023, '/image/paises/Bouvet, Ilha.png', NULL, NULL),
(31, 'British Indian Ocean Territory', 'Território Britânico do Oceano Indico', 'IO', 7820, '/image/paises/Território Britânico do Oceano Indico.png', NULL, NULL),
(32, 'Brunei Darussalam', 'Brunei', 'BN', 1082, '/image/paises/Brunei.png', NULL, NULL),
(33, 'Bulgaria', 'Bulgária, Republica da', 'BG', 1112, '/image/paises/Bulgária, Republica da.png', NULL, NULL),
(34, 'Burkina Faso', 'Burkina Faso', 'BF', 310, '/image/paises/Burkina Faso.png', NULL, NULL),
(35, 'Burundi', 'Burundi', 'BI', 1155, '/image/paises/Burundi.png', NULL, NULL),
(36, 'Cambodia', 'Camboja', 'KH', 1414, '/image/paises/Camboja.png', NULL, NULL),
(37, 'Cameroon', 'Camarões', 'CM', 1457, '/image/paises/Camarões.png', NULL, NULL),
(38, 'Canada', 'Canadá', 'CA', 1490, '/image/paises/Canadá.png', NULL, NULL),
(39, 'Cape Verde', 'Cabo Verde, Republica de', 'CV', 1279, '/image/paises/Cabo Verde, Republica de.png', NULL, NULL),
(40, 'Cayman Islands', 'Cayman, Ilhas', 'KY', 1376, '/image/paises/Cayman, Ilhas.png', NULL, NULL),
(41, 'Central African Republic', 'Republica Centro-Africana', 'CF', 6408, '/image/paises/Republica Centro-Africana.png', NULL, NULL),
(42, 'Chad', 'Chade', 'TD', 7889, '/image/paises/Chade.png', NULL, NULL),
(43, 'Chile', 'Chile', 'CL', 1589, '/image/paises/Chile.png', NULL, NULL),
(44, 'China', 'China', 'CN', 1600, '/image/paises/China.png', NULL, NULL),
(45, 'Christmas Island', 'Christmas, Ilha (Navidad)', 'CX', 5118, '/image/paises/Christmas, Ilha (Navidad).png', NULL, NULL),
(46, 'Cocos (Keeling) Islands', 'Cocos (Keeling), Ilhas', 'CC', 1651, '/image/paises/Cocos (Keeling), Ilhas.png', NULL, NULL),
(47, 'Colombia', 'Colômbia', 'CO', 1694, '/image/paises/Colômbia.png', NULL, NULL),
(48, 'Comoros', 'Comores, Ilhas', 'KM', 1732, '/image/paises/Comores, Ilhas.png', NULL, NULL),
(49, 'Congo', 'Congo', 'CG', 1775, '/image/paises/Congo.png', NULL, NULL),
(50, 'Congo, the Democratic Republic of the', 'Congo, Republica Democrática do', 'CD', 8885, '/image/paises/Congo, Republica Democrática do.png', NULL, NULL),
(51, 'Cook Islands', 'Cook, Ilhas', 'CK', 1830, '/image/paises/Cook, Ilhas.png', NULL, NULL),
(52, 'Costa Rica', 'Costa Rica', 'CR', 1961, '/image/paises/Costa Rica.png', NULL, NULL),
(53, 'Cote d`Ivoire', 'Costa do Marfim', 'CI', 1937, '/image/paises/Costa do Marfim.png', NULL, NULL),
(54, 'Croatia (Hrvatska)', 'Croácia (Republica da)', 'HR', 1953, '/image/paises/Croácia (Republica da).png', NULL, NULL),
(55, 'Cuba', 'Cuba', 'CU', 1996, '/image/paises/Cuba.png', NULL, NULL),
(56, 'Cyprus', 'Chipre', 'CY', 1635, '/image/paises/Chipre.png', NULL, NULL),
(57, 'Czech Republic', 'Tcheca, Republica', 'CZ', 7919, '/image/paises/Tcheca, Republica.png', NULL, NULL),
(58, 'Denmark', 'Dinamarca', 'DK', 2321, '/image/paises/Dinamarca.png', NULL, NULL),
(59, 'Djibouti', 'Djibuti', 'DJ', 7838, '/image/paises/Djibuti.png', NULL, NULL),
(60, 'Dominica', 'Dominica, Ilha', 'DM', 2356, '/image/paises/Dominica, Ilha.png', NULL, NULL),
(61, 'Dominican Republic', 'Republica Dominicana', 'DO', 6475, '/image/paises/Republica Dominicana.png', NULL, NULL),
(62, 'East Timor', 'Timor Leste', 'TL', 7951, '/image/paises/Timor Leste.png', NULL, NULL),
(63, 'Ecuador', 'Equador', 'EC', 2399, '/image/paises/Equador.png', NULL, NULL),
(64, 'Egypt', 'Egito', 'EG', 2402, '/image/paises/Egito.png', NULL, NULL),
(65, 'El Salvador', 'El Salvador', 'SV', 6874, '/image/paises/El Salvador.png', NULL, NULL),
(66, 'Equatorial Guinea', 'Guine-Equatorial', 'GQ', 3310, '/image/paises/Guine-Equatorial.png', NULL, NULL),
(67, 'Eritrea', 'Eritreia', 'ER', 2437, '/image/paises/Eritreia.png', NULL, NULL),
(68, 'Estonia', 'Estônia, Republica da', 'EE', 2518, '/image/paises/Estônia, Republica da.png', NULL, NULL),
(69, 'Ethiopia', 'Etiópia', 'ET', 2534, '/image/paises/Etiópia.png', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'Falkland (Ilhas Malvinas)', 'FK', 2550, '/image/paises/Falkland (Ilhas Malvinas).png', NULL, NULL),
(71, 'Faroe Islands', 'Feroe, Ilhas', 'FO', 2593, '/image/paises/Feroe, Ilhas.png', NULL, NULL),
(72, 'Fiji', 'Fiji', 'FJ', 8702, '/image/paises/Fiji.png', NULL, NULL),
(73, 'Finland', 'Finlândia', 'FI', 2712, '/image/paises/Finlândia.png', NULL, NULL),
(74, 'France', 'França', 'FR', 2755, '/image/paises/França.png', NULL, NULL),
(76, 'French Guiana', 'Guiana francesa', 'GF', 3255, '/image/paises/Guiana francesa.png', NULL, NULL),
(77, 'French Polynesia', 'Polinésia Francesa', 'PF', 5991, '/image/paises/Polinésia Francesa.png', NULL, NULL),
(78, 'French Southern Territories', 'Terras Austrais e Antárticas Francesas', 'TF', 3607, '/image/paises/Terras Austrais e Antárticas Francesas.png', NULL, NULL),
(79, 'Gabon', 'Gabão', 'GA', 2810, '/image/paises/Gabão.png', NULL, NULL),
(80, 'Gambia', 'Gambia', 'GM', 2852, '/image/paises/Gambia.png', NULL, NULL),
(81, 'Georgia', 'Georgia, Republica da', 'GE', 2917, '/image/paises/Georgia, Republica da.png', NULL, NULL),
(82, 'Germany', 'Alemanha', 'DE', 230, '/image/paises/Alemanha.png', NULL, NULL),
(83, 'Ghana', 'Gana', 'GH', 2895, '/image/paises/Gana.png', NULL, NULL),
(84, 'Gibraltar', 'Gibraltar', 'GI', 2933, '/image/paises/Gibraltar.png', NULL, NULL),
(85, 'Greece', 'Grécia', 'GR', 3018, '/image/paises/Grécia.png', NULL, NULL),
(86, 'Greenland', 'Groenlândia', 'GL', 3050, '/image/paises/Groenlândia.png', NULL, NULL),
(87, 'Grenada', 'Granada', 'GD', 2976, '/image/paises/Granada.png', NULL, NULL),
(88, 'Guadeloupe', 'Guadalupe', 'GP', 3093, '/image/paises/Guadalupe.png', NULL, NULL),
(89, 'Guam', 'Guam', 'GU', 3131, '/image/paises/Guam.png', NULL, NULL),
(90, 'Guatemala', 'Guatemala', 'GT', 3174, '/image/paises/Guatemala.png', NULL, NULL),
(91, 'Guinea', 'Guine', 'GN', 3298, '/image/paises/Guine.png', NULL, NULL),
(92, 'Guinea-Bissau', 'Guine-Bissau', 'GW', 3344, '/image/paises/Guine-Bissau.png', NULL, NULL),
(93, 'Guyana', 'Guiana', 'GY', 3379, '/image/paises/Guiana.png', NULL, NULL),
(94, 'Haiti', 'Haiti', 'HT', 3417, '/image/paises/Haiti.png', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'Ilha Heard e Ilhas McDonald', 'HM', 3603, '/image/paises/Ilha Heard e Ilhas McDonald.png', NULL, NULL),
(96, 'Holy See (Vatican City State)', 'Vaticano, Estado da Cidade do', 'VA', 8486, '/image/paises/Vaticano, Estado da Cidade do.png', NULL, NULL),
(97, 'Honduras', 'Honduras', 'HN', 3450, '/image/paises/Honduras.png', NULL, NULL),
(98, 'Hong Kong', 'Hong Kong', 'HK', 3514, '/image/paises/Hong Kong.png', NULL, NULL),
(99, 'Hungary', 'Hungria', 'HU', 3557, '/image/paises/Hungria.png', NULL, NULL),
(100, 'Iceland', 'Islândia', 'IS', 3794, '/image/paises/Islândia.png', NULL, NULL),
(101, 'India', 'Índia', 'IN', 3611, '/image/paises/Índia.png', NULL, NULL),
(102, 'Indonesia', 'Indonésia', 'ID', 3654, '/image/paises/Indonésia.png', NULL, NULL),
(103, 'Iran (Islamic Republic of)', 'Ira, Republica Islâmica do', 'IR', 3727, '/image/paises/Ira, Republica Islâmica do.png', NULL, NULL),
(104, 'Iraq', 'Iraque', 'IQ', 3697, '/image/paises/Iraque.png', NULL, NULL),
(105, 'Ireland', 'Irlanda', 'IE', 3751, '/image/paises/Irlanda.png', NULL, NULL),
(106, 'Israel', 'Israel', 'IL', 3832, '/image/paises/Israel.png', NULL, NULL),
(107, 'Italy', 'Itália', 'IT', 3867, '/image/paises/Itália.png', NULL, NULL),
(108, 'Jamaica', 'Jamaica', 'JM', 3913, '/image/paises/Jamaica.png', NULL, NULL),
(109, 'Japan', 'Japão', 'JP', 3999, '/image/paises/Japão.png', NULL, NULL),
(110, 'Jordan', 'Jordânia', 'JO', 4030, '/image/paises/Jordânia.png', NULL, NULL),
(111, 'Kazakhstan', 'Cazaquistão, Republica do', 'KZ', 1538, '/image/paises/Cazaquistão, Republica do.png', NULL, NULL),
(112, 'Kenya', 'Quênia', 'KE', 6238, '/image/paises/Quênia.png', NULL, NULL),
(113, 'Kiribati', 'Kiribati', 'KI', 4111, '/image/paises/Kiribati.png', NULL, NULL),
(114, 'Korea, Democratic People`s Republic of', 'Coréia do Sul', 'KP', 1872, '/image/paises/Coréia do Sul.png', NULL, NULL),
(115, 'Korea, Republic of', 'Coreia, Republica da', 'KR', 1902, '/image/paises/Coreia, Republica da.png', NULL, NULL),
(116, 'Kuwait', 'Kuwait', 'KW', 1988, '/image/paises/Kuwait.png', NULL, NULL),
(117, 'Kyrgyzstan', 'Quirguiz, Republica', 'KG', 6254, '/image/paises/Quirguiz, Republica.png', NULL, NULL),
(118, 'Lao People`s Democratic Republic', 'Laos, Republica Popular Democrática do', 'LA', 4200, '/image/paises/Laos, Republica Popular Democrática do.png', NULL, NULL),
(119, 'Latvia', 'Letônia, Republica da', 'LV', 4278, '/image/paises/Letônia, Republica da.png', NULL, NULL),
(120, 'Lebanon', 'Líbano', 'LB', 4316, '/image/paises/Líbano.png', NULL, NULL),
(121, 'Lesotho', 'Lesoto', 'LS', 4260, '/image/paises/Lesoto.png', NULL, NULL),
(122, 'Liberia', 'Libéria', 'LR', 4340, '/image/paises/Libéria.png', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'Líbia', 'LY', 4383, '/image/paises/Líbia.png', NULL, NULL),
(124, 'Liechtenstein', 'Liechtenstein', 'LI', 4405, '/image/paises/Liechtenstein.png', NULL, NULL),
(125, 'Lithuania', 'Lituânia, Republica da', 'LT', 4421, '/image/paises/Lituânia, Republica da.png', NULL, NULL),
(126, 'Luxembourg', 'Luxemburgo', 'LU', 4456, '/image/paises/Luxemburgo.png', NULL, NULL),
(127, 'Macau', 'Macau', 'MO', 4472, '/image/paises/Macau.png', NULL, NULL),
(128, 'North Macedonia', 'Macedônia do Norte', 'MK', 4499, '/image/paises/Macedônia do Norte.png', NULL, NULL),
(129, 'Madagascar', 'Madagascar', 'MG', 4502, '/image/paises/Madagascar.png', NULL, NULL),
(130, 'Malawi', 'Malavi', 'MW', 4588, '/image/paises/Malavi.png', NULL, NULL),
(131, 'Malaysia', 'Malásia', 'MY', 4553, '/image/paises/Malásia.png', NULL, NULL),
(132, 'Maldives', 'Maldivas', 'MV', 4618, '/image/paises/Maldivas.png', NULL, NULL),
(133, 'Mali', 'Mali', 'ML', 4642, '/image/paises/Mali.png', NULL, NULL),
(134, 'Malta', 'Malta', 'MT', 4677, '/image/paises/Malta.png', NULL, NULL),
(135, 'Marshall Islands', 'Marshall, Ilhas', 'MH', 4766, '/image/paises/Marshall, Ilhas.png', NULL, NULL),
(136, 'Martinique', 'Martinica', 'MQ', 4774, '/image/paises/Martinica.png', NULL, NULL),
(137, 'Mauritania', 'Mauritânia', 'MR', 4880, '/image/paises/Mauritânia.png', NULL, NULL),
(138, 'Mauritius', 'Mauricio', 'MU', 4855, '/image/paises/Mauricio.png', NULL, NULL),
(139, 'Mayotte', 'Mayotte (Ilhas Francesas)', 'YT', 4885, '/image/paises/Mayotte (Ilhas Francesas).png', NULL, NULL),
(140, 'Mexico', 'México', 'MX', 4936, '/image/paises/México.png', NULL, NULL),
(141, 'Micronesia, Federated States of', 'Micronesia', 'FM', 4995, '/image/paises/Micronesia.png', NULL, NULL),
(142, 'Moldova, Republic of', 'Moldávia, Republica da', 'MD', 4944, '/image/paises/Moldávia, Republica da.png', NULL, NULL),
(143, 'Monaco', 'Mônaco', 'MC', 4952, '/image/paises/Mônaco.png', NULL, NULL),
(144, 'Mongolia', 'Mongólia', 'MN', 4979, '/image/paises/Mongólia.png', NULL, NULL),
(145, 'Montserrat', 'Montserrat, Ilhas', 'MS', 5010, '/image/paises/Montserrat, Ilhas.png', NULL, NULL),
(146, 'Morocco', 'Marrocos', 'MA', 4740, '/image/paises/Marrocos.png', NULL, NULL),
(147, 'Mozambique', 'Moçambique', 'MZ', 5053, '/image/paises/Moçambique.png', NULL, NULL),
(148, 'Myanmar', 'Mianmar (Birmânia)', 'MM', 930, '/image/paises/Mianmar (Birmânia).png', NULL, NULL),
(149, 'Namibia', 'Namíbia', 'NA', 5070, '/image/paises/Namíbia.png', NULL, NULL),
(150, 'Nauru', 'Nauru', 'NR', 5088, '/image/paises/Nauru.png', NULL, NULL),
(151, 'Nepal', 'Nepal', 'NP', 5177, '/image/paises/Nepal.png', NULL, NULL),
(152, 'Netherlands', 'Holanda', 'NL', 5738, '/image/paises/Holanda.png', NULL, NULL),
(154, 'New Caledonia', 'Nova Caledonia', 'NC', 5428, '/image/paises/Nova Caledonia.png', NULL, NULL),
(155, 'New Zealand', 'Nova Zelândia', 'NZ', 5487, '/image/paises/Nova Zelândia.png', NULL, NULL),
(156, 'Nicaragua', 'Nicarágua', 'NI', 5215, '/image/paises/Nicarágua.png', NULL, NULL),
(157, 'Niger', 'Níger', 'NE', 5258, '/image/paises/Níger.png', NULL, NULL),
(158, 'Nigeria', 'Nigéria', 'NG', 5282, '/image/paises/Nigéria.png', NULL, NULL),
(159, 'Niue', 'Niue, Ilha', 'NU', 5312, '/image/paises/Niue, Ilha.png', NULL, NULL),
(160, 'Norfolk Island', 'Norfolk, Ilha', 'NF', 5355, '/image/paises/Norfolk, Ilha.png', NULL, NULL),
(161, 'Northern Mariana Islands', 'Marianas do Norte', 'MP', 4723, '/image/paises/Marianas do Norte.png', NULL, NULL),
(162, 'Norway', 'Noruega', 'NO', 5380, '/image/paises/Noruega.png', NULL, NULL),
(163, 'Oman', 'Oma', 'OM', 5568, '/image/paises/Oma.png', NULL, NULL),
(164, 'Pakistan', 'Paquistão', 'PK', 5762, '/image/paises/Paquistão.png', NULL, NULL),
(165, 'Palau', 'Palau', 'PW', 5754, '/image/paises/Palau.png', NULL, NULL),
(166, 'Panama', 'Panamá', 'PA', 5800, '/image/paises/Panamá.png', NULL, NULL),
(167, 'Papua New Guinea', 'Papua Nova Guine', 'PG', 5452, '/image/paises/Papua Nova Guine.png', NULL, NULL),
(168, 'Paraguay', 'Paraguai', 'PY', 5860, '/image/paises/Paraguai.png', NULL, NULL),
(169, 'Peru', 'Peru', 'PE', 5894, '/image/paises/Peru.png', NULL, NULL),
(170, 'Philippines', 'Filipinas', 'PH', 2674, '/image/paises/Filipinas.png', NULL, NULL),
(171, 'Pitcairn', 'Pitcairn, Ilha', 'PN', 5932, '/image/paises/Pitcairn, Ilha.png', NULL, NULL),
(172, 'Poland', 'Polônia', 'PL', 6033, '/image/paises/Polônia.png', NULL, NULL),
(173, 'Portugal', 'Portugal', 'PT', 6076, '/image/paises/Portugal.png', NULL, NULL),
(174, 'Puerto Rico', 'Porto Rico', 'PR', 6114, '/image/paises/Porto Rico.png', NULL, NULL),
(175, 'Qatar', 'Catar', 'QA', 1546, '/image/paises/Catar.png', NULL, NULL),
(176, 'Reunion', 'Reunião, Ilha', 'RE', 6602, '/image/paises/Reunião, Ilha.png', NULL, NULL),
(177, 'Romania', 'Romênia', 'RO', 6700, '/image/paises/Romênia.png', NULL, NULL),
(178, 'Russian Federation', 'Rússia', 'RU', 6769, '/image/paises/Rússia.png', NULL, NULL),
(179, 'Rwanda', 'Ruanda', 'RW', 6750, '/image/paises/Ruanda.png', NULL, NULL),
(180, 'Saint Kitts and Nevis', 'São Cristovão e Neves, Ilhas', 'KN', 6955, '/image/paises/São Cristovão e Neves, Ilhas.png', NULL, NULL),
(181, 'Saint LUCIA', 'Santa Lucia', 'LC', 7153, '/image/paises/Santa Lucia.png', NULL, NULL),
(182, 'Saint Vincent and the Grenadines', 'São Vicente e Granadinas', 'VC', 7056, '/image/paises/São Vicente e Granadinas.png', NULL, NULL),
(183, 'Samoa', 'Samoa', 'WS', 6904, '/image/paises/Samoa.png', NULL, NULL),
(184, 'San Marino', 'San Marino', 'SM', 6971, '/image/paises/San Marino.png', NULL, NULL),
(185, 'Sao Tome and Principe', 'São Tome e Príncipe, Ilhas', 'ST', 7200, '/image/paises/São Tome e Príncipe, Ilhas.png', NULL, NULL),
(186, 'Saudi Arabia', 'Arábia Saudita', 'SA', 531, '/image/paises/Arábia Saudita.png', NULL, NULL),
(187, 'Senegal', 'Senegal', 'SN', 7285, '/image/paises/Senegal.png', NULL, NULL),
(188, 'Seychelles', 'Seychelles', 'SC', 7315, '/image/paises/Seychelles.png', NULL, NULL),
(189, 'Sierra Leone', 'Serra Leoa', 'SL', 7358, '/image/paises/Serra Leoa.png', NULL, NULL),
(190, 'Singapore', 'Cingapura', 'SG', 7412, '/image/paises/Cingapura.png', NULL, NULL),
(191, 'Slovakia (Slovak Republic)', 'Eslovaca, Republica', 'SK', 2470, '/image/paises/Eslovaca, Republica.png', NULL, NULL),
(192, 'Slovenia', 'Eslovênia, Republica da', 'SI', 2461, '/image/paises/Eslovênia, Republica da.png', NULL, NULL),
(193, 'Solomon Islands', 'Salomão, Ilhas', 'SB', 6777, '/image/paises/Salomão, Ilhas.png', NULL, NULL),
(194, 'Somalia', 'Somalia', 'SO', 7480, '/image/paises/Somalia.png', NULL, NULL),
(195, 'South Africa', 'África do Sul', 'ZA', 7560, '/image/paises/África do Sul.png', NULL, NULL),
(196, 'South Georgia and the South Sandwich Islands', 'Ilhas Geórgia do Sul e Sandwich do Sul', 'GS', 2925, '/image/paises/Ilhas Geórgia do Sul e Sandwich do Sul.png', NULL, NULL),
(197, 'Spain', 'Espanha', 'ES', 2453, '/image/paises/Espanha.png', NULL, NULL),
(198, 'Sri Lanka', 'Sri Lanka', 'LK', 7501, '/image/paises/Sri Lanka.png', NULL, NULL),
(199, 'St. Helena', 'Santa Helena', 'SH', 7102, '/image/paises/Santa Helena.png', NULL, NULL),
(200, 'St. Pierre and Miquelon', 'São Pedro e Miquelon', 'PM', 7005, '/image/paises/São Pedro e Miquelon.png', NULL, NULL),
(201, 'Sudan', 'Sudão', 'SD', 7595, '/image/paises/Sudão.png', NULL, NULL),
(202, 'Suriname', 'Suriname', 'SR', 7706, '/image/paises/Suriname.png', NULL, NULL),
(203, 'Svalbard and Jan Mayen Islands', 'Svalbard e Jan Mayen', 'SJ', 7552, '/image/paises/Svalbard e Jan Mayen.png', NULL, NULL),
(204, 'Swaziland', 'Eswatini', 'SZ', 7544, '/image/paises/Eswatini.png', NULL, NULL),
(205, 'Sweden', 'Suécia', 'SE', 7641, '/image/paises/Suécia.png', NULL, NULL),
(206, 'Switzerland', 'Suíça', 'CH', 7676, '/image/paises/Suíça.png', NULL, NULL),
(207, 'Syrian Arab Republic', 'Síria, Republica Árabe da', 'SY', 7447, '/image/paises/Síria, Republica Árabe da.png', NULL, NULL),
(208, 'Taiwan, Province of China', 'Formosa (Taiwan)', 'TW', 1619, '/image/paises/Formosa (Taiwan).png', NULL, NULL),
(209, 'Tajikistan', 'Tadjiquistao, Republica do', 'TJ', 7722, '/image/paises/Tadjiquistao, Republica do.png', NULL, NULL),
(210, 'Tanzania, United Republic of', 'Tanzânia, Republica Unida da', 'TZ', 7803, '/image/paises/Tanzânia, Republica Unida da.png', NULL, NULL),
(211, 'Thailand', 'Tailândia', 'TH', 7765, '/image/paises/Tailândia.png', NULL, NULL),
(212, 'Togo', 'Togo', 'TG', 8001, '/image/paises/Togo.png', NULL, NULL),
(213, 'Tokelau', 'Toquelau, Ilhas', 'TK', 8052, '/image/paises/Toquelau, Ilhas.png', NULL, NULL),
(214, 'Tonga', 'Tonga', 'TO', 8109, '/image/paises/Tonga.png', NULL, NULL),
(215, 'Trinidad and Tobago', 'Trinidad e Tobago', 'TT', 8150, '/image/paises/Trinidad e Tobago.png', NULL, NULL),
(216, 'Tunisia', 'Tunísia', 'TN', 8206, '/image/paises/Tunísia.png', NULL, NULL),
(217, 'Turkey', 'Turquia', 'TR', 8273, '/image/paises/Turquia.png', NULL, NULL),
(218, 'Turkmenistan', 'Turcomenistão, Republica do', 'TM', 8249, '/image/paises/Turcomenistão, Republica do.png', NULL, NULL),
(219, 'Turks and Caicos Islands', 'Turcas e Caicos, Ilhas', 'TC', 8230, '/image/paises/Turcas e Caicos, Ilhas.png', NULL, NULL),
(220, 'Tuvalu', 'Tuvalu', 'TV', 8281, '/image/paises/Tuvalu.png', NULL, NULL),
(221, 'Uganda', 'Uganda', 'UG', 8338, '/image/paises/Uganda.png', NULL, NULL),
(222, 'Ukraine', 'Ucrânia', 'UA', 8311, '/image/paises/Ucrânia.png', NULL, NULL),
(223, 'United Arab Emirates', 'Emirados Árabes Unidos', 'AE', 2445, '/image/paises/Emirados Árabes Unidos.png', NULL, NULL),
(224, 'United Kingdom', 'Reino Unido', 'GB', 6289, '/image/paises/Reino Unido.png', NULL, NULL),
(225, 'United States', 'Estados Unidos', 'US', 2496, '/image/paises/Estados Unidos.png', NULL, NULL),
(226, 'United States Minor Outlying Islands', 'Ilhas Menores Distantes dos Estados Unidos', 'UM', 18664, '/image/paises/Ilhas Menores Distantes dos Estados Unidos.png', NULL, NULL),
(227, 'Uruguay', 'Uruguai', 'UY', 8451, '/image/paises/Uruguai.png', NULL, NULL),
(228, 'Uzbekistan', 'Uzbequistão, Republica do', 'UZ', 8478, '/image/paises/Uzbequistão, Republica do.png', NULL, NULL),
(229, 'Vanuatu', 'Vanuatu', 'VU', 5517, '/image/paises/Vanuatu.png', NULL, NULL),
(230, 'Venezuela', 'Venezuela', 'VE', 8508, '/image/paises/Venezuela.png', NULL, NULL),
(231, 'Viet Nam', 'Vietnã', 'VN', 8583, '/image/paises/Vietnã.png', NULL, NULL),
(232, 'Virgin Islands (British)', 'Virgens, Ilhas (Britânicas)', 'VG', 8630, '/image/paises/Virgens, Ilhas (Britânicas).png', NULL, NULL),
(233, 'Virgin Islands (U.S.)', 'Virgens, Ilhas (E.U.A.)', 'VI', 8664, '/image/paises/Virgens, Ilhas (E.U.A.).png', NULL, NULL),
(234, 'Wallis and Futuna Islands', 'Wallis e Futuna, Ilhas', 'WF', 8753, '/image/paises/Wallis e Futuna, Ilhas.png', NULL, NULL),
(235, 'Western Sahara', 'Saara Ocidental', 'EH', 6858, '/image/paises/Saara Ocidental.png', NULL, NULL),
(236, 'Yemen', 'Iémen', 'YE', 3573, '/image/paises/Iémen.png', NULL, NULL),
(237, 'Yugoslavia', 'Iugoslávia, República Fed. da', 'YU', 3883, '/image/paises/Iugoslávia, República Fed. da.png', NULL, NULL),
(238, 'Zambia', 'Zâmbia', 'ZM', 8907, '/image/paises/Zâmbia.png', NULL, NULL),
(239, 'Zimbabwe', 'Zimbabue', 'ZW', 6653, '/image/paises/Zimbabue.png', NULL, NULL),
(240, 'Bailiwick of Guernsey', 'Guernsey, Ilha do Canal (Inclui Alderney e Sark)', 'GG', 1504, '/image/paises/Guernsey, Ilha do Canal (Inclui Alderney e Sark).png', NULL, NULL),
(241, 'Bailiwick of Jersey', 'Jersey, Ilha do Canal', 'JE', 1508, '/image/paises/Jersey, Ilha do Canal.png', NULL, NULL),
(243, 'Isle of Man', 'Man, Ilha de', 'IM', 3595, '/image/paises/Man, Ilha de.png', NULL, NULL),
(246, 'Crna Gora (Montenegro)', 'Montenegro', 'ME', 4985, '/image/paises/Montenegro.png', NULL, NULL),
(247, 'SÉRVIA', 'Republika Srbija', 'RS', 7370, '/image/paises/Republika Srbija.png', NULL, NULL),
(248, 'Republic of South Sudan', 'Sudao do Sul', 'SS', 7600, '/image/paises/Sudao do Sul.png', NULL, NULL),
(249, 'Zona del Canal de Panamá', 'Zona do Canal do Panamá', '', 8958, '/image/paises/Zona do Canal do Panamá.png', NULL, NULL),
(252, 'Dawlat Filasṭīn', 'Palestina', 'PS', 5780, '/image/paises/Palestina.png', NULL, NULL),
(253, 'Åland Islands', 'Aland, Ilhas', 'AX', 153, '/image/paises/Aland, Ilhas.png', NULL, NULL),
(255, 'Curaçao', 'Curaçao', 'CW', 200, '/image/paises/Curaçao.png', NULL, NULL),
(256, 'Saint Martin', 'São Martinho, Ilha de (Parte Holandesa)', 'SM', 6998, '/image/paises/São Martinho, Ilha de (Parte Holandesa).png', NULL, NULL),
(258, 'Bonaire', 'Bonaire', 'AN', 990, '/image/paises/Bonaire.png', NULL, NULL),
(259, 'Antartica', 'Antartica', 'AQ', 420, '/image/paises/Antartica.png', NULL, NULL),
(260, 'Heard Island and McDonald Islands', 'Ilha Herad e Ilhas Macdonald', 'AU', 3433, '/image/paises/Ilha Herad e Ilhas Macdonald.png', NULL, NULL),
(261, 'Saint-Barthélemy', 'São Bartolomeu', 'FR', 6939, '/image/paises/São Bartolomeu.png', NULL, NULL),
(262, 'Saint Martin', 'São Martinho, Ilha de (Parte Francesa)', 'SM', 6980, '/image/paises/São Martinho, Ilha de (Parte Francesa).png', NULL, NULL),
(263, 'Terres Australes et Antarctiques Françaises', 'Terras Austrais e Antárcticas Francesas', 'TF', 7811, '/image/paises/Terras Austrais e Antárcticas Francesas.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_carro` bigint(20) NOT NULL,
  `titulos` bigint(20) NOT NULL DEFAULT 0,
  `vitorias` bigint(20) NOT NULL DEFAULT 0,
  `podios` bigint(20) NOT NULL DEFAULT 0,
  `pole_positions` bigint(20) NOT NULL DEFAULT 0,
  `equipe_id` bigint(20) UNSIGNED NOT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `drivers`
--

INSERT INTO `drivers` (`id`, `nome`, `numero_carro`, `titulos`, `vitorias`, `podios`, `pole_positions`, `equipe_id`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'Bruno Luciano', 99, 0, 0, 0, 0, 1, 1, '2019-10-03 18:44:27', '2019-10-03 18:44:27'),
(2, 'João Augusto', 42, 0, 0, 0, 0, 3, 74, '2019-10-03 18:44:54', '2019-10-03 18:44:54'),
(3, 'Lucas Funchal', 44, 0, 0, 0, 0, 2, 38, '2019-10-03 18:45:22', '2019-10-03 18:45:22'),
(4, 'Almir Camolesi', 17, 0, 0, 0, 0, 4, 82, '2019-10-03 18:46:09', '2019-10-03 18:46:09'),
(5, 'Guilherme Garcia', 24, 0, 0, 0, 0, 5, 109, '2019-10-03 18:46:30', '2019-10-03 18:46:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_24_200034_create_countries_table', 1),
(5, '2019_09_25_164421_create_teams_table', 1),
(6, '2019_09_25_170047_add_podios_to_teams', 1),
(7, '2019_09_28_185341_add_image_to_countries', 1),
(8, '2019_09_29_181231_create_drivers_table', 1),
(9, '2019_09_30_021923_create_tracks_table', 1),
(10, '2019_09_30_170707_add_equipe_cor_to_teams', 1),
(11, '2019_09_30_233540_add_image_circuito_to_tracks', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diretor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `podios` bigint(20) NOT NULL DEFAULT 0,
  `titulos` bigint(20) NOT NULL DEFAULT 0,
  `cor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `nome`, `diretor`, `pais_id`, `podios`, `titulos`, `cor`, `created_at`, `updated_at`) VALUES
(1, 'Ferrari', 'Maurizio Arrivabene', 107, 0, 0, '#ff0000', '2019-10-03 04:43:24', '2019-10-03 04:43:24'),
(2, 'Mercedes-Benz', 'Toto Wolff', 82, 0, 0, '#1ce8e8', '2019-10-03 04:44:01', '2019-10-03 04:44:01'),
(3, 'Red Bull Racing', 'Adrian Newey', 15, 0, 0, '#d009cb', '2019-10-03 04:44:36', '2019-10-03 04:44:36'),
(4, 'Toro Rosso Racing', 'Cyril Abiteboul', 225, 0, 0, '#1726e1', '2019-10-03 04:45:13', '2019-10-03 04:45:13'),
(5, 'Force India', 'Apu', 101, 0, 0, '#ff8000', '2019-10-03 04:45:34', '2019-10-03 04:45:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curvas` bigint(20) NOT NULL,
  `image_circuito` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tracks`
--

INSERT INTO `tracks` (`id`, `nome`, `curvas`, `image_circuito`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'Melbourne', 16, '/image/pistas/Melbourne.png', 14, '2019-10-03 18:19:22', '2019-10-03 18:19:22'),
(2, 'Sakhir', 15, '/image/pistas/Sakhir.png', 18, '2019-10-03 18:20:01', '2019-10-03 18:20:01'),
(3, 'Shanghai', 16, '/image/pistas/Shanghai.png', 44, '2019-10-03 18:21:48', '2019-10-03 18:21:48'),
(4, 'Baku', 20, '/image/pistas/Baku.png', 16, '2019-10-03 18:22:08', '2019-10-03 18:22:08'),
(5, 'Barcelona', 16, '/image/pistas/Barcelona.png', 197, '2019-10-03 18:22:39', '2019-10-03 18:22:39'),
(6, 'Monte Carlo', 19, '/image/pistas/Monte Carlo.png', 143, '2019-10-03 18:23:24', '2019-10-03 18:23:24'),
(7, 'Montreal', 13, '/image/pistas/Montreal.png', 38, '2019-10-03 18:24:18', '2019-10-03 18:24:18'),
(8, 'Le Castellet', 15, '/image/pistas/Le Castellet.png', 74, '2019-10-03 18:24:43', '2019-10-03 18:24:43'),
(9, 'Spielberg', 8, '/image/pistas/Spielberg.png', 15, '2019-10-03 18:25:34', '2019-10-03 18:25:34'),
(10, 'Silverstone', 18, '/image/pistas/Silverstone.png', 224, '2019-10-03 18:26:02', '2019-10-03 18:26:02'),
(11, 'Hockenheim', 17, '/image/pistas/Hockenheim.png', 82, '2019-10-03 18:31:48', '2019-10-03 18:31:48'),
(12, 'Budapest', 14, '/image/pistas/Budapest.png', 99, '2019-10-03 18:33:09', '2019-10-03 18:33:09'),
(13, 'Spa', 20, '/image/pistas/Spa.png', 22, '2019-10-03 18:33:39', '2019-10-03 18:33:39'),
(14, 'Monza', 11, '/image/pistas/Monza.png', 107, '2019-10-03 18:34:08', '2019-10-03 18:34:08'),
(15, 'Singapore', 23, '/image/pistas/Singapore.png', 190, '2019-10-03 18:34:47', '2019-10-03 18:34:47'),
(16, 'Sochi', 19, '/image/pistas/Sochi.png', 178, '2019-10-03 18:35:25', '2019-10-03 18:35:25'),
(17, 'Suzuka', 18, '/image/pistas/Suzuka.png', 109, '2019-10-03 18:35:52', '2019-10-03 18:35:52'),
(18, 'Mexico City', 17, '/image/pistas/Mexico City.png', 140, '2019-10-03 18:37:26', '2019-10-03 18:37:26'),
(19, 'Austin', 20, '/image/pistas/Austin.png', 225, '2019-10-03 18:38:22', '2019-10-03 18:38:22'),
(20, 'Interlagos', 15, '/image/pistas/Interlagos.png', 1, '2019-10-03 18:38:51', '2019-10-03 18:38:51'),
(21, 'Abu Dhabi', 21, '/image/pistas/Abu Dhabi.png', 223, '2019-10-03 18:39:04', '2019-10-03 18:39:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_equipe_id_foreign` (`equipe_id`),
  ADD KEY `drivers_pais_id_foreign` (`pais_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_pais_id_foreign` (`pais_id`);

--
-- Índices para tabela `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_pais_id_foreign` (`pais_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT de tabela `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `drivers_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `countries` (`id`);

--
-- Limitadores para a tabela `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `countries` (`id`);

--
-- Limitadores para a tabela `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
