CREATE TABLE Usuario(
	Email VARCHAR(100),
	Senha VARCHAR(100) NOT NULL,
	nome VARCHAR(100) NOT NULL,
	Foto TEXT NOT NULL,
	Cor VARCHAR(100) NOT NULL,
	CONSTRAINT UsuarioPK1 PRIMARY KEY(Email)
)ENGINE = InnoDB;

CREATE TABLE Bebe(
	Nickname VARCHAR(100),
	Nome VARCHAR(100) NOT NULL,
	Sexo VARCHAR(10) NOT NULL,
	Foto TEXT NOT NULL,
	Nascimento DATE NOT NULL,
	CONSTRAINT BebePK1 PRIMARY KEY(Nickname)	
)ENGINE = InnoDB;

CREATE TABLE Recado(
	ID SERIAL,
	NicknameBebe VARCHAR(100),
	Data DATE NOT NULL,
	Hora TIME NOT NULL,
	CONSTRAINT RecadoPK1 PRIMARY KEY(ID),
	CONSTRAINT RecadoFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE Evento(
	ID SERIAL,
	NicknameBebe VARCHAR(100),
	Data DATE NOT NULL,
	Descricao TEXT NOT NULL,
	CONSTRAINT EventoPK1 PRIMARY KEY(ID),
	CONSTRAINT EventoFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE Produto(
	ID SERIAL,
	Nome VARCHAR(100) NOT NULL,
	Quantidade INT NOT NULL,
	NicknameBebe VARCHAR(100),
	CONSTRAINT ProdutoPK1 PRIMARY KEY(ID),
	CONSTRAINT ProdutoFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE Usuario_Bebe(
	Email VARCHAR(100),
	NicknameBebe VARCHAR(100),
	CONSTRAINT Usuario_BebePK1 PRIMARY KEY(Email,NicknameBebe),
	CONSTRAINT Usuario_BebeFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE,
	CONSTRAINT Usuario_BebeFK2 FOREIGN KEY(Email) 
		REFERENCES Usuario(Email) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE Album(
	Nome VARCHAR(100) NOT NULL,
	NicknameBebe VARCHAR(100),
	CONSTRAINT AlbumPK1 PRIMARY KEY(Nome,NicknameBebe),
	CONSTRAINT AlbumFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE Foto(
	ID SERIAL NOT NULL,
	Url TEXT NOT NULL,
	NomeAlbum VARCHAR(100),
	NicknameBebe VARCHAR(100),
	CONSTRAINT FotoPK1 PRIMARY KEY(NomeAlbum,NicknameBebe,ID),
	CONSTRAINT FotoFK1 FOREIGN KEY(NicknameBebe) 
		REFERENCES Bebe(Nickname) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE,
	CONSTRAINT FotoFK2 FOREIGN KEY(NomeAlbum) 
		REFERENCES Album(Nome) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
)ENGINE = InnoDB;
