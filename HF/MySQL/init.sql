INSERT INTO auto_markak (marka_nev)
VALUES ("AUDI");
INSERT INTO auto_markak (marka_nev)
VALUES ("BMW");
INSERT INTO auto_markak (marka_nev)
VALUES ("BYD");
INSERT INTO auto_markak (marka_nev)
VALUES ("CITROEN");
INSERT INTO auto_markak (marka_nev)
VALUES ("FIAT");
INSERT INTO auto_markak (marka_nev)
VALUES ("FORD");
INSERT INTO auto_markak (marka_nev)
VALUES ("HYUNDAI");
INSERT INTO auto_markak (marka_nev)
VALUES ("JAGUAR");
INSERT INTO auto_markak (marka_nev)
VALUES ("KIA");
INSERT INTO auto_markak (marka_nev)
VALUES ("MERCEDES-BENZ");
INSERT INTO auto_markak (marka_nev)
VALUES ("MITSHUBISHI");
INSERT INTO auto_markak (marka_nev)
VALUES ("NISSAN");
INSERT INTO auto_markak (marka_nev)
VALUES ("OPEL");
INSERT INTO auto_markak (marka_nev)
VALUES ("PEUGEOT");
INSERT INTO auto_markak (marka_nev)
VALUES ("PORSCHE");
INSERT INTO auto_markak (marka_nev)
VALUES ("RENAULT");
INSERT INTO auto_markak (marka_nev)
VALUES ("SMART");
INSERT INTO auto_markak (marka_nev)
VALUES ("TESLA");
INSERT INTO auto_markak (marka_nev)
VALUES ("TOYOTA");
INSERT INTO auto_markak (marka_nev)
VALUES ("VOLKSWAGEN");
INSERT INTO auto_markak (marka_nev)
VALUES ("VOLVO");
INSERT INTO auto_markak (marka_nev)
VALUES ("SKODA");
INSERT INTO auto_markak (marka_nev)
VALUES ("DACIA");

INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("SUV / CROSSOVER");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("SEDAN");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("CABRIO");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("COUPE");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("HATCHBACK");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("KOMBI");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("PICKUP");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("EGYTERŰ");
INSERT INTO karosszeria_tipus (karosszeria_nev)
VALUES ("KISBUSZ");

INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("Q4 e-tron 40", 204, 76.6, 520, '2021-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SUV / CROSSOVER'), (SELECT id FROM auto_markak WHERE marka_nev = 'AUDI'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("Q8 e-tron 55", 408, 106, 582, '2018-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SUV / CROSSOVER'), (SELECT id FROM auto_markak WHERE marka_nev = 'AUDI'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("e-tron GT quattro", 530, 85, 503, '2020-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SEDAN'), (SELECT id FROM auto_markak WHERE marka_nev = 'AUDI'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("e-tron GT RS", 646, 85, 498, '2021-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SEDAN'), (SELECT id FROM auto_markak WHERE marka_nev = 'AUDI'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("Taycan Turbo S", 761, 83.7, 416, '2020-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SEDAN'), (SELECT id FROM auto_markak WHERE marka_nev = 'PORSCHE'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("Taycan 4 Cross Turismo", 476, 83.7, 484, '2021-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'KOMBI'), (SELECT id FROM auto_markak WHERE marka_nev = 'PORSCHE'));
INSERT INTO auto_modellek (modell_nev, teljesitmeny_le, akku_meret_kwh, wltp_hatotav, gyartas_kezdete, karosszeria_tipus_id, auto_markak_id)
VALUES ("i4 eDrive40", 340, 80.7, 541, '2021-01-01', (SELECT id FROM karosszeria_tipus WHERE karosszeria_nev = 'SEDAN'), (SELECT id FROM auto_markak WHERE marka_nev = 'BMW'));