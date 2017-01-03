
CREATE TABLE categoria_produto (
                cod_categoria_prod INT AUTO_INCREMENT NOT NULL,
                categoria_produto VARCHAR(50) NOT NULL,
                descricao VARCHAR(150) NOT NULL,
                PRIMARY KEY (cod_categoria_prod)
);


CREATE TABLE telefone (
                cod_telefone INT AUTO_INCREMENT NOT NULL,
                telefone VARCHAR(15) NOT NULL,
                PRIMARY KEY (cod_telefone)
);


CREATE TABLE categoria_vendedor (
                cod_cat_vendedor INT AUTO_INCREMENT NOT NULL,
                categoria_vendedor VARCHAR(30) NOT NULL,
                descricao VARCHAR(150) NOT NULL,
                PRIMARY KEY (cod_cat_vendedor)
);


CREATE TABLE endereco (
                cod_endereco INT AUTO_INCREMENT NOT NULL,
                rua VARCHAR(200) NOT NULL,
                numero INT NOT NULL,
                cidade VARCHAR(100) NOT NULL,
                estado VARCHAR(2) NOT NULL,
                PRIMARY KEY (cod_endereco)
);


CREATE TABLE cliente (
                cod_cliente INT AUTO_INCREMENT NOT NULL,
                cod_endereco INT NOT NULL,
                nome_cliente VARCHAR(50) NOT NULL,
                cnpj_cpf VARCHAR(20) NOT NULL,
                cod_telefone INT NOT NULL,
                tipo INT NOT NULL,
                login VARCHAR(30) NOT NULL,
                senha VARCHAR(100) NOT NULL,
                PRIMARY KEY (cod_cliente, cod_endereco)
);


CREATE TABLE vendedor (
                cod_vendedor INT AUTO_INCREMENT NOT NULL,
                nome_vendedor VARCHAR(100) NOT NULL,
                cod_endereco INT NOT NULL,
                cnpj_cpf VARCHAR(20) NOT NULL,
                situacao BOOLEAN NOT NULL,
                cod_telefone INT NOT NULL,
                cod_cat_vendedor INT NOT NULL,
                tipo INT NOT NULL,
                login VARCHAR(30) NOT NULL,
                senha VARCHAR(100) NOT NULL,
                PRIMARY KEY (cod_vendedor)
);


CREATE TABLE produto (
                cod_produto INT AUTO_INCREMENT NOT NULL,
                descricao_produto VARCHAR(150) NOT NULL,
                cod_vendedor INT NOT NULL,
                estoque INT NOT NULL,
                valor_produto DOUBLE PRECISION NOT NULL,
                marca VARCHAR(50),
                cod_categoria_prod INT NOT NULL,
                PRIMARY KEY (cod_produto)
);


CREATE TABLE pedido (
                cod_pedido INT NOT NULL,
                cod_vendedor INT NOT NULL,
                cod_cliente INT NOT NULL,
                cod_endereco INT NOT NULL,
                data_compra DATETIME NOT NULL,
                valor_compra INT NOT NULL,
                cod_produto INT NOT NULL,
                PRIMARY KEY (cod_pedido, cod_vendedor, cod_cliente, cod_endereco)
);


ALTER TABLE produto ADD CONSTRAINT categoria_produto_produto_fk
FOREIGN KEY (cod_categoria_prod)
REFERENCES categoria_produto (cod_categoria_prod)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cliente ADD CONSTRAINT telefone_cliente_fk
FOREIGN KEY (cod_telefone)
REFERENCES telefone (cod_telefone)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE vendedor ADD CONSTRAINT telefone_vendedor_fk
FOREIGN KEY (cod_telefone)
REFERENCES telefone (cod_telefone)
ON DELETE CASCADE
ON UPDATE NO ACTION;

ALTER TABLE vendedor ADD CONSTRAINT categoria_vendedor_vendedor_fk
FOREIGN KEY (cod_cat_vendedor)
REFERENCES categoria_vendedor (cod_cat_vendedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE vendedor ADD CONSTRAINT endereço_empresa_fk
FOREIGN KEY (cod_endereco)
REFERENCES endereco (cod_endereco)
ON DELETE CASCADE
ON UPDATE NO ACTION;

ALTER TABLE cliente ADD CONSTRAINT endereco_cliente_fk
FOREIGN KEY (cod_endereco)
REFERENCES endereco (cod_endereco)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedido ADD CONSTRAINT cliente_pedido_fk
FOREIGN KEY (cod_cliente, cod_endereco)
REFERENCES cliente (cod_cliente, cod_endereco)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE produto ADD CONSTRAINT vendedor_produtos_fk
FOREIGN KEY (cod_vendedor)
REFERENCES vendedor (cod_vendedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedido ADD CONSTRAINT vendedor_pedido_fk
FOREIGN KEY (cod_vendedor)
REFERENCES vendedor (cod_vendedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pedido ADD CONSTRAINT produto_pedido_fk
FOREIGN KEY (cod_produto)
REFERENCES produto (cod_produto)
ON DELETE NO ACTION
ON UPDATE NO ACTION;