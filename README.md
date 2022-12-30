# Como rodar o projeto

Clonar o projeto:<br>
**git clone https://github.com/nilsonnegraodeveloper/velcompany.git && cd velcompany**

No seu servidor criar um banco de dados MySQL (Ex. velcompany)<br>

Copiar o .env.example como nosso .env principal e atualizar com as suas credencias do BD:<br>
**cp .env.example .env**

Atualizar as dependências do aplicativo:<br>
**composer update**

Gerar a chave do aplicativo:<br>
**php artisan key:generate**

Criar a chave do JWT Token:<br>
**php artisan jwt:secret**

Rodar as migrations:<br>
**php artisan migrate**

Popular o banco com dados para teste:<br>
**php artisan db:seed**

Rodar a aplicação:<br>
**php artisan serve**

Abrir o Postman para testar os endpoints da api.<br>

**OBS.:**
Na tabela pivot tipagem_salas são salvos os campos sala_id, tipo_sala_id e o preco (por minuto).<br>
O aluguel das salas será calculado por hora (mínimo 1 hora).<br>

Para gerar a fatura do aluguel da sala:<br>
Seleciona o cliente (cliente_id) a tipagem da sala (tipagem_sala_id) e o tempo em horas (mínimo 1 hora).<br>

### DETALHAMENTO DO PROJETO: <br>
DESCRIÇÃO DO QUE FOI IMPLEMENTADO:
- As atividades listadas e apontadas no detalhamento do projeto, desenvolvida API RestFull na tecnologia definida;
- Tecnologia: PHP + Framework Laravel;
- Dados simulados: utilizado o Postman para simular os dados e testar as funcionalidades;
- Entrega funcional: gerado um entregável funcional e facilmente testável (vide instruções no fim deste documento);
- Código-fonte: foi realizado o commit no repositório GIT indicado.

**TECH STACK E DEPENDÊNCIAS:**<br>
- PHP 7.4.3;
- MySQL 8.0.26-0ubuntu 0.22.04.2 - (Ubuntu);
- Apache/2.4.41 (Ubuntu);
- VSCodium 1.64.2;
- Postman 8.11.1;
- Composer 2.1.3;
- Laravel 8.83.9;
- JWT-AUTH 1.0.2 (Tokem para autenticação do Usuário);
