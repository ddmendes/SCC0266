CREATE TABLE pagamento (
 pag_id BIGINT UNSIGNED NOT NULL,
 autenticacao VARCHAR(20),
 tipo CHAR(1),
 nome VARCHAR(20),
 cpf VARCHAR(11),
 b_endereco VARCHAR(50),
 c_cod VARCHAR(16),
 c_cod_seg CHAR(10),
 c_validade CHAR(10)
);

ALTER TABLE pagamento ADD CONSTRAINT PK_pagamento PRIMARY KEY (pag_id);


CREATE TABLE usuario (
 usr_cpf BIGINT UNSIGNED NOT NULL,
 nome VARCHAR(20),
 endereco VARCHAR(50),
 email VARCHAR(15),
 senha VARCHAR(60)
);

ALTER TABLE usuario ADD CONSTRAINT PK_usuario PRIMARY KEY (usr_cpf);


CREATE TABLE compra (
 cmp_id BIGINT UNSIGNED NOT NULL,
 usr_cpf BIGINT UNSIGNED NOT NULL
);

ALTER TABLE compra ADD CONSTRAINT PK_compra PRIMARY KEY (cmp_id);


CREATE TABLE ordem_de_pagamento (
 orp_id BIGINT UNSIGNED NOT NULL,
 cmp_id BIGINT UNSIGNED NOT NULL,
 pag_id BIGINT UNSIGNED NOT NULL
);

ALTER TABLE ordem_de_pagamento ADD CONSTRAINT PK_ordem_de_pagamento PRIMARY KEY (orp_id);


CREATE TABLE produto (
 pdt_id BIGINT UNSIGNED NOT NULL,
 nome VARCHAR(20),
 descricao TEXT,
 preco FLOAT,
 peso FLOAT,
 estoque INT
);

ALTER TABLE produto ADD CONSTRAINT PK_produto PRIMARY KEY (pdt_id);


CREATE TABLE produto_compra (
 cmp_id BIGINT UNSIGNED NOT NULL,
 pdt_id BIGINT UNSIGNED NOT NULL,
 preco FLOAT,
 quantidade FLOAT
);

ALTER TABLE produto_compra ADD CONSTRAINT PK_produto_compra PRIMARY KEY (cmp_id,pdt_id);


ALTER TABLE compra ADD CONSTRAINT FK_compra_0 FOREIGN KEY (usr_cpf) REFERENCES usuario (usr_cpf);


ALTER TABLE ordem_de_pagamento ADD CONSTRAINT FK_ordem_de_pagamento_0 FOREIGN KEY (cmp_id) REFERENCES compra (cmp_id);
ALTER TABLE ordem_de_pagamento ADD CONSTRAINT FK_ordem_de_pagamento_1 FOREIGN KEY (pag_id) REFERENCES pagamento (pag_id);


ALTER TABLE produto_compra ADD CONSTRAINT FK_produto_compra_0 FOREIGN KEY (cmp_id) REFERENCES compra (cmp_id);
ALTER TABLE produto_compra ADD CONSTRAINT FK_produto_compra_1 FOREIGN KEY (pdt_id) REFERENCES produto (pdt_id);


