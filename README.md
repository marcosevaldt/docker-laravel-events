# 4all - Sistema de Eventos
### 1. Instalação
Para conseguir utilizar esta aplicação, você precisará ter instalado em sua máquina, os requisitos abaixo:

| Plugin | README |
| ------ | ------ |
| Git | https://git-scm.com/downloads |

Após instalado, baixe este repositório:
```sh
$ git clone https://github.com/marcosevaldt/docker-laravel-events
$ cd docker-laravel-events
```
Para subir a aplicação, utilize o comando:
```sh
$ docker-compose up -d 
```
Após subir a aplicação, verifique se o container do composer terminou de instalar todas as dependências necessárias, para isso, execute o comando abaixo e verifique a mensagem:
```sh
$ docker-compose logs composer
Mensagem esperada: 4all-composer | Application key set successfully.
```
Execute as migrations e seeds do Laravel:
```sh
docker exec -it 4all-app php artisan migrate --seed
```
Caso não tenha instalado o Docker Host Manager, execute o comando abaixo.
Este container será responsável por automaticamente mapear os ips dos container para um hostname acessível (web.4all, phpmyadmin.4all...)
```sh
docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts iamluc/docker-hostmanager
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

@TODO