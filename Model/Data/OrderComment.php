<?php
declare(strict_types=1);

namespace Priyank\OrderCommentApi\Model\Data;

use Magento\Framework\DataObject;
use Priyank\OrderCommentApi\Api\Data\OrderCommentInterface;

class OrderComment extends DataObject implements OrderCommentInterface
{
    public function getEntityId(): ?int
    {
        return $this->getData(self::ENTITY_ID) !== null ? (int) $this->getData(self::ENTITY_ID) : null;
    }

    public function setEntityId(int $entityId): OrderCommentInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getParentId(): ?int
    {
        return $this->getData(self::PARENT_ID) !== null ? (int) $this->getData(self::PARENT_ID) : null;
    }

    public function setParentId(int $parentId): OrderCommentInterface
    {
        return $this->setData(self::PARENT_ID, $parentId);
    }

    public function getComment(): string
    {
        return (string) $this->getData(self::COMMENT);
    }

    public function setComment(string $comment): OrderCommentInterface
    {
        return $this->setData(self::COMMENT, $comment);
    }

    public function getStatus(): ?string
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus(?string $status): OrderCommentInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getIsCustomerNotified(): int
    {
        return (int) $this->getData(self::IS_CUSTOMER_NOTIFIED);
    }

    public function setIsCustomerNotified(int $isCustomerNotified): OrderCommentInterface
    {
        return $this->setData(self::IS_CUSTOMER_NOTIFIED, $isCustomerNotified);
    }

    public function getIsVisibleOnFront(): int
    {
        return (int) $this->getData(self::IS_VISIBLE_ON_FRONT);
    }

    public function setIsVisibleOnFront(int $isVisibleOnFront): OrderCommentInterface
    {
        return $this->setData(self::IS_VISIBLE_ON_FRONT, $isVisibleOnFront);
    }

    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): OrderCommentInterface
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
