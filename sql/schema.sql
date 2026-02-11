-- Création de la base de données
CREATE DATABASE IF NOT EXISTS bibliotheque;
USE bibliotheque;

-- Table auteurs
CREATE TABLE IF NOT EXISTS auteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    biographie TEXT
);

-- Table categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(191) NOT NULL UNIQUE
);

-- Table livres
CREATE TABLE IF NOT EXISTS livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur_id INT NOT NULL,
    categorie_id INT NOT NULL,
    annee_publication INT,
    isbn VARCHAR(20) UNIQUE,
    disponible BOOLEAN DEFAULT TRUE,
    synopsis TEXT,
    `like` BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (auteur_id) REFERENCES auteurs(id) ON DELETE CASCADE,
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
);


INSERT INTO auteurs (nom, prenom, biographie) VALUES
('Hugo', 'Victor', '## Victor Hugo

Victor Hugo (1802–1885) est l\'un des plus grands écrivains de la littérature française. Poète, romancier, dramaturge et homme politique, son œuvre couvre plus de six décennies et aborde des thèmes universels tels que la liberté, la justice sociale, la condition humaine et l\'amour.

Parmi ses ouvrages majeurs figurent *Les Misérables* et *Notre-Dame de Paris*, qui ont marqué profondément l\'imaginaire collectif. Son écriture mêle lyrisme, engagement politique et profondeur philosophique.

Biographie synthétique :
- Né à Besançon en 1802.
- Exilé pendant de nombreuses années en raison de ses prises de position politiques.
- Mort à Paris en 1885; son décès donna lieu à des funérailles nationales.

Son héritage littéraire continue d\'influencer la poésie, le roman et le théâtre. Sa capacité à décrire les souffrances et les espoirs des peuples fait de lui une figure intemporelle.'),
('Austen', 'Jane', '## Jane Austen

Jane Austen (1775–1817) est une romancière anglaise reconnue pour ses portraits subtils de la société anglaise du début du XIXe siècle. Elle excelle dans l\'analyse des relations sociales et des contraintes féminines de son époque.

Ses romans, comme *Pride and Prejudice* et *Emma*, combinent ironie, observation sociale et personnages mémorables.

Thèmes récurrents : mœurs sociales, amour, indépendance d\'esprit. Sa prose reste largement étudiée et adaptée.'),
('Dupont', 'Pierre', '## Pierre Dupont

Pierre Dupont est un auteur contemporain utilisé ici comme entrée de test. Sa carrière littéraire imaginaire explore la fiction réaliste et les récits intimistes.

Ses écrits se concentrent sur les relations humaines et les bouleversements personnels au sein d\'un contexte social en mutation.

Biographie synthétique :
- Formation littéraire approfondie.
- Intérêt pour le roman social et la critique discrète des institutions.

Son style mêle description soignée et dialogues vivants pour donner vie à ses personnages.'),
('Martin', 'Claire', '## Claire Martin

Claire Martin se distingue par son approche sensible des thèmes familiaux et générationnels. Elle construit des récits où les non-dits jouent un rôle central.

Son œuvre, principalement composée de romans courts et de nouvelles, privilégie la psychologie des personnages et les atmosphères feutrées.

Points forts : profondeur des personnages, économie narrative, sensibilité.'),
('Bernard', 'Luc', '## Luc Bernard

Luc Bernard est un auteur de fiction axé sur les récits d\'aventure contemporaine. Il aime confronter ses protagonistes à des choix moraux et à des environnements contraignants.

Son écriture est rythmée, souvent portée par des scènes fortes et une progression narrative soutenue.'),
('Petit', 'Sophie', '## Sophie Petit

Sophie Petit est une écrivaine polyvalente explorant la littérature jeunesse et la fiction pour adultes. Ses œuvres cherchent à sensibiliser les lecteurs à l\'empathie et à la découverte.

Elle use d\'un langage limpide et d\'images simples pour aborder des sujets complexes de manière accessible.'),
('Robert', 'Jean', '## Jean Robert

Jean Robert est un romancier fictif dont les histoires traitent souvent de l\'identité et du parcours personnel. Son style combine description détaillée et introspection.'),
('Richard', 'Marie', '## Marie Richard

Marie Richard écrit des récits contemporains centrés sur les parcours de femmes. Elle met en avant la résilience et la quête d\'autonomie de ses personnages.'),
('Moreau', 'Paul', '## Paul Moreau

Paul Moreau se concentre sur la fiction historique, reconstituant des époques passées avec soin et érudition. Ses romans allient documentation et invention narrative.'),
('Simon', 'Julie', '## Julie Simon

Julie Simon développe des nouvelles et textes courts où l\'imprévu et le quotidien sont magnifiés. Son écriture poétique privilégie la sensation et le détail.'),
('Laurent', 'Nicolas', '## Nicolas Laurent

Nicolas Laurent compose des récits contemporains influencés par la musique et la culture urbaine. Son style est direct et vivant.'),
('Lefebvre', 'Isabelle', '## Isabelle Lefebvre

Isabelle Lefebvre explore la mémoire, la famille et la transmission dans une prose attentive et sensible.'),
('Mercier', 'Thomas', '## Thomas Mercier

Thomas Mercier est connu pour ses essais et réflexions sur la société moderne, mêlant observation et analyse critique.'),
('Roux', 'Laura', '## Laura Roux

Laura Roux écrit des romans d\'atmosphère où les lieux deviennent des personnages à part entière. Son écriture privilégie les sensations et les ambiances.'),
('Fournier', 'Antoine', '## Antoine Fournier

Antoine Fournier est un auteur de romans policiers fictifs, aimant les intrigues serrées et les revirements de situation.'),
('Morel', 'Emma', '## Emma Morel

Emma Morel explore la littérature contemporaine axée sur les relations humaines et la reconstruction personnelle après des événements marquants.'),
('Garnier', 'Julien', '## Julien Garnier

Julien Garnier aime travailler les formes courtes : nouvelles, récits brefs et portraits, avec un sens aigu du détail.'),
('Chevalier', 'Camille', '## Camille Chevalier

Camille Chevalier écrit des pièces de théâtre et des textes dialogués, privilégiant la tension dramatique et le jeu des personnages.'),
('Gauthier', 'Alexandre', '## Alexandre Gauthier

Alexandre Gauthier est un auteur polyvalent s\'essayant tant à la fiction qu\'au récit documentaire. Il s\'intéresse aux parcours de vies atypiques.'),
('Perrin', 'Laura', '## Laura Perrin

Laura Perrin compose des romans introspectifs centrés sur le passage à l\'âge adulte et les ruptures personnelles.'),
('Lemoine', 'Olivier', '## Olivier Lemoine

Olivier Lemoine est un auteur qui aime mêler humour et gravité, offrant des récits où la comédie côtoie des moments plus profonds.'),
('Faure', 'Charlotte', '## Charlotte Faure

Charlotte Faure écrit principalement pour la jeunesse, avec une attention particulière portée à l\'éveil et à l\'imagination.'),
('Renaud', 'Hugo', '## Hugo Renaud

Hugo Renaud crée des récits contemporains mêlant réalisme et éléments poétiques, centrés sur des personnages en quête de sens.'),
('Andre', 'Elise', '## Elise Andre

Elise Andre aborde dans ses textes des thématiques liées à l\'identité, la famille et la place de l\'individu dans la société.'),
('Blanc', 'Marc', '## Marc Blanc

Marc Blanc écrit des romans d\'ambiance, souvent situés dans des contextes ruraux ou industriels, avec une attention aux paysages sociaux.'),
('Gillet', 'Anne', '## Anne Gillet

Anne Gillet propose des textes engagés et sensibles, abordant la solidarité et les petites victoires du quotidien.'),
('Aubert', 'Didier', '## Didier Aubert

Didier Aubert est un écrivain qui privilégie le réalisme social et la peinture de caractères forts.'),
('Dupuis', 'Celine', '## Celine Dupuis

Celine Dupuis écrit des romans contemporains où l\'émotion et le tempo narratif forment l\'armature principale.'),
('Leroy', 'Pascal', '## Pascal Leroy

Pascal Leroy est un conteur moderne, aimant les fresques familiales et les sagas de plusieurs générations.'),
('Boyer', 'Nathalie', '## Nathalie Boyer

Nathalie Boyer explore la thématique de la résilience et du dépassement de soi dans ses récits.'),
('Girard', 'Vincent', '## Vincent Girard

Vincent Girard développe des intrigues psychologiques et des portraits intenses de personnages ambigus.'),
('Giraud', 'Sophie', '## Sophie Giraud

Sophie Giraud écrit des textes courts, sensibles et souvent empreints d\'une touche de mélancolie poétique.'),
('Colin', 'Benoit', '## Benoit Colin

Benoit Colin aime intégrer des éléments de voyage et d\'exploration dans ses récits, mêlant découverte et réflexion personnelle.'),
('Masson', 'Cecile', '## Cecile Masson

Cecile Masson se consacre à la littérature féminine contemporaine, avec un regard critique et bienveillant sur les trajectoires de vie.'),
('Henry', 'Laurie', '## Laurie Henry

Laurie Henry écrit des essais et des chroniques, souvent centrés sur la vie culturelle et les arts visuels.'),
('Noel', 'Adrien', '## Adrien Noel

Adrien Noel compose des romans d\'atmosphère où le mystère et le questionnement intime tiennent une place centrale.'),
('Bertrand', 'Claire', '## Claire Bertrand

Claire Bertrand traite de la mémoire et des héritages familiaux dans une prose élégante et réfléchie.'),
('Leclerc', 'Simon', '## Simon Leclerc

Simon Leclerc écrit des récits contemporains mêlant satire sociale et humour noir, avec un sens aigu de la formule.'),
('Gomez', 'Isabel', '## Isabel Gomez

Isabel Gomez propose des histoires interculturelles, mettant en lumière des parcours migratoires et identitaires.'),
('Vidal', 'Romain', '## Romain Vidal

Romain Vidal explore la frontière entre réalité et fiction, jouant sur les perspectives narratives pour surprendre le lecteur.'),
('Arias', 'Lucie', '## Lucie Arias

Lucie Arias écrit des récits sensibles sur l\'enfance et l\'apprentissage du monde, avec une grande finesse psychologique.'),
('Perrot', 'Morgane', '## Morgane Perrot

Morgane Perrot propose des textes engagés abordant les enjeux contemporains et les luttes sociales à travers des voix intimes.'),
('Baron', 'Jean-Pierre', '## Jean-Pierre Baron

Jean-Pierre Baron est un auteur d\'essais et de récits documentaires, attaché à la restitution fine des contextes historiques.'),
('Laurie', 'Emmanuel', '## Emmanuel Laurie

Emmanuel Laurie écrit des romans contemporains centrés sur la quête d\'identité et la complexité des relations interpersonnelles.'),
('Marchand', 'Sabrina', '## Sabrina Marchand

Sabrina Marchand privilégie les voix féminines et les portraits intimes, avec une écriture directe et sensible.'),
('Poitou', 'Damien', '## Damien Poitou

Damien Poitou aime les récits de voyage et d\'aventure, transposant souvent ses personnages dans des paysages lointains.'),
('Vasseur', 'Aline', '## Aline Vasseur

Aline Vasseur écrit des textes où les petites choses de la vie deviennent des révélateurs d\'émotions profondes.');

-- Catégories (~10)
INSERT INTO categories (nom) VALUES
('Roman'),
('Science-fiction'),
('Histoire'),
('Philosophie'),
('Poésie'),
('Théâtre'),
('Fantastique'),
('Biographie'),
('Documentaire'),
('Jeunesse');

-- Livres (~100) : les auteurs et catégories sont assignés cycliquement
INSERT INTO livres (titre, auteur_id, categorie_id, annee_publication, isbn, disponible, synopsis) VALUES
('Les Misérables', 1, 1, 1862, 'ISBN-000001', TRUE, '## Les Misérables

Une épopée de la rédemption et de la justice sociale. Jean Valjean, ancien forçat, cherche l\'rédemption tandis que l\'inspecteur Javert le poursuit impitoyablement. À travers les rues de Paris et les barricades révolutionnaires, Hugo explore la miséricorde, le sacrifice et la transformation humaine.'),
('Pride and Prejudice', 2, 1, 1813, 'ISBN-000002', TRUE, '## Pride and Prejudice

Elizabeth Bennet refuse de se conformer aux attentes de la société. Quand le riche et hautain M. Darcy entre dans sa vie, un affrontement wit et psychologique commence. Un roman d\'amour où les préjugés doivent être surmontés.'),
('Crime and Punishment', 3, 3, 1866, 'ISBN-000003', TRUE, '## Crime and Punishment

Raskolnikov, un jeune intellectuel impoverished, commet un crime pour tester sa théorie philosophique. Hanté par la culpabilité, il est poursuivi par le détective Porfiry et redemption. Un sondage profond de la conscience morale.'),
('War and Peace', 4, 4, 1869, 'ISBN-000004', TRUE, '## War and Peace

Une fresque épique mêlant histoire et fiction personnelle pendant les guerres napoléoniennes. Tolstoy suit plusieurs familles aristocratiques russes à travers amour, guerre, mort et l\'éternelle quête de sens.'),
('Moby-Dick', 5, 5, 1851, 'ISBN-000005', TRUE, '## Moby-Dick

Le capitaine Ahab obsédé par la capture d\'une baleine blanche légendaire. Une aventure maritime devenant méditation sur l\'ambition humaine, le destin, et la lutte contre les forces indomptables de la nature.'),
('The Great Gatsby', 6, 6, 1925, 'ISBN-000006', TRUE, '## The Great Gatsby

Jay Gatsby, un homme riche et mystérieux, organise des fêtes somptueuses pour reconquérir son amour perdu. Un portrait de l\'Amérique des années 1920 explorant l\'aspiration, la richesse et l\'illusion du rêve américain.'),
('Ulysses', 7, 7, 1922, 'ISBN-000007', TRUE, '## Ulysses

Une journée dans la vie de Leopold Bloom à Dublin. Joyce transpose l\'Odyssée d\'Homère en modernité urbaine, révolutionnant la littérature avec stream-of-consciousness et langage expérimental.'),
('Don Quixote', 8, 8, 1605, 'ISBN-000008', TRUE, '## Don Quixote

Un gentleman espagnol fou devient chevalier itinérant, voyant le monde à travers le prisme de la chevalerie romanesque. Une satire intemporelle combinant folie, idéalisme et humanité.'),
('The Brothers Karamazov', 9, 9, 1880, 'ISBN-000009', TRUE, '## The Brothers Karamazov

Quatre frères confrontés au meurtre de leur père. Dostoïevski explore la foi, le doute, la culpabilité et la rédemption à travers des dialogues philosophiques profonds et psychologie complexe.'),
('Anna Karenina', 10, 10, 1877, 'ISBN-000010', TRUE, '## Anna Karenina

Une femme aristocratique abandonne tout pour l\'amour, menant à la tragédie. Tolstoy entrelace l\'histoire d\'Anna avec celle de Levin, explorant l\'amour, le mariage et la quête de vie authentique.'),
('Madame Bovary', 11, 1, 1856, 'ISBN-000011', TRUE, '## Madame Bovary

Une femme de province, nourrie par la lecture romanesque, se sent étouffée par son mariage ordinaire. Son quête du romantisme réel entraîne infidélité et désastre. Une critique subversive des conventions.'),
('The Count of Monte Cristo', 12, 2, 1844, 'ISBN-000012', TRUE, '## The Count of Monte Cristo

Edmond Dantes, jeune marin innocent, est emprisonné injustement. Après 14 ans, il s\'échappe, découvre un trésor, et revient déguisé en comte mystérieux pour vengeance et rédemption.'),
('To Kill a Mockingbird', 13, 3, 1960, 'ISBN-000013', TRUE, '## To Kill a Mockingbird

Scout Finch grandit dans le Sud ségrégationniste. Son père, avocat, défend un homme noir accusé injustement. Harper Lee explore l\'injustice raciale, l\'intégrité et la perte d\'innocence.'),
('1984', 14, 4, 1949, 'ISBN-000014', TRUE, '## 1984

Un régime totalitaire contrôle chaque aspect de la vie. Winston Smith tente une rébellion. Orwell crée une dystopie chilling où liberté et vérité sont réécrites par le pouvoir.'),
('Brave New World', 15, 5, 1932, 'ISBN-000015', TRUE, '## Brave New World

Un futur où les citoyens sont génétiquement programmés et chimiquement sedated pour le bonheur. Huxley explore le contrôle social, l\'indépendance et le prix du confort.'),
('The Catcher in the Rye', 16, 6, 1951, 'ISBN-000016', TRUE, '## The Catcher in the Rye

Holden Caulfield, adolescent tourmenté, dérive à New York. Salinger capture la voix rebellious d\'une jeunesse inadaptée criticant la fausseté du monde des adultes.'),
('The Hobbit', 17, 7, 1937, 'ISBN-000017', TRUE, '## The Hobbit

Bilbo Sacquet, un hobbit pacifique, est entraîné dans une quête pour un trésor dragonne. Tolkien tisse une aventure fantastique d\'humour, danger et découverte de soi.'),
('The Lord of the Rings', 18, 8, 1954, 'ISBN-000018', TRUE, '## The Lord of the Rings

Frodo doit détruire un anneau de pouvoir maléfique en le jetant dans un volcan. L\'épopée fantasy ultime explorante amitié, sacrifice, et la victoire du bien contre le mal.'),
('One Hundred Years of Solitude', 19, 9, 1967, 'ISBN-000019', TRUE, '## One Hundred Years of Solitude

Plusieurs générations de la famille Buendía vivent dans un village isolé. García Márquez tisse réalisme magique avec cycles de répétition, amour et solitude.'),
('The Grapes of Wrath', 20, 10, 1939, 'ISBN-000020', TRUE, '## The Grapes of Wrath

La famille Joad, ruinée par la sécheresse, migre en Californie. Steinbeck capture la lutte des ouvriers agricoles et l\'esprit indomptable face à l\'injustice économique.'),
('Lolita', 21, 1, 1955, 'ISBN-000021', TRUE, '## Lolita

Un homme obédé paedophile raconte son affair avec une jeune fille. Nabokov produit une critique morale tout en créant une prose exquis, questionnant fiabilité du narrateur.'),
('Catch-22', 22, 2, 1961, 'ISBN-000022', TRUE, '## Catch-22

Un pilote bombardier pendant la Seconde Guerre cherche un moyen d\'échapper aux missions. Heller utilise satire absurde pour critiquer la logique folle de la guerre.'),
('Slaughterhouse-Five', 23, 3, 1969, 'ISBN-000023', TRUE, '## Slaughterhouse-Five

Billy Pilgrim devient "unstuck in time," expérimentant sa vie dans l\'ordre aléatoire. Vonnegut mélange science-fiction avec les horreurs réelles du bombardement de Dresde.'),
('Beloved', 24, 4, 1987, 'ISBN-000024', TRUE, '## Beloved

Sethe, une femme esclave, tue son enfant plutôt que d\'être retournée à l\'esclavage. Le ghost de l\'enfant hante sa maison. Morrison exorcise trauma racial américain.'),
('The Stranger', 25, 5, 1942, 'ISBN-000025', TRUE, '## The Stranger

Meursault, un homme émotionnellement détaché, tue quelqu\'un dans l\'indifférence. Camus explore l\'absurdité existentielle et l\'aliénation humaine.'),
('The Sun Also Rises', 26, 6, 1926, 'ISBN-000026', TRUE, '## The Sun Also Rises

Les jeunes expatriés américains dériver à travers l\'Europe post-guerrière, cherchant sens et plaisir. Hemingway capture lost generation\'s malaise avec prose concise.'),
('Heart of Darkness', 27, 7, 1899, 'ISBN-000027', TRUE, '## Heart of Darkness

Marlow voyage en Congo à la recherche du mystérieux Kurtz. Conrad examen colonialisme, l\'inconscient, et l\'obscurité inhérente à la condition humaine.'),
('The Odyssey', 28, 8, -800, 'ISBN-000028', TRUE, '## The Odyssey

Ulysse lutte pour rentrer à Ithaque après la Trojan War. Homère compose l\'épopée ultime d\'aventure maritime, dieux intervenants, et le héros civilisé.'),
('The Iliad', 29, 9, -750, 'ISBN-000029', TRUE, '## The Iliad

Le siège de Troie pendant dix ans. Homère raconte la guerre, l\'honneur, la mort, et les dieux médiateurs. Fondation de la littérature occidentale.'),
('A Tale of Two Cities', 30, 10, 1859, 'ISBN-000030', TRUE, '## A Tale of Two Cities

Pendant la Révolution française, un homme se sacrifie pour l\'amour. Dickens entrelace Londres et Paris, amour et résurrection, sacrifice et rédemption.'),
('Frankenstein', 31, 1, 1818, 'ISBN-000031', TRUE, '## Frankenstein

Victor Frankenstein crée une créature vivante qui le poursuit. Mary Shelley explore l\'hybris scientifique, responsabilité, et l\'isolement de la créature.'),
('Dracula', 32, 2, 1897, 'ISBN-000032', TRUE, '## Dracula

Le comte vampire Dracula vient en Angleterre. Stoker raconte l\'histoire par lettres et journaux, mêlant horreur gothique avec technologie moderne.'),
('The Picture of Dorian Gray', 33, 3, 1890, 'ISBN-000033', TRUE, '## The Picture of Dorian Gray

Dorian Gray fait un pacte pour rester jeune. Son portrait vieillit à sa place. Wilde explore décadence, moralité, et corruption du beau.'),
('The Trial', 34, 4, 1925, 'ISBN-000034', TRUE, '## The Trial

K. est arrêté pour un crime jamais expliqué. Kafka crée une bureaucratie cauchemardesque absurde où culpabilité est présumée et justice impossible.'),
('The Metamorphosis', 35, 5, 1915, 'ISBN-000035', TRUE, '## The Metamorphosis

Gregor Samsa se réveille transformé en insecte géant. Kafka explore absurdité existentielle, famille, et l\'aliénation sous le capitalisme.'),
('The Old Man and the Sea', 36, 6, 1952, 'ISBN-000036', TRUE, '## The Old Man and the Sea

Santiago, un vieux pêcheur, lutte contre un grand poisson marin. Hemingway crée parable de l\'humain contre nature, dignité dans la défaite.'),
('The Road', 37, 7, 2006, 'ISBN-000037', TRUE, '## The Road

Un père et son fils voyagent à travers post-apocalyptic wasteland. McCarthy explore amour parental, survie, et sens dans un monde sans espoir.'),
('The Alchemist', 38, 8, 1988, 'ISBN-000038', TRUE, '## The Alchemist

Santiago, un berger jeune, cherche un trésor en Égypte. Coelho crée fable inspirante sur suivre ses rêves et reconnaissance personnelle.'),
('The Little Prince', 39, 9, 1943, 'ISBN-000039', TRUE, '## The Little Prince

Un jeune prince visite planètes avant d\'atterrir Earth. Saint-Exupéry mêle conte de fées avec philosophie sur l\'amour, la perte et l\'innocence.'),
('Don DeLillo''s White Noise', 40, 10, 1985, 'ISBN-000040', TRUE, '## White Noise

Une famille de classe moyenne balance consommérisme, technologie, et peur de la mort. DeLillo critique irony le bavardage incessant de la culture moderne.'),
('Invisible Man', 41, 1, 1952, 'ISBN-000041', TRUE, '## Invisible Man

Un homme noir en Amérique devient littéralement invisible. Ellison explorate identité raciale, idéologie, et quête d\'individuation.'),
('Mrs Dalloway', 42, 2, 1925, 'ISBN-000042', TRUE, '## Mrs Dalloway

Une journée dans la vie de Clarissa Dalloway, femme Londres aisée. Woolf use stream-of-consciousness pour explorer conscience intérieure et passage du temps.'),
('A Passage to India', 43, 3, 1924, 'ISBN-000043', TRUE, '## A Passage to India

Une Anglaise visite Inde coloniale et est accusée d\'assaut. Forster examine imperialisme, amitié inter-raciale, et mystère impénétrable.'),
('Their Eyes Were Watching God', 44, 4, 1937, 'ISBN-000044', TRUE, '## Their Eyes Were Watching God

Janie recherche l\'amour vrai et indépendance. Hurston célèbre voix féminine noire avec langage lyrique et dialect riche.'),
('The Sound and the Fury', 45, 5, 1929, 'ISBN-000045', TRUE, '## The Sound and the Fury

La family Compson declins à travers narrative fragments. Faulkner utilise stream-of-consciousness et chronologie non-linéaire pour portraire décadence sudiste.'),
('On the Road', 46, 6, 1957, 'ISBN-000046', TRUE, '## On the Road

Sal Paradise et Dean Moriarty drive criss-cross America. Kerouac captures beat generation\'s spirit, wanderlust, friendship, et search pour autenticité.'),
('The Handmaid''s Tale', 47, 7, 1985, 'ISBN-000047', TRUE, '## The Handmaid''s Tale

Offred vit dans République théocratique dystopique où femmes sont reproductrices. Atwood crée feminist cautionary tale sur contrôle corporel et liberté.'),
('The Kite Runner', 48, 8, 2003, 'ISBN-000048', TRUE, '## The Kite Runner

Amir et Hassan sont amis in Afghanistan avant talibans. Le roman explore trahison, rédemption, et retour à maison pour confronter past.'),
('Life of Pi', 49, 9, 2001, 'ISBN-000049', TRUE, '## Life of Pi

Pi survit 227 jours en bateau lifeboat avec un tigre. Yann Martel mêle survival adventure avec spiritualité, storytelling, et foi.'),
('The Da Vinci Code', 50, 10, 2003, 'ISBN-000050', TRUE, '## The Da Vinci Code

Robert Langdon résout mystères connectant Leonardo da Vinci avec histoire chrétienne secrète. Brown entrelace art, histoire, et conspiracies.'),
('The Name of the Rose', 1, 1, 1980, 'ISBN-000051', TRUE, '## The Name of the Rose

Dans monastère médiéval, moines sont mystérieusement tués. Eco crée thriller intellectuel explorant semiotics, medievalism, et clôture textuelle.'),
('The Shadow of the Wind', 2, 2, 2001, 'ISBN-000052', TRUE, '## The Shadow of the Wind

Daniel recherche l\'auteur de mystérieux livre dans Barcelona post-guerre. Zafón tisse mystery, amour, et Gothic atmosphere.'),
('Memoirs of a Geisha', 3, 3, 1997, 'ISBN-000053', TRUE, '## Memoirs of a Geisha

Sayuri devient geisha et vit expériences d\'art, exploitation, et survie en Japan. Golden explores culture traditionnel et agentive.'),
('The Curious Incident of the Dog in the Night-Time', 4, 4, 2003, 'ISBN-000054', TRUE, '## The Curious Incident

Christopher, autiste avec savant mathématique, enquête chien mort. Haddon présente unique perspective neurodivergent.'),
('The Road to Wigan Pier', 5, 5, 1937, 'ISBN-000055', TRUE, '## The Road to Wigan Pier

Orwell rapporte conditions ouvrier mining en Lancashire. Critique sociale puissante de classe inégalité en Angleterre.'),
('The Old Curiosity Shop', 6, 6, 1841, 'ISBN-000056', TRUE, '## The Old Curiosity Shop

Nell et son grandfather voyagent Angleterre victorienne. Dickens weaves sentiment avec social criticism de pauvreté enfance.'),
('Middlemarch', 7, 7, 1871, 'ISBN-000057', TRUE, '## Middlemarch

Plusieurs histoires entrelaced dans petite English town. George Eliot crée tapestry complexe d\'ambition, love, et moral development.'),
('Persuasion', 8, 8, 1817, 'ISBN-000058', TRUE, '## Persuasion

Anne Elliot et son ancien amour se retrouvent après années. Austen explore deuxième chances, aged passion, et merit over status.'),
('Northanger Abbey', 9, 9, 1817, 'ISBN-000059', TRUE, '## Northanger Abbey

Catherine obsédée par gothic novels rencontre réalité. Austen satire genres romanticque tout en creator bildungsroman sweet.'),
('The Bell Jar', 10, 10, 1963, 'ISBN-000060', TRUE, '## The Bell Jar

Esther Greenwood déscends mentale illness en 1950s America. Plath capture acuity depression et oppressive expectations des femmes.'),
('The Scarlet Letter', 11, 1, 1850, 'ISBN-000061', TRUE, '## The Scarlet Letter

Hester porte lettre scarlet "A" en Puritan Boston. Hawthorne explores culpabilité, secret, et redemption en contexte religieux.'),
('The Secret Garden', 12, 2, 1911, 'ISBN-000062', TRUE, '## The Secret Garden

Orphelin Mary découvre jardin secret qui transforme sa vie. Burnett tisse coming-of-age avec nature, healing, et magic.'),
('A Clockwork Orange', 13, 3, 1962, 'ISBN-000063', TRUE, '## A Clockwork Orange

Alex, violent youth, subjugated à aversion therapy. Burgess questionne libre volition, violence, et morality force-fed.'),
('The Color Purple', 14, 4, 1982, 'ISBN-000064', TRUE, '## The Color Purple

Celie escapes abuse systématique par lettres God. Walker celebrates sisterhood féminin, reclamation power, divine grace.'),
('The Glass Menagerie', 15, 5, 1944, 'ISBN-000065', TRUE, '## The Glass Menagerie

Une mère pousse sa fille timide à dater via "gentleman caller." Williams captures failed genteel Southern dreams.'),
('The Poisonwood Bible', 16, 6, 1998, 'ISBN-000066', TRUE, '## The Poisonwood Bible

Famille missionaire dans Congo post-indépendance. Kingsolver explores cultural clash, colonialism aftermath, maternal strength.'),
('The Hitchhiker''s Guide to the Galaxy', 17, 7, 1979, 'ISBN-000067', TRUE, '## The Hitchhiker''s Guide to the Galaxy

Arthur Dent reste sole humain après Earth destruction. Adams crée science-fiction comedy absurde avec humor philosophical.'),
('Fahrenheit 451', 18, 8, 1953, 'ISBN-000068', TRUE, '## Fahrenheit 451

Fireman brûlent livres dans futur dystopian. Bradbury critique censure, conformity, et importance littérature.'),
('Walden', 19, 9, 1854, 'ISBN-000069', TRUE, '## Walden

Thoreau vit deux ans dans cabine isolated. Philosophie transcendentalist d\'autosuffisance, nature, et civil disobedience.'),
('Their Eyes Were Watching God', 20, 10, 1937, 'ISBN-000070', TRUE, '## Their Eyes Were Watching God - Second Edition

Janie retrospects trois marriages. Hurston célèbre agentive female voice noir avec lyric prose, vernacular richness.'),
('A Brief History of Time', 21, 1, 1988, 'ISBN-000071', TRUE, '## A Brief History of Time

Hawking explique black holes, big bang, relativity. Accessibilité de cosmology pour lectorat général.'),
('Gulliver''s Travels', 22, 2, 1726, 'ISBN-000072', TRUE, '## Gulliver''s Travels

Lemuel Gulliver visite lands fantastic avec giant, tiny peoples. Swift satire politique, hypocrisy human nature.'),
('The Time Traveler''s Wife', 23, 3, 2003, 'ISBN-000073', TRUE, '## The Time Traveler''s Wife

Henry involuntarily time-travels, disrupting sa vie avec Claire. Niffenegger mêle romance avec time-bending paradox.'),
('The Wind-Up Bird Chronicle', 24, 4, 1994, 'ISBN-000074', TRUE, '## The Wind-Up Bird Chronicle

Toru recherche femme missing dans Tokyo surreal. Murakami crée metaphysical mystery avec weird realism japonais.'),
('Cloud Atlas', 25, 5, 2004, 'ISBN-000075', TRUE, '## Cloud Atlas

Six histoires à travers siècles nested. Mitchell montre cyclique human nature, power, résistance across time.'),
('The Silmarillion', 26, 6, 1977, 'ISBN-000076', TRUE, '## The Silmarillion

Préhistoire Tolkien''s Middle-earth avant Hobbit. Mythopoeic worldbuilding, elven legend, fall of Númenor.'),
('Love in the Time of Cholera', 27, 7, 1985, 'ISBN-000077', TRUE, '## Love in the Time of Cholera

Florentino patiently aime Fermina 50+ années. García Márquez crée célébration passionate love transcendant mortality.'),
('The Goldfinch', 28, 8, 2013, 'ISBN-000078', TRUE, '## The Goldfinch

Theo survit bombing survit puis stole painting. Tartt mêle crime, art, coming-of-age dans narratif immersive.'),
('The Hitchhiker''s Guide to the Galaxy - Encore', 29, 9, 1979, 'ISBN-000079', TRUE, '## The Hitchhiker''s Guide - Reissue

Arthur adventurous avec Ford Prefect. Adams''s ultimate absurdist sci-fi comedy avec meaning 42.'),
('Norwegian Wood', 30, 10, 1987, 'ISBN-000080', TRUE, '## Norwegian Wood

Toru remembers college romance dalam Tokyo 60s. Murakami explores youth melancholy, loss, nostalgic love.'),
('The Brothers K', 31, 1, 2000, 'ISBN-000081', TRUE, '## The Brothers K

Quatre frères en small-town Oregon 1940s-50s. Duncan epic familial saga mêle baseball, religion, coming-of-age.'),
('The Trial - Modernist Version', 32, 2, 1925, 'ISBN-000082', TRUE, '## The Trial - Kafkaesque Nightmare

K. ensnared bureaucratic horror. Kafka mêle absurdity avec existential dread oppressive.'),
('Siddhartha', 33, 3, 1922, 'ISBN-000083', TRUE, '## Siddhartha

Youth spiritual journey parallèle Buddha. Hesse searches enlightenment, transcendence, wisdom via experience.'),
('The Stranger - Existential Classic', 34, 4, 1942, 'ISBN-000084', TRUE, '## The Stranger - Absurdist Masterwork

Meursault''s detachment confronts society. Camus define existentialism''s meaninglessness beautiful.'),
('If on a winter''s night a traveler', 35, 5, 1979, 'ISBN-000085', TRUE, '## If on a winter''s night a traveler

Lecteur addresses vous directly dans interrupted novels. Calvino playfully deconstructs narrative, reader-author relationship.'),
('The Master and Margarita', 36, 6, 1967, 'ISBN-000086', TRUE, '## The Master and Margarita

Diable visits Soviet Moscow. Bulgakov intermeshes satire contemporary communism avec timeless love story.'),
('The Old Man and the Sea - Epic Struggle', 37, 7, 1952, 'ISBN-000087', TRUE, '## The Old Man and the Sea - Novella

Santiago''s trois-day battle. Hemingway distilled man''s nobility dans conflict avec nature overwhelming.'),
('Things Fall Apart', 38, 8, 1958, 'ISBN-000088', TRUE, '## Things Fall Apart

Okonkwo respects Igbo society antes colonialism. Achebe non-eurocentric perspectives, cultural integrity, tragic consequence.'),
('The Picture of Dorian Gray - Wilde Masterpiece', 39, 9, 1890, 'ISBN-000089', TRUE, '## The Picture of Dorian Gray - Aesthetic Novel

Dorian corruption whilst portrait ages. Wilde''s wit celebrate beauty\'s ephemeral, morality\'s weight.'),
('The Call of the Wild', 40, 10, 1903, 'ISBN-000090', TRUE, '## The Call of the Wild

Buck dog civilized becomes feral Alaska. London''s naturalism celebrates animal vitality, human refinement''s tenuousness.'),
('Atonement', 41, 1, 2001, 'ISBN-000091', TRUE, '## Atonement

Young Briony false-accuses innocent man. McEwan explores guilt, narrative, redemption impossibly complex.'),
('The Secret History', 42, 2, 1992, 'ISBN-000092', TRUE, '## The Secret History

Classics students at elite college entangle conspiracy, murder. Tartt crée atmosphere dark academia, seduction secrets.'),
('The Corrections', 43, 3, 2001, 'ISBN-000093', TRUE, '## The Corrections

Dysfunctional Lambert family Midwest. Franzen''s maximalist novel explores marriage, mental illness, consumerism.'),
('White Teeth', 44, 4, 2000, 'ISBN-000094', TRUE, '## White Teeth

Two immigrant fathers London multiculturalism. Smith crée comic-tragic multigenerational saga identité.'),
('The Lovely Bones', 45, 5, 2002, 'ISBN-000095', TRUE, '## The Lovely Bones

Abducted girl Susie watches famille grieve from heaven. Sebold explores trauma, grief, acceptance, transcendence.'),
('The Remains of the Day', 46, 6, 1989, 'ISBN-000096', TRUE, '## The Remains of the Day

Butler Stevens reflects décades service. Ishiguro captures repressed emotion, loyalty\'s cost, redemptive journey.'),
('The Shadow of the Wind - Revisited', 47, 7, 2001, 'ISBN-000097', TRUE, '## The Shadow of the Wind - Barcelona Noir

Daniel pursued mysterious author. Zafón tisse gothic mystery, youthful love amidst post-war Barcelona.'),
('The Help', 48, 8, 2009, 'ISBN-000098', TRUE, '## The Help

Black maids secretly expose white employers'' abuse. Stockett captures Southern racism, female solidarity, voice-finding.'),
('The Girl with the Dragon Tattoo', 49, 9, 2005, 'ISBN-000099', TRUE, '## The Girl with the Dragon Tattoo

Journalist Mikael Journalist mystery decades-old disappearance. Larsson crée dark Nordic noir, complex female avenger.'),
('The Fault in Our Stars', 50, 10, 2012, 'ISBN-000100', TRUE, '## The Fault in Our Stars

Hazel cancer patient falls pour Augustus. Green crée poignant coming-of-age mortality, love, infinity.');

-- Table users pour authentification
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insérer deux utilisateurs (mots de passe hachés)
-- user: username = user, password = user123
-- admin: username = admin, password = admin123
INSERT INTO users (username, password, role) VALUES
('user', '$2y$12$E9xDtxReNqMVcSUSxJV1EeS6mOr7IwddlVJE8YS.1PbDHW9A.vAoK', 'user'),
('admin', '$2y$12$AliruQUzELaMmPcmvbBY7efzLAPyCGlYfE/iMaNJOlHnO.NbMuRsy', 'admin');