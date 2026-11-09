<?php
declare(strict_types=1);

namespace Priyank\OrderCommentApi\Model;

use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order\Status\HistoryFactory;
use Magento\Sales\Api\OrderStatusHistoryRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Priyank\OrderCommentApi\Api\OrderCommentManagementInterface;
use Priyank\OrderCommentApi\Api\Data\OrderCommentInterfaceFactory;

class OrderCommentManagement implements OrderCommentManagementInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var HistoryFactory
     */
    private $historyFactory;

    /**
     * @var OrderStatusHistoryRepositoryInterface
     */
    private $historyRepository;

    /**
     * @var OrderCommentInterfaceFactory
     */
    private $commentDataFactory;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        HistoryFactory $historyFactory,
        OrderStatusHistoryRepositoryInterface $historyRepository,
        OrderCommentInterfaceFactory $commentDataFactory
    ) {
        $this->orderRepository = $orderRepository;
        $this->historyFactory = $historyFactory;
        $this->historyRepository = $historyRepository;
        $this->commentDataFactory = $commentDataFactory;
    }

    /**
     * @inheritdoc
     */
    public function getComments(int $orderId): array
    {
        try {
            $order = $this->orderRepository->get($orderId);
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__('The order with ID "%1" does not exist.', $orderId));
        }

        $commentsList = [];
        $statusHistoryCollection = $order->getStatusHistoryCollection();

        foreach ($statusHistoryCollection as $historyItem) {
            $dataObject = $this->commentDataFactory->create();
            $dataObject->setEntityId((int) $historyItem->getId());
            $dataObject->setParentId((int) $historyItem->getParentId());
            $dataObject->setComment((string) $historyItem->getComment());
            $dataObject->setStatus($historyItem->getStatus());
            $dataObject->setIsCustomerNotified((int) $historyItem->getIsCustomerNotified());
            $dataObject->setIsVisibleOnFront((int) $historyItem->getIsVisibleOnFront());
            $dataObject->setCreatedAt((string) $historyItem->getCreatedAt());

            $commentsList[] = $dataObject;
        }

        return $commentsList;
    }

    /**
     * @inheritdoc
     */
    public function addComment(
        int $orderId,
        string $comment,
        ?string $status = null,
        bool $isVisibleOnFront = false,
        bool $notifyCustomer = false
    ): bool {
        if (trim($comment) === '') {
            throw new LocalizedException(__('Comment content cannot be empty.'));
        }

        try {
            $order = $this->orderRepository->get($orderId);
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__('The order with ID "%1" does not exist.', $orderId));
        }

        if ($status && $status !== $order->getStatus()) {
            $order->setStatus($status);
        }

        $history = $order->addCommentToStatusHistory(
            $comment,
            $status ?: false,
            $isVisibleOnFront
        );
        $history->setIsCustomerNotified((int) $notifyCustomer);

        $this->orderRepository->save($order);
        return true;
    }
}
