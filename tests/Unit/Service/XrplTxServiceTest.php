<?php declare(strict_types=1);

namespace Hardcastle\LedgerDirect\Tests\Unit\Service;

use Hardcastle\LedgerDirect\Service\XrplTxService;
use PHPUnit\Framework\TestCase;
use Doctrine\DBAL\Connection;
use Hardcastle\LedgerDirect\Service\XrplClientService;

class XrplTxServiceTest extends TestCase
{
    private XrplTxService $xrplTxService;
    private XrplClientService $clientService;
    private Connection $connection;

    protected function setUp(): void
    {
        $this->clientService = $this->createMock(XrplClientService::class);

        $this->xrplTxService = new XrplTxService($this->clientService);
    }

    public function testGenerateDestinationTag(): void
    {
        //$this->connection->expects($this->once())->method('insert');
        $destinationTag = $this->xrplTxService->generateDestinationTag('rL7DjHoSvkn8TXYPcv6sBsJRwqdzAc6VxK');
        $this->assertIsInt($destinationTag);
        $this->assertGreaterThanOrEqual(XrplTxService::DESTINATION_TAG_RANGE_MIN, $destinationTag);
        $this->assertLessThanOrEqual(XrplTxService::DESTINATION_TAG_RANGE_MAX, $destinationTag);
    }
}