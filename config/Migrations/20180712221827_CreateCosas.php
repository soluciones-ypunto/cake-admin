<?php
use Migrations\AbstractMigration;

class CreateCosas extends AbstractMigration
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
        $table = $this->table('cosas');
        $table->addColumn('entidad_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('nombre', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('precio', 'decimal', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('cantidad', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
