-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 09, 2018 at 09:23 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alaska_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `alert` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `alert`) VALUES
(57, 17, 'Jacques', 'Très bon début !', '2018-08-09 11:21:33', 0),
(58, 17, 'Pierre', 'Que va-t-il donc se passer ??', '2018-08-09 11:22:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user`, `email`, `password`) VALUES
(1, 'Jean Forteroche', 'sylvaindepardieu78@gmail.com', '$2y$10$spiHwjo60BG7BGsxSFijfuYBDbQWlrdhvjvuo2RVKHzyoEU/m4w.i');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `creation_date`, `published`) VALUES
(13, 'Chapitre 2 - Effroi', '<p>Ce discours avait &eacute;t&eacute; d&eacute;bit&eacute; avec un tel ton d&rsquo;assurance, que l&rsquo;officier se d&eacute;cida &agrave; quitter les carrossiers et &agrave; examiner ce commissionnaire, si peu familiaris&eacute; avec les usages de la Cour et qui paraissait, n&eacute;anmoins, si s&ucirc;r de son fait. Il vit devant lui un grand gar&ccedil;on dans toute la fleur de la jeunesse. Cet &eacute;trange porteur de requ&ecirc;te gardait m&ecirc;me encore, de l&rsquo;enfance, la fra&icirc;cheur duvet&eacute;e du teint et la candeur du regard. Sous cette apparente ing&eacute;nuit&eacute;, pourtant, per&ccedil;ait une pointe de hardiesse, tout &agrave; fait cr&acirc;ne. Le diable de petit homme &eacute;tait tr&egrave;s beau, avec sa taille &eacute;lanc&eacute;e, ses fines attaches, et ce visage &agrave; l&rsquo;ovale pur, encadr&eacute; de belles boucles ch&acirc;taines. De grands yeux limpides et le gracieux sourire d&rsquo;une bouche aux l&egrave;vres fi&egrave;res, &agrave; peine ombr&eacute;es d&rsquo;un l&eacute;ger duvet, &eacute;clairaient harmonieusement sa physionomie. &ndash; 12 &ndash; Tout en lui t&eacute;moignait d&rsquo;un gentilhomme de race, bien plus que d&rsquo;un pauvre soldat de rencontre, tel que son costume le faisait para&icirc;tre. Conquis et intrigu&eacute;, l&rsquo;officier prit alors la lettre que l&rsquo;inconnu lui tendait et gagna, par un petit perron, l&rsquo;int&eacute;rieur des appartements de la Reine. En l&rsquo;attendant, le jeune soldat se mit &agrave; examiner &agrave; son tour le fougueux attelage et la superbe voiture, aux panneaux armori&eacute;s, tendue &agrave; l&rsquo;int&eacute;rieur de brocart et garnie de coussins de soie. &Agrave; ses yeux, peu habitu&eacute;s &agrave; tant de luxe, cet &eacute;quipage semblait celui de quelque f&eacute;e. Et, en effet, n&rsquo;en &eacute;tait-ce pas une que cette jeune fille qui venait d&rsquo;appara&icirc;tre, descendant rapidement le petit perron ? Une jolie f&eacute;e blonde, aux yeux d&rsquo;un bleu de r&ecirc;ve, au teint lilial. D&rsquo;un pas l&eacute;ger, qui semblait &agrave; peine effleurer le sol, elle avan&ccedil;ait vers lui. Avant que les laquais eussent le temps de pr&eacute;venir son mouvement, la charmante voyageuse ouvrit elle-m&ecirc;me la porti&egrave;re. Elle se pr&eacute;parait &agrave; sauter dans le carrosse, quand les chevaux, &eacute;nerv&eacute;s par l&rsquo;attente, esquiss&egrave;rent malencontreusement un faux d&eacute;part. L&rsquo;&eacute;quilibre des f&eacute;es doit &ecirc;tre soumis aux m&ecirc;mes lois que celui du commun des mortels. La jolie imprudente, dont le pied mignon avait manqu&eacute; le pas, chancela en poussant un petit cri effarouch&eacute;.</p>', '2018-07-11 16:08:56', 0),
(15, 'Chapitre 2 - Stupéfaction', '<p>Un matin d&rsquo;avril de l&rsquo;an 1641 &ndash; le roi Louis Treizi&egrave;me portant la couronne des lys, et Armand Duplessis, CardinalDuc de Richelieu tenant le sceptre &ndash; les gardes de faction &agrave; la Capitainerie du Louvre virent d&eacute;boucher du quai de l&rsquo;&Eacute;cole un jeune homme, &agrave; l&rsquo;allure militaire, qui se dirigeait de leur c&ocirc;t&eacute; d&rsquo;un pas rapide et d&eacute;gag&eacute;. Le nouvel arrivant portait le pourpoint &agrave; collet de buffle, travers&eacute; d&rsquo;un baudrier de cuir, les grandes bottes passant le genou et le haut chapeau &agrave; bord relev&eacute; piqu&eacute; d&rsquo;une seule t&ecirc;te de plume, qui formaient la tenue de campagne des soldats de l&rsquo;arm&eacute;e des Flandres. Une longue et fine rapi&egrave;re &agrave; coquille ronde, suspendue &agrave; son baudrier, compl&eacute;tait cet accoutrement martial. Arriv&eacute; pr&egrave;s des factionnaires, il porta la main au bord de son feutre en guise de salut et interpella cavali&egrave;rement en ces termes : &mdash; Hol&agrave; ! camarade ! pouvez-vous me dire si M. de Guitaut est au Palais ? &ndash; 10 &ndash; Celui &agrave; qui s&rsquo;adressait plus particuli&egrave;rement cette question &eacute;tait un beau garde, en costume de parade : rev&ecirc;tu de la casaque brod&eacute;e et coiff&eacute; du large feutre &agrave; grand panache. Sans r&eacute;pondre, il toisa d&eacute;daigneusement ce porteur de rapi&egrave;re, qui osait se pr&eacute;senter chez le Roy comme dans un camp &ndash; bott&eacute; et &eacute;peronn&eacute; &ndash; et qui se leurrait du fallacieux espoir d&rsquo;&ecirc;tre admis, en cet &eacute;quipage, pr&egrave;s M. le Capitaine des Gardes de la Reine. La patience ne devait pas &ecirc;tre la vertu ma&icirc;tresse du jeune militaire. Se voyant en butte &agrave; cet examen d&eacute;pourvu d&rsquo;am&eacute;nit&eacute;, il fron&ccedil;a l&eacute;g&egrave;rement le sourcil et se mordit les l&egrave;vres. D&rsquo;un ton plus bref il r&eacute;p&eacute;ta : &mdash; H&eacute; ! monsieur, je vous demande si je puis voir M. de Guitaut ? &mdash; Adressez-vous &agrave; l&rsquo;officier de service, r&eacute;pondit l&rsquo;autre, en tournant le dos. Le soldat h&eacute;sita un moment. Peut-&ecirc;tre se demandait-il si, avant de passer outre, il ne devait pas tirer raison de ce sansg&ecirc;ne impertinent. Mais, &agrave; la r&eacute;flexion, il prit le parti de r&eacute;pondre au d&eacute;dain par le m&eacute;pris. Pivotant sur ses talons, de son pas r&eacute;solu, il p&eacute;n&eacute;tra par le guichet dans une petite cour, o&ugrave; un bel officier, dor&eacute; et chamarr&eacute;, s&rsquo;amusait &agrave; exciter les chevaux attel&eacute;s &agrave; un carrosse. Les b&ecirc;tes g&eacute;n&eacute;reuses, agac&eacute;es par une longue attente, piaffaient et encensaient pour le plus grand amusement des laquais et d&rsquo;un somptueux cocher. Ayant salu&eacute; derechef, le jeune homme exposa sa requ&ecirc;te.</p>', '2018-07-11 16:17:26', 1),
(16, 'Chapitre 1 - Découverte', '<p>Ce silence &eacute;nigmatique devait dissimuler quelque myst&egrave;re oubli&eacute; ou d&eacute;daign&eacute; par notre illustre devancier ; tout un roman peut-&ecirc;tre dont les m&eacute;moires du Comte de la F&egrave;re devaient fournir les &eacute;l&eacute;ments. Talonn&eacute; par ce r&ecirc;ve d&rsquo;&eacute;pop&eacute;e enfouie, comme un diamant, dans la qui&eacute;tude poussi&eacute;reuse du d&eacute;partement des manuscrits de la Biblioth&egrave;que Nationale, nous f&ucirc;mes un jour arracher &agrave; leur sommeil les m&eacute;morables in-folio.</p>\r\n<p>&mdash; Num&eacute;ros 4772 et 4773 ? s&rsquo;effara le vieux biblioth&eacute;caire. Ah ! c&rsquo;est la premi&egrave;re fois&hellip; depuis le vol&hellip;</p>\r\n<p>&mdash; Quel vol ? Le bonhomme fit la sourde oreille.</p>\r\n<p>&ndash; 6</p>\r\n<p>Un instant apr&egrave;s nous pouvions constater que le premier manuscrit s&rsquo;arr&ecirc;tait &agrave; l&rsquo;ann&eacute;e 1628 ; comme Les Trois mousquetaires, et que le second commen&ccedil;ait en 1648&hellip; Vingt ans apr&egrave;s ! &mdash; Ah ! dit le conservateur, t&eacute;moin de notre trop visible d&eacute;convenue ; en avril 1848, m&rsquo;a-t-on dit, M. Dumas qui, durant les troubles de f&eacute;vrier, avait &eacute;t&eacute; clo&icirc;tr&eacute; &agrave; l&rsquo;H&ocirc;tel des Haricots, avec bon nombre de ses confr&egrave;res, revint ici pour consulter le manuscrit interm&eacute;diaire, le troisi&egrave;me in-folio&hellip; &mdash; Il y avait un troisi&egrave;me in-folio ? &mdash; Certainement, le 4772 bis ; d&rsquo;une &eacute;criture diff&eacute;rente de ces deux que voici&hellip; Mais M. Dumas avait eu tort de le n&eacute;gliger &agrave; ses premi&egrave;res visites ; il ne devait pas le retrouver. Le bis s&rsquo;&eacute;tait envol&eacute; avec les f&eacute;d&eacute;r&eacute;s qui camp&egrave;rent dans cette salle le 24 f&eacute;vrier. L&rsquo;&eacute;t&eacute; suivant, au cours d&rsquo;une promenade en Vend&eacute;e, nous nous &eacute;tions arr&ecirc;t&eacute;s au bou &ndash; 7 &ndash; Grimaud ! Ah ! quel souvenir r&eacute;veilla ce nom brusquement prononc&eacute;. Puisque nous nous &eacute;tions d&eacute;cid&eacute;s &agrave; laisser les mousquetaires &agrave; leur l&eacute;thargie et les souvenirs d&rsquo;Athos &agrave; leur poussi&egrave;re, il y avait impertinence de la part du hasard &agrave; nous rappeler nos espoirs &eacute;vanouis. Mais il y a une providence pour les chercheurs. Jouissant de notre embarras, dont il paraissait deviner la cause, le ch&acirc;telain ajouta doucement : &mdash; Vous qui &eacute;crivez des livres, vous n&rsquo;avez pas &eacute;t&eacute; sans lire Les Trois mousquetaires de Dumas ?&hellip; Oui, n&rsquo;est-ce pas ? Eh bien, Grimaud est le propre descendant du silencieux valet d&rsquo;Athos&hellip; Chez lui, il a de vieilles paperasses. En temps de pluie, &ccedil;a pourrait vous distraire. Tourn&eacute; vers le gros homme, nous os&acirc;mes cette question : &mdash; N&rsquo;auriez-vous pas le 4772 bis ? Alors, le muet d&eacute;borda, &eacute;loquent ! &mdash; Oui bien ! Il est &agrave; moi ! &Eacute;crit de la main m&ecirc;me de mon arri&egrave;re-a&iuml;eul&hellip; Repris par mon p&egrave;re en 48&hellip; &mdash; Repris ?&hellip; Pourquoi repris ?&hellip; et comment ?&hellip; &mdash; C&rsquo;est une histoire !&hellip; Avant de mourir, para&icirc;trait-il, Monsieur le Comte fit appeler mon anc&ecirc;tre et lui dit : &laquo; Grimaud, tu as trop &eacute;crit sous ma dict&eacute;e&hellip; Il faut an&eacute;antir le manuscrit qui &eacute;claire le myst&egrave;re des jardins d&rsquo;Amiens&hellip; On ne doit pas toucher &agrave; la Reine !&hellip; &raquo; &mdash; Et vous l&rsquo;avez, ce manuscrit ? &mdash; Sans doute. C&rsquo;est du nanan. Le soir m&ecirc;me nous &eacute;tions install&eacute;s au &laquo; paradis &raquo; de Grimaud, arri&egrave;re-petit-fils, et prenions connaissance, chose impr&eacute;- &ndash; 8 &ndash; vue, de la haute &eacute;criture de Grimaud, le silencieux, qui s&rsquo;&eacute;tait d&eacute;lass&eacute; de se taire en &eacute;crivant. C&rsquo;&eacute;tait l&rsquo;abr&eacute;g&eacute; d&rsquo;un r&eacute;cit fait &agrave; son ma&icirc;tre par le plus jeune des mousquetaires : &laquo; D&rsquo;une aventure secr&egrave;te et des rapports d&eacute;licats qu&rsquo;eurent entre eux MM. d&rsquo;Artagnan et de CyranoBergerac. &raquo; Moins heureux que Dumas nous ne pouvons pas dire que nous avons transcrit tel quel le r&eacute;cit recueilli par Grimaud. Il y a loin des &eacute;loquents m&eacute;moires d&rsquo;un gentilhomme &agrave; l&rsquo;abr&eacute;g&eacute; d&rsquo;un laquais. Nous esp&eacute;rons pourtant qu&rsquo;on verra, sans indiff&eacute;rence, revivre deux h&eacute;ros illustr&eacute;s par la plume inimitable de deux ma&icirc;tres : le B&eacute;arnais d&rsquo;Artagnan et le Gascon Cyrano.</p>', '2018-07-20 16:39:54', 1),
(17, 'Préface', '<p>Qui ne se souvient de la pr&eacute;face des Trois mousquetaires ? Dans cette pr&eacute;face, le grand Dumas rapporte qu&rsquo;apr&egrave;s avoir lu les M&eacute;moires de M. d&rsquo;Artagnan, frapp&eacute; par la consonance &laquo; mythologique &raquo; des noms d&rsquo;Athos, Aramis et Porthos, il eut la curiosit&eacute; d&rsquo;&eacute;claircir l&rsquo;identit&eacute; de ces personnages, &eacute;videmment d&eacute;guis&eacute;s. Ses investigations seraient demeur&eacute;es infructueuses si l&rsquo;&eacute;rudit Paulin P&acirc;ris ne lui avait signal&eacute; l&rsquo;existence d&rsquo;un manuscrit in-folio, &laquo; cot&eacute;, dit-il, sous le n&deg; 4772 ou 4773, et ayant pour titre : M&eacute;moires de M. le Comte de la F&egrave;re, concernant quelques-uns des &eacute;v&eacute;nements qui se pass&egrave;rent en France vers la fin du r&egrave;gne de Louis XIII et le commencement du r&egrave;gne de Louis XIV &raquo;. C&rsquo;est la premi&egrave;re partie de ce pr&eacute;cieux manuscrit que le romancier d&eacute;clare offrir &agrave; ses lecteurs, prenant l&rsquo;engagement, si elle obtient du succ&egrave;s, de publier la seconde. Dumas se vantait volontiers de &laquo; violer parfois l&rsquo;Histoire, mais jamais sans lui faire un enfant &raquo;. Aussi, ce modeste d&eacute;saveu de paternit&eacute; rencontra-t-il bien des sceptiques. De plus une lacune invraisemblable nous mit martel en t&ecirc;te. Ici M. Lassez et moi &ndash; 5 &ndash; nous en appelons &agrave; tous les fid&egrave;les du prodigieux amuseur qui n&rsquo;ont pu manquer d&rsquo;&eacute;prouver une surprise semblable &agrave; la n&ocirc;tre ; pourquoi le romancier a-t-il mis un intervalle de vingt ans entre Les Trois mousquetaires et leur suite ? Pourquoi la pr&eacute;face estelle muette sur ce point d&eacute;licat ? Doit-on admettre que des h&eacute;ros de cette envergure aient pu s&rsquo;endormir de 1628 &agrave; 1648 et n&rsquo;accomplir aucun fait digne d&rsquo;&ecirc;tre not&eacute;, durant cette p&eacute;riode de leur vie, alors qu&rsquo;ils &eacute;taient en pleine jeunesse ? Ou bien Athos auraitil eu une amn&eacute;sie portant sur vingt ans de la vie de ses ins&eacute;parables ? Cette derni&egrave;re hypoth&egrave;se, d&rsquo;ailleurs, n&rsquo;a pas lieu d&rsquo;&ecirc;tre retenue, puisque le manuscrit s&rsquo;intitulait relatif &agrave; &laquo; la fin du r&egrave;gne de Louis XIII &raquo; &ndash; mort en 1643, c&rsquo;est-&agrave;-dire seize ans apr&egrave;s la fin de la premi&egrave;re partie de l&rsquo;ouvrage de Dumas. Non ! l&rsquo;&eacute;poque trouble qui a vu la fin du Grand Cardinal et les obscurs d&eacute;buts de la fortune de Giulio Mazarini, la mort de Louis le Juste et les nouvelles amours de sa reine, cette &eacute;poque, fertile en incidents romanesques, n&rsquo;avait pu &ecirc;tre choisie par nos vaillants jeunes gens pour accrocher &agrave; un clou leurs chatouilleuses &eacute;p&eacute;es.</p>', '2018-07-24 09:27:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`,`post_id`) USING BTREE,
  ADD KEY `fk_delete_comments` (`post_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_delete_comments` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
