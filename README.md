# Registro de Usuários

Bem-vindo ao Registro de Usuários! Para começar, siga as instruções abaixo.

## Configuração do Ambiente

1. **Clone o repositório para o seu ambiente local:**
    ```bash
    git clone https://github.com/rickgrana/registeruser.git
    cd registeruser
    ```

2. **Renomeie o arquivo `.env.example` para `.env`:**
    ```bash
    mv .env.example .env
    ```

    Certifique-se de configurar corretamente as variáveis de ambiente no arquivo `.env`.

## Docker Compose

Certifique-se de ter o Docker e o Docker Compose instalados em seu sistema antes de prosseguir.

1. **Construa e execute as instâncias Docker:**
    ```bash
    docker compose up --build
    ```

    Este comando irá construir as imagens necessárias e iniciar os contêineres.

2. **Acesse o seu aplicativo em [http://localhost:8000](http://localhost:8000).**

## Contribuição

Se você deseja contribuir para este projeto, por favor, siga as diretrizes de contribuição no arquivo [CONTRIBUTING.md](CONTRIBUTING.md).

## Problemas e Suporte

Se encontrar problemas ou precisar de suporte, abra uma nova issue neste repositório.

Obrigado por contribuir para o nosso projeto!
