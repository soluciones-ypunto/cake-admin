<?php
use Migrations\AbstractMigration;

class CreateEtiquetasEntidades extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('etiquetas_entidades');
        $table->addColumn('entidad_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('etiqueta_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
