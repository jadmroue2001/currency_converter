<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCurrencies extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('currencies');
        $table->addColumn('code', 'string', ['limit' => 3, 'null' => false])
              ->addColumn('buyat', 'decimal', ['precision' => 10, 'scale' => 4, 'null' => false])
              ->addColumn('sellat', 'decimal', ['precision' => 10, 'scale' => 4, 'null' => false])
              
              ->create();
    }
}
