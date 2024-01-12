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

INSERT INTO QUESTION (titreQst, typeQst_id, quizz_id) VALUES
    ('Quelle discipline pratique Panagiotis Taridini ?',1, 1),
    ('Combien de coupes du monde la france a gagné au Football',1, 1),
    ('Quel sportif est communément appelé Noisette sur les réseaux sociaux',1, 1);


INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES
    ('Bodybuilding', 1, 0),
    ('Streetlifting', 1, 0),
    ('Powerlifting', 1, 1),
    ('1', 2, 0),
    ('2', 2, 0),
    ('3', 2, 1),
    ('Kylian Mbappé', 3, 1),
    ('Dembélé', 3, 0),
    ('Ngolo Kanté', 3, 0);