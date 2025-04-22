📋 Descrição do Projeto

Este sistema foi desenvolvido como projeto para a disciplina de Aplicações para Internet da Uniube no curso de Análise e Desenvolvimento de Sistemas. Ele permite o gerenciamento completo de consultas médicas, incluindo:

•	Cadastro, visualização, edição e exclusão de pacientes  
•	Cadastro, visualização, edição e exclusão de médicos  
•	Agendamento, visualização, edição e cancelamento de consultas  

O projeto implementa os seguintes padrões de projeto:

•	MVC (Model-View-Controller): Separação clara entre lógica de negócios, apresentação e controle  
•	DAO (Data Access Object): Para abstração da camada de acesso a dados  
•	Service: Para encapsulamento das regras de negócio  
•	Singleton: Utilizado para a conexão com o banco de dados  
•	Factory: Para a criação de objetos DAO  

🚀 Funcionalidades

## Módulo de Pacientes
•	Listar todos os pacientes  
•	Cadastrar novo paciente  
•	Editar dados do paciente  
•	Excluir paciente  

## Módulo de Médicos
•	Listar todos os médicos  
•	Cadastrar novo médico com especialidade  
•	Editar dados do médico  
•	Excluir médico  

## Módulo de Consultas
•	Listar todas as consultas agendadas  
•	Agendar nova consulta (selecionando paciente, médico, data/hora)  
•	Editar detalhes da consulta  
•	Excluir/cancelar consulta  
•	Adicionar observações à consulta  

🛠️ Tecnologias Utilizadas

•	PHP 7+: Linguagem de programação backend  
•	MySQL: Sistema de gerenciamento de banco de dados  
•	HTML/CSS: Para estruturação e estilização das páginas  
•	JavaScript: Para interações e validações no frontend  

📁 Estrutura do Projeto

O projeto segue uma estrutura organizada com separação clara de responsabilidades:

```text
mvc-consultas/
├── controller/              # Controladores da aplicação
│   ├── Consulta.php
│   ├── Medico.php
│   └── Paciente.php
├── dao/                     # Camada de acesso a dados
│   ├── IConsultaDAO.php
│   ├── IMedicoDAO.php
│   ├── IPacienteDAO.php
│   └── mysql/               # Implementação MySQL dos DAOs
│       ├── ConsultaDAO.php
│       ├── MedicoDAO.php
│       └── PacienteDAO.php
├── generic/                 # Classes genéricas e utilitárias
│   ├── Acao.php
│   ├── Autoload.php
│   ├── Controller.php       # Controlador frontal com rotas
│   ├── MysqlFactory.php
│   └── MysqlSingleton.php   # Implementação Singleton de conexão
├── public/                  # Arquivos públicos e views
│   ├── consulta/
│   ├── medico/
│   ├── paciente/
│   └── styles/
│       └── style.css
├── service/                 # Camada de serviços
│   ├── ConsultaService.php
│   ├── MedicoService.php
│   └── PacienteService.php
├── template/                # Templates do sistema
│   ├── ITemplate.php
│   └── SistemaTemp.php
├── .htaccess                # Configuração de rewrite para URLs amigáveis
└── index.php                # Ponto de entrada da aplicação
```

📊 Estrutura do Banco de Dados

O sistema utiliza três tabelas principais:

## Tabela pacientes
•	id - Identificador único (PK)  
•	nome - Nome do paciente  
•	email - Email de contato  

## Tabela medicos
•	id - Identificador único (PK)  
•	nome - Nome do médico  
•	especialidade - Área de especialização  

## Tabela consultas
•	id - Identificador único (PK)  
•	paciente_id - Referência ao paciente (FK)  
•	medico_id - Referência ao médico (FK)  
•	data_consulta - Data e hora da consulta  
•	observacoes - Observações adicionais  

⚙️ Instalação e Configuração

## Pré-requisitos
•	PHP 7.0 ou superior  
•	MySQL 5.7 ou superior  
•	Servidor web (Apache, Nginx, etc.)  

## Passo a passo
1.	Clone o repositório 
```bash
git clone https://github.com/seu-usuario/mvc-consultas.git
```

2.	Crie o banco de dados:
```sql
CREATE DATABASE sistema_consultas;

USE sistema_consultas;

CREATE TABLE pacientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL
);

CREATE TABLE medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  especialidade VARCHAR(100) NOT NULL
);

CREATE TABLE consultas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  paciente_id INT NOT NULL,
  medico_id INT NOT NULL,
  data_consulta DATETIME NOT NULL,
  observacoes TEXT,
  FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
  FOREIGN KEY (medico_id) REFERENCES medicos(id)
);
```

3.	Configure a conexão com o banco de dados. Edite o arquivo `generic/MysqlSingleton.php` com suas credenciais: 
```php
private $dsn = 'mysql:host=localhost;dbname=sistema_consultas';
private $usuario = 'seu_usuario';
private $senha = 'sua_senha';
```

4.	Configure o servidor web. Se estiver usando Apache, certifique-se de que o mod_rewrite está habilitado e que o .htaccess está configurado corretamente.

5.	Acesse a aplicação. Abra seu navegador e acesse:  
http://localhost/mvc-consultas/

🚢 Utilização do Sistema

## Fluxo de Uso
1.	Cadastro de Médicos e Pacientes  
- Primeiro, cadastre alguns médicos com suas especialidades  
- Em seguida, cadastre os pacientes que frequentarão o consultório  

2.	Agendamento de Consultas  
- Com médicos e pacientes cadastrados, você pode agendar consultas  
- Selecione o paciente, o médico, a data/hora e adicione observações se necessário  

3.	Gerenciamento  
- Visualize todas as consultas agendadas  
- Edite ou cancele consultas conforme necessário  
- Atualize informações de pacientes ou médicos quando preciso  

🔍 Padrões de Projeto Implementados

1. MVC (Model-View-Controller)  
O sistema separa claramente:
•	Model: Representado pelas classes DAO e entidades  
•	View: Arquivos na pasta public/ com a interface do usuário  
•	Controller: Classes na pasta controller/ que coordenam as ações  

2. DAO (Data Access Object)  
•	Interfaces DAO definem operações CRUD  
•	Implementações específicas para MySQL encapsulam o acesso ao banco  

3. Service  
•	Classes de serviço encapsulam a lógica de negócio  
•	Atuam como intermediárias entre os controllers e os DAOs  

4. Singleton  
•	Padrão implementado na classe MysqlSingleton para garantir uma única conexão com o banco de dados  

5. Factory  
•	MysqlFactory facilita a criação de objetos DAO  

👥 Autores  
•	Desenvolvido por: Ygor Gonzaga Josué  
•	Disciplina: Aplicações para Internet  
•	Instituição: Uniube  
