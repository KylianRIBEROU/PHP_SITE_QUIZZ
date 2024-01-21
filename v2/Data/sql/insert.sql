INSERT INTO QUESTION (iduu, type, label, score) VALUES
    ('8030a37e-947b-11ee-b9d1-0242ac120002', 'radio', 'Combien de coupe du mon de foot a remporté l''équipe de France ?', 1),
    ('8d7f7078-947b-11ee-b9d1-0242ac120002', 'checkbox', 'En quelle année l''équipe de France de foot a-t-elle remporté la coupe du monde ?', 1),
    ('8d7f7078-947b-11ee-b9d1-0242ac120003', 'ouverte', 'Quelle est la capitale de la France ?', 1);

INSERT INTO CHOIX (labelChoix, question_iduu) VALUES
    ("1", '8030a37e-947b-11ee-b9d1-0242ac120002'),
    ("2", '8030a37e-947b-11ee-b9d1-0242ac120002'),
    ("3", '8030a37e-947b-11ee-b9d1-0242ac120002'),
    ('1998', '8d7f7078-947b-11ee-b9d1-0242ac120002'),
    ('2006', '8d7f7078-947b-11ee-b9d1-0242ac120002'),
    ('2018', '8d7f7078-947b-11ee-b9d1-0242ac120002');

INSERT INTO CORRECT (labelChoix, question_iduu) VALUES
    ('2', '8030a37e-947b-11ee-b9d1-0242ac120002'),
    ('1998', '8d7f7078-947b-11ee-b9d1-0242ac120002'),
    ('2018', '8d7f7078-947b-11ee-b9d1-0242ac120002'),
    ('Paris', '8d7f7078-947b-11ee-b9d1-0242ac120003');