<?php
declare(strict_types=1);

namespace Priyank\OrderCommentApi\Api;

interface OrderCommentManagementInterface
{
    /**
     * Retrieve all status history comments for a specific order.
     *
     * @param int $orderId
     * @return \Priyank\OrderCommentApi\Api\Data\OrderCommentInterface[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getComments(int $orderId): array;

    /**
     * Append a new comment to an order's status history.
     *
     * @param int $orderId
     * @param string $comment
     * @param string|null $status
     * @param bool $isVisibleOnFront
     * @param bool $notifyCustomer
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function addComment(
        int $orderId,
        string $comment,
        ?string $status = null,
        bool $isVisibleOnFront = false,
        bool $notifyCustomer = false
    ): bool;
}
