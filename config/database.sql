CREATE DATABASE IF NOT EXISTS AgenziaImmobiliare;

USE AgenziaImmobiliare;

CREATE TABLE IF NOT EXISTS immobili
(
	IDImmobile INT NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(20) NOT NULL,
	prezzoVendita DOUBLE NOT NULL,
	superficie DOUBLE NOT NULL,
	CONSTRAINT immobili_pk PRIMARY KEY (IDImmobile),
	CONSTRAINT immobili_ch_prezzo CHECK (prezzoVendita > 0.0),
	CONSTRAINT immobili_ch_superficie CHECK (superficie > 0.0)
);

CREATE TABLE IF NOT EXISTS proprietari
(
	codiceFiscale CHAR(16) NOT NULL,
	nome VARCHAR(20) NOT NULL,
	cognome VARCHAR(20) NOT NULL,
	dataNascita DATE NOT NULL,
	CONSTRAINT proprietari_pk PRIMARY KEY (codiceFiscale)
);

CREATE TABLE IF NOT EXISTS vani
(
	IDVano INT NOT NULL AUTO_INCREMENT,
	nomeVano VARCHAR(20) NOT NULL,
	CONSTRAINT vani_pk PRIMARY KEY (IDVano)
);

CREATE TABLE IF NOT EXISTS pertinenze
(
	IDPertinenza INT NOT NULL AUTO_INCREMENT,
	nomePertinenza VARCHAR(20) NOT NULL,
	descrizione VARCHAR(50) NOT NULL,
	CONSTRAINT pertinenze_pk PRIMARY KEY (IDPertinenza)
);

CREATE TABLE IF NOT EXISTS possiede
(
	codiceFiscale CHAR(16) NOT NULL,
	idImmobile INT NOT NULL,
	CONSTRAINT possiede_pk PRIMARY KEY (codiceFiscale, idImmobile),
	CONSTRAINT possiede_fk_immobili FOREIGN KEY (idImmobile) REFERENCES immobili (IDImmobile)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT possiede_fk_proprietari FOREIGN KEY (codiceFiscale) REFERENCES proprietari (codiceFiscale)
	ON UPDATE CASCADE 
	ON DELETE NO ACTION
);

CREATE TABLE IF NOT EXISTS composto
(
	idImmobile INT NOT NULL,
	idVano INT NOT NULL,
	CONSTRAINT composto_pk PRIMARY KEY (idImmobile, idVano),
	CONSTRAINT composto_fk_immobili FOREIGN KEY (idImmobile) REFERENCES immobili (IDImmobile)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT composto_fk_vani FOREIGN KEY (idVano) REFERENCES vani (IDVano)
	ON UPDATE CASCADE 
	ON DELETE NO ACTION
);

CREATE TABLE IF NOT EXISTS contiene
(
	idImmobile INT NOT NULL,
	idPertinenza INT NOT NULL,
	metratura DOUBLE NOT NULL,
	CONSTRAINT contiene_pk PRIMARY KEY (idImmobile, idPertinenza),
	CONSTRAINT contiene_fk_immobili FOREIGN KEY (idImmobile) REFERENCES immobili (IDImmobile)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT contiene_fk_pertinenze FOREIGN KEY (idPertinenza) REFERENCES pertinenze(IDPertinenza)
	ON UPDATE CASCADE 
	ON DELETE NO ACTION
);

INSERT INTO immobili (tipo, prezzoVendita, superficie) VALUES
('Appartamento', 150000.00, 85.0),
('Villa', 350000.00, 200.0),
('Monolocale', 90000.00, 40.0);

INSERT INTO proprietari (codiceFiscale, nome, cognome, dataNascita) VALUES
('RSSMRA85T10H501U', 'Mario', 'Rossi', '1985-12-10'),
('BNCLRA90M01F205Z', 'Laura', 'Bianchi', '1990-08-01'),
('VRDGPP75L22C351A', 'Giuseppe', 'Verdi', '1975-07-22');

INSERT INTO vani (nomeVano) VALUES
('Soggiorno'),
('Camera da letto'),
('Cucina');

INSERT INTO pertinenze (nomePertinenza, descrizione) VALUES
('Garage', 'Spazio coperto per auto'),
('Cantina', 'Locale sotterraneo'),
('Giardino', 'Spazio verde esterno');

INSERT INTO possiede (codiceFiscale, idImmobile) VALUES
('RSSMRA85T10H501U', 1),
('BNCLRA90M01F205Z', 2),
('VRDGPP75L22C351A', 3);

INSERT INTO composto (idImmobile, idVano) VALUES
(1, 1),
(1, 2),
(2, 3);

INSERT INTO contiene (idImmobile, idPertinenza, metratura) VALUES
(1, 1, 20.0),
(2, 2, 15.0),
(3, 3, 50.0);

SELECT * FROM immobili WHERE prezzoVendita < 50000.00;