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

**1. Qualidade das regras de negócio**<br>

Desenvolva as regras de negócio do escopo de forma clara, mas se puder, não se atenha somente a elas. Nem tudo que é necessário para dar vida a um projeto está especificado neste escopo, então é importante que você demonstre a sua habilidade e capacidade de análise para entender e desenvolver regras de negócio que possam agregar valor ao projeto. Como por exemplo: Autocompletar dos campos de endereço através de integração com API de CEP dos Correios;<br>

**2. Quantidade de itens do escopo programados**<br>

Caso não seja possível programar todos os itens do escopo, ou todas as regras de negócio, faça o máximo que puder na maior qualidade possível.<br>

**3. Generalização do código**<br>

Lembre que a Velty desenvolve soluções para várias startups diferentes, então, quanto mais o código desenvolvido puder ser reutilizado em outros projetos, melhor.<br>

**4. Qualidade do código (documentação, objetividade, redundância, organização, etc)** <br>

Você irá trabalhar com vários outros projetos e profissionais, portanto, o seu código deve ser de qualidade para que outros técnicos possam dar não só manutenção, mas também evoluí-lo da melhor forma possível.<br>

**5. Tempo para finalização da tarefa** <br>

O tempo é fundamental para qualquer projeto, e neste teste ele será o último critério a ser avaliado. Ele será o fator de desempate final, caso você obtenha uma nota similar a outro candidato.<br>

**DESCRITIVO DA NECESSIDADE** <br>

A startup XYZ deseja revolucionar o mercado de coworking e oferecer uma experiência totalmente digital e pay per use, cobrando somente pelos MINUTOS utilizados em cada espaço.<br>

O projeto será composto por um web-app e aplicativo mobile que irão consumir todo o conteúdo através de uma API.<br>

A API é o alvo deste teste e ela deverá ser desenvolvida utilizando as seguinte tecnologias:<br>

- Linguagem: PHP 8
- Frameworks: Laravel + Lumen
- DB: MySQL

**ITENS NECESSÁRIOS**

**1. Módulo de clientes**<br>
Campos:
1. Razão social
2. Nome fantasia
3. CNPJ
4. Telefone
5. Email
6. Data de nascimento
7. Endereço
8. CEP
9. Logradouro
10. Número
11. Complemento
12. Cidade
13. UF

Funcionalidades:
1. CRUD
2. Validação do campo de CNPJ para checar se já há outro igual cadastrado no sistema e se o digitado é válido

**2. Módulo de prédios**<br>
Campos:
1. Nome
2. Endereço
3. CEP
4. Logradouro
5. Número
6. Complemento
7. Cidade
8. UF
9. URL Google Maps
10. Galeria de fotos
11. Descrição (WYSIWYG)
12. Cliente (N:1)

Funcionalidades:
1. CRUD

**3. Módulo de salas**<br>
Campos:
1. Prédio (N:1)
2. Nome
3. Galeria de fotos
4. Descrição (WYSIWYG)
5. Tipagem de sala (N:N)
6. Definição de preço por minuto para cada tipagem

 Funcionalidades:
 1. CRUD

**4. Módulo de tipagem de salas**<br>
Campos:
1. Nome
2. Descrição (WYSIWYG)

Funcionalidades:
1. CRUD

#### INSTRUÇÕES SOBRE O ENVIO DO TESTE<br>

O prazo para finalização da tarefa é de 5 dias corridos, a contar da data de envio da mensagem contendo este teste.<br>

Caso haja qualquer dúvida sobre este teste você deverá encaminhá-la por email para o endereço ****. O envio desta tarefa deve ser feito para o e-mail **** seguindo o padrão no assunto: [Seletiva Back-end PHP Pleno - ****] - Seu Nome<br>
