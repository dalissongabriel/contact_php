<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste PHP - Entre em contato</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link rel="stylesheet" href="/assets/form.css">
</head>
<body>
<header class="header">
    <h1>Teste desenvolvedor PHP</h1>
    <nav>
        <ul >
            <li tabindex="1"><a tabindex="-1" href="#formulario-contato">Formulário para contato</a></li>
            <li tabindex="2"><a tabindex="-1"  href="#sobre">Sobre o teste</a></li>
        </ul>
    </nav>
</header>
<main>
    <section id="formulario-contato">
        <h2>Formulário para contato</h2>
        <form class="form" action="/contato/enviar">
            <label for="name">Nome completo:</label>
            <input tabindex="3" name="name" id="name"  type="text" placeholder="Informe o seu nome completo" required/>
            <label for="email">E-mail:</label>
            <input name="email" id="email" type="email" placeholder="Informe o seu e-mail mais utilizado" required>
            <label for="phone">Telefone/Celular:</label>
            <input name="phone" id="phone" type="tel"  placeholder="Informe o seu telefone/celular para contato" required>
            <label for="message">Mensagem:</label>
            <textarea name="message" id="message" placeholder="Informe a mensagem que deseja nos enviar" required></textarea>
            <label for="file">Anexo:</label>
            <input type="file"  id="file" name="file" required accept=".doc, .docx, .odt, application/pdf, text/plain">
            <input type="submit" value="Enviar">
        </form>
    </section>
    <section id="sobre">
        <h2>Sobre o teste</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed dui eget quam venenatis aliquet non tempus mi. Aenean eu gravida enim. Nam tempus lacinia tortor nec bibendum. Duis ullamcorper bibendum orci, id aliquet ipsum suscipit vel. Cras faucibus elementum quam, eu convallis ex hendrerit ut. Vestibulum ut magna ultrices, efficitur urna nec, vulputate lacus. In quis hendrerit odio. Mauris vulputate aliquam malesuada. Cras bibendum purus lacus, sit amet finibus nisi volutpat sed. Nunc suscipit finibus ultricies. Morbi et nunc sed dolor ultrices tincidunt scelerisque a diam. Ut venenatis pellentesque dui, pharetra vulputate lorem semper sed. Quisque pretium massa nulla, ac ultrices massa accumsan sit amet. In id lorem et elit elementum egestas ac sit amet lectus. Aenean dignissim suscipit tellus, porta dignissim metus blandit vel.</p>
        <p>Nulla odio erat, tempor sed augue sit amet, molestie tincidunt erat. Morbi augue velit, placerat vitae posuere sit amet, laoreet quis libero. Aliquam vel turpis ornare, dignissim neque eu, eleifend quam. Sed quis ante sit amet nunc consectetur dapibus at id orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas id condimentum libero. Nullam dignissim, justo eu congue mattis, neque magna suscipit est, rhoncus maximus dui ante sed est. Donec sed pretium metus.</p>
    </section>
<?php require_once __DIR__ . "/footerView.php" ?>