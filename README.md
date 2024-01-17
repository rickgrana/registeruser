# Registro de Usuários

Bem-vindo ao Registro de Usuários! Para começar, siga as instruções abaixo.

## Configuração do Ambiente

### **Clone o repositório para o seu ambiente local:**
    ```bash
    git clone https://github.com/rickgrana/registeruser.git
    cd registeruser
    ```

### **Renomeie o arquivo `.env.example` para `.env`:**
    ```bash
    mv .env.example .env
    ```

- Certifique-se de configurar corretamente as variáveis de ambiente no arquivo `.env`.

- Este projeto roda sobre uma estrutura Docker. 
Certifique-se de ter o Docker e o Docker Compose instalados em seu sistema antes de prosseguir.

### **Construa e execute as instâncias Docker:**
    ```bash
    docker compose up --build
    ```

- Este comando irá construir as imagens necessárias e iniciar os contêineres.
- Aguarde a instalação e execução das migrations para começar

## Acessando a aplicação
Acesse a aplicação em: [http://localhost:8000/auth/register](http://localhost:8000/auth/register)


## Executando Testes

Para executar testes, utilize o seguinte comando:
   ```bash
   docker exec firstdecision-app php artisan test
   ```


## Problemas e Suporte

Se encontrar problemas ou precisar de suporte, abra uma nova issue neste repositório.

Obrigado por contribuir para o nosso projeto!
