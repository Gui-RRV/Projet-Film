-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 oct. 2020 à 01:26
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `netfloux`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `num` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `com` text NOT NULL,
  `titre` text NOT NULL,
  `jour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`num`, `pseudo`, `com`, `titre`, `jour`) VALUES
(1, 'Artyom', '  Oui', 'Parasite ', '2020-05-08'),
(2, 'Saint-14', '  Test', 'Parasite ', '2020-05-14'),
(3, 'Saint-14', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue faucibus eros a sollicitudin. Nam rhoncus sed est sed lacinia. Sed vulputate felis odio, sed faucibus purus congue at. Nullam in massa non mi mattis venenatis. Aliquam non auctor lectus. Vivamus id venenatis ex, fermentum laoreet nulla. Vestibulum consequat ligula quam, et vulputate ipsum dignissim eu. Nullam porttitor fringilla magna vel ullamcorper. Duis sit amet sem lectus. Suspendisse fringilla maximus odio nec vehicula. Duis eleifend porttitor quam ac hendrerit.', 'Parasite ', '2020-05-14'),
(4, 'Saint-14', '  Test', 'Kiki la petite sorcière ', '2020-05-14'),
(5, 'Saint-14', '  Le générique de fin est si beau !', 'Le château dans le ciel', '2020-05-16'),
(6, 'Saint-14', 'Ce message a été supprimé par un Administrateur.', 'Parasite ', '2020-05-17'),
(7, 'Saint-14', '  J\'aime bien les assassins, surtout les assassin\'s creed !', 'The Assassin', '2020-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`user_id`, `movie_id`) VALUES
(1, 1),
(1, 2),
(3, 14);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `date` date NOT NULL,
  `realisateur` text NOT NULL,
  `acteurs` text NOT NULL,
  `synopsis` text NOT NULL,
  `duree` text NOT NULL,
  `pays` text NOT NULL,
  `note` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `genre` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `date`, `realisateur`, `acteurs`, `synopsis`, `duree`, `pays`, `note`, `votes`, `genre`, `image`) VALUES
(1, 'Parasite ', '2019-05-21', 'Bong Joon-ho ', '<p> Song Kang-ho </p> <p> Lee Sun-kyun </p> <p> Cho Yeo-jeong </p> <p> Jang Hye-jin </p> <p> Choi Woo-sik </p> <p> Park So-dam </p>', 'Toute la famille de Ki-taek est au chômage. Un jour, leur fils réussit à se faire recommander pour donner des cours particuliers d’anglais chez les Park, une famille richissime dont le mode de vie est en tous points opposé au leur. C’est le début d’un engrenage incontrôlable.', '2h12min', 'Corée', 15, 6, 'thriller\r\n', 'images/parasite.jpg'),
(2, 'OKJA ', '2017-11-03', 'Bong Joon-ho', '<p>Ahn Seo-hyeon</p> <p>Tilda Swinton</p> <p>Jake Gyllenhaal</p> <p>Paul Dano</p>', 'La société agro-alimentaire Mirando Corporation a mis au point une race de cochons génétiquement modifiés géants, ressemblant à des hippopotames et se comportant comme des chiens. Lucy Mirando (Tilda Swinton) qui dirige l’entreprise, s\'étend surtout, lors d\'une conférence de presse, sur les 26 premiers spécimens qui seront élevés dans la nature selon les traditions locales des différentes régions du monde où ils seront envoyés. Et dans dix ans, annonce-t-elle, une élection du plus beau cochon sera organisée.\r\n\r\nMija (Ahn Seo-hyeon) vit avec son grand-père dans les montagnes sud-coréennes en compagnie d\'un de ces cochons, elle lui a donné le nom d\'Okja. Elle ignore qu\'il va lui être enlevé un jour. Quand la société Mirando vient s\'en emparer, elle refuse cette séparation et se lance avec détermination dans une mission de sauvetage qui l\'entraîne de l\'autre coté de l\'océan. Quand elle arrive en Amérique, Okja fait l\'objet d\'une controverse très mouvementée entre Mirando Corporation et les membres du Front de libération des animaux.', '1h 58min', 'Corée', 17, 6, 'aventure', 'images/okja.jpg'),
(3, 'Le Dernier train pour Busan', '2016-05-13', 'Sang-ho Yeon', '<p>Gong Yoo</p> <p>Jeong Yu-mi</p> <p>Ma Dong-seok</p>', 'Sok-woo, un courtier en bourse, vit à Séoul avec sa fille Soo-ahn, mais il est peu attentionné envers elle : il ne va pas à une fête à l\'école où elle doit chanter, il lui offre un cadeau pour son anniversaire qu\'il lui avait déjà offert pour la journée des enfants. Soo-ahn lui dit alors qu\'elle veut aller voir sa mère à Busan dès le lendemain. Le lendemain, ils embarquent dans le Korea Train Express (KTX), un train rapide qui doit les amener de Séoul à Busan. Juste avant le départ, une jeune fille qui semble malade réussit à monter dans le train ; et alors que le train quitte la gare, celle-ci est envahie par un groupe d\'individus qui attaquent le chef de quai.', '1h 58min', 'Corée', 8, 3, 'drame', 'images/busan.jpg'),
(4, 'Hard Day', '2014-05-29', 'Kim Seong-hoon', '<p>Lee Seon-gyoon</p> <p>Cho Jin-Woong</p> <p>Shin Jung-Keun</p> <p>Man-Sik Jeong</p>', 'Un jeune commissaire, qui s\'apprête à assister aux funérailles de sa mère, renverse un piéton par accident. Paniqué, il décide de cacher son cadavre dans le cercueil maternel. Mais voilà : l\'enquête sur l\'individu disparu est confiée à un de ses collègues, il semble que ce soit un criminel qui était recherché, et un témoin de l\'accident tente de le faire chanter…', '1h 51min', 'Corée', 9, 2, 'comédie', 'images/hard.jpg'),
(5, 'New world', '2013-02-21', 'Park Hoon-jeong', '<p>Min-sik Choi</p> <p>Jung-Min Hwang</p> <p>Lee Jung-jae</p> <p>Park Sung-Woong</p>', 'Un policier sous couverture infiltre pendant des années la plus grande organisation criminelle de la Corée du Sud.', '2h 15min', 'Corée', 0, 0, 'thriller', 'images/new.jpg'),
(6, 'The Assassin', '2015-08-27', 'Hou Hsiao-hsien', '<p>Shu Qi</p> <p>Chen Chang</p> <p>Yun Zhou</p> <p>Ching-Tien Juan</p>', 'Depuis ses dix ans, Nie Yinniang a été élevée par Jiaxin, sa tante, une religieuse devenue son maître.\r\n\r\nJiaxin la charge de tuer des fonctionnaires gouvernementaux corrompus, mais quand Yinniang manifeste de la compassion en ne réussissant pas à tuer pendant ses fonctions, Jiaxin la punit d\'une mission impitoyable conçue pour tester sa résolution. Elle est envoyée dans la lointaine province (circuit, dào en chinois) de Weibo, dans le Nord de la Chine, pour tuer son gouverneur militaire, Tian Ji\'an, un cousin à qui elle a été jadis fiancée.', '1h 45min', 'Chine', 4, 2, 'combat', 'images/assassin.jpg'),
(7, 'Le promeneur d’oiseau', '2014-05-07', 'Philippe Muyl', '<p>Baotian Li</p> <p>Yang Xin Yi</p> <p>Li Xiao Ran</p> <p>Hao Qin</p>', 'Un vieil homme retourne depuis Pékin vers son village natal de Yangshuo dans le Guangxi, au sud de la Chine, où sa petite-fille l\'accompagne. Il emmène son oiseau huamei pour le libérer après 18 ans de compagnie, afin de tenir la promesse faite à sa défunte femme.\r\n\r\nRenxing, la fillette, petite citadine gâtée mais finalement assez solitaire entre deux parents absorbés par leur vie professionnelle et dont le couple bat de l’aile, renâcle à faire ce voyage; elle est cependant contrainte à le faire, parce que ses parents ont chacun un déplacement à l’étranger et que la bonne doit partir de son côté pour le mariage de son fils.\r\n\r\nÀ travers divers imprévus (panne d’autocar, nuit en forêt, voyage en barque et séjour dans une bourgade accueillante) sur le chemin du village, Renxing va se rapprocher de ce grand-père au niveau de vie modeste qu’elle connaît mal, et va comprendre qu’il y a d’autres buts dans la vie qu’une belle maison et un compte en banque bien garni, tandis que ses parents effectueront leur propre cheminement à cette occasion.', '1h 40min', 'Chine', 3, 1, 'comédie', 'images/oiseau.jpg'),
(8, 'Ip man', '2008-12-12', 'Wilson Yip', '<p>Donnie Yen</p> <p>Simon Yam</p> <p>Siu-Wong Fan</p> <p>Ka Tung Lam</p>', 'Au début des années 1930, la ville de Foshan est prospère et y fleurissent les écoles d\'arts martiaux chinois. Pourtant, le meilleur d\'entre eux, Ip Man, expert en wing chun, préfère cacher ses talents et profiter de ses rentes pour passer du temps en famille et s\'entraîner. La femme d\'Ip Man n\'apprécie guère que son mari passe du temps à s\'entraîner et combattre en secret avec les maîtres des écoles de la ville. Les talents d\'Ip gagnent en notoriété quand il vainc un maître du chang quan, Jin Shanzhao, qui a défié et battu les autres maîtres de Fushan.', '1h 48m', 'Chine', 0, 0, 'combat', 'images/ip.jpeg'),
(9, 'Beijing Bicycle', '2001-02-17', 'Wang Xiaoshuai', '<p>Li Bin</p> <p>Cui Lin</p> <p>Zhou Xun</p> <p>Yang Zhang</p>', 'Tout juste débarqué de sa campagne, le jeune Gui trouve rapidement un travail dans cette jungle urbaine qu\'est Pékin : il est engagé comme coursier, on lui confie un vélo, et dès ses premiers jours il multiplie les courses. Pour lui, réussir à vivre dans une ville comme Pékin relève du tour de force. Aussi ce n\'est pas sans fierté, après avoir durement travaillé, qu\'il se trouve sur le point de pouvoir racheter le vélo, et d\'en devenir enfin propriétaire. Tout s\'effondre le jour où on lui vole son seul outil de travail…', '1h 53m', 'Chine', 0, 0, 'drame', 'images/by.jpeg'),
(10, 'Combat de maître', '1994-02-05', 'Jackie Chan', '<p>Jackie Chan</p> <p>Anita Mui</p> <p>Ti Lung</p> <p>Ken Lo</p>', 'Vers le début du xxe siècle, pour éviter de payer des droits de douanes, Wong Fei-hung cache un paquet contenant du ginseng dans les bagages d\'un ambassadeur qui en est exempté. La valise contient déjà un paquet similaire, qui contient un sceau de jade volé par l\'ambassadeur.\r\n\r\nFu Wen Chi, un officier mandchou pense récupérer le sceau de jade, mais se trompe et part avec le ginseng. Fei-hung récupère à son tour un paquet dans la valise de l\'ambassadeur, et se retrouve avec le sceau.', '1h 42m', 'Chine', 0, 0, 'combat', 'images/combat.jpeg'),
(11, 'Your name', '2018-12-28', 'Makoto Shinkai', '<p>Ryûnosuke Kamii</p> <p>Mone Kamishiraishi </p> <p>Masami Nagasawa</p> <p>Etsuko Ichihara</p>', 'Mitsuha, une étudiante du Japon rural, et Taki, un étudiant de Tokyo, rêvent chacun — sans se connaître — de la vie de l\'autre. Un matin, ils se réveillent dans la peau de l\'autre : autre sexe, autre famille, autre maison, autre paysage…', '1h 52m', 'Japon', 0, 0, 'animation', 'images/your.jpg'),
(12, 'Summer Wars ', '2010-06-09', 'Mamoru Hosoda', '<p>Mitsuki Tanimura</p> <p>Junko Fuji</p> <p>Ayumu Saitôp</p> <p>Nanami Sakurabap</p>', 'En 2010, Kenji Koiso est un jeune lycéen passionné par les mathématiques. Il travaille l\'été au service informatique d\'Oz, un réseau social en ligne qui est une gigantesque communauté virtuelle mondiale dans laquelle entreprises et administrations possèdent des façades interactives. C\'est alors que Natsuki lui demande de l\'accompagner à Nagano pour la dépanner. Il se retrouve alors en pleine préparation de la fête d\'anniversaire de la chef du clan Jinnouchi alors que Natsuki lui demande de jouer le rôle de petit ami auprès de sa famille. Pendant ce temps, Love Machine, une intelligence artificielle, pirate le système de sécurité d\'Oz et attaque les utilisateurs puis les systèmes administratifs, causant un chaos mondial.', '1h 55m', 'Japon', 0, 0, 'animation', 'images/summer.jpg'),
(13, 'Le voyage de chihiro', '2002-04-10', 'Hayao Miyazaki', '<p>Rumi Hiiragi</p> <p>Miyu Iruno</p> <p>Mari Natsuki<p> <p>Yumi Tamai<p>', 'Chihiro, dix ans, a tout d\'une petite fille capricieuse. Elle s\'apprête à emménager avec ses parents dans une nouvelle demeure.\r\nSur la route, la petite famille se retrouve face à un immense bâtiment rouge au centre duquel s\'ouvre un long tunnel. De l\'autre côté du passage se dresse une ville fantôme. Les parents découvrent dans un restaurant désert de nombreux mets succulents et ne tardent pas à se jeter dessus. Ils se retrouvent alors transformés en cochons.\r\nPrise de panique, Chihiro s\'enfuit et se dématérialise progressivement. L\'énigmatique Haku se charge de lui expliquer le fonctionnement de l\'univers dans lequel elle vient de pénétrer. Pour sauver ses parents, la fillette va devoir faire face à la terrible sorcière Yubaba, qui arbore les traits d\'une harpie méphistophélique.', '2h 5m', 'Japon', 0, 0, 'animation', 'images/voyage.jpg'),
(14, 'Kiki la petite sorcière ', '2004-03-31', 'Hayao Miyazaki', '<p>Minami Takayama</p> <p>Rei Sakuma</p> <p>Kappei Yamaguchi<p> <p>Keiko Toda<p>', 'Kiki est une jeune sorcière qui vient de fêter ses treize ans. C’est une date importante dans sa famille : traditionnellement à cet âge, les sorcières doivent quitter leurs parents et s’établir pour une année dans une nouvelle ville afin de parfaire leur apprentissage. Kiki, que cette idée met en joie, écoute le bulletin météo à la radio qui annonce beau temps. C’est décidé, elle partira le soir même !', '1h 43m', 'Japon', 8, 2, 'animation', 'images/kiki.jpg'),
(15, 'Le château dans le ciel', '2003-01-15', 'Hayao Miyazaki', '<p>Mayumi Tanaka</p> <p>Hiroshi Ito</p> <p>Washio Machiko<p> <p>Keiko Yokosawa<p>', 'Des pirates du ciel, la « bande de Dora », attaquent une forteresse volante ; ils recherchent une « pierre volante » appartenant à une jeune fille, Sheeta, retenue prisonnière. Cette dernière arrive à s\'enfuir pour atterrir chez Pazu, un garçon de son âge. Tous deux découvrent qu\'ils ont un point commun : Laputa, une île légendaire flottant dans le ciel. Le père de Pazu l\'avait vue de ses propres yeux mais personne ne l\'avait cru, le laissant mourir de chagrin ; mais Sheeta a cette « pierre volante » qui conduit jusqu\'à l\'île. Poursuivis par les pirates et le clan de Muska, l\'homme voulant se servir de la jeune fille pour parvenir à régner sur ces terres, les deux enfants devront s\'entraider pour y arriver avant eux...\r\n\r\n', ' 2h 6m', 'Japon', 3, 1, 'animation', 'images/chateau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `nb` int(11) NOT NULL,
  `nom` text NOT NULL,
  `photo` text NOT NULL,
  `biographie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`nb`, `nom`, `photo`, `biographie`) VALUES
(1, 'Bong Joon-ho ', 'real/Bong_Joon-ho.jpg', 'En 2000, Bong Joon-ho sort son premier long métrage Barking Dog. En 2003, il réalise Memories of Murder, un film tiré de l\'histoire réelle d\'un tueur en série. Le film est un grand succès et attire plus de 5 000 000 de spectateurs en Corée du Sud.  The Host, son troisième long-métrage, est inspiré par un incident survenu en Corée du Sud à la fin des années 1980. Les Cahiers du cinéma le classent troisième film le plus important de 2006.  En 2008, il se joint aux réalisateurs Leos Carax et Michel Gondry dans le film Tokyo! en proposant son court-métrage Shaking Tokyo.  En septembre 2009, il est membre du jury international présidé par Laurent Cantet lors du 57e Festival de Saint-Sébastien. Cette même année, il dévoile son quatrième long-métrage, le drame Mother, présenté en compétition au Festival de Cannes 2009.  Il revient en 2013 avec une coproduction internationale : le thriller de science-fiction Snowpiercer, le Transperceneige, adaptation du classique de la bande dessinée française homonyme, Le Transperceneige. Joon-ho signe une nouvelle fois lui-même le scénario, et réunit une distribution majoritairement anglo-américaine, menée par Chris Evans, mais complétée par son acteur fétiche Song Kang-ho, qu\'il avait déjà dirigé dans The Host, et la jeune Go Ah-seong. Le long-métrage marque sa seconde incursion dans une fiction de genre adulte et spectaculaire.  En 2014, il est président du jury du 38e Festival international du film de Hong Kong. La même année il est membre du jury du 19e Festival de Busan, sous la présidence d\'Asghar Farhadi.  En février 2015, il fait partie des membres du jury des longs métrages lors du 65e Festival de Berlin, présidé par Darren Aronofsky. Cette même année, le Festival International du Film de Belfort Entrevues lui consacre une rétrospective2.  L\'année 2017 est marquée par la sortie sur Netflix du film de science-fiction Okja, qu\'il identifie comme étant au croisement de The Host et Snowpiercer3. Cette fois, une distribution anglo-américaine — composée notamment de Paul Dano et Tilda Swinton — entoure une actrice principale coréenne.  En mai 2019, son film Parasite, présenté au festival de Cannes 2019, remporte la Palme d\'or à l\'unanimité du Jury4.  En 2020, Bong Joon-Ho remporte le prix du meilleur film en langue étrangère aux Golden Globes, puis il rafle quatre Oscars (meilleur scénario original, meilleur film international, meilleur réalisateur, et meilleur film) ainsi que le César du meilleur film étranger.pour son film Parasite.'),
(2, 'Makoto Shinkai', 'real/makoto_shinkai.jpg', 'Originaire de la préfecture de Nagano, il a étudié la littérature japonaise à l’Université Chūō. Sa passion pour la création remonte aux mangas, anime et romans qu’il lisait au collège. Son anime préféré est Le Château dans le ciel de Hayao Miyazaki. Shinkai a été appelé le \"nouveau Miyazaki\" dans plusieurs revues, bien qu’il réponde c\'est me surestimer. En 1999, Shinkai publie Kanojo to Kanojo no neko, court-métrage de cinq minutes réalisé en noir et blanc, qui est récompensé de plusieurs prix, dont le grand prix du « DoGA CG Animation contest » en 2000. Après ce prix, Shinkai songe à une suite tout en continuant à travailler en tant que graphiste pour Falcom, une entreprise de jeu vidéo. Vers juin 2000, il décide de créer une histoire autour des courriels via téléphone portable (communication de plus en plus répandue à cette période) et dessine une image, celle d’une jeune fille tenant un téléphone portable dans un cockpit. Quelque temps plus tard, il est contacté par Mangazoo, qui lui propose de travailler avec lui et lui permet de transformer son idée en un projet viable. En mai 2001, il quitte son emploi chez Falcom et commence à travailler sur Hoshi no koe, qui nécessitera sept mois de travail. Shinkai réalise ensuite La Tour au-delà des nuages, film d\'animation de 90 minutes sorti le 20 novembre 2004 sur l’ensemble du territoire nippon, acclamé par la critique et récompensé par de nombreux prix. Le projet suivant de Shinkai s’intitule Byousoku 5 centimeter et sort le 3 mars 2007. Il comprend trois films courts, Ōkashō (桜花抄), Cosmonaut (コスモナウト), et Byōsoku 5 Senchimētoru (秒速5センチメートル), pour une durée totale d’une heure.'),
(3, 'Sang-ho Yeon', 'real/Sang_ho_Yeon.jpg', 'Né à Séoul in 1978, Yeon Sang-ho est diplômé en peinture occidentale de la Sangmyung University. Il réalise trois courts métrages d\'animation Megalomania of D, D-Day et The Hell avant de fonder en 2004 son studio d\'animation Studio Dadashow. Ses deux premiers longs métrages sont des films d\'animation King of Pigs (2011) et The Fake (2013). En 2016, il réalise Dernier train pour Busan qui est son premier film qui n\'est pas d\'animation. Ce film est présenté en « Séances de minuit » au Festival de Cannes 2016.'),
(4, 'Hou Hsiao-hsien', 'real/Hou_Hsiao_hsien.jpg', 'Enfant, Hsiao-hsien aime regarder des films et dévore des romans chinois. La maison de ses parents est située à côté d\'un temple taoïste où avaient lieu des spectacles de marionnettes et où étaient données des représentations d\'opéras chinois. Hsiao-hsien effectue son service militaire à 20 ans, et regarde jusqu\'à quatre films par jour pendant ses permissions. Son père, sa mère et sa grand-mère meurent successivement. Il part pour Taipei où il travaille dans une usine. Il s\'inscrit à l\'Académie nationale des arts, section Théâtre et Cinéma, et en sort diplômé. Il débute comme assistant-scénariste et assistant-réalisateur. Il réalise son premier film, une comédie Cute Girl en 1980. Ce film ainsi que les deux suivants (Cheerful Wind et Green, Green Grass of Home) sont des films mineurs dans l\'œuvre de Hou. Comme Hou en convient lui-même, Les Garçons de Fengkuei est le premier film important de sa carrière. Ce film ouvre la partie autobiographique de son œuvre, il remporte la Montgolfière d\'or au Festival des 3 Continents à Nantes pour Les Garçons de Fengkuei, puis pour Un été chez grand-père. Hou raconte ses histoires de manière oblique, réduit l\'intrigue au strict minimum et privilégie la suspension du temps. Son style se compose de très longs plan-séquences avec peu de mouvements de caméra mais une chorégraphie complexe des acteurs dans l\'espace. Hou collabore avec la renommée écrivaine Chu Tien-wen, à l\'écriture de ses scénarios depuis L\'Histoire du petit Bi (1983), film de Chen Kun-hou dont Hou a écrit le scénario et grandement participé à la mise en scène. Il a également travaillé avec le marionnettiste Li Tien-lu comme acteur, notamment dans Le Maître de marionnettes inspiré de la vie de Li. En 2001, Hou Hsiao-Hsien révèle l\'actrice Shu Qi dans Millennium Mambo, en compétition au Festival de Cannes 2001. Hou réalise en 2003 un hommage à Yasujiro Ozu, le film Café Lumière qui ouvre le festival commémorant le centenaire de la naissance du maître. Ce film traite de thèmes récurrents chez Ozu : les tensions entre parents et enfants, entre tradition et modernité. En 2005, Three Times qui a reçu de brillantes critiques, concourait en compétition au 58e Festival de Cannes. Cette chronique est composée de trois histoires d\'amour situées en 1911, 1966 et 2005, toutes interprétées par Shu Qi et Chang Chen. Hou retrouve Shu et la compétition cannoise en 2015 avec The Assassin, fresque se déroulant sous la dynastie Tang au IXe siècle qui revisite de manière inédite le wu xia pian. Cette œuvre, à la narration complexe, reçoit également des critiques très élogieuses.'),
(5, 'Kim Seong-hoon', 'real/Kim_Seong_hoon.jpg', 'Kim Seong-hun a commencé sa carrière cinématographique en tant qu\'assistant réalisateur sur les comédies romantiques Oh! Happy Day (2003; avec Jang Na-ra et Park Jung-chul) et He Was Cool (2004; avec Jeong Da-bin et Song Seung-heon).  En 2006, il réalise son premier long métrage How the Lack of Love Affects Two Men, qui suit un veuf et son fils qui tombent amoureux et se disputent leur nouveau locataire du sous-sol (joué par Baek Yoon-sik, Bong Tae-gyu et Lee Hye-young) .Ce fut un échec critique et commercial, et il aura fallu huit ans avant qu\'il ne puisse obtenir le financement de son deuxième film. Kim a dit: \"C\'était tellement embarrassant de réaliser que c\'était tout ce que je pouvais faire. [...] J\'ai eu la ferme résolution de me donner un nouvel essai avant de mourir.\"  Inspirée par Volver de Pedro Almodóvar, Kim a commencé à écrire un nouveau scénario en 2008, a terminé son premier projet en 2009 et a continué à le monter jusqu\'en 2013, lorsque le tournage a finalement commencé. Il a jeté Lee Sun-kyun comme l\'anti-héros et Cho Jin-woong comme son antagoniste dans une comédie / thriller noir sur un détective homicide corrompu qui cache le corps d\'une victime de délit de fuite dans le cercueil de sa mère pour se retrouver terrorisé par un chantage mystérieux mais redoutable. Une dure journée (le titre coréen se traduit par \"Take It to the End\") a été créée dans la barre latérale de la Quinzaine des réalisateurs du Festival de Cannes 2014 où elle a attiré des critiques unanimement positives, Variety félicitant Kim pour sa \"manipulation\". un récit tendu mais minutieusement tracé avec équilibre, contrôle et exécution technique presque sans faille. \" Au pays, A Hard Day a connu une ouverture terne, mais le bouche à oreille solide l\'a propulsé à devenir un succès au box-office, avec plus de 3,4 millions de billets vendus. Le film a reçu de nombreuses récompenses et nominations, et Kim a remporté le prix du meilleur réalisateur aux 51e Grand Bell Awards, aux 1ers Korean Film Producers Association Awards, aux 6e KOFRA Film Awards, aux 20e Chunsa Film Art Awards et 51e Baeksang Arts Awards, ainsi qu\'au meilleur Scénario au 15e Busan Film Critics Awards et au 35e Blue Dragon Film Awards.'),
(6, 'Philippe Muyl', 'real/Philippe_Muyl.jpg', 'Après un baccalauréat de philosophie, Philippe Muyl étudie en Belgique à l\'École supérieure des arts Saint-Luc de Tournai, dans l\'atelier d\'Yvan Theys, puis à l\'École supérieure de publicité de Paris. Ensuite, pendant plusieurs années, il exerce le métier de directeur artistique chez Publicis et Elvinger, puis de responsable de la publicité de l\'hebdomadaire Pilote. Il exerce en indépendant la fonction de concepteur-rédacteur de publicité pour les agences. Dans les années 1970, il crée une société de production et réalise d\'abord des films industriels et institutionnels. En 1980, il réalise un court-métrage, L\'École des chefs (Prix Fipresci au Festival de Lille). En 1984, il écrit et produit une adaptation du roman Une jeune fille nue de Nikos Athanassiadis, L\'Arbre sous la mer, qui sort le 16 janvier 1985 avec Christophe Malavoy et Julien Guiomar. En 1993, il adapte au cinéma la pièce de théâtre de Jean-Pierre Bacri et Agnès Jaoui Cuisine et dépendances. Son film Le Papillon (2002) ayant eu un grand succès en Chine, il entreprend un projet analogue adapté au marché chinois : Le Promeneur d\'oiseau, tourné en Chine avec des acteurs chinois, sorti en 2012. Le 8 mars 2014, ce film fait la clôture du Festival du film asiatique de Deauville, puis est distribué en France et un peu plus tard en Chine. Il est choisi pour représenter la Chine aux Oscar 2015.'),
(7, 'Park Hoon-jeong', 'real/Park_Hoon_jeong.jpg', 'Park Hoon-jung est un réalisateur et scénariste sud-coréen. Park a d\'abord été remarqué dans l\'industrie cinématographique coréenne pour avoir écrit les scénarios de I Saw the Devil (2010) de Kim Jee-woon et The Unjust (2010) de Ryoo Seung-wan. Il a fait ses débuts en tant que réalisateur en 2011 avec le film d\'époque The Épreuve de force. Avec son deuxième film, gangster epic New World (2013), Park remporte un succès critique et commercial.'),
(8, 'Mamoru Hosoda', 'real/Mamoru_Hosoda.jpg', 'Mamoru Hosoda est né le 19 septembre 1967 dans la ville de Kamiichi, dans la préfecture de Toyama. Après ses études à l\'université des Arts de Kanazawa, il tente d\'intégrer l\'institut de formation du studio Ghibli mais est recalé. Il finit par intégrer le studio Toei Animation en 1991 où il fait ses premiers pas en tant qu\'animateur. Il participe à de nombreuses séries phares du studio comme Dragon Ball Z (1993), Slam Dunk (1994-95) ou Sailor Moon (1996). Dans la deuxième moitié des années 1990, il signe de nombreux storyboards puis passe à la réalisation en 1999 avec le premier film dérivé de la saga Digimon Adventure. Il réalise le deuxième film dérivé en 2000 puis réalise des spots publicitaires en animation pour des grandes marques comme Louis Vuitton. Il est approché par Ghibli pour réaliser Le Château ambulant mais finalement, après mésentente, le projet n\'aboutit pas. Il gardera de cet épisode des sentiments contrastés, reprochant aux studios Ghibli de ne pas laisser s\'exprimer de sensibilité divergeant de celle de ses fondateurs. En 2005, il retourne à la réalisation de long métrage avec le sixième film dérivé de la saga One Piece : Le baron Omatsuri et l\'île aux secrets. En 2005, il quitte la Toei pour devenir free-lance et se rapproche du studio Madhouse. Il y réalise le film La Traversée du temps en 2006 qui tranche par sa maturité avec ses réalisations précédentes, destinées à un public d\'enfants, et Summer Wars en 2009. Son film, Les Enfants loups, Ame et Yuki, sort en 2012 en France, un mois après sa sortie nippone. Son film suivant, Le Garçon et la Bête, sort en juillet 2015 au Japon et en janvier 2016 en France. Puis vient Mirai, courant 2018. Cinq de ses films ont été couronnés par le Japan Academy Prize du meilleur film d\'animation de l\'année : La Traversée du temps, Summer Wars, Les Enfants loups, Le Garçon et la Bête, et Miraï.'),
(9, 'Wilson Yip', 'real/Wilson_Yip.jpg', 'Passionné de cinéma depuis son plus jeune âge, Wilson Yip s\'essaye à tous les genres. Il fait ses débuts dans la réalisation en 1995 avec 01:00 A.M., un film à sketches dont il réalise deux segments sur trois. Puis il réalise successivement un film pour les plus de 18 ans inspiré d\'une histoire vraie, Daze Raper, un film sur les triades, Mongkok Story, un film d\'horreur, Midnight Zone, une comédie romantique, Teaching Sucks, et enfin Bio Zombie, un film influencé par le Zombie de George Romero. En 1999, il met en scène Bullets Over Summer, qui marque un tournant dans sa carrière. Ce film policier, avec les stars Francis Ng et Louis Koo, remporte de nombreux prix, dont celui du meilleur scénario aux Hong Kong Film Critics Society Awards de 2000. Il réalise ensuite un film d\'action, Skyline Cruisers, un film de science-fiction, 2002, et deux nouvelles comédies romantiques, Dry Wood, Fierce Fire et Leaving Me, Loving You. En 2004, il met en scène son premier wu xia pian, The White Dragon. À partir de 2005, il entame une collaboration avec Donnie Yen en tournant trois films d\'action, SPL : Sha po lang, Dragon Tiger Gate et Flash Point, et trois films de kung-fu, Ip Man, Ip Man 2, et Ip Man 3— Ip Man est un expert en wing chun, connu en Occident pour avoir été le maître de Bruce Lee.'),
(10, 'Hayao Miyazaki', 'real/Hayao_Miyazaki.jpg', 'Contrainte de fuir Tokyo, sa ville natale, sous les bombardements de l\'armée américaine, la famille de Miyazaki s\'installe à quelques kilomètres de la capitale. Cette expérience laissera une empreinte profonde chez le cinéaste, beaucoup des thèmes (pêle-mêle l\'aviation, le deuil, l\'enfance, l\'attachement à la nature) qui sont explorés au travers de son oeuvre provenant de cette période.  Inconditionnel de bandes dessinées, il trouve très tôt sa vocation. A l\'université de Tokyo, il suit des cours d\'économie mais ne renonce pas pour autant à son rêve. Il profite du temps libre que lui laisse ses études pour parfaire son coup de crayon et perfectionner une technique qui ne tarde pas le faire remarquer du studio d\'animation Tôei, la référence nippone en la matière à l\'époque. Il y entre en tant qu\'intervalliste en 1963.  Après quelques projets inaboutis, Miyazaki décide de se consacrer à la bande dessinée et élabore l\'épopée à épisodes Nausicaä de la vallée du vent. C\'est par ce biais que le cinéaste revient en force dans le monde de l\'animation. Il porte à l\'écran sa propre bande dessinée et fait l\'unanimité avec Nausicaä de la vallée du vent en 1984. Le succès du film est tel qu\'il permet à Takahata et Miyazaki de fonder leurs propres studios. Ghibli est né.   En 1997, le réalisateur s\'attaque à Princesse Mononoké. Le film remporte un énorme succès au Japon attirant près de 15 millions de spectateurs - un record pour un film d\'animation-. Alors qu\'il avait menacé de mettre un terme à sa carrière, il poursuit finalement sur sa lancée et réalise Le Voyage de Chihiro.  Parallèlement Miyazaki inaugure un musée à la gloire de l\'animation : le musée Ghibli à Mitaka, au Japon. Il ne délaisse pas les planches à dessin pour autant et s\'attelle à la réalisation du Le Château ambulant, inspiré d\'un roman de Diana Wynne Jones. En septembre 2013, le maître annonce officiellement sa retraite en tant que réalisateur de films d\'animation. A 72 ans, il estime qu\'un long métrage prendrait trop de temps. C\'est ainsi qu\'il quitte le métier la même année avec Le Vent se lève, un film plus réaliste mais comportant quelques séquences de rêve.'),
(11, 'Wang Xiaoshuai', 'real/Wang_Xiaoshuai.jpg', 'Diplômé de l\'académie du cinéma de Pékin, Wang Xiaoshuai fait partie de la génération de réalisateurs chinois, qui apparaît dans les années 1990. En 1993, il réalise son premier long-métrage The Days, à l\'âge de 27 ans. Son 3e long-métrage, Frozen, sort sous le pseudonyme Wu Min (« sans nom »). Il commence à acquérir une réputation à l\'international avec la sélection de ses films So Close To Paradise et Drifters dans la section Un certain regard du festival de Cannes. Il remporte par la suite le prix du jury pour Shanghai Dreams lors de la 58e édition cannoise en 2005. Il obtient également une plus grande reconnaissance internationale grâce au festival de Berlin où il remporte l\'Ours d\'argent (grand prix) pour Beijing Bicycle et l\'Ours d\'argent du meilleur scénario pour Une famille chinoise. En 2011, il présente le film 11 Fleurs, première co-production franco-chinoise. Il dévoile son 11e long-métrage, Red Amnesia, à la Mostra de Venise 2014. Une rétrospective de son œuvre a été présentée au festival du film chinois de Paris en 2012.'),
(12, 'Jackie Chan', 'real/Jackie_Chan.jpg', 'Jackie Chan entre à l\'âge de 7 ans à l\'Académie dramatique de Pékin où il passe ses journées à s\'entraîner au kung-fu. Il commence sa carrière très jeune comme cascadeur, puis comme figurant. En 1972, il côtoie ainsi son modèle Bruce Lee dans La Fureur de vaincre, qu\'il retrouvera dans quelques-uns de ses succès (Operation dragon, New Fist of Fury), toujours dans des rôles mineurs.  Jackie Chan prend vite du galon. Il tourne avec le confirmé Lo Wei et les débutants John Woo et Yuen Woo Ping, ce dernier lui offrant deux de ses plus grands succès : Drunken Master et Snake in the Eagle\'s Shadow. Dans ces films, Jackie Chan commence à développer un style particulier mêlant action et comédie, style qui deviendra sa marque de fabrique. Désormais star, il commence à réaliser lui-même une partie de ses films à partir de 1977 et The 36 Crazy Fists.  Superstar à Hong-Kong, Jackie Chan tente, à l\'instar de Bruce Lee, de séduire les Etats-Unis. D\'abord avec The Big Brawl, en 1980, puis avec L\' Equipée du cannonball et The Protector. L\'expérience est très mitigée, alors qu\'en Asie, sa popularité ne se dément pas. Il tourne avec les plus grands comme Sammo Hung et Jing Wong et réalise certains de ses meilleurs films, où son style excelle (la série des Police Story).  Au début des années 1990, le tiraillement de l\'acteur élastique entre Hong Kong et les Etats-Unis se fait de plus en plus explicite dans ses films. Il incarne deux jumeaux vivant chacun d\'un côté du Pacifique sans se connaître dans Double Dragon (1992), est partagé entre forces occidentales et loyalistes orientaux dans Drunken Master II (1994), et va aider un oncle à New-York dans Jackie Chan dans le Bronx de Stanley Tong (1996), cinéaste qu\'il retrouvera pour Contre-attaque.   Référence incontournable en arts martiaux, il n\'est pas étonnant de le retrouver en 2010, à l\'affiche de Karaté Kid, remake du classique du genre sorti en 1984. Il y occupe un rôle rare dans sa filmographie, jouant le maître sage de Jaden Smith, fils de Will producteur, dans une prestation (presque) privée de combats, une première. Jackie continue ensuite de s\'amuser dans des films d\'animation en reprenant son rôle du Singe dans Kung Fu Panda 2 et 3. Il donne aussi de la voix dans Opération casse-noisette 2 ou Lego Ninjago Le film.  Le comédien continue toutefois de jouer dans des films d\'action malgré son âge, prouvant qu\'il tient toujours une forme olympique. ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` text NOT NULL,
  `mdp` text NOT NULL,
  `pseudo` text NOT NULL,
  `mail` text NOT NULL,
  `photo` text NOT NULL,
  `Admin` text NOT NULL,
  `ban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `login`, `mdp`, `pseudo`, `mail`, `photo`, `Admin`, `ban`) VALUES
(1, 'Gui', '$2y$10$D0NcmtPC8uIILFQXo3Klq.RWTQjUEEMnKCEA0iXme4G/wKUjCa.TS', 'Saint-14', 'myoartyom@gmail.com', 'usr/default.png', 'oui', 'non'),
(2, 'Lea', '$2y$10$XRY01LlDK.VV1BA7GsSbxesFhA20mU2U.gLYiaXrnKFSpJS8sRio.', 'Shin malphur', 'lea@gmail.com', 'usr/default.png', 'oui', 'non'),
(3, 'admin', '$2y$10$CAjPvwVU6.GK3cGF8kN75ewgISV6iMLCFNK9vYdqxP2k2fDKwWIJe', 'admin', 'admin@gmail.com', 'usr/default.png', 'oui', 'non'),
(4, 'Test_banL', '$2y$10$C7qxHGHOE7lrSg8EQqIZ..0H0.7CcUOfSRP5ZJc/f/HBq97kvLyo2', 'Test_banP', 'ban@mail.com', 'usr/default.png', 'non', 'oui'),
(5, 'Test_FAV', '$2y$10$O4QZH9KC2crO1ntWlywu5eqoNLINUL27BpW2fLr4GsH86urBzfM6a', 'Test_fav', 'fav@mail.com', 'usr/default.png', 'non', 'non'),
(8, 'TestCookieL', '$2y$10$gxtj11l3VIS.oo91iI/tk.1M7iwi3gybS6hWXYkrTOZVGa0Opnof2', 'Test_cookie', 'test@gmail.com', 'usr/default.png', 'non', 'non');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`nb`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `test` (`login`(255),`mail`(255),`pseudo`(255)) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `nb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `films` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
