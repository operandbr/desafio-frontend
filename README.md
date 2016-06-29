# Desafio frontend: Vagrant / PHP / Javascript / KnockoutJS

#### Antes de tudo...

Este teste é voltado para desenvolvedores que têm interesse em trabalhar na [AgenciaSys](http://www.agenciasys.com/),
então... se você está querendo trabalhar em um ambiente descontraído, fazendo o que gosta e compartilhando conhecimento, este desafio é pra você! :)

#### Objetivo:
Desenvolver uma para uma aplicação de Agenda de Compromissos (CRUD) utilizando [KnockoutJS](http://www.knockoutjs.com) como framework frontend e PHP no backend.

#### Desafio:
- Implementar em HTML/CSS os layouts apresentados em `resources/layouts`.
  - A fonte utilizada é a ProximaNova e está em `resources/fonts`.
- Gerenciar compromissos.
  - Listar (e filtrar)
  - Adicionar
  - Editar
  - Excluir
- Realizar validação do formulário no frontend.
  - Caso o servidor retorne erro, apresentá-lo amigavelmente ao usuário.
- Os métodos de conexão com banco e CRUD já estão desenvolvidos, cabe ao candidato apenas utilizá-los nas rotas adequadas.
- Todas as listagens e apresentações de dados deverão ser realizadas por Ajax, nenhum layout deverá ser montado no servidor.

#### Instruções:
1. Faça um fork deste projeto.
2. Crie uma branch com o padrão `seunome_yyyy_mm_dd`.
3. Utilizando o Vagrant e o KnockoutJS implemente o objetivo acima proposto conforme a estrutura solicitada e pré-disponibilizada neste projeto.
4. Ao finalizar este desafio, envie-nos um pull request com suas alterações e envie um email para gip@agenciasys.com.br com o link para o pull request.

**Dicas:**
  - Fica a critério do candidato o uso de frameworks CSS, pré-processadores, task managers e demais ferramentas que o auxiliem tanto em **agilidade**, **qualidade** e **performance**.

#### Sobre a configuração do projeto.

É necessário que você tenha VirtualBox e Vagrant instalados no seu computador.

- Caso você tenha o Apache, Nginx ou outro servidor rodando na sua máquina, certifique-se de que não esteja utilizando a porta `8000`.
- Url do projeto: `localhost:8000`.
- A configuração de host virtual está no arquivo `vagrant/config/nginx/conf.d/desafio-frontend.conf`. Você pode alterá-lo para a configuração que achar melhor, se assim desejar.
- No arquivo `vagrant/config.yaml` existe a configuração `projects-folder: "/www"`. Onde `/www` é o caminho que contém o diretório `desafio-frontend`. No seu caso, provavelmente o diretório será outro. Altere o `/www` para o diretório da sua máquina. (Ex: Se o o projeto, na sua máquina, fica em `/home/usuario/projetos/desafio-frontend`, então você vai substituir o `/www` por `/home/usuario/projetos`)
- Banco de dados:
  - Usuário: `root`
  - Senha: `admin`

Os comandos a seguir criam e configuram uma máquina virtual com linux, contendo o ambiente de desenvolvimento necessário e o projeto inicial. *Estes comandos funcionam perfeitamente no sistema operacional linux, caso você utilize outro sistema operacional, é necessário procurar os comandos equivalentes.*

> OBS: TODOS OS COMANDOS ABAIXO DEVEM SER EXECUTADOS COMO USUÁRIO NORMAL, NÃO COMO ROOT.

Abra o terminal e digite:
```sh
$ vagrant box add desafio-frontend https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box
```

Aguarde o download finalizar. Este passo pode demorar um pouco dependendo da sua conexão. Ainda no terminal, entre na pasta `vagrant` do projeto `desafio-frontend`  e rode o seguinte comando:
```sh
$ vagrant up
```

Aguarde a configuração terminar. Após isso, o ambiente de desenvolvimento estará devidamente configurado.

**Obs:** O banco de dados, assim como todo o ambiente de desenvolvimento estão no vagrant. Para ter acesso ao ambiente é necessário acessar o vagrant via `SSH`.
- IP da máquina virtual com o ambiente: `192.168.0.10`
- Usuário SSH: `vagrant`

Daqui pra frente é com você.
Faça o seu melhor! ;)

*Em caso de dúvidas, envie um email para gip@agenciasys.com.br.*
