DROP TABLE IF EXISTS CHOIX;
DROP TABLE IF EXISTS CORRECT;
DROP TABLE IF EXISTS QUESTION;

CREATE TABLE IF NOT EXISTS QUESTION (
    iduu VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    score INT(11) NOT NULL,
    PRIMARY KEY (iduu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS CHOIX (
    labelChoix VARCHAR(255) NOT NULL,
    question_iduu VARCHAR(255) NOT NULL,
    PRIMARY KEY (labelChoix, question_iduu),
    Foreign Key (question_iduu) references QUESTION(iduu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS CORRECT (
    labelChoix VARCHAR(255) NOT NULL,
    question_iduu VARCHAR(255) NOT NULL,
    PRIMARY KEY (labelChoix, question_iduu),
    Foreign Key (question_iduu) references QUESTION(iduu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;