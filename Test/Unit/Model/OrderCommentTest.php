<?php
declare(strict_types=1);

namespace PriyankJivani\OrderCommentHistoryApi\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use PriyankJivani\OrderCommentHistoryApi\Model\Data\OrderComment;

class OrderCommentTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $comment = new OrderComment();
        $comment->setEntityId(101);
        $comment->setParentId(2005);
        $comment->setStatus('processing');
        $comment->setComment('Shipment packed in warehouse bay 4.');
        $comment->setIsCustomerNotified(1);
        $comment->setIsVisibleOnFront(0);
        $comment->setCreatedAt('2026-11-09 11:30:00');

        $this->assertEquals(101, $comment->getEntityId());
        $this->assertEquals(2005, $comment->getParentId());
        $this->assertEquals('processing', $comment->getStatus());
        $this->assertEquals('Shipment packed in warehouse bay 4.', $comment->getComment());
        $this->assertEquals(1, $comment->getIsCustomerNotified());
        $this->assertEquals(0, $comment->getIsVisibleOnFront());
        $this->assertEquals('2026-11-09 11:30:00', $comment->getCreatedAt());
    }
}
