## Teste - PC4
<strong>Obs :</strong> Alguns dados podem estar em inglês e outros em português. Como queria acabar o teste num tempo bom , acabei focando apenas na funcionalidade.
<br/>
<br/>
<strong>Objetivo :</strong> Elaborar um sistema que armazena dados de Escolas, Turmas e Alunos, com interações e relações. Os campos que foram dados como obrigatórios estão com validações para que, quando um formulário for enviado com algum desses campos vazios, não seja executada a request na API.
<br/>
<strong>Tecnologias :</strong> Laravel 8 e Vue.js 3.
<br/><br/><br/><br/>

## Breve visualização:
Escola -> Turma -> Aluno

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school_class_student.gif" width="600"/>
<br/><br/>

### Tela inicial: 
<hr>
Aqui podemos ver a página principal do sistema, onde é possível se locomover pelos dados de escolas, turmas e alunos apenas clicando em seus respectivos ícones ou navegando pela barra acima, utilizando o método SPA do Vue.js. <br/><br/>
<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/main.gif" width="600"/>

SPA:<br/><br/>
<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/spa.gif" width="600"/>
<br/><br/><br/><br/>

### Escola: 
<hr>
Nesta tela podemos ver como os dados das escolas são organizados em uma tabela, com as informações: Nome, endereço, quantidade de turmas e quantidade de alunos, também uma coluna de ações contendo os métodos de exclusão e edição, além dos botões de registrar e pesquisar escolas pelo ano. <br/><br/>

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school.jpg" width="600"/>
<br/>

Começando pelas interações com as escolas, temos o método de registro com os campos: Nome da escola e Endereço: <br/><br/>
<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school_register.gif" width="600"/>
<br/>

Ao clicar para editar uma determinada escola, uma consulta no banco de dados é feita para retornar as respectivas turmas que estão ligadas a esta escola, lembrando que o relacionamente de turmas para escola é de muitos para um. Campos de edição: Nome da escola e Endereço.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school_update.gif" width="600"/>

Após ter digitado o ano da escola que queira pesquisar e ter clicado no botão, será feito uma consulta pela API, essa pegará as escolas que possuem semelhança do que foi digitado e trará num array todas as escolas. Caso o botão for clicado sem nada no input, será devolvida todas as escolas registradas no sistema.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school_search.gif" width="600"/>


Pressionando o botão "Excluir", a escola e todas as relações com alunos e turmas serão excluídas por conta das propriedades: onDelete('cascade) e onUpdate('cascade').

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/school_delete.gif" width="600"/>
<br/><br/><br/><br/>


### Turmas 
<hr>
Assim como a listagem das escolas, a listagem das turmas ocorre de forma semelhante, vemos uma tabela com as informações: Ano da turma, Nível de ensino (médio/high ou fundamental/elementary), Série, Turno (manhã/moornign, tarde/afternoon ou noite/night), Nome da escola a quem pertence e quantidade de alunos da turma. <br/><br/>

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/class.jpg" width="600"/>

Quando o usuário é direcionado à tela para registrar uma nova turma, uma query chamada pela função mounted do Vue.js (executa quando a tela é carregada) realiza uma pesquisa para retornar todas as escolas disponíveis para registrar uma turma. Campos: Ano, nível de ensino, série, turno e escola. 

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/class_register.gif" width="600"/>

No método de edição de turmas, ao carregar a página, além da query para pegar as escolas, uma outra é executada, monstrando se há alunos já registrados em tal turma.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/class_update.gif" width="600"/>

A pesquisa de turmas é feita pelo ano dessa, caso o campo esteja vazio, será retornada todas as turmas registradas no sistema.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/class_search.gif" width="600"/>

Método de deleção de turma. 

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/class_delete.gif" width="600"/>
<br/><br/><br/><br/>

### Alunos
<hr>

Na tela de alunos, os dados também são retornados de forma coesa e organizada, mostrando, dentro de uma tabela, os campos: Nome completo do aluno, E-mail, Data de nascimento, telefone, escola na qual o aluno está registrado e quantas turmas o aluno participa. Lembrando que o relacionamento de escola e alunos é de um para muitos, e de alunos para turmas, muitos para muitos.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student.jpg" width="600"/>

Começando pelo método de registro, vemos a possibilidade de guardar no banco de dados as informações: Nome completo, E-mail, telefone, data de nascimento, gênero, escola e turmas.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student_register_1.gif" width="600"/>

Dando mais destaque à essa dinâmica aqui, vemos que, quando há o carregamento da página, é trazido para o campo "Escola" todas as escolas registradas no sistema.

Quando o valor desse campo é alterado, o sistema faz uma query e retorna todas as turmas registradas na determinada escola escolhida pelo usuário no campo "Turmas".

Após escolher a turma e clicar no botão "Adicionar turma", o valor da turma é jogado dentro de um array que será usada para fazer o registro na table pivo: students_classes.

O usuário pode remover a turma selecionada, assim, o valor da turma será removido do array.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student_register_2.gif" width="600"/>

A mesma dinâmica com as escolas e turmas é usada no método de edição do usuário.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student_update.gif" width="600"/>

Para pesquisar aluno(s), basta digitar o nome no campo e pressionar "Pesquisar", será devolvido todos os alunos que correspondem à pesquisa.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student_search.gif" width="600"/>

E por fim, o método de deletar aluno.

<img src="https://github.com/bertolucci-alan/pc4_challenge/blob/master/readme/student_delete.gif" width="600"/>




































