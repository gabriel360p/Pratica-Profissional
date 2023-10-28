# Testes Automáticos

Para executar os testes automáticos, basta usar o artisan:
```bash
php artisan test
```

Você pode filtrar os testes por nome, por exemplo:
```bash
php artisan test --filter Material
```
Isso faz com que o artisan execute apenas os testes que incluem `Material` no nome, seja isso uma classe inteira ou um método dentro dela.

Para ver um relatório de cobertura:
1. Configure o driver do Xdebug (só precisa executar isso uma vez em cada terminal que você abrir):
    ```bash
    export XDEBUG_MODE=coverage
    ```
2. E passe a opção para gerar o relatório de cobertura:
    ```bash
    php artisan test --coverage
    ```
    Você verá uma pasta `tests/coverage`, que contém o relatório de testes em HTML.
    Abra o arquivo `index.html`.
