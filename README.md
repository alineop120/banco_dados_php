# 1. Levantamento de dados

## 1.1. Objetivos de sistema

### 1.1.1. Objetivo principal
Controle de estoque e venda de amplificadores da loja ROCK n' ROLL

#### Amplificadores

### 1.1.2. Objetivos específicos
- Efetuar a entrada no sistema usando login e senhas válidos
- Manter dados de usuários e produtos
- Registrar vendas dos amplificadores

## 1.2. Usuários do sistema
- **Administrador:** tem total acesso a todas as funcionalidades do sistema
- **Vendedor:** tem acesso somente ao módulo de vendas
- **Estoquista:** tem acesso somente ao módulo de produtos (estoque)

## 1.3. Dados a serem registrados

### 1.3.1. Funcionários
- Nome
- Login
- Senha
- Função
- Status

### 1.3.2. Produtos
- Marca
- Modelo/Nome
- Tipo
- Preço

### 1.3.3. Venda
- Data da venda
- Produtos da venda
- Funcionário que efetuou a venda
- Total da venda

## 1.4. Fluxo de trabalho
Assim que o cliente entra na loja ele pode escolher entre um ou mais amplificadores para comprar. Cada produto escolhido é separado até o cliente decidir finalizar a compra. No momento da finalização, o nome do funcionário vendedor é colocado no registro da venda como forma de controle para saber quem fez a venda, bem como também a descrição do(s) produto(s) adquiridos e o total da compra. Aos funcionários estoquistas, estão destinadas as tarefas para contagem (diária) do estoque (quantidade de amplificadores na loja).

## 1.5. Funcionamento do sistema
- O uso do sistema começará com o acesso via login e senha pelos funcionários da loja ou gerente (dono ou responsável). Neste acesso, conforme for o perfil do usuário serão apresentados opções para acesso aos módulos do sistema: módulo de funcionários, módulo de produtos, módulo de vendas e módulo de relatórios. Usuários com perfil de administrador têm acesso total, os com perfil de vendedor acessam apenas o módulo de vendas e os de perfil de estoquista tem acesso somente ao módulo de produtos.
- O módulo de funcionários efetuará o cadastro de novos funcionários (usuários), suas alterações e exibição de seus dados (geral e individual).
- O módulo de produtos efetuará o cadastro de novos produtos (amplificadores), suas alterações e exibição de seus dados (geral e de cada item).
- O módulo de vendas efetuará o registro da venda dos produtos (amplificadores).
- O módulo de relatórios oferecerá relatórios de produtos em estoque, funcionários ativos/inativos e totais de vendas.

# 2. Modelagem de dados

## 2.1. Modelo Entidade-Relacionamento Conceitual
![Mapa_Site](/imagens_readme/mer_conceitual.png)

## 2.2. Modelo Entidade-Relacionamento Lógico
![Mapa_Site](/imagens_readme/mer_logico.png)

# 3. Observações
- Na tabela que armazenará os amplificadores, cada registro representará cada item (amplificador) existente na loja. Será feito desta forma como uma maneira de simplificar o desenvolvimento do sistema.

# 4. Mapa do Site
![Mapa_Site](/imagens_readme/mapa_site.png)
