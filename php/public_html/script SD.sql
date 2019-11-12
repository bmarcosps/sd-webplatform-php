CREATE SCHEMA sd;

CREATE TABLE sd.usuario(
        tokenIntegra VARCHAR(50),
        macBluetooth VARCHAR(12),
        tipo INTEGER
);

CREATE TABLE sd.sala(
        instituto VARCHAR(50),
        numero VARCHAR(20),
        qtdComputadores INTEGER,
        qtdVentiladores INTEGER,
        qtdLampadas INTEGER,
        qtdProjetor INTEGER
);

CREATE TABLE sd.turma(
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        instituto VARCHAR(50),
        numeroSala VARCHAR(20)
);

CREATE TABLE sd.bluetooth(
        dataHora TIMESTAMP,
        macBluetooth VARCHAR(12),
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        intenciade FLOAT
);

CREATE TABLE sd.presenca(
        dataHoraInicioAula TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        aluno VARCHAR(50),
        porcentagemPresenca FLOAT
);

CREATE TABLE sd.sensores(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma varchar(2),
        luminosidade float,
        temperatura float
);

CREATE TABLE sd.histLampadas(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        estadoLamp1 INTEGER,
        estadoLamp2 INTEGER
);

CREATE TABLE sd.histVentilador(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        estadoVent1 INTEGER,
        estadoVent2 INTEGER
);

CREATE TABLE sd.histProjetor(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        estado INTEGER
);

CREATE TABLE sd.histPorta(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        estado INTEGER
);

CREATE TABLE sd.histComputador(
        dataHora TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        estado INTEGER
);

ALTER TABLE sd.usuario
    ADD CONSTRAINT pk_usuario PRIMARY KEY (tokenIntegra,macBluetooth);

ALTER TABLE sd.sala
    ADD CONSTRAINT pk_sala PRIMARY KEY (instituto, numero);

ALTER TABLE sd.turma
    ADD CONSTRAINT pk_turma PRIMARY KEY (disciplina,turma);

ALTER TABLE sd.bluetooth
    ADD CONSTRAINT pk_bluetooth PRIMARY KEY (dataHora, macBluetooth);

ALTER TABLE sd.presenca
    ADD CONSTRAINT pk_presenca PRIMARY KEY (dataHoraInicioAula,disciplina,turma,aluno);

ALTER TABLE sd.sensores
    ADD CONSTRAINT pk_sensores PRIMARY KEY (dataHora, disciplina,turma);

ALTER TABLE sd.histLampadas
    ADD CONSTRAINT pk_histLampadas PRIMARY KEY (dataHora, disciplina,turma);

ALTER TABLE sd.histVentilador
    ADD CONSTRAINT pk_histVentilador PRIMARY KEY (dataHora, disciplina,turma);

ALTER TABLE sd.histProjetor
    ADD CONSTRAINT pk_histprojetor PRIMARY KEY (dataHora, disciplina,turma);

ALTER TABLE sd.histPorta
    ADD CONSTRAINT pk_histPorta PRIMARY KEY (dataHora, disciplina,turma);

ALTER TABLE sd.histComputador
    ADD CONSTRAINT pk_histComputador PRIMARY KEY (dataHora, disciplina,turma);
