# Padrões de Projeto Arquiteturas e Ferramentas no Desenvolvimento Web Moderno

# Design Patterns

![Fonte: [https://medium.com/@jonesroberto/design-patterns-mais-usados-atualmente-83b58a1811f4](https://medium.com/@jonesroberto/design-patterns-mais-usados-atualmente-83b58a1811f4)](img/1000063905.webp)

Fonte: [https://medium.com/@jonesroberto/design-patterns-mais-usados-atualmente-83b58a1811f4](https://medium.com/@jonesroberto/design-patterns-mais-usados-atualmente-83b58a1811f4)

Padrões de projeto (*design patterns*) são soluções típicas para problemas comuns em projeto de software. Cada padrão é como uma planta de construção que você pode customizar para resolver um problema de projeto particular em seu código.

O padrão não é um pedaço de código específico, mas um conceito geral para resolver um problema em particular. Você pode seguir os detalhes do padrão e implementar uma solução que se adeque às realidades do seu próprio programa.

Os padrões são frequentemente confundidos com algoritmos, porque ambos os conceitos descrevem soluções típicas para alguns problemas conhecidos. Enquanto um algoritmo sempre define um conjunto claro de ações para atingir uma meta, um padrão é mais uma descrição de alto nível de uma solução. O código do mesmo padrão aplicado para dois programas distintos pode ser bem diferente.

## Classificação

Padrões de projeto diferem por sua complexidade, nível de detalhes, e escala de aplicabilidade ao sistema inteiro sendo desenvolvido.

Os padrões mais básicos e de baixo nível são comumente chamados idiomáticos. Eles geralmente se aplicam apenas à uma única linguagem de programação.

Os padrões mais universais e de alto nível são os padrões arquitetônicos; desenvolvedores podem implementar esses padrões em praticamente qualquer linguagem. Ao contrário de outros padrões, eles podem ser usados para fazer o projeto da arquitetura de toda uma aplicação.

Além disso, todos os padrões podem ser categorizados por seu propósito, ou intenção. Veja os três principais:

- Os padrões criacionais fornecem mecanismos de criação de objetos que aumentam a flexibilidade e a reutilização de código.
- Os padrões estruturais explicam como montar objetos e classes em estruturas maiores, enquanto ainda mantém as estruturas flexíveis e eficientes.
- Os padrões comportamentais cuidam da comunicação eficiente e da assinalação de responsabilidades entre objetos.

## Exemplos

### PHP

No PHP, o padrão *Factory Method* pode ser implementado criando uma classe que decide qual tipo de objeto instanciar com base em parâmetros fornecidos. 

```php
<?php
interface Transporte {
    public function entregar(): string;
}

class Caminhao implements Transporte {
    public function entregar(): string {        
      return "Entrega realizada por caminhão.";
}}

class Navio implements Transporte {   
    public function entregar(): string {        
      return "Entrega realizada por navio.";  
}}

class TransporteFactory {   
  public static function criarTransporte(string $tipo): Transporte {       
    switch ($tipo) { 
       case 'caminhao':                
         return new Caminhao();           
       case 'navio':  
         return new Navio();           
       default:           
         throw new Exception("Tipo de transporte desconhecido.");       
      }    
    }
  }
// Uso
$transporte = TransporteFactory::criarTransporte('caminhao');
echo $transporte->entregar(); 
// Saída: Entrega realizada por caminhão.
?>
```

Neste exemplo, a classe `TransporteFactory` decide qual classe concreta de transporte instanciar com base no tipo fornecido. Isso encapsula a lógica de criação e permite que o código cliente utilize o objeto sem se preocupar com os detalhes de sua instância. 

### JavaScript

Em JavaScript, podemos aplicar o mesmo conceito utilizando funções e classes. 

```jsx
class Transporte {
  entregar() {
    throw new Error("Método 'entregar()' deve ser implementado.");
  }
}
class Caminhao extends Transporte {
  entregar() {
    return "Entrega realizada por caminhão.";
  }
}
class Navio extends Transporte {
  entregar() {
    return "Entrega realizada por navio.";
  }
}
class TransporteFactory {
  static criarTransporte(tipo) {
    switch (tipo) {
      case "caminhao":
        return new Caminhao();
      case "navio":
        return new Navio();
      default:
        throw new Error("Tipo de transporte desconhecido.");
    }
  }
}
// Uso
const transporte = TransporteFactory.criarTransporte('navio');
console.log(transporte.entregar());
// Saída: Entrega realizada por navio.
```

# MVC

O MVC é uma sigla do termo em inglês *Model* (modelo) *View* (visão) e *Controller* (Controle) que facilita a troca de informações entre a interface do usuário aos dados no banco, fazendo com que as respostas sejam mais rápidas e dinâmicas.

O MVC funciona como um padrão de arquitetura de software que melhora a conexão entre as camadas de dados, lógica de negócio e interação com usuário. Através da sua divisão em três componentes, o processo de programação se torna algo mais simples e dinâmico.

Por padrão existem a camada *Model*, *Controller* e *View* que deram origem a sigla dessa arquitetura de software mais utilizado entre os desenvolvedores.

![Diagrama de fluxo MVC. Fonte: [https://www.devmedia.com.br/padrao-mvc-java-magazine/21995](https://www.devmedia.com.br/padrao-mvc-java-magazine/21995)](img/image.png)

Diagrama de fluxo MVC. Fonte: [https://www.devmedia.com.br/padrao-mvc-java-magazine/21995](https://www.devmedia.com.br/padrao-mvc-java-magazine/21995)

## Model

Essa classe também é conhecida como *Business Object Model* (objeto modelo de negócio).

Sua responsabilidade é gerenciar e controlar a forma como os dados se comportam por meio das funções, lógica e regras de negócios estabelecidas.

Ele é o detentor dos dados que recebe as informações do *Controller*, válida se ela está correta ou não e envia a resposta mais adequada.

## Controller

A camada de controle é responsável por intermediar as requisições enviadas pelo *View* com as respostas fornecidas pelo *Model*, processando os dados que o usuário informou e repassando para outras camadas.

Numa analogia bem simplista, o *controller* operaria como o ‘’maestro de uma orquestra’’  que permite a comunicação entre o detentor dos dados e a pessoa com vários questionamentos no MVC.

## View

Essa camada é responsável por apresentar as informações de forma visual ao usuário. Em seu desenvolvimento devem ser aplicados apenas recursos ligados a aparência como mensagens, botões ou telas.

*View* está na linha de frente da comunicação com usuário e é responsável transmitir questionamentos ao controller e entregar as respostas obtidas ao usuário. É a parte da interface que se comunica, disponibilizando e capturando todas as informação do usuário.

## Por que usar MVC?

- **Segurança**: O controller funciona como uma espécie de filtro capaz de impedir que qualquer dado incorreto chegue até a camada modelo.
- **Organização**: Esse método de programação permite que um novo desenvolvedor tenha muito mais facilidade em entender o que foi construído, assim como os erros se tornam mais fácil de serem encontrados e corrigidos.
- **Eficiência**: Como a arquitetura de software é dividida em 3 componentes , sua aplicação fica muito mais leve, permitindo que vários desenvolvedores trabalhem no projeto de forma independente.
- **Tempo**: Com a dinâmica facilitada pela colaboração entre os profissionais de desenvolvimento, o projeto pode ser concluído com muito mais rapidez, tornando o projeto escalável.
- **Transformação**: As mudanças que forem necessárias também são mais fluidas, já que não será essencial trabalhar nas regras de negócio e correção de bugs.

# Frameworks para Desenvolvimento WEB

Os frameworks de desenvolvimento web são **conjuntos de código que fornecem uma estrutura para construir aplicações web**. Eles facilitam o desenvolvimento, oferecendo componentes pré-construídos, ferramentas e padrões de desenvolvimento que poupam tempo e esforço aos desenvolvedores. Existem frameworks para diferentes áreas, como *front-end*, *back-end* e *mobile*, e cada um deles utiliza diversas linguagens como JavaScript, Python, Java, entre outras.

## Exemplos

- **Spring (Java):** Framework Java abrangente, com suporte a diversos aspectos do desenvolvimento web, como gerenciamento de banco de dados, segurança, REST, etc.
- **Laravel (PHP):** Framework PHP popular, com foco em desenvolvimento rápido e elegante, com um sistema de gerenciamento de dependências robusto
- **Express.js (JavaScript):** Framework Node.js para construir APIs REST e aplicações web, com foco em simplicidade e flexibilidade

## Patterns do PHP vs Frameworks

| Framework | Linguagem | Arquitetura Principal | Estilo de Desenvolvimento | ORM Integrado | Suporte a API REST | Suporte a Templates |
| --- | --- | --- | --- | --- | --- | --- |
| **Laravel** | PHP | MVC | Full-stack | Eloquent | Sim | Blade |
| **Django** | Python | MTV (variação do MVC) | Full-stack | Sim | Sim (com DRF) | Django Templates |
| **FastAPI** | Python | Baseado em rotas | API-first | ORM-agnóstico | Sim (nativo) | Jinja2 (opcional) |
| **.NET Core** | C# | MVC | Full-stack | Entity Framework | Sim | Razor |
| **Next.js** | JavaScript | SSR/CSR | Frontend-first | Não aplicável | Sim (via API Routes) | JSX (React) |

### Outros detalhes

- **Laravel (PHP)**
    - **Arquitetura**: MVC (Model-View-Controller).
    - **ORM**: Eloquent, facilita interações com o banco de dados.
    - **Recursos**: Sistema de rotas, middleware, autenticação, filas, eventos e tarefas agendadas.
    - **Vantagens**: Comunidade ativa, vasta documentação e rica em pacotes.
    - **Desvantagens**: Pode ser pesado para aplicações simples.
- **.NET Core (C#)**
    - **Arquitetura**: MVC, com forte suporte a APIs REST.
    - **ORM**: Entity Framework, facilita o mapeamento objeto-relacional.
    - **Recursos**: Injeção de dependência, middleware, autenticação integrada.
    - **Vantagens**: Performance robusta, ideal para aplicações corporativas.
    - **Desvantagens**: Curva de aprendizado para quem não está familiarizado com o ecossistema Microsoft.
- **Next.js (JavaScript/React)**
    - **Arquitetura**: Suporte a SSR (Server-Side Rendering) e CSR (Client-Side Rendering).
    - **ORM**: Não aplicável; geralmente usado com APIs externas.
    - **Recursos**: Rotas baseadas em arquivos, API Routes, suporte a TypeScript.
    - **Vantagens**: Excelente para aplicações React com necessidade de SEO.
    - **Desvantagens**: Focado no frontend; para funcionalidades backend, depende de APIs externas ou serverless functions.

### Comparativo visual

| Característica | Laravel | Django | FastAPI | .NET Core | Next.js |
| --- | --- | --- | --- | --- | --- |
| Full-stack | ✅ | ✅ | ❌ | ✅ | ❌ |
| API-first | ❌ | ❌ | ✅ | ✅ | ✅ |
| Suporte a Templates | ✅ | ✅ | ✅ | ✅ | ✅ |
| ORM Integrado | ✅ | ✅ | ❌ | ✅ | ❌ |
| Suporte a Async/Await | ❌ | ✅ | ✅ | ✅ | ✅ |
| Ideal para APIs REST | ✅ | ✅ | ✅ | ✅ | ✅ |
| Comunidade Ativa | ✅ | ✅ | ✅ | ✅ | ✅ |

# Template Engines

Uma *Template Engine* (ou motor de templates) é uma ferramenta que facilita a separação entre a lógica de programação e a apresentação visual em aplicações web. Ela permite que desenvolvedores criem páginas dinâmicas de forma mais organizada, reutilizável e segura, utilizando estruturas como condicionais, laços e *placeholders* para variáveis dentro de arquivos HTML. 

## Por que usar uma Template Engine?

Embora o PHP permita misturar lógica e HTML diretamente, isso pode resultar em código difícil de manter e pouco legível. As Template Engines oferecem uma sintaxe mais limpa e intuitiva, promovendo:

- **Separação de responsabilidades**: designers podem trabalhar no layout enquanto desenvolvedores focam na lógica.
- **Reutilização de componentes**: como cabeçalhos e rodapés.
- **Melhor manutenção**: com código mais organizado e legível.
- **Segurança aprimorada**: com recursos como escape automático de variáveis para evitar vulnerabilidades.

## Exemplos de Template Engines em PHP

- **Blade (Laravel)**
    
    Blade é a engine de templates nativa do framework Laravel. Sua sintaxe é simples e expressiva, facilitando a criação de layouts reutilizáveis e a inclusão de lógica de apresentação
    
    ```php
    @if ($user->isLogged())
        Bem-vindo, <strong>{{ $user->name }}</strong>
    @endif
    ```
    
    ---
    
- **Twig (Symfony)**
    
    Twig é a engine de templates padrão do Symfony, mas também pode ser usada de forma independente. Ela oferece uma sintaxe clara e recursos avançados como herança de templates, filtros e escape automático de saída
    
    ```php
    {% if user.isLogged() %}
        Bem-vindo, <strong>{{ user.name }}</strong>
    {% endif %}
    ```
    
    ---
    

Esses 2 exemplos correspondem a esse código feito em PHP puro:

```php
<?php if ($user->isLogged()): ?> 
		Bem-vindo, <strong><?= $user->name; ?></strong> 
<?php endif; ?>
```

## Comparação de template engines

### Comparativo Geral

| Motor de Template | Linguagem Base | Tipo de Renderização | Sintaxe | Escapamento Automático | Componentização | Performance | Observações |
| --- | --- | --- | --- | --- | --- | --- | --- |
| **Jinja2** | Python | Server-side | Similar a Django | Sim | Não | Alta | Flexível e performático |
| **Django Templates** | Python | Server-side | Própria do Django | Sim | Não | Média | Integrado ao Django |
| **Vue.js** | JavaScript | Client-side | HTML com diretivas | Sim | Sim | Alta | Reativo e fácil de aprender |
| **React (JSX)** | JavaScript | Client-side | JSX (JavaScript + HTML) | Sim | Sim | Alta | Baseado em componentes |
| **Angular** | TypeScript | Client-side | HTML com diretivas | Sim | Sim | Alta | Framework completo |
| **Laravel Blade** | PHP | Server-side | Própria do Blade | Sim | Sim | Alta | Limpo e poderoso |
- **Jinja2**: Ideal para projetos Python que requerem flexibilidade e performance nos templates.
- **Django Templates**: Perfeito para quem busca simplicidade e integração total com o Django.
- **Vue.js**: Excelente escolha para interfaces interativas com curva de aprendizado suave.
- **React**: Recomendado para aplicações complexas que se beneficiam de uma abordagem baseada em componentes.
- **Angular**: Indicado para grandes aplicações corporativas que necessitam de um framework completo.
- **Laravel Blade**: Ótima opção para desenvolvedores PHP que buscam uma sintaxe limpa e recursos avançados de template.

# ORMs

ORM (*Object-Relational Mapping*) é uma **técnica de desenvolvimento que facilita a interação entre aplicações orientadas a objetos e bancos de dados relacionais, atuando como uma ponte entre esses dois mundos**. Permite manipular dados em bancos de dados como se fossem objetos, sem a necessidade de escrever consultas SQL diretamente

## **Problema da impedância de dados**

Quando estamos trabalhando com aplicações orientadas a objetos que utilizam banco de dados relacionais para armazenamento de informações, temos um problema chamado impedância objeto-relacional devido às diferenças entre os 2 paradigmas.

### Tabela produto

O banco de dados relacional trabalha com tabelas e relações entre elas para representar modelos da vida real. Dentro das tabelas temos várias colunas e a unidade que temos para representação no modelo relacional é uma linha.

| ID | NOME | PREÇO | DESCRIÇÃO |
| --- | --- | --- | --- |
| 12 | AMD Ryzen 5 5600 | 800.00 | Processador |
| 13 | RX 7600 | 1,850.00 | Placa de Video |
| 14 | B550M | 600.00 | Placa Mãe |

### Objeto produto

O paradigma orientado a objetos possui um modo um pouco diferente de trabalhar. Nele nós temos diversos elementos como classes, propriedades, visibilidade, herança e interfaces. A unidade quando falamos de orientação a objetos é o objeto que representa algo do mundo real, seja abstrato ou concreto.

```markup
ID: 12
NOME: AMD Ryzen 5 5600
PREÇO: 800.00
DESCRIÇÃO: Processador
```

---

As principais dificuldades que essas diferenças entre paradigmas causa:

- Representação dos dados e do modelo, já que as estruturas são distintas
- Mapeamento entre os tipos de dados da linguagem de programação e do banco de dados
- Modelo de integridade relacional do banco relacional

Para solucionar esses problemas, o ORM define uma técnica para realizar a conciliação entre os 2 modelos. As bibliotecas ou frameworks ORM definem o modo como os dados serão mapeados entre os ambientes, como serão acessados e gravados. Isso diminui o tempo de desenvolvimento, uma vez que não é necessário desenvolver toda essa parte.

## Tipos de ORMs

### Active Record

Na abordagem Active Record, cada classe de modelo corresponde diretamente a uma tabela no banco de dados, e cada instância da classe representa uma linha nessa tabela. As operações de banco de dados (como inserção, atualização e exclusão) são realizadas diretamente pelos métodos da classe.

**Características:**

- Simplicidade na implementação.
- Ideal para aplicações com lógica de negócios simples.
- Menor separação entre lógica de negócios e acesso a dados.

**Exemplos de ORMs que utilizam Active Record:**

- Eloquent (Laravel/PHP)
- Django ORM (Python)
- ActiveRecord (Ruby on Rails)

### Data Mapper

A abordagem Data Mapper separa completamente a lógica de negócios da lógica de acesso a dados. As classes de modelo não possuem conhecimento sobre o banco de dados; em vez disso, um componente separado (o "mapper") gerencia a transferência de dados entre objetos e o banco de dados.

**Características:**

- Maior flexibilidade e escalabilidade.
- Melhor para aplicações complexas com lógica de negócios sofisticada.
- Separação clara entre lógica de negócios e persistência de dados.

**Exemplos de ORMs que utilizam Data Mapper:**

- Hibernate (Java)
- Doctrine (PHP)
- SQLAlchemy (Python)
- NHibernate (.NET)

## Exemplos

### Eloquent ORM no Laravel (PHP)

O Eloquent é o ORM nativo do Laravel, baseado no padrão Active Record, onde cada modelo representa uma tabela do banco de dados.

```php
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title', 'content'];
}
```

Operações CRUD:

```php
// Criar um novo post
Post::create([
    'title' => 'Título do Post',
    'content' => 'Conteúdo do post...',
]);

// Buscar todos os posts
$posts = Post::all();

// Atualizar um post
$post = Post::find(1);
$post->title = 'Novo Título';
$post->save();

// Deletar um post
Post::destroy(1);
```

### Django ORM

Integrado ao framework Django, é ideal para desenvolvimento rápido e segue o padrão Active Record.

```python
from django.db import models

class Post(models.Model):
    title = models.CharField(max_length=100)
    content = models.TextField()
```

Operações CRUD:

```python
# Criar um novo post
Post.objects.create(title='Título', content='Conteúdo')

# Buscar todos os posts
posts = Post.objects.all()

# Atualizar um post
post = Post.objects.get(id=1)
post.title = 'Novo Título'
post.save()

# Deletar um post
post.delete()
```

### SQLAlchemy

Mais flexível e poderoso, segue o padrão Data Mapper, sendo adequado para aplicações complexas.

```python
from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.orm import declarative_base

Base = declarative_base()

class Post(Base):
    __tablename__ = 'posts'
    id = Column(Integer, primary_key=True)
    title = Column(String(100))
    content = Column(Text)
```

Operações CRUD:

```python
# Criar um novo post
new_post = Post(title='Título', content='Conteúdo')
session.add(new_post)
session.commit()

# Buscar todos os posts
posts = session.query(Post).all()

# Atualizar um post
post = session.query(Post).get(1)
post.title = 'Novo Título'
session.commit()

# Deletar um post
session.delete(post)
session.commit()

```

O SQLAlchemy oferece maior controle sobre as consultas e é preferido em projetos que exigem consultas complexas ou integração com bancos de dados existentes.

### ORMs em outras linguagens

| Linguagem | ORM | Padrão | Características principais |
| --- | --- | --- | --- |
| Java | Hibernate | Data Mapper | Suporte a anotações, integração com JPA, migrações avançadas |
| C# | Entity Framework | Active Record | LINQ para consultas, integração com Visual Studio |
| Go | GORM | Active Record | Migrações automáticas, suporte a transações |
| PHP | Doctrine | Data Mapper | Consultas flexíveis com DQL, separação clara entre modelo e banco |
| Python | Peewee | Active Record | Leve e simples, ideal para aplicações pequenas |
| Ruby | ActiveRecord | Active Record | Integrado ao Rails, convenção sobre configuração |