<?php declare(strict_types=1);

namespace Hardcastle\LedgerDirect\Tests\Unit\Service;

use Hardcastle\LedgerDirect\Service\ConfigurationService;
use Hardcastle\LedgerDirect\Service\XrplTxService;
use PHPUnit\Framework\TestCase;
use Hardcastle\LedgerDirect\Service\OrderTransactionService;
use Hardcastle\LedgerDirect\Provider\CryptoPriceProviderInterface;

require_once dirname(dirname(__FILE__)) . '/../../../../../wp-load.php';

class OrderTransactionServiceTest extends TestCase
{
    public function testGetCurrentXrpPriceForOrder()
    {
        // Arrange
        $orderMock = $this->createMock(\WC_Order::class);
        $orderMock->method('get_total')->willReturn(100);
        $orderMock->method('get_currency')->willReturn('USD');

        $configurationServiceMock = $this->createMock(ConfigurationService::class);
        $xrplTxServiceMock = $this->createMock(XrplTxService::class);

        $priceProviderMock = $this->createMock(CryptoPriceProviderInterface::class);
        $priceProviderMock->method('getCurrentExchangeRate')->willReturn(1.5);

        $service = new OrderTransactionService($configurationServiceMock, $xrplTxServiceMock, $priceProviderMock);

        // Act
        $result = $service->getCurrentXrpPriceForOrder($orderMock);

        // Assert
        $expectedResult = [
            'pairing' => 'XRP/USD',
            'exchange_rate' => 1.5,
            'amount_requested' => 100 / 1.5
        ];
        $this->assertEquals($expectedResult, $result);
    }
}