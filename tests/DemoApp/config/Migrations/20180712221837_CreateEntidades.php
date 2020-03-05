<?php
use Migrations\AbstractMigration;

class CreateEntidades extends AbstractMigration
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
        $table = $this->table('entidades');
        $table->addColumn('grupo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('nombre', 'string', [
            'limit' => 80,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 80,
            'null' => true,
        ]);
        $table->addColumn('estado', 'string', [
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('habilitado', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('fecha_nacimiento', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('fecha_hora', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('puntos', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('capital', 'float', [
            'default' => null,
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
