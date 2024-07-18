-- Criar o banco de dados db_curso, se ainda não existir

    USE master;


-- Criar a tabela TB_TESTE dentro do banco de dados db_curso
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'TB_TESTE')
BEGIN
    CREATE TABLE TB_TESTE (
        ID INT PRIMARY KEY,
        NOME VARCHAR(250)
    );

    -- Inserir dados na tabela TB_TESTE
    INSERT INTO TB_TESTE (ID, NOME) VALUES (1, 'João');
    INSERT INTO TB_TESTE (ID, NOME) VALUES (2, 'Maria');
    INSERT INTO TB_TESTE (ID, NOME) VALUES (3, 'Carlos');
    INSERT INTO TB_TESTE (ID, NOME) VALUES (4, 'Ana');
END
