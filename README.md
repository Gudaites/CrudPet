<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Sobre o projeto

#### Configurar projeto

- Clonar repositorio e rodar `composer install` para instalar as dependencia do projeto.
- Configurar arquivo `.env` para conectar com banco de dados local 
- `php artisan migrate` para criar tabelas no banco de dados.
- `php artisan serve` para rodar projeto no localhost porta `8000`

### Rotas

- Post `localhost:8000/api/pets` espera um `nome` e `especie`  no body da requisição para criar um novo pet
    `nome` precisa ter no minimo 2 caracteres
    `especie` precisa ser `C` para `cão` ou `G` para `gato`
<br/>

- Get `localhost:8000/api/pets` retornar em JSON todos os pets e seus atendimentos, com paginacao de 15 pets por pagina e pode ser usado um query com nome `filter` para filtar por nome completo ou por nome parcial
<br/>

- Delete `localhost:8000/api/pets/{id}` recebe como paramentro o id do pet que deseja ser removido, e apagar    todos os atendimentos do mesmos
<br/>

- Post `localhost:8000/api/atendimentos` espera o `pet_id`, `data_atendimento` como obrigatorios e `descricao`
    como opcional no body da requisição para criar um novo atendimento
<br/>

- Get `localhost:8000/api/atendimentos` lista todos atendimentos cadastrados na tabela atendimentos com     paginação de 15 por pagina
<br/>

### Arquivos

Estou enviando junto com o projeto um arquivo JSON chamado `InsomniaCrudPet.json` que pode ser usando no Postman ou Insommina para testar as rotas da API
<br />
