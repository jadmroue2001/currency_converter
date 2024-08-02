<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrencyFixture
 */
class CurrencyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'currency';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'test' => '',
            ],
        ];
        parent::init();
    }
}
