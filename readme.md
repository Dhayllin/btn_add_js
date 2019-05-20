# Add Btn JS


Algumas pastas estão ignoradas pelo .gitignore.

Levando em consideração que você tenha o <code> PHP >= 7.1.3 </code> e <code> <a href="https://getcomposer.org">composer</a>  </code> na sua variável global PATH, para uma nova instalação do Laravel.


# Clonando o projeto 

Vou  considerar que você esteja rodando um sistema operacional Linux/Windows e com o git instalado, faça o seguinte:

<strong> Clone o projeto</strong> <br>
<code>  git clone https://github.com/Dhayllin/btn_add_js.git </code> 
<br>

<strong> Instale as dependências e o framework</strong>
<br>
<code>
composer install --no-scripts
</code>

<strong>Copie o arquivo .env.example</strong>
<br>
<code> cp .env.example .env </code> <br><br>
 Ainda no .env configure o acesso ao banco de dados: <br>
<code>
DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1    <br>
DB_PORT=3306  <br>
DB_DATABASE=nome_bd_local <br>
DB_USERNAME=**** <br>
DB_PASSWORD=****
</code>

<strong> Crie uma nova chave para a aplicação</strong>
<br>
<code>php artisan key:generate</code>

Em seguida você deve configurar o arquivo .env e rodar as migrations com:
<code> php artisan migrate --seed </code>
 
Recomendo <code> php artisan migrate:fresh --seed </code> para recriar o banco após atualizações. FRESH deleta o banco e cria novamente.