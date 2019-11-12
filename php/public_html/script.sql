--criando esquema
CREATE SCHEMA sd;

--criando tabelas
CREATE TABLE sd.usuario(
        cpf VARCHAR(11),
        macBluetooth VARCHAR(12),
        UNIQUE(cpf),
        UNIQUE(macBluetooth)
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
        intensidade FLOAT
);
CREATE TABLE sd.presenca(
        dataHoraInicioAula TIMESTAMP,
        disciplina VARCHAR(30),
        turma VARCHAR(2),
        aluno VARCHAR(11),
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

--criando chaves primarias
ALTER TABLE sd.usuario
    ADD CONSTRAINT pk_usuario PRIMARY KEY (cpf,macBluetooth);
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

--criando chaves extrangeiras
ALTER TABLE sd.turma
    ADD FOREIGN KEY (instituto,numeroSala) REFERENCES sd.sala(instituto,numero);
ALTER TABLE sd.bluetooth
    ADD FOREIGN KEY (macBluetooth) REFERENCES sd.usuario(macBluetooth);
ALTER TABLE sd.bluetooth
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.presenca
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.presenca
    ADD FOREIGN KEY (aluno) REFERENCES sd.usuario(cpf);
ALTER TABLE sd.sensores
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.histLampadas
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.histVentilador
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.histProjetor
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.histPorta
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);
ALTER TABLE sd.histComputador
    ADD FOREIGN KEY (disciplina,turma) REFERENCES sd.turma(disciplina,turma);