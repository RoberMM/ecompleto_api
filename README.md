💻 About
Um projeto de integração com API para validação do gateway de pagamento ECOMPLETO, criado em PHP, onde o formulário é enviado automáticamente ao entrar no index.php(Feita somente para representação de que os dados foram enviados e representar algum retorno no front). O "form" recebe os dados de um SELECT feito no arquivo select_request.php com todas a indormações necessárias para realizar o envio na API. Feito o envio do "form" os dados vão para o arquivo curl2, onde passam por um tratamentoatraves IF que faz a vistoria se o pagamento foi aprovado ou recusado, e consequentemente se for recusado o pedido é cancelado atualizando o status dele. Em seguida os dados são atualizados nas tabelas através de um UPDATE para que as informações sejam armazenados corretamente.


🚀 Pré-requisitos
Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas: XAMPP.


🛠 Tecnologias
As seguintes ferramentas foram usadas na construção do projeto:


PHP
JavaScript
BOOTSTRAP
JAVASCRIPT
Editor: Visual Studio Code
