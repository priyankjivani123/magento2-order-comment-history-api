# Magento 2 Order Comment History REST API Extension

[![Magento 2.4.x](https://img.shields.io/badge/Magento-2.4.x-orange.svg?logo=magento)](https://business.adobe.com/products/magento/magento-commerce.html)
[![PHP 8.1 - 8.4 Compatible](https://img.shields.io/badge/PHP-8.1%20%7C%208.2%20%7C%208.3%20%7C%208.4-777BB4.svg?logo=php)](https://www.php.net/)
[![Composer Package](https://img.shields.io/badge/Composer-priyankjivani%2Fmodule--order--comment--history--api-blue.svg?logo=composer)](https://packagist.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Upwork](https://img.shields.io/badge/Upwork-Available%20for%20Hire-14a800.svg?logo=upwork)](https://www.upwork.com/freelancers/priyankjivani)

High-performance, lightweight REST Web API extension for **Magento 2 & Adobe Commerce**. Enables external CRM systems (Zendesk, Salesforce), ERPs, and mobile applications to retrieve and append order status history comments without the performance penalty of loading full 500+ field Order models.

Developed and maintained by **[Priyank Jivani](https://github.com/priyankjivani123)** (Senior Magento 2 Backend Developer).

---

## 🚀 Key Features

* **Optimized Headless Endpoints:** Queries `sales_order_status_history` directly via service contracts, avoiding the overhead of loading full order aggregates.
* **Complete CRUD Comment Operations:** Fetch full comment history or append status notes, customer notification flags, and frontend visibility flags.
* **Strict Type Safety:** Fully typed PHP 8.1 - 8.4 service contract architecture (`OrderCommentManagementInterface`).
* **Swagger API Documentation:** Automatically generates OpenAPI / Swagger schema under `/rest/all/schema?services=priyankjivaniOrderCommentManagementV1`.

---

## 🌐 Magento & PHP Compatibility Matrix

| Magento / Adobe Commerce Release | Supported PHP Versions | Compatibility Status | Notes |
| :--- | :--- | :---: | :--- |
| **Magento 2.4.4 - 2.4.5-p1** | PHP 8.1 | ✅ Supported | Tested on 2.4.4-p9 & 2.4.5-p1 |
| **Magento 2.4.5-p2 - 2.4.6-pX** | PHP 8.1, PHP 8.2 | ✅ Supported | Tested on 2.4.6-p8 |
| **Magento 2.4.7 - 2.4.7-pX** | PHP 8.2, PHP 8.3 | ✅ Supported | Officially verified on 2.4.7-p3 |
| **Magento 2.4.8 (Roadmap)** | PHP 8.3, PHP 8.4 | 🚀 Forward-Compatible | Strict types, zero implicit nullable deprecations |
| **PHP 8.5 (Future Release)** | *N/A (Pending Adobe Core)* | ⏳ Preview / Audited | Extension syntax passes PHP 8.5 compilation; awaiting Adobe Commerce core framework update |


---

## 📦 Composer Installation Instructions

### Step 1: Register GitHub VCS Repository
```bash
composer config repositories.priyankjivani-order-comment-history-api vcs https://github.com/priyankjivani123/magento2-order-comment-history-api.git
```

### Step 2: Require the Package
```bash
composer require priyankjivani/module-order-comment-history-api:^1.0.0
```

### Step 3: Enable the Module
```bash
bin/magento module:enable PriyankJivani_OrderCommentHistoryApi
bin/magento setup:upgrade
bin/magento cache:flush
```

---

## 💻 REST Web API Endpoints

### 1. Retrieve Order Comments
```http
GET /rest/V1/orders/2005/comments
```
**Response:**
```json
[
  {
    "entity_id": 101,
    "parent_id": 2005,
    "status": "processing",
    "comment": "Shipment packed at warehouse bay 4.",
    "is_customer_notified": 1,
    "is_visible_on_front": 0,
    "created_at": "2026-11-09 11:30:00"
  }
]
```

### 2. Append Order Comment
```http
POST /rest/V1/orders/2005/comments
Content-Type: application/json

{
  "comment": {
    "status": "complete",
    "comment": "Tracking ID #DHL-992144 provided to customer.",
    "is_customer_notified": 1,
    "is_visible_on_front": 1
  }
}
```

---

## 🧪 Automated Testing

```bash
vendor/bin/phpunit -c phpunit.xml.dist
```

---

## 📋 Changelog

See [CHANGELOG.md](CHANGELOG.md).

---

## 📄 License

MIT License. See [LICENSE](LICENSE).

---

## Developing a Magento 2 project?

I help businesses build, customize, optimize and maintain Magento 2 / Adobe Commerce stores.

**Available for:**
- Magento 2 Custom Development
- Magento Extensions
- Bug Fixes and Troubleshooting
- Performance Optimization
- Hyvä Theme Development
- API Integrations
- Ongoing Magento Maintenance

**Hire me on Upwork:** [Priyank Jivani Upwork Profile](https://www.upwork.com/freelancers/priyankjivani)  
**GitHub:** [github.com/priyankjivani123](https://github.com/priyankjivani123)

Contact me for freelance projects and long-term collaborations.

