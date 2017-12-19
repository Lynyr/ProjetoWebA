## Documentação do sistema

### Descrição

O site consiste de um jogo incremenal, também conhecido por "clicker game" ou "idle game", onde o usuário deve executar ações simples, como um click do mouse, repetidamente para progredir no jogo.

Foi incluído um sistema de login e cadastro para que os usuários possam salvar o seu progresso.

### Funcionamento

Após o cadastro do jogador e login, o usuário é redirecionado para a página principal do jogo, onde deverá ficar clicando num botão para aumentar a sua pontuação, o tempo que julgar necessário.

Com esses pontos ele pode comprar "upgrades" para adicionar multiplicadores e aumentar ainda mais a aquisição de pontos.

O objetivo do jogo é simplesmente acumular mais pontos, sem limites máximos.

### Estrutura do Projeto

O site foi estruturado como um misto de html e php, utilizando de JavaScript para fazer a trânsferencia de dados entre os componentes.

A maioria dos scripts se encontram em arquivos separados com a finalidade de manter o HTML mais limpo e fácil de ler.

Apesar de existir a validação dos dados no front end, a parte principal da validação ocorre no back end e é retornado ao html via JSON e atualizado via AJAX.

Os dados são persistidos via cookies, cujo valores são utilizados para inserir valores atualizados no banco de dados.

Para o layout foi utilizado o Bootstrap 4 com algumas poucas classes extras em um arquivo de estilo separado.

Banco de dados utilizado é o MySQL que consiste de duas tabelas, uma para salvar as contas e outra para salvar a pontuação e upgrades do jogador.

### Detalhes index.html

Está página é a primeira que o usuário encontra ao acessar o site, nela se encontram dois botões que redirecionam para as páginas de login e cadastro respectivamente.

### Detalhes login.html

Está página é a responsável por abrir a sessão do usuário que permite o acesso ao jogo de fato.

Ao carregar a página, um script JS com Ajax é acionado e aguarda o envio dos dados do formulário via Post para o login.php.

O login.php é responsável por realizar a validação no back end, abrir a sessão, puxar dados do usuário do banco e retornar uma resposta positiva ou negativa para a página login.html via JSON.

Ao receber os valores via JSON, o script Ajax irá interpretar e atualizar o html conforme necessário.

Em caso de resposta positiva ele direciona para a página do jogo.

Em caso de resposta negativa ele releva campos de erro ocultos e preenche os mesmos com as mensagens de erro geradas pelo php.


### Detalhes cadastro.HTML

Está página é a responsável por criar novas contas no banco de dados.

Similar ao login.html, ela aciona um script JS com Ajax que aguarda o Post e resposta do cadastro.php.

Em caso de resposta positiva do cadastro.php o jogador é redirecionado para a página de login.

Em caso de resposta negativa ele revela e preenche campos de erro ocultos.

### Detalhes maingame.php

Principal página do projeto, utiliza de várias funções JavaScript para atualizar o conteúdo html do php.

O cabeçalho em php serve para verificar se o usuário está com sessão aberta ou não, caso esteja sem sessão ele redireciona para o index.html.

Nesta página se encontram o botão para deletar a conta e para desligar a sessão.

Ao desligar a sessão os dados dos cookies são injetados no banco de dados com a finalidade de salvar o progresso do jogador.

Ao deletar a conta a sessão é fechada e os valores referentes a sessão aberta são removidos do banco de dados.

A página é separada em duas colunas principais dentro de um container, o lado esquerdo é onde se encontra o jogo em si, o lado direito serve para obter upgrades.

### Detalhes Banco de dados

As tabelas são, respectivamente a tabela conta e ponto.

Dentro da tabela conta existem dois campos, chave primária login e senha.

Dentro da tabela ponta existem campos, chave primária e estrangeira loginID que referencia a chave login da tabela conta, cana, bolsonaro, facao, maquina.

O campo cana é a pontuação do jogador, os demais campos são referentes aos upgrades comprados pelo jogador.
