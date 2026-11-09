# Magento 2 Order Comment History REST API Extension

[![Magento 2.4.x](https://img.shields.io/badge/Magento-2.4.x-orange.svg?logo=magento)](https://business.adobe.com/products/magento/magento-commerce.html)
[![PHP 8.1 | 8.2 | 8.3](https://img.shields.io/badge/PHP-8.1%20%7C%208.2%20%7C%208.3-777BB4.svg?logo=php)](https://www.php.net/)
[![Headless REST API](https://img.shields.io/badge/REST-WebAPI%20Ready-green.svg)](https://devdocs.magento.com/guides/v2.4/rest/bk-rest.html)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![Upwork Top Rated](https://img.shields.io/badge/Upwork-Available%20for%20Hire-green.svg?logo=upwork)](https://www.upwork.com/freelancers/priyankjivani)

A lightweight headless API extension for **Magento 2 & Adobe Commerce**. Exposes dedicated, high-speed REST Web API endpoints to query and append order status history comments without the computational overhead of retrieving or saving heavy 500+ field Order models.

Ideal for **external CRMs** (Salesforce, Zendesk, HubSpot, Freshdesk), **ERP systems** (SAP, NetSuite), **custom mobile apps**, and customer support portals.

Developed and maintained by **[Priyank Jivani](https://github.com/priyankjivani123)** (Senior Magento 2 Backend Developer).

---

## 🚀 Why Use This Extension?

In core Magento 2, inspecting or adding order comments via REST API requires fetching the entire `GET /V1/orders/:id` payload (often 50KB–200KB of JSON with lines, addresses, quotes, payment objects). 

This extension provides:
* **Micro-Payload Performance**: Dedicated `/V1/orders/:id/comments` endpoint returning only the comment thread.
* **Service Contracts**: Clean PHP interface definitions (`OrderCommentManagementInterface`, `OrderCommentInterface`).
* **ACL Protected**: Inherits Magento core sales authorization privileges (`Magento_Sales::actions_view` and `Magento_Sales::actions_edit`).
* **Customer Notification Triggers**: Supports triggering order update transactional emails via API parameters.

---

## 🌐 REST Web API Specifications

### 1. Retrieve Order Status Comments
* **Method:** `GET`
* **Route:** `/V1/orders/:orderId/comments`
* **cURL Example:**
```bash
curl -X GET "https://your-magento-store.com/rest/V1/orders/1042/comments" \
     -H "Authorization: Bearer <ADMIN_OR_INTEGRATION_TOKEN>" \
     -H "Content-Type: application/json"
```

* **Sample Response:**
```json
[
  {
    "entity_id": 85,
    "parent_id": 1042,
    "comment": "Order received and queued for dispatch in Main Warehouse.",
    "status": "processing",
    "is_customer_notified": 1,
    "is_visible_on_front": 1,
    "created_at": "2026-03-12 10:15:30"
  },
  {
    "entity_id": 92,
    "parent_id": 1042,
    "comment": "Courier tracking number generated: DHL-9842109.",
    "status": "complete",
    "is_customer_notified": 1,
    "is_visible_on_front": 1,
    "created_at": "2026-03-12 14:22:10"
  }
]
```

---

### 2. Append New Comment to Order History
* **Method:** `POST`
* **Route:** `/V1/orders/:orderId/comments`
* **cURL Example:**
```bash
curl -X POST "https://your-magento-store.com/rest/V1/orders/1042/comments" \
     -H "Authorization: Bearer <ADMIN_OR_INTEGRATION_TOKEN>" \
     -H "Content-Type: application/json" \
     -d '{
       "comment": "Customer contacted support to update delivery instructions.",
       "status": "processing",
       "isVisibleOnFront": true,
       "notifyCustomer": false
     }'
```

* **Sample Response:**
```json
true
```

---

## 🛠 Technical Requirements

| Stack Component | Requirement |
| :--- | :--- |
| **Magento / Adobe Commerce** | 2.4.4, 2.4.5, 2.4.6, 2.4.7+ |
| **PHP** | 8.1, 8.2, 8.3 |
| **Composer** | 2.x |

---

## 📦 Installation Instructions

### Option 1: Composer Installation (Recommended)

```bash
composer require priyank/module-order-comment-history-api
bin/magento module:enable Priyank_OrderCommentApi
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

### Option 2: Manual Installation

1. Create directory `app/code/Priyank/OrderCommentApi`.
2. Extract the repository files into `app/code/Priyank/OrderCommentApi`.
3. Enable and compile:
```bash
bin/magento module:enable Priyank_OrderCommentApi
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

---

## 🏗 Architecture & Code Structure

```
├── Api/
│   ├── Data/
│   │   └── OrderCommentInterface.php         # DTO Interface contract
│   └── OrderCommentManagementInterface.php   # Service contract interface
├── Model/
│   ├── Data/
│   │   └── OrderComment.php                  # Data object implementation
│   └── OrderCommentManagement.php            # Core repository management logic
├── etc/
│   ├── di.xml                                # Interface-to-Class preferences
│   ├── module.xml
│   └── webapi.xml                            # Route definitions & ACL mappings
├── composer.json
├── registration.php
└── README.md
```

---

## 📄 License

Open-source module released under the [MIT License](LICENSE).

---

## 💼 Developing a Magento 2 project?

I help businesses build, customize, optimize, and maintain **Magento 2 / Adobe Commerce** stores.

**Available for:**
* Magento 2 Custom Development & Architecture
* Custom Magento Extensions & Modules
* Bug Fixes, Audits, and Troubleshooting
* Performance Optimization & Core Web Vitals
* Hyvä Theme Development & Customization
* Headless GraphQL & REST API Integrations
* Ongoing Magento Store Maintenance

👉 **Hire me on Upwork:** [Priyank Jivani on Upwork](https://www.upwork.com/freelancers/priyankjivani)  
👉 **GitHub Profile:** [priyankjivani123](https://github.com/priyankjivani123)

Contact me for freelance projects and long-term enterprise collaborations.
