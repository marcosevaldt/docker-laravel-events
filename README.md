# 4all - Sistema de Eventos
### Sobre
Sistema de eventos para a prova da 4All.

### Instalação
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste.

Para conseguir utilizar esta aplicação, você precisará ter instalado em sua máquina, os requisitos abaixo:

| Plugin | README |
| ------ | ------ |
| Git | https://git-scm.com/downloads |
| Docker | https://docs.docker.com/install |
| Docker Compose | https://docs.docker.com/compose/install |
| Docker Host Manager | https://github.com/iamluc/docker-hostmanager |

Após instalado os requisitos, baixe este repositório:
```sh
$ git clone https://github.com/marcosevaldt/docker-laravel-events
$ cd docker-laravel-events
```
Para subir a aplicação, utilize os comandos:
```sh
$ docker network create 4all
$ docker-compose up -d 
```

Após subir a aplicação, verifique se o container do composer terminou de instalar todas as dependências necessárias, para isso, execute o comando abaixo e verifique a mensagem:
```sh
$ docker-compose logs composer
Mensagem esperada: 4all-composer | Application key set successfully.
```

Execute as migrations e seeders do Laravel:
```sh
docker exec -it 4all-app php artisan migrate --seed
```
Caso não tenha iniciado o container do Docker Host Manager, execute o comando abaixo.
Este container será responsável por automaticamente mapear os ips dos container para um hostname acessível (web.4all, phpmyadmin.4all...)
```sh
docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts iamluc/docker-hostmanager
```

Caso não tenha instalado o Docker Host Updater por algum motivo, a aplicação pode ser acessada através do IP do container, para saber o IP da aplicação execute o comando:
```sh
$ docker inspect --format='{{range .NetworkSettings.Networks}}{{println .IPAddress}}{{end}}' 4all-web
```

#### Instalação GIF
![app_installation](https://s2.gifyu.com/images/mensagem_esperada37c9030102b08ca8.gif)

### Acessos
| Nome | URL | Dados|
| ------ | ------ |------ |
| Aplicação | http://web.4all | e-mail: 4all@example.com,  senha: secret |
| PHPMyAdmin | http://phpmyadmin.4all | login: homestead, senha: secret |

### Rotas Importantes da Aplicação
| URL | Parametros | Tipo| Descrição |
| ------ | ------ |------ |------ |
| /home | Nenhum |GET |Listagem de todos eventos ativos para compra |
| /event/show | id:int |GET |Listagem de um evento |
| /checkout | id:int |POST |Finalização de compra de um evento |

### Logs da Aplicação
| Nome | Descrição | Storage |
| ------ | ------ |------ |
| visitantes | Contém todos acessos e ips dos visitantes |/storage/logs/visitantes.log|
| usuarios | Contém as ações, acessos e ip dos usuários |/storage/logs/usuarios.log|
| eloquent | Contém as queries dos modelos do eloquent |/storage/logs/eloquent.log|

### Testes da Aplicação
Executar comando abaixo para rodar o PHPUnit:
```sh
docker exec -it 4all-app vendor/bin/phpunit --testdox
```
|Status | Teste | Descrição |
| ------ | ------ |------ |
✔ | Can create event | Um Evento pode ser criado
✔ | Can show event | Um Evento pode ser mostrado
✔ | Can list events | Todos eventos podem ser listados
✔ | Can buy event | Pode ser comprado um evento
✔ | User can see event form | Usuário pode ver o formulário do evento
✔ | User can see event list form | Usuário pode ver a lista de eventos
✔ | User can see event show form | Usuário pode ver um evento específico
✔ | User can see checkout form | Usuário pode fazer o checkout de um evento

### Stack escolhida
#### Um pouco sobre e por que PHP?

O PHP passou por diversas reescritas de código ao longo do tempo e nunca parou de conquistar novos adeptos, a flexibilidade da linguagem e sua rápida curva de aprendizagem são dois pontos que fazem novas pessoas aderirem a sua utilização assim como fiz há dois anos.

Atualmente, considero o PHP uma linguagem robusta, de alta performance, com uma comunidade forte e que domina grande parte das aplicações web, é uma linguagem open source e orientada a objetos.

A comunidade ajudou a consolidar os frameworks e micro-frameworks que atualmente seguem excelentes padrões definidos pelo PHP-FIG, além de termos um excelente gerenciador de dependências facilitando a interoperabilidade entre componentes, por isso a minha escolha.

#### Um pouco sobre e por que Laravel?
Laravel é uma Framework bem conhecido entre os desenvolvedores PHP, acredito que suas duas maiores qualidades são simplicidade e facilidade de se tornar expressivo quando o assunto é código.

O Framework possui uma excelente documentação e foi integrado com diversos componentes que tornam menos doloroso o trabalho do desenvolvedor para tarefas cotidianas e conseqüentemente não sacrificam a funcionalidade da aplicação.

Dos principais componentes, temos o Artisan para gerenciamento da interface de linha de comando que pode ser estendido com facilidade, para a camada de abstração do banco de dados temos o Eloquent facilitando o mapeamento das tabelas e colunas, na engine de template temos o Blade que nos permite manipular os dados e apresentar ao usuário de forma elegante, além do Framework como um todo seguir o padrão MVC, contando com roteamento, middleware, sessão, validação, logging e integração com testes seguindo os padrões da PSR.

Caso sua aplicação se torne mais robusta, pode ser utilizado os componentes de eventos, filas e serviços de mensageria integrados para suportar a demanda, com todos estes serviços, acredito que este Framework possa ser utilizado tanto para pequenas, médias e grande aplicações e por isso a minha escolha.

#### Um pouco sobre e por que Docker?
Os contêineres mudaram a maneira de desenvolver, distribuir e executar softwares. Os desenvolvedores agora podem construir softwares localmente, sabendo que será executado de maneira idêntica não importando o ambiente de hospedagem.

Os contêineres são um encapsulamento da aplicação com suas dependências em uma instância isolada de um sistema operacional que pode ser usado na execução de aplicativos.

Escolhi usar pela portabilidade, além de ser uma tecnologia em alta no mercado, porém, não muito explorada no Brasil.

#### Por que MySQL?
O banco de dados relacional MySQL possui uma comunidade forte, seu projeto é open source e com licença comercial caso necessária, já está no mercado a bastante tempo mostrando sua maturidade e também é facilimente instalável em qualquer sistema operacional, além de ter alta compatibilidade com a stack escolhida.

### Licença
MIT
Copyright © 2018 Marcos Evaldt Ereno

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.