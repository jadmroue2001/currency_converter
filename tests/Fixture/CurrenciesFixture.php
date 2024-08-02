<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrenciesFixture
 */
class CurrenciesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'code' => 'L',
                'buyat' => 1.5,
                'sellat' => 1.5,
            ],
        ];
        parent::init();
    }
}
