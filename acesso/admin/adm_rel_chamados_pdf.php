<?php

require '../../controller/UtilCTRL.php';
require_once '../../controller/ChamadoCTRL.php';

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

if (isset($_GET['sit'])) {

    $ctrl = new ChamadoCTRL();

    $situacao = $_GET['sit'];
    $dados = $ctrl->FiltrarChamado($situacao, UtilCTRL::IdSetorLogado());

    if (count($dados) == 0) {
        header('location: adm_rel_chamados.php');
        exit;
    }

    $cabecalho = "Relatório de chamados <br> Emitido em: " . UtilCTRL::DataAtualExibir() . ' às ' . UtilCTRL::HoraAtual() . '<hr>';

    $table_inicial = '  <table>
                            <thead>
                                <tr>
                                    <th>Data Abertura</th>
                                    <th>Funcionário</th>
                                    <th>Equipamento</th>
                                    <th>Problema</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>';
    $conteudo = '';

    foreach ($dados as $item) {

        $conteudo .= '<tr>
                          <td>' . (UtilCTRL::DataAtualExibir($item['data_chamado'])) . '</td>
                          <td>' . ($item['funcionario']) . '</td>
                          <td>' . ($item['desc_equip'] . ' / ' . $item['ident_equip']) . '</td>
                          <td>' . ($item['desc_problema']) . '</td>
                          <td>' . (UtilCTRL::SituacaoChamado($item['data_atendimento'], $item['data_encerramento'])) . '</td>
                      </tr>';
    }
    $table_fim = '</tbody></table>';

    $table_full = $cabecalho . $table_inicial .  $conteudo . $table_fim;

    $domPdf = new Dompdf();
    $domPdf->loadHtml($table_full);
    $domPdf->render();
    $domPdf->stream('chamados_situacao.pdf', array('Attachment' => false));
} else {
    header('location: adm_rel_chamados.php');
    exit;
}
