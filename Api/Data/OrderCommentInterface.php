<?php
declare(strict_types=1);

namespace PriyankJivani\OrderCommentHistoryApi\Api\Data;

interface OrderCommentInterface
{
    public const ENTITY_ID = 'entity_id';
    public const PARENT_ID = 'parent_id';
    public const COMMENT = 'comment';
    public const STATUS = 'status';
    public const IS_CUSTOMER_NOTIFIED = 'is_customer_notified';
    public const IS_VISIBLE_ON_FRONT = 'is_visible_on_front';
    public const CREATED_AT = 'created_at';

    public function getEntityId(): ?int;
    public function setEntityId(int $entityId): self;

    public function getParentId(): ?int;
    public function setParentId(int $parentId): self;

    public function getComment(): string;
    public function setComment(string $comment): self;

    public function getStatus(): ?string;
    public function setStatus(?string $status): self;

    public function getIsCustomerNotified(): int;
    public function setIsCustomerNotified(int $isCustomerNotified): self;

    public function getIsVisibleOnFront(): int;
    public function setIsVisibleOnFront(int $isVisibleOnFront): self;

    public function getCreatedAt(): ?string;
    public function setCreatedAt(string $createdAt): self;
}
