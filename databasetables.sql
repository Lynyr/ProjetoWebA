CREATE TABLE conta(
    login VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    PRIMARY KEY(login)
);
CREATE TABLE ponto(
    loginID VARCHAR(255),
    cana INT DEFAULT 0,
    bolsonaro INT DEFAULT 0,
    facao INT DEFAULT 0,
    maquina INT DEFAULT 0,
    PRIMARY KEY(loginID),
    FOREIGN KEY(loginID) REFERENCES conta(login) ON DELETE CASCADE
);
