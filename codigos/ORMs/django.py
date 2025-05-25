# CÓDIGO NÃO TESTADO

from django.db import models

class Post(models.Model):
    title = models.CharField(max_length=100)
    content = models.TextField()


    # OPERAÇÕES CRUD

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