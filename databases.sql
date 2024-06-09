
Create table client(
nomclient varchar (50),
numero_dossier varchar(90),
nom_medicament varchar(112),
addresse varchar(80)
);

CREATE table medecine(
    nom VARCHAR(255),
    domaine VARCHAR(255),
    addresse VARCHAR(255),
    cabinet VARCHAR(255),
    contact VARCHAR(255)
);

CREATE table medicamment(
    nom_medicament  VARCHAR(255) NOT NULL,
    type_medicament VARCHAR(255),
    Prix INT(255),
    Quantité INT(255)
);


CREATE TABLE `admin` (
  `name` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL
);

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('Hassan Es-sabbani', 'hassanessabbani927@gmail.com', 'hassan.1234'),
('Hassan Es-sabbani', 'hassanessabbani927@gmail.com', 'hassan.1234');