<?php

namespace Modules\Interventi\Components;

use Modules\Interventi\Intervento;

trait RelationTrait
{
    public function getParentID()
    {
        return 'idintervento';
    }

    public function parent()
    {
        return $this->belongsTo(Intervento::class, $this->getParentID());
    }

    public function intervento()
    {
        return $this->parent();
    }

    public function fixIvaIndetraibile()
    {
    }

    public function fixRivalsaINPS()
    {
    }

    public function fixRitenutaAcconto()
    {
    }

    public function getSubtotaleAttribute()
    {
        return $this->prezzo_vendita * $this->qta;
    }

    /**
     * Effettua i conti per il subtotale della riga.
     */
    protected function fixSubtotale()
    {
        $this->prezzo_vendita = $this->prezzo_unitario_vendita;

        $this->fixIva();
    }
}
