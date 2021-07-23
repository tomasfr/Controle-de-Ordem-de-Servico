<?php

class ChamadoCRTL
{

    public function NovoChamado(ChamadoVo $vo)
    {
        if ($vo->getIdEquipamento() == '' || $vo->getDescProblema() == '') {
            return 0;
        }
    }

    public function ConsultarChamado(ChamadoVO $vo){
        //onde é o get "situacao"?
    }
}
