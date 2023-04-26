<?php


namespace App;


class Constants
{
    const tipoUsuarioAdmin = 1;
    const tipoUsuarioCliente = 2;
    const tipoUsuarioProfissional = 3;

    const inativo = 0;
    const ativo = 1;

    const nao = 0;
    const sim = 1;
    const simComUsuario = 2;
    const simSemUsuario = 3;
    const filtrosPagamento = [
        Constants::sim => 'Sim',
        Constants::simComUsuario => 'Sim - Com Usuário',
        Constants::simSemUsuario => 'Sim - Sem Usuário'
    ];
}
