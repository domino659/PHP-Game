DROP DATABASE IF EXISTS gamephp;
CREATE DATABASE IF NOT EXISTS gamephp CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS gamephp.human (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    pv INT UNSIGNED NOT NULL,
    attack INT UNSIGNED NOT NULL,
    defence INT UNSIGNED NOT NULL,
    class VARCHAR(30) NOT NULL,
    state BIT NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO gamephp.human (name, pv, attack, defence, class, state)
VALUES ('Bob', 150, 20, 10, 'Warrior', true);
INSERT INTO gamephp.human (name, pv, attack, defence, class, state)
VALUES ('Domi', 200, 10, 20, 'Tank', false);
INSERT INTO gamephp.human (name, pv, attack, defence, class, state)
VALUES ('Lucien', 100, 25, 10, 'Magician', false);
