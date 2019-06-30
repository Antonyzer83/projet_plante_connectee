CREATE DATABASE projet_dev;
use projet_dev;

CREATE TABLE userp (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(20) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(30) NOT NULL,
  card_id INT NOT NULL,
  password VARCHAR(255)
);

CREATE TABLE plant (
  plant_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  category VARCHAR(30) NOT NULL,
  descr VARCHAR(255) NOT NULL,
  ground_humidity INT NOT NULL,
  air_temperature INT NOT NULL,
  air_humidity INT NOT NULL,
  luminosity INT NOT NULL,
  from_period DATE NOT NULL,
  to_period DATE NOT NULL
);

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Ficus carica', 'Arbustre', 'Arbustre de 2 à 5 mètres où poussent des figues.', '25', '27', '50', '75', '2000-06-01', '2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Agrimonia eupatoria','Plante herbacée', 'Plante de 30 à 60 centimètres poussant dans toute la France.', '25', '20', '38', '68','2000-06-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Agrostis stolonifera','Plante monocotylédone', "Plante qui pousse surtout dans l'hémisphère nord, en zone tempérée, mais qui a été diffusée dans le monde entier.", '68', '21', '100', '88','2000-06-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Alcea rosea', 'Plante vivace', 'Une espèce de plante de la famille des Malvaceae. Elle est aussi appelée Rose papale ou Alcée rose.', '25', '24', '38', '75','2000-07-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Allium', 'Plante monocotylédone', 'Ce grand ail de 40 à 80cm se reconnaît à sa grosse tête', '50', '21', '55', '75','2000-07-01','2000-08-01');

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Amaranthus retroflexus', 'Plante herbacée', 'Plante à tige dressée robuste.', '25', '27', '25', '88','2000-07-01','2000-10-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Anacamptis pyramidalis Rich.','Plante vivace', "L'Orchis pyramidal est une orchidée terrestre européenne", '25', '24', '38', '88','2000-05-01','2000-07-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Andryala integrifolia', 'Plante herbacée', 'Originaire de la région méditerranéenne cette plante est désormais largement répandue en France.', '38', '27', '50', '68','2000-07-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Asphodelus fistulosus', 'Plante herbacée vivace', ' Plante de 20 à 60 cm', '25', '27', '50', '88','2000-04-01','2000-05-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Bituminaria bituminosa', 'Plante herbacée vivace', 'Plante de 50 cm à 1 mètre, dressée, à forte odeur de bitume ', '38', '27', '50', '75','2000-05-01','2000-10-01');

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Campanula rapunculus', 'Plante herbacée', 'Plante de 40-80 cm, velue et un peu rude, à racine charnue, en fuseau', '75', '24', '75', '88', '2000-05-01','2000-08-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Carduus pycnocephalus', 'Plante Carduus', 'Originaire du pourtour méditerranéen', '13', '27', '25', '88','2000-05-01','2000-06-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Carlina acanthifolia','Plante bisannuelle acaule', 'Plante appartenant à la même famille que les artichauts', '22', '25', '30', '80','2000-07-01','2000-08-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Centranthus calcitrapae','Plante annuelle', 'Plante de 10 à 40 centimètres à tige dressée', '25', '27', '25', '50','2000-05-01','2000-07-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Chelidonium majus', 'Plante Chelidonium', 'Aussi appelée herbe aux verrues car son latex jaune-orangé toxique est utilisé pour éliminer les verrues', '38', '21', '68', '68','2000-05-01','2000-09-01');

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Chondrilla juncea', 'Plante méditerranéenne', "Fait parti de l'espèce de plantes méditerranéennes et peut mesurer de 4 à 10 decimètres", '13', '28', '25', '87','2000-07-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Echium vulgare', 'Plante dicotylédone', 'Plante de 30 à 80 centimètres, verte à la tige dréssée et hérissée de poils raides', '25', '21', '25', '87','2000-05-01','2000-08-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Galium aparine', 'Plante herbacée', 'Plante très commune de 20 centimètres à 1 mètre.', '38', '21', '50', '68','2000-06-01','2000-10-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Geranium molle', 'Plante annuelle', 'Plante couverte de longs poils mous étalés et possédant des tiges de 10 à 40 centimètres.', '38', '21', '50', '68','2000-04-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Helminthotheca echioides Holub', 'Plante herbacée', 'Plante annuelle à tiges de 3 à 10 décimètres dressées. L’ensemble de la plante est couvert de poils très raides.', '15', '27', '25', '88','2000-06-01','2000-09-01');

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Hypericum perforatum', 'Plante herbacée vivace', 'Une plante avec des tiges de 20 à 80 centimètres.', '38', '21', '50', '75','2000-06-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Inula conyzae DC.', 'Plante herbacée vivace', 'Plante à tiges dressées de 5 à 10 décimètres.', '25', '23', '25', '67', '2000-07-01', '2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Iris foetidissima', 'Plante vivace', "Plante de 30 à 80 centimètres. Cette plante est assez commune en Europe de l'ouest", '25', '27', '50', '50','2000-05-01','2000-07-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Polycarpon tetraphyllum', 'Plante annuelle', 'Plante de 5 à 15 centimètres couramment appelée graine de synthèse à quatre feuilles', '13', '27', '25', '100','2000-03-01','2000-10-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Poterium sanguisorba', 'Plante herbacée vivace', "Aussi appelée petite pimprenelle ou sanguisorbe, c'est une plante herbacée vivace", '25', '23', '37', '75','2000-04-01','2000-06-01');

INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Rubia tinctorum','Plante vivace', "Plante d'environ 1 mètre, elle fut largement cultivée pour la teinture rouge extraite de ses rhizomes. Elle est également appelée communément garance ou rouge des teinturiers", '25', '23', '25', '68','2000-06-01','2000-08-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Salvia officinalis', 'Sous-arbrisseau', 'Souvent cultivé dans les jardins comme plante condimentaire', '25', '27', '37', '75', '2000-05-01', '2000-07-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Sarcocornia fruticosa', 'Sous-arbrisseau', 'Mesure de 30 centimètres à 1 mètre', '68', '29', '88', '88','2000-08-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Scolymus hispanicus L.', 'Plante vivace', "Plante à tiges de 2 à 8 décimètres dressées aussi appelée Chardon d'Espagne, ou Scolyme d'Espagne", '16', '27', '16', '100','2000-07-01','2000-09-01');
INSERT INTO plant (name, category, descr, ground_humidity, air_temperature, air_humidity, luminosity, from_period, to_period) VALUES ('Sonchus oleraceus', 'Plante herbacée annuelle', 'Plante annuelle à tiges de 3 à 8 décimètres aussi appelée le laiteron maraîcher, laiteron commun ou laiteron lisse', '38', '23', '50', '75','2000-06-01','2000-10-01');

CREATE TABLE user_plant(
  user_id INT NOT NULL,
  plant_id INT NOT NULL,
  PRIMARY KEY (user_id, plant_id),
  FOREIGN KEY (user_id) REFERENCES userp (user_id),
  FOREIGN KEY (plant_id) REFERENCES plant (plant_id)
);
