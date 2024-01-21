INSERT INTO TYPEQUESTION VALUES
    (1, 'radio'),
    (2, 'checkbox'),
    (3, 'text');

INSERT INTO TYPEQUIZZ VALUES
    (1, 'culture générale'),
    (2, 'sport'),
    (3, 'cinéma'),
    (4, 'musique'),
    (5, 'informatique'),
    (6, 'histoire'),
    (7, 'géographie'),
    (8, 'sciences'),
    (9, 'littérature'),
    (10, 'art');

INSERT INTO USER VALUES
    (1, 'admin', 'admin', 1),
    (2, 'kylian', 'kylian', 0);

-- création quizz avec 3 questions, toutes à réponse unique. Quizz créé par l'user admin
INSERT INTO QUIZZ (titre_quizz, description, type_id, user_id) VALUES
    ('Quizz sport France', 'Quizz de sport sur des athlètes ou disciplines très connus en France', 2, 1);

INSERT INTO QUESTION (labelQst, typeQst_id, quizz_id) VALUES
    ('Quelle discipline pratique Panagiotis Taridini ?',1, 1),
    ('Combien de coupes du monde la france a gagné au Football',2, 1),
    ('Quel sportif est communément appelé Noisette sur les réseaux sociaux',3, 1);

INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES
    ('Bodybuilding', 1, 0),
    ('Streetlifting', 1, 0),
    ('Powerlifting', 1, 1),
    ('1', 2, 0),
    ('2', 2, 1),
    ('3', 2, 0),
    ('Kylian Mbappé', 3, 1);


INSERT INTO QUIZZ (titre_quizz, description, type_id, user_id) VALUES
    ('Quizz gastronomie', 'Quizz sur la gastronomie mondiale', 1, 1);

INSERT INTO QUESTION (labelQst, typeQst_id, quizz_id) VALUES
    ('Selon les américains, quel animal bizarre les français mangeraient-ils au restaurant ?',1, 2),
    ('Selon le stéréotype, quel alcool les français boivent-ils souvent ?',1, 2),
    ('Les gens qui mangent des escargots ont-ils un palais de doberman ?s',1, 2);

INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES
    ('de l''araignée', 4, 0),
    ('de la grenouille', 4, 1),
    ('du chien', 4, 0),
    ('Le vin', 5, 1),
    ('La bière', 5, 0),
    ('Le whisky', 5, 0),
    ('Oui', 6, 1),
    ('Non', 6, 0);

INSERT INTO QUIZZ (titre_quizz, description, type_id, user_id) VALUES
    ('Quizz cinéma', 'Quizz sur les films réalisés par Christopher Nolan', 3, 1);

INSERT INTO QUESTION (labelQst, typeQst_id, quizz_id) VALUES
    ('Quel acteur joue Batman dans la trilogie The Dark Knight ?',1, 3),
    ('Quel film sorti en 2023 aux cotés de Barbie, a eu un succès mondial à sa sortie ?',1, 3),
    ('Dans "Memento", quelle est la maladie de l''acteur principal ?',1, 3);

INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES
    ('Christian Bale', 7, 1),
    ('Heath Ledger', 7, 0),
    ('Tom Hardy', 7, 0),
    ('Oppenheimer', 8, 1),
    ('Cars 4', 8, 0),
    ('Hunger Games : The ballad of machin jsp frr le nom est trop long', 8, 0),
    ('Il a alzheimer.', 9, 1),
    ('Il a le SIDA.', 9, 0),
    ('Il a les cramptés.', 9, 0);
